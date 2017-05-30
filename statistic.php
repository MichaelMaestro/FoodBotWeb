<?php 
    session_start();
    include('bd.php');
    mysql_query("SET NAMES utf8");
    date_default_timezone_set('Europe/Moscow');

    $mainQuery = mysql_query("SELECT * FROM log WHERE id_res='$_SESSION[id]'")or die('Запрос не удался: ' . mysql_error());
    $log = mysql_fetch_array($mainQuery);

    $sumQuery = mysql_query("SELECT sum(`price`) FROM log WHERE id_res = '$_SESSION[id]'")or die('Запрос не удался: ' . mysql_error());
    $sum = mysql_fetch_array($sumQuery);
    

    $userQuery = mysql_query("SELECT `user_name`, `user_secname`, count(*) AS howmatch FROM `log` WHERE id_res = '$_SESSION[id]' GROUP BY `user_id` HAVING howmatch > 1")or die('Запрос не удался: ' . mysql_error());
    $user = mysql_fetch_array($userQuery);

    $dishQuery = mysql_query("SELECT `id_dish`, `dish`, count(*) AS howmatch FROM `log`
        WHERE id_res = '$_SESSION[id]' GROUP BY `id_dish` HAVING howmatch > 1")or die('Запрос не удался: ' . mysql_error());
    $dish = mysql_fetch_array($dishQuery);
?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статистика</title>
    <link href="style.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet"> 
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
    <h3>Статистика <?=$_SESSION['name']?></h3>
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
            <td id="price"><?=$log['price']?> руб.</td>
        </tr>
        <?php
              }while($log = mysql_fetch_array($mainQuery));
              // Освобождаем память от результата
              mysql_free_result($mainQuery);
              ?>
    </table>
</div>
    <h3>Ваш постоянный клиент:<?=$user[0],' ',$user[1]?></h3>
    <h3>Самое заказываемое блюдо:<?=$dish[1]?></h3>
    <h3>Чат-бот заработал для вас:<?=$sum[0]?>руб.</h3>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script> 
<script src="js/exit.js"></script>
</body>
</html>