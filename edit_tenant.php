<?php
include("connect.php");
require_once('session1.php');

$id = $_GET['id'];
	$select = "SELECT * FROM students as t WHERE t.sno = $id";
	//$result = mysql_fetch_array(mysql_query($select));
	$qry=mysql_query($select);
	if($qry){
		while($rec = mysql_fetch_array($qry)){
		$room_name = "$rec[room_name]";
		$sno = "$rec[sno]";
		$account = "$rec[account]";
		$fname = "$rec[fname]";
		//$mname = "$rec[mname]";
		$lname = "$rec[lname]";
		$nname = "$rec[nname]";
		$gender = "$rec[gender]";
		$age = "$rec[age]";
		//$dis_id = "$rec[dis_id]";
		$bdate = "$rec[bdate]";
		$address = "$rec[address]";
		$contact = "$rec[contact]";
		$photo = "$rec[photo]";
		}
	}	
		if(isset($_POST['register'])){
			if (($_POST['room_name'] == '')or($_POST['fname'] == '')or($_POST['lname'] == '')or($_POST['nname'] == '')or($_POST['gender'] == '')
			or($_POST['age'] == '')or($_POST['bdate'] == '')or($_POST['address'] == '')or($_POST['contact'] == '')){
				//echo "Must Fill All";
			}else{} 
				$s = addslashes($_POST['sno']);
				$f = addslashes("$_POST[fname]");
				$r = addslashes("$_POST[room_name]");
				$ln = addslashes("$_POST[lname]");
				$n = addslashes("$_POST[nname]");
				$g = addslashes("$_POST[gender]");
				$e = addslashes("$_POST[age]");
				$b = addslashes("$_POST[bdate]");
				$a = addslashes("$_POST[address]");
				$d = addslashes("$_POST[account]");
				$c = addslashes("$_POST[contact]");
				//$p = $_POST['new_photo'];
				//function to upload new student photo if edited
				if(isset($_FILES['imagephoto']) && $_FILES['imagephoto']['size']>0){//if image is selected
					include('photouploads.php');
					//print $newImagefile.' for not empty';
					
					mysql_query("UPDATE students SET room_name ='$r', fname ='$f',lname ='$ln', nname = '$n', gender ='$g', age ='$e', account ='$d',
					bdate ='$b', address = '$a', contact = '$c', photo = '$newImagefile' WHERE sno = '$id'",$con)or die(mysql_error()); 
					/*echo "<script>";
					echo "alert('Updated Successfully')";
					echo "</script>";*/
				}
				if (!isset($_FILES['imagephoto']) || $_FILES['imagephoto']['size']==0){//if image is not selected
					$newImagefile = $photo;
					//print $newImagefile.' for empty';
					
					mysql_query("UPDATE students SET room_name ='$r', fname ='$f',lname ='$ln', nname = '$n', gender ='$g', age ='$e', account ='$d',
					bdate ='$b', address = '$a', contact = '$c' WHERE sno = '$id'",$con)or die(mysql_error()); 
					echo "<script>";
					echo "alert('Updated Successfully')";
					echo "</script>";
				}
							
				//end of function to upload student photo when edited
	
	$id = $_GET['id'];
		$user_query = mysql_query("select * from students where sno=$id")or die(mysql_error());
		while($row = mysql_fetch_array($user_query)){
		$id1 = $row['room_name'];
		}?>
		<script>
		alert('Updated Successfully');
		window.location = "view_tenant.php?id=<?php echo $id1;?>";
		</script>
<?php
}?>
<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="js/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/plugins/bootstrap.js"></script>

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

  <link rel="shortcut icon" href="assets/img/calculator.png">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Edit Student</title>

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
    <![endif]-->	 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
	<div class="row">
			<form class="form-horizontal" role="form" method="POST" enctype = "multipart/form-data">
				<div class="col-md-4">
					<img src = "uploads/<?php echo $photo;?>" id = "blah" height="300" width="250" /><br><br>
					<input type = "file" name="imagephoto" style="border-color:green" accept="image/*" onchange = "readURL(this);"></input>
				</div>
				<div class="col-md-8"><!-- changed from col-md-12 to col-md-8 -->
				
				<br>
				<br>
				<div class="form-group">
				<label class="col-md-5 control-label" for="room">Class:</label>  
				  <div class="col-md-3">
					<select id="room_id" name="room_name" class="form-control" value="<?php echo $room_name?>" />  
						<option><?php echo $room_name; ?></option>
					<?php 
						$query=mysql_query("select * from room ORDER BY room_name ASC");
						while($row=mysql_fetch_array($query)){ 
							if($result['room_name'] == $row['room_name']){
								$sel = "selected";
							}else{
								$sel = "";
							}
					?>
					<option value="<?php echo $row['room_name'];?>"> <?php echo $row['room_name'];?> </option>
					<?php 
					}
					?>
					</select>
				
				</div>
			</div>
			<div class="form-group">
			<label class="col-md-5 control-label" for="rental">S/N:</label>
			<div class="col-md-3">
				<input type="text" name="sno" id = "sno" class="form-control input-md" placeholder="Student Number" value="<?php echo $sno?>" readonly /> 
				<input type = "text" name = "student_number" value = "<?php echo $sno?>" hidden />
			</div>
			</div>
				<div class="form-group">
							  <label class="col-md-5 control-label" for="rental">First Name:</label>
							  <div class="col-md-3">
					<input type="text" name="fname" id = "fname" class="form-control input-md" placeholder="Firstname" value="<?php echo $fname?>" /> 
						</div>
				</div>
										
				<div class="form-group">
							  <label class="col-md-5 control-label" for="rental">Last Name</label>
							  <div class="col-md-3">
					<input type="text" name="lname" id = "lname" class="form-control input-md" placeholder="Lastname" value="<?php echo $lname?>" /> 
					</div>
				</div>
				<div class="form-group">
							  <label class="col-md-5 control-label" for="rental">Guardian Name:</label>
							  <div class="col-md-3">
						<input type="text" name="nname" id = "nname" class="form-control input-md"  placeholder="Fathername" value="<?php echo $nname?>" />
					</div>
				</div>
				<div class="form-group">
							  <label class="col-md-5 control-label" for="rental">Gender:</label>
							  <div class="col-md-3">
								<div class="input-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-primary btn-sm notActive" data-toggle="gender" data-title="Male">Male</a>
    					<a class="btn btn-primary btn-sm notActive" data-toggle="gender" data-title="Female">Female</a>
    				</div>
    				<input type="hidden" name="gender" id="gender" value="<?php echo $gender?>" >
    			</div>
						</div>
						</div>
				<div class="form-group">
							  <label class="col-md-5 control-label" for="rental">Age:</label>
							  <div class="col-md-3">
						<input type="text" name="age" id = "age" class="form-control input-md" title="input number only" placeholder="Age" value="<?php echo $age?>">
					</div>
				</div>
			
				<div class="form-group">
							  <label class="col-md-5 control-label" for="rental">Birth Date:</label>
					<div class="col-md-3">
						<input type="date" name="bdate" id = "bdate" title="click to choose a date" class="form-control input-md" placeholder="Birth Date" value="<?php echo $bdate?>">
					</div>
				</div>
				<div class="form-group">
								<label class="col-md-5 control-label" for="rental">Address:</label>
					<div class="col-md-3">
						<input type="text" name="address" id = "address" class="form-control input-md" placeholder="Address" value="<?php echo $address?>">
					</div>
				</div><div class="form-group">
								<label class="col-md-5 control-label" for="rental">Student Fees Account:</label>
					<div class="col-md-3">
						<input type="text" name="account" id = "account" class="form-control input-md" placeholder="Student Fees Account" value="<?php echo $account?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-5 control-label" for="rental">Contact No.:</label>
					<div class="col-md-3">
						<input type="text" name="contact" id = "contact" class="form-control input-md" title="input number only" placeholder="Contact Number" value="<?php echo $contact?>">
					</div>
				</div>
				<div class="control-group">
				<div class="controls" align="center">
				<button type="submit" id="submit" name="register" class="btn btn-success">Update</button>
				</div>
				
				</div>
		</div>
		
	</form>
		
	</div>
	
</div>
  </div>
</div>
    <!-- /#wrapper -->
<script>
	function readURL(input){
		if (input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#blah').attr('src',e.target.result).width(150).height(200);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	</body>

</html>
