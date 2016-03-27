<?php

require_once("functions/db.php");

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

function getNews() {
		$articles = select("articles");
		return $articles;
}


function articleAuthor($article) {
	if ($article["image"]) {
		$author[0] = '<img src="'.$article["image"].'" alt="img'.$article["id"].'">';
	}

	$authorSQL = select("user_data", ["name", "l_name"], ["id" => $article['idUser']])[0];
	$author[1] = $authorSQL["name"]." ".$authorSQL["l_name"];

	if ($article['idUser'] === checkAuth()) {
		$author[2] = '<br><a href="news.php?articleId='.$article["id"].'">Delete Article</a>';
	}

	return $author;
}




