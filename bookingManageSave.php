<?php 
extract($_POST);
include_once("connect.php");
include_once("functions.php");
$msg = bookingSave($link, $id_espetaculo, $cliente);
mysqli_close($link);
header("location:./booking.php?msg=".$msg);
?>