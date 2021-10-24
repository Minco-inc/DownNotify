<?
session_start();
$db = include("db.php");

if ($_SESSION['login']) {
	$sql1 = "SELECT * FROM `heartbeats` WHERE token='{$_SESSION['token']}'";
	$res1 = $db->query($sql1);
	if ($db->errno) {
		echo $db->error;
	}
	$arr1 = [];
	while ($row1 = $res1->fetch_array()) {
		array_push($arr1, $row1);
	}
} else {
	$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	header("Location: secure/login.php?redirect=" . $url);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/home.css">
	</head>
	<body>
		<iframe src="header.php" scrolling="no" class="header"></iframe>
		<div class="title">My heartbeats</div>
		<table class="hb-table" align="center" border="0">
			<th>Name</th>
			<th>Code</th>
			<th>Created</th>
			<? foreach($arr1 as $ar1) { ?>
			<tr  class="tr" align="center">
				<td><?= $ar1['name'] ?></td>
				<td><?= $ar1['code'] ?></td>
				<td><?= $ar1['created'] ?></td>
			</tr>
			<? } ?>
		</table>
	</body>
</html>
