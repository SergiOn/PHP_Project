<?php

require_once("functions/functions.php");
if (!checkAuth()) {
	header("refresh: 1, url = login.php");
}


require_once("functions/views.php");
loadTop();

require_once("core/users.php");
$users = getUsers();

$idUser = checkAuth();
include("pages/allUsers.php");

loadBottom();

require_once("functions/functions.php");


echo checkAuth();

// echo $_SERVER["REQUEST_URI"];
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
