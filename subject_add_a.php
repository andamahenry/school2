<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
include("connect.php");
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
	<!--append �#!watch� to the browser URL, then refresh the page. -->
	
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
    <title>Test Model</title>

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
				<?php include("sidebarmenu.php"); ?>           
            <!-- /.navbar-collapse -->
        </nav>

                <!-- Page Heading -->
                <div id="page-wrapper">
				<nav>
				<div id="block_bg" class="block">	
					<div class="navbar navbar-inner block-header">
						<div class="block-content collapse in">
							<div class="span12">
								<!-----------------------form --------------------->
								<div class="box-header with-border">
								  <h3 class="box-title"><center>Subjects Offered at School</center></h3><hr>
								</div>
												
<?php
if (isset($_POST['register'])){
	if(!empty($_POST['subject_ids'])){
		$id=$_POST['subject_ids'];
	}
	//$abbr=$_POST['abbr'];
	for($counter=0;$counter < COUNT($id);++$counter){
		mysql_query("UPDATE ncdc_alevel SET applicable='yes' WHERE id='$id[$counter]'",$con);//or die(mysql_error();
	}		
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
	mysql_query("UPDATE ncdc_alevel SET applicable='no' WHERE id='$id'",$con);
}
?>
       
    <form role="form" method="post" name='form1'  action="">
		<div class="container">
		<div class="row">
			<div class="col-xs-8">
				<label for="exampleInputEmail1">All Subjects List (Hold Down control Key and Click for multiple selections)</label><br>
				<select class="basic-multiple" name="subject_ids[]" multiple = "multiple">
					<!--option value="">--Hold control for multiple selections--</option-->
				<?php
				$query = mysql_query("SELECT id,subject FROM ncdc_alevel ORDER BY type ASC,subject ASC",$con);
				for($i=0;$row = mysql_fetch_array($query);$i++){
					$id=$row['id'];
					$subject=$row['subject'];
				?>
					<option value="<?php echo $id;?>"><?php echo $subject;?></option>
				<?php
				}
				?>
				</select>
			</div>  
		</div>
		</div>
		</br>
		<div>
			<button type="submit" name="register" class="btn btn-primary">Register</button>
		</div>
    </form>
        <hr>	   
		</div>
	        <div class="box">
            <div class="box-header">
              <h3 class="box-title"><center>List Of A-Level Subjects Offered At School.</center></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" width = "50%">
				<thead>
					<tr>
					<th><center>NO.</center></th>
					<th>Name</th>
					<th>Abbreviation</th>
					<th><center>Delete</center></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					$query=(mysql_query("SELECT * FROM ncdc_alevel WHERE applicable='yes' ORDER BY type ASC,subject ASC ",$con))or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					
					?>
					<tr>					
						<td><center><?php echo $no;++$no; ?></center></td>
						<td><?php echo ucwords($row[1]); ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><center><button type = "button" class = "btn btn-danger" onclick ="deleteSubject(<?php echo $row['0'];?>)" >Remove</button></center></td>				
					</tr>
					<?php 
					} 
					?>
				</tbody>
				</table>
    </div>
</div>
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

<!--body-->
<script>

function deleteSubject(id){
	window.location.assign("./subject_add_a.php?id="+id);
}
</script>

<body>
</html>