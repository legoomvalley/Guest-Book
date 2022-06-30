<!DOCTYPE HTML>
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
<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<?php
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
$queryView = "select * from wish_book ";

$resultQ = $conn->query($queryView);

?>

<body>

<h1>E-Quest Book</h1>
<h2>CHOOSE Wish TO BE UPDATED</h2>

<form action="Wish_EditDetails.php" name="UpdateForm" method="POST">


<table border="2">
    <tr>
        <th>Choose</th>
        <th>Wish ID</th>
        <th>Wish Photo</th>
        <th>Wish User</th>
        <th>Wish Date</th>
    </tr>

<?php
    if ($resultQ->num_rows> 0) 
    {
        while($row = $resultQ->fetch_assoc())
        {
?>
<tr>
    <td><input type="radio" name="WishCode" value="<?php echo $row['Wish_ID']; ?>" required></td>
    <td><?php echo $row['Wish_ID']; ?></td>
    <td><img src="<?php echo $row['Wish_Photo'];?>" width="100" height="100"></td>
    <td><?php echo $row['Wish_User']; ?></td>
    <td><?php echo $row['Wish_Date']; ?></td>
</tr>

<?php
        }
    } else{
        echo "<tr><td colspan='7'> NO data selected </td></tr>";
    }
}
?>
</table>
<?php
$conn->close();
?>
<br></br>
<input type="Submit" value="Update chosen Wish">
</form>
<br><br>
click <a href="menu.php">here </a> to Menu page
<?php
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