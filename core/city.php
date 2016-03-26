<?php

require_once("functions/db.php");

function add($name) {
	$check = getCity($name);
	if ($check) {
		return -1;
	} else {
		$result = insert("city", ["name" => $name]);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}
}

function getCity($name = false) {
	if ($name) {
		$id = select("city", ['id'], ["name"=>$name]);
		return $id;
	} else {
		$cities = select("city");
		return $cities; 
	}
}