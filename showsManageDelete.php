<?php 
extract($_POST);
include_once("connect.php");
include_once("functions.php");
$msg = deleteShowByID($link, $id);
mysqli_close($link);
header("location:./shows.php?msg=".$msg);
?>