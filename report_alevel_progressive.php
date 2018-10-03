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
    <title>Report</title>

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
	
	<!-- Print -->
	<link href="css/report.css" rel="stylesheet" type="text/css" >
	
	
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
<div class="empty">

	<div class="box-header with-border">
		<h3 class="box-title">Select Appropriate Fields to To View Progressive-Report</h3><hr>
    </div>
	
	<!-- /.this contains the form section for selecting marks specifications-->		
	
     <form role="form" method="post"  name='form1' >
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
				$query=mysql_query('SELECT * FROM classes WHERE abbr > 4 ORDER BY name ASC') or die(mysql_error());
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
		   <label for="exampleInputEmail1">Report Type</label>
			  <select name="report_type"  class="form-control" >
				<?php 
				//sql query code goes here
				$query=mysql_query("SELECT name FROM report_types WHERE category='progressive'",$con) or die(mysql_error());
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
			<div class="col-xs-1">
				</br>
				<input type="submit" name="cmdsearch" value="Submit Details" class="btn btn-primary" />
			</div>
			
			</div>
		</div>
    </form>
			<hr>
	</div>
</div>
<!--List of student names in selected class-->
	<!--THIS DIV IS TO LEAVE THE FIRST PAGE EMPTY!-->
						<div class="printableArea"><div class='break' /></div>
