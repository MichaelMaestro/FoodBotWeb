<?php
session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FoodBot</title>
    <link href="style.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body> 
    <header class="header">
        <div class="shell">
            <h1 id="logo"><a href="index.php"><img src="images/logo.png" alt="FoodBot">FoodBot</a></h1>
                 <input type="button" class="btn btn-success" name="reg" value="Регистрация" onclick=" window.location = 'registration.php'">
        </div>  
    </header>
 
    <div class="block-1">
            <h1 class="hero-unit"><a href="https://web.telegram.org/#/im?p=@takethefood_bot" target="_blank">Чат-бот</a> для <br>вашего ресторана</h1>
            <div class="login"> 
                <h2>Авторизация</h2>
                <hr>
                <form class="form-horizontal" action="main.php" method="post">
                    <p><input type="text" name="login" value="" placeholder="Логин или Email" required></p>
                    <p>
                        <input type="password" name="pass" value="" placeholder="Пароль" required>
                        <label><a href="pass_refresh.php">Забыли пароль?</a></label>
                    </p>
                    
                    <p class="remember_me">
                    <label>
                        <input type="checkbox" name="remember_me" id="remember_me">
                        Запомнить меня
                    </label>
                    </p>
                    <p class="submit">
                    <input type="submit" class="btn btn-success" name="commit" value="Войти">
                    </p>
                </form>
            </div>
        </div>



    <div class="block-2">
        <div class="text">
            <h3>Как это работает?</h3>
            <br>
            <p>Очень просто!<br>Пользователь заказывает еду у бота, заказ перенапраляется к вам.</p>
            <br>
            <h3>Зачем это нужно?</h3>
            <br>
            <p>С помощью чат бота вы сможете получать больше заказов и возможность привлечь новых клиентов. Так же вы получите статистику заказов через бота</p>
        </div>
        <div class="picture">
        <img src="images/ques.png">
        </div>
    </div>
   
    <div class="block-3">
        <div class="text">
            <div class="text_left">
                <h3>Меню</h3>
             
                <p>В личном кабенете вашего ресторана вы сможете вести своё меню,<br>именно с этим меню и будет работать бот</p>
            </div>
            <div class="text_right">
                <h3>Ключевые слова</h3>
          
                <p>Бот осуществляет поиск по ключевым словам, то есть вы выбираете ключевое слово<br> для каждого блюда и бот найдёт это блюдо по этому слову.</p>
            </div>
        </div>
    </div>

    <div class="block-4">
     <div class="text">
            <h3>Вас будут ждать с нетерпением</h3>
            <br>
            <p>Дело в том что наш сервис использует технологию Google maps, благодаря которой вашему клиету будет сообщаться ориентировочное время доставки вашего блюда.</p>
        </div>
        <div class="picture">
        <img src="images/map-marker.png">
        </div>
    </div>

    <div class="footer">
        
    </div>
<!-- Скритпы -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>