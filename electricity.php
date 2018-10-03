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
    <title>Edit Security</title>

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
			</body>
                <!-- Page Heading -->
				<nav>
				<head>
				<?php $nwww = date("F",strtotime("Now")); ?>
				<center><h4><strong>Security Amount for the Month of <?php echo"$nwww";?></strong><h4></center>
					   <div class="col-sm-12">
					<div class="form-group">
					<form class="form-horizontal" role="form" method="post">
	
					<div class="span7" id="">  
                    <div class="row-fluid">
					  
                        <!-- block -->						
                        <div id="block_bg" class="block">	
                            <div class="navbar navbar-inner block-header">
                            <div class="block-content collapse in">
                                <div class="span12">
								<!-----------------------form --------------------->
									<form method="post">
									<div class="table-responsive">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										  <tr>
										  <th></th>
												<th><strong>Class</strong></th>
												<th><center><strong>Security Amount</strong></center></th>
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
									//HALIN DI
									if(($nwww >= "$nww-$jan") && ($nwww < "$nww-$feb")){
									$janss = "$nww-$jan";
									$febss = "$nww-$feb";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$janss' AND electricity.date_st < '$febss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}

									if(($nwww >= "$nww-$feb") && ($nwww < "$nww-$mar")){
									$febss = "$nww-$feb";
									$marss = "$nww-$mar";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$febss' AND electricity.date_st < '$marss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}		//ASTA DI
									
									//HALIN DI
									if(($nwww >= "$nww-$mar") && ($nwww < "$nww-$apr")){
									$marss = "$nww-$mar";
									$aprss = "$nww-$apr";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$marss' AND electricity.date_st < '$aprss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$apr") && ($nwww < "$nww-$may")){
									$aprss = "$nww-$apr";
									$mayss = "$nww-$may";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$aprss' AND electricity.date_st < '$mayss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$may") && ($nwww < "$nww-$jun")){
									$marss = "$nww-$may";
									$aprss = "$nww-$apr";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$marss' AND electricity.date_st < '$aprss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$jun") && ($nwww < "$nww-$jul")){
									$junss = "$nww-$jun";
									$julss = "$nww-$jul";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$junss' AND electricity.date_st < '$julss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$jul") && ($nwww < "$nww-$aug")){
									$julss = "$nww-$jul";
									$augss = "$nww-$aug";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$julss' AND electricity.date_st < '$augss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$aug") && ($nwww < "$nww-$sep")){
									$augss = "$nww-$aug";
									$sepss = "$nww-$sep";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$augss' AND electricity.date_st < '$sepss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$sep") && ($nwww < "$nww-$oct")){
									$sepss = "$nww-$sep";
									$octss = "$nww-$oct";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$sepss' AND electricity.date_st < '$octss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$oct") && ($nwww < "$nww-$nov")){
									$octss = "$nww-$oct";
									$novss = "$nww-$nov";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$octss' AND electricity.date_st < '$novss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$nov") && ($nwww < "$nww-$dec")){
									$novss = "$nww-$nov";
									$decss = "$nww-$dec";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$novss' AND electricity.date_st < '$decss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}
									
									if(($nwww >= "$nww-$dec") && ($nwww < "$ll-$jan")){
									$decss = "$nww-$dec";
									$janss = "$ll-$jan";
									$user_query = mysql_query("SELECT * FROM electricity, room
									WHERE electricity.room_id = room.room_id
									AND electricity.date_st > '$decss' AND electricity.date_st < '$janss'")or die(mysql_error());
									while($row = mysql_fetch_array($user_query)){
									$id = $row['room_id'];
									?>
									<tr><td width="30"></td>
									<td><strong><?php echo $row['room_name']; ?><strong></td>
									<td width="100"><input type='text' readonly class="form-control input-md" value="<?php echo $row['amount']; ?>"></td>
									<td class="col-md-1">
									<center><a button class="btn btn-success" title="Click here to Edit the Security." href="edit_electricity.php<?php echo '?id='.$row['room_id'];?>">Edit Security</a></center></td>
									</center>
									</tr><?php }}//ASTA DI
									
									?>
												
										</tbody><!--Sample comment for HTML-->
									</table>
								</form>
									
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

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