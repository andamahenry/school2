<?php
include_once ('connect.php');
$id=$_GET['id'];
mysql_query("delete from grading where id='$id'",$con)or die(mysql_error());
header('location:grading.php');
?>