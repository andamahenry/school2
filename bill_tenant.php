<?php
mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
?>

<?php
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

  <link rel="shortcut icon" href="assets/img/calculator.png">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Student Bill</title>

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

			</body>
                <!-- Page Heading -->
				<nav>
				<head>
				<div id="page-wrapper">
					<div class="container-fluid">
					   <div class="span7" id="">  
                     <div class="row-fluid">
                        <!-- block -->						
                        <div id="block_bg" class="block">							
                            <div class="block-content collapse in">
                                <div class="span12">
								
								<!-----------------------form --------------------->
								<form method="post">
								<div class="table-responsive">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
										<thead>
										  <tr>
												<th><center>Class</center></th>
												<th><center>Full Name</center></th>
												<th><center>MontlyFee</center></th>
												<th><center>Security&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></th>
												<th><center>AdmissionFee</center></th>
												<th><center>Bill&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
										<?php 
										$ll = date("Y",strtotime("next year"));
											$nwww = date("Y-m-d",strtotime("Now"));
											$nww = date("Y",strtotime("Now"));
											$jan = date("m-d",strtotime("January 1"));
											$feb = date("m-d",strtotime("February 1"));
											$mar = date("m-d",strtotime("March 1"));
											$apr = date("m-d",strtotime("April 1"));
											$may = date("m-d",strtotime("May 1"));
											$jun = date("m-d",strtotime("June 1"));
											$jul = date("m-d",strtotime("July 1"));
											$aug = date("m-d",strtotime("August 1"));
											$sep = date("m-d",strtotime("September 1"));
											$oct = date("m-d",strtotime("October 1"));
											$nov = date("m-d",strtotime("November 1"));
											$dec = date("m-d",strtotime("December 1"));
											
											
										?>
										<?php
										if(($nwww >= "$nww-$jan") && ($nwww < "$nww-$feb")){
											$janss = "$nww-$jan";
											$febss = "$nww-$feb";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$janss' AND electricity.date_st < '$febss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$janss = "$nww-$jan";
												$febss = "$nww-$feb";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$janss' AND electricity.date_st < '$febss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$feb") && ($nwww < "$nww-$mar")){
											$febss = "$nww-$feb";
											$marss = "$nww-$mar";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$febss' AND electricity.date_st < '$marss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$febss = "$nww-$feb";
												$marss = "$nww-$mar";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$febss' AND electricity.date_st < '$marss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}			
										//IKADUWA NA IF			
										if(($nwww >= "$nww-$mar") && ($nwww < "$nww-$apr")){
											$marss = "$nww-$mar";
											$aprss = "$nww-$apr";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$marss' AND electricity.date_st < '$aprss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$marss = "$nww-$mar";
												$aprss = "$nww-$apr";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$marss' AND electricity.date_st < '$aprss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$apr") && ($nwww < "$nww-$may")){
											$aprss = "$nww-$apr";
											$mayss = "$nww-$may";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$aprss' AND electricity.date_st < '$mayss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$aprss = "$nww-$apr";
												$mayss = "$nww-$may";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$aprss' AND electricity.date_st < '$mayss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
									if(($nwww >= "$nww-$may") && ($nwww < "$nww-$jun")){
											$mayss = "$nww-$may";
											$junss = "$nww-$jun";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$mayss' AND electricity.date_st < '$junss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$mayss = "$nww-$may";
												$junss = "$nww-$jun";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$mayss' AND electricity.date_st < '$junss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$jun") && ($nwww < "$nww-$jul")){
											$junss = "$nww-$jun";
											$julss = "$nww-$jul";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$junss' AND electricity.date_st < '$julss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$junss = "$nww-$jun";
												$julss = "$nww-$jul";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$junss' AND electricity.date_st < '$julss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$jul") && ($nwww < "$nww-$aug")){
											$julss = "$nww-$jul";
											$augss = "$nww-$aug";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$julss' AND electricity.date_st < '$augss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$julss = "$nww-$jul";
												$augss = "$nww-$aug";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$julss' AND electricity.date_st < '$augss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$aug") && ($nwww < "$nww-$sep")){
											$augss = "$nww-$aug";
											$sepss = "$nww-$sep";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$augss' AND electricity.date_st < '$sepss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$augss = "$nww-$aug";
												$sepss = "$nww-$sep";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$augss' AND electricity.date_st < '$sepss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$sep") && ($nwww < "$nww-$oct")){
											$sepss = "$nww-$sep";
											$octss = "$nww-$oct";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$sepss' AND electricity.date_st < '$octss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$sepss = "$nww-$sep";
												$octss = "$nww-$oct";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$sepss' AND electricity.date_st < '$octss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$oct") && ($nwww < "$nww-$nov")){
											$octss = "$nww-$oct";
											$novss = "$nww-$nov";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$octss' AND electricity.date_st < '$novss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$octss = "$nww-$oct";
												$novss = "$nww-$nov";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$octss' AND electricity.date_st < '$novss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$nov") && ($nwww < "$nww-$dec")){
											$novss = "$nww-$nov";
											$decss = "$nww-$dec";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$novss' AND electricity.date_st < '$decss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$novss = "$nww-$nov";
												$decss = "$nww-$dec";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$novss' AND electricity.date_st < '$decss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}
										if(($nwww >= "$nww-$dec") && ($nwww < "$ll-$jan")){
											$decss = "$nww-$dec";
											$janss = "$ll-$jan";
											$user_query = mysql_query("SELECT * FROM room, tenant, electricity
											WHERE room.room_id = tenant.room_id AND room.room_id = electricity.room_id 
												AND electricity.date_st > '$decss' AND electricity.date_st < '$janss'")or die(mysql_error());
											while($row = mysql_fetch_array($user_query)){
											$id = $row['room_id'];
											$tenant_id=$row['tenant_id'];											
										?>									
												<tr>
												<td><center><?php echo $row['room_name'];?></center></td>
												<td><center><?php echo $row['fname'];?>&nbsp; <?php echo $row['lname'];?></center>
												</td>
												<td>												
												<input type='text' readonly class="form-control input-md" value="<?php
									
												$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
														tenant.tenant_id='$tenant_id'";
												$qry1 = mysql_query($sql1);
												$rec = mysql_fetch_array($qry1);
												$rmnum = "$rec[room_id]";
												$rent = "$rec[rental]";
												
												$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryys = mysql_query($sqlls);
												$numrows = mysql_num_rows($qryys);
												
												$rent_div = $rent/$numrows;
												
												echo "$rent_div";
												
											?>">
													
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php
												
												$decss = "$nww-$dec";
												$janss = "$ll-$jan";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$tenant_id' AND 
														electricity.date_st > '$decss' AND electricity.date_st < '$janss' ";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$rmnum = "$rec[room_id]";
												$elect = "$rec[amount]";
												
												$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
												AND room.room_id = '$rmnum'";
												$qryy = mysql_query($sqll);
												$numrows = mysql_num_rows($qryy);
												
												$elec_div = $elect/$numrows;
												
												echo "$elec_div";
											?>">
												</td>
												<td>
												<input type='text' readonly class="form-control input-md" value="<?php 
									
												$sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
												$qry = mysql_query($sql);
												$rec = mysql_fetch_array($qry);
												$water = "$rec[water]";
												
												echo "$water";
										  ?>">
												</td>
												
												<td>
												<a button type="button" class="btn btn-success" href="bill.php<?php echo '?id='.$row['tenant_id'];?>">Generate Bill</a></button>
												</td>
												</tr>
												
													<?php  }}				
													
													?>
												<!--THIS IS THE LAST FOR THE IF OF DATES-->
												<td>
												</td>
												<td></td>
											
												<td align="right">
							
								</tbody>
								</table>
								</form>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
	</head>
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