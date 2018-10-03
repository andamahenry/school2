<?php
if(isset($_POST["register"])) {
	/*print "The Student NumId is: ".$_POST['stdno']."<BR>";
	//print "The Student pHOTO name is: ".$_POST['imagephoto']."<BR>";
	//print "The Student photo name is: ".$_FILES['imagephoto']['name'].'<br>';
	//print "Path is: ".$_FILES['imagephoto']['tmp_name'].'<br>';
	//print "Image size is: ".$_FILES['imagephoto']['size'].'<br>';*/
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES['imagephoto']["name"]);
	$file_extension = explode('.',$_FILES['imagephoto']['name'])[1];
	//print "The file Extension is: ".$file_extension.'<br>';
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$newImageName = $target_dir.$_POST['student_number'].'.'.$file_extension;
	// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["imagephoto"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.<br>";
        $uploadOk = 0;
    }
	// Check if file already exists
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.<br>";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["imagephoto"]["size"] > 5000000) {
		//echo "Sorry, your file is too large.<br>";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["imagephoto"]["tmp_name"], $newImageName)) {
			//echo "The file ". basename( $_FILES["imagephoto"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	$newImagefile = $_POST['student_number'].'.'.$file_extension;//Reset image file name to be stored in db
}else{print 'No Photo Files Submitted!';}
?>