<?php
mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
?>
<?php
	$paid =$_REQUEST['id'];
	$user_query = mysql_query("select * from bill where bill_id='$paid'")or die(mysql_error());
	while($row = mysql_fetch_array($user_query)){
	$status = $row['status'];
	{
		//dri nah mah edit xng data
		mysql_query("UPDATE bill SET status = '1' where bill_id='$paid'")or die(mysql_error()); 
}
}
?>
<script>
window.location = "billed.php";
</script>
