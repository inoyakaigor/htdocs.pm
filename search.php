<?PHP
require "config.php";
require "manager.class.php";
require "head.htm";

@$search = $_GET["search"];

if(empty($search)){
	print "<h1>Пустой поисковый запрос.</h1>";
	require "input.htm";	
}else{
	$pm = new pasman();
	$dataproj = $pm->getPassFromProj($search);
	require "input.htm";
	print "<table>";
	print "<tr><td>ID<td>name<td>type<td>URL<td>login<td>password<td>description";
	foreach ($dataproj as $key => $value) {
		print "<tr>";
		print "<td>".$value["id"];
		print "<td>".$value["name"];
		print "<td>".$value["type"];
		print "<td>".$value["URL"];
		print "<td>".$value["login"];
		print "<td>".$value["password"];
		print "<td>".$value["description"];
	}
	print "</table>";
}