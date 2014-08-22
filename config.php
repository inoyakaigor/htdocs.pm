<?php
// database ===
$db     = "manager";
$login  = "root";
$passwd = "";
// ============

try {
  $pasmandb = new PDO('mysql:host=localhost;dbname='.$db, $login, $passwd);
  $pasmandb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}