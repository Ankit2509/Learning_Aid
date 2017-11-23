<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link href="stylesheets/bootstrap.css" rel="stylesheet">
<link href="stylesheets/jquery.dataTables.min.css" rel="stylesheet">
<link href="stylesheets/select.dataTables.min.css" rel="stylesheet">
<script src="js/collapse.js"></script> 
<script src="js/dataTables.select.min.js"></script>
<script src="js/jquery-1.12.4.js"></script>
    
<title>Student Notes</title>
</head>	

<body style="background:gray">
<?php
    include("logo_3.php");
	$complete_code=$_SESSION['selected'];
	$branch=$_SESSION['branch'];
	
	
	echo "<div align='center'><h1>$complete_code</h1></div>";
?>
<div style="height:auto; width:auto; text-align:center;">
<table id="example" style="width:100% ; background:#CCC" border="2" cellpadding="5px" cellspacing="5px">
<thead>
  <tr style="background:white">
    <th><h3>Date</h3></th></th>
    <th><h3>Notes</h3></th> 
    <th><h3>Links</h3></th>
    <th><h3>Announcements</h3></th>

  </tr>
  </thead>
  
  <tr>
    <?php
	
include ("connect_teach.php");
$sql="select date,notes,links,announcements from`" .$complete_code. "`";
	$run=mysqli_query($connect_teachers,$sql);
	?>
	<tbody>
        <!--Use a while loop to make a table row for every DB row-->
        <?php while($row = mysqli_fetch_array($run)) : ?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row['date']; ?></td>
            <td><a href="uploads/<?php echo $row['notes']; ?>" download><?php echo $row['notes']; ?></a></td>
            <td><a href="https://<?php echo $row['links']; ?>"><?php echo $row['links']; ?></a></td>
            <td><?php echo $row['announcements']; ?></td>
        </tr>
        <?php endwhile ?>
    </tbody>
  </tr>
  <tfoot>
  <tr style="background:gray">
    
    </form></th>
  </tr>
  </tfoot>
</table>
<br>


</div>
<?php
$_SESSION['complete_code']=$complete_code;
?>
</body>
</html>