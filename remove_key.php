<?php
include('bd.php');
mysql_query("SET NAMES utf8");
$q = strval($_GET['q']);

$q = htmlspecialchars($q);
$q = stripslashes($q);
$q = trim($q);

$word_idQuery = mysql_query("SELECT id FROM `key_words` WHERE word = '$q'") or die ('Запрос не удался: ' . mysql_error());
$word_id = mysql_fetch_array($word_idQuery);

$addQuery=mysql_query("DELETE FROM `key_words` WHERE word = '$q' and id = '$word_id[id]'") or die ('Запрос не удался: ' . mysql_error());
mysql_close($db);
?>
