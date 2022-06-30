<?php
session_start();

if(isset($_SESSION['UID'])) {
	
?>

<html>
<head>
<title>E-Guest Book</title>
<style>
body {background-image:url(menu_page.jpg);}
h2 {background-color:chocolate;}
</style>
</head>
<body>
<center>
<h2>Menu E-Guest Book</h2>
<h3>Welcome, Hi <i style="color:pink;"><?php echo $_SESSION['UID'] ?></i></h3>

<form action="phpSearch.php" method="post">
Search <input type="text" name="search"><br><br>
<input type ="submit" value="Cari">
</form>

<p>Choose your menu : </p>
<?php
	if ($_SESSION["UserType"] == "Admin"){
	?>
	<a href= "user_profile_all.php">See user profile</a><br><br>
	<a href= "wish_edit_view.php">Edit your wish details</a><br><br> 
	<a href= "wish_delete_view.php">Delete your wish record</a><br><br>	
	<a href= "wish_view.php">View all wish list</a><br><br>
	
	<?php
	}
	else{
?>
	<a href= "user_profile.php">See my profile</a><br><br>
	<a href= "wish_form.php">Post more wish</a><br><br>
	<a href= "wish_edit_view_user.php">Edit your wish details</a><br><br>
	<a href= "wish_delete_view_user.php">Delete your wish record</a><br><br>
	<a href= "wish_view_other.php">View other wish</a><br><br>	
	<a href= "wish_view_user.php">View your wish list</a><br><br>
	<?php
	}
?>
<a href= "logout.php">Logout</a><br>
</center>
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