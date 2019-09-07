<?php
session_start();
if(isset($_SESSION['pm']))
{
	unset($_SESSION["pm"]);
	header('location:pmlogin.php');
}
if(isset($_SESSION['clerk']))
{
	unset($_SESSION["clerk"]);
	header('location:pmlogin.php');
}
if(isset($_SESSION['stud']))
{
	unset($_SESSION["stud"]);
	unset($_SESSION["reg"]);
	header('location:studentlogin.php');
}
if(isset($_SESSION['type']))
{
	unset($_SESSION["fac"]);
	unset($_SESSION["fid"]);
	unset($_SESSION["type"]);
	// setcookie("Min_tit",'',time()-1);
	// unset($_COOKIE['type']);
	header('location:facultylogin.php');
}
?>