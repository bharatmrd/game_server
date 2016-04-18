<?php
include_once 'connection.php';

session_start();
if($_SESSION['status'] == 'Start') {
	$stmt = $mysqli->prepare("INSERT INTO check_user VALUES (1)");
	$stmt->execute();
	header("Location: ../protected/startgame.php");
} else {
	header("Location: ../protected/joingame.php");
}

?>