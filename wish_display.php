<?php
session_start();

if(isset($_SESSION['UID'])) {
	
?>

<!DOCTYPE html>
<html>
<head>
<title>E-Guest Book</title>
</head>
<body>
<h1>E-Guest Book</h1>
<h2>Upload your wish</h2>

<?php 

$User_Wish = $_POST["userWish"];
date_default_timezone_set("Asia/Kuala_Lumpur");
$DateTime = date("d/m/y h:i:s");
$DATA = $DateTime;


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["UploadPhoto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["UploadPhoto"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
} else {
	
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["UploadPhoto"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["UploadPhoto"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


//declare DB connection variables
$host = "localhost"; //host name
$user = "root"; //database userid 
$pass = ""; //database pwd
$db = "e_quest_book";// please write your DB name 

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection

if ($conn->connect_error) { //to check if DB connection IS NOT OK
  die("Connection failed: " . $conn->connect_error); // display MySQL error
}

else
{  //connection OK 
   //put query to insert record
	
		
	$queryInsert = "insert into wish_book (Wish_User, Wish_Photo, User_ID, Wish_Date, User_NickName)
					VALUES ('".$User_Wish."', '".$target_file."', '".$_SESSION["UID"]."', '".$DATA."',
					'".$_SESSION["UID"]."')";
	
	//to execute $queryInsert query
	if ($conn->query($queryInsert) === TRUE) {
	  echo "<br>";
	  echo "<p style='color:blue;'>Your wish is success</p>";
	  echo "<a href=wish_view_user.php> View your Wish here </a>";
	  echo "<br><br>";
	  echo "<a href=wish_form.php> Post more Wish here </a>";
	} else {
	  echo "<p style='color:red;'>Error: Invalid query ". $conn->error. "</p>";
	}

}

$conn->close();	
}	
  
?>
<br><br>
Click <a href=menu.php> Menu here </a>";
</body>
</html>

<?php
}
else
{
	echo "No session exits or session has expired. Please log in again.";
	echo "<a href=login.html> Login </a>";
}
?>