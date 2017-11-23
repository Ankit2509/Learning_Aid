<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Teacher</title>
 <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <link href="stylesheets/main.css" rel="stylesheet">
	
	<script src="js/jquery.min.js"></script>  
	<script src="js/collapse.js"></script> 
	<script src="js/dropdown.js"></script> 
	<script src="js/transition.js"></script> 

</head>

<body style="background-color: gray">
<?php
include("logo_1.php");
?>
<div class="row">
<form method="post">
<table height="400px" width="500px" align="center" style="margin-top:1px ; background:#CCC" cellpadding="5px" cellspacing="5px">
    <tr style="background:white">
       <th colspan="2"><h1 align="center">Teacher sign-up</h1></th>
    </tr>
    <tr>
       <th><h3>Name :</h3></th>
       <th>
          <input type="text" name="name" />
       </th>
    </tr>
    <tr>
       <th><h3>User name :</h3></th>
       <th>
          <input type="text" name="username" placeholder="Teacher id" />
       </th>
    </tr>
    <tr>
       <th><h3>email :</h3></th>
       <th>
          <input type="email" name="email" placeholder="abc@pqr.xyz" />
       </th>
    </tr>
    <tr>
       <th><h3>Password :</h3></th>
       <th>
          <input type="password" name="password" />
       </th>
    </tr>
	<tr style="background:white">
       <th colspan="2" id="login_button"><button type="submit" name="sub" value="Submit" class="btn btn-block btn-success">SUBMIT</button></th>
    </tr>
</table>
</form>
</div>
</body>
</html>
<?php
session_start();

?>
<?php
include("connect_teach.php");
if(isset($_POST['sub']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	
	$query="insert into credentials(id,password,name,email) values('$username','$password','$name','$email')";
	if(strlen($password)<6)
	{
       echo "<script>alert('Password must be atleast 8 character long!!')</script>"; 	
	}
	else
	{
	  
		$run=mysqli_query($connect_teachers,$query);
		$query1="CREATE TABLE `".$username."`( branch VARCHAR(20) NOT NULL , subject_code VARCHAR(15) NOT NULL,PRIMARY KEY(branch,subject_code)  )";
$run=mysqli_query($connect_teachers,$query1);
		echo "<script>
	alert('You have registered Successfully');
	window.location.href = 'index.php';
	</script>";	
	    	}
}
?>
