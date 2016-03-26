<?php
require_once("functions/views.php");
	loadTop();

	require_once("core/news.php");
	$articles = getNews();
	
	include("pages/news.php");

	loadBottom();
