<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stylesheets/bootstrap.css" rel="stylesheet">
    <link href="stylesheets/main.css" rel="stylesheet">
<title>File Upload</title>
</head>

<body style="background : gray">
<?php
include("logo_2.php");
?>
<div class="row">
<form method="post"  enctype="multipart/form-data">
<table height="400px" width="500px" align="center" style="margin-top:1px ; background:#CCC" cellpadding="5px" cellspacing="5px">
    <tr style="background:white">
       <th colspan="2"><h1 align="center">Upload</h1></th>
    </tr>
    <tr>
       <th><h3>Notes :</h3></th>
       <th>
          <input type="file" name="file" id="fileToUpload" />
       </th>
    </tr>
    <tr>
       <th><h3>Links :</h3></th>
       <th>
           <div align="center"><textarea rows="2" cols="10" name="links"  ></textarea>
       </th>
    </tr>
    <tr>
       <th><h3>Announcements :</h3></th>
       <th>
           <div align="center"><textarea rows="5" cols="20" name="announcements" ></textarea></div>
       </th>
    </tr>
	<tr style="background:white">
       <th colspan="2" id="login_button"><button type="submit" name="submit" class="btn btn-block btn-success">UPLOAD</button></th>
    </tr>
</table>
</form>
</div>
</body>
</html>

<?php
session_start();
include("connect_teach.php");
if(isset($_POST['submit']))
{
	$links=$_POST['links'];
	$announcements=$_POST['announcements'];
	$target_dir = "uploads/";
	$filename=basename($_FILES["file"]["name"]);
	$date=date("Y-m-d H:i:s");


	$complete_id=$_SESSION['complete_code'];
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
elseif ($_FILES["file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
elseif($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
&& $fileType != "pdf" && $fileType != "doc" && $fileType != "xls" && $fileType != "ppt" && $fileType != "docx" && $fileType != "pptx" ) {
    echo "This type of files not allowed";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$query="insert into`".$complete_id."`(date,notes,links,Announcements) values('$date','$filename','$links','$announcements')";
$run=mysqli_query($connect_teachers,$query);
$_SESSION['complete_code']=$complete_id;
echo "<script>alert('Upload Successful');
window.location.href='teacher_notes.php'</script>";
;
}
?>
