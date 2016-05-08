<?php

require_once("functions/functions.php");
if (!checkAuth()) {
	header("refresh: 1, url = login.php");
}


require_once("core/news.php");
disableSubscribe($_GET["articleId"]);

require_once("functions/views.php");
loadTop();

$articles = getSubscribeNews();
include("pages/news.php");


loadBottom();


echo checkAuth();