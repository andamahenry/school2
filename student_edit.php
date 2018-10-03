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

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>View Student</title>

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
				<nav>
				<?php
					$class = $_GET['id'];
					$user_query = mysql_query("select * from students where room_name='$class' ORDER BY fname ASC")or die('Leeero luno: '.mysql_error());
					while($row = mysql_fetch_array($user_query)){
					$id = $row['sno'];
					$room_name = $row['room_name'];
					//$rent = $row['rental'];
					}
					?>
				<center><h4><strong>Student Form, &nbsp;<?php echo $class; ?></strong><h4></center>
				<div class="col-sm-12">
				<div class="span7" id="">  
                     <div class="row-fluid">
					  <?php	
	                   $count_client=mysql_query("select * from admin");
	                   $count = mysql_num_rows($count_client);
                       ?>	
					   <!-- Modal -->
					   
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
							  </div>
							  <div class="modal-body">
							   Are you sure you want to delete this?
							  </div>
							  <div class="modal-footer">
							  <form method = "POST">
								<input type="submit" name="delete" value = "Delete" class="btn btn-danger">
								
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							 
							  </div>
							</div>
						  </div>
						</div>
						<?php
						if(isset($_POST['delete'])){
							$id=$_POST['selector'];
							
							$N = count($id);
							for($i=0; $i < $N; $i++)
							{
								$result = mysql_query("DELETE FROM students where sno='$id[$i]'");
							}
						}
							?>
                        <!-- block -->						
                        <div id="block_bg" class="block">	
                            <div class="navbar navbar-inner block-header">
							<br>
							&nbsp;&nbsp;&nbsp;<button type='button' class="btn btn-danger" data-toggle='modal' data-target='#myModal'><i class="glyphicon glyphicon-trash"></i></button>
							<a button type='button' class="btn btn-primary" href="tenant_room.php">Back</a>
													
                            <div class="block-content collapse in">
                                <div class="span12">
						
						<!-----------------------form --------------------->
						<form method="post">
						<div class="table-responsive">
						<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
					
						<thead>
						<tr>
						<th></th>
						<th><center>Firstname</center></th>
						<th><center>Lastname</center></th>
						<th><center>Student NO:</center></th>
						<th><center>Guardian</center></th>
						<th><center>Address</center></th>
						<th><center>Contact</center></th>
						<th><center>A/C Number</center></th>
						<th><center>Photo</center></th>
						<th><center>Action</center></th>
						<script src="../js/jquery.dataTables.min.js"></script>
						<script src="../js/DT_bootstrap.js"></script>
						<th></th>
					   </tr>
						</thead>
						<tbody>
						<?php 
						$class=$_GET['id'];
						$query=mysql_query("SELECT * FROM students WHERE room_name = '$class'")or die('Hooo Kakano: '.mysql_error());
						while($row=mysql_fetch_array($query)){
						$id = $row['sno'];
						?>
									
						<tr>
						<td width="30">
						<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
						</td>
						<td><?php echo $row['fname']; ?></td>
						<!--td><center><?php //echo $row['mname']; ?></center></td-->
						<td><?php echo $row['lname']; ?></td>
						<td><?php echo $row['sno']; ?></td>
						<td><?php echo $row['nname']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><center><?php echo $row['contact']; ?></center></td>
						<td><center><?php echo $row['account']; ?></center></td>
						<td><center><img src="uploads/<?php echo $row['photo']; ?>" width="35px" height="35px"/></center></td>
					
						<td class="col-md-1">
						<center><a href="edit_tenant.php <?php echo '?id='.$id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
						</center>
						</td>			
						</tr>
						<?php } ?>
					</tbody>
					</table>
					</form>
					<p><i style="color:red; background-color:yellow"><h4>Note: Please check the checkbox if you want to delete a Student!!!</h4></i></p>
                    </div>
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
	</nav>
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
</body>

</html>
