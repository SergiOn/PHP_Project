<?php


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("functions/views.php");
	loadTop();

	include("pages/login.php");
	
	loadBottom();
} else {
	require_once("core/users.php");

	$status = auth($_POST['email'], $_POST['pass']);
	if ($status) {
		echo "Hello";
	} else {
		echo "You shell not pass";
	}

} 









