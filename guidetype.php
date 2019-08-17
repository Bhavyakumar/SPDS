<?php
	include_once "connection.php";
	
	
 	$qry="update faculty set type='".$_GET["Guide"]."' where f_id=".$_GET["id"];
 	mysqli_query($con,$qry);

?>