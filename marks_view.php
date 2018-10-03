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
    <title>View Class</title>

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
		<h3 class="box-title">Select Appropriate Fields to Edit Marks</h3><hr>
    </div>
	
	<!-- /.this contains the form section for selecting marks specifications-->		
	
     <form role="form" method="post"  name='form1'  action="" ">
		   <div class="container">
		   </br>
		   </br>
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
				$query=mysql_query('SELECT * FROM classes WHERE abbr!=5 AND abbr!=6 ORDER BY name ASC') or die(mysql_error());
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
			<label for="exampleInputEmail1">Subject</label>
				<select name="subject"  class="form-control" >
				<?php
				$query=mysql_query("SELECT * FROM ncdc_olevel WHERE applicable='yes' ORDER BY subject ASC",$con) or die(mysql_error());
				while ($row=mysql_fetch_array($query)){
					$name=strtoupper($row['subject']);
				?>	
					<option><?php echo $name; ?></option>
				<?php						
				}													
				?>
				
				</select>
			 
			</div>
		<!-- THIS BLOCK OF CODE ADDS OPTION FOR SELECTING TR'S NAME TO ENABLE INSERTING INITIALS FOR EACH SUBJECT-->
		<div class="col-xs-2">
			<label for="exampleInputEmail1">Class Year</label>
			<select name="class_year"  class="form-control" >
			<option><?php echo $Year; ?></option>
			</select>
		</div>
			
			</div>
			 </div>
			</br>
			<div class="row">
			<div class="col-xs-1">
			 </br> 
			 <input type="submit" name="cmdsearch" value="Submit Details" class="btn btn-primary" />
			</div>
		</div>
            </form>
			<hr>
	</div>
<!--List of student names in selected class-->
<?php
if (isset($_POST['cmdsearch'])){
	//print "HELLO DEAR!";
	$term = $_POST['term'];$class = $_POST['class'];$exam_type = $_POST['exam_type'];$subject = $_POST['subject'];//$teacher = $_POST['teachername'];
	if(strtolower($exam_type)=='b.o.t'){$marks_table = "marks_olevel_bot";}
	if(strtolower($exam_type)=='mid'){$marks_table = "marks_olevel_mot";}
	if(strtolower($exam_type)=='e.o.t'){$marks_table = "marks_olevel_eot";}
	if(strtolower($exam_type)=='progressive'){$marks_table = "marks_olevel";}
	
	//select abbr for given subject name
	$subject_abbr=mysql_query("SELECT abbr FROM ncdc_olevel WHERE subject='$subject'",$con) or die(mysql_error());
	while($subject_row=mysql_fetch_array($subject_abbr)){//fetch subject abbreviation from ncdc
		$sub_abbr = $subject_row['abbr'];	
	}
	?>
	<div class = "box-header with-border">			
		<h4 style="text-align:center;background-color:yellow;"><br>
		YEAR:&nbsp;&nbsp;<?php echo $Year?>&nbsp;&nbsp;|&nbsp;&nbsp;CLASS:&nbsp;&nbsp;<?php echo $class?>&nbsp;&nbsp;|&nbsp;&nbsp;
		TERM:&nbsp;&nbsp;<?php echo $term?>&nbsp;&nbsp;|&nbsp;&nbsp;EXAM TYPE:&nbsp;&nbsp;<?php echo $exam_type?>&nbsp;&nbsp;|&nbsp;&nbsp;
		SUBJECT:&nbsp;&nbsp;<?php echo $subject?>&nbsp;&nbsp;|&nbsp;&nbsp;TEACHER:&nbsp;&nbsp;<?php //echo $teacher?><br><br>
		<h4><hr>
	</div>
	<div>
	<form role = "form" method = "POST" action = "marks_olevel.php">
		<div class="form-group" style="background-color:grey">
			<input type="text" name="term" value="<?php echo $term?>" hidden />
			<input type="text" name="class" value="<?php echo $class?>" hidden />
			<input type="text" name="exam_type" value="<?php echo $exam_type?>" hidden />
			<input type="text" name="subject" value="<?php echo $subject?>" hidden />
			<input type="text" name="teacher" value="<?php// echo $teacher?>" hidden />
			<input type="text" name="edited_list" value="<?php echo 1?>" hidden />
		<?php
		$students=mysql_query("SELECT * FROM students WHERE room_name='$class' AND active='yes' ORDER BY fname ASC") or die(mysql_error());
		$nofs=1;$stdid=0;
		while($student=mysql_fetch_array($students)){//This loop constructs the form for entering students marks
			$student_number = $student['sno'];
			$query_mark = mysql_query("SELECT $sub_abbr FROM $marks_table WHERE sno='$student_number' AND term='$term' AND class='$class' 
						AND year='$Year'",$con) or die('Kaakano'.mysql_error());
			while($std_mark = mysql_fetch_row($query_mark)){
				$mark = $std_mark[0];
			}
			if($mark ==-1){$mark = '--';}
			if($mark ==-2){$mark = '';}
			if($mark ==''){$mark = '';}
			
		?>	
		<br>
			<div class="col-md-1"><label class="col-md-5 control-label" for="room"><?php echo $nofs.'.'?></label></div> 
			<!-- div class="col-md-3">
				<!-- label class="control-label" name="" id="studentnumber" ><?php //echo $student_number?></label -->
			<div>			
				<input type = "text" name = "studentnumber[]" value = "<?php echo $student_number?>" hidden />
			<div class="col-md-3">
				<label class="control-label" name="studentname" id="studentname" ><?php echo $student['fname']?>&nbsp;&nbsp;<?php echo $student['lname']?></label>
			</div>
			<div class="col-md-3">
				<input type="text" style = "text-align:center;" class="form-control" name="marks[]" id= "<?php echo $student_number?>"
				value = "<?php echo $mark?>" onkeyup = "validate_marks(<?php echo $student_number?>)" readonly/>
			</div>
			<div class="col-md-3">
				<a class="btn btn-success" id = "<?php echo $student_number?>" onclick = "editButton(<?php echo $student_number?>)">Edit
				<i class="glyphicon glyphicon-pencil"></i></a>
			</div>
		<br>
		<?php
		++$nofs;++$stdid;
		}
		?>	
		<hr>
		</div>
		<div class="col-xs-1">
			 <!--/br--> 
			 <input type="submit" name="submit_marks" value="Commit Changes" class="btn btn-primary" />
		</div>
		</div>
	</form>
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
function editButton(button_id){
	var input_elements = document.getElementsByTagName('input');
	var input_element = document.getElementById(button_id);
	input_element.style.backgroundColor = 'yellow';
	input_element.style.borderColor = 'red';
	input_element.readOnly = false;input_element.tabindex = -1;input_element.focus() = true;
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
