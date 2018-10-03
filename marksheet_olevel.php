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
			$std_mark = '';
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
			$grade = 'x' AND $point = '10';
		}
		return array($grade,$point);//returns array of grades and points
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
			if ($div_agg >= $from && $div_agg <= $to) {
				$division = $division1;
			}
		}
		return $division;
	}
	$term = $_POST['term'];$class = $_POST['class'];$exam_type = $_POST['exam_type'];$year = $Year;
	//$teacher = $_POST['teacher'];//class teacher
	//$std_marks = $_POST['marks'];//student marks from the marks form
	//$std_numbers = $_POST['sno'];//student numbers from the form
	//$nof_items=COUNT($std_numbers);//number of marks entries submited from the marks form
	//select database table for each exam type
	if(strtolower($exam_type)=='b.o.t'){$marks_table = "marks_olevel_bot";}
	if(strtolower($exam_type)=='mid'){$marks_table = "marks_olevel_mot";}
	if(strtolower($exam_type)=='e.o.t'){$marks_table = "marks_olevel_eot";}
	if(strtolower($exam_type)=='progressive'){$marks_table = "marks_olevel";}
	
	$subject_array=array();//create empty array of subjects
	$subject_abbr_array=array();//create empty array of subject abbr
	//$ass_array=array();//create an associative array of subjects
	
	//Query for subjects from database
	$query1=mysql_query("SELECT subject,abbr FROM ncdc_olevel WHERE applicable='yes' ORDER BY type ASC",$con) or die('Woowe: '.mysql_error());
	while($row1=mysql_fetch_array($query1)){
		$abbr=$row1['abbr'];//Query subject abbreviations
		if(strtolower($class)=='senior 1' && strtolower($ourname)=='city hill college mutundwe' && strtolower($abbr)=='com'){continue;}
		if(strtolower($class)=='senior 2' && strtolower($ourname)=='city hill college mutundwe' && strtolower($abbr)=='ent'){continue;}
		array_push($subject_abbr_array,$abbr);//append abbreviation to the array of subject abbreviations
	}
	//Query for student names from database
	?>
