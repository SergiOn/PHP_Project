<?php

require_once("functions/db.php");

function addNews($title, $cover, $articletext) {

	if ($cover) {
		$nameCover = $cover['name'];
		// $nameIdCover = preg_replace("/([a-z0-9]+)\.([a-z0-9]+)/i", "$id.$2", $nameCover);
		$tmp_name = $cover['tmp_name'];
		copy($tmp_name, "images/articles/".$nameCover);
	} else {
		$nameCover = "";
	}

	$result = insert("articles", ["title" => $title, "image" => $nameCover, "text" => $articletext]);

	return $result;
}

function getNews($name = false) {
		$articles = select("articles");
		return $articles; 
}