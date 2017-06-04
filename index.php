<?php
//Запускаем сессию
session_start();

//Проверка задан ли куки, если задан то редирект на личный кабинет
if(isset($_COOKIE['Kulik'])){
    echo "<script> window.location = 'main.php'</script>";
}
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

<div id="wrapper">

    <div class="container-fluid">
        <header id="header" class="row">
            <div class="col-md-12 col-sm-12">
                <div class="col-md-2 col-sm-5">
                    <a href="index.php">
                        <h1 class="logo">FoodBot</h1>
                    </a>
                </div>
                <div  class="col-md-10 col-sm-7 col-xs-5">
                    <input type="button" class="btn btn-success" name="reg" value="Регистрация" onclick="window.location = 'registration.php'">
                </div>
            </div>  
        </header>
    </div>


    <div class="container-fluid">
        <div class="block-1 row">
            <div class="content">
                <div class="col-md-7 col-sm-12">
                    <h1 class="hero-unit">
                        <a href="https://web.telegram.org/#/im?p=@takethefood_bot" target="_blank">Чат-бот</a> для вашего ресторана
                    </h1>
                </div>
                <div id="login" class="col-md-5 col-sm-12"> 
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


    <div class="container-fluid">
        <div class="block-2 row">
            <div class="content"> 
                <div class="text col-md-7 col-sm-6">
                    <h3>Как это работает?</h3>
                    <p>Очень просто!<br>Пользователь заказывает еду у бота, заказ перенапраляется к вам.</p>
                    <br>

                    <h3>Зачем это нужно?</h3>
                    <p>С помощью чат бота вы сможете получать больше заказов и возможность привлечь новых клиентов.<br>Так же вы получите статистику заказов через бота.</p>
                </div>
                <div class="picture col-md-5 col-sm-6">
                    <img src="images/ques.png">
                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="block-3 row">
            <div class="content">
                <div class="text col-md-6 col-sm-6">
                    <div class="text_left">
                        <h3>Меню</h3>
                        <p>В личном кабенете вашего ресторана вы сможете вести своё меню,<br>именно с этим меню и будет работать бот.</p>
                    </div>

                    <div class="text_left">
                        <h3>Ключевые слова</h3>
                        <p>Бот осуществляет поиск по ключевым словам, то есть вы выбираете ключевое слово<br> для каждого блюда и бот найдёт это блюдо по этому слову.</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6"></div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="block-4 row">
            <div class="content">
                <div class="text col-md-7 col-sm-6">
                    <h3>Вас будут ждать с нетерпением</h3>
                    <br>
                    <p>Наш сервис использует технологию Google maps, благодаря которой вашему клиету будет сообщаться ориентировочное время доставки вашего блюда.</p>
                </div>
                <div class="picture col-md-5 col-sm-6">
                    <img src="images/map-marker.png">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Скритпы -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>