<?php
include('bd.php');
#echo mysqli_character_set_name($db);
#mysql_query("SET NAMES 'utf8mb4_general_ci'");
#mysql_set_charset('utf8mb4');
mysql_query('SET NAMES utf8');
$arr = array(); 
if (isset($_GET['id'])){ 
$id = $_GET['id'];

$que = mysql_query("SELECT * FROM res WHERE res.id = '$id'");
}

else 
{ 
$que = mysql_query("select * from res");
}
$arr = array();
while($row = mysql_fetch_assoc($que)){ 
$arr[] = $row;} 
echo json_encode($arr,JSON_UNESCAPED_UNICODE); 
