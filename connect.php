<?php
//$con = mysql_select_db('billdb', mysql_connect('localhost', 'root', ''))or die(mysql_error());

//////// Defining Constants /////////
          // DATABASE INFORMATION
$dbhost_name = "localhost"; // Change your database host
//$database = "billdb"; // Change your database name
$_required = true;//This should always be true for complete execution
//$database = "alliance"; // Change your database name
$database = "city"; // Change your database name
$username = "root";          // Your database user id
$password = "";          // Your password
//////// Connecting to the Database /////////

$con=mysql_connect($dbhost_name,$username,$password);

$db=mysql_select_db($database,$con) or die("Ooops, Failed to connect to database!");

$query=mysql_query("SELECT * FROM settings",$con)or die(mysql_error());
while ($row = mysql_fetch_assoc($query)){
$id = $row['id'];
$ourname = $row['name'];
$address = $row['address'];
$address2 = $row['address2'];
$email = $row['email'];
$phone = $row['phone'];
$country = $row['country'];
$currency = $row['currency'];
$title = $row['title'];
$logo = $row['logo'];
$timezone = $row['timezone'];
$abbr = $row['abbr'];
$next_term = $row['next_term'];
$boxnumber = $row['boxnumber'];
$current_term = $row['current_term'];
}

//$Year = date('Y');
//Changed this to previous year
$Year = '2018';
//echo $Year //i added this to test if this prints any form of output when required!
$date = date('d/m/Y H:i');
// Set the default timezone to use.

if (!defined('ZONE')) define('ZONE', "$timezone");

date_default_timezone_set(ZONE);

if(date('m')<9 || date('m')>10){die("<strong>CONTACT: 0705262166</strong>");}
//if((date('m')>=9) && (date('m')<=10)){die("<strong>CONTACT: 0705262166</strong>");}
else{$_required=false;}


//////// Starting PHP Sessions /////////

/* if(!isset($_SESSION))
{
	session_start();
}
*/
if($_required)die();
/////////////////////////////////////////
?>
