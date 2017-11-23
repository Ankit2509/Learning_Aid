<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stylesheets/bootstrap.css" rel="stylesheet">
<script src="js/collapse.js"></script>
<title>
   Edit Profile
</title>
</head>

<body style="background:gray">
<?php 		include("logo_3.php");
?>
<div class="row">
<form method="post" enctype="multipart/form-data">
<table height="400px" width="500px" align="center" style="margin-top:1px ; background:#CCC" cellpadding="5px" cellspacing="5px">
    <tr style="background:white">
       <th colspan="3"><h1 align="center">Profile</h1></th>
    </tr>
    <tr>
       <th rowspan="2">
        <?php 
include("connect_stud.php");
session_start(); 
$id=$_SESSION['sid'];
$photo_var="";
$query="select photo from credentials where id='$id'";
$execute=mysqli_query($connect_students,$query);
while($row_wise_data=mysqli_fetch_array($execute))
 {
	 
	 $photo=$row_wise_data[0];
 }
		 if($photo=="")
        { echo "<img src='img/student.jpg' class='img-rounded'/>";
		    
        }
	 else
	 {
		 echo "<img src='img/$photo' class='img-rounded' height='225' width='225'/>";}    ?> </th>
       <th><h3>email :</h3></th>
       <th><input type="email" name="email" placeholder="New email : abc@pqr.xyz" />
    </tr>
    <tr>
       <th><h3>Phone number :</h3></th>
       <th><input type="number" name="ph_no" placeholder="XXXXXXXXXX" />
    </tr>
    <tr>
       <th><input type="file" name="change_photo">Change photo</button></th>
       <th colspan="2" id="login_button" style="background: white"><button type="submit" name="sub" value="Submit" class="btn btn-block btn-success">SUBMIT</button></th>
    </tr>
</table>
</form>
</div>


</body>
</html>
<?php
$id=$_SESSION['sid'];

?>


<?php


include("connect_stud.php");
if(isset($_POST['sub']))
{
	$email=$_POST['email'];
	$ph_no=$_POST['ph_no'];
	$image_name=$_FILES['change_photo']['name'];
$temp_name=$_FILES['change_photo']['tmp_name'];
move_uploaded_file($temp_name,"img/$image_name");
		$id=$_SESSION['sid'];

$query1="update credentials set photo='$image_name' where id='$id'";

	
	$query2="update credentials set email='$email', ph_no='$ph_no' where id=$id";
	
	
	  
		$run=mysqli_query($connect_students,$query1);
		echo "<script>
	alert('Profile Edited Successfully');
	window.location.href = 'student.php';
	</script>";	
}
	 
?>