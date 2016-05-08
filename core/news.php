<?php

require_once("functions/db.php");

require_once("functions/functions.php");


function addNews($title, $cover, $articletext) {
	$idUser = checkAuth();

	$idArticle = insert("articles", ["title" => $title, "text" => $articletext, "idUser" => $idUser]);

	if ($cover["name"]) {
		$nameCover = $cover['name'];
		$nameIdCover = preg_replace("/[a-z0-9-_]+\.([a-z0-9]+)/i", "$idArticle.$1", $nameCover);
		$tmp_name = $cover['tmp_name'];
		copy($tmp_name, "images/articles/".$nameIdCover);
		$imageLink = "images/articles/".$nameIdCover;

		update("articles", ["image" => $imageLink], ["id" => $idArticle]);
	}

	return $idArticle;
}


function getNews($articleId = false) {
	if (!$articleId) {
		$articles = sendQuery("SELECT a.*, u.name, u.l_name, u.avatar FROM `articles` AS a LEFT JOIN `user_data` AS u ON a.`idUser` = u.`id` ORDER BY `id`");
		return $articles;
	} else {
		$article = select("articles", false, ["id" => $articleId])[0];
		return $article;
	}
}


function articleDelete($articleId) {
	if ($articleId) {
		$imageLink = select("articles", ["image"], ["id" => $articleId])[0]["image"];

		$result = delete("articles", ["id" => $articleId]);
		if ($result) {
			if ($imageLink) {
				unlink($imageLink);
			}
			header("refresh: 1, url = news.php");
		} else {
			echo "Article not deleted";
		}
	}
}


function getSubscribeNews() {
	$idUser = checkAuth();

	$result = sendQuery("SELECT * FROM `articles` WHERE `idUser` IN (
		SELECT `idAutor` FROM `subscribes` WHERE `idUser` = $idUser
	)");

	return $result;
}


function disableSubscribe($articleId) {
	if ($articleId) {
		$result = delete("subscribes", ["idAutor" => $articleId]);
		if ($result) {
			header("refresh: 1, url = subscribes.php");
			echo "Subscribe Disabled";
		} else {
			echo "Subscribe not disabled";
		}
	}
}