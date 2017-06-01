<?php
include('bd.php');
mysql_query("SET NAMES utf8");
$f = strval($_GET['f']);

$updateQuery = mysql_query("UPDATE `dishes` SET `acs` = '$f' WHERE `id_dish` = 1;");

mysql_close($db);
?>
