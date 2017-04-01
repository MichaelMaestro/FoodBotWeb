<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FoodBot</title>
    <link href="style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body> 
    <header class="header">
        <div class="shell">
            <h1 id="logo"><a href="index.php"><img src="images/logo.png" alt="FoodBot">FoodBot</a></h1>
        </div>  
    </header>
<div class="refresh_form" style="margin-top: 100px;">
	<form action="refresh.php" method="post">
	<p>Для восстановления пароля необходимо ввести почту указанную при регистрации</p>
	<input type="email" name="email" placeholder="Введите вашу почту" required>
	<input type="submit" value="Отправить пароль">
	</form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
