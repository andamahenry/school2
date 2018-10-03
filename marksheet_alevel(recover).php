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
		//print $_abbr1.',';
		if($_abbr1=='gp'){continue;}//Do not query general paper from subjects
		array_push($principle_subject_abbr_array,$_abbr1);//append abbreviation to the array of subject abbreviations
	}
	//print '<br>';
	//Query principle subjects from database
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
	<div>
		<table border=1 class="marksheet_table" width='100%'>
			<thead>
				<tr>
					<th><center>NO.</center></th><th><center>NAME</center></th>
					<th><center>SUBJECT</center></th><th colspan='4'><center>SCORE</center></th><th>#</th>
					<th><center>SUBJECT</center></th><th colspan='4'><center>SCORE</center></th><th>#</th>
					<th><center>SUBJECT</center></th><th colspan='4'><center>SCORE</center></th><th>#</th>
					<th><center>SUBJECT</center></th><th colspan='4'><center>SCORE</center></th><th>#</th>
					<th><center>SUBJECT</center></th><th colspan='4'><center>SCORE</center></th><th>#</th>
					<th><center>POINTS</center></th>
				</tr>
			</head>
			<tbody>
			<?php
				$princi_array=array();// empty array of serial numbers
				$std_name = '';$std_no = 1;$total_subjects = 0;$subject_array = array();
				//$agg_array = array();
				//Query and loop through student names in the class
				$query2=mysql_query("SELECT sno,fname,lname FROM students WHERE room_name='$class' AND active='yes' 
									ORDER BY fname ASC LIMIT 2	",$con) or die('Kano: '.mysql_error());
				while($row2=mysql_fetch_array($query2)){// Do loop through each student in class
					$sno=$row2['sno'];
					$fname=$row2['fname'];
					$lname=$row2['lname'];
					$std_name .=$fname.' &nbsp; '.$lname; 
					$gp = mysql_query("SELECT gp FROM $marks_table WHERE year='$Year' AND term='$term' AND class='$class' AND sno='$sno' AND 
					type='$exam_type'",$con) or die(mysql_error());
					while($row3=mysql_fetch_array($gp)){$_gp=$row3['gp'];}
					if(mysql_num_rows($gp)==0){$_gp='';}

					$principle_subjects = array();
					//select subjects with valid marks for each student in class
					foreach($subsidiary_subject_array as $subsidiary_subject){
						//print $subsidiary_subject;
						$subsidiary_subject_marks=mysql_query("SELECT $subsidiary_subject FROM $marks_table WHERE sno='$sno' AND year='$Year' AND 
								term='$term' AND class='$class' AND type='$exam_type' AND $subsidiary_subject > -2",$con) or die(mysql_error());
						while($row3=mysql_fetch_array($subsidiary_subject_marks)){
							$subsidiaries = $row3[$subsidiary_subject];
						}
						if(mysql_num_rows($subsidiary_subject_marks)==0){$subsidiaries=0;}
					}
					//Declare no. of done papers and the paper number array
					$done_papers_principle = 0;$paper = array();
					//Loop through all principle subjects to get the considerable ones
					foreach($principle_subject_abbr_array as $principle_subject){
						$principle_subject_marks=mysql_query("SELECT paper,$principle_subject FROM $marks_table WHERE sno='$sno' AND 
						year='$Year' AND term='$term' AND class='$class' AND type='$exam_type' ORDER BY paper ASC",$con) 
						or die(mysql_error());
						while($row4=mysql_fetch_array($principle_subject_marks)){
							$principle_paper = $row4['paper'];//subject paper i.e; I, II, III
							$principle_mark = $row4[$principle_subject];//paper marks';
							//print $principle_mark.',';
							if(mysql_num_rows($principle_subject_marks)>0){
								if($principle_mark >= -1){
									$paper[$principle_paper] = $principle_mark;//Associated array of paper and mark
									//print $principle_subject.'==>'.$principle_paper.'==>'.$paper[$principle_paper].'<br>';
								}
							}
						}
						if(mysql_num_rows($principle_subject_marks)>0){
							$no_papers = COUNT($paper);
							if($no_papers > 1){
								//print_r ($paper);print '--> These<br>';
								$principle_subjects[$principle_subject] = $paper;
								++$done_papers_principle;
							}
						}else{
							$no_papers = 0;
						}
						$no_papers = $no_papers;
						$paper = array();
					}//end of each subject loop
					
					print "===============================================<br>";
					////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//Get each subject name from the multi-dimensional Associated array of subjects, there papers and marks
					$std_principle_subjects = array();$std_papers_and_marks = array();
					foreach($principle_subjects as $_subject => $papers_and_marks){
						array_push($std_principle_subjects,$_subject);//Append subject names to the array of subjects
						array_push($std_papers_and_marks,$papers_and_marks);//Append array of papers and their marks to the array of papers and marks
					}
					//Get each subject paper and mark from the multi-dimensional Associated array of subjects, there papers and marks
					$std_principle_subjects = array();$std_papers_and_marks = array();
					foreach($principle_subjects as $_subject => $papers_and_marks){
						array_push($std_principle_subjects,$_subject);//Append subject names to the array of subjects
						array_push($std_papers_and_marks,$papers_and_marks);//Append array of papers and their marks to the array of papers and marks
					}
					
					//////////////////////////////////////////////////////////////////////////////////////////////////////						
						print '<br>'.$std_principle_subjects[0].' ===> ';print_r($std_papers_and_marks[0]);print '<br>';
						print '<br>'.$std_principle_subjects[1].' ===> ';print_r($std_papers_and_marks[1]);print '<br>';
						print '<br>'.$std_principle_subjects[2].' ===> ';print_r($std_papers_and_marks[2]);print '<br>';
					////////////////////////////////////////////////////////////////////////////
					//Declare subject names for the first three subjects in the array of subjects
					if(COUNT($std_principle_subjects) == 0){//For no principle subject offered
						$subject1 = '';$subject2 = '';$subject3 = '';
						$p_paper1_1 = '';$p_paper1_2 = '';$p_paper1_3 = '';$p_paper1_4 = '';
						
						$p_mark1_1 = '';$p_mark1_2 = '';$p_mark1_3 = '';$p_mark1_4 = '';
						$p_mark2_1 = '';$p_mark2_2 = '';$p_mark2_3 = '';$p_mark2_4 = '';
						$p_mark3_1 = '';$p_mark3_2 = '';$p_mark3_3 = '';$p_mark3_4 = '';
						$p_mark4_1 = '';$p_mark4_2 = '';$p_mark4_3 = '';$p_mark4_4 = '';

						
					}elseif(COUNT($std_principle_subjects) == 1){//For only one principle subject
						$subject1 = $std_principle_subjects[0];		$subject2 = '';$subject3 = '';
						
						$p_paper1_1 = '';$p_paper1_2 = '';$p_paper1_3 = '';$p_paper1_4 = '';
						$p_paper2_1 = '';$p_paper2_2 = '';$p_paper2_3 = '';$p_paper2_4 = '';
						$p_paper3_1 = '';$p_paper3_2 = '';$p_paper3_3 = '';$p_paper3_4 = '';
						
						$p_mark1_1 = '';$p_mark1_2 = '';$p_mark1_3 = '';$p_mark1_4 = '';
						$p_mark2_1 = '';$p_mark2_2 = '';$p_mark2_3 = '';$p_mark2_4 = '';
						$p_mark3_1 = '';$p_mark3_2 = '';$p_mark3_3 = '';$p_mark3_4 = '';
						$p_mark4_1 = '';$p_mark4_2 = '';$p_mark4_3 = '';$p_mark4_4 = '';
					
					}elseif(COUNT($std_principle_subjects) == 2){//For only two principle subjects
						$subject1 = $std_principle_subjects[0];
						$subject2 = $std_principle_subjects[1];
						$subject3 = '';
						
						$p_paper1_1 = '';$p_paper1_2 = '';$p_paper1_3 = '';$p_paper1_4 = '';
						$p_paper2_1 = '';$p_paper2_2 = '';$p_paper2_3 = '';$p_paper2_4 = '';
						$p_paper3_1 = '';$p_paper3_2 = '';$p_paper3_3 = '';$p_paper3_4 = '';
						
						$p_mark1_1 = '';$p_mark1_2 = '';$p_mark1_3 = '';$p_mark1_4 = '';
						$p_mark2_1 = '';$p_mark2_2 = '';$p_mark2_3 = '';$p_mark2_4 = '';
						$p_mark3_1 = '';$p_mark3_2 = '';$p_mark3_3 = '';$p_mark3_4 = '';
						$p_mark4_1 = '';$p_mark4_2 = '';$p_mark4_3 = '';$p_mark4_4 = '';
						
					}elseif(COUNT($std_principle_subjects) >= 3){//For three or more principle subjects
						$subject1 = $std_principle_subjects[0];
						$subject2 = $std_principle_subjects[1];
						$subject3 = $std_principle_subjects[2];
						
						for($j=0;$j < 3;++$j){
							print $subject_x = $std_principle_subjects[$j];
							print '<br>';
							foreach($principle_subjects[$subject_x] as $paper => $mark){
								print $paper.'*******'.$mark.'<br>';
							}
						}
						$p_paper1_1 = '';$p_paper1_2 = '';$p_paper1_3 = '';$p_paper1_4 = '';
						$p_paper2_1 = '';$p_paper2_2 = '';$p_paper2_3 = '';$p_paper2_4 = '';
						$p_paper3_1 = '';$p_paper3_2 = '';$p_paper3_3 = '';$p_paper3_4 = '';
						
						$p_mark1_1 = '';$p_mark1_2 = '';$p_mark1_3 = '';$p_mark1_4 = '';
						$p_mark2_1 = '';$p_mark2_2 = '';$p_mark2_3 = '';$p_mark2_4 = '';
						$p_mark3_1 = '';$p_mark3_2 = '';$p_mark3_3 = '';$p_mark3_4 = '';
						$p_mark4_1 = '';$p_mark4_2 = '';$p_mark4_3 = '';$p_mark4_4 = '';

						}
					/////////////////////////////////////////////////////////////////////////////
						
					print "===============================================<br>";
					print $std_name.' offered '.$done_papers_principle .' Principle Subjects<br>';
					print 'No. Papers ==>'.COUNT($principle_subjects).'<br>';//None of subject papers
					print '<br>';
					
				?>
				
					<tr>
						<td rowspan='3'><?php echo $std_no;?></td><td rowspan='3'><?php echo $std_name;?></td>
						<!-- For Each Subject In Row-->
						<td rowspan='3'><center>GP</center></td>
						<td><?php echo $_gp;?></td><td>-</td><td>-</td><td>-</td><td rowspan='3'>#</td>
						<!-- End Of Subject-->
						<!-- For Each Subject In Row-->
						<?php
						
						?>
						<td rowspan='3'><center><?php echo strtoupper($subject1);?></center></td>
						<td><?php echo strtoupper($p_paper1_1);?></td><td><?php echo strtoupper($p_paper1_2);?></td>
						<td><?php echo strtoupper($p_paper1_3);?></td><td><?php echo strtoupper($p_paper1_4);?></td><td rowspan='3'>#</td>
						<!-- End Of Subject-->
						<!-- For Each Subject In Row-->
						<td rowspan='3'><center><?php echo strtoupper($subject2);?></center></td>
						<td><?php echo strtoupper($p_paper2_1);?></td><td><?php echo strtoupper($p_paper2_2);?></td>
						<td><?php echo strtoupper($p_paper2_3);?></td><td><?php echo strtoupper($p_paper2_4);?></td><td rowspan='3'>#</td>
						<!-- End Of Subject-->
						<!-- For Each Subject In Row-->
						<td rowspan='3'><center><?php echo strtoupper($subject3);?></center></td>
						<td><?php echo strtoupper($p_paper3_1);?></td><td><?php echo strtoupper($p_paper3_2);?></td>
						<td><?php echo strtoupper($p_paper3_3);?></td><td><?php echo strtoupper($p_paper3_4);?></td><td rowspan='3'>#</td>
						<!-- End Of Subject-->
						<!-- For Each Subsidiary Subject In Row-->
						
						<td rowspan='3'><center><?php echo strtoupper($subsidiary_subject);?></center></td>
						<td>-</td><td>-</td><td>-</td><td>-</td><td rowspan='3'>#</td>
						<!-- End Of Subject-->
						<td rowspan='3'><center>*</center><td>
					</tr>
					<tr>
						<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
						<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
						<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
						<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
						
						
					</tr>
					<tr>
						<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
						<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
						<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
						<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
						
					</tr>
				<?php
			
				++$std_no;$std_name='';$princi_array = array();
				}//End of while loop for each student in class
			?>
			
			</tbody>
		</table>
		<br><hr><br>
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