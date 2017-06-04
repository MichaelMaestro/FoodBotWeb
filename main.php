<?php 
//если задан куки, то вызываем файл куки
if(isset($_COOKIE['Kulik'])){
  require_once('cookie.php');
  echo "<script>console.log(2)</script>";
}
//иначе вызываем логгинг
else{
  require_once('logging.php');
  echo "<script>console.log(3)</script>";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link href="style.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet"> 
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">

<div class="container-fluid">
  <header id="header" class="row">
    <div class="col-md-12 col-sm-12">
        <div class="col-md-6 col-sm-5">
                <h1 class="logo">FoodBot</h1>
        </div>
        <div  class="col-md-6 col-sm-7 col-xs-5">
            <input type="submit" id="exit" class="btn btn-danger"  value="Выход">
        </div>
      </div>  
  </header>
</div>

<div class="overlay" title="окно"></div>
<div class="popup">
  <p>Вы уверены что хотите выйти?</p>
  <form action="exit.php" method="post">
    <input type="submit" class="btn btn-danger" value="Да">
    <input type="button" id="no" class="btn btn-success" value="Нет">
  </form>
</div>

<div class="container-fluid">
  <div class="passport row">
    <div class="content">
      <h2 class="center-align zag2">Добро пожаловть, <?=$_SESSION['name']?> !</h2>
      <div class="info col-md-9 col-sm-8">
        Телефон: <?=$result['phone']?><br>
        Сайт ресторана: <?=$result['site']?><br>
        Директор: <?=$result['name_dir']?><br>
        ИНН:<?=$result['inn']?>
        ОГРН:<?=$result['ogrn']?>
        р/с:<?=$result['rs']?><br>
        <a href="statistic.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>Статистика </a>
      </div>
      <div class="licence col-md-3 col-sm-4">
        <img src="<?=$result['lic']; ?>">
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="menu row">
        <div class="col-md-12">
        <h2>Меню:</h2>
        </div>
        <div class="col-md-12 col-sm-12">
        <table>
          <tr>
            <th>Наличие блюда</th>
            <th>Наименование блюда</th>
            <th>Фото</th>
            <th>Описание</th>
            <th>Ингридиенты</th>
            <th>Цена</th>
            <th>Ключевые слова</th>
          </tr>

          <?php do{?>
          <tr>
            <td><input type="checkbox" id="check" checked></td>
            <td id="dish_name"><?=$dish['dish_name']?></td>
            <td><img src="<?=$dish['icons']?>"></td>
            <td><?= $dish['descr_dish']?></td>
            <td><?= $dish['ingredient']?></td>
            <td><?= $dish['price']?> руб.</td>
            <td><div class="chips chips-autocomplete"></div></td> 

          <?php
          }while($dish = mysql_fetch_array($dishQuery));
          // Освобождаем память от результата
          mysql_free_result($dishQuery);
          mysql_free_result($key_wordsQuery);
          ?>
          </tr>
      </table>
      </div>
  </div>
</div>

<div class="container-fluid">
  <div class="addDish row">
    <div class="content">
      <h2 class="center-align">Добавьте ваше новое блюдо</h2>
      <form action="save_dish.php" method="post" enctype = 'multipart/form-data'>

        <div class="col-md-4 col-sm-4">
          <input type="text" value="" name="dish_name" placeholder="Наименование блюда"> 
          <div class="fileLoad">
              <input type="text"  id="Ssilka" value="" name="picture" placeholder="URL- Изображиеня" onkeyup="checkUrl()" >
              <br>
              <input type="file" id="filik" name="dish_pic" onchange="k()">
              <label for="filik">
                <i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i>
              </label>
          </div>

        </div>
        <div class="col-md-4 col-sm-4">
          <input type="text"  value="" name="ingr" placeholder="Ингридиенты">
          <input type="text"  value="" name="price" placeholder="Цена">
          <input type="submit"  value="Добавить блюдо">
        </div>
        <div class="col-md-4 col-sm-4">
          <textarea name="descr" placeholder="Описание"></textarea>
        </div>
      </form>
    </div>  
  </div>
</div>


</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>   
<script src="js/bootstrap.js"></script>
<script src="js/exit.js"></script> 
<script src="js/price+checkUrl.js"></script>
<script>
$(document).ready(function(){
        $('#check').change(function(){
            if ($(this).is(':checked')){
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
              }
              else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.open("GET","update.php?f=1",true);
              xmlhttp.send();
              console.log('мы поменяли твой флажок хозяин');
              console.log($('#dish_name').value)
            }
            else{
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
              }
              else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.open("GET","update.php?f=0",true);
              xmlhttp.send();
              console.log('мы разменяли твой флажок хозяин');
            }    
        });
    });
</script>
<script>
   $('.chips').material_chip(); 
    $('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      data: {
        //вставить из базы каким то ХЕРОМ
      },
      limit: Infinity,
      minLength: 1
    }
  });
  
  $('.chips').on('chip.add', function(e, chip){
      $('.material-icons').replaceWith("<i class='material-icons close fa fa-times' aria-hidden='true'></i>");
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      }
      else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.open("GET","save_key.php?q="+chip.tag,true);
      xmlhttp.send();
      console.log(1);
  });

  /*$('.chips').on('chip.delete', function(e, chip){
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      }
      else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.open("GET","remove_key.php?q="+chip.tag,true);
      xmlhttp.send();
      
  });*/

</script>
</div>
</body>
</html>


