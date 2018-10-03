<?php
include("connect.php");
require_once('session1.php');
	$term = $_GET['term'];$class = $_GET['class'];$report_type = $_GET['report_type'];$year = $Year;$stream='';
	//print $term.'==>'.$class.'==>'.$report_type.'<br>';
//if(1){
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
	//$term = $_POST['term'];$class = $_POST['class'];$report_type = $_POST['report_type'];$year = $Year;$stream='';
	//$term = "TERM I";$class = "Senior 1";$report_type = "b.o.t and mid";$year = $Year;$stream = "";
	global $position_order;
		if(strtolower($class)=='senior 1' || strtolower($class)=='senior 2'){$position_order = "`div` ASC,total DESC";}
		if(strtolower($class)=='senior 3' || strtolower($class)=='senior 4'){$position_order = "`div` ASC,agg ASC";}
	
	$subject_array=array();//create empty array of subjects
	$subject_abbr_array=array();//create empty array of subject abbr
	//$students_array=array();//create an array of students
	
	//Query for subjects from database
	$query1=mysql_query("SELECT subject,abbr FROM ncdc_olevel WHERE applicable='yes' ORDER BY type,subject ASC",$con) or die('Woowe: '.mysql_error());
	while($row1=mysql_fetch_array($query1)){
		$subject=$row1['subject'];//Query subjects
		$abbr=$row1['abbr'];//Query subject abbreviations
		if(strtolower($class)=='senior 1' && strtolower($ourname)=='city hill college mutundwe' && strtolower($abbr)=='com'){continue;}
		if(strtolower($class)=='senior 2' && strtolower($ourname)=='city hill college mutundwe' && strtolower($abbr)=='ent'){continue;}
		array_push($subject_array,$subject);//append subject to the array of subjects
		array_push($subject_abbr_array,$abbr);//append abbreviation to the array of subject abbreviations
	}
	//calculate number of students before loop begins
	$ttotal=mysql_num_rows(mysql_query("SELECT sno FROM students WHERE room_name='$class' AND stream='$stream' AND active='yes'",$con));
	//Declare recurring variables
	//$std_name = '';$std_no = 1;
	$total_subjects = 0;$total_marks = 0;$total_agg = 0;$average_mark = 0;$missed_papers = 0;
	$failed = 0;
	$agg_array = array();
	
	//delete old positions if they exist in db
	$postatus = mysql_query("SELECT * FROM positions_progressive WHERE term='$term' AND class='$class' AND type='$report_type'
				AND year='$Year'",$con) or die(mysql_error());
	if(mysql_num_rows($postatus) > 0){
		mysql_query("DELETE FROM positions_progressive WHERE term='$term' AND class='$class' AND type='$report_type' AND year='$Year'",$con) 
		or die(mysql_error());
	}
	//Query for student names from database
	$student_names=mysql_query("SELECT * FROM students WHERE room_name='$class' AND stream='$stream' AND active='yes' ",$con) or die(mysql_error());
	while($row=mysql_fetch_array($student_names)){// LIMIT 100
		$sno = $row['sno'];
		$fname = $row['fname'];$lname = $row['lname'];
		$photo = $row['photo'];
		$gender = $row['gender'];
		//$ttotal = $row['ttotal'];
		
		//$snoarray=array();// empty array of serial numbers
		$std_name = ($fname.'&nbsp;'.$lname);

		$i=0;//Set subject index from the array of subjects and abbreviations
		foreach($subject_abbr_array as $subj){
			$subject_name = $subject_array[$i];//Assign subject name
			//Query for subject types from the thable of subjects
			$subject_types = mysql_query("SELECT type FROM ncdc_olevel WHERE abbr='$subj'",$con) or die('Luno: '.mysql_query());
			while($sub_type = mysql_fetch_array($subject_types)){
				$subject_type = $sub_type['type'];//Assign subject type
			}
			//select database table for each exam type
			if(strtolower($report_type)=='b.o.t and mid'){
				$marks_table1 = "marks_olevel_bot" AND $marks_table2 = "marks_olevel_mot";
				//$requirements = '';
				//Query sunbject marks from the table of marks
				$_marks=mysql_query("SELECT $marks_table1.sno,$marks_table1.$subj AS mark1,$marks_table2.$subj AS mark2 
						FROM $marks_table1 INNER JOIN $marks_table2 ON $marks_table1.sno = $marks_table2.sno 
						WHERE $marks_table1.sno='$sno' AND $marks_table1.term='$term' AND $marks_table1.year='$Year' ",$con) 
						or die(mysql_error());
				while($row=mysql_fetch_array($_marks)){
					$_mark1=$row['mark1'];
					$_mark2=$row['mark2'];
				}
			}
			if(strtolower($report_type)=='b.o.t and e.o.t'){
				$marks_table1 = "marks_olevel_bot" AND $marks_table2 = "marks_olevel_eot";
				//$requirements = '';
				//Query sunbject marks from the table of marks
				$_marks=mysql_query("SELECT $marks_table1.sno,$marks_table1.$subj AS mark1,$marks_table2.$subj AS mark2 
						FROM $marks_table1 INNER JOIN $marks_table2 ON $marks_table1.sno = $marks_table2.sno 
						WHERE $marks_table1.sno='$sno' AND $marks_table1.term='$term' AND $marks_table1.year='$Year' ",$con) 
						or die(mysql_error());
				while($row=mysql_fetch_array($_marks)){
					$_mark1=$row['mark1'];
					$_mark2=$row['mark2'];
				}
			}
			if(strtolower($report_type)=='mid and e.o.t'){
				$marks_table1 = "marks_olevel_mot" AND $marks_table2 = "marks_olevel_eot";
				//$requirements = '';
				//Query sunbject marks from the table of marks
				$_marks=mysql_query("SELECT $marks_table1.sno,$marks_table1.$subj AS mark1,$marks_table2.$subj AS mark2 
						FROM $marks_table1 INNER JOIN $marks_table2 ON $marks_table1.sno = $marks_table2.sno 
						WHERE $marks_table1.sno='$sno' AND $marks_table1.term='$term' AND $marks_table1.year='$Year' ",$con) 
						or die(mysql_error());;
				while($row=mysql_fetch_array($_marks)){
					$_mark1=$row['mark1'];
					$_mark2=$row['mark2'];
				}
			}	
			if($_mark1 < 0 && $_mark2 < 0){//Skip subject if student doesnt offer subject 
				++$i;
				continue;
			}
			if($_mark1==NULL && $_mark2==NULL){//Skip subject if has NULL marks
				++$i;
				continue;
			}
			//Calculate average marks
			if($_mark1 < 0 || $_mark1 == NULL){//chech if mark is valid for calculating average
				$avg_mark = round(($_mark2/2),0);
			}elseif($_mark2 < 0 || $_mark2 == NULL){//Chech if mark is valid for calculating average
				$avg_mark = round(($_mark1/2),0);
			}else{
				$avg_mark = round((($_mark1 + $_mark2)/2),0);//Calculate average mark
			}
			//Check whether the student missed any compulsory paper
			if(($avg_mark==NULL) && strtolower($subject_type) == 'compulsory'){array_push($agg_array,10);}
			if($avg_mark < 0){//if student has a missing mark
				if((strtolower($class)=='senior 1') OR (strtolower($class)=='senior 2')){//check whether class is S.1 or S.2
					++$missed_papers;
				}
				if((strtolower($class)=='senior 3') OR (strtolower($class)=='senior 4')){//check whether class is S.3 or S.4
					if($subject_type == 'compulsory'){
						++$missed_papers;
					}
				}
			}//End of condition for missing marks
			//Check if mark is valid and increment total number of valid marks
			if($avg_mark>=0 AND $avg_mark<=100 AND $avg_mark != NULL){$total_marks+=$avg_mark;}
			++$total_subjects;//Increment number of subjects attempted
			//Assign subject aggregate
			$agg_comment = aggFunction($avg_mark)[2];//Return Aggregate comment
			$aggregate_points = aggFunction($avg_mark)[1];//Return aggregate points
			$aggregate = aggFunction($avg_mark)[0];//to return aggregate abbr e.g D1
			$aggregate = 1;
			//check whether student passed both English and Mathematics
			if(strtolower($subj) == 'eng'){//if subject is English
				if($aggregate_points > 6){
					$failed+=1;
				}
			}
			if(strtolower($subj) == 'mtc'){//if subject is Mathematics
				if($aggregate_points > 8){
					$failed+=1;
				}
			}
		
		?>	
		<!-- tr>
			<td style="text-align:left;"><?php //echo '&nbsp;&nbsp;'.ucwords($subject_array[$i]);?></td>
			<td><?php //echo markSanitizer($_mark1);?></td><td><?php //echo markSanitizer($_mark2);?></td>
			<td -->
			<?php 
				if($avg_mark < 0){
					$avg_mark = '__';
				}
				//echo $avg_mark;
			?>
			<!-- /td>
			<td><?php //echo aggFunction($avg_mark)[0];?></td><td><?php //echo aggFunction($avg_mark)[1];?></td>
			<td><?php //echo $agg_comment;?></td>
			<td><?php //echo subjectTeacher($subject_name,$class);?></td>
		</tr -->

		<?php
		
		//Manipulate arrays and counters after every subject
			++$i;//Increment counter after every subject
			array_push($agg_array,aggFunction($avg_mark)[1]);
		}	
		
			$ascend =sort($agg_array);//Arrange array of grades in ascending order
			$_8 = array_slice($agg_array,0,8);//select the first 8 item of the array
			$best_8 = array_sum($_8);//Sums up the first eight elements of an array
			$div = gradeFunction($best_8)[0];$hteacher_comment = gradeFunction($best_8)[1];//$div = 	($best_8);							
			if($total_subjects==0 || $missed_papers>=1){$div = 'X';}//Set Division X if no subject done
			if($total_subjects!=0 && $total_subjects >= 8){//If Number of subjects offered by the student is atleast 1 subject
				if($missed_papers==0){//No paper missed
					if($failed > 0){//If failed Math or English or both
						if($failed == 1){//If failed Math OR English
							if($div=='I'){$div='II';}
							elseif($div=='II'){$div='III';}
							//else{$division_grade = $div;}
						}elseif($failed == 2){//If failed Math AND English
							if($div=='I' OR $div=='II'){$div='III';}
							//else{$division_grade = $div;}
						}//else{$division_grade = $div;}
					}elseif($failed==0){$div = $div;}
				}elseif($missed_papers > 0){
					$div = 'X';
				}
			}elseif($total_subjects < 8){$div = 'X';}
			if($total_subjects!=0){
				$average = ($total_marks/$total_subjects);
			}else{$average = 0;}
			
			//Assign student division/grade and headteacher's comment
			//$div = gradeFunction($best_8)[0];$hteacher_comment = gradeFunction($best_8)[1];
			//Change grade/division if failed English or Mathematics
			
			//Class teacher comments
			$query1=mysql_query("select * FROM comments_teacher ORDER BY max ASC ",$con)or die(mysql_error());
			while($row=mysql_fetch_array($query1)){
				$from = $row['fro'];
				$to = $row['max'];
				$commentz = $row['comment'];
				$avg=round($average,0);
				if ($avg >= $from && $avg <= $to){
					$tcomment = $commentz;
				}
			}

			if($total_subjects < 8){
				$best_8 = 'X';
			}
		
	//The following values were supposed to be output on the report form but will be instead saved in the positions db table
				
		mysql_query("INSERT INTO positions_progressive (id,sno,name,total,avg,agg,`div`,term,year,type,class)  
		VALUES ('','$sno','$std_name','$total_marks','$average','$best_8','$div','$term','$year','$report_type',
		'$class')",$con) or die('Nedda: '.mysql_error());


	$agg_array = array();$total_subjects = 0;$total_marks = 0;$missed_papers = 0;$failed = 0;
	}//End of loop for each student information
//}//End of if condition for creating report cards table on submittion of student details
//Function to return array of students according to class considerations i.e, order by grade division, aggregates and/or total

?>
<html>
<body>
<form name="" id="" method="POST" action="report_olevel_progressive.php">
	<h1><center>Generating student positions....</center></h1>
	<!-- term=$term&class=$class&report_type=$report_type -->
	<input type="input" name="term" value="<?php echo $term;?>" hidden />
	<input type="input" name="class" value="<?php echo $class;?>" hidden />
	<input type="input" name="report_type" value="<?php echo $report_type;?>" hidden />
	<input type="submit" name="cmdsearch" hidden id="my_submit" />
</form>	
	
<body>
<script>
function submitForm(){
	document.getElementById('my_submit').click();
}
submitForm();
</script>
<body>
</html>