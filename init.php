<?php

session_start();

$allowed_lang = array('english','croatian');

if (isset($_GET['lang']) === true && in_array($_GET['lang'],$allowed_lang) === true) {
	$_SESSION['lang'] = $_GET['lang'];

}

include 'lang/' . $_SESSION['lang'] . '.php';

?>