<?php
if(isset($_POST['cmdsearch'])){
	$term = $_POST['term'];$class = $_POST['class'];$report_type = strtolower($_POST['report_type']);$year = $Year;$stream='';

	//Marks sanitizer function
	global $std_mark,$grade,$point,$comment;
	function markSanitizer($mrk){//function that creates spaces and dashes for optional and missed subjects
		$mk = $mrk;
		global $std_mark;
		if($mk==-1){
			$std_mark = '__';
		}if($mk==-2){
			$std_mark = '';
		}
		if($mk==''){
			$std_mark = '00';
		}
		if($mk!=-1 AND $mk!=-2 AND $mk!='' AND $mk!=NULL){
			$std_mark = $mk;
		}
		if($mk>=0 AND $mk<=9 AND $mk != NULL){
			$std_mark = '0'.$mk;
		}
		return $std_mark;
	}
	function aggFunction($avg_mks){//function that calculates aggregates
		require "connect.php";
		global $grade,$point,$comment;
		$query_1=mysql_query("select * FROM grading_olevel ",$con)or die(mysql_error());
		while($row=mysql_fetch_array($query_1)){
			$from = $row['fro'];
			$to = $row['max'];
			$grade1 = $row['grade'];
			$point1 = $row['points'];
			$comment1 = $row['comment'];
			
			if ($avg_mks >= $from && $avg_mks <= $to) {
				$grade = $grade1 AND $point = $point1 AND $comment = $comment1 ;
			}
		}
		if($avg_mks<0 OR $avg_mks>100){
			$grade = 'x' AND $point = '__' AND $comment = 'Missed' ;;
		}
		return array($grade,$point,$comment);//returns array of grades and points
	}
	function gradeFunction($total_agg){
		global $division;
		require('connect.php');
		$div_agg = $total_agg;
		$agg_query = mysql_query("SELECT * FROM hteacher_comments",$con) or die(mysql_error());
		while($row = mysql_fetch_array($agg_query)){
			$from = $row['fro'];
			$to = $row['max'];
			$division1 = $row['division'];
			$ht_comment = $row['comment'];
			if ($div_agg >= $from && $div_agg <= $to) {
				$division = $division1 AND $hteacher_comment = $ht_comment;
			}
		}
		return array($division,$hteacher_comment);
	}
	function subjectTeacher($subj_name,$class){
		require 'connect.php';
		$teacher_query = mysql_query("SELECT initials FROM subject_teachers WHERE subject='$subj_name' AND class='$class'",$con) or die(mysql_error());
		if(mysql_num_rows($teacher_query) > 0){
			while($row1 = mysql_fetch_array($teacher_query)){
				$initials = $row1['initials'];
			}
			return $initials;
		}else{
			$initials = '';
			return $initials;
		}
	}
	function classTeacher($class){
		require 'connect.php';
		$teacher_query = mysql_query("SELECT name FROM class_teachers WHERE class='$class'",$con) or die(mysql_error());
		if(mysql_num_rows($teacher_query) > 0){
			while($row1 = mysql_fetch_array($teacher_query)){
				$class_teacher = $row1['name'];
			}
			return $class_teacher;
		}else{
			$class_teacher = '';
			return $class_teacher;
		}
	}
	function acteacherComment($points){
		require 'connect.php';
		$query=mysql_query("SELECT * FROM cteacher_alevel",$con) or die(mysql_error());
		while($row=mysql_fetch_array($query)){
			$from=$row['from'];
			$to=$row['to'];
			$comment=$row['comment'];
			if($points >= $from && $points <= $to){
				$tcomment = $comment;
			}
		}
		return $tcomment;
	}
	function ahteacherComment($pass){//Function for headTeacher comments
		require 'connect.php';
		$query=mysql_query("SELECT * FROM hteacher_alevel",$con) or die(mysql_error());
		while($row=mysql_fetch_array($query)){
			$ppasses=$row['ppasses'];
			$comment=$row['comment'];
			if($ppasses==$pass){
				$hcomment = $comment;
			}
		}
		return $hcomment;
	}
	/////////////////////////////////////////////////////////////////////////////////////
	function subjectGrade2($js_points_array){
		$nof_papers = COUNT($js_points_array);
	/////////////////////////////////////////////////////////////////////////////////////
		if($nof_papers==1){//For only two papers in subject
			$g1=$js_points_array[0];
			if($g1=='x'){//If missed any paper
				$subject_grade = 'x' AND $subject_point = 0;
			}elseif($g1 <= 2){//Condition for scoring A
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1==3){//Condition for scoring B
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1==4){//Condition for scoring c
					$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1==5){//Condition for scoring D
					$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1==6){//Condition for scoring E
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif($g1==7 || $g1==8){//Condition for scoring O
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1==9){//condition for F
				$subject_grade = 'F' AND $subject_point = 0;
			}else{
				$subject_grade = '?' AND $subject_point = 0;
			}
		//return '('.$subject_grade.')'.'==>'.$subject_point; 
		return [$subject_grade,$subject_point];
		}
	/////////////////////////////////////////////////////////////////////////////////////
		if($nof_papers==2){//For only two papers in subject
			$g1=$js_points_array[0] AND $g2=$js_points_array[1];
			if($g1=='x' || $g2=='x'){//If missed any paper
				$subject_grade = 'x' AND $subject_point = 0;
			}elseif($g1 <= 2 && $g2 <= 2){//Condition for scoring A
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1<=3 && $g2<=3){//Condition for scoring B
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1<=4 && $g2<=4){//Condition for scoring c
					$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1<=5 && $g2<=5){//Condition for scoring D
					$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1<=6 && $g2<=6){//Condition for scoring E
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif($g1 <= 6 && $g2 >= 7){//Condition for scoring O
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1>=7 && $g2<=6){//Condition for scoring O
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1 > 6 && $g2 > 6){//condition for F
				$subject_grade = 'F' AND $subject_point = 0;
			}else{
				$subject_grade = '?' AND $subject_point = 0;
			}
		//return '('.$subject_grade.')'.'==>'.$subject_point; 
		return [$subject_grade,$subject_point];
		}
		//////////////////////////////////////////////////////////////////////////////////////
		if($nof_papers==3){//For three papers in subject
			$g1=$js_points_array[0] AND $g2=$js_points_array[1] AND $g3=$js_points_array[2];
			if($g1=='x' || $g2=='x' || $g3=='x'){//If missed any paper
				$subject_grade = 'x' AND $subject_point = 0;
			//Conditions for A in three papers
			}elseif($g1 <= 2 && $g2 <= 2 && $g3 <= 2){//Condition for A for all Distinctions
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1==3 && $g2 < 3 && $g3 < 3){//Only one C3 and the rest lower
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1 < 3 && $g2==3 && $g3 < 3){//Only one C3 and the rest lower
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1 < 3 && $g2 < 3 && $g3 == 3){//Only one C3 and the rest lower
				$subject_grade = 'A' AND $subject_point = 6;
			}
			//Conditions for B in three papers
			elseif($g1<=3 && $g2<=3 && $g3<=3){//At worst a C3 in more than one of the papers
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1 < 4 && $g2 < 4 && $g3 == 4){//Only one C4 and the rest lower
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1 < 4 && $g2==4 && $g3 < 4){//Only one C4 and the rest lower
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1==4 && $g2 < 4 && $g3 < 4){//Only one C4 and the rest lower
				$subject_grade = 'B' AND $subject_point = 5;
			}
			//Conditions for C in three papers
			elseif($g1<=4 && $g2<=4 && $g3<=4){//At worst a C4 in more than one of the papers
				$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1==5 && $g2 < 5 && $g3 < 5){//At worst a C5 in one of the papers and the rest lower grades
				$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1 < 5 && $g2==5 && $g3 < 5){//At worst a C5 in one of the papers and the rest lower grades
				$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1 < 5 && $g2 < 5 && $g3==5){//At worst a C5 in one of the papers and the rest lower grades
				$subject_grade = 'C' AND $subject_point = 4;
			}
			//Conditions for D in three papers
			elseif($g1<=5 && $g2<=5 && $g3<=5){//At worst a C5 in one or more than one of the papers
				$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1==6 && $g2 < 6 && $g3 < 6){//At worst a C6 in one of the papers and the rest lower grades
				$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1 < 6 && $g2==6 && $g3 < 6){//At worst a C6 in one of the papers and the rest lower grades
				$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1 < 6 && $g2 < 6 && $g3==6){//At worst a C6 in one of the papers and the rest lower grades
				$subject_grade = 'D' AND $subject_point = 3;
			}
			//Conditions for E in three papers
			elseif($g1<=6 && $g2<=6 && $g3<=6){//At worst a C6 in one or more than one of the papers
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif(($g1>6 && $g1<9) && $g2 < 7 && $g3 < 7){//At worst a C6 in one of the papers and the rest lower grades
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif($g1 < 7 && ($g2>6 && $g2<9) && $g3 < 7){//At worst a C6 in one of the papers and the rest lower grades
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif($g1 < 7 && $g2 < 7 && ($g3>6 && $g3<9)){//At worst a C6 in one of the papers and the rest lower grades
				$subject_grade = 'E' AND $subject_point = 2;
			}
			//Conditions for O in three papers
			elseif($g1==7 && $g2==7 && $g3==7){//At worst a Pass 7 in ALL the three papers
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif(($g1>=7 && $g1<=8) && ($g2>=7 && $g2<=8) && $g3 <= 7){//At worst a Pass in two of the papers and the rest lower grades
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1 <= 7 && ($g2>6 && $g2<=8) && ($g3>6 && $g3<=8)){//At worst a Pass in two of the papers and the rest lower grades
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif(($g1>6 && $g1<=8) && $g2 <= 7 && ($g3>6 && $g3<=8)){//At worst a Pass in two of the papers and the rest lower grades
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1==9 && $g2 < 7 && $g3 < 7){//For one F9 and higer credits or Distinctions
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1 < 7 && $g2==9 && $g3 < 7){//For one F9 and higer credits or Distinctions
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1 < 7 && $g2 < 7 && $g3==9){//For one F9 and higer credits or Distinctions
				$subject_grade = 'O' AND $subject_point = 1;
			}
			//Conditions for F in three papers
			elseif($g1>=8 && $g2>=8 && $g3>=8){//For All Pass 8
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif($g1==9 && $g2==9 && $g3==9){//For All F9
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif($g1==9 && $g2==9 && $g3 <= 7){//For 2 F9's 
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif($g1==9 && $g2 <= 7 && $g3==9){//For 2 F9's
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif($g1==9 && $g2 >= 7 && $g3>=7){//For F9 AND a PASS
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif($g1>=7 && $g2==9 && $g3>=7){//For F9 AND a PASS
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif($g1>=7 && $g2>=7 && $g3==9){//For F9 AND a PASS
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif($g1 <= 7 && $g2==9 && $g3==9){//For 2 F9's
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif($g1<=9 && ($g2>=7 && $g2<=9) && ($g3>=7 && $g3<=9)){//Two F9's OR Two P8's OR one F9 and P8 in two of the papers 
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif(($g1>=7 && $g1<=9) && $g2<=9 && ($g3>=7 && $g3<=9)){//Two F9's OR Two P8's OR one F9 and P8 in two of the papers
				$subject_grade = 'F' AND $subject_point = 0;
			}elseif(($g1>=7 && $g1<=9) && ($g2>=7 && $g2<=9) && $g3<=9){//Two F9's OR Two P8's OR one F9 and P8 in two of the papers
				$subject_grade = 'F' AND $subject_point = 0;
			}
			//If Non of the conditions is met
			else{
				$subject_grade = '?' AND $subject_point = 0;
			}
		//return '('.$subject_grade.')'.'==>'.$subject_point; 
		return [$subject_grade,$subject_point];
		}
		///////////////////////////////////////////////////////////////////////////////////////
		if($nof_papers==4){//For four papers in subject
			if($g1=='x' || $g2=='x' || $g3=='x' || $g4=='x'){//If missed any paper
				$subject_grade = 'x' AND $subject_point = 0;
			}elseif($g1<=4 && $g2 < 4 && $g3 < 4 && $g4 < 4){//Condition for A in 4 papers
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1 < 4 && $g2<=4 && $g3 < 4 && $g4 < 4){//Condition for A in 4 papers
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1 < 4 && $g2 < 4 && $g3<=4 && $g4 < 4){//Condition for A in 4 papers
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1 < 4 && $g2 < 4 && $g3 < 4 && $g4<=4){//Condition for A in 4 papers
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1<=4 && $g2<=4 && $g3<=4 && $g4<=4){//Condition for B in 4 papers
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1<=5 && $g2 < 5 && $g3 < 5 && $g4 < 5){//Condition for B in 4 papers
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1 < 5 && $g2<=5 && $g3 < 5 && $g4 < 5){//Condition for B in 4 papers
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1 < 5 && $g2 < 5 && $g3<=5 && $g4 < 5){//Condition for B in 4 papers
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1 < 5 && $g2 < 5 && $g3 < 5 && $g4<=5){//Condition for B in 4 papers
				$subject_grade = 'B' AND $subject_point = 5;
			}elseif($g1<=5 && $g2<=5 && $g3<=5 && $g4<=5){//Condition for C in 4 papers
				$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1<=6 && $g2 < 6 && $g3 < 6 && $g4 < 6){//Condition for C in 4 papers
				$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1 < 6 && $g2<=6 && $g3 < 6 && $g4 < 6){//Condition for C in 4 papers
				$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1 < 6 && $g2 < 6 && $g3<=6 && $g4 < 6){//Condition for C in 4 papers
				$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1 < 6 && $g2 < 6 && $g3 < 6 && $g4<=6){//Condition for C in 4 papers
				$subject_grade = 'C' AND $subject_point = 4;
			}elseif($g1<=6 && $g2<=6 && $g3<=6 && $g4<=6){//Condition for D in 4 papers
				$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1<=7 && $g2 < 7 && $g3 < 7 && $g4 < 7){//Condition for D in 4 papers
				$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1 < 7 && $g2<=7 && $g3 < 7 && $g4 < 7){//Condition for D in 4 papers
				$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1 < 7 && $g2 < 7 && $g3<=7 && $g4 < 7){//Condition for D in 4 papers
				$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1 < 7 && $g2 < 7 && $g3 < 7 && $g4<=7){//Condition for D in 4 papers
				$subject_grade = 'D' AND $subject_point = 3;
			}elseif($g1<=7 && $g2<=7 && $g3<=7 && $g4<=7){//Condition for E in 4 papers
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif($g1<=8 && $g2 < 8 && $g3 < 8 && $g4 < 8){//Condition for E in 4 papers
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif($g1 < 8 && $g2<=8 && $g3 < 8 && $g4 < 8){//Condition for E in 4 papers
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif($g1 < 8 && $g2 < 8 && $g3<=8 && $g4 < 8){//Condition for E in 4 papers
				$subject_grade = 'E' AND $subject_point = 2;
			}elseif($g1 < 8 && $g2 < 8 && $g3 < 8 && $g4<=8){//Condition for E in 4 papers
				$subject_grade = 'E' AND $subject_point = 2;
			}//Missing condition for E with two P7's
			elseif($g1==9 && $g2 < 9 && $g3 < 9 && $g4 < 9){//Condition for O with one F9 in 4 papers
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1 < 9 && $g2==9 && $g3 < 9 && $g4 < 9){//Condition for O with one F9 in 4 papers
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1 < 9 && $g2 < 9 && $g3 < 9 && $g4 < 9){//Condition for O with one F9 in 4 papers
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif($g1 < 9 && $g2 < 9 && $g3 < 9 && $g4<=9){//Condition for O with one F9 in 4 papers
				$subject_grade = 'O' AND $subject_point = 1;
			}elseif(($g1 >6 && $g1<9 ) && ($g2>6 && $g2<9) && ($g3<6 && $g3<9 ) && ($g4>6 && $g4<9)){//Condition for O with one F9 in 4 papers
				$subject_grade = 'O' AND $subject_point = 1;
			}
			
			else{
				//$subject_grade = 'none';
				//return '('.$nof_papers.')'.'==>'.$subject_grade; 
				$subject_grade = '?' AND $subject_point = 0;
			}
			return [$subject_grade,$subject_point]; 
		}
		//////////////////////////////////////////////////////////////////////////////////////////
	}
	if(strtolower($report_type)=='b.o.t and mid'){
		$col1 = "B.O.T" AND $col2 = "MID";
		//select database table for each exam type
		$marks_table1 = "marks_alevel_bot" AND $marks_table2 = "marks_alevel_mot";
		$requirements = '';
		$next_term_begins_on = '';
	}
	if(strtolower($report_type)=='b.o.t and e.o.t'){
		$col1 = "B.O.T" AND $col2 = "E.O.T";
		//select database table for each exam type
		$marks_table1 = "marks_alevel_bot" AND $marks_table2 = "marks_alevel_eot";
		$requirements = 'REQUIREMENTS: Refer To The Circular';
		$next_term_begins_on = "NEXT TERM BEGINS ON: ".$next_term;
	}
	if(strtolower($report_type)=='mid and e.o.t'){
		$col1 = "MID" AND $col2 = "E.O.T";
		//select database table for each exam type
		$marks_table1 = "marks_alevel_mot" AND $marks_table2 = "marks_alevel_eot";
		$requirements = 'REQUIREMENTS: Refer To The Circular';
		$next_term_begins_on = "NEXT TERM BEGINS ON: ".$next_term;
	}
	
	$subject_array=array();//create empty array of subjects
	$subject_abbr_array=array();//create empty array of subject abbr
	
	//Query for subjects from database
	$query1=mysql_query("SELECT subject,abbr FROM ncdc_alevel WHERE applicable='yes' ORDER BY type,subject ASC",$con) or die('Woowe: '.mysql_error());
	while($row1=mysql_fetch_array($query1)){
		$subject=$row1['subject'];//Query subjects
		$abbr=$row1['abbr'];//Query subject abbreviations
		
		array_push($subject_array,$subject);//append subject to the array of subjects
		array_push($subject_abbr_array,$abbr);//append abbreviation to the array of subject abbreviations
	}
	//calculate number of students before loop begins
	$ttotal=mysql_num_rows(mysql_query("SELECT sno FROM students WHERE room_name='$class' AND active='yes'",$con));
	//Declare recurring variables
		//Query principle subjects from database
	$subjects=array();$abbreviations=array();$codes=array();$papers=array();
	$query1=mysql_query("SELECT subject,abbr,code,papers FROM ncdc_alevel WHERE applicable='yes' AND type='principle' ORDER BY abbr DESC, papers DESC",$con) or die('Woowe: '.mysql_error());
	while($row1=mysql_fetch_array($query1)){
		$sub1=$row1['subject'];//Query subject name
		$abbr1=$row1['abbr'];//Query subject abbreviations
		$code1=$row1['code'];//Query subject codes
		$papers1=$row1['papers'];//Query subject papers
		
		//if($abbr1=='gp'){continue;}//Do not query general paper from subjects
		array_push($subjects,$sub1);//append abbreviation to the array of subject names
		array_push($abbreviations,$abbr1);//append abbreviation to the array of subject abbreviations
		array_push($codes,$code1);//append abbreviation to the array of subject codes
		array_push($papers,$papers1);//append abbreviation to the array of subject papers
		//print $abbr1.'>>';
	}

	$student_names=mysql_query("SELECT * FROM students WHERE room_name='$class' AND active='yes'",$con) or die(mysql_error());
	while($row=mysql_fetch_array($student_names)){// LIMIT 100
		$sno = $row['sno'];
		$fname = $row['fname'];$lname = $row['lname'];
		$photo = $row['photo'];
		$gender = $row['gender'];
		//print $class.'++>'.$stream;
		
		$std_name = ($fname.'&nbsp;'.$lname);//A Concatenation of full student name
		$total_score = 0;//Total points scored by each A-Level student
		//print $std_name;
		?>	
			<div class="printableArea">
				<div class="bordered" id="reportcard">
					<div class = "reportheader">
						<!-- title row -->
					  <div class="row">
						<div class="col-xs-2">
						  <h2>
						   <center><img src="logo/<?php echo $logo; ?>" class="img-rounded" width="150px" height="150px" /></center>
						  </h2>
						</div>
						<div class="col-xs-8">
						  <h2>
							<h4 style="text-align:center;background-color:yellow;">
								<h1><center><strong><font size='36'><?php echo strtoupper($ourname);?></font></strong></center></h1>
								<h3 align="center" class="" style= "color:green; font-size: 20px;">
									<strong><?php echo 'P.O BOX '.$boxnumber.'&nbsp;TEL: '.$phone ?></strong>
								</h3>
								<h2><center><u><?php echo strtoupper('END OF').'&nbsp;'.strtoupper($term).'&nbsp;REPORT&nbsp;'.' FORM';?></u></center></h2>
							</h4>
						  </h2>
						</div>
						<div class="col-xs-2">
						  <h2>
						   <img src="uploads/<?php echo $photo;?>" class="img-rounded" width="150px" height="150px"  />
						  </h2>
						</div>
						<!-- /.col -->
					  </div>

					  <hr style="border-width:2px; color:green">
					  <!-- info row -->		
					</div>
					  <!-- End of report headers -->		
					<div>
						<div class="row">
							<div class="col-xs-5">
								<label>&nbsp;Student Name: &nbsp;</label><b><?php echo $std_name;?></b>
							</div>					
							<div class="col-xs-3">
								<label>Gender: &nbsp;</label><?php echo $gender;?>
							</div>					
							<div class="col-xs-4" align="center">
								<label>Class: &nbsp;</label><strong><?php echo $class;?></strong>
							</div>
						</div>
					</div><br>
					<div>
						<div class="row">
							<div class="col-xs-5">
								<label>&nbsp;Year: &nbsp;</label><?php echo $Year;?>
							</div>					
							<div class="col-xs-3">
								<!-- label>Position: &nbsp;</label><b style="font-size:16px"><?php //echo position($pos);?></b -->
							</div>					
							<div class="col-xs-4" align="center">
								<!-- label>Out Of: &nbsp;</label><span style="font-size:16px;font-weight:bold"><?php //echo $ttotal;?></span -->
							</div>
						</div>
						<br>
					</div>
				<div  style="background-image:url('*logo/logo.jpg');background-repeat:no-repeat;
						background-position:center;background-size:90% 90%;opacity:0.9;z-index=1;">	
					<div style="z-index=100;transparency:100%">
						<table class="tstyle" onload="myFunction(<?php echo $sno;?>)">
							<thead>
								<th>SUBJECT</th><th>PAPER</th><th><?php echo $col1.' (%)';?></th><th><?php echo $col2.' (%)';?></th><th>AVERAGE</th>
								<th>GRADE</th><th>SUBJECT <br>GRADE</th><th>POINTS</th><th>COMMENT</th><th>INITIALS</th>
							</thead>
							<tbody>
								<?php
								$ss_counter=0;//Initialize subsidiary pass counter
								$_gp = mysql_query("SELECT $marks_table1.sno,$marks_table1.gp AS gp1,$marks_table2.gp AS gp2 FROM $marks_table1 INNER JOIN $marks_table2 
									ON $marks_table1.sno=$marks_table2.sno WHERE $marks_table1.sno='$sno' AND $marks_table1.paper = $marks_table2.paper 
									AND $marks_table1.term='$term' AND $marks_table1.year='$Year' 
									AND $marks_table1.class='$class' AND $marks_table1.gp != 'NULL'",$con) or die(mysql_error());// AND $marks_table1.gp !=-2								
								if(mysql_num_rows($_gp)!=0){//Stop script if no records exist in the database									
								?>
								<tr>
									<td style="text-align:left"><b>&nbsp;&nbsp;&nbsp;&nbsp;S101 General Paper</b></td>
									<td><center><?php echo 'I';?></center></td>
									<?php 
									while($row=mysql_fetch_array($_gp)){
										$gp_mark1=$row['gp1'];
										$gp_mark2=$row['gp2'];
									}
									$gp_mark = ceil(($gp_mark1+$gp_mark2)/2);
									$gp_mark = markSanitizer($gp_mark);//clean marks before output to user
									
									$grade = aggFunction($gp_mark);//Get paper grade
									if($grade[1] >= 1 && $grade[1] <=6){//Decide subject grade
										$subject_grade = 'O';$ss_counter++;
									}else{$subject_grade = 'F';}
									if($subject_grade == 'O'){$gp_points = 1;}else{$gp_points = 0;}//Decide gp points
									$total_score +=$gp_points;
									//Get G.P teacher's Initials
									$gp_initials=mysql_query("SELECT initials FROM subject_teachers WHERE subject='general paper' AND class='$class'",$con) or die(mysql_error());
									while($row=mysql_fetch_array($gp_initials)){$gp_teacher=$row['initials'];}
									?>	
									<td><center><?php echo markSanitizer($gp_mark1);?></center></td>
									<td><center><?php echo markSanitizer($gp_mark2);?></center></td>
									<td><center><?php echo $gp_mark;?></center></td><td><center><?php echo $grade[0];?></center></td>
									<td><center><b style="font-size:24px" ><?php echo $subject_grade;?></b></center></td>
									<td><center><b style="font-size:24px" ><?php echo $gp_points;?></b></center></td>
									<td><center><?php echo $grade[2];?></center></td><td><center><?php echo $gp_teacher;?></center></td>
								</tr>
													<!-- PRINCIPLE SUBJECTS ARE QUERIED AND FILLED IN STARTING FROM HERE -->
								<?php 
								}
								//Loop through all principle subjects in the array of subjects
								$pp_counter=0;//Set principal pass counter
								for($i=0;$i<COUNT($subjects);$i++){
									$subj = $abbreviations[$i];
									$valid_subjects_array = array();//array to help skip subjects that have no done papers by the student
									$paper_mark_array = array();//array for each paper and mark for paper grades
									$paper_mark_array1 = array();//array for each paper and mark
									$paper_mark_array2 = array();//array for each paper and mark
									$paper_number_array = array();//array for each paper number
									$js_points_array = array();//array for each paper points
									
									$_marks=mysql_query("SELECT $marks_table1.paper,$marks_table1.sno,$marks_table1.$subj AS mark1,$marks_table2.$subj AS mark2 FROM 
											$marks_table1 INNER JOIN $marks_table2 ON $marks_table1.sno = $marks_table2.sno AND $marks_table1.paper = $marks_table2.paper 
											AND $marks_table1.term = $marks_table2.term 
											WHERE $marks_table1.sno='$sno' AND $marks_table1.term='$term' AND $marks_table1.year='$Year' ORDER BY paper ASC",$con) 
											or die(mysql_error());
									while($row=mysql_fetch_array($_marks)){
										$paper = $row['paper'];
										$_mark1=$row['mark1'];
										$_mark2=$row['mark2'];
										if($_mark1 <=-2 || $_mark2 <=-2){
											continue;
										}
										$paper_mark_array1[$paper] = $_mark1;//First set of exam marks per paper		
										$paper_mark_array2[$paper] = $_mark2;//Second set of exam marks per paper
										$_avg = ceil((markSanitizer($_mark1)+markSanitizer($_mark2))/2);
										array_push($paper_mark_array,$_avg);
										array_push($paper_number_array,$paper);
										//print $subjects[$i].'==>'.$paper.'==>'.$_mark1.'==>'.$_mark2.'<br>';
									}
									$j=0;$k=0;$row_span_counter = COUNT($paper_number_array);$this_subject = $codes[$i].'&nbsp'.ucwords($subjects[$i]);
									$attribute = '';
									foreach($paper_mark_array as $mark){
											array_push($js_points_array,aggFunction($mark)[1]);
									}
									$total_counter=1;
									foreach($paper_number_array as $paper){
										if($j==0 && $k==0){
											$row_span_counter = COUNT($paper_number_array);
											//$this_subject = '';
											$attribute = '';
											//$place_holder = '';
										}elseif($j>0 && $k !=0){
											$row_span_counter = 0;
											$place_holder = '';
											$this_subject = '';
											$attribute = 'hidden';
										}
									?>
										<tr>
											<td style="text-align:left;" rowspan="<?php echo $row_span_counter;?>" <?php echo $attribute;?> >
													<b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($this_subject);?></b>
											</td>
											<!--/td-->
											<td><?php echo $paper;?></td>
											<td><?php echo $mark1 = markSanitizer($paper_mark_array1[$paper]);?></td>
											<td><?php echo $mark2 = markSanitizer($paper_mark_array2[$paper]);?></td>
											<?php 
												$mark = ceil(($mark1 + $mark2)/2);
												//array_push($js_points_array,aggFunction($mark)[1]);             //x
												$paper_grade1 = subjectGrade2($js_points_array)[0];//'pgrade';
												$subject_grade2 = subjectGrade2($js_points_array)[1];//'sgrade';
											?>
											<td><?php echo markSanitizer($mark);?></td>
											<td><?php echo aggFunction($mark)[0];?></td>
											<td rowspan="<?php echo $row_span_counter;?>" <?php echo $attribute;?> >
												<b style="font-size:24px" ><?php echo $paper_grade1;?></b></td>
											<td rowspan="<?php echo $row_span_counter;?>" <?php echo $attribute;?> >
												<b style="font-size:24px" ><?php echo $subject_grade2;?></b></td>
											<td><?php echo aggFunction($mark)[2];?></td>
											<td rowspan="<?php echo $row_span_counter;?>" <?php echo $attribute;?>>
												<?php echo subjectTeacher($subjects[$i],$class);?>
											</td>										
										</tr>
										<?php
										$j++;$k++;$total_counter++;//increment counters for merging some cells that have row span in them 
										if($total_counter==COUNT($paper_number_array)){
											$total_score+=$subject_grade2;//Increment total points
											if($subject_grade2>=2 && $subject_grade2<=6){//Condition to Increment number of principal passes if any
												$pp_counter+=1;//increment principal pass counter by 1
											}
										}
									}
								}//End of loop for each principle
								//Query for subsidiary subject done by student
								$subsidiaries = array();//Array of subsidiary subjects and subject codes
								$sub_subject = mysql_query("SELECT * FROM ncdc_alevel WHERE abbr!='gp' AND type='subsidiary' AND 
											applicable='yes'",$con) or die(mysql_error());
								while($row=mysql_fetch_array($sub_subject)){//create associated array of Subsidiary subject codes and abbreviations
									$s_code = $row['code'];
									$s_abbr = $row['abbr'];
									$s_name = $row['subject'];
									$subsidiaries[$s_code] = $s_abbr;
									$s_subject[$s_abbr] = $s_name;
									//array_push($subsidiaries,$sub_subj_code);
								}
								//Loop through the subsidiaries and Query the marks if any
								$s_paper_array1 = array();$s_paper_array2 = array();
								foreach($subsidiaries as $scode => $sname){//Loop through Each subsidiary subject
									$query1=mysql_query("SELECT $marks_table1.sno,$marks_table1.paper,$marks_table1.$sname AS s_mk1,$marks_table2.$sname AS s_mk2 
										FROM $marks_table1 INNER JOIN $marks_table2 ON $marks_table1.sno=$marks_table2.sno AND $marks_table1.paper = $marks_table2.paper 
										WHERE $marks_table1.sno='$sno' AND $marks_table1.class='$class' AND $marks_table1.year='$Year' AND $marks_table1.term='$term'",
										$con) or die(mysql_error());
									//$continue = false;
									while($row=mysql_fetch_array($query1)){
										$s_paper = $row['paper'];
										$s_mk1=$row['s_mk1'];
										$s_mk2=$row['s_mk2'];
										if($s_mk1 <=-2 && $s_mk2 <=-2){continue;}
										if($s_mk1 =='NULL' && $s_mk2 =='NULL'){continue;}
										$s_paper_array1[$sname]=$s_mk1;$s_paper_array2[$sname]=$s_mk2;
										//array_push($s_paper_array1,$s_mk1);array_push($s_paper_array2,$s_mk2);
									}
									if(COUNT($s_paper_array1)==0 || COUNT($s_paper_array2)==0){
										continue;
									}
									//print COUNT($s_paper_array1).'===>'.COUNT($s_paper_array2).'<br>';
									//print $s_subject[$sname].'==>'.$scode.'==>'.$sname.'==>'.$s_paper_array1[$sname].'>>'.$s_paper_array2[$sname].'<br>';
								?>
									<tr>
										<td style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $scode.'&nbsp;'.ucwords($sname);?></b></td>
										<td><?php echo 'I';?></td>
										<td><?php echo $s_mark1=markSanitizer($s_paper_array1[$sname]);?></td>
										<td><?php echo $s_mark2=markSanitizer($s_paper_array2[$sname]);?></td>
										<?php 
											$s_mark = ceil(($s_mark1 + $s_mark2)/2);
											$grade2 = aggFunction($s_mark)[1];//Get paper grade
											if($grade2 >= 1 && $grade2 <=6){//Decide subject grade
												$subject_grade = 'O' AND $sub_points = 1;$ss_counter++;
											}else{$subject_grade = 'F' AND $sub_points = 0;}	
											$total_score+=$sub_points;
										?>
										<td><?php echo $s_mark;?></td>
										<td><?php echo aggFunction($s_mark)[0];?></td>
										<td><b style="font-size:24px;" ><?php echo $subject_grade;?></b></td>
										<td><b style="font-size:24px;font-type:bold;" ><?php echo $sub_points;?></b></td>
										<td><?php echo aggFunction($s_mark)[2];?></td>
										<td><?php echo subjectTeacher($s_subject[$sname],$class);?></td>
									</tr>
								<?php
									break;//Break Loop if a valid subsidiary subject is found
								}//End of optional subsidiary subject loop
								//Table row for student's totals 
								echo "<tr style='font-size:24px;font-weight:bold;' ><th>TOTALS</th><td></td><td></td>
									<td></td><td></td><td></td><td></td><td>".markSanitizer($total_score)."</td><td></td><td></td></tr>";
								?>				
							</tbody>							
						</table><br>
						<div class="row">
							<div align='right' class="col-xs-4"><label>Principle Passes:</label></div>
								<div align='left' class="col-xs-1"><label><strong style="font-size:18px;"><?php echo markSanitizer($pp_counter);?></strong></label></div>
							<div align='right' class="col-xs-4"><label>Subsidiary Passes:</label></div>
								<div align='left' class="col-xs-2"><strong style="font-size:18px;"><?php echo markSanitizer($ss_counter);?></strong></div>
						</div><br>
						<div>
							<div class="row">
								<div class="col-xs-3"><label>&nbsp;Class Teacher's Comment: &nbsp;<label><?php ?></div>					
								<div class="col-xs-8" align='left'><span><?php echo $fname.', <i>'.acteacherComment($total_score).'.</i>';?></span></div>					

							</div>
							<div class="row">
								<div class="col-xs-3"><label>&nbsp; &nbsp;<label><?php ?></div>					
								<div class="col-xs-6" align = "right"><label><i><?php echo classTeacher($class);?></i></label></div>					
								<div class="col-xs-3"><label>Signature: ......................&nbsp;</label></div>
							</div>
								<br>
							<div class="row">
								<div class="col-xs-3"><label>&nbsp;Head Teacher's Comment: &nbsp;<label><?php ?></div>					
								<div class="col-xs-6"><span><?php echo '<i>'.ahteacherComment($pp_counter).'.</i>';?></span></div>					
								<div class="col-xs-3"><label>Signature: ......................&nbsp;<label></div>
							</div>
						</div>
							<br>
						<div>
							<table class = "ptable" style="width:100%;">
								<thead><th>PRINCIPAL</th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>O</th><th>F</th></thead>
								<tbody>
									<tr>
										<th>Two Papers</th><th><u><</u> D2, D2</th><th><u><</u> C3, C3</th><th><u><</u> C4, C4</th>
										<th><u><</u> C5, C5</th><th><u><</u> C6, C6</th><th><u><</u> C6, P8</th><th><u>></u> F9, P8</th>
									</tr>
									<tr>
										<th>Three Papers</th><th><u><</u> D2, D2, C3</th><th><u><</u> C3, C3, C4</th><th><u><</u> C4, C4, C5</th>
										<th><u><</u> C5, C5, C6</th><th><u><</u> C6, C6, P8</th><th><u><</u> C6, P7, P8</th><th><u>></u> F9, P8, P8</th>
									</tr>
								</tbody>
								<thead><th>POINTS</th><th>6</th><th>5</th><th>4</th><th>3</th><th>2</th><th>1</th><th>0</th></thead>
							</table>
						</div>
							<br>
						<div class="row">
							<div class="col-xs-6" ><label>&nbsp;<?php echo $next_term_begins_on.'&nbsp;' ;?></label></div>					
							<div class="col-xs-6" align="center"><label>Printed On:&nbsp;<?php echo date('d/m/Y').'&nbsp;' ;?></label></div>					
						</div>
						<br>
						<div class="row">
							<div class="col-xs-7"><label><strong><i>&nbsp;This Report is only valid with a stamp</i></strong><label></div>
							<div class="col-xs-5" align='center'><label><strong><i>&nbsp;<?php echo $requirements;?></i></strong><label></div>
						</div>
							<br>
					</div>
				</div>
				</div>
														<!-- End of report card body -->		
			</div>		
										<div class="break"><!-- This is a page break for after each student report --></div>		
	<?php
		////End of loop for each student information
	}//End of loop for each student in class
}//End of if condition for creating report cards table on submittion of student details
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