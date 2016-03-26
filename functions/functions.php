<?php

function chekAuth() {
	if ($_COOKIE['id']) {
		return $_COOKIE['id'];
	} else {
		return false;
	}
	
}