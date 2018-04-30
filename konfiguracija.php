<?php

session_start();

$allowed_lang = array('en','hr');

if (isset($_GET['lang']) === true && in_array($_GET['lang'],$allowed_lang) === true) {
	$_SESSION['lang'] = $_GET['lang'];

}/*else{
    $_SESSION['lang'] = 'hr';
}*/

include 'lang/' . $_SESSION['lang'] . '.php';

$putanja = "/Jela/";
$naslov = "Jela svijeta";
//$brojRezultataPoStranici=4;

if($_SERVER["HTTP_HOST"]==="andibasic.byethost8.com"){
	$host="ftp.byethost8.com";
	$dbname="b8_21975848_zavrsni";
	$dbuser="b8_21975848";
	$dbpass="andibasic";
}else{
	$host="localhost";
	$dbname="jela";
	$dbuser="root";
	$dbpass="";
	}

try{
	$veza = new PDO("mysql:host=" . $host . ";dbname=" . $dbname,$dbuser,$dbpass);
	$veza->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$veza->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES 'utf8';");
	$veza->exec("SET NAMES 'utf8';");
}catch(PDOException $e){
	switch ($e->getCode()) {
		case 1049:
			header("location: " . $putanja . "greske/kriviNazivBaze.html");
			exit;
			break;
		
		default:
			header("location: " . $putanja . "greske/greska.php?code=" . $e->getCode());;
			exit;
			break;
	}
}

