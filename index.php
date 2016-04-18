<?php
include_once 'includes/connection.php';
$stmt = $mysqli->prepare("SELECT * FROM check_user
						WHERE user = 1"); // if 1 is there means there is already a game started.
$stmt->execute();
$stmt->store_result();

session_start();

if($stmt->num_rows >= 1) {
	$_SESSION['status'] = "Join";
} else {
	$_SESSION['status'] = "Start";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="includes/process.php" method="get">
		Enter your name to <?php echo $_SESSION['status']; ?> game.<br>
		<input type="text" name="username" />
		<input type="button" value="<?php echo $_SESSION['status']; ?>" />
	</form>
</body>
</html>