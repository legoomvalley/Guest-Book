<!DOCTYPE html>
<html>
<head>
<title>E-Guest Book</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" style="text/css" href="style.css">
</head>
<body>
<div class="navbar">
  <a class="active" href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="user_register.php"><i class="fa fa-fw fa-user"></i> Sign Up</a>
  <a href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
</div>
<h1><B><font size="+10">Login E-Guest Book</font></B></h1>
<Form action="loginVerify.php" method="POST">

<p>User ID ** <input type="text" name="userID" size="6" maxlength="6" required></p>
<p>Password ** <input type="password" name="userPwd" size="6" maxlength="6" required></p><br>

<input type="reset" value="Cancel">
<input type="submit" value="Login">
</Form>
</body>
</html>