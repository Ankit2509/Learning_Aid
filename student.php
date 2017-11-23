<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stylesheets/bootstrap.css" rel="stylesheet">
<script src="js/collapse.js"></script>
<script src="js/dropdown.js"></script>
<title>
    <?php
	session_start();
	include ("connect_stud.php");
	$id=$_SESSION['user'];
	$query="select name from credentials where id='$id'";
	$run=mysqli_query($connect_students,$query);
	while($row = mysqli_fetch_assoc($run)) 
        echo  $row["name"];
	?>
</title>
</head>

<body style="background:gray">
    <?php
	include ("logo_3.php");
	?>
    
    <div class="row">
	<div class="col-lg-9">
<form method="post">
<h1  align="center">Subjects</h1>
<?php

$sid=$_SESSION['user'];
$test=0;
$fetch_data="select * from notes_access where department=(select department from credentials where id='$sid') ";
 
 $run=mysqli_query($connect_students,$fetch_data);
 
 while($row_wise_data=mysqli_fetch_array($run))
 {
 $branch=$row_wise_data[0];
	 $code=$row_wise_data[2];
	 $string=$branch." ".$code; 
	 $test=1;
	 echo "
	      
		 <div> <button type='submit' class='btn btn-default btn-block' name='subject' type='submit' value='".$row_wise_data['department']." ".$row_wise_data['subject_code']."'>".$row_wise_data['department']." ".$row_wise_data['subject_code']."</button></div>		  
		  <br/>
	    "; }
 $query="select subject_code from notes_access where department='$branch'";
 
if($test==0)
{
	echo "<div align='center'><h2>No Subject exist</h2></div>";
}
 if(isset($_POST['subject']))
{
	$selected_subject = $_POST['subject'];
	$_SESSION['selected']=$selected_subject;
	$_SESSION['branch']=$branch;
	header("location:students_notes.php");
}
 ?>
 <div class="row" align="center">
   <a href="#list" class="btn btn-success" data-toggle="collapse">+Add new subject <span class="caret"></span></a>
   <div name="list" class="collapse">
   <ul class="dropdown-menu">
     <li>cse</li>
     <li>ece</li>
     <li>it</li>
   </ul>
   </div>
   </div>
    </form>
    
    </div>
    <form method="post">
    <div class="col-lg-3" style="background-color: #CCC ; height:546px ; margin-top:1px">
    <br>
    <?php
	$query="select name, id, email from credentials where id='$id'";
	$run=mysqli_query($connect_students,$query);
	while($row = mysqli_fetch_assoc($run)) 
        echo  "<h1>".$row["name"]."</h1>
		<small>".$row["id"]."</small><br>
		<small>Phone: +91-(XXX)-XXX-XXXX</small><br>
		<small>email: ".$row["email"]."</small><br>";
	
$photo_var="";
	$query1="select photo from credentials where id='$id'";
	$execute=mysqli_query($connect_students,$query1);
while($row_wise_data=mysqli_fetch_array($execute))
 {
	 
	 $photo=$row_wise_data[0];
 }
		 if($photo=="")
        { echo "<img src='img/student.jpg' class='img-rounded'/>";
		    
        }
	 else
	 {
		 echo "<img src='img/$photo' class='img-rounded' height='225' width='225'/>";}    ?>
	
	
    
    <br><br>    <button type="submit" class="btn btn-info" style="width:300px" name="edit" ><span class="glyphicon glyphicon-pencil"></span> Edit profile</button>
    <br><br>
    <button type="submit" class="btn btn-warning" style="width:300px" name="change"><span class="glyphicon glyphicon-cog"> Change password</span></button>    </div>
    </form>
    </div>
</body>
</html>
<?php

if(isset($_POST['edit']))
{
	$_SESSION['sid']=$id;
	header("location:student_profile.php");
}
if(isset($_POST['change']))
{
	$_SESSION['sid']=$id;
	header("location:student_changepassword.php");
}
?>