<?php
//Старт сессии
session_start();

//Считываем переменные с формы
if (isset($_POST['dish_name'])) { $dish_name = $_POST['dish_name']; if ($dish_name == '') { unset($dish_name);} } 
if (isset($_POST['descr'])) { $descr= $_POST['descr']; if ($descr =='') { unset($descr);} }
if (isset($_POST['price'])) { $price=$_POST['price']; if ($price =='') { unset($price);} }
if (isset($_POST['ingr'])) { $ingr=$_POST['ingr']; if ($ingr =='') { unset($ingr);} }
if (isset($_POST['picture'])) { $picture=$_POST['picture']; if ($picture =='') { unset($picture);} }
if (isset($_POST['time'])) { $timeToCook=$_POST['time']; if ($timeToCook =='') { unset($timeToCook);} }


//Проверка на заполненность обязательных полей
if (empty($dish_name) or empty($price) or empty($ingr) or empty($timeToCook)){
	echo("<html><head><meta charset='utf8' http-equiv='Refresh' content='0; URL=main.php'> <script> alert('Вы не заполнили необходимые поля! Вернитесь и заполните их!')</script></head></html>");
	exit ();
}

//Обработка полей функциями защиты от инъекций
$dish_name = stripslashes($dish_name);
$dish_name = htmlspecialchars($dish_name);
$descr = stripslashes($descr);
$descr = htmlspecialchars($descr);
$price = stripslashes($price);
$price = htmlspecialchars($price);
$ingr = stripslashes($ingr);
$ingr = htmlspecialchars($ingr);
$timeToCook = htmlspecialchars($timeToCook);
$timeToCook = stripslashes($timeToCook);

//обрезаем пробелы
$dish_name = trim($dish_name);
$descr = trim($descr);
$price = trim($price);
$ingr = trim($ingr);
$timeToCook = trim($timeToCook);

include ("bd.php");

if(empty($picture)){
  $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
  foreach ($blacklist as $item)

  if(preg_match("/$item\$/i", $_FILES['dish_pic']['name'])){ 
    exit("<html><head><meta http-equiv='Refresh' content='0; URL=main.php'><script>alert ('Выберите картинку!')</script></head></html>");}

  $type = $_FILES['dish_pic']['type'];
  $size = $_FILES['dish_pic']['size'];

  if ($type != "image/jpg" && $type != "image/jpeg" && $type != "image/PNG" && $type != "image/gif" &&  $type != "image/bmp"){ 
    exit("<html><head><meta http-equiv='Refresh' content='0; URL=main.php'><script>alert ('Выбранный вами файл не картинка!')</script></head></html>");}

  if ($size > 1024*3*1024){ 
    exit("<html><head><meta http-equiv='Refresh' content='0; URL=main.php'><script> alert ('Выберите картинку размер которой меньше 3мБ!')</script></head></html>");}

  $uploadfile = "dish_photos/".$_FILES['dish_pic']['name'];
  move_uploaded_file($_FILES['dish_pic']['tmp_name'], $uploadfile);
     
  mysql_query("SET NAMES utf8");
  $q = mysql_query("SELECT id FROM dish WHERE dish_name='$dish_name'",$db)or die('Запрос не удался: ' . mysql_error());
  $myrow = mysql_fetch_array($q);
  
  if (!empty($myrow['id'])){
    exit ("<html><head><meta http-equiv='Refresh' content='0; URL=main.php'><script> alert ('В вашем ресторане уже есть блюдо с таким названием! Попробуйте придумать другое.')</script></head></html>");
  }

  $result = mysql_query ("INSERT INTO dish (`dish_name`, `icons`,`descr_dish`,`price`,`ingredient`,`timeToCook`,`id_res`) VALUES ('$dish_name', '$uploadfile','$descr','$price','$ingr','$timeToCook','$_SESSION[id]')")or die('Запрос не удался: ' . mysql_error());
  
  if ($result =='TRUE'){
    echo "<html><head><meta charset='utf8'><script> alert('Блюдо добавлено.')</script></head></html>";
    error_reporting(0);
    header("location:main.php");
  }

  else{
    echo "<html><head><meta charset='utf8'><script> alert('Что-то пошло не так.')</script></head></html>";
  }
}

else{

  $picture = stripslashes($picture);
  $picture = htmlspecialchars($picture);
  $picture = trim($picture);

  mysql_query("SET NAMES utf8");

  $q = mysql_query("SELECT id FROM dish WHERE dish_name='$dish_name'",$db)or die('Запрос не удался: ' . mysql_error());
  $myrow = mysql_fetch_array($q);
  
  if (!empty($myrow['id'])){
    exit ("<html><head><meta http-equiv='Refresh' content='0; URL=main.php'><script> alert ('В вашем ресторане уже есть блюдо с таким названием! Попробуйте придумать другое.')</script></head></html>");
  }
  
  $result2 = mysql_query("INSERT INTO `dish` (`dish_name`, `icons`, `descr_dish`, `price`, `ingredient`,`timeToCook`,`id_res`) VALUES ('$dish_name', '$picture','$descr','$price','$ingr','$timeToCook','$_SESSION[id]')")or die('Запрос не удался: ' . mysql_error());
  if ($result2 =='TRUE'){
    echo "<html><head><meta charset='utf8' http-equiv='Refresh' content='0; URL=main.php'><script> alert('Блюдо добавлено.')</script></head></html>";
    error_reporting(0);
  }

  else{
    echo "<html><head><meta charset='utf8' http-equiv='Refresh' content='0; URL=main.php'><script> alert('Что-то пошло не так.')</script></head></html>";
  }
}



?>
