<?php 
    session_start();
    include('bd.php');
    mysql_query("SET NAMES utf8");
    date_default_timezone_set('Europe/Moscow');

    $mainQuery = mysql_query("SELECT * FROM log WHERE id_res='$_SESSION[id]'")or die('Запрос не удался: ' . mysql_error());
    $log = mysql_fetch_array($mainQuery);

    $klientQuery = mysql_query("SELECT DISTINCT (`user_id`) FROM `log` ");
    $klient = mysql_fetch_array($klientQuery);

    $dishQuery = mysql_query("SELECT DISTINCT (`dish`) FROM `log`");
    $bludo = mysql_fetch_array($dishQuery);

    do{
        $klientCountQuery = mysql_query("SELECT COUNT(`user_id`) FROM `log` WHERE `user_id` = '$klient[0]'");
        $klientCount = mysql_fetch_array($klientCountQuery);
        for($i=0;$i=mysql_fetch_array($klientCountQuery);$i++){
            //code;
        }
        do{
            $userNameQuery = mysql_query("SELECT `user_name`,`user_secname` FROM `log` GROUP BY `user_id` HAVING COUNT(`user_id`) =  '$maxKlient'");
            $name = mysql_fetch_array($userNameQuery);
            $userName = $name[0];
            $userSecname=$name[1];
        }
        while($klientCount = mysql_fetch_array($klientCountQuery));
    }
    while($klient = mysql_fetch_array($klientQuery));

        do{
            $dishCountQuery = mysql_query("SELECT COUNT(`dish`) FROM `log` WHERE `dish` = '$bludo[0]'");
            $dishCount = mysql_fetch_array($dishCountQuery);
            $maxDish = max($dishCount);
            var_dump($maxDish);
            do{
                $dishNameQuery = mysql_query("SELECT `dish` FROM `log` GROUP BY `dish` HAVING COUNT(`dish`) =         '$maxDish'");
                $dishName = mysql_fetch_array($dishNameQuery);
                $dish = $dishName[0];
            }
            while($dishCount = mysql_fetch_array($dishCountQuery));
        }
        while($bludo = mysql_fetch_array($dishQuery));
?>
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
            <td id="price"><?=$log['price']?> руб.</td>
        </tr>
        <?php
              }while($log = mysql_fetch_array($mainQuery));
              // Освобождаем память от результата
              mysql_free_result($mainQuery);
              ?>
    </table>
</div>
    <h2>Ваш постоянный клиент:<?=$userName,' ',$userSecname?> </h2>
    <h2>Самое заказываемое блюдо:<?=$dish?></h2>
    <h2>Чат-бот заработал для вас:</h2>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/exit.js"></script>
<script>
$(document).ready(function(){
    var onePrice = valueOf('#price');
    console.log(onePrice);
    });
</script>
</body>
</html>