<?php
include("connect.php");

require_once('session1.php');
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

            <!-- /.navbar-collapse -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<!--The side bar menu script goes in here-->
			<?php include("sidebarmenu.php"); ?>           
			<!--The side bar menu script goes in here-->            <!-- /.navbar-collapse -->

	</nav>
	<div id="page-wrapper">
	<div class="container-fluid">
			
    <!-- Main content -->
    <!--section class="content"-->

      <!-- Default box -->
      
        <div class="box-body">
         <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Type value to search</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
		 
			 <div class="box-body">   
			<div class="table-responsive">
			<form action="promote_edit.php" method="post">
				<table class="table table-bordered table-striped" id="example">
                    <thead>
                        <tr>
                        <th><input id="check_all" class="formcontrol" type="checkbox"/></th>
						<th>Student No.</th>
						<th>Name</th>
						<th>Class</th>
						<th>Section</th>
						<th>Parent</th>
						<th>D.O.Birth</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Photo</th>
					
						</tr>
					</thead>
					<tbody>
					<tr>
						<?php
							$result = mysql_query("select * FROM students WHERE active = 'yes' LIMIT 10");
														
							for($i=0; $row = mysql_fetch_array($result); $i++){
							$id=$row['tenant_id'];
						?>
						<td><input name="selector[]" class="case" type="checkbox" value="<?php echo $id; ?>"></td>
						
						<td><?php echo $row['sno']; ?></td>
						<td><?php echo $row['fname'].'&nbsp;'.$row['lname']; ?></td>
						
						<td><?php echo $row['room_name']; ?></td>
						<td><?php //echo //$row['section']; ?></td>
						<td><?php echo $row['nname']; ?></td>
						<td><?php echo $row['bdate']; ?></td>
						<td>					
							<?php
							$bdate = $row['bdate']; 
							$age = date_diff(date_create($bdate), date_create('now'))->y;
							echo $age;
							?>
						</td>
						<td><?php echo $row['gender']; ?></td>
						<td><img src="uploads/<?php echo $row['photo']; ?>" class="img-rounded" width="35px" height="35px"/></td>
					</tr>
					<?php
						}
					?>
					</tbody>
					</table>
					<button class="btn btn-success pull-right" name="submit_mult" type="submit">Update</button>
				</form>
          
			</div>
        </div>
			
			</div>
			<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->

    </div>
    </div>
    </div>
    </div>
    </div>
	<!--/nav-->
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
