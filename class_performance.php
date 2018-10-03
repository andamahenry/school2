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
		<h3 class="box-title">Select Appropriate Fields to To SUMMARY OF RESULTS</h3><hr>
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
			<div class="col-xs-1">
			<br>
				<input type="submit" name="cmdsearch" value="Submit Details" class="btn btn-primary" />
			</div>
					
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
		
		if($mk==''){
			$std_mark = '';
		}
		if($mk!=-1 AND $mk!=-2 AND $mk!='' AND $mk!=NULL){
			$std_mark = $mk;
		}
		if($mk>=0 AND $mk<=9 AND $mk != NULL){
			$std_mark = $mk;
		}
		return $std_mark;
	}
	function finalOutput($value){//sanitize output value
		if($value >= 0 && $value <= 9){
			$_value = '0'.$value;
		}else{$_value = $value;}
		return $_value;
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
	$query1=mysql_query("SELECT subject,abbr FROM ncdc_olevel WHERE applicable='yes' ORDER BY type ASC,subject ASC",$con) or die('Woowe: '.mysql_error());
	while($row1=mysql_fetch_array($query1)){
		$full=$row1['subject'];//Query full subject names
		$abbr=$row1['abbr'];//Query subject abbreviations
		if(strtolower($class)=='senior 1' && strtolower($ourname)=='city hill college mutundwe' && strtolower($abbr)=='com'){continue;}
		if(strtolower($class)=='senior 2' && strtolower($ourname)=='city hill college mutundwe' && strtolower($abbr)=='ent'){continue;}
		array_push($subject_array,$full);//append full subject names to the array of subject names
		array_push($subject_abbr_array,$abbr);//append abbreviation to the array of subject abbreviations
	}
	//Query for student names from database
	?>
<div>
	<div class = "box-header with-border">			
		<h4 style="text-align:center;background-color:yellow;">
			<h1><center><strong><font size='36'><?php echo strtoupper($ourname);?></font></strong></center></h1>
			<h2><center><?php echo strtoupper($class).'&nbsp;'.strtoupper($exam_type).'&nbsp;'.strtoupper($term).'&nbsp SUMMARY OF RESULTS '.' - '.$Year;?></center></h2><hr>
		</h4>
	</div>
	<div>
		<table border=1 class="summary_table" style="width:90%;" align='center'>
			<thead>
				<tr>
					<th><center>NO.</center></th>
					<th><center>SUBJECT</center></th><th><center>D1</center></th><th><center>D2</center></th><th><center>C3</center></th>
					<th><center>C4</center></th><th><center>C5</center></th><th><center>C6</center></th><th><center>P7</center></th>
					<th><center>P8</center></th><th><center>F9</center></th><th><center>TOT</center></th><th><center>PASS</center></th>
					<th><center>FAIL</center><th><center>% PASS</center><th><center>% FAIL</center></th><th><center>TEACHER</center></th>
				</tr>
			</thead>
			<tbody>
			<?php
				//$snoarray=array();// empty array of serial numbers
				$pass = 0;$total_students = 0;$fail = 0;$totals = 0;$gtotal = 0;
				$d1 = 0;$d2 = 0;$c3 = 0;$c4 = 0;$c5 = 0;$c6 = 0;$p7 = 0;$p8 = 0;$f9 = 0;
				$td1 = 0;$td2 = 0;$tc3 = 0;$tc4 = 0;$tc5 = 0;$tc6 = 0;$tp7 = 0;$tp8 = 0;$tf9 = 0;
				$failed = 0;$agg_array = array();
				
				for($s_counter=0;$s_counter < COUNT($subject_array);++$s_counter){//fetch subjects from the array of subjects 
					$subj_abbr = $subject_abbr_array[$s_counter];$_subject = $subject_array[$s_counter];
					$teachers = mysql_query("SELECT name FROM subject_teachers WHERE class='$class' AND subject='$_subject'",$con) or die(mysql_error());
					while($row2=mysql_fetch_array($teachers)){$teacher = $row2['name'];}//select subject teacher's name from db
					$students = mysql_query("SELECT sno FROM students WHERE room_name='$class' AND active='yes'",$con) or die(mysql_error());
					while($row = mysql_fetch_array($students)){
						$_sno = $row['sno'];
						$marks = mysql_query("SELECT $subj_abbr FROM $marks_table WHERE sno='$_sno' AND class='$class' AND term='$term' AND 
							year='$Year' AND type='$exam_type'",$con) or die(mysql_error());
						while($row1 = mysql_fetch_array($marks)){
							$mark = $row1[$subj_abbr];
							if($mark >=-1 && $mark <=100){//if mark is not null
								$_mark = markSanitizer($mark);
								$points = aggFunction($mark)[1];
								if($points == 1){++$d1;++$td1;}if($points == 2){++$d2;++$td2;}if($points == 3){++$c3;++$tc3;}
								if($points == 4){++$c4;++$tc4;}if($points == 5){++$c5;++$tc5;}if($points == 6){++$c6;++$tc6;}
								if($points == 7){++$p7;++$tp7;}if($points == 8){++$p8;++$tp8;}if($points == 9){++$f9;++$tf9;}
								if($points >= 1 && $points <= 8){++$pass;}if($points >= 7 &&$points <= 9){++$fail;}
								$total_students+=1;//if($_mark > -2){++$total_students;}
							}
						}
					}
					if($total_students > 0){
						$p_pass = round(($pass/$total_students)*100);
						$p_fail = round(($fail/$total_students)*100);
					}else{$p_pass = 00;$p_fail = 00;}
				
			?>
				<tr>
					<td align="center"><?php echo ($s_counter+1).'.';?></td>
					<td><b><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'.strtoupper($_subject);?></b></td>
					<td align="center"><?php echo finalOutput($d1);?></td><td align="center"><?php echo finalOutput($d2);?></td>
					<td align="center"><?php echo finalOutput($c3);?></td><td align="center"><?php echo finalOutput($c4);?></td>
					<td align="center"><?php echo finalOutput($c5);?></td><td align="center"><?php echo finalOutput($c6);?></td>
					<td align="center"><?php echo finalOutput($p7);?></td><td align="center"><?php echo finalOutput($p8);?></td>
					<td align="center"><?php echo finalOutput($f9);?></td><td align="center"><b><?php echo finalOutput($total_students);?></b></td>
					<td align="center"><?php echo finalOutput($pass);?></td><td align="center"><?php echo finalOutput($fail);?></td>
					<td align="center"><?php echo finalOutput($p_pass).' %';?></td><td align="center"><?php echo finalOutput($p_fail).' %';?></td>
					<td align="left"><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$teacher;?></td>
				</tr>
				<?php
					$d1 = 0;$d2 = 0;$c3 = 0;$c4 = 0;$c5 = 0;$c6 = 0;$p7 = 0;$p8 = 0;$f9 = 0;$total_students=0;$pass = 0;$fail = 0;$totals=0;
					//$td1 = 0;$td2 = 0;$tc3 = 0;$tc4 = 0;$tc5 = 0;$tc6 = 0;$tp7 = 0;$tp8 = 0;$tf9 = 0;
				}
				$gtotal = ($td1 + $td2 + $tc3 + $tc4 + $tc5 + $tc6 + $tp7 + $tp8 + $tf9);
				?>
				<thead>
					<th></th><th><center>TOTALS</center></th><th><center><?php echo finalOutput($td1);?></center></th>
					<th><center><?php echo finalOutput($td2);?></center></th><th><center><?php echo finalOutput($tc3);?></center></th>
					<th><center><?php echo finalOutput($tc4);?></center></th><th><center><?php echo finalOutput($tc5);?></center></th>
					<th><center><?php echo finalOutput($tc6);?></center></th><th><center><?php echo finalOutput($tp7);?></center></th>
					<th><center><?php echo finalOutput($tp8);?></center></th><th><center><?php echo finalOutput($tf9);?></center></th>
					<th><center><?php echo finalOutput($gtotal);?></center></th><th></th><th></th><th></th><th></th><th></th>
				</thead>
			</tbody>
		</table>
	</div>
</div>
<script>
//function to sort table values
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("marksheetTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
     var x = rows[i].getElementsByTagName("TD")[n];
     var y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if(isNaN(x.innerHTML) || isNaN(y.innerHTML)){
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch= true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch= true;
              break;
            }
          }
      }else{
          if (dir == "asc") {
            if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
              // If so, mark as a switch and break the loop:
              shouldSwitch= true;
              break;
            }
          } else if (dir == "desc") {
            if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
              // If so, mark as a switch and break the loop:
              shouldSwitch= true;
              break;
            }
          }
      }  
    }
    if (shouldSwitch) {
	//var i = 0;
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

</script>
	
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