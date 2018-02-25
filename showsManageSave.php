<?php 
extract($_POST);
include_once("connect.php");
include_once("functions.php");
$msg = showSave($link, $id, $nome, $qtd_poltronas);
mysqli_close($link);
header("location:./shows.php?msg=".$msg);
?>