<?php
session_start();


?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    
	<link href="stylesheets/bootstrap.css" rel="stylesheet">
    <link href="stylesheets/main.css" rel="stylesheet">

	<script src="js/jquery.min.js"></script>  
	<script src="js/collapse.js"></script> 
	<script src="js/dropdown.js"></script> 
	<script src="js/transition.js"></script>
	
	<title>Learning Aid</title>
</head>

<body  style="background-color: gray">
<div class="row" style="background-color: white">
      <div class="col-lg-5"></div>
        <div class="col-lg-4">
            <img src="logo.png">
        </div>
      <div class="col-lg-3"></div>
</div>
	
	<br>
	<br>
	
	<div class="row">
		<div class="col-lg-6">
			<form method="post">
				<a href="#teacher" class="btn btn-default btn-block" data-toggle="collapse" style="background-color: white">
					<img src="img/teacher.jpg">
				</a>
				<div id="teacher" class="collapse">
					<table class="table">
						<tr>
							<td>Log-in id:</td>
							<td><input type="text" name="teacher_id"/></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" name="teacher_pw"></td>
						</tr>
						<tr>
 							<td ><input  type="submit" class="btn btn-default" name="teach"  value="Submit"/></td>
							<td ><a href="register_teacher.php" >Register Here</a></td>
								
						</tr>
					</table>
				</div>
			</form>
		</div>
		
		<div class="col-lg-6">
			<form method="post">
				<a href="#student" class="btn btn-default btn-block" data-toggle="collapse" style="background-color: white">
					<img src="img/student.jpg">
				</a>
				<div id="student" class="collapse">
					<table class="table">
						<tr>
							<td>Log-in id:</td>
							<td><input type="text" name="stu_id"/></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" name="stu_pass"></td>
						</tr>
						<tr>
							<td ><input  type="submit" class="btn btn-default" name="stud"  value="Submit"/></td>
						
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
	
	<?php
 $test=0;
 include("connect_teach.php");
 include("connect_stud.php");
 if(isset($_POST['teach']) and $test==0)
{
	$id=$_POST['teacher_id'];
	$pass=$_POST['teacher_pw'];
	$_SESSION['user']=$id;
	
	$test=1;
	
	$query="select id from credentials where id='$id' and password='$pass'";
	$run=mysqli_query($connect_teachers,$query);
	if(mysqli_num_rows($run)>0)
	{	
		echo "<script>window.location.href = 'teacher.php';</script>";
	}
	else
		echo"<script>alert('Wrong Credentials')</script>";
}
	elseif(isset($_POST['stud']) and $test==0)
{
	$id=$_POST['stu_id'];
	$pass=$_POST['stu_pass'];
	$_SESSION['user']=$id;
	
	$test=1;
	
	$query="select id from credentials where id='$id' and password='$pass'";
	$run=mysqli_query($connect_students,$query);
	if(mysqli_num_rows($run)>0)
	{	
		echo "<script>window.location.href = 'student.php';</script>";
	}
	else
		echo"<script>alert('Wrong Credentials')</script>";
}
	 ?>
	 
</body>
</html>