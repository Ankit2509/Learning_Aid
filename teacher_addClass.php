<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="stylesheets/bootstrap.css" rel="stylesheet">
<script src="js/collapse.js"></script> 
<title>Add class</title>
</head>

<body style="background:gray">
<?php include("logo_2.php"); ?>
<div class="row">
<form method="post">
<table height="400px" width="500px" align="center" style="margin-top:1px ; background:#CCC" cellpadding="5px" cellspacing="5px">
    <tr style="background:white">
       <th colspan="2"><h1 align="center">New class</h1></th>
    </tr>
    <tr>
       <th><h3>Branch :</h3></th>
       <th>
          <select name="branch" required="required">
             <option value="no">--N.A.--</option>
             <option value="cse">C.S.E.</option>
             <option value="ece">E.C.E.</option>
             <option value="it">I.T.</option>
          </select>
       </th>
    </tr>
    <tr>
       <th><h3>Subject Code :</h3></th>
       <th>
          <select name="code" required="required">
             <option value="na">--N.A.--</option>
             <option value="ec147">EC-147</option>
             <option value="it415">IT-415</option>
             <option value="cs301">CS-301</option>
          </select>
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
include("connect_teach.php");
if(isset($_POST['sub']))
{
	$branch=$_POST['branch'];
	$code=$_POST['code'];
	$id=$_SESSION['tid'];
	$str=$branch." ".$code;
$query="insert into`".$id."`(branch,subject_code) values('$branch','$code')";
$run=mysqli_query($connect_teachers,$query);
$query1="CREATE TABLE `".$str."`( `id` INT NOT NULL AUTO_INCREMENT , `date` DATE NOT NULL , `notes` VARCHAR(40) NOT NULL , `links` VARCHAR(100) NOT NULL ,`Announcements` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ";
$run=mysqli_query($connect_teachers,$query1);
header("location:teacher.php");
}

?>