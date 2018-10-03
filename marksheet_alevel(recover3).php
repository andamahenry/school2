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
	<div>
		<table border=1 class="marksheet_table" width='100%'>
			<thead>
				<tr>
					<th><center>NO.</center></th><th><center>NAME</center></th>
					<th><center>SUBJECT</center></th><th colspan='1'><center>SCORE</center></th><th>#</th>
					<th><center>SUBJECT</center></th><th colspan='4'><center>SCORE</center></th><th>#</th>
					<th><center>SUBJECT</center></th><th colspan='4'><center>SCORE</center></th><th>#</th>
					<th><center>SUBJECT</center></th><th colspan='4'><center>SCORE</center></th><th>#</th>
					<th><center>SUBJECT</center></th><th colspan='1'><center>SCORE</center></th><th>#</th>
					<th><center>POINTS</center></th>
				</tr>
			</head>
			<tbody>
			<?php
				$princi_array=array();// empty array of serial numbers
				$std_name = '';$std_no = 1;$total_subjects = 0;$subject_array = array();
				$rspan = 1;$tdcontent = '.';//set row span
				//$agg_array = array();
				//Query and loop through student names in the class
				$query2=mysql_query("SELECT sno,fname,lname FROM students WHERE room_name='$class' AND active='yes' 
									ORDER BY fname ASC LIMIT 10	",$con) or die('Kano: '.mysql_error());
				while($row2=mysql_fetch_array($query2)){// Do loop through each student in class
					$sno=$row2['sno'];
					$fname=$row2['fname'];
					$lname=$row2['lname'];
					$std_name .=$fname.' &nbsp; '.$lname; 
					
					$principle_subjects = array();$all_subsidiaries = array();$subsidiary_subject1 = '';$sub_counter = 0;
					//Select GP marks for each student
					$g_query=mysql_query("SELECT gp FROM $marks_table WHERE sno='$sno' AND year='$Year' AND term='$term' AND class='$class' 
							AND type='$exam_type' ",$con) 
							or die("Hooo, Kagannye: ".mysql_error());
					while($_g=mysql_fetch_array($g_query)){
						$_gpmark=$_g['gp'];
						if($_gpmark<0 || $_gpmark>100){
							continue;
						}elseif($_gpmark>=0 && $_gpmark<=100){
							$_gp = $_gpmark;
							//print '***'.$std_name.'--->'.$_gp.'<br>';
							break;
						}
					}
					echo	 "<tr>";//Table row for each student detail starts here
						echo "<td rowspan=".$rspan.">".$std_no."</td><td rowspan=".$rspan.">".$std_name."</td>
							<td align='center' rowspan=".$rspan."><b>GP</b></td>
							<td align='center' rowspan=".$rspan.">".markSanitizer($_gp)."</td>
							<td align='center' rowspan=".$rspan."><b>".scoreFunction($_gp)."</b></td>";
					//echo "</tr>";
					
					//Loop through all principle subjects to get the considerable ones
					foreach($principle_subject_abbr_array as $principle_subject){
						$principle_subject_marks=mysql_query("SELECT paper,$principle_subject FROM $marks_table WHERE sno='$sno' AND 
						year='$Year' AND term='$term' AND class='$class' AND type='$exam_type' AND $principle_subject > -2 ORDER BY paper ASC",$con) 
						or die(mysql_error());
						if(mysql_num_rows($principle_subject_marks)>0){
							while($row4=mysql_fetch_array($principle_subject_marks)){
								$principle_paper = $row4['paper'];//subject paper i.e; I, II, III
								$principle_mark = $row4[$principle_subject];//paper marks';
								if($principle_mark > -2 && $principle_mark <=100){
									$paper[$principle_paper] = $principle_mark;//Associated array of paper and mark
								}else{
									continue;//skip subject if mark is invalid
								}
							}
							$nof_papers = COUNT($paper);
							print $nof_papers.'*'.$principle_subject.'==>'.$principle_paper.'==>'.$paper[$principle_paper].'<br>';
							print_r ($paper);print '<br>';
							echo "<td align='center' rowspan=".$rspan."><b>".strtoupper($principle_subject)."</b></td>";
							//print "<td>-</td><td>-</td><td>-</td><td>-</td><td rowspan=".$rspan.">".$nof_papers."</td>";	
							//$b=0;
							/*for($a=0;$a<$nof_papers;$a++){
								print "<td>".$paper[$principle_paper]."</td>";
							}*/
								
							foreach($paper as $p_num => $p_code){
								print "<td>".$p_num."</td>";
							}
							$b = (4 - $nof_papers);
							for($b;$b > 0;$b--){
								print "<td>".'*'."</td>";
								//print "<td>".$a."</td>";
							}
							echo "<td rowspan=".$rspan.">".$nof_papers."</td>";
							
						}				
					}//end of each subject loop					
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
							
							print_r($subsidiary_subject);print '==>'.$std_name.'==>'.$sub_subject.'==>//////<br>';
						$sub_counter+=1;							
						}
					}
					if(COUNT($all_subsidiaries)==0){//This solves the problem of missing subsidiary subject
						print $sub_subject = 'missed';
						$subsidiary_marks = -1;
						$sub_papers = 'I';
						$subsidiary_subject1 = 'missed';
						$subsidiary_subject[$sub_papers] = $subsidiary_marks;
						$all_subsidiaries[$sub_subject] = $subsidiary_subject;
					}
						print_r($all_subsidiaries);print 'counter = '.$sub_counter.'<br>';
						//print 'subsidiary subject ==>'.$subsidiary_subject1;
					//Declare no. of done papers and the paper number array
					$done_papers_principle = 0;$paper = array();
					
					
					//Declare subject names for the first three subjects in the array of subjects
					
					//For Each Subsidiary Subject In Row -->
						
					echo "</tr>";
					
					/*print "<tr><td>".$tdcontent."<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
					print "<tr><td>".$tdcontent."<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
						*/			
				++$std_no;$std_name='';$princi_array = array();//$principle_subject_abbr_array = array();
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

<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
<?php include('script.php'); ?>
</html>