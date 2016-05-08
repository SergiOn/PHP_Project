<?php

require_once("functions/functions.php");
if (!checkAuth()) {
	header("refresh: 1, url = login.php");
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("core/news.php");

	// хочу модифікувати статтю
	// if ($_GET["articleId"]) {
	// 	$article = getNews($_GET["articleId"]);
	// 	// echo "<pre>";
	// 	// print_r($article);
	// 	// echo "</pre>";
	// }


	require_once("functions/views.php");
	loadTop();

	include("pages/addNews.php");

	loadBottom();
} else {
	require_once("core/news.php");

	$result = addNews($_POST["title"], $_FILES['cover'], $_POST["articletext"]);

	switch ($result) {
		case true:
			header("refresh: 2, url = news.php");
			echo "News added";
			break;
		case false:
			header("refresh: 5, url = addNews.php");
			echo "Error. News were not added";
			break;
	}

}

echo checkAuth();

