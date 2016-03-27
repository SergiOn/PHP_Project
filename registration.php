<?php

require_once("functions/functions.php");
if (checkAuth()) {
	header("refresh: 1, url = news.php");
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("functions/views.php");
	loadTop();

	require_once("core/city.php");
	$cities = getCity();

	include("pages/registration.php");

	loadBottom();
} else {
	if ($_POST['pass'] != $_POST['confirmPass']) {
		die("Second pass must be equal first pass");
	}

	require_once("core/users.php");
	$check = checkExist($_POST['email']);
	if ($check) {
		die("User already exist");
	}


	// реєструємо
	$id = regUser($_POST['email'], $_POST['pass'], $_FILES['avatar'], $_POST['name'], $_POST['l_name'], $_POST['phone'], $_POST['birthdate'], $_POST['city']);

	if ($id) {
		$status = auth($_POST['email'], $_POST['pass'], $_POST['check']);
		if ($status) {
			header("Refresh:2; url=news.php");
			echo "Registration complete. Authentication good";
		}
	} else {
		header("Refresh:2; url=registration.php");
		echo "Registration complete. Authentication bad";
	}


} 


