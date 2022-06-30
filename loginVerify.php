<?php
//these codes is for login process
//check userid & pwd is matched
//get form input
$user_ID = $_POST['userID'];
$user_Pwd = $_POST['userPwd'];
//declare DB connection variables
$host = "localhost"; //host name
$user = "root"; //database userid
$pass = ""; //database pwd
$db = "e_quest_book";// please write your DB name
// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connectione
if ($conn->connect_error) {
 //to check if DB connection IS NOT OK
 die("Connection failed: " . $conn->connect_error);
}
else
{
//connection OK - get records for the selected User account
$queryCheck = "select * from user where User_ID = '".$user_ID."'";
$resultCheck = $conn->query($queryCheck);
if ($resultCheck->num_rows == 0) { //if no record match
echo "<p style='color:red;'>User ID does not exists</p>";
echo "<br>Click <a href='login.html'> here </a> to LOGIN again.";
}
else{
// record matched, get the data
while($row = $resultCheck->fetch_assoc()) {
if( $row["User_Pass"] == $user_Pwd ) {
//in order to asign, use or destroy session
//calling the session_start() is compulsory
session_start();
//asign userid value to session userid
$_SESSION["UID"] = $user_ID ;
$_SESSION["UserType"] = $row["User_Type"];
//redirect to page menu.php
header("Location:menu.php");
header("Location:menu.php");
}
else
{
echo "<p style='color:red;'>WRONG PASSWORD!!!</p>";
echo "<br>Click <a href='login.php'> here </a> to LOGIN again.";
}
}
}
$conn->close();
}
?>