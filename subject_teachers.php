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
    <title>Subject Teachers</title>

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
		
		
<div id="page-wrapper">
    <div class="container-fluid">

	<div class="box-header with-border">
		<h3 class="box-title">Select Appropriate Fields to View Class Subject Teachers</h3><hr>
    </div>
	
	<!-- /.this contains the form section for Selecting Subject Teacher Specifications specifications-->		

	<form role="form" method="post"  name='form1' ">
   <div class="container">
   </br>
   </br>
	<div class="row">
	
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
			<label for="exampleInputEmail1">Class Year</label>
			<select name="class_year"  class="form-control" >
				<option><?php echo $Year; ?></option>
			</select>
		</div>

		<div style="align:right" class="col-xs-3">
		</div>
			<div name="class" class="col-xs-1">
			<br>
			 <input type="submit" name="cmdsearch" value="Submit Details" class="btn btn-primary" />
			</div>
		</div>
</form>
			<hr>
	</div>

<?php
if(isset($_POST['commit_btn'])){
	if(!empty($_POST['class']) && !empty($_POST['subject'])&& !empty($_POST['teacher'])){
		$class = $_POST['class']; $subject = strtolower($_POST['subject']); $teacher = $_POST['teacher'];
		//$subject = $_POST['subject']; $teacher = $_POST['teacher'];
	
		$query=mysql_query("SELECT initials,id FROM teachers WHERE name='$teacher'",$con) or die(mysql_error());
		while($row=mysql_fetch_array($query)){
			$initials = $row['initials'];
			$id = $row['id'];
		}
		$available_initials = mysql_num_rows($query);//Check if teacher exists in table of class_teachers
		
		$subject_teacher=mysql_query("SELECT id FROM subject_teachers WHERE class='$class' AND subject='$subject'",$con) or die(mysql_error());
		$available = mysql_num_rows($subject_teacher);//Check if teacher exists in table of class teachers
		if($available==0){
			$query1=mysql_query("INSERT INTO subject_teachers (id,subject,class,name,initials) 
			VALUES ('','$subject','$class','$teacher','$initials')",$con) or die('Mmmm:'.mysql_error());
		}
		if($available > 0){
			$query1=mysql_query("UPDATE subject_teachers SET subject='$subject',class='$class',name='$teacher',initials='$initials' 
			WHERE subject='$subject' AND class='$class'",$con) or die('haaa:'.mysql_error());
		}
	}
	if(empty($_POST['class'])){$class = '---';}else{$class = $_POST['class'];}
	if(empty($_POST['subject'])){$subject = '---';}else{$subject = $_POST['subject']; }
	if(empty($_POST['teacher'])){$teacher = '---' ;}else{$teacher = $_POST['teacher'];}
		//print $class.' ==> '.$subject.' ==> '.$teacher;
}

if (isset($_POST['cmdsearch'])){
	$class = $_POST['class'];
	//print "HELLO DEAR!";
	
	//select abbr for given subject name
	$query1=mysql_query("SELECT name,initials FROM class_teachers WHERE class='$class'",$con) or die(mysql_error());
	while($row1=mysql_fetch_array($query1)){//fetch subject abbreviation from ncdc
		$class_teacher = $row1['name'];$class_teacher_initials = $row1['initials'];	
	}
	if(mysql_num_fields($query)==0){$class_teacher = '';$class_teacher_initials = '';}
	?>
	<div class = "box-header with-border">			
		<h4 style="text-align:center;background-color:blue;"><br>
		<center>
			<strong><?php echo $class; ?>&nbsp;&nbsp;Subject Teachers. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
			<strong>&nbsp;&nbsp;&nbsp;&nbsp;Class Teacher: <?php echo $class_teacher; ?>&nbsp;&nbsp;(<?php echo $class_teacher_initials; ?>)</strong>
			<br>
			<br>
		</center>
		<h4><hr>
	</div>
	<div>
	<div class="form-group" style="background-color:grey">
			<input type="text" name="class" value="<?php echo $class?>" hidden />
	<!--table>
	<thead>
	<tr>
		<th>NO.</th><th>SUBJECT</th><th>TEACHER NAME</th><th>EDIT</th><th>COMMIT</th>
	</tr-->
		<br>
		<?php
		$nofs=1;$stdid=0;
		if(strtolower($class)!="senior 5" && strtolower($class)!="senior 6"){//if class is O-level
			$query2=mysql_query("SELECT * FROM ncdc_olevel WHERE applicable='yes' ORDER BY subject ASC") or die(mysql_error());
		}elseif(strtolower($class)=="senior 5" || strtolower($class)=="senior 6"){//if class is A-level
			$query2=mysql_query("SELECT * FROM ncdc_alevel WHERE applicable='yes' ORDER BY subject ASC") or die(mysql_error());
		}
		while($row2=mysql_fetch_array($query2)){
			$subject = $row2['subject'];$abbr = $row2['abbr'];
			
		?>

		<form  method = "POST" name = "form_2" id = "form_2" >
			<input type = "text" name = "class" value = "<?php echo $class?>" hidden />
			<div class="col-md-1"><label class="col-md-5 control-label" for="room"><center><?php echo $nofs;?></center></label></div>
			
			<div class="col-md-3">
			<center>
				<input class = "form-control" name = "subject" style = "text-align:left;background-color:yellow;text-color:red"  value = "<?php echo strtoupper($subject);?>" type = "text" readonly />
			</center>
			</div> 
				<!--input type = "text" name = "subject" value = "<?php// echo $subject?>" hidden /-->
			
			<div class="col-md-3">
			<center>
				<select name="teacher" id="<?php echo $stdid;?>" class = "form-control" >
				<option>
				<?php
					$query3=mysql_query("SELECT name FROM subject_teachers WHERE class = '$class' AND subject = '$subject'",$con) or die(mysql_error());
					while($row3 = mysql_fetch_array($query3)){
						$class_teacher = $row3['name'];
						//$initials = $row2['initials'];
					}
					if(mysql_num_rows($query3)>0){echo $class_teacher;}
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
			</div>
			<div class="col-md-1">
				<center><a class="btn btn-success" id="<?php echo $stdid;?>" onclick = "editButton(<?php echo $stdid;?>)" >
				<i class="glyphicon glyphicon-pencil"></i></a>
				</center>
			</div>
			<div class="col-md-1">
				<center>
					<button type = "submit" name = "commit_btn" class="btn btn-primary">
						<i class="glyphicon glyphicon-plus"></i>
					</button>
				</center>
			</div>
			
		
			<br>
		</form>
		<br>
		<?php
		++$nofs;++$stdid;
		}
		?>
		</div>
		<br>
	
	
	<?php	
}
?>	


<!-- 				//PAGE BODY GOES JUST HERE!!!!!!!!!!! 				-->

	
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
<script>
function validate_marks(mark_id){
	var student_mark = document.getElementById(mark_id).value;
	var Input = document.getElementById(mark_id)
	//console.log(student_mark);
	if(!isNaN(student_mark)){//Executes condition if mark is a number
		if(parseInt(student_mark)<0 || parseInt(student_mark)>100){
			Input.style.borderColor="red";
			Input.value = "";
			window.alert("Entry is out of range!");
		}
	}else{//Executes condition if mark is not a number
		if(student_mark == '-' || student_mark == '--' || student_mark == '_'){//If mark is a dash, then do nothing
			//window.alert("Invalid Mark entered!");
		}else{
			Input.style.borderColor="red";
			window.alert("Invalid Mark entered!");
			Input.value = "";
		}
	}	
}

	function editButton(select_id){
		var select_elements = document.getElementsByTagName('select');
		var select_element = document.getElementById(select_id);
		//var select_element = form_elements.getElementById('select_id');
		select_element.style.backgroundColor = 'blue';
		//input_element.style.borderColor = 'red';
		//input_element.readOnly = false;input_element.tabindex = -1;input_element.focus() = true;
	}
</script>

<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
<?php include('script.php'); ?>
</html>
