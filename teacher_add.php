<?php
include("connect.php");
require_once('session1.php');
?>

<?php
	//print 'this is it here';
if (isset($_POST['register'])){
	$sno=$_POST['student_number'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	//$photo=$_POST['imagephoto'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$account=$_POST['account_number'];
	$initials=$_POST['initials'];
	$monthh = strtotime('now');
	$mon = date('Y-m-d',$monthh);
	$date_registered = $mon;
	//print $date_registered;
	$student_number = $sno;
	//include('photouploads.php');
	//print $newImageName;
	/*<script>alert('New file name: +<?php echo ?>')</script>*/

	// if no error occured, continue ....
	if(!isset($errMSG)){
		if(mysql_num_rows(mysql_query("SELECT sno,name FROM teachers WHERE sno='$sno' AND name='$name'"))){
			$errMSG="The Teacher ".$name." is already in Database...";
		}else{	
			if(mysql_num_rows(mysql_query("SELECT sno FROM teachers WHERE sno='$sno'"))){
			$errMSG="The Teacher Number ".$sno." is already in Database...";
			}else{
				$query = mysql_query("insert into teachers (id,sno,name,gender,address,phone,username,age,email,account,initials) 
				values('','$sno','$name','$gender','$address','$phone','$username','$age','$email','$account','$initials')") or die(mysql_error());

				if($query){				
					$successMSG = "New Teacher Admitted Succesfully ...";
					//header("refresh:2;student_admit.php"); // redirects image view page after 2 seconds.
				}else{
					$errMSG = "error while inserting....";
				}
			}
		}	
	}	
?>
<script>
alert('Succsessfully Saved');
//window.location = "view_tenant.php?id=<?php echo $id;?>";
</script>
<?php
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/alert.css" rel="stylesheet">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="uploads/shortcut_icon.jpg">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Register Student</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->	 
	<link rel="shortcut icon" href="assets/img/calculator.png">
	<script>!function(d,s,id){
		var js,fjs=d.getElementsByTagName(s)[0];
		if(!d.getElementById(id)){js=d.createElement(s);
		js.id=id;js.src="//platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
	</script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	var d = new Date();
	var day, month, year;
	year = d.getFullYear();month = d.getMonth();day = d.getDate();hours = d.getHours();ms = d.getMilliseconds();min = d.getMinutes();
	var stdno;
	function studentNumber(){
		if(day.toString().length == 1){day = '0'+(day.toString());}
		if(month.toString().length == 1){month = '0'+(month.toString());}
		if(min.toString().length == 1){min = '0'+(min.toString());}
		if(hours.toString().length == 1){hours = '0'+(hours.toString());}
		if(ms.toString().length ==2){ms = '0'+(ms.toString());}
		if(ms.toString().length ==1){ms = '00'+(ms.toString());}
		stdno = (year+month+day+hours+min+ms).toString();
		return stdno;
	}

	</script>

</head>
  <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="span3">&nbsp;&nbsp;&nbsp;&nbsp;<img class="index_logo" height="45" width="100" src="assets/img/logosmall.png"></div>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">       
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;<?php
				//Check to see if the user is logged in.
				if(isset($_SESSION['fname']))
				{ 
				echo 
				"".$_SESSION['fname']. "&nbsp;".$_SESSION['lname']. " ";
				}
				?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
					<li>
                        <a href="manage_account.php"><i class="fa fa-users fa-lg"></i>&nbsp;Accounts</a>
                    </li>
					<li class="divider"></li>
                    <li>
                        <a href="session_logout.php"><i class="fa fa-fw fa-power-off"></i>&nbsp;Log Out</a>
                    </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        		<!--The side bar menu script goes in here-->
				<?php include("sidebarmenu.php"); ?>           
				<!--The side bar menu script goes in here-->            <!-- /.navbar-collapse -->
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
		<nav>
		<div class="row">
		<div class = "col-md-2">
			<img src="#" class="" name="studentphoto" id="blah" width = "270" height = "250"/>
		</div>
		
		<div class="col-md-10">
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
			<h3><center>Teacher's Information</center></h3>
			<br>
			
			<div>
				
				<div>
					<div class="form-group">
							  <label class="col-md-5 control-label" for="rental">Teacher's Name:</label>
							  <div class="col-md-3">
					<input type="text" name="name" id = "name" class="form-control input-md" placeholder="Enter Full Name" required/> 
						</div>
					<div class="col-md-3">
					<input type="text" class="form-control" name="student_number" id="sno" placeholder="Serial Number" readonly></input>
					</div>	
					</div>
				<script> 
					window.onload = function(){
						studentNumber();
						document.getElementById('sno').value = stdno;
					}	
				</script>				
				<div class="form-group">
						  <label class="col-md-5 control-label" for="rental">Initials:</label>
						  <div class="col-md-3">
				<input type="text" name="initials" id = "initials" class="form-control input-md" placeholder="Teacher's Initials" required/> 
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="account_number" id="accno" placeholder="Payment A/C number" />
				</div>
				</div>
				
				<div>
					<div class="form-group">
							  <label class="col-md-5 control-label" for="rental">Gender:</label>
							  <div class="col-md-3">
				<div class="input-group">
					<div id="radioBtn" class="btn-group">
						<a class="btn btn-primary btn-sm notActive" data-toggle="gender" data-title="Male">Male</a>
						<a class="btn btn-primary btn-sm notActive" data-toggle="gender" data-title="Female">Female</a>
					</div>
						<input type="hidden" name="gender" id="gender"/>
    			</div>
				</div>
				</div>
				<div class="form-group">
				  <label class="col-md-5 control-label" for="rental">Age:</label>
				  <div class="col-md-3">
						<input type="number" name="age" id = "age" class="form-control input-md" title="input number only" required/>
					</div>
				</div>
				<div class="form-group">
						<label class="col-md-5 control-label" for="rental">E-mail:</label>
						<div class="col-md-3">
						<input type="text" name="email" id = "email" title="Enter E-mail address" class="form-control input-md" placeholder="Enter E-mail address" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-5 control-label" for="rental">Address:</label>
					<div class="col-md-3">
						<input type="text" name="address" id = "address" class="form-control input-md" placeholder="Address" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-5 control-label" for="rental">Contact No.:</label>
					<div class="col-md-3">
						<input type="text" name="contact" id = "contact" class="form-control input-md" title="input number only" placeholder="Contact Number" required/>
					</div>
				</div>
				<!--div class="form-group">
					<label class="col-md-5 control-label" for="rental">Image:</label>
					<div class="col-md-3">
						<input type="file" name="imagephoto" id = "photo" class="form-control input-md" onchange="readURL(this);" />
					</div>
					
				</div-->

				<div class="control-group">
				<div class="controls" align="center">
				<button type="submit" id="submit" name="register" class="btn btn-success">Save</button>
				<br><hr><!--br><br><br><br><br-->
				</div>
				</div>
				</div>
				</div>
				</div>
				</nav>
			</form>
		</div>		
</div>
</div>
    <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script>
	function readURL(input){
		if (input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#blah').attr('src',e.target.result).width(200).height(200);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	</script>
</body>
</html>
