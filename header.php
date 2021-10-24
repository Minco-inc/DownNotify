<?
session_start();

$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$hello = '<a href="secure/login.php?redirect=' . $url . '" class="loginBtn">Login</a>';

if ($_SESSION['login']) {
	$username = $_SESSION['username'];
	$hello = '<button class="userBtn">' . $username[0] . '</button>';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>DownNotify - Header</title>
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	</head>
	<body>
		<div class="body-wrap">
			<div class="wrap">
				<div class="menu">
					<i class="fa fa-bars fa-lg"></i>
				</div>
				<div class="user">
					<?= $hello ?>
				</div>
			</div>
			</div>
		<div class="black-bg"></div>
		<div class="left-menu">
			Hello	
		</div>
	</body>
	<script src="js/header.js"></script>
</html>
