<?php 

$id = $_POST["UserID"];
$user_pass = $_POST["UserPass"];
$full = $_POST["UserFullName"];
$nick = $_POST["UserNickName"];
$gender = $_POST["Gender"];
$hp = $_POST["UserHp"];
$soc = $_POST["UserSocial"];


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
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
	
	
		
	$queryInsert = "insert into user (User_ID, User_Pass, User_Type, User_FullName, User_NickName, User_Gender, User_HpNo, User_SocialAcc, User_Picture)
					VALUES ('".$id."', '".$user_pass."','user','".$full."', '".$nick."', '".$gender."','".$hp."', '".$soc."','".$target_file."' )";
	
	//to execute $queryInsert query
	if ($conn->query($queryInsert) === TRUE) {
	  echo "<p style='color:blue;'>Success Register</p>";
	  echo "<a href=login.php> Login here </a>";
	} else {
	  echo "<p style='color:red;'>Error: Invalid query ". $conn->error. "</p>";
	}

}

$conn->close();	
}	
  
?>