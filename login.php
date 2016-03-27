<?php

require_once("functions/functions.php");
if (checkAuth()) {
	header("refresh: 1, url = news.php");
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("functions/views.php");
	loadTop();

	include("pages/login.php");
	
	loadBottom();
} else {
	require_once("core/users.php");

	$status = auth($_POST['email'], $_POST['pass'], $_POST['check']);
	if ($status) {
		header("refresh: 1, url = news.php");
		echo "Hello";
	} else {
		header("refresh: 1, url = login.php");
		echo "You shell not pass";
	}

}


