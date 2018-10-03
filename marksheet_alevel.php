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
    <title>MarkSheet</title>

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
		<h3 class="box-title">Select Appropriate Fields to To View MarkSheet</h3><hr>
    </div>
	
	<!-- /.this contains the form section for selecting marks specifications-->		
	
     <form role="form" method="post"  name='form1'  action="" ">
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
				$query=mysql_query('SELECT * FROM classes WHERE abbr > 4  ORDER BY name ASC') or die(mysql_error());
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
		}if($mk==0){
			$std_mark = '00';
		}
		return $std_mark;
	}
	
	function scoreFunction($mrk){
		global $division;
		require('connect.php');
		$agg_query = mysql_query("SELECT * FROM paper_grades_alevel",$con) or die(mysql_error());
		while($row = mysql_fetch_array($agg_query)){
			$from = $row['fro'];
			$to = $row['max'];
			$points = $row['points'];
			if ($mrk >= $from && $mrk <= $to) {
				$score = $points;
			}elseif($mrk < 0 || $mrk == ''){
				$score = 'x';
			}
		}
		return $score;
	}
	function subjectGrade2($js_points_array){
		$nof_papers = COUNT($js_points_array);//Number of papers per subject
		//print ($nof_papers);
		/////////////////////////////////////////////////////////////////////////////////////
		if($nof_papers==1){//For only one paper in subject
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
			$g1=$js_points_array[0] AND $g2=$js_points_array[1] AND $g3=$js_points_array[2] AND $g4=$js_points_array[3];
			if($g1=='x' || $g2=='x' || $g3=='x' || $g4=='x'){//If missed any paper
				$subject_grade = 'x' AND $subject_point = 0;
			//Conditions for A in 4 papers
			}elseif($g1<=4 && $g2 < 4 && $g3 < 4 && $g4 < 4){//Condition for A in 4 papers
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1 < 4 && $g2<=4 && $g3 < 4 && $g4 < 4){//Condition for A in 4 papers
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1 < 4 && $g2 < 4 && $g3<=4 && $g4 < 4){//Condition for A in 4 papers
				$subject_grade = 'A' AND $subject_point = 6;
			}elseif($g1 < 4 && $g2 < 4 && $g3 < 4 && $g4<=4){//Condition for A in 4 papers
				$subject_grade = 'A' AND $subject_point = 6;
			//Conditions for B in 4 papers
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
			//Conditions for C in 4 papers
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
			//Conditions for D in 4 papers
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
			//Conditions for E in 4 papers
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
			//Conditions for O in 4 papers
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
	}	//////////////////////////////////////////////////////////////////////////////////////////
	
	$term = $_POST['term'];$class = $_POST['class'];$exam_type = $_POST['exam_type'];$year = $Year;
	
	//select database table for each exam type
	if(strtolower($exam_type)=='b.o.t'){$marks_table = "marks_alevel_bot";}
	if(strtolower($exam_type)=='mid'){$marks_table = "marks_alevel_mot";}
	if(strtolower($exam_type)=='e.o.t'){$marks_table = "marks_alevel_eot";}
	//if(strtolower($exam_type)=='progressive'){$marks_table = "marks_olevel";}
	
	$principle_subject_abbr_array=array();//create empty array of subject abbr
	$subsidiary_subject_array=array();//create empty array of subjects
	//$ass_array=array();//create an associative array of subjects
	
	//Query principle subjects from database
	$query1=mysql_query("SELECT abbr FROM ncdc_alevel WHERE applicable='yes' AND type='principle' ORDER BY abbr DESC, papers DESC",$con) or die('Woowe: '.mysql_error());
	while($row1=mysql_fetch_array($query1)){
		$_abbr1=$row1['abbr'];//Query subject abbreviations
		if($_abbr1=='gp'){continue;}//Do not query general paper from subjects
		array_push($principle_subject_abbr_array,$_abbr1);//append abbreviation to the array of subject abbreviations
	}
	//print '<br>';
	//Query subsidiary subjects from database
	$query2=mysql_query("SELECT abbr FROM ncdc_alevel WHERE applicable='yes' AND type='subsidiary' ORDER BY abbr ASC, papers DESC",$con) or die('Woowe: '.mysql_error());
	while($row2=mysql_fetch_array($query2)){
		$_abbr2=$row2['abbr'];//Query subject abbreviations
		if($_abbr2=='gp'){continue;}//Do not query general paper from 
		//print $_abbr2.',';
		array_push($subsidiary_subject_array,$_abbr2);//append abbreviation to the array of subject abbreviations
	}
	//print '<br>';
	?>
<div class = "print_visible_marksheet"  style="border-spacing:0px;margin:auto; width:100%;">
	<div class = "box-header with-border">			
		<h4 style="text-align:center;background-color:yellow;">
			<h1><center><strong><font size='36'><?php echo strtoupper($ourname);?></font></strong></center></h1>
			<h2><center><?php echo strtoupper($exam_type).' MARKSHEET FOR '.strtoupper($class).' '.strtoupper($term).' - '.$Year;?></center></h2><hr>
		</h4>
	</div>
	<div class="table-responsive">
		<!--table border='2px' class="marksheet_table" width='100%' -->
		<table border='2px' class="table-striped" width='100%'>
			<thead>
				<tr>
					<th><center>NO.</center></th><th><center>NAME</center></th>
					<th><center>SUBJECT</center></th><th colspan='1'><center>MARKS</center></th><th>SCORE</th>
					<th><center>SUBJECT</center></th><th colspan='1'><center>MARKS</center></th><th>SCORE</th>
					<th><center>SUBJECT</center></th><th colspan='1'><center>MARKS</center></th><th>SCORE</th>
					<th><center>SUBJECT</center></th><th colspan='1'><center>MARKS</center></th><th>SCORE</th>
					<th><center>SUBJECT</center></th><th colspan='1'><center>MARKS</center></th><th>SCORE</th>
					<th><center>POINTS</center></th>
				</tr>
			</head>
			<tbody>
			<?php
				$princi_array=array();// empty array of serial numbers
				$std_name = '';$std_no = 1;$total_subjects = 0;$subject_array = array();$total_score=0;
				$rspan = 1;$tdcontent = '.';//set row span
				
				//Query and loop through student names in the class
				$query2=mysql_query("SELECT sno,fname,lname FROM students WHERE room_name='$class' AND active='yes' 
									ORDER BY fname ASC",$con) or die('Kano: '.mysql_error());
				while($row2=mysql_fetch_array($query2)){// Do loop through each student in class
					$sno=$row2['sno'];
					$fname=$row2['fname'];
					$lname=$row2['lname'];
					$std_name .=$fname.' &nbsp; '.$lname; 
					
					$principle_subjects = array();$all_subsidiaries = array();$subsidiary_subject1 = '';$sub_counter = 0;$paper = array();
					//Select GP marks for each student
					$g_query=mysql_query("SELECT gp FROM $marks_table WHERE sno='$sno' AND year='$Year' AND term='$term' AND class='$class' 
							AND type='$exam_type' ",$con) 
							or die("Hooo, Kagannye: ".mysql_error());
					while($_g=mysql_fetch_array($g_query)){
						$_gpmark=$_g['gp'];
						if($_gpmark<-2 || $_gpmark>100){
							continue;
						}elseif($_gpmark>=-2 && $_gpmark<=100){
							$_gp = $_gpmark;
							//print '***'.$std_name.'--->'.$_gp.'<br>';
							break;
						}
						$_gp = $_gpmark;
					}
					echo "<tr>";//Table row for each student detail starts here
						echo "<td rowspan=".$rspan." align='center'><b>".$std_no.".</b></td><td rowspan=".$rspan.">".$std_name."</td>
							<td style='text-align:center;background-color:rgb(50,100,255);' rowspan=".$rspan."><b>GP</b></td>
							<td align='center' rowspan=".$rspan.">".markSanitizer($_gp)."</td>
							<td rowspan=".$rspan." style='text-align:center;font-size:24px;'><b>".scoreFunction($_gp)."</b></td>";
							$grade2 = scoreFunction($_gp);//Get paper grade
							if($grade2 >= 1 && $grade2 <=6){//Decide subject grade
								$subject_grade = 'O' AND $sub_points = 1;
							}else{$subject_grade = 'F' AND $sub_points = 0;}
							$total_score+=$sub_points;
					
					//Loop through all principle subjects to get the considerable ones
					$_done = 0;//Number of done principle subjects.
					foreach($principle_subject_abbr_array as $principle_subject){//Loop through the offered principle subjects by the learner
						$paper = array();//Empty array for each paper and mark.
						$principle_subject_marks=mysql_query("SELECT paper,$principle_subject FROM $marks_table WHERE sno='$sno' AND 
						year='$Year' AND term='$term' AND class='$class' AND type='$exam_type' AND $principle_subject > -2 ORDER BY paper ASC",$con) 
						or die(mysql_error());
						if(mysql_num_rows($principle_subject_marks)>0){//If there is any offered subject by the students
							while($row4=mysql_fetch_array($principle_subject_marks)){
								$principle_paper = $row4['paper'];//subject paper i.e; I, II, III
								$principle_mark = $row4[$principle_subject];//paper marks';
								if($principle_mark > -2 && $principle_mark <=100){
									$paper[$principle_paper] = $principle_mark;//Associated array of paper and mark
								}else{
									continue;//skip subject if mark is invalid
								}
							}
							$nof_papers = COUNT($paper);//Total number of papers offered by student per subject
							$agg_array = array();//Array of subject aggreagates per paper
							
							//print $nof_papers.'*'.$principle_subject.'==>'.$principle_paper.'==>'.$paper[$principle_paper].'<br>';
							//print_r ($paper);print '<br>';
							
							echo "<td style='text-align:center;background-color:rgb(50,100,255);padding:15px' rowspan=".$rspan."><b>".strtoupper($principle_subject)."</b></td>";
							echo "<td align='center'><center><br><table border='1px'><tr>";
								foreach($paper as $p_num => $p_code){
									echo "<td align='center'><b>".$p_num."</b></td>";
								}
							echo "</tr><tr>";
								foreach($paper as $p_num1 => $p_mark1){
									echo "<td align='center'>".markSanitizer($p_mark1)."</td>";
								}
							echo "</tr><tr>";
								foreach($paper as $p_num2 => $p_mark){
									$agg = scoreFunction($p_mark);
									array_push($agg_array,$agg);
									echo "<td align='center'>".$agg."</td>";
								}
								$score_points = subjectGrade2($agg_array);
							echo "</tr></table></center></td>
								<td style='text-align:center;font-size:24px;'><b>".$score_points[0]."</b></td>";
								
							$total_score+=$score_points[1];	
							$_done++;//Increment the number of done principle subjects
						}//If offered any principle subjects			
					}//end of each subject loop					
					/////////////////////////////////////////////////
					//Condition for adding empty cells in case of any missed principle subjects
					if(mysql_num_rows($principle_subject_marks)<3){//if student offered less than three principle subjects.
						$_undone = (3 - $_done);//Get total number of missed principle subjects for each student.
						for($l=0;$l<$_undone;$l++){
							print "<td style='text-align:center;background-color:rgb(255,50,100);'><b>MISSED</b></td>
								<td style='text-align:center;background-color:rgb(255,50,100);'>__</td>
								<td style='text-align:center;background-color:rgb(255,50,100);'>__</td>";
						}
					}	
					/////////////////////////////////////////////////
					foreach($subsidiary_subject_array as $sub_subject){
						$subsidiary_subject_marks=mysql_query("SELECT paper,$sub_subject FROM $marks_table WHERE sno='$sno' AND year='$Year' AND 
								term='$term' AND class='$class' AND type='$exam_type' AND $sub_subject > -2 AND $sub_subject !='NULL' ",$con) or die(mysql_error());
						while($row3=mysql_fetch_array($subsidiary_subject_marks)){
							$subsidiary_marks = $row3[$sub_subject];
							$sub_papers = $row3['paper'];
							if($subsidiary_marks >= -1 && $subsidiary_marks <= 100){
								$subsidiary_subject1 = $sub_subject;
								$subsidiary_subject[$sub_papers] = $subsidiary_marks;
								$row = false;
							}elseif($subsidiary_marks == -2){
								continue;
							}elseif($subsidiary_marks == 'NULL' AND $sub_counter ==0){//this dint show any signs of functionality when tested
								print $sub_subject = 'missed';
								$subsidiary_marks = -1;
								$sub_papers = 'I';
								$subsidiary_subject1 = 'missed';
								$subsidiary_subject[$sub_papers] = $subsidiary_marks;
								$all_subsidiaries[$sub_subject] = $subsidiary_subject;
							}
							$all_subsidiaries[$sub_subject] = $subsidiary_subject;
							//print_r($subsidiary_subject);print '==>'.$std_name.'==>'.$sub_subject.'==>//////<br>';
						$sub_counter+=1;							
						}
					}
					if(COUNT($all_subsidiaries)==0){//This solves the problem of missing subsidiary subject
						//print $sub_subject = 'missed';
						$subsidiary_marks = -1;
						$sub_papers = 'I';
						$subsidiary_subject1 = 'missed';
						$subsidiary_subject[$sub_papers] = $subsidiary_marks;
						$all_subsidiaries[$sub_subject] = $subsidiary_subject;
					}
					//print_r($all_subsidiaries);print 'counter = '.$sub_counter.'<br>';
					//print 'subsidiary subject ==>'.$subsidiary_subject1;
					
					echo "<td style='text-align:center;background-color:rgb(50,100,250);'><b>".strtoupper($subsidiary_subject1)."</b></td>";
					echo "<td style='text-align:center;'><b>".markSanitizer($subsidiary_marks)."</b></td>";
					//Determine the umber of pionts for the subsidiary subject
						$grade2 = scoreFunction($subsidiary_marks);//Get paper grade
						if($grade2 >= 1 && $grade2 <=6){//Decide subject grade
							$subject_grade = 'O' AND $sub_points = 1;
						}else{$subject_grade = 'F' AND $sub_points = 0;}
						$total_score+=$sub_points;
						
					//echo "<td style='text-align:center;font-size:24px;'><b>".$subject_grade."</b></td>";
					echo "<td style='text-align:center;font-size:24px;'><b>".$grade2."</b></td>";
					echo "<td style='text-align:center;font-size:26px;background-color:rgb(255,255,0);'><b>".markSanitizer($total_score)."</b></td>";
	
	
					$done_papers_principle = 0;$paper = array();$agg_array = array();
					//Declare subject names for the first three subjects in the array of subjects
					echo "</tr>";
							
				++$std_no;$std_name='';$princi_array = array();$total_score=0;//$principle_subject_abbr_array = array();
				}//End of while loop for each student in class
			?>			
			</tbody>
		</table>
		<br><hr><br>
	</div>
</div>
	
<?php

}
//End of if condition for creating marksheet table	
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
<!--JS function to sort the table column elements -->
<script src="js/table_sort.js" />

<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
<?php include('script.php'); ?>
</html>