<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
include("connect.php");

$id = 1;
$col = '';
$query = mysql_query("SELECT * FROM settings WHERE id=$id",$con);
$row=mysql_fetch_array($query);
if(isset($_POST['register']))
{
	$id = $_POST['memi'];
	$a = $_POST['name'];
	$b = $_POST['address'];
	$c = $_POST['phone'];
	$d = $_POST['email'];
	$e = $_POST['country'];
	$f = $_POST['address2'];
	$g = $_POST['currency'];
	$h = $_POST['title'];
	$i = $_POST['timezone'];
	$j = $_POST['abbr'];
	$k = $_POST['next_term'];
	$l = $_POST['boxnumber'];
	$m = $_POST['current_term'];
	$n = $_POST['reportcolumn'];
	$len = array_reduce($n);
	foreach($n as $ary){
		$col = $col.$ary.',';
	}
	$n = rtrim($col,',');
	
	$imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];
				
	if($imgFile)
	{
		$upload_dir = 'logo/'; // upload directory	
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		$userpic = rand(1000,1000000).".".$imgExt;
		if(in_array($imgExt, $valid_extensions))
		{			
			if($imgSize < 5000000)
			{
				unlink($upload_dir.$row['image']);
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			}
			else
			{
				$errMSG = "Sorry, your file is too large it should be less then 5MB";
			}
		}
		else
		{
			$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
		}	
	}
	else
	{
		// if no image selected the old image remain as it is.
		$userpic = $row['logo']; // old image from database
	}	
	// if no error occured, continue ....
	if(!isset($errMSG))
	{
	$sql = "UPDATE settings SET name='$a', address='$b', phone='$c', email='$d', country='$e', address='$f', currency='$g',
	title='$h', logo='$userpic', timezone='$i', abbr='$j',next_term='$k',boxnumber='$l',current_term='$m',exam_columns='$n'  WHERE id=$id";//,($a,$b,$c,$d,$e,$f,$g,$h,$userpic,$i,$j,$id)";
	mysql_query($sql,$con) or die('Banange: '.mysql_error());
	
	header("location: settings.php");		
	}						
}

?>

