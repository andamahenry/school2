<?php
include_once "connect.php";


$id=$_POST['id'];
$class= $_POST['class'] ;

$N = count($id);
for($i=0; $i < $N; $i++)
{
	if ($class[$i]=='Senior 1'){$new_class = 'Senior 2';}
	if ($class[$i]=='Senior 2'){$new_class = 'Senior 3';}
	if ($class[$i]=='Senior 3'){$new_class = 'Senior 4';}
	if ($class[$i]=='Senior 4'){$new_class = 'Senior 5';}
	if ($class[$i]=='Senior 5'){$new_class = 'Senior 6';}
	if ($class[$i]=='Senior 6'){$new_class = 'Senior 6';}
	//if ($class[$i]=='Senior 1'){}
	//print $new_class;
	$result = mysql_query("UPDATE students SET class= '$new_class' where id=$id[$i]",$con)or die(mysql_error());

if($result)
	{
		?>
        <script>
		alert('<?php echo $N." Students have been promoted to the Next Class!"; ?>');
		window.location.href='student_view.php';
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('error while promoting , TRY AGAIN');
		</script>
        <?php
	}	
	
	
	
	}

?>