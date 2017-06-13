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
        <a href="index.php"><h1 class="logo">FoodBot</h1></a>
    </div>  
</header>

<div class="refresh_form">
	<form class="form-horizontal" action="refresh.php" method="post">
        <legend>Восстановление пароля</legend>
        <div class="control-group">
        	<label>
                Для восстановления пароля необходимо<br>ввести почту указанную при регистрации
            </label>
            <div class="control">
        	   <input type="email" name="email" placeholder="Введите вашу почту" required>
            </div>
        </div>

	    <input type="submit" class="btn btn-success" value="Отправить пароль">
	</form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
