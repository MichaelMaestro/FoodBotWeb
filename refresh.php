<?php
include('bd.php');
mysql_query("SET NAMES utf8");

$mas = array();
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } 

$email = stripslashes($email);
$email = htmlspecialchars($email);
$email = trim($email);

if (empty($email)) //если пользователь не ввел e-mail, то выдаем ошибку и останавливаем скрипт
{
   exit ("<html><head><meta charset='utf8' http-equiv='Refresh' content='0; URL=pass_refresh.php'><script>alert('Введённая вами почта не соответсвует введённой при регистрации!');</script></head></html>");
}

mail($email,"Пароль", "Ваш пароль: на горшке сидел король","From: FoodBotRostov@gmail.com");

/*$result = mysql_query("SELECT `e-mail` from `res` WHERE 1");
$email_from_db = mysql_fetch_assoc($result);

 for($i=0;$i<$email_from_db;$i++){
	$mas[] = $email_from_db;

		if($mas[$i] == $email){
			mail($email,"Пароль", "Ваш пароль: на горшке сидел король","From: FoodBotRostov@gmail.com");
			
			echo ("<html><head><meta charset='utf8' http-equiv='Refresh' content='0 URL=index.php'><script>Ваш пароль отправлен вам на почту! Проверьте ящик)</script></head></html>");
		}

		else{
			echo ("<html><head><meta charset='utf8'><script>Аккаунта с такой почтой нет, проверьте правильно ли вы ввели свой адрес!</script></head></html>");
		}	
	}*/
?>