<?php
session_start();
session_destroy();
error_reporting(0);
if(isset($_COOKIE['Kulik'])){
setcookie('Kulik',null,time()+1);
}

exit("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>");
?>