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
	
	<!--link rel="stylesheet/less" href="../less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="../less/responsive.less" type="text/css" /-->
	<!--script src="../js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/alert.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
  <![endif]-->

  <link rel="shortcut icon" href="assets/img/calculator.png">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Examination Clearence</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Print -->
	<link href="css/print.css" rel="stylesheet" type="text/css" media="print">
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->	 
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>
  <body style="width:100%;margin-left: -100px;">

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;
				<?php
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
		
		
<!--div id="" style="margin-left:auto;" -->
<div id="page-wrapper" >
    <div class="container-fluid">
<div class="empty" style="margin-left:auto;margin-right:20px;">

	<div class="box-header with-border">
		<h3 class="box-title">Select Appropriate Fields To View Cleared Examination List</h3><hr>
    </div>
	
	<!-- /.this contains the form section for selecting marks specifications-->		
	
     <form role="form" method="post"  name='form1'  action="" >
     <!-- form role="form" method="post"  name='form1'  action="Examination_cards.php" -->
		   <div class="container">
		   
		<div class="row">
        <div class="col-xs-2">
		<label for="exampleInputEmail1">Term</label>
		<select name="term"  class="form-control" >
		<?php
			$terms = mysql_query("SELECT * FROM terms ORDER BY name ASC") or die(mysql_error());
			while($row = mysql_fetch_array($terms)){
			?>
				<option><?php echo $row['name']?></option>
			<?php	
			}
		?>
		</select>
		
        </div>
			<div class="row">

		   <div class="col-xs-2">
		   <label for="exampleInputEmail1">Class</label>
			<select name="class"  class="form-control" >
			<?php 
				$query=mysql_query('SELECT * FROM classes ORDER BY name ASC') or die(mysql_error());
				while ($row=mysql_fetch_array($query)){
				$name=$row['name'];
				?>	
					<option><?php echo $name; ?></option>
				<?php						
				} 				
			?>						
			</select>
			 
			</div>
						
			<div class="col-xs-2">
		   <label for="exampleInputEmail1">Exam Type</label>
			  <select name="exam_type"  class="form-control" >
				<?php 
				//sql query code goes here
				$query=mysql_query('SELECT name FROM type') or die(mysql_error());
				while ($row=mysql_fetch_array($query)){
					$type=$row['name'];
				?>	
					<option><?php echo $type; ?></option>
				<?php						
				}						
				?>
				
			  </select>
			 
			</div>
					
			<div class="col-xs-2">
			<label for="exampleInputEmail1">Academic Year</label>
			  <select name="year"  class="form-control" >
				<option><?php echo $Year; ?></option>
			  </select>
			 
			</div>
					
			</div>
			 </div>
			</br>
			<div class="row">
			<div class="col-xs-1">
			
			 <input type="submit" name="cmdsearch" value="Submit Details" class="btn btn-primary" />
			</div>
		</div>
            </form>
			<hr>
	</div>
</div>
<!--List of student names in selected class-->
	
<?php

