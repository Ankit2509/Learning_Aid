<?php
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    
	<link href="stylesheets/bootstrap.css" rel="stylesheet">
	<script src="js/collapse.js"></script> 

	
<title><?php
	include ("connect_teach.php");
	$id=$_SESSION['user'];
	$query="select name from credentials where id='$id'";
	$run=mysqli_query($connect_teachers,$query);
	
	while($row = mysqli_fetch_assoc($run)) 
        echo  $row["name"];
	
	?></title>
	
</head>

<body style="background-color: gray">
	
	<?php
	include ("logo_2.php");
	?>
    <div class="row">
	<div class="col-lg-9">
	<form method="post">
<div class="row" style="margin-left:10px; margin-right:10px">
<br>
<h1>Classes</h1>
<br><br>
<?php
$id=$_SESSION['user'];
//$_SESSION['id']=$id;
//include("connect_teach.php");


$fetch_data="select * from`".$id."`";
 
 $run=mysqli_query($connect_teachers,$fetch_data);
 $test=0;
 
 while($row_wise_data=mysqli_fetch_array($run))
 {
	 $branch=$row_wise_data[0];
	 $code=$row_wise_data[1];
	 $string=$branch." ".$code; 
	 $test=1;
	 echo "
	      
		 <div> <button type='submit' class='btn btn-default btn-block' name='subject' type='submit' value='".$row_wise_data['branch']." ".$row_wise_data['subject_code']."'>".$row_wise_data['branch']." ".$row_wise_data['subject_code']."</button></div>		  
		  <br/>
	    ";
	 
}

if($test==0)
echo "<h3 align='center'> No current classes </h3> ";
if(isset($_POST['subject']))
{
	$complete_code = $_POST['subject'];
	$_SESSION['complete_code']=$complete_code;
	header("location:teacher_notes.php");
}
	 
?>
	<div align="center"><button type="submit" name="sub" value="Add Class" class="btn btn-success">+Add new class</button> </div>
</form>
</div>
	</div>
<form method="post">
    <div class="col-lg-3" style="background-color: #CCC ; height:546px ; margin-top:1px">
    <br>
    <?php
	include ("connect_teach.php");
	$query="select name, email from credentials where id='$id'";
	$run=mysqli_query($connect_teachers,$query);
	while($row = mysqli_fetch_assoc($run)) 
        echo  "<h1>".$row["name"]."</h1>
		<small>(Assistant Professor)</small><br />
        <small>Phone: +91-(XXX)-XXX-XXXX</small><br />
        <small>email: ".$row["email"]."</small><br />";
		
	$photo_var="";
	$query1="select photo from credentials where id='$id'";
	$execute=mysqli_query($connect_teachers,$query1);
while($row_wise_data=mysqli_fetch_array($execute))
 {
	 
	 $photo=$row_wise_data[0];
 }
		 if($photo=="")
        { echo "<img src='img/teacher.jpg' class='img-rounded'/>";
		    
        }
	 else
	 {
		 echo "<img src='img/$photo' class='img-rounded' height='225' width='225'/>";}    ?>
	
	
    
    <br><br>
    <button type="submit" class="btn btn-info" style="width:300px" name="edit" ><span class="glyphicon glyphicon-pencil"></span> Edit profile</button>
    <br><br>
    <button type="submit" class="btn btn-warning" style="width:300px" name="change"><span class="glyphicon glyphicon-cog"> Change password</span></button>
    </div>
</form>
    </div>
</body>
</html>

<?php
if(isset($_POST['sub']))
{
	$_SESSION['tid']=$id;
	header("location:teacher_addClass.php");
}
if(isset($_POST['edit']))
{
	$_SESSION['tid']=$id;
	header("location:teacher_profile.php");
}
if(isset($_POST['change']))
{
	$_SESSION['tid']=$id;
	header("location:teacher_changepassword.php");
}
?>	