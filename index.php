<?PHP
require "config.php";
require "manager.class.php";
require "head.htm";

if(!empty($_GET["search"])){
	header("Location: search.php?search={$_GET["search"]}");
}else{
	$pm = new pasman();
	$projects = $pm->getProjects();

	foreach($projects as $key=>$value){
		print "<a class='nameplate' href='search.php?search={$value["name"]}'>";
		print "{$value["name"]}";
		print "</a>";
	}
	//header("Location: search.php");
}
?>

<a class='nameplate' href='add.php'>Добавить новый проект</a>