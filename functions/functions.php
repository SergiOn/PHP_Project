<?php
session_start();

function checkAuth() {
	if ($_COOKIE['id']) {
		return $_COOKIE['id'];

	} elseif ($_SESSION["id"]) {
		return $_SESSION["id"];

	} else {
		return false;
	}
}


function exitUser() {
	if ($_POST["quit"]) {
		if ($_COOKIE['id']) {
			setcookie("id", "", time());
		}
		if ($_SESSION['id']) {
			$_SESSION['id'] = "";
		}
		return true;
	} else {
		return false;
	}
}
exitUser();

