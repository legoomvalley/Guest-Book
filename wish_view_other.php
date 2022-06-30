<?php
session_start();

if(isset($_SESSION['UID'])) {
	
?>

<!DOCTYPE html>
<html>
<head>
<title>E-Guest Book</title>
<style>
body {background-image:url(login.jpg);
background-repeat: no-repeat;
  background-size: 300000px 100000px;
}
</style>
</head>
<body>
<h1>E-Guest Book</h1>
<h2> View other wish </h2>
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
	
	$queryView = "select * 
	from wish_book x, user y
	where x.User_ID = y.User_ID";

	//to execute $queryView query & assign query result to $resultQ
	$resultQ = $conn->query($queryView); 

	
	if ($resultQ->num_rows > 0) {
		while($row = $resultQ->fetch_assoc()) {
?>
		<br><?php echo $row['User_NickName']; ?> :
		<br><img src="<?php echo $row['Wish_Photo'];?>" width="100" height="100"><br>
		<?php echo $row['Wish_User']; ?><br>
		<?php echo $row['Wish_Date']; ?><br>
<?php
		}
	} else {
			echo "NO data selected";
	}
}
$conn->close();
?> 
<br><br>
click <a href="menu.php">here </a> to Menu page
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