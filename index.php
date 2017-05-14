<?php
session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. 
?>
<html lang="ru">
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
        <a href="index.php"><h1 class="logo">FoodBot</h1></a>
        <input type="button" class="btn btn-success" name="reg" value="Регистрация" onclick=" window.location = 'registration.php'">
    </div>  
    </header>
 

    <div class="block-1">
        <div class="content">
            <h1 class="hero-unit"><a href="https://web.telegram.org/#/im?p=@takethefood_bot" target="_blank">Чат-бот</a> для <br>вашего ресторана</h1>
            <div class="login"> 
                <form class="form-horizontal" action="main.php" method="post">
                    <legend>Авторизация</legend>
                    <p><input class="input" type="text" name="login" value="" placeholder="Логин или Email" required></p>
                    <p><input type="password" name="pass" value="" placeholder="Пароль" required></p>
                    <p><a  href="pass_refresh.php" id="refresh" >Забыли пароль?</a></p>
                    <p class="remember_me">    
                    <input type="checkbox" id="remember_me" name="remember_me">
                    <label for="remember_me">Запомнить меня</label>
                    </p>
                    <p class="submit">
                    <input type="submit" class="btn btn-success" name="commit" value="Войти">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>


    <div class="block-2">
        <div class="content">
            <div class="text">
                <h3>Как это работает?</h3>
                <p>Очень просто!<br>Пользователь заказывает еду у бота, заказ перенапраляется к вам.</p>
                <br>

                <h3>Зачем это нужно?</h3>
                <p>С помощью чат бота вы сможете получать больше заказов и возможность привлечь новых клиентов.<br>Так же вы получите статистику заказов через бота</p>
            </div>
            <div class="picture">
                <img src="images/ques.png">
            </div>
        </div>
    </div>
   
    <div class="block-3">
        <div class="content">
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
    </div>

    <div class="block-4">
        <div class="content">
            <div class="text">
                <h3>Вас будут ждать с нетерпением</h3>
                <br>
                <p>Наш сервис использует технологию Google maps, благодаря которой вашему клиету будет сообщаться ориентировочное время доставки вашего блюда.</p>
            </div>
            <div class="picture">
                <img src="images/map-marker.png">
            </div>
        </div>

    </div>

<div class="footer">
    <div class="content">

    </div>        
</div>
<!-- Скритпы -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>