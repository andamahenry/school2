<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
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
	<link href="css/print.css" rel="stylesheet" type="text/css" media="print">
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
	
	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/alert.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <link rel="shortcut icon" href="uploads/shortcut_icon.jpg">

	<script>
	function searchFunction(){
		//Declare variables
		var input, filter, table, tr, td,td2, i,j;
		input = document.getElementById("search_input");
		filter = input.value.toUpperCase();
		table = document.getElementById("filterTable");
		//table = document.getElementById("filterSchTable");
		tr = table.getElementsByTagName("tr");
		//loop through all table rows, and hide those who don't match the search query
		for (i=0;i<tr.length;i++){
			td = tr[i].getElementsByTagName("td")[3];
			if (td){
				if(td.innerHTML.toUpperCase().indexOf(filter)>-1){
					tr[i].style.display = "";
				}else{
					tr[i].style.display = "none";
				}
			}	
		}
	}
	</script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Student Logs</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->	 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;<?php
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
				<!--The side bar menu script goes in here-->            <!-- /.navbar-collapse -->
            <!-- /.navbar-collapse -->
        </nav>
			<div id="page-wrapper">
            <div class="container-fluid">
			<br>
			<br>
			<br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<div class="container-fluid">
<div class="row-fluid"> 
<div class="p">

   
 </div>

</div>
</div>
</head>
</div>
<nav>
			
			<link href="css/table1.css" rel="stylesheet" type="text/css" />
			<div class = "form-group">
				<label for="comment">Search: </label>
				<input type = "text" id = "search_input" class="form-control" width="20%" placeholder = "Type First Name to filter" onkeyup = "searchFunction()"></input>
			</div>
			<form method="post">
			<div class="control-label" align="right">
<br>
<br>
				<table class="table" cellspacing="0" border="0" id="filterTable">
				<thead>
				<tr class="head">
				<th>Class</th>
				<th>Gender</th>
				<th>S.Number</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Photo</th>
				<th>Father name</th>
				<th>Age</th>
				<th>Birth Date</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Date</th>
				</tr>
				</thead>


<!-------------------------------- select table inventory ---------------------------------->
		<?php 
		$query=mysql_query("select * FROM students ORDER BY room_name ASC")or die(mysql_error());
		while($rec=mysql_fetch_array($query)){
		?>
		<tr class="edit_tr">
		<td><?php echo $rec['room_name']; ?></td>
		<td><?php echo $rec['gender']; ?></td>
		<td><?php echo $rec['sno']; ?></td>
		<td><?php echo $rec['fname'] ?></td>
		<td><?php echo $rec['lname'] ?></td>
		<td><img src = "uploads/<?php echo $rec['photo'] ?>" width = "30" height = "30"/></td>
		<td><?php echo $rec['nname'] ?></td>
		<td><?php echo $rec['age'] ?></td>
		<td><?php echo $rec['bdate'] ?></td>
		<td><?php echo $rec['address'] ?></td>
		<td><?php echo $rec['contact'] ?></td>
		<td><?php echo $rec['date_registered'] ?></td>
		</tr><?php }?>
			</table>
			</div>
			</form>
</nav>
<div class="empty">
<a href="#" class="btn btn-primary" onclick="window.print()" id="print" ><i class="fa fa-print"></i> Print Logs</a></button>
</div>
</div>
</div>
</div>
									
</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>