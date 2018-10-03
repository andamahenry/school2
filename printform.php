<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
include("connect.php");


<?php
session_start();
if (!isset($_SESSION['username']) || ($_SESSION['password'] == '')) {
	header("location:index.php");
	exit();
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
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">


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

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="../img/favicon.png">
  
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
  <body>

                <!-- Page Heading -->
                <div id="page-wrapper">
		  
				<nav>
				<div class="row">
		<div class="col-md-12">
					<form name="form" enctype="multipart/form-data" method="post" class="form-horizontal">
							<fieldset>
							<script type="text/javascript">
					<!--
					function updatesum() {
					document.form.to_total.value = (document.form.electric.value -0) + (document.form.water.value -0) + (document.form.rental.value -0);
					}
					//-->
				</script>
							<!-- Text input-->
			<div class = "col-md-10 col-md-offset-1">		  
				<div class="panel panel-default">
						<div class="panel-body">
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="to_etd">Name:</label>  
							  <div class="col-md-0">
							  <?php
									$id=$_GET['id'];
									$query = mysql_query("select * FROM tenant where tenant_id='$id'")or die(mysql_error());
									while($rec=mysql_fetch_array($query)){
									
							  echo "<div class='col-md-1 control-label'> ".$rec['fname']."&nbsp;".$rec['lname'].""; }?>
							  </div>
							  </div>
							  <?php
				$monthh = strtotime('now');
				$mon = date('F',$monthh);
				?>
							  <label class="col-md-7 control-label" for="to_eta">Month of&nbsp;<?php echo"$mon";?></label>  
							  <div class="col-md-3">
							  
								
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="to_regis">Room:</label>
							  <?php
									$id=$_GET['id'];
									$query = mysql_query
									("select * FROM tenant, room where tenant.room_id = room.room_id AND tenant.tenant_id='$id'")or die(mysql_error());
									while($rec=mysql_fetch_array($query)){
									
							  echo"<div class='col-md-1 control-label'> Room&nbsp;".$rec['room_id'].""; }?>
							  </div>
							</div>
								<div class = "col-md-9 col-md-offset-4">
									<h4>Payments</h4>
								</div>
							<!-- Text input-->
							
							<div class="form-group">
							  <label class="col-md-4 control-label" for="electric">Electricity</label>  
							  <div class="col-md-3">
							  
							  <?php
									$id=$_GET['id'];
									$sql = "SELECT * FROM tenant, room, electricity WHERE tenant.room_id = room.room_id AND 
											room.room_id = electricity.room_id AND tenant.tenant_id='$id'";
									$qry = mysql_query($sql);
									$rec = mysql_fetch_array($qry);
									$rmnum = "$rec[room_id]";
									$elect = "$rec[amount]";
									
									$sqll = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
									AND room.room_id = '$rmnum'";
									$qryy = mysql_query($sqll);
									$numrows = mysql_num_rows($qryy);
									
									$elec_div = $elect/$numrows;
									
									echo "<input id='electric' name='electric' onChange='updatesum()' 
									type='text' value='".$elec_div."' readonly class='form-control input-md'>";
								?>
							</div>
							</div>
							

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="water">Water</label>  
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
							  <label class="col-md-4 control-label" for="rental">Rental</label>
							  <div class="col-md-3">
							  
							  <?php
									$id=$_GET['id'];
									$sql1 = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id AND 
											tenant.tenant_id='$id'";
									$qry1 = mysql_query($sql1);
									$rec = mysql_fetch_array($qry1);
									$rmnum = "$rec[room_id]";
									$rent = "$rec[rental]";
									
									$sqlls = "SELECT * FROM tenant, room WHERE tenant.room_id = room.room_id 
									AND room.room_id = '$rmnum'";
									$qryys = mysql_query($sqlls);
									$numrows = mysql_num_rows($qryys);
									
									$rent_div = $rent/$numrows;
									
									echo "<input id='rental' name='rental' onChange='updatesum()' 
									type='text' value='".$rent_div."' readonly class='form-control input-md'>";
									
									$total_bill = $elec_div + $water + $rent_div;
									
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
							  <label class="col-md-3 control-label" for="to_etd">Issued by:</label>  
							  <div class="col-md-1 control-label">
							  <?php
				//Check to see if the user is logged in.
				
				if(isset($_SESSION['username']))
				{ 
				echo 
				"".$_SESSION['username']. " ";
				}

				?>
							  </div>
							  
							</div>
							<div class="form-group">
							  <label class="col-md-3 control-label" for="to_regis">Date issue:</label>  
							  <div class="col-md-1 control-label">
							   <?php
								print date("F,jS,Y", time());
								?>
							  </div>
							</div>
						</div>
				</div>
			</div>
	  <div class="col-md-8 col-md-offset-4">
	  
	  <div class="control">
	    <a button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="javascript:window.print()" style="cursor:pointer; float:left;"><i class="icon-print"></i> Print Bill</a></button>
	  </div>
	  </div>

											
</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
