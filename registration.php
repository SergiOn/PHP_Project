<?php


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
	$id = registrationUser($_POST['email'], $_POST['pass'], $_FILES['avatar'], $_POST['name'], $_POST['l_name'], $_POST['phone'], $_POST['birthdate'], $_POST['city']);

	if ($id) {
		$status = auth($_POST['email'], $_POST['pass']);

		if ($status) {
			header("Refresh:3;url=news.php");
		}

	} else {
		header("Refresh:3;url=registration.php");
	}


} 









