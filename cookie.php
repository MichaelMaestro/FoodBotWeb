<?php
session_start();
include('bd.php');

//записываем значении из сессии
$login = $_SESSION['login'];

mysql_query("SET NAMES utf8");

//извлекаем из базы все данные о пользователе с введенным логином
$loginQuery = mysql_query("SELECT * FROM res WHERE login='$login'",$db); 
$result = mysql_fetch_array($loginQuery);

//Если значение acs равно 0, то выводим сообщение об ошибке и остнонавливаем скрипт
if($result['acs']==0){
        exit ("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'><script> alert('Ваш аккаунт ещё не верифицирован, пожалуйта подождите пока мы его проверим!')</script></head></html>");
    }
//Если пароли совпадают и аккаунт проверен то запускаем пользователя в сессию! Можете его поздравить, он вошел!
    //Записываем данные ресторана в сессию.    
        $_SESSION['name']=$result['name'];
        $_SESSION['login']=$result['login'];
        $_SESSION['id']=$result['id'];

    // Выполняем SQL-запрос
    //mysql_query("SET NAMES utf8");
        
    $dishQuery = mysql_query("SELECT `id`, `dish_name`, `descr_dish`, `icons`, `price`, `ingredient` FROM dish") or die('Запрос не удался: ' . mysql_error());
    $key_wordsQuery = mysql_query("SELECT * FROM key_words")or die('Запрос не удался: ' . mysql_error()); 

    // Выводим результаты в html
    $dish = mysql_fetch_array($dishQuery);
    $keywords = mysql_fetch_assoc($key_wordsQuery);
    $key_mas = array();
    while($keywords = mysql_fetch_assoc($key_wordsQuery)){
        $key_mas[] = $keywords;
    }
      

    
    // Закрываем соединение
    mysql_close($db);
?>