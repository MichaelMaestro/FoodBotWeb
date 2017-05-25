<?php
session_start();
include('bd.php');
$login = $_SESSION['login'];
mysql_query("SET NAMES utf8");
$result = mysql_query("SELECT * FROM res WHERE login='$login'",$db); 
//извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);
if($myrow['acs']==0){
        exit ("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'><script> alert('Ваш аккаунт ещё не верифицирован, пожалуйта подождите пока мы его проверим!')</script></head></html>");
    }
        //если пароли совпадают и аккаунт проверен то запускаем пользователя в сессию! Можете его поздравить, он вошел!
        $_SESSION['name']=$myrow['name'];//получаем имя залогированного ресторана для приветсвия.
        $_SESSION['login']=$myrow['login'];
        $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь


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