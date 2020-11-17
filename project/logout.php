<?php 

session_start();
$login= $_COOKIE['login'];
unset($_COOKIE['login']);
setcookie('login', $login, time()-1, '/'); 

$_SESSION = null;
session_destroy();
header("Location:index.php");
?>