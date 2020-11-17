<?php 

session_start();
if(isset($_POST['username'])&&isset($_POST['password'])){
	if($_POST['username']=="admin" && $_POST['password']=="#pass123"){
		$_SESSION["login"]= $_POST['username'];
		setcookie("login", $_POST['username'], time()+600, '/');
		header("Location: main.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<div class="login-box">
  <pre>Username : admin
Password : #pass123</pre>
  <h1>Login</h1>
  <form action="" method="post">
	  <div class="textbox">
		<i class="fas fa-user"></i>
		<input name="username" type="text" placeholder="Username">
	  </div>

	  <div class="textbox">
		<i class="fas fa-lock"></i>
		<input name="password" type="password" placeholder="Password">
	  </div>

	  <input type="submit" class="btn" value="Sign in">
  </form>
</div>
  </body>
</html>