if(isset($_POST['cmdsearch'])){
	
	$term = $_POST['term'];$class = $_POST['class'];$exam_type = $_POST['exam_type'];$year = $Year;
	
	?>
<div class = "print_visible_permit" >
	
	<div>
		<table align='center' width='100%' height='100%' border=1 style="border-spacing:0px;position:static;" id="marksheetTable">
			<thead>
				<tr></tr><!-- th style="col-span:2;"><center><i>--- clearance forms ---</i></center></th -->
			</thead>
			<tbody>
				<?php
				$sno_array=array();// empty array of serial numbers
				$std_name = '';$std_no = 1;$total_subjects = 0;$total_marks = 0;$total_agg = 0;$average_mark = 0;$missed_papers = 0;
				$failed = 0; $std_name_array = array();$std_photo_array = array();
				//Query and loop through student names in the class
				$query2=mysql_query("SELECT sno,fname,lname,photo FROM students WHERE room_name='$class' AND active='yes' 
									ORDER BY fname ASC",$con) or die('Kano: '.mysql_error());
				while($row2=mysql_fetch_array($query2)){
					$sno=$row2['sno'];
					$fname=$row2['fname'];
					$lname=$row2['lname'];
					$photo=$row2['photo'];
					$std_name = ($fname.' &nbsp; '.$lname);
					//$std_name = $fname;
					array_push($sno_array,$sno);array_push($std_name_array,$std_name);array_push($std_photo_array,$photo);
				}	
				//print COUNT($std_name_array);//print number of student names in db
				$i=0;
				//foreach($std_name_array as $std_name){
				while($i<COUNT($std_name_array)){
				?>
				<tr>
					<td>
					<div class="form-group" >
						<div class="col-md-6" style="border-style:solid;height:400px;width:700px;">
							<?php 
								$std_name = $std_name_array[$i];
								$std_photo = $std_photo_array[$i];
								//$std_name = $sno;
							?>
							
							<center>
								<strong>
									<span style="font-size:40px;"><?php echo ''.strtoupper($ourname).'<br>';?></span>
									<span style="font-size:30px;"><?php echo strtoupper($term).' EXAMINATION PERMIT '.' - '.strtoupper($Year);?></span>
									<br> 
								</strong>
							</center><br>
							<div>
								<span style="font-size:24px;">
									<?php echo "<b>NAME: ".'<u>'.$std_name.'</u>'.'<br>CLASS: '.strtoupper($class).'</b>';?>
								</span>
								<img src="uploads/<?php echo $std_photo;?>" width="230px" height="230px" align = "right" />
							</div>
								<br>
							<div class="col-md-5" style="font-size:20px;width:60%">	
								<?php echo '<center><br>'.'&nbsp;'.'&nbsp;'.'ALLOWED TO SIT FOR ALL EXAMS!<br></center>';?>
							</div>
								<div style="position:bottom;font-size:20px;">
									<?php echo "<br><br><br><br>BURSAR'S SIGNATURE: ...............................<br>";?>
								</div>
						</div>	
					</td>
						<?php 
								$i++;
						?>
					<td>
						<!-- div class = "col-md-1"/ -->
						<div class="col-md-6" style="border-style:solid;height:400px;width:700px;">
							<?php 
								$std_name = $std_name_array[$i];
								$std_photo = $std_photo_array[$i];
								//$std_name = $sno;
							?>
							<center>
								<strong>
									<span style="font-size:40px;"><?php echo ''.strtoupper($ourname).'<br>';?></span>
									<span style="font-size:30px;"><?php echo strtoupper($term).' EXAMINATION PERMIT '.' - '.strtoupper($Year);?></span>
									<br> 
								</strong>
							</center><br>
							<div>
								<span style="font-size:24px;align:left">
									<?php echo "<b>NAME: ".'<u>'.$std_name.'</u>'.'<br>CLASS: '.strtoupper($class).'</b>';?>
								</span>
								<img src="uploads/<?php echo $std_photo;?>" width="230px" height="230px" align = "right" />
							</div>
								<br>
							<div class="col-md-5" style="font-size:20px;width:60%">	
								<?php echo '<center><br>'.'&nbsp;'.'&nbsp;'.'ALLOWED TO SIT FOR ALL EXAMS!<br></center>';?>
							</div>
								<div style="position:bottom;font-size:20px;">
									<?php echo "<br><br><br><br>BURSAR'S SIGNATURE: ...............................<br>";?>
								</div>
						</div>
					</td>
				</tr>
				
				<?php
				$i++;//$std_name = '';//$i 
				}
				?>
			
			</tbody>
		</table>
	</div>
</div>
	
<?php
//End of if condition for creating marksheet table	
}
?>	
</div>		
			</div>
			<!-- /block -->
		</div>                   
<!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
	</nav>
    <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
</body>

<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
<?php include('script.php'); ?>
</html>