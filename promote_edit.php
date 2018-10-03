<?php
include("connect.php");
require_once('session1.php');

if(isset($_GET['submit_mult'])){
	echo "promote student.'<br>'";
	//die('Script executed successfully');
}
if(isset($_GET['stop_mult'])){
	
	echo "Deactivate student.'<br>'";
	//die('Script executed successfully');
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

	<script src="js/tablesearch.js" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Promote/Demote</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="assets/img/calculator.png">
	
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
			<!--The side bar menu script goes in here-->
            <!-- /.navbar-collapse -->
        </nav>
<div id="page-wrapper">
	<div class="container-fluid">
	
<div class="box">		 
 <div class="box-body">   
<div class="table-responsive">

<form action="" method="post">
	<table class="table table-bordered table-striped" id="example">
	   
		<thead>
			<tr>
	
	<th>Student No.</th>
	<th>Name</th>
	<th>Class</th>
	
			</tr>
		</thead>
		<tbody>
			
			
			<?php

			$id=$_POST['selector'];
			$N = count($id);
			for($i=0; $i < $N; $i++)
			{
			$result = mysql_query("SELECT * FROM students where tenant_id='$id[$i]'",$con);
			while($row = mysql_fetch_array($result))
			{ ?>

	<td><?php echo $row['sno']; ?></td>
	<td><?php echo $row['fname'].'&nbsp;'.$row['lname']; ?></td>
	<td><?php echo $row['room_name']; ?></td>
	
	<input name="id[]" type="hidden" value="<?php echo  $row['tenant_id'] ?>" />
	<input name="class[]" type="hidden" value="<?php echo  $row['room_name'] ?>" />
	<input name="active[]" type="hidden"  value="No" />

	</tr>
	<?php 
	}
	}
	?>

	<!-- Modal -->
	
	</div>
	</div>
	</tr>
							
	<!-- Modal Bigger Image -->
								
	</tbody>
	</table>
	<div class='row'>
		<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
			<!--button class="btn btn-success addmore" name="submit_mult" type="submit" formaction="promote_save.php">+ Promote </button-->
			<button class="btn btn-success addmore" name="submit_mult" type="submit" >+ Promote </button>
		</div>	
		<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
			<button class="btn btn-danger delete" name="stop_mult" type="submit" >- Stop Students</button>
		</div>					
	</div>		
</form>
        </div>
    </div>
</div>
    </div>
    </div>
	</nav>
    <!-- /#wrapper -->
	
	<!--js searchBox script-->
	<script src="js/tablesearch.js" />
	
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
       <?php include('script.php'); ?>
</body>

</html>
