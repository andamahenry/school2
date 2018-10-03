<?php
mysql_select_db('billdb', mysql_connect('localhost', 'root', ''))or die(mysql_error());
?>
<?php
	$del =$_REQUEST['id'];

	mysql_query("DELETE FROM bill WHERE bill_id = '$del'")or die(mysql_error());  	
	
?>
<script>
alert('Deleted Successfuly');
window.location = "billed.php";
</script>