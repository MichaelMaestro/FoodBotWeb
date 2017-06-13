<?php
//Запускаем сессию
session_start();

//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['login'])){ 
    $login = $_POST['login'];
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login);
    if ($login == ''){
     unset($login);
    } 
} 

//проделываем тоже самое с паролем
if (isset($_POST['pass'])){
     $password=$_POST['pass'];
     $password = stripslashes($password);
     $password = htmlspecialchars($password);
     $password = trim($password);
     if ($password ==''){
        unset($password);
    } 
}


// подключаемся к базе
include ("bd.php");

mysql_query("SET NAMES utf8");
//извлекаем из базы все данные о пользователе с введенным логином
$loginQuery = mysql_query("SELECT * FROM res WHERE login='$login'",$db)or die('Запрос не удался: ' . mysql_error()); 
$result = mysql_fetch_array($loginQuery);

//если пользователя с введенным логином не существует, то выводим сообщение и останавливаем скрипт с редиректом на главную страницу.
if (empty($result['pass'])){
    exit ("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'><script> alert('Извините, введённый вами login или пароль неверный.')</script></head></html>");
}

//если существует, то сверяем пароли
else {
    if (password_verify($password,$result['pass'])){
        if(isset($_POST['remember_me'])){
          setcookie('Kulik',true,time()+3600);
        }

        //если пароль верен, то проверяем верифицирован ли аккаунт    
        if($result['acs']==0){
            exit ("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'><script> alert('Ваш аккаунт ещё не верифицирован, пожалуйта подождите пока мы его проверим!')</script></head></html>");
        }

        //если пароли совпадают и аккаунт проверен то запускаем пользователя в сессию и записываем его данные! Можете его поздравить, он вошел!
        $_SESSION['name']=$result['name'];
        $_SESSION['login']=$result['login'];
        $_SESSION['id']=$result['id'];
    }
    //если пароли не сошлись    
    else{
        exit ("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'><script> alert('Извините, введённый вами login или пароль неверный.')</script></head></html>");
    }
}

//после авторизации и проверки  выполняем SQL-запросы для получения данных отображаемых на сайте
mysql_query("SET NAMES utf8");
$dishQuery = mysql_query("SELECT `id`, `dish_name`, `descr_dish`, `icons`, `price`, `ingredient`, `timetocook` FROM dish WHERE `id_res`='$_SESSION[id]'") or die('Запрос не удался: ' . mysql_error());

$key_wordsQuery = mysql_query("SELECT * FROM key_words") or die('Запрос не удался: ' . mysql_error());

// Выводим результаты в html
$dish = mysql_fetch_array($dishQuery);
$keywords = mysql_fetch_array($key_wordsQuery);
    
// Закрываем соединение
mysql_close($db);
?>