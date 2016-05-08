<?php
session_start();

require_once("functions/db.php");

require_once("functions/functions.php");


function auth($login, $pass, $check = false) {
	$user = select("user_login", false,
		[
			"email" => $login, 
			"pass" => md5($pass)
		]
	)[0];

	if ($user && $check) {
		setcookie("id", $user['id'], time() + 60*60*24);
		return true;
	} elseif ($user) {
		$_SESSION['id'] = $user['id'];
		if ($_COOKIE['id'] && $_SESSION['id'] !== $_COOKIE['id']) {
			setcookie("id", "", time());
		}
		return true;
	} else {
		return false;
	}
}


function checkExist($email) {
	$user = select("user_login", false, ["email" => $email]);

	if ($user) {
		return true;
	} else {
		return false;
	}
}


// реєструємо
function regUser($email, $pass, $avatar, $name, $l_name, $phone, $birthdate, $city) {

	$id = insert("user_login", ["email" => $email, "pass" => md5($pass)]);

	if ($avatar) {
		$nameAvatar = $avatar['name'];
		$nameIdAvatar = preg_replace("/[a-z0-9]+\.([a-z0-9]+)/i", "$id.$1", $nameAvatar);
		$tmp_name = $avatar['tmp_name'];
		copy($tmp_name, "images/idUsers/".$nameIdAvatar);
		$avatarLink = "images/idUsers/".$nameIdAvatar;
	} else {
		$avatarLink = "";
	}

	insert("user_data", ["id" => $id, "name" => $name, "l_name" => $l_name, "phone" => $phone, "birthdate" => $birthdate, "idCity" => $city, "regDate" => date("Y-m-j H:i:s", strtotime("-1 hours")), "avatar" => "$avatarLink"]);

	return $id;
}


function getUsers() {
	return select("user_data");
}


function addSubscribe($idSubs) {
	$idUser = checkAuth();

	$result = select("subscribes", false, ["idUser" => $idUser, "idAutor" => $idSubs]);

	if (!$result) {
		insert("subscribes", ["idUser" => $idUser, "idAutor" => $idSubs]);
		return true;
	} else {
		return false;
	}
}


function checkSubscribe($idSubs) {
	$idUser = checkAuth();
	$result = select("subscribes", false, ["idUser" => $idUser, "idAutor" => $idSubs]);

	return $result;
}