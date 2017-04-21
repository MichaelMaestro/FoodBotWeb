<?php require_once('logging.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Меню</title>
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
          <h2 class="zag2">Добро пожаловть, <?php  echo"$_SESSION[name]"?> !</h2>
          <div class="info">
            Телефон: <?php echo $myrow['phone']?><br>
            Сайт ресторана: <?php echo $myrow['site']?><br>
            Директор: <?php echo $myrow['name_dir'],' ',$myrow['fam_dir']?><br>
            ИНН:<?php echo $myrow['inn']?>
            ОГРН:<?php echo $myrow['ogrn']?>
            р/с:<?php echo $myrow['rs']?>
          </div>
          <div class="licence">
           <img src="<?php echo $myrow['lic']; ?>">
          </div>
    </div>

    <div class="menu">
     <h2 >Ваше меню:</h2>
      <form action="SOMEACTION" method="post" enctype='multipart/form-data'>
        <table>
          <tr>
            <th>да/нет</th>
            <th>Наименование блюда</th>
            <th>Фото</th>
            <th>Описание</th>
            <th>Ингридиенты</th>
            <th>Цена</th>
            <th>Ключевые слова</th>
          </tr>

          <?php do{?>
          <tr>
            <td><input type="checkbox" name="check"></td>
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
<script> 
    $(document).ready(function(){
         $('.popup, #no, .overlay').click(function (){
            $('.popup, .overlay').css({'opacity':'0', 'visibility':'hidden'});
        });
        $('#exit').click(function (e){
            $('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
            e.preventDefault();
        });
    });
</script>
<script>
    document.getElementsByName('price')[0].onkeypress = function(e) {

      e = e || event;

      if (e.ctrlKey || e.altKey || e.metaKey) return;

      var chr = getChar(e);

      // с null надо осторожно в неравенствах, т.к. например null >= '0' => true!
      // на всякий случай лучше вынести проверку chr == null отдельно
      if (chr == null) return;

      if (chr < '0' || chr > '9') {
        return false;
      }

    }

    function getChar(event) {
      if (event.which == null) {
        if (event.keyCode < 32) return null;
        return String.fromCharCode(event.keyCode) // IE
      }

      if (event.which != 0 && event.charCode != 0) {
        if (event.which < 32) return null;
        return String.fromCharCode(event.which) // остальные
      }

      return null; // специальная клавиша
    }

function checkUrl() {

    if ($('#Ssilka').val() == ""){

        $('#filik').removeAttr('disabled');}
    else
        $('#filik').attr('disabled','disabled');
}
</script>
</body>
</html>