<?php
include('bd.php');
mysql_query("SET NAMES utf8");
$q = strval($_GET['q']);

$q = htmlspecialchars($q);
$q = stripslashes($q);
$q = trim($q);
/*$result = mysql_query("SELECT word FROM key_words");
$resultArray = mysql_fetch_array($result);*/
$addQuery=mysql_query("INSERT INTO key_words  (`word`) VALUES ('$q')")or die('Запрос не удался: ' . mysql_error());

mysql_close($db);
?>
