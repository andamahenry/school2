<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
include("connect.php");
require_once('session1.php');

if(isset($_POST['register']))
{
	$id = $_POST['memi'];
	
	$grade=$_POST['grade'];
	$points=$_POST['points'];
	$gfrom=$_POST['gfrom'];
	$gto=$_POST['gto'];
	$comment=$_POST['comment'];	
		
$sql=mysql_query("UPDATE `paper_grades_alevel` SET `fro`='$gfrom', `max`='$gto', `grade`='$grade', points='$points', `comment`='$comment' 
	WHERE id='$id' ",$con) or die('Kano'.mysql_error());
		//print $id;
	header("location: gradinga.php");
			
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

  <link rel="shortcut icon" href="assets/img/calculator.png">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title> Edit A-Level Grades</title>

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

                <!-- Page Heading -->
                <div id="page-wrapper">
				<br>
				<nav>
				<div id="block_bg" class="block">	
					<div class="navbar navbar-inner block-header">
						<div class="block-content collapse in">
							<div class="span12">
								<!-----------------------form --------------------->
								
					<section class="content-header">
					  <h1>
						Edit Grades
					  </h1>
 
					</section>
					<!-- Main content -->
					  <!-- Default box -->
						<div class="box-body">
						 <!-- general form elements -->
						  <div class="box box-primary">
							<div class="box-header with-border">
							  <h3 class="box-title">All Fields are required</h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<?php
								$id=$_GET['id'];
								$result = mysql_query("SELECT * FROM paper_grades_alevel WHERE id='$id'",$con);
								for($i=0; $row = mysql_fetch_array($result); $i++){
							?>				 
						 <form method="post" enctype="multipart/form-data" class="form-horizontal">
						
							<div class="container"> 
							  <div class="row">
								<div class="col-xs-5">
								  <label for="exampleInputEmail1">Grade</label>
								   <input type="text"  name="grade"  class="form-control" id="exampleInputEmail1"  value="<?php echo $row['grade']; ?>">
								 </div>
								 <div class="col-xs-5">
								<label for="exampleInputEmail1">Points</label>
								  <input type="hidden" name="memi" value="<?php echo $id; ?>" />
								  <input type="text"  name="points"  class="form-control" id="exampleInputEmail1"  value="<?php echo $row['points']; ?>">
								</div>
							   
							</div>
							</br>
							
							 <div class="row">
								<div class="col-xs-5">
								<label for="exampleInputEmail1">Marks From</label>
								  <input type="text"  name="gfrom"  class="form-control" id="exampleInputEmail1"  value="<?php echo $row['fro']; ?>">
								</div>
							   <div class="col-xs-5">
								  <label for="exampleInputEmail1">To</label>
								   <input type="text"  name="gto"  class="form-control" id="exampleInputEmail1"  value="<?php echo $row['max']; ?>" >
								 </div>
							</div>
							
							</br>
						   <div class="row">
									<div class="col-xs-10">
								  <label for="exampleInputEmail1">Comment</label>
								  <input type="text"  name="comment" class="form-control" id="skills"  value="<?php echo $row['comment']; ?>">
								</div>
								  </div>
						 </br>
								<div>
								<button type="submit" name="register" class="btn btn-primary">Update</button>
								</div>	
						 </br>
						 </br>
						</form>		   
				<?php
				}
				?> 

			</div>
		</div>
	</div>
</div>
									
</nav>
</div>
</div>										
</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

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
	<?php include('script.php'); ?>

<script>
function _submitForm(){
	//document.getElementById('form_details').submit();
	document.getElementById('my_submit').click();
}

</script>
<body>
</html>