<!--div class = "print_visible_marksheet"  style="border-spacing:0px;margin:0px 0px 100px -10px; width=100%;"-->
<div class ="print_visible_marksheet">
	<div class = "box-header with-border">			
		<h4 style="text-align:center;background-color:yellow;"> 
			<h1><center><strong><font size='36'><?php echo strtoupper($ourname);?></font></strong></center></h1>
			<h2><center><?php echo strtoupper($exam_type).' MARKSHEET FOR '.strtoupper($class).' '.strtoupper($term).' - '.$Year;?></center></h2><hr>
		</h4>
	</div>
	<div>
		<table border=1 class="marksheetTable" id="marksheetTable" align='center' width='100%'>
			<thead>
				<tr>
					<th onclick="sortTable(0)"><b>NO.</b></th>
					<th style="text-align:center;" onclick="sortTable(1)"><b>STUDENT NAME</center></th>
					<?php
					$h=1;
					foreach($subject_abbr_array as $abbr_head){
						$h++;echo "<th onclick='sortTable(".$h.")'><center>".strtoupper(substr($abbr_head,0,4))."</center></th>";
					}
					//$_subjects = count($subject_abbr_array);//print $_subjects;
					?>
					
					<th style="text-align:center;" onclick="sortTable(<?php echo ($h+1);?>)">TOT</th>
					<th onclick="sortTable(<?php echo ($h+2);?>)"><center>AVG</center></th>
					<th onclick="sortTable(<?php echo ($h+3);?>)"><center>AGG</center></th>
					<th onclick="sortTable(<?php echo ($h+4);?>)"><center>DIV</center></th>
					<th onclick="sortTable(<?php echo ($h+5);?>)"><center>MIS</center></th>
				</tr>
			</head>
			<tbody>
				<?php
				$snoarray=array();// empty array of serial numbers
				$std_name = '';$std_no = 1;$total_subjects = 0;$total_marks = 0;$total_agg = 0;$average_mark = 0;$missed_papers = 0;
				$failed = 0;$agg_array = array();
				//Query and loop through student names in the class
				$query2=mysql_query("SELECT sno,fname,lname FROM students WHERE room_name='$class' AND active='yes' 
									ORDER BY fname ASC	",$con) or die('Kano: '.mysql_error());
				while($row2=mysql_fetch_array($query2)){
					$sno=$row2['sno'];
					$fname=$row2['fname'];
					$lname=$row2['lname'];
					$std_name .=$fname.' &nbsp; '.$lname; 
					echo '<tr>';//start new table row for tbody
						echo '<td><center>'.$std_no.'</center></td>';
						echo '<td henry='.$fname.$lname.'>&nbsp;&nbsp;'.$std_name.'</td>';
						foreach($subject_abbr_array as $abbr_head){
							//Select whether the subject is compulsory or optional
							$subject_types = mysql_query("SELECT type FROM ncdc_olevel WHERE abbr='$abbr_head'",$con) or die('Luno: '.mysql_query());
							while($sub_type = mysql_fetch_array($subject_types)){
								$subject_type = $sub_type['type'];
							}
							//Query for marks from the table of marks
							$subject_mark = mysql_query("SELECT $abbr_head FROM $marks_table WHERE sno='$sno' AND term='$term' AND year='$Year'",$con) or die('Tabbu: '.mysql_error());
							while($marks = mysql_fetch_array($subject_mark)){
								$mark = $marks[$abbr_head];
							}
							//Check whether the student missed any compulsory paper
							if($mark==NULL && strtolower($subject_type) == 'compulsory'){array_push($agg_array,10);}
							if($mark==-1 OR $mark==-2){//if student has a missing mark
								if((strtolower($class)=='senior 1') OR (strtolower($class)=='senior 2')){//check whether class is S.1 or S.2
									++$missed_papers;
								}
								if((strtolower($class)=='senior 3') OR (strtolower($class)=='senior 4')){//check whether class is S.3 or S.4
									if($subject_type == 'compulsory'){
										++$missed_papers;
									}
									if($subject_type == 'optional' && $mark==-1){
										++$missed_papers;
									}
								}
							}//End of condition for missing marks
							//Sanitize marks and grades
							$edited_mark = markSanitizer($mark);$edited_agg = '('.aggFunction($mark)[0].')';
							if($edited_mark==''){//Decide whether to print grade for missing mark or not 
								$edited_agg = '';
							}
							if($mark>=0 AND $mark<=100 AND $mark != NULL){//condition for adding up marks
								$total_marks = ($total_marks + $mark);
								$aggregate_points = aggFunction($mark)[1];
								$total_agg +=$aggregate_points;
								$total_subjects+=1;
								array_push($agg_array,$aggregate_points);//append aggregates to array of aggregates
								if(strtolower($abbr_head) == 'eng'){//if subject is English
									if($aggregate_points > 6){
										++$failed;
									}
								}
								if(strtolower($abbr_head) == 'mtc'){//if subject is Mathematics
									if($aggregate_points > 8){
										++$failed;
									}
								}
							}
							if($mark==NULL){array_push($agg_array,10);}
							
							//Print marks and grades
							echo '<td henry='.$mark.'><center>'.'<b>'.$edited_mark.'</b> '.'<sub>'.$edited_agg.'</sub>'.'</center></td>';
						}
						//Choose best 8 done subjects
						$ascend =sort($agg_array);//Arrange array of grades in ascending order
						$_8 = array_slice($agg_array,0,8);//select the first 8 item of the array
						$best_8=array_sum($_8);//Sums up the first eight elements of an array
						//print_r($_8);
						//print_r($agg_array);
						//End of Algorithm for choosing best 8 done subjects
						
						//Conditions to calculate average mark
						if($total_subjects==0){
							$divisor = 1;
						}elseif($total_subjects>0){
							if(strtolower($class)=='senior 1' OR strtolower($class)=='senior 2'){
								$divisor = 15;
							}
							if(strtolower($class)=='senior 3' OR strtolower($class)=='senior 4'){
								$divisor = 10;
							}
						}
						//Division calculator (Calculate student Grades/Divisions)
						if($total_subjects==0 || $missed_papers>=1){$div = 'X';}//Set Division X if no subject done
						if($total_subjects >= 8){//if Number of subjects offered by the student is atleast 8
							$division =	gradeFunction($best_8);
							$div = $division;
							if($missed_papers==0){//No paper missed
								if($failed > 0){//If failed Math or English or both
									if($failed == 1){//If failed Math OR English
										if($division=='I'){$div='II';}
										elseif($division=='II'){$div='III';}
									}elseif($failed == 2){//If failed Math AND English
										if($division=='I' OR $division=='II'){$div='III';}
									}
								}else{$div = $division;}
							}elseif($missed_papers > 0){
								$div = 'X';
							}
						}
						if($total_subjects > 0 && $total_subjects < 8){
							$div = 'X';
						}
						$average_mark = ($total_marks/$divisor);//Calculates average mark using the assigned divisor
						if(($total_marks%$divisor)==0){//Check whether the average is a float
							$average_mark = round($average_mark,1).'.0';//Add one decimal place if the average is an integer
						}else{$average_mark = round($average_mark,1);}
						echo '<td henry='.$total_marks.'><center><b>'.$total_marks.'</center></b></td>';
						echo '<td henry='.$average_mark.'><center><b>'.$average_mark.'</center></b></td>';
						//$agg_attr = 'henry='.$best_8;//Create HTML atttibute 'henry'
						echo "<td henry='".$best_8."' ><center><b>".$best_8.'</center></b></td>';
						echo "<td henry='".$div."' ><center><b>".$div.'</center></b></td>';
						echo '<td henry='.$missed_papers.' ><center><b>'.$missed_papers.'</center></b></td>';
						$std_name = '';$total_marks = 0;$total_agg = 0;$average_mark = 0;++$std_no;$total_subjects=0;$missed_papers=0;//reset counters
						$failed = 0;$div = '';$agg_array = array();//$agg_attr='';//Reset arrays to empty
					echo '<tr>';//end table row for each student in class
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
<!-- /#wrapper -->
</nav>

<!--JS function to sort the table column elements -->
<script src="js/table_sort.js" />
	
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