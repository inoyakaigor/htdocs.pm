<?php 

require "config.php";
require "manager.class.php";
require "head.htm";

$pm = new pasman();

$name = $_GET["name"];
$type = $_GET["type"];
$URL  = $_GET["URL"];
$login = $_GET["login"];
$password = $_GET["password"];
$description = $_GET["description"];

if(empty($name)){
	print "<h1>Имя проекта не задано!</h1>";
	print "<input type='button' onclick='history.go(-1)' value='Вернуться назад'>";
}else{
	$pm = new pasman();
	$pm->add($name, $type, $URL, $login, $password, $description);
	header("Location: search.php?search=$name");
}