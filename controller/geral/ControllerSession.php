<?php

	$DIR = $_SERVER['DOCUMENT_ROOT'];
	require_once($DIR ."/controller/geral/controllerPage.php");
	session_start();

	function setSession($key, $data) {
		$_SESSION[$key] = $data;
	}

	function getSession($key) {
		return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
	}
	

?>