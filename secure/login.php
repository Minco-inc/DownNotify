<?
$db = include("../db.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$email = $_POST['email'];
	$user_password = $_POST['password'];

	$err = false;
	$emailErr = "";
	$passwordErr = "";
	$errMsg = "";
	$emailOrPwd = "Email or password is incorrect.";

	if (!$email) {
		$err = true;
		$emailErr = "Please enter your email.";
	}

	if (!$user_password) {
		$err = true;
		$passwordErr = "Please enter your password.";
	}

	if ($emailErr && $passwordErr) { // no email and password
		$errMsg = "Please enter your email and password.";
	} else if ($emailErr && !$passwordErr) { // no email
		$errMsg = $emailErr;
	} else if (!$emailErr && $passwordErr) { // no password
		$errMsg = $passwordErr;
	}

	if (!$err) {
		$sql = "SELECT * FROM `accounts` WHERE email='{$email}'";
		$accountList = $db->query($sql);
		if ($accountList->num_rows) {
			$account = mysqli_fetch_array($accountList);
			$db_password = $account['password'];
			if (password_verify($user_password, $db_password)) {
				$_SESSION['token'] = $account['token'];
				$_SESSION['username'] = $account['username'];
				$_SESSION['login'] = true;
			} else {
				$err = true;
				$errMsg = $emailOrPwd;
			}
		} else {
			$err = true;
			$errMsg = $emailOrPwd;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; user-scalable:no;">
	<title>Login</title>
	<link rel="shortcut icon" href="favicon.jpg">
	<link rel="apple-touch-icon" href="favicon.jpg">
	<link rel="stylesheet" href="css/both.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <form class="form" method="post" name="login">
		<div class="wrap">
			<p class="title">Login</p>
			<i class="fa fa-user fa-lg"></i>
			<input type="text" class="login-input up" name="email" placeholder="Email" autofocus="false"><br> <!-- TODO: set autofocus true -->
			<input type="password" class="login-input down" name="password" placeholder="Password"/><br>
			<i class="fa fa-lock fa-lg"></i>
			<small class="err"><?= $errMsg ?></small><br>
			<button class="login" type="submit">Login</button>
		</div>
		<div class="register">
			<a href="register.php">Register</a>
			<span class="vr"></span> 
			<a href="forget.php">Forget password</a>
		</div>
	</form>
	<script src="js/login.js"></script>
</body>
</html>

