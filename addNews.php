<?php

require_once("functions/functions.php");
if (checkAuth()) {
	$idUser = checkAuth();
} else {
	header("refresh: 1, url = login.php");
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("functions/views.php");
	loadTop();

	include("pages/addNews.php");

	loadBottom();
} else {
	require_once("core/news.php");

	$result = addNews($_POST["title"], $_FILES['cover'], $_POST["articletext"]);

	header("refresh: 2, url = addNews.php");
	switch ($result) {
		case true:
			echo "News added";
			break;
		case false:
			echo "Error. News were not added";
			break;
	}

}

echo checkAuth();

