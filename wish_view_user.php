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
<h2> View your wish </h2>
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
	
	$queryView = "select * from wish_book where User_ID = '".$_SESSION["UID"]."' ";
	
	//to execute $queryView query & assign query result to $resultQ
	$resultQ = $conn->query($queryView); 

	
	if ($resultQ->num_rows > 0) {
		while($row = $resultQ->fetch_assoc()) {
?>
		<br><img src="<?php echo $row['Wish_Photo'];?>" width="100" height="100"><br>
		<?php echo $row['Wish_User']; ?><br>
<?php
		}
	} else {
			echo "NO data selected";
	}
}
$conn->close();
?> 
<br><br>
click <a href="wish_form.php">here </a> to Insert New Record
<br><br>
click <a href="wish_edit_view_user.php">here </a> to Update a Record
<br><br>
click <a href="wish_delete_view_user.php">here </a> to Delete a Record
<br><br>
click <a href="menu.php">here </a> to Menu page
</body>
</html>

<?php
}
else
{
	echo "No session exits or session has expired. Please log in again.";
	echo "<a href=login.php> Login </a>";
}
?>