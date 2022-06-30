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
<?php
session_start();
if (isset($_SESSION["UID"]))
{
session_unset();
session_destroy();
echo "<br><p style='color:red;'>You have successfully logged
out.</p>";
echo "<br>Click <a href='login.php'> here </a> to LOGIN again.";
}
else {
echo " No session exists or session is expired. Please log in
again";
echo "<br>Click <a href='login.php'> here </a> to LOGIN again.";
}
?>
</html>