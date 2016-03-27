<?php

$db = mysqli_connect("localhost", "root", "", "OnischenkoBD");

if (mysqli_connect_error()) {
	die("Error in connect to db");
}


function sendQuery($sql) {
	global $db;
	$result = mysqli_query($db, $sql);

	if (is_bool($result) || $result === 1) {
		return $result;
	} else {
		$array = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}
}
// $arr = sendQuery("SELECT * FROM `user_data` WHERE `id` > 0");
// echo "<pre>";
// print_r($arr);
// echo "</pre>";


function select($table, $column = [], $where = []) {
	global $db;
	if ($column) {
		$what = implode(",", $column); // можна без Йошних лапок
	} else {
		$what = " * ";
	}

	if ($where) {
		$whereSQL = "WHERE";
		$and = "";
		foreach ($where as $key => $val) {
			$whereSQL .= " $and `$key` = '$val'";
			$and = " AND ";
		}
	} else {
		$whereSQL = "";
	}

	$sql = "SELECT $what FROM `$table` $whereSQL";
	
	$query = mysqli_query($db, $sql);
	while ($row = mysqli_fetch_assoc($query)) {
		$array[] = $row;
	}
	return $array;
}
// $arr = select("user_login", false, ["email" => "onishhenko@gmail.com", "pass" => "12345"]);
// $arr = select("articles");
// echo "<pre>";
// print_r($arr === null);
// echo "</pre>";



function insert($table, $what) {
	global $db;

	$comma = "";
	$row = "";
	$values = "";
	foreach ($what as $key => $val) {
		$row .= "$comma `$key`";
		$values .= "$comma '$val'";
		$comma = ",";
	}
	
	$sql = "INSERT INTO `$table` ($row) VALUES ($values)";

	$query = mysqli_query($db, $sql);

	if ($query) {
		$id = mysqli_insert_id($db);  // return last primary key
		return $id;					  // in this function (after insert)
	} else {
		return $query;
	}
}
// insert("user_login", ["email"=>"2insert@gmail", "pass"=>"2passinsert"]);


function update($table, $set, $where) {
	global $db;

	$setSQL = "";
	$comma = "";
	foreach ($set as $key => $value) {
		$setSQL .= "$comma `$key` = '$value'";
		$comma = ",";
	}

	$whereSQL = "";
	$and = "";
	foreach ($where as $key => $value) {
		$whereSQL .= "$and `$key` = '$value' ";
		$and = "AND";
	}

	$sql = "UPDATE `$table` SET $setSQL WHERE $whereSQL";

	$query = mysqli_query($db, $sql);

	return $query;
}
// update("user_login", ["email"=>"new@gmail", "pass"=>"updatenew"], ["id"=>"6", "email"=>"2new@gmail"]);


function delete($table, $where) {
	global $db;

	if ($where) {
		$whereSQL = "WHERE";
		$and = "";
		foreach ($where as $key => $value) {
			$whereSQL .= " $and `$key` = '$value'";
			$and = "AND";
		}

	} else {
		$whereSQL = "";
	}

	$sql = "DELETE FROM `$table` $whereSQL";
	
	$query = mysqli_query($db, $sql);

	return $query;
}
// echo delete("user_login", ["id"=>"5"]);







