<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title> E-Guest Book </title>
</head>

<body>
<h1> E-Guest Book </h1>
<h2> View your wish </h2>

<?php

$WishCode = $_POST["WishCode"];
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
	$queryDelete = "DELETE FROM wish_book WHERE Wish_ID = '".$WishCode."' ";
	
	
	if ($conn->query($queryDelete) === TRUE){
		
		echo "<p style='color:blue;'>Record deleted successfully</p>";
		echo "<br><br>";
		if ($_SESSION["UserType"] == "Admin"){
			echo "Click <a href='wish_view.php'> here </a> to view wish list ";
		} else {
			echo "Click <a href='wish_view_user.php'> here </a> to wish list ";
		}
		
	}
	else{
		echo "<p style='color:red;'>Error: Deleting query " . $conn->error. "</p>";
	}
}

$conn->close();

?>

</body>
</html>
<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>