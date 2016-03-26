<?php


if ($_SERVER['REQUEST_METHOD'] == "GET") {
	require_once("functions/views.php");
	loadTop();

	include("pages/addCity.php");

	loadBottom();
} else {
	require_once("core/city.php");
	$result = add($_POST['city']);
	switch ($result) {
		case -1:
			echo "City alredy exist";
			break;
		case 0:
			echo "Error";
			break;
		case 1:
			echo "Complete";
			break;
	}
}








