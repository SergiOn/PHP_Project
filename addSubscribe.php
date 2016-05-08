<?php

require_once("functions/functions.php");
if (!checkAuth()) {
	header("refresh: 1, url = login.php");
}

require_once("core/users.php");
$result = addSubscribe($_GET["id"]);

if ($result) {
	header("refresh: 3, url = subscribes.php");
	echo "Subscribed Enabled!!!";
} else {
	echo "Subscribed disabled";
}



