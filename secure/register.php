<?

$db = include("../db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hashword = password_hash($password, PASSWORD_DEFAULT);

	$err = false;
	$errMsg = "";

	if (strlen($username) > 32 || strlen($username) <= 3) {
		$err = true;
		$errMsg = "Username must less than 32 chars, more than 3 chars";
	}
	
	if (strlen($password) <= 8) {
		$err = true;
		$errMsg = "Password must more than 8 chars";
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$err = true;
		$errMsg = "Please enter the valid email";
	}

	if (!$err) {
		$evsql = "SELECT * FROM `accounts` WHERE email='{$email}'";
		$elist = $db->query($evsql);
		if ($elist->num_rows) {
			$err = true;
			$errMsg = "Email exists";
		}
	}

	if (!$err) {
		$token = "";

		$tokenChars = "abcdefghijklmnopqrstuvwxyz"
			. "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
			. "1234567890"
			. "._-";
		$tokenLength = 25;
		for ($i = 0; $i < $tokenLength; $i++) {
			$token .= $tokenChars[rand(0, strlen($tokenChars) -1)];
		}

		$sql = "INSERT INTO `accounts`(token, username, email, password) VALUES ('{$token}', '{$username}', '{$email}', '{$hashword}')";
		$db->query($sql);
		if ($db->errno) {
			echo "errno<br>";
			echo $db->error;
		} else {
			// success
			session_start();
			$_SESSION['token'] = $token;
			$_SESSION['login'] = true;
			$_SESSION['username'] = $username;
			header("Location: " . $_GET['redirect'] ? $_GET['redirect'] : "../index.php");
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
	<link rel="shortcut icon" href="../favicon.jpg">
	<link rel="apple-touch-icon" href="../favicon.jpg">
	<link rel="stylesheet" href="css/both.css">
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <form class="form" method="post" name="login">
		<div class="wrap">
			<p class="title">Register</p>
			<i class="fa fa-user fa-lg"></i>
			<input type="text" class="login-input up" name="username" placeholder="Username" autofocus="false"><br> <!-- TODO: set autofocus true -->
			<input type="text" class="login-input mid" name="email" placeholder="Email">
			<input type="password" class="login-input down" name="password" placeholder="Password"/><br>
			<i class="fa fa-lock fa-lg"></i><br>
			<i class="fa fa-at fa-lg"></i>
			<button class="login" type="submit">Register</button><br>
			<small class="err"><?= $errMsg ?></small>
		</div>
		<div class="register">
			<a href="login.php">Login</a>
			<span class="vr"></span> 
			<a href="../tos.php">ToS</a>
		</div>
	</form>
	<script src="js/touch.js"></script>
</body>
</html>

