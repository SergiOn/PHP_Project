<?php


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("functions/views.php");
	loadTop();

	include("pages/addNews.php");

	loadBottom();
} else {
	require_once("core/news.php");

	$result = addNews($_POST["title"], $_FILES['cover'], $_POST["articletext"]);
	switch ($result) {
		case true:
			// echo "News added";
			break;
		case false:
			// echo "Error. News were not added";
			break;
	}
}

