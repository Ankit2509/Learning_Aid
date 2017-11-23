<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<div class="row" style="background-color: white">
     <div onclick="window.location.href='student.php'" class="col-lg-1">
            <img src="logo.png" height="70" width="90" style="margin-left:1px ; margin-bottom:1px ; margin-top:1px">
     </div>
     <div onclick="window.location.href='student.php'" class="col-lg-10" style="font-family:'Times New Roman', Times, serif ; font-size:36px ; margin-top:8px  ; color:#666">
          LEARNING AID
     </div>
     <form method="post">
     <button type="submit" name="logout" class="btn btn-danger btn-lg" style="margin-top:14px ; margin-bottom:14px" >Log-out</button></form>
     <?php
	 if(isset($_POST['logout']))
	{
		session_destroy();
	header("location:index.php");

	}
	
     ?>
     


</div>
</body>
</html>