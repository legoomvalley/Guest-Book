<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title>E-Guest Book</title>
</head>
<Body>
<h1>E-Guest Book</h1>
<h1>WISH Updated</h1><br>


<?php

$WishID = $_POST["WishCode"];
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


$host = "localhost";
$user = "root";
$pass = "";
$db = "e_quest_book";

$conn = new mysqli ($host,$user,$pass,$db);

if ($conn->connect_error) 
{
    die("Connection failed : " . $conn->connect_error);
}

else
{
    $queryUpdate = "UPDATE wish_book 
	SET Wish_ID='".$WishID."',
	Wish_Photo='".$target_file."',
	Wish_User='".$User_Wish."' ,
	Wish_Date='".$DATA."' 
    WHERE Wish_ID = '".$WishID."' ";

    $resultUpdate = mysqli_query($conn,$queryUpdate);

    if(!$resultUpdate){
    die ("Query problems : ".mysqli_error($conn));
}
else{
    echo"Record has been updated into database.";
    echo "<br><br>";
    echo"Click <a href='wish_view_user.php'>here</a> to view wish list";
}
}
?>
<?php
}
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>
</body>
</html>