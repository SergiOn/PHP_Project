<?php

require_once("functions/functions.php");
if (!checkAuth())  {
	header("refresh: 1, url = login.php");
}


require_once("core/news.php");
articleDelete($_GET["articleId"]);

require_once("functions/views.php");
loadTop();

$articles = getNews();

include("pages/news.php");

loadBottom();



echo checkAuth();
