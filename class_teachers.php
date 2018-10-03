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

  <link rel="shortcut icon" href="assets/img/calculator.png">

	<script src="js/tablesearch.js" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Class Teacher</title>

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
				//$class = $_GET['id'];
				$user_query = mysql_query("SELECT * FROM teachers ORDER BY name ASC")or die('Leeero luno: '.mysql_error());
				while($row = mysql_fetch_array($user_query)){
					$id = $row['sno'];
				}
				?>
				<center><h4><strong><?php echo $ourname; ?>,&nbsp;Class Teachers</strong><h4></center>
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
			if(isset($_POST['commit_btn'])){
				if(!empty($_POST['class']) || !empty($_POST['teacher'])){
					$class = $_POST['class'];
					$teacher = $_POST['teacher'];
					
					$query=mysql_query("SELECT initials,id FROM teachers WHERE name='$teacher'",$con) or die(mysql_error());
					while($row=mysql_fetch_array($query)){
						$initials = $row['initials'];
						$id = $row['id'];
					}
					$class_teacher=mysql_query("SELECT * FROM class_teachers WHERE class='$class'",$con) or die(mysql_error());
					$available = mysql_num_rows($class_teacher);//Check if teacher exists in table of class teachers
					if($available==0){
						$query1=mysql_query("INSERT INTO class_teachers (id,class,name,initials) VALUES ('','$class','$teacher','$initials')",$con) or die('Mmmm:'.mysql_error());
					}
					if($available > 0){
						$query1=mysql_query("UPDATE class_teachers SET class='$class',name='$teacher',initials='$initials' WHERE class='$class'",$con) or die('haaa:'.mysql_error());
					}
					//echo 'LEERO: '."<script>console.log('Kyeekyo!');</script>";
					//print $class.' '.$teacher.' ('.$initials.') >> '.$id;
				}
			}
			?>
                        <!-- block -->						
                        <div id="block_bg" class="block">	
                            <div class="navbar navbar-inner block-header">
							<br>
							&nbsp;&nbsp;&nbsp;<button type='button' class="btn btn-danger" data-toggle='modal' data-target='#myModal'><i class="glyphicon glyphicon-trash"></i></button>
							<!--a button type='button' class="btn btn-primary" href="tenant_room.php">Back</a-->
						
						<div class="block-content collapse in">
                                <div class="span12">
						
							<!-----------------------form --------------------->
					
						<div class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table" id="filterTable">
					
						<thead>
						<tr>
						<th><center>NO.</center></th>
						<th><center>Class</center></th>
						<th><center>Teacher</center></th>
						<th><center>Initials</center></th>
						<th><center>Edit</center></th>
						<th><center>Commit</center></th>
						
						<script src="../js/jquery.dataTables.min.js"></script>
						<script src="/js/DT_bootstrap.js"></script>
						<th></th>
					   </tr>
						</thead>
						<tbody>
						<?php 
						$no=1;
						$query=mysql_query("SELECT * FROM classes ORDER BY name ASC")or die('Hooo Kakano: '.mysql_error());
						while($row=mysql_fetch_array($query)){
						$id = $row['id'];$class = strtolower($row['name']);
						?>	
						<tr>
						<form method = 'POST'>	
							<td><center><b><i><?php echo $no; ?><i></b><center></td>
							<input type = "text" name = "class" value ="<?php echo $class;?>" hidden />
							<td ><center><b><i><?php echo strtoupper($class);?></i></b></center></td>
							<?php					
							
							?>
							<td>
							<center>
							
								<select name="teacher" id="teacher_name" class = "form-control" onchange = setInitials()>
								<option>
								<?php
									$query2=mysql_query("SELECT name,initials FROM class_teachers WHERE class = '$class'",$con) or die(mysql_error());
									while($row2 = mysql_fetch_array($query2)){
										$class_teacher = $row2['name'];
										$initials = $row2['initials'];
									}
									if(mysql_num_rows($query2)>0){echo $class_teacher;}
								?>
								</option>
								<?php
								$query1=mysql_query("SELECT * FROM teachers ORDER BY name ASC",$con) or die(mysql_error());
								while($row1 = mysql_fetch_array($query1)){
									//$initials = $row1['initials'];
									$teacher_name = $row1['name'];
									echo "<option><center>".$teacher_name."</center></option>";
									
								}
								?>
								</select>
							
							</center>
							</td>
							<td id = "teacher_initials"><center><i>
							<?php 
							if(mysql_num_rows($query2)>0){
								echo $initials;
								?>
									<input type = "text" name = "initials" value ="<?php echo $initials;?>" hidden />
								<?php
							}elseif(mysql_num_rows($query2)==0){
								$initials ='---';
								echo $initials;
								?>
									<input type = "text" name = "initials" value ="<?php echo $initials;?>" hidden />
								<?php
							}
							?>
							</i></center>
							</td>							
							
							<td class="col-md-1">
							<center><a class="btn btn-success" id="<?php echo $id;?>"><i class="glyphicon glyphicon-pencil"></i></a>
							</center>
							</td>
							<td class="col-md-1">
							<center>
								<button type = "submit" href="" name = "commit_btn" class="btn btn-primary">
									<i class="glyphicon glyphicon-plus"></i>
								</button>
							</center>
							</td>			
						</tr>
						</form>
						<?php 
						++$no;
						} 
						?>
					</tbody>
					</table>
					
					<p><i style="color:red; background-color:yellow">
						<h4>Note: Click Edit to change Class Teacher Name and Commmit to effect changes !!!.</h4></i>
					</p>
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
	
	<!--js searchBox script-->
	<!--script src="js/tablesearch.js" /-->
	<script>
	function setInitials(){
		var name = document.getElementById('teacher_name').value;
		
		console.log(name);
	}
	</script>
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
