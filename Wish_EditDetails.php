<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title>E-Quest Book</title>
</head>
<Body>
<h1>E-Quest Book</h1>
<h1>WISH SELECTED RECORD DETAILS</h1><br>

<?php

$Wish_Code= $_POST["WishCode"];

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
$queryView = "select * from wish_book where Wish_ID='".$Wish_Code."'";

$resultGet = $conn->query($queryView);

if ($resultGet ->num_rows > 0) {
    while($baris = $resultGet->fetch_assoc()){

?>

<Form name="wishUpdateForm" action="wish_update.php" method="POST" enctype="multipart/form-data">


Wish ID : <?php echo $baris['Wish_ID']; ?>
<?php $Wish_Code = $baris['Wish_ID'];?> 
<br><br>

Photo or Video : 
<input type="file" name="UploadPhoto" id="UploadPhoto" value="<?php echo$baris['Wish_Photo']; ?>" ><br><br>

Wish : 
<br><textarea name="userWish" "rows="5" cols="80"><?php echo$baris['Wish_User']; ?></textarea><br><br>


<input type="hidden" name="WishCode" value="<?php echo $Wish_Code; ?>">
<input type="submit" value="Update Your Wish">
<br><br>
Click <a href="menu.php" >Here</a> to Menu
<?php
}
}
}




$conn->close();
?>
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