<?php

require_once("functions/db.php");

function auth($login, $pass) {
	$user = select("user_login", false,
		[
			"email" => $login, 
			"pass" => md5($pass)
		]
	)[0];

	if ($user) {
		setcookie("id", $user['id'], time() + 60*60*24);
		return true;
	} else {
		return false;
	}
}
// echo auth("onishhenko@gmail.com", "12345");


function checkExist($email) {
	$user = select("user_login", false, ["email" => $email]);

	if ($user) {
		return true;
	} else {
		return false;
	}
}


// реєструємо
function registrationUser($email, $pass, $avatar, $name, $l_name, $phone, $birthdate, $city) {

	$id = insert("user_login", ["email" => $email, "pass" => md5($pass)]);

	if ($avatar) {
		$nameAvatar = $avatar['name'];
		$nameIdAvatar = preg_replace("/([a-z0-9]+)\.([a-z0-9]+)/i", "$id.$2", $nameAvatar);
		$tmp_name = $avatar['tmp_name'];
		copy($tmp_name, "images/".$nameIdAvatar);
	} else {
		$nameIdAvatar = "";
	}

	insert("user_data", ["id" => $id, "name" => $name, "l_name" => $l_name, "phone" => $phone, "birthdate" => $birthdate, "idCity" => $city, "regDate" => date("Y-m-j H:i:s", strtotime("-1 hours")), "avatar" => "$nameIdAvatar"]);

	// auth($email, $pass);

	return $id;
}





