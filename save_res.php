<?php
//считываем данные с формы
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['pass'])) { $password=$_POST['pass']; if ($password =='') { unset($password);} }
if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }
if (isset($_POST['address'])) { $address=$_POST['address']; if ($address =='') { unset($address);} }
if (isset($_POST['phone'])) { $phone=$_POST['phone']; if ($phone =='') { unset($phone);} }
if (isset($_POST['site'])) { $site=$_POST['site']; if ($site =='') { unset($site);} }
if (isset($_POST['name_dir'])) { $name_dir=$_POST['name_dir']; if ($name_dir =='') { unset($name_dir);} }
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
if (isset($_POST['inn'])) { $inn=$_POST['inn']; if ($inn =='') { unset($inn);} }
if (isset($_POST['ogrn'])) { $ogrn=$_POST['ogrn']; if ($ogrn =='') { unset($ogrn);} }
if (isset($_POST['rs'])) { $rs=$_POST['rs']; if ($rs =='') { unset($rs);} }


 //если пользователь не ввел данные в поля обязательного ввода, то выдаем ошибку и останавливаем скрипт
if (empty($login) or empty($password) or empty($name) or empty($address) or empty($phone) or empty($inn) or empty($ogrn) or empty($rs))
{
  exit ("<html><head><meta http-equiv='Refresh' content='0; URL=registration.php'><script> alert('Вы не заполнили необходимые поля! Вернитесь и заполните их!')</script></head></html>");
}

//если поля заполнены, то обрабатываем их, чтобы теги и скрипты не работали
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$name = stripslashes($name);
$name = htmlspecialchars($name);
$address = stripslashes($address);
$address = htmlspecialchars($address);
$phone = stripslashes($phone);
$phone = htmlspecialchars($phone);
$site = stripslashes($site);
$site = htmlspecialchars($site);
$name_dir = stripslashes($name_dir);
$name_dir = htmlspecialchars($name_dir);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$inn = stripslashes($inn);
$inn = htmlspecialchars($inn);
$ogrn = stripslashes($ogrn);
$ogrn = htmlspecialchars($ogrn);
$rs = stripslashes($rs);
$rs = htmlspecialchars($rs);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$name = trim($name);
$address = trim($address);
$phone = trim($phone);
$site = trim($site);
$name_dir = trim($name_dir);
$email = trim($email);
$inn = trim($inn);
$ogrn = trim($ogrn);
$rs = trim($rs);

//Загрузка файлов
$blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
foreach ($blacklist as $item)

if(preg_match("/$item\$/i", $_FILES['somename']['name'])){
 exit("<html><head><meta charset='utf8' http-equiv='Refresh' content='0 URL=registration.php'><script> alert('Вы пытаетесь загрузить файл запрещённого формата!');</script></head></html>");
}
$type = $_FILES['somename']['type'];
$size = $_FILES['somename']['size'];

if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png")){
  exit("<html><head><meta charset='utf8' http-equiv='Refresh' content='0 URL=registration.php'><script> alert('Вы загружаете не фотографию или не загружаете!');</script></head></html>");
}

if ($size > 1024*3*1024){
 exit("<html><head><meta charset='utf8' http-equiv='Refresh' content='0 URL=registration.php'><script> alert('Загрузите картинку не более 3 мБ!');</script></head></html>");
}

$uploadfile = "res_licences/".$_FILES['somename']['name'];
move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile);

// подключаемся к базе
include ("bd.php");

// проверка на существование пользователя с таким же логином
mysql_query("SET NAMES utf8");
$result = mysql_query("SELECT id FROM res WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
 if (!empty($myrow['id'])){
    exit ("<html><head><meta http-equiv='Refresh' content='0; URL=registration.php'><script> alert ('Извините, введённый вами логин уже зарегистрирован. Введите другой логин.')</script></head></html>");
  }

$password = password_hash($password, PASSWORD_DEFAULT);
$result2 = mysql_query ("INSERT INTO `res` (`name`, `inn`, `ogrn`, `rs`, `phone`, `site`, `name_dir`,`e-mail`,`login`, `pass`,`lic`) VALUES('$name','$inn','$ogrn','$rs','$phone','$site','$name_dir','$email','$login','$password','$uploadfile')");

$res_query = mysql_query("SELECT id FROM res WHERE login='$login'",$db);
$id_res = mysql_fetch_array($res_query);


$result3 = mysql_query ("INSERT INTO `resbuild` (`address`,`id_res`) VALUES('$address','$id_res[id]')");

//проверяем загрузил ли пользователь фото, если да то ставим в базе метку 1;


// Проверяем, есть ли ошибки
if ($result2=='TRUE' && $result3=='TRUE')
{
   echo "<html><head><script> alert('Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.')</script></head></html>";
   require('index.php');
   exit();
}
else {
    echo "<script>alert('Ошибка! Что то пошло не так. Вы не зарегистрированы.')</script>";
}
?>