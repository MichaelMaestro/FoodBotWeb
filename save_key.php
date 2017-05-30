<?php
include('bd.php');
mysql_query("SET NAMES utf8");
$num_dish = strval($_GET['num_dish']);
$q = strval($_GET['q']);

$q = htmlspecialchars($q);
$q = stripslashes($q);
$q = trim($q);

$max = 0;
/*$result = mysql_query("SELECT word FROM key_words");
$resultArray = mysql_fetch_array($result);*/

$addQuery=mysql_query("INSERT INTO key_words  (`word`) VALUES ('$q')");

$lastWordQuerry = mysql_query("SELECT id FROM key_words");
$lastWord = mysql_fetch_array($lastWordQuerry);


do{
if ($lastWord[0] > $max){
	$max = $lastWord[0];
}
}
while($lastWord = mysql_fetch_array($lastWordQuerry));

$addToDishes =mysql_query("INSERT INTO dishes (id_keyword, id_dish) VALUES('$max','$num_dish') "); 
mysql_close($db);
?>
</body>
</html>