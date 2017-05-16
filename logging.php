<?php
session_start();
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])){ 
    $login = $_POST['login'];
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login);
    if ($login == ''){
     unset($login);
    } 
} 
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['pass'])){
     $password=$_POST['pass'];
     $password = stripslashes($password);
     $password = htmlspecialchars($password);
     $password = trim($password);
     if ($password ==''){
        unset($password);
    } 
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную


include ("bd.php");
// подключаемся к базе
// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
mysql_query("SET NAMES utf8");
$result = mysql_query("SELECT * FROM res WHERE login='$login'",$db); 
//извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);
if (empty($myrow['pass']))
{
    //если пользователя с введенным логином не существует
    exit ("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'><script> alert('Извините, введённый вами login или пароль неверный.')</script></head></html>");
}
else {
    //если существует, то сверяем пароли
    if (password_verify($password,$myrow['pass'])){
        if(isset($_POST['remember_me'])){
          setcookie('Kulik',true,time()+3600);
        }
    if($myrow['acs']==0){
        exit ("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'><script> alert('Ваш аккаунт ещё не верифицирован, пожалуйта подождите пока мы его проверим!')</script></head></html>");
    }
        //если пароли совпадают и аккаунт проверен то запускаем пользователя в сессию! Можете его поздравить, он вошел!
        $_SESSION['name']=$myrow['name'];//получаем имя залогированного ресторана для приветсвия.
        $_SESSION['login']=$myrow['login'];
        $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        }
    else {
        //если пароли не сошлись
        exit ("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'><script> alert('Извините, введённый вами login или пароль неверный.')</script></head></html>");
    }
}


    // Выполняем SQL-запрос
    mysql_query("SET NAMES utf8");
    $query = "SELECT `id`, `dish_name`, `descr_dish`, `icons`, `price`, `ingredient` FROM dish";
    $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());

    $query2 = "SELECT * FROM key_words";
    $result2 = mysql_query($query2) or die('Запрос не удался: ' . mysql_error());

   
    // Выводим результаты в html
    $dish = mysql_fetch_array($result);
    $keywords = mysql_fetch_array($result2);
    
    // Закрываем соединение
    mysql_close($db);
    ?>