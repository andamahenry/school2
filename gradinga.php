<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
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

  <link rel="shortcut icon" href="assets/img/calculator.png">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>A-Level Grades</title>

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

                <!-- Page Heading -->
                <div id="page-wrapper">

				<nav>
				
				<div id="block_bg" class="block">	
					<div class="navbar navbar-inner block-header">
						<div class="block-content collapse in">
							<div class="span12">
							<!-----------------------form --------------------->
								
							<section class="content-header">
							  <h1>
								A-Level Grades
								<small>Create new Grades</small>
							  </h1>
							 <hr>
							</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->

        <div class="box-body">
         <!-- general form elements -->
          <div class="box box-primary">
           <div class="box-header with-border">
              <h3 class="box-title">All Fields are required.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <form role="form" method="post" name='form1'  action="gradinga.php" >
               <div class="container">

			  <div class="row">
           <div class="col-xs-5">
                  <label for="exampleInputEmail1">Grade</label>
            <input type="text"  name="grade" class="form-control" id="skills"  required>
			</div>
             <div class="col-xs-5">
                  <label for="exampleInputEmail1">Points</label>
                   <input type="text"  name="points" class="form-control" id="skills"  required>
				  </div>
				</div>
				</br>
                <div class="row">
					<div class="col-xs-5">
                  <label for="exampleInputEmail1">Marks From</label>
                  <input type="text"  name="from" class="form-control" id="skills"  required>
                </div>
               <div class="col-xs-5">
                  <label for="exampleInputEmail1">To</label>
                  <input type="text"  name="max" class="form-control" id="skills"  required>
                </div>
				</div>
				</br>
				<div class="row">
					<div class="col-xs-10">
                  <label for="exampleInputEmail1">Comment</label>
                  <input type="text"  name="comment" class="form-control" id="skills"  required>
                </div>
				  </div>
         </br>
                <div>
                <button type="submit" name="register" class="btn btn-primary">Save</button>
                </div>
         </br>
            </form>

			<?php
				if (isset($_POST['register'])){
				$grade=$_POST['grade'];
				$points=$_POST['points'];
				$max=$_POST['max'];
				$from=$_POST['from'];
				$comment=$_POST['comment'];
			
				$sql="INSERT into paper_grades_alevel (`grade`,`points`,`max`,`fro`,`comment`) VALUES ('$grade','$points','$max','$from','$comment')";
				mysql_query($sql,$con) or die(mysql_error());
				}
			?>

			</div>
			</div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Grades</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
						<th>Grade</th>
                        <th>Points</th>
						<th>Marks from</th>
						<th>To</th>
						<th>Comment</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>
					</thead>

					<tbody>
						<?php

						$query=mysql_query("SELECT * FROM paper_grades_alevel ORDER BY points DESC",$con)or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						?>
						<tr>

						<td><?php echo $row['grade']; ?></td>
						<td><?php echo $row['points']; ?></td>
						<td><?php echo $row['fro']; ?></td>
						<td><?php echo $row['max']; ?></td>
						<td><?php echo $row['comment']; ?></td>

						<td><a href="gradinga_edit.php?id=<?php echo $row['id']; ?>"><input type='submit' class="btn btn-success addmore" value='Edit'>	</a></td>
						<td><a href="gradinga_delete.php?id=<?php echo $row['id']; ?>"><input type='submit'  type='submit' onClick="return confirm('Are you sure you want to Delete?');" class="btn btn-danger delete" value='Delete'>	</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
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
<!--/body>
</html-->

/////////////////////////////////////////////////////////
<!-- html>
<head>
<title>Test</title>
</head>
<?php
	//$term = 'TERM I';$class = 'Senior 1';$report_type = 'b.o.t';
	/*
	* Remember To solve the issue of raising errors in the O-Level Report in the situation where there are no marks in the database 
	
	
	*/
?>
	
<!--body-->
<script>
function _submitForm(){
	//document.getElementById('form_details').submit();
	document.getElementById('my_submit').click();
}
function update_age(){
	var _year,_month,_day,input_year,input_month,input_day,years,age;
	var _date = new Date();
	var input_date = document.getElementById('auto_date').value;
	
	//split the user input date
	[input_year,input_month,input_day] = input_date.split("-");

	console.log('INPUT = '+parseInt(input_year)+'=>'+parseInt(input_month)+'=>'+input_day);
	
	//Get cuurent date values
	_year = parseInt(_date.getFullYear());
	_month = parseInt(_date.getMonth());
	_day = parseInt(_date.getDate());
	
	console.log('CURRENT = '+_year+'==>'+(_month+1)+'==>'+_day);
	
	if(input_year < _year){
		age = (_year - input_year);
		//var diff1 = (_date - input_date); 
		//var diff1 = dateDiff(_date,input_date,'days'); 
	}else{
		age = 0;
		console.log('Current Age => '+age);
		//console.log('input is invalid');
	}
	console.log('Current Age => '+age);
	document.getElementById('present_age').value = age;
		
	//var age = '';
	//console.log(_date);
	//console.log(_date.toUTCString());
	//console.log(_date.toDateString());
}
	
//submitForm();
</script>
<body>
</html>