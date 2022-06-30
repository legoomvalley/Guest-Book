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
<Body>
<center>
<h1>E-Guest Book</h1>
<h2>Register Your Account </h2><br>
<form name="RegisterForm" action="register_toDB.php" method="post" enctype="multipart/form-data">

User ID** <input type="text" name="UserID" size="6" maxlength="6" required><br><br>
User Pass** <input type="password" name="UserPass" size="6" maxlength="6" required><br><br>

User FullName** <input type="text" name="UserFullName" size="30" maxlength="30" required><br><br>
User NickName** <input type="text" name="UserNickName" size="10" maxlength="10" required><br><br>
User Gender** 
<input type="radio" name="Gender" value="Male" required> Male
<input type="radio" name="Gender" value="Female" > Female<br><br>
User HP No** <input type="text" name="UserHp" size="12" maxlength="12" required><br><br>	
User Social Account ** <input type="text" name="UserSocial" size="20" maxlength="20" required><br><br>
User Picture** <br>
(Select image to upload)
<input type="file" name="fileToUpload" id="fileToUpload">
<br><br>
	
	
<p style="color:red"><i>field with ** is compulsory</i></p>
<input type="reset" value="Cancel">
<input type="submit" value="Register Me">
<br><br>
Click <a href="login.php" >Here</a> to login
<br><br>
<p>Click <a href="index.html" >Here</a> to Main Page</p>
</Form>
</center>
</Body>
</html>