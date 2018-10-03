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
    <title>Security Amount</title>
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
		<!--//////////////////////////////// Add Dialog ///////////////////////////////////////////-->

 <div class="container-fluid">
				<?php
				$monthh = strtotime('now');
				$mon = date('F',$monthh);
				?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">&nbsp;Add Security</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
							<!--------------------form------------------->
								<form method="post">
								<div class="form-group">
  <form class="form-horizontal" role="form" method="post">
  <center><h2>Security Amount in the month of <?php echo"$mon";?></h2></center>
				<br>
							<label class="col-sm-1 col-md-1 col-md-offset-1 control-label">Class:</label>
							<div class="controls col-sm-3">
								<select id="room_id" name="room_id" class="form-control" required>
									<option></option>
								<?php 
								$query=mysql_query("select * from room");
								while($row=mysql_fetch_array($query))
								 { ?>
									<option value="<?php echo $row['room_id'];?>"><?php echo $row['room_name'];?> </option>
									<?php } ?>
								</select>
							
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 col-md-1 col-md-offset-1  control-label">Amount:</label>
					<div class="col-sm-3">
					<input type="number" name="amount" id = "amount" class="form-control input-md" placeholder="Amount" required/> 
					</div>
					<br>
					<br>
					<div class="col-md-8 col-md-offset-5">
						<button type="submit" id="submit" name="save" class="btn btn-success">Save</button>
						</div>
						</div>
						</div>
						</form>
						
					<?php
						if (isset($_POST['save'])){
						$nwd = date("d",strtotime("now"));
						if(($nwd >= 12) && ($nwd <= 16)){
						
								$nw = date("m-d",strtotime("now"));
								
								$jans = date("m-d",strtotime("Jan 12"));								
								$jane = date("m-d",strtotime("Jan 16"));
								
								$febs = date("m-d",strtotime("Feb 12"));								
								$febe = date("m-d",strtotime("Feb 16"));
								
								$mars = date("m-d",strtotime("Mar 12"));								
								$mare = date("m-d",strtotime("Mar 16"));
								
								$aprs = date("m-d",strtotime("Apr 12"));								
								$apre = date("m-d",strtotime("Apr 16"));
								
								$mays = date("m-d",strtotime("May 12"));								
								$maye = date("m-d",strtotime("May 16"));
								
								$juns = date("m-d",strtotime("Jun 12"));								
								$june = date("m-d",strtotime("Jun 16"));
								
								$juls = date("m-d",strtotime("Jul 12"));								
								$jule = date("m-d",strtotime("Jul 16"));
								
								$augs = date("m-d",strtotime("Aug 12"));								
								$auge = date("m-d",strtotime("Aug 16"));
								
								$seps = date("m-d",strtotime("Sep 12"));								
								$sepe = date("m-d",strtotime("Sep 16"));
								
								$octs = date("m-d",strtotime("Oct 12"));								
								$octe = date("m-d",strtotime("Oct 16"));
								
								$novs = date("m-d",strtotime("Nov 12"));								
								$nove = date("m-d",strtotime("Nov 16"));
								
								$decs = date("m-d",strtotime("Dec 12"));
								$dece = date("m-d",strtotime("Dec 16"));
												
								if(($nw >= $jans)&&($nw <= $jane)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$jans' AND date_end = '$ll-$jane'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$jans','$ll-$jane')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $febs)&&($nw <= $febe)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$febs' AND date_end = '$ll-$febe'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$febs','$ll-$febe')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $mars)&&($nw <= $mare)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$mars' AND date_end = '$ll-$mare'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$mars','$ll-$mare')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $aprs)&&($nw <= $apre)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$aprs' AND date_end = '$ll-$apre'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$aprs','$ll-$apre')")or die(mysql_error());														
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $mays)&&($nw <= $maye)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$mays' AND date_end = '$ll-$maye'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$mays','$ll-$maye')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $juns)&&($nw <= $june)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$juns' AND date_end = '$ll-$june'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$juns','$ll-$june')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $juls)&&($nw <= $jule)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$juls' AND date_end = '$ll-$jule'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$juls','$ll-$jule')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $augs)&&($nw <= $auge)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$augs' AND date_end = '$ll-$auge'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$augs','$ll-$auge')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $seps)&&($nw <= $sepe)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$seps' AND date_end = '$ll-$sepe'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$seps','$ll-$sepe')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $octs)&&($nw <= $octe)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$octs' AND date_end = '$ll-$octe'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$octs','$ll-$octe')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $novs)&&($nw <= $nove)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$novs' AND date_end = '$ll-$nove'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$novs','$ll-$nove')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
									elseif(($nw >= $decs)&&($nw <= $dece)){									
									$ll = date("Y", strtotime("now")); 
									$room_id=$_POST['room_id'];
									$amount=$_POST['amount'];
									
									$qry = mysql_query("SELECT * FROM electricity WHERE room_id = '$room_id'
											AND date_st = '$ll-$decs' AND date_end = '$ll-$dece'")or die(mysql_error());
									$count = mysql_num_rows($qry);
										
										if($count > 0) {?>
										<script>
										alert('Class Already Exist');
										</script>
										<?php
										}
										else{
										mysql_query("INSERT INTO `electricity` (`amount`, `room_id`, `date_st`, `date_end`) 
										VALUES('$amount','$room_id','$ll-$decs','$ll-$dece')")or die(mysql_error());
										?>
										<script>
										alert('Succsessfully Save');
										window.location = "electric_bill.php";
										</script>
										<?php
										}
									}
								//ELSE IF KA DI TILL DECEMBER
								else{
								
									echo"ERROR";
									
								}	
						}
						else{?>
										<script>
										alert('Its not yet time to payment');
										</script>
										<?php
						}
					}
					?>
						
								</div>
				<div class="row">
					<div class="col-md-12">
						<?php 								
								$nw = date("m-d",strtotime("now"));
						
								$jans = date("m-d",strtotime("Jan 12"));								
								$jane = date("m-d",strtotime("Jan 16"));
								
								$febs = date("m-d",strtotime("Feb 12"));								
								$febe = date("m-d",strtotime("Feb 16"));
								
								$mars = date("m-d",strtotime("Mar 12"));								
								$mare = date("m-d",strtotime("Mar 16"));
								
								$aprs = date("m-d",strtotime("Apr 12"));								
								$apre = date("m-d",strtotime("Apr 16"));
								
								$mays = date("m-d",strtotime("May 12"));								
								$maye = date("m-d",strtotime("May 16"));
								
								$juns = date("m-d",strtotime("Jun 12"));								
								$june = date("m-d",strtotime("Jun 16"));
								
								$juls = date("m-d",strtotime("Jul 12"));								
								$jule = date("m-d",strtotime("Jul 16"));
								
								$augs = date("m-d",strtotime("Aug 12"));								
								$auge = date("m-d",strtotime("Aug 16"));
								
								$seps = date("m-d",strtotime("Sep 12"));								
								$sepe = date("m-d",strtotime("Sep 16"));
								
								$octs = date("m-d",strtotime("Oct 12"));								
								$octe = date("m-d",strtotime("Oct 16"));
								
								$novs = date("m-d",strtotime("Nov 12"));								
								$nove = date("m-d",strtotime("Nov 16"));
								
								$decs = date("m-d",strtotime("Dec 12"));
								$dece = date("m-d",strtotime("Dec 16"));
							
							
							if(($nw >= $jans)&&($nw <= $jane)){	
							$ll = date("Y", strtotime("now"));
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";							
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$jans' AND electricity.date_end = '$ll-$jane'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $febs)&&($nw <= $febe)){	
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";	
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$febs' AND electricity.date_end = '$ll-$febe'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $mars)&&($nw <= $mare)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$mars' AND electricity.date_end = '$ll-$mare'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $aprs)&&($nw <= $apre)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$aprs' AND electricity.date_end = '$ll-$apre'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $mays)&&($nw <= $maye)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$mays' AND electricity.date_end = '$ll-$maye'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $juns)&&($nw <= $june)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$juns' AND electricity.date_end = '$ll-$june'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $juls)&&($nw <= $jule)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$juls' AND electricity.date_end = '$ll-$jule'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $augs)&&($nw <= $augs)){		
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$augs' AND electricity.date_end = '$ll-$augs'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $seps)&&($nw <= $sepe)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$seps' AND electricity.date_end = '$ll-$sepe'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $octs)&&($nw <= $octe)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$octs' AND electricity.date_end = '$ll-$octe'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $novs)&&($nw <= $nove)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$novs' AND electricity.date_end = '$ll-$nove'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							elseif(($nw >= $decs)&&($nw <= $dece)){		
							$ll = date("Y", strtotime("now")); 
							$monthh = strtotime('now');
							$mon = date('F',$monthh);
							echo"<h3>&nbsp;&nbsp;Class that are currently billed in the month of $mon $ll</h3>";
							$qry = mysql_query("SELECT * FROM electricity, room WHERE electricity.room_id = room.room_id AND
									electricity.date_st = '$ll-$decs' AND electricity.date_end = '$ll-$dece'")or die(mysql_error());
							while($rec = mysql_fetch_array($qry)){
								echo "<div class='col-lg-12'>
								<div class='alert alert-success'>
								$rec[room_name] </div></div>";
							}}
							//TAPOSA UNTIL DEC MAN..
							else{echo"<center><h2>Not yet time to Payment<h2></center>";}
						?>
					</div>
				</div>
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