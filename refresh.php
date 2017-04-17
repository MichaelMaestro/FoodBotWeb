<?php
include('bd.php');
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } 

if (empty($email)) //если пользователь не ввел e-mail, то выдаем ошибку и останавливаем скрипт
{
    exit ("<html><head><meta charset='utf8' http-equiv='Refresh' content='0; URL=pass_refresh.php'><script> alert('Введённая вами почта не соответсвует введённой при регистрации!')</script></head></html>");
    
}
 
$result = mysql_query("SELECT `e-mail` from `res` WHERE 1");
$email_from_db = mysql_fetch_array($result);
		foreach ($email_from_db as $mail) {
		
	if($mail == $email){
		mail($email,"Пароль", "Ваш пароль: на горшке сидел король","From: FoodBotRostov@gmail.com");
		exit ("<html><head><meta charset='utf8' http-equiv='Refresh' content='0 URL=index.php'><script>Ваш пароль отправлен вам на почту! Проверьте ящик)</script></head></html>");
	}
	else{
		exit ("<html><head><meta charset='utf8' http-equiv='Refresh' content='0 URL=pass_refresh.php'><script>Аккаунта с такой почтой нет, проверьте правильно ли вы ввели свой адрес!</script></head></html>");
	}
}
?>