<?php
session_start();
session_destroy();

$login=$_COOKIE['login'];
$password=$_COOKIE['password'];
if(isset($_COOKIE['login']) and isset($_COOKIE['password'])){
setcookie('login',$login,time()-1);
setcookie('password',$password,time()-1);
}

exit("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>");
?>