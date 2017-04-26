<?php 
date_default_timezone_set('Europe/Moscow');
require_once('logging.php'); ?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статистика</title>
    <link href="style.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="shell">
          <a href="main.php"><h1 class="logo">FoodBot</h1></a>
          <input type="submit" id="exit" class="btn btn-danger"  value="Выход">
        </div>
    </header>

  <div class="overlay" title="окно"></div>
    <div class="popup">
      <p>Вы уверены что хотите выйти?</p>
      <form action="exit.php" method="post">
        <input type="submit" class="btn btn-danger" value="Да">
        <input type="button" id="no" class="btn btn-success" value="Нет">
      </form>
    </div>

<div class="stat">
    <h2>Статистика <?=$_SESSION['name']?></h2>
    <table>
        <tr>
            <th>Имя пользователя</th>
            <th>Наименование блюда</th>
            <th>Дата Заказа</th>
            <th>Цена</th>
        </tr>

        <?php do{?>
        <tr>
            <td><?=$log['user_name'],' ',$log['user_secname']?></td>
            <td><?=$log['dish']?></td>
            <td><?php 
                $date = $log['date_msg'];
                echo date("d.m.Y, H:i", $date);
            ?>
            </td>
            <td><?=$log['price']?> руб.</td>
        </tr>
        <?php
              }while($log = mysql_fetch_array($result3));
              // Освобождаем память от результата
              mysql_free_result($result3);
              ?>
    </table>
</div>
    <h2>Ваш постоянный клиент:</h2>
    <h2>Самое заказываемое блюдо:</h2>
    <h2>Чат-бот заработал для вас:</h2>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/exit.js"></script>
</body>
</html>