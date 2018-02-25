<?php 
extract($_POST);
include_once("connect.php");
include_once("functions.php");
$msg = cancelBookingByID($link, $id);
mysqli_close($link);
header("location:./booking.php?msg=".$msg);
?>