<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
include("connect.php");

session_start();
session_destroy();
header('location:index.php');
?>