<?php
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

  <link rel="shortcut icon" href="assets/img/calculator.png">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <title>Settings</title>

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

                <!-- Page Heading -->
                <div id="page-wrapper">

				<nav>
				<center><h4><strong>Our School Settings</strong><h4></center>
				<div id="block_bg" class="block">	
					<div class="navbar navbar-inner block-header">
						<div class="block-content collapse in">
							<div class="span12">
							<!-----------------------form --------------------->
			<form method="post" enctype="multipart/form-data" class="form-horizontal">
		   
		   <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
		   <div class="container">

		   <div class="row">
		   <div class="col-xs-10">
		   
		  <label for="exampleInputEmail1">School Name</label>
		  <input type="hidden" name="memi" value="<?php echo $id; ?>" />
          <input type="text"  name="name" class="form-control" id="skills"  value="<?php echo $row['name']; ?>">
          </div>
		  </div>
		   </br>
              <div class="row">
        <div class="col-xs-5">	
                <label for="exampleInputEmail1">Address Line 1</label>
                  <input type="text"  name="address"  class="form-control" value="<?php echo $row['address']; ?>">
                </div>
               <div class="col-xs-5">
                  <label for="exampleInputEmail1">Address Line 2</label>
                  <input type="text"  name="address2"  class="form-control" value="<?php echo $row['address2']; ?>">
                </div>
			</div>
			</br>
				 <div class="row">
        <div class="col-xs-5">
                  <label for="exampleInputEmail1">Phone Number</label>
                  <input type="text"  name="phone"  class="form-control"value="<?php echo $row['phone']; ?>" >
                </div>
				
				<div class="col-xs-5">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text"  name="email"  class="form-control" value="<?php echo $row['email']; ?>" >
                </div>
				</div>
			
				</br>
				
				
			 <div class="row">
				<div class="col-xs-5">
                  <label for="exampleInputEmail1">Currency Symbol</label>
                  <input type="text"  name="currency"  class="form-control" value="<?php echo $row['currency']; ?>" >
                </div>	
				
				<div class="col-xs-5">
                  <label for="exampleInputEmail1">Country</label>
                  <input type="text"  name="country"  class="form-control" value="<?php echo $row['country']; ?>" >
                </div>
				
				</div>
					</br>
				
				 <div class="row">
				<div class="col-xs-5">
                  <label for="exampleInputEmail1">Meta Title</label>
                  <input type="text"  name="title"  class="form-control" value="<?php echo $row['title']; ?>" >
                </div>	
				<div class="col-xs-5">
                  <label for="exampleInputEmail1">Time Zone (<a href="http://php.net/manual/en/timezones.php" target='_blank'>Check your Time Zone here</a> )</label>
				 
        	    <input class="form-control"  type="text" name="timezone" value="<?php echo $row['timezone']; ?>" /> 

				  </div>
				</div>	
				</br>
			
				 <div class="row">
				<div class="col-xs-5">
                  <p><label for="exampleInputEmail1">Logo</label></p>
				 <img src="logo/<?php echo $row['logo']; ?>" height="250px" width="250px" id="blah" />
				 </br></br>
				<input class="input-group" type="file" name="user_image" accept="image/*" onchange="readURL(this);" /> 

				  </div>
				  
				 <div class="col-xs-5">
                  <label for="exampleInputEmail1">School Abbreviation (ie "S" for "Senior")</label>
                  <input type="text"  name="abbr"  class="form-control" value="<?php echo $row['abbr']; ?>" >
                </div>
				<div class="col-xs-5">
					</br>
                  <label for="exampleInputEmail1">Next Term Begins On:</label>
                  <input type="text"  name="next_term"  class="form-control" value="<?php echo $row['next_term']; ?>" >
                </div>				
				<div class="col-xs-5">
					</br>
                  <label for="exampleInputEmail1">P.O BOX:</label>
                  <input type="text"  name="boxnumber"  class="form-control" value="<?php echo $row['boxnumber']; ?>" >
                </div>
				<div class="col-xs-5">
					</br>
                  <label for="exampleInputEmail1">Current Term:</label>
                  <select name="current_term" class="form-control">
					<?php 
						$list_term=mysql_query("SELECT name FROM terms ORDER BY name ASC",$con) or die('Haaa:'.mysql_error());
						$currentterm=mysql_query("SELECT current_term FROM settings WHERE id='1'",$con) or die('Haaa:'.mysql_error());
						$current_term=mysql_fetch_array($currentterm);
						echo '<option selected>'.$current_term['current_term'].'</option>';
						while($rowterm=mysql_fetch_array($list_term)){
							$termlist=$rowterm['name'];
							echo '<option>'.$termlist.'</option>';
						}
					?>	
				  <select>
                </div>
				<div class="col-xs-5">
				</br>
                  <fieldset>
					<legend><strong>Progressive Report:</strong></legend>
					<input type='checkbox' name='reportcolumn[]' value='B.O.T'><strong> B.O.T&nbsp;&nbsp;</strong></input>
					<input type='checkbox' name='reportcolumn[]' value='M.O.T'><strong> M.O.T&nbsp;&nbsp;</strong></input>
					<input type='checkbox' name='reportcolumn[]' value='E.O.T'><strong> E.O.T&nbsp;&nbsp;</strong></input>
					<br><?php print ($row['exam_columns']);?>
					<br><?php //print($a);?>
					
				  </fieldset>
 
                </div>	
				</div>	
				</br>
				</br>

                <div>
                <button type="submit" name="register" class="btn btn-primary">UPDATE</button>
				
              </div>
           </div>
			   <?php
/*}*/
?> 
            </form>
			</br>
					
								
								
								
								
							</div>
						</div>
					</div>
				</div>
									
</nav>
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
<script src="js/angular.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/app.js"></script>   
<script src="js/jquery.min.js"></script> 
<script>
function readURL(input){
	if (input.files && input.files[0]){
		var reader = new FileReader();
		reader.onload = function(e){
			$('#blah').attr('src',e.target.result).width(150).height(200);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
</script>
	
	<?php include('script.php'); ?>
</body>
</html>
