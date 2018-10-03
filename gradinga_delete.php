<?php
include_once ('connect.php');
$id=$_GET['id'];
mysql_query("delete from paper_grades_alevel where id='$id'",$con)or die(mysql_error());
header('location:gradinga.php');
?>