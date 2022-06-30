<?php 
session_start();

//check if session exists
if(isset($_SESSION["UID"])) {
	
?>
<!DOCTYPE html>
<html>
<head>
<title> E-Guest Book </title>
<style>
body {background-image:url(login.jpg);
background-repeat: no-repeat;
  background-size: 300000px 100000px;
}
</style>
</head>

<body>
<center>
<h3> ALL USER PROFILE </h3>

<?php

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
{  
    //connection OK - get records from a database table
	
	$queryView = "select * from user where User_Type = 'user'";

	//to execute $queryView query & assign query result to $resultQ
	$resultQ = $conn->query($queryView); 

	
	if ($resultQ->num_rows > 0) {
		while($row = $resultQ->fetch_assoc()) {
	?>
		User ID: <?php echo $row['User_ID']; ?><br>
	    User Pass: <?php echo $row['User_Pass']; ?><br>
		User FullName:<?php echo $row['User_FullName']; ?><br>
		User NickName:<?php echo $row['User_NickName']; ?><br>
		User Gender:<?php echo $row['User_Gender'];?><br>
		User HpNo:<?php echo $row['User_HpNo']; ?><br>
		User SocialAcc:<?php echo $row['User_SocialAcc']; ?><br>
		User Image: <br><img src="<?php echo $row['User_Picture'];?>" width="100" height="100"><br><br>
<?php
		}
	} else {
			echo "<tr><td colspan='10'> NO data selected </td></tr>";
	}	
}
$conn->close();
?>  
<br><br>
click <a href="menu.php">here </a> to Menu page
</center>
</body>
</html>
<?php 
}
else
{
	echo "No session exists or session has expired. Please log in again.<br>";
	echo "<a href=login.html> Login </a>";
}
?>