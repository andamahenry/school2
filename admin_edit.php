
<?php
mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
?>
<?php
session_start();
if (!isset($_SESSION['username']) || ($_SESSION['password'] == '')) {
	header("location:index.php");
	exit();
	
}
?>
<?php
$id = $_GET['id'];
	$select = "SELECT * FROM 
			admin 
			 WHERE admin_id= $id";
			 
			 $result = mysql_fetch_array(mysql_query($select));
	$qry=mysql_query($select);
		if($qry)
		{
		while($rec = mysql_fetch_array($qry)){
		$fname = "$rec[fname]";
		$lname = "$rec[lname]";
		$uname = "$rec[username]";
		}
		}
		//diri na mah submit ang data. lantawun nia kung mai onud ang every txtbox
	if (isset($_POST['update'])){
		if (($_POST['fname'] == '')or($_POST['lname'] == '')or($_POST['username'] == '')or ($_POST['password'] == ''))
			{
			echo "You Must Fill All";
			}
	else{ //dri namn is ang mga "name=tenant_id" nga ara sa mga input type.
		$f = addslashes("$_POST[fname]");
		$l = addslashes("$_POST[lname]");
		$un = addslashes("$_POST[username]");
		$pw = addslashes("$_POST[password]");
		//dri nah mah edit xng data
		mysql_query("UPDATE admin SET fname ='$f', lname ='$l',
		username ='$un',password ='$pw' WHERE admin_id = '$id'")or die(mysql_error()); 
			
}
?>
<script>
alert('Updated Successfully');
window.location = "manage_account.php";
</script>
<?php
}?>

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
    <title>Edit User</title>

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
        </nav>
<!--//////////////////////////////// Add Dialog ///////////////////////////////////////////-->

 <div class="container-fluid">
       <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Edit User</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
							<!--------------------form------------------->
								<form method="post">
                                    <tbody>
                                        <tr>
										<center>
										 
                                      <div class="form-group input-group">
									  <label class="col-sm-2 control-label">Firstname</label>
									  <input type="text"  class="form-control" id="fname" name="fname" value="<?php echo $fname?>" placeholder="Firstname"required autofocus>
									  </div>
									  
									  	<div class="form-group input-group">
										<label class="col-sm-2 control-label">Lastname</label>
										<input type="text"  class="form-control" id="lname" name="lname" value="<?php echo $lname?>" placeholder="Lastname"required>
									   </div>
									   
									   <div class="form-group input-group">
										<label class="col-sm-2 control-label">Username</label>
										<input type="text"  class="form-control" id="username" name="username" value="<?php echo $uname?>" placeholder="Username"required>
									   </div>
									   
									   <div class="form-group input-group">
										<label class="col-sm-2 control-label">Password</label>
										<input type="password"  class="form-control" id="password" name="password" placeholder="Password"required>
									   </div>
									   
									   
                               
										    <div class="col-md-11">
						           				 <button name="update" class="btn btn-success">Update</button>
												 <a button id="cancel" name="cancel" class="btn btn-danger" href="manage_account.php" >Cancel</button></a>
						           			 </div>
											 <br>
											 <br>
											 <br>
											 <br>
                                   
									</tr>
									</tbody>
						            </div>
									</center>
                                 </form>      
                                    
                            </div>                          
                        </div>                     
                    </div>                   
                </div>
			</div>
		</div>	
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