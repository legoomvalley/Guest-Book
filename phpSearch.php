<?php
session_start();

if(isset($_SESSION['UID'])) {
	
?>

<?php

$search = $_POST['search'];

//declare DB connection variables
$host = "localhost"; //host name
$user = "root"; //database userid 
$pass = ""; //database pwd
$db = "e_quest_book";// please write your DB name 

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$queryView = "select * from wish_book where User_NickName like '%$search%'";

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
$conn->close();
?> 
<br><br>
click <a href="menu.php">here </a> to Menu page
<?php
}
else
{
	echo "No session exits or session has expired. Please log in again.";
	echo "<a href=login.html> Login </a>";
}
?>
<style>
body {
  background-image:url('menu_page.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
