<?php
mysql_select_db('register',mysql_connect('localhost','root',''))or die(mysql_error());
?>

<?php
//require_once('session1.php');
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
    <title>Bill</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/print.css" rel="stylesheet" type="text/css" media="print">

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
				<nav>
				 <div id="page-wrapper">
				<br>
				<div class="row">
		<div class="col-md-12">
					<form name="form" enctype="multipart/form-data" method="post" class="form-horizontal">
							<!-- Text input-->
			<div class = "col-md-10 col-md-offset-1">	
				<div class="panel panel-default">
						<div class="panel-body">
							<!-- Text input-->
							<div class="form-group">
							<div class="table-responsive">
							  <label class="col-md-2 control-label" id="tenant_id" name="tenant_id"  for="to_etd">Name:</label>  
							  <div class="col-md-0">
							  <?php
									$id=$_GET['id'];
									$query = mysql_query("select * FROM user where tenant_id='$id'")or die(mysql_error());
									while($rec=mysql_fetch_array($query)){
									
								echo "<div class='col-md-1 control-label'> ".$rec['fname']."&nbsp;".$rec['lname'].""; 
								}?>
							  </div>
							  <label class="col-md-2 col-md-offset-1 control-label" id="room_id" name="room_id" for="to_regis">Class:</label>
							  <?php
									$id=$_GET['id'];
									$query = mysql_query("select * FROM tenant, room where tenant.room_id = room.room_id AND tenant.tenant_id='$id'")or die(mysql_error());
									while($rec=mysql_fetch_array($query)){
									
							  echo"<div class='col-md-1 control-label'> Class&nbsp;".$rec['room_id'].""; 
							  $tenantid = "$rec[tenant_id]";
							  $room_id = "$rec[room_id]";
							  }?>
							  </div>
							  
							<?php
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							?>
							  <label class="col-md-4 control-label" for="to_eta">Month of&nbsp;<?php echo"$mon";?></label>  
							 </div>
								<div class = "col-md-9 col-md-offset-4">
									<h4>Payments</h4>
								</div>
							<!-- Text input-->
							
							<div class="form-group">
							  <label class="col-md-4 control-label" for="amount">Security</label>  
							  <div class="col-md-3">
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
									$id=$_GET['id'];
									if(($nwww >= "$nww-$jan") && ($nwww < "$nww-$feb")){
											$janss = "$nww-$jan";
												$febss = "$nww-$feb";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$feb") && ($nwww < "$nww-$mar")){
											$febss = "$nww-$feb";
												$marss = "$nww-$mar";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$mar") && ($nwww < "$nww-$apr")){
											$marss = "$nww-$mar";
												$aprss = "$nww-$apr";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$apr") && ($nwww < "$nww-$may")){
											$aprss = "$nww-$apr";
												$mayss = "$nww-$may";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$may") && ($nwww < "$nww-$jun")){
											$mayss = "$nww-$may";
												$junss = "$nww-$jun";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$jun") && ($nwww < "$nww-$jul")){
											$junss = "$nww-$jun";
												$julss = "$nww-$jul";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$jul") && ($nwww < "$nww-$aug")){
											$julss = "$nww-$jul";
												$augss = "$nww-$aug";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$aug") && ($nwww < "$nww-$sep")){
											$augss = "$nww-$aug";
												$sepss = "$nww-$sep";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$sep") && ($nwww < "$nww-$oct")){
											$sepss = "$nww-$sep";
												$octss = "$nww-$oct";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$oct") && ($nwww < "$nww-$nov")){
											$octss = "$nww-$oct";
												$novss = "$nww-$nov";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$nov") && ($nwww < "$nww-$dec")){
											$novss = "$nww-$nov";
												$decss = "$nww-$dec";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
								<?php
									$id=$_GET['id'];
									if(($nwww >= "$nww-$dec") && ($nwww < "$ll-$jan")){
											$decss = "$nww-$dec";
												$janss = "$ll-$jan";
												$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
														room.room_id = electricity.room_id AND tenant.tenant_id='$id' AND 
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
										
									
									echo "<input id='amount' name='amount' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								}?>
							</div>
							</div>
							

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="water">Admission Fee</label>  
							  <div class="col-md-3">
							  <?php 
									$id=$_GET['id'];
									$sql = "SELECT * FROM tenant WHERE tenant_id='$id'";
									$qry = mysql_query($sql);
									$rec = mysql_fetch_array($qry);
									$water = "$rec[water]";
									
									echo "<input id='water' name='water' type='text' onChange='updatesum()' 
									value='".$water."' readonly class='form-control input-md'>";
							  ?>
							  
							
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="rental">Monthly Fee</label>
							  <div class="col-md-3">
							  <?php
									$id=$_GET['id'];
									$sql1 = "SELECT * FROM tenant, room, discount WHERE tenant.room_id = room.room_id 
									AND tenant.dis_id=discount.dis_id AND tenant.tenant_id='$id'";
									$qry1 = mysql_query($sql1);
									$rec = mysql_fetch_array($qry1);
									$rmnum = "$rec[room_id]";
									$rent = "$rec[rental]";
									$dis_val = "$rec[dis_val]";
									
									
									
									$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
									AND room.room_id = '$rmnum'";
									$qryys = mysql_query($sqlls);
									$numrows = mysql_num_rows($qryys);
									
									$rent_div = $rent/$numrows;
									$dis_ttl = $rent_div * $dis_val;
									$rent_ttl = $rent_div - $dis_ttl;
									
									echo "<input id='rental' name='rental' onChange='updatesum()' 
									type='text' value='".$rent_ttl."' readonly class='form-control input-md'>";
									
								?>
							  </div>
							  <div class="col-md-2">
							  <?php
									$id=$_GET['id'];
									$sql1 = "SELECT * FROM tenant, discount WHERE tenant.dis_id=discount.dis_id 
									AND tenant.tenant_id='$id'";
									$qry1 = mysql_query($sql1);
									$rec = mysql_fetch_array($qry1);
									$dis_prc = "$rec[dis_prc]";
									
									echo "<i>Discounted by $dis_prc</i>";
									
									$total_bill = $elec_div + $water + $rent_ttl;
									
								?>
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
							  
							  <label class="col-md-4 control-label" for="to_total">Total</label>  
							  <div class="col-md-3">
							  <input id="to_total" name="to_total" value="<?php echo "$total_bill"; ?>"readonly class="form-control input-md">
								
							  </div>
							</div>
							<br>
							<div class="form-group">
							  <label class="col-md-3 control-label" id="issued" name="issued" for="to_etd">Issued by:</label>  
							  <div class="col-md-1 control-label">
							  <?php
				if(isset($_SESSION['fname']))
				{ 
				echo 
				"".$_SESSION['fname']. "&nbsp;".$_SESSION['lname']. " ";
				}
				
				?>
							  </div>
							  
							</div>
							<div class="form-group">
							  <label class="col-md-3 control-label" id="date" name="date" for="to_regis">Date issue:</label>  
							  <div class="col-md-1 control-label">
							   <?php
								print date("F,jS,Y", time());
								?>
							  </div>
							</div>
						</div>
				</div>
			</div>
			
	  <div class="col-md-8 col-md-offset-5">
	  <div class="empty">
	  <div class="control">
	  <br>
	  &nbsp;<button type="submit" id="save" name="save" class="btn btn-success">Save Bill</button>
	  <a button type="button" href="bill_tenant.php" class="btn btn-primary">Back</a></button>
	  </div>
	  </div>
	  </div>
		<?php
	if (isset($_POST['save'])){
	
	$monthh = strtotime('now');
	$mon = date('Y-m-d',$monthh);
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
	
	//HALIN DI
	if(($nwww >= "$nww-$jan") && ($nwww < "$nww-$feb")){
	$janss = "$nww-$jan";
	$febss = "$nww-$feb";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$janss' AND date_issued  < '$febss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$feb") && ($nwww < "$nww-$mar")){
	$febss = "$nww-$feb";
	$marss = "$nww-$mar";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_ttl' AND ttl_water='$water' 
						AND date_issued > '$febss' AND date_issued  < '$marss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_ttl', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	//HALIN DI
	if(($nwww >= "$nww-$mar") && ($nwww < "$nww-$apr")){
	$marss = "$nww-$mar";
	$aprss = "$nww-$apr";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$marss' AND date_issued  < '$aprss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$apr") && ($nwww < "$nww-$may")){
	$aprss = "$nww-$apr";
	$mayss = "$nww-$may";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$aprss' AND date_issued  < '$mayss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$may") && ($nwww < "$nww-$jun")){
	$mayss = "$nww-$may";
	$junss = "$nww-$jun";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$mayss' AND date_issued  < '$junss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$jun") && ($nwww < "$nww-$jul")){
	$junss = "$nww-$jun";
	$julss = "$nww-$jul";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$junss' AND date_issued  < '$julss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$jul") && ($nwww < "$nww-$aug")){
	$julss = "$nww-$jul";
	$augss = "$nww-$aug";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$julss' AND date_issued  < '$augss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$aug") && ($nwww < "$nww-$sep")){
	$augss = "$nww-$aug";
	$sepss = "$nww-$sep";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$augss' AND date_issued  < '$sepss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$sep") && ($nwww < "$nww-$oct")){
	$sepss = "$nww-$sep";
	$octss = "$nww-$oct";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$sepss' AND date_issued  < '$octss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$oct") && ($nwww < "$nww-$nov")){
	$octss = "$nww-$oct";
	$novss = "$nww-$nov";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$octss' AND date_issued  < '$novss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}//ASTA DI
	if(($nwww >= "$nww-$nov") && ($nwww < "$nww-$dec")){
	$novss = "$nww-$nov";
	$decss = "$nww-$dec";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$novss' AND date_issued  < '$decss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}
	if(($nwww >= "$nww-$dec") && ($nwww < "$ll-$jan")){
	$decss = "$nww-$dec";
	$janss = "$ll-$jan";
	$qry = mysql_query("SELECT * FROM bill WHERE tenant_id = '$tenantid' AND room_id = '$room_id'
						AND ttl_electric = '$elec_div' AND ttl_rental = '$rent_div' AND ttl_water='$water' 
						AND date_issued > '$decss' AND date_issued  < '$janss'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Student Already paid');
										</script>
								<?php
								}
								else{
								mysql_query("INSERT INTO `billdb`.`bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) 
								VALUES('', '$elec_div', '$rent_div', '$water', '$mon', '$tenantid', '$room_id', '".$_SESSION['fname']. " ".$_SESSION['lname']. "','0')")or die(mysql_error());
								
								?>
							<script>
							alert('Succsessfully Save');
							window.location = "billed.php";
							</script>
							<?php
							}
							}	//ASTA DI							
	}
							?>									
							</div>

							</form>	
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

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

</body>

</html>
