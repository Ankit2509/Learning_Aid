<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="stylesheets/bootstrap.css" rel="stylesheet">
	<script src="js/collapse.js"></script> 

<title>Change Password</title>
</head>

<body  style="background-color: gray">

    <?php
	session_start();
		$id=$_SESSION['sid'];

	    include ("logo_3.php");
	?>
    
<div class="row">
<form method="post">
<table height="400px" width="500px" align="center" style="margin-top:1px ; background:#CCC" cellpadding="5px" cellspacing="5px">
    <tr style="background:white">
       <th colspan="2"><h1 align="center">Change Password</h1></th>
    </tr>
    <tr>
       <th><h3>Student id :</h3></th>
       <th>
          <input type="text" name="s_id" />
       </th>
    </tr>
    <tr>
       <th><h3>Current password :</h3></th>
       <th>
          <input type="password" name="cpass" />
       </th>
    </tr>
    <tr>
       <th><h3>New password :</h3></th>
       <th>
          <input type="password" name="npass" />
       </th>
    </tr>
	<tr style="background:white">
       <th colspan="2" id="login_button"><button type="submit" name="change" class="btn btn-block btn-success">CHANGE</button></th>
    </tr>
</table>
</form>
</div>
	
</body>
<?php
include("connect_stud.php");

if(isset($_POST['change']))
	{
		$s_id=$_POST['s_id'];
		$cpass=$_POST['cpass'];
		$npass=$_POST['npass'];
		
		$query="select id from credentials where id='$s_id' and password='$cpass'";
		$query1="update credentials set password='$npass' where id = '$s_id'";
		
		$run=mysqli_query($connect_students,$query);
		
		if(mysqli_fetch_assoc($run))
		{
			mysqli_query($connect_students,$query1);
			echo "<script>alert('Password changed Succesfully')
			
				   window.location.href = 'student.php';
				   
                  </script>";
			
		}
		else
		{
             echo "<script>alert('Incorrect ID or Password')
                   </script>";
		}
	}

?>
</html>