<?php require_once('logging.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link href="style.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="shell">
          <h1 class="logo">FoodBot</h1>
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

    <div class="passport">
          <h2 class="zag2">Добро пожаловть, <?=$_SESSION['name']?> !</h2>
          <div class="info">
            Телефон: <?=$myrow['phone']?><br>
            Сайт ресторана: <?=$myrow['site']?><br>
            Директор: <?=$myrow['name_dir']?><br>
            ИНН:<?=$myrow['inn']?>
            ОГРН:<?=$myrow['ogrn']?>
            р/с:<?=$myrow['rs']?>
            <a href="statistic.php">Статистика</a>
          </div>
          <div class="licence">
           <img src="<?=$myrow['lic']; ?>">
          </div>
    </div>

    <div class="menu">
     <h2 >Ваше меню:</h2>
      <form action="SOMEACTION" method="post" enctype='multipart/form-data'>
        <table>
          <tr>

            <th>Наименование блюда</th>
            <th>Фото</th>
            <th>Описание</th>
            <th>Ингридиенты</th>
            <th>Цена</th>
            <th>Ключевые слова</th>
          </tr>

          <?php do{?>
          <tr>

            <td><?=$dish['dish_name']?></td>
            <td><img src="<?=$dish['icons']?>"></td>
            <td><?= $dish['descr_dish']?></td>
            <td><?= $dish['ingredient']?></td>
            <td><?= $dish['price']?> руб.</td>
            <td>
              <select>
              <?php do{?>
                <option><?= $keywords['word']?></option>
                <?php }while($keywords = mysql_fetch_array($result2))?>
              </select>
            </td> 

            <?php
              }while($dish = mysql_fetch_array($result));
              // Освобождаем память от результата
              mysql_free_result($result);
              mysql_free_result($result2);
            ?>
        </table>
      </form>
    </div>

    <div class="addDish">
      <h2>Добавьте ваше новое блюдо</h2>
        <form action="save_dish.php" method="post" enctype = 'multipart/form-data'>
          <div class="input-group1">
            <input type="text" value="" name="dish_name" placeholder="Наименование блюда"> 
            <br>
            <div class="fileLoad">
              <input type="text"  id="Ssilka" value="" name="picture" placeholder="URL- Изображиеня" onkeyup="checkUrl()" >
              <br>
              <input type="file" id="filik" name="dish_pic" onchange="k()">
              <label for="filik">
                <img src="images/add_icon.png"> 
              </label>
            </div>
          </div>
          <div class="input-group2">
            <input type="text"  value="" name="ingr" placeholder="Ингридиенты">
            <br>
            <input type="text"  value="" name="price" placeholder="Цена">
          </div>
          <textarea name="descr" placeholder="Описание"></textarea>
          <input type="submit"  value="Добавить блюдо">    
        </form>  
    </div>  
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/exit.js"></script> 
<script src="js/price+checkUrl.js"></script>
</body>
</html>