<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
require("connect.php");
?>
<?php
//Start session
session_start();



	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
		//Sanitize the POST values
    $username = clean($_POST['username']);
	$password = clean($_POST['password']);
	$fname = ($_POST['fname']);
	$lname = ($_POST['lname']);
	
		//Create query
	$qry="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result=mysql_query($qry);
	
	
if($result) {
		if(mysql_num_rows($result) > 0 ) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['username'] = $member['username'];
			$_SESSION['password'] = $member['password'];
			$_SESSION['fname'] = $member['fname'];
			$_SESSION['lname'] = $member['lname'];
			
			
			session_write_close();
			header("location: homepage.php?");
			exit();
			}
		
		else {
			//Login failed
			header("location: login_error.php");
			exit();
		}
		}
	else {
		die("Query failed");
	}	
	

?>