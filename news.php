<?php

require_once("functions/functions.php");
if (checkAuth()) {
	$idUser = checkAuth();
} else {
	header("refresh: 1, url = login.php");
}

require_once("core/news.php");


if ($_GET["articleId"]) {

	$imageLink = select("articles", ["image"], ["id" => $_GET["articleId"]])[0];

	$result = delete("articles", ["id" => $_GET["articleId"]]);
	if ($result) {
		unlink($imageLink["image"]);
		header("refresh: 1, url = news.php");
	} else {
		echo "Article not deleted";
	}
}


require_once("functions/views.php");
loadTop();

$articles = getNews();

include("pages/news.php");

loadBottom();



echo checkAuth();
