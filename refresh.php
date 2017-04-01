<?php
include('bd.php');
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } 

if (empty($email)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("<html><head><meta http-equiv='Refresh' content='0; URL=pass_refresh.php'><script> alert('Введённая вами почта не соответсвует введённой при регистрации!')</script></head></html>");
    
}
 
$result = mysql_query("SELECT `e-mail` from `res` WHERE 1");
$email_from_db = mysql_fetch_array($result);
	if($email_from_db = $email){
		//echo "string";
		mail($email,"Пароль", "Ваш пароль: на горшке сидел король","From: FoodBotRostov@gmail.com");
	}
	else{
		echo "Сорян такой почты нет и небыло!";
	}
?>