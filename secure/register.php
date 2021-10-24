<?

$db = include("../db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hashword = password_hash($password, PASSWORD_DEFAULT);

	$err = false;
	$usernameErr = "";
	$passwordErr = "";
	$emailErr = "";

	if (strlen($username) > 32 || strlen($username) <= 3) {
		$err = true;
		$usernameErr = "Username must less than 32 chars, more than 3 chars";
	}
	
	if (strlen($password) <= 8) {
		$err = true;
		$passwordErr = "Password must more than 8 chars";
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$err = true;
		$emailErr = "Please enter the valid email";
	}

	if (!$err) {
		$evsql = "SELECT * FROM `accounts` WHERE email='{$email}'";
		$elist = $db->query($evsql);
		if ($elist->num_rows) {
			$err = true;
			$emailErr = "Email exists";
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
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="../src/css/font-awesome.css" />
</head>
<body>
    <form class="form" action="" method="post">
		<h1 class="login-title" style="font-family: 'DiscordHeavy';">Secure Registration</h1>
		<small><?= $usernameErr ?></small>
		<input type="text" class="login-input" name="username" style="font-family: 'Ubuntu'; color: #000;" placeholder="Username" required />
		<small><?= $emailErr ?></small>
		<input type="text" class="login-input" name="email" style="font-family: 'Ubuntu'; color: #000;" placeholder="Email Adress">
		<small><?= $passwordErr ?></small>
        <input type="password" class="login-input" name="password" style="font-family: 'Ubuntu'; color: #000;" placeholder="Password">
        <center><input type="submit" name="submit" style="font-family: 'DiscordThin';" value="Register" class="button"></center>
        <p class="link" style="font-family: 'Ubuntu';">Already have an account? <a href="login.php">Login Now</a>!</p>
    </form>
</body>
</html>
