<?php
include'connection.php';
echo $_GET['id'];
$rs=mysqli_query($con,"select * from project_bank where p_id='".$_GET['id']."'");
$row=mysqli_fetch_assoc($rs);
header('Content-Type: application/octet-stream');
header('Content-Length:'.filesize($row['project']));	
header('Content-Disposition: attachment; filename="'.basename($row['project']).'"');
readfile($row['project']);			 
?>