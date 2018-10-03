<?php
include("connect.php");
require_once('session1.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Examination Cards</title>
</head>

<body>

<?php

if(isset($_POST['cmdsearch'])){
	
	$term = $_POST['term'];$class = $_POST['class'];$exam_type = $_POST['exam_type'];$year = $Year;
	
	if(strtolower($class)=='senior 5' || strtolower($class)=='senior 6'){
		$clearance_table = "clearance_exam_alevel" && $subjects_table = "ncdc_alevel";
	}
	if(strtolower($class)!='senior 5' && strtolower($class)!='senior 6'){
		$clearance_table = "clearance_exam_olevel" && $subjects_table = "ncdc_olevel";
	}

	//$sno_array = array();//create empty array of subjects
	//$subject_abbr_array=array();//create empty array of subject abbr
	//$ass_array=array();//create an associative array of subjects
	
	//Query for subjects from database
	$query1=mysql_query("SELECT subject,abbr FROM `$subjects_table` WHERE applicable='yes' ORDER BY type ASC",$con) or die('Woowe: '.mysql_error());
	while($row1=mysql_fetch_array($query1)){
		$abbr=$row1['abbr'];//Query subject abbreviations
		if(strtolower($class)=='senior 1' && strtolower($ourname)=='city hill college mutundwe' && strtolower($abbr)=='com'){continue;}
		if(strtolower($class)=='senior 2' && strtolower($ourname)=='city hill college mutundwe' && strtolower($abbr)=='ent'){continue;}
		//array_push($subject_abbr_array,$abbr);//append abbreviation to the array of subject abbreviations
	}
	//Query for student names from database
	?>
<div class = "print_visible">
	
	<div>
		<table align='center' width='100%' border=1 style="border-spacing:0px" id="marksheetTable">
			<thead>
				<th><center><i>--- clearance forms ---</i></center></th>
			</thead>
			<tbody>
				<?php
				$sno_array=array();// empty array of serial numbers
				$std_name = '';$std_no = 1;$total_subjects = 0;$total_marks = 0;$total_agg = 0;$average_mark = 0;$missed_papers = 0;
				$failed = 0; $std_name_array = array();$std_photo_array = array();
				//Query and loop through student names in the class
				$query2=mysql_query("SELECT sno,fname,lname,photo FROM students WHERE room_name='$class' AND active='yes' 
									ORDER BY fname ASC",$con) or die('Kano: '.mysql_error());
				while($row2=mysql_fetch_array($query2)){
					$sno=$row2['sno'];
					$fname=$row2['fname'];
					$lname=$row2['lname'];
					$photo=$row2['photo'];
					$std_name = ($fname.' &nbsp; '.$lname);
					//$std_name = $fname;
					array_push($sno_array,$sno);array_push($std_name_array,$std_name);array_push($std_photo_array,$photo);
				}	
				//print COUNT($std_name_array);//print number of student names in db
				$i=0;
				//foreach($std_name_array as $std_name){
				while($i<COUNT($std_name_array)){
				?>
				<tr>
					<td>
					<div class="form-group" >
						<div class="col-md-6" style="border-style:solid;">
							<?php 
								$std_name = $std_name_array[$i];
								$std_photo = $std_photo_array[$i];
								//$std_name = $sno;
							?>
							
							<center>
								<strong>
									<span style="font-size:26px;"><?php echo ''.strtoupper($ourname).'<br>';?></span>
									<span style="font-size:20px;"><?php echo strtoupper($term).' EXAMINATION PERMIT FOR '.' - '.strtoupper($Year);?></span>
									<br> 
								</strong>
							</center><br>
							<div>
								<?php echo "<b>NAME: ".$std_name.'<br><br>CLASS: '.strtoupper($class).'</b><br>';?>
								<img src="uploads/<?php echo $std_photo;?>" width="160px" height="160px" align = "right" />
							</div>
								<br>
							<div class="col-md-5">	
								<?php echo '<center><br>ALLOWED TO SIT FOR ALL EXAMS!<br></center>';?>
							</div>
								<div style="position:bottom;">
									<?php echo "<br><br><br><br><br>D.O.S' SIGNATURE: ...............................";?>
								</div>
						</div>	
						
						<?php 
								$i++;
						?>
						<!-- div class = "col-md-1"/ -->
						<div class="col-md-6" style="border-style:solid;">
							<?php 
								$std_name = $std_name_array[$i];
								$std_photo = $std_photo_array[$i];
								//$std_name = $sno;
							?>
							<center>
								<strong>
									<span style="font-size:26px;"><?php echo ''.strtoupper($ourname).'<br>';?></span>
									<span style="font-size:20px;"><?php echo strtoupper($term).' EXAMINATION PERMIT FOR '.' - '.strtoupper($Year);?></span>
									<br> 
								</strong>
							</center><br>
							<div>
								<?php echo "<b>NAME: ".$std_name.'<br><br>CLASS: '.strtoupper($class).'</b><br>';?>
								<img src="uploads/<?php echo $std_photo;?>" width="160px" height="160px" align = "right" />
							</div>
								<br>
							<div class="col-md-5">	
								<?php echo '<center><br>ALLOWED TO SIT FOR ALL EXAMS!<br></center>';?>
							</div>
								<div style="position:bottom;">
									<?php echo "<br><br><br><br><br>Bursar's SIGNATURE: ...............................";?>
								</div>
						</div>	
					</div>
						<!-- div class = "col-md-1"/ -->
					</td>
				</tr>
				
				<?php
				$i++;//$std_name = '';//$i 
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

</body>
</html>