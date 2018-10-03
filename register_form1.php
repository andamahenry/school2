<?php
//mysql_select_db('billdb',mysql_connect('localhost','root',''))or die(mysql_error());
include("connect.php");
?>
  <!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Register</title>
    <!--  Bootstrap Style -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--  Font-Awesome Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--  Animation Style -->
    <link href="assets/css/animate.css" rel="stylesheet" />
    <!--  Pretty Photo Style -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
    <!--  Google Font Style -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--  Custom Style -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background:url(assets/img/head1.jpg) no-repeat center center fixed;
		-webkit-background-size: cover !important;
		-moz-background-size: cover !important;
		-o-background-size: cover !important;
		background-size: cover !important;
	">
    <div id="pre-div">
        <div id="loader">
        </div>
    </div>
    <!--/. PRELOADER END -->
    
	<!--./ NAV BAR END -->
    <div id="home" >
        <div class="overlay">
            <div class="container">
				<div class="span3"><div class="title_index"><div class="row-fluid"></div></div>
				
                    <div class="col-lg-4 col-md-5">
                        <div class="div-trans text-center">
                            <h3>Register Yourself</h3>
                            <div class="col-lg-12 col-md-12 col-sm-12" >
                                <form method="post" role="form">
                                       
                                     <div class="form-group">
                                            <input type="text" name="fname" id="fname"class="form-control" placeholder="First Name" required autofocus/>
                                        </div>
										<div class="form-group">
                                            <input type="text" name="lname" id="lname"class="form-control" placeholder="Last Name" required autofocus/>
                                        </div>
										<div class="form-group">
                                            <input type="text" name="username" id="username"class="form-control" placeholder="Desired Username" required autofocus/>
                                        </div>
                                      <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required/>
                                        </div>
										<br>
										<div class="row-md-5 col-md-offset-6 column">
                                     <button type="submit" id="submit" name="register" class="btn btn-primary">Sign Up</button> 
									 <a href="index.php" class="btn btn-primary">Back</a>
									 </div>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
		<br>
				<br>
				<br>
				<br>
				<br>
				<div class="row-fluid">
				<div class="col-md-3 col-md-offset-1">
				
			
				<div class="span3"><img class="index_logo" height="250" width="500" src="assets/img/logocalc.png"></div>
												
				
				
				</div></div>
				
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				
				<div class="row-fluid">
				<div class="col-md-5 col-md-offset-2">
				<h4><span id=tick2>
				</span>&nbsp;| 
<script>
				function show2(){
				if (!document.all&&!document.getElementById)
				return
				thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
				var Digital=new Date()
				var hours=Digital.getHours()
				var minutes=Digital.getMinutes()
				var seconds=Digital.getSeconds()
				var dn="PM"
				if (hours<12)
				dn="AM"
				if (hours>12)
				hours=hours-12
				if (hours==0)
				hours=12
				if (minutes<=9)
				minutes="0"+minutes
				if (seconds<=9)
				seconds="0"+seconds
				var ctime=hours+":"+minutes+":"+seconds+" "+dn
				thelement.innerHTML=ctime
				setTimeout("show2()",1000)
				}
				window.onload=show2
				//-->
</script>
	      <?php
            $date = new DateTime();
            echo $date->format('l, F jS, Y');
          ?>
    </div>
    </div>
    </div>
    </div>
    </div>
   
	<?php
	if (isset($_POST['register'])){
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$query = mysql_query("select * from admin where username = '$username' and password = '$password' and fname = '$fname' and lname = '$lname' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
	mysql_query("insert into admin (fname,lname,username,password) values('$fname','$lname','$username','$password')")or die(mysql_error());
	
	}
	
	?>
	<script>
alert('Succsessfully Save');
window.location = "index.php";
</script>
<?php
}?>

		
				
				
			
				
		</div>
	
	
	</center>
</div>
<div id="footser-end">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                   &copy; 2014 waqasyaqoob.com | by <a href="http://www.binarytheme.com/" style="color:#fff;" target="_blank" >binarytheme.com</a>
                    
                </div>
            </div>

        </div>
    </div>
<!--./ FOOTER SECTION END -->
    <!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
     <!--  WOW Script -->
    <script src="assets/js/wow.min.js"></script>
    <!--  Scrolling Script -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  PrettyPhoto Script -->
    <!--  Custom Scripts -->
    <script src="assets/js/custom.js"></script>
	
	</body>
</html>