<?php
session_start();

if(isset($_SESSION['UID'])) {
	
?>

<!DOCTYPE html>
<html>
<head>
<title>E-Guest Book</title>
<style>
body{
	background-image:url(login.jpg);
	background-repeat: no-repeat;
	background-size: 30000px 10000px;
	}
</style>
</head>
<body>
<center>
<h1>E-Guest Book</h1>
<h2>Upload Your Wish </h2>
<Form name="wishForm" action="wish_display.php" method="POST" enctype="multipart/form-data">

<!-user kena insert photo atau video(bukan muka dia) dan wish apa yg user nk tulis)->

Photo or Video : 
<input type="file" name="UploadPhoto" id="UploadPhoto" ><br><br>

Wish : 
<br><textarea name="userWish" rows="5" cols="80"></textarea><br><br>
	

<input type="reset" value="Cancel">
<input type="submit" value="Post Your Wish">
<br><br>
Click <a href="menu.php" >Here</a> to Menu
</Form>
</center>
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