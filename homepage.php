<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
require("connect.php");
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
  <!-- link rel="shortcut icon" href="uploads/shortcut_icon.jpg" -->

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Home</title>

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
                        <a href="manage_account.php"><i class="fa fa-users fa-lg"></i>&nbsp;View User</a>
                    </li>
					<li>
                        <a href="register_form.php"><i class="fa fa-users fa-lg"></i>&nbsp;Add New User</a>
                    </li>
					<li class="divider"></li>
                    <li>
                        <a href="session_logout.php"><i class="fa fa-fw fa-power-off"></i>&nbsp;Log Out</a>
                    </li>
                    </ul>
                </li>
            </ul>
	<!--The side bar menu script goes in here-->
	<?php include("sidebarmenu.php"); ?>           
	<!--The side bar menu script goes in here-->
	
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
			<nav>
			<head>
     <div class="row-fluid">	
              <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <center><h4>Welcome to the School Report System!</h4></center>
                    </div>
               </div>
       </div>
                <!-- Page Heading -->
      <div class="row">
        <!--=================================================== site1 ===================================================-->
				<?php
				$monthh = strtotime('now');
				$mon = date('F',$monthh);
				?>
              <div id="g-site1" class="col-xs-12">
                  <div class="demo-container">
					<strong><h3><center>Updates in the month of <?php echo "$mon"?></center></h3></strong>
						<div id="block_bg" class="block">	
                            <div class="navbar navbar-inner block-header">
                            <div class="block-content collapse in">
                                <div class="span12">
								<form class="form-horizontal" role="form" method="post">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
								<br>
								<br>
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
					
					if(($nwww >= "$nww-$jan") && ($nwww < "$nww-$feb")){
					$janss = "$nww-$jan";
					$febss = "$nww-$feb";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$janss' AND date_issued  < '$febss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `tenant`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$janss' AND date_st  < '$febss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Class</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$feb") && ($nwww < "$nww-$mar")){
					$febss = "$nww-$feb";
					$marss = "$nww-$mar";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$febss' AND date_issued  < '$marss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$febss' AND date_st  < '$marss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Class</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$mar") && ($nwww < "$nww-$apr")){
					$marss = "$nww-$mar";
					$aprss = "$nww-$apr";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$marss' AND date_issued  < '$aprss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$marss' AND date_st  < '$aprss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Class</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$apr") && ($nwww < "$nww-$may")){
					$aprss = "$nww-$apr";
					$mayss = "$nww-$may";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$aprss' AND date_issued  < '$mayss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$aprss' AND date_st  < '$mayss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Class</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$may") && ($nwww < "$nww-$jun")){
					$mayss = "$nww-$may";
					$junss = "$nww-$jun";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$mayss' AND date_issued  < '$junss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$mayss' AND date_st  < '$junss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Class</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$jun") && ($nwww < "$nww-$jul")){
					$junss = "$nww-$jun";
					$julss = "$nww-$jul";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$junss' AND date_issued  < '$julss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$junss' AND date_st  < '$julss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success'>Total Paid: $count Students</td><td class='danger'>Total UnPaid: $unbilled Student</td></tr>
					<tr><td class='danger'>Total Students: $counts Students</td><td class='warning'>Total Paid on Security: $countt Class</td></tr>";
					}
					
					if(($nwww >= "$nww-$jul") && ($nwww < "$nww-$aug")){
					$julss = "$nww-$jul";
					$augss = "$nww-$aug";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$julss' AND date_issued  < '$augss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$julss' AND date_st  < '$augss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Class</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$aug") && ($nwww < "$nww-$sep")){
					$augss = "$nww-$aug";
					$sepss = "$nww-$sep";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$augss' AND date_issued  < '$sepss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$augss' AND date_st  < '$sepss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Classes</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$sep") && ($nwww < "$nww-$oct")){
					$sepss = "$nww-$sep";
					$octss = "$nww-$oct";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$sepss' AND date_issued  < '$octss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$sepss' AND date_st  < '$octss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Classes</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$oct") && ($nwww < "$nww-$nov")){
					$octss = "$nww-$oct";
					$novss = "$nww-$nov";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$octss' AND date_issued  < '$novss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$octss' AND date_st  < '$novss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Classes</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$nov") && ($nwww < "$nww-$dec")){
					$novss = "$nww-$nov";
					$decss = "$nww-$dec";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$novss' AND date_issued  < '$decss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$novss' AND date_st  < '$decss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total UnPaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Classes</h4></strong></td></tr>";
					}
					
					if(($nwww >= "$nww-$dec") && ($nwww < "$ll-$jan")){
					$decss = "$nww-$dec";
					$janss = "$ll-$jan";
					
					$qry = mysql_query("SELECT * FROM bill WHERE date_issued > '$decss' AND date_issued  < '$janss'")or die(mysql_error());
					$count = mysql_num_rows($qry);
					$qrys = mysql_query("SELECT * FROM `students`")or die(mysql_error());
					$counts = mysql_num_rows($qrys);
					$unbilled = $counts - $count;
					$qryt = mysql_query("SELECT * FROM electricity WHERE date_st > '$decss' AND date_st  < '$janss'")or die(mysql_error());
					$countt = mysql_num_rows($qryt);
					
					echo"<tr><td class='success' height='50'><strong><h4>Total Paid: $count Students</h4></strong></td><td class='danger' height='50'><strong><h4>Total Unpaid: $unbilled Students</h4></strong></td></tr>
					<tr><td class='danger' height='50'><strong><h4>Total Students: $counts Students</h4></strong></td><td class='info' height='50'><strong><h4>Total Paid on Security: $countt Classes</h4></strong></td></tr>";
					}
					?>
					</table>
					
					<br>
					<br>
					<br>
					</form>
					</div>
					</div>
					</div>
					</div>
                </div>
                      </div>
                  </div>
              </div>

			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			</head>
			</nav>
            </div>
            <!-- /.container-fluid -->

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
</body>

</html>
