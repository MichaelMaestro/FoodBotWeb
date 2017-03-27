<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="style.css" rel="stylesheet">
    <link href="reg.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="shell">
            <h1 id="logo"><a href="index.php"><img src="images/logo.png" alt="FoodBot">FoodBot</a></h1>
        </div>
    </header>

    <div class="backgr">
        <div class="regForm">
            <h2>Заполните данные о вашем заведении</h2>
               
            <form action="save_res.php" method="post" enctype = 'multipart/form-data'>
                <p><input type="text" value=""  name="login" placeholder="Логин*" required></p>
                <p><input type="text" value=""  name="pass"  placeholder="Пароль*" required></p>
                <p><input type="text"  value="" name="name" placeholder="Название ресторана*" required></p>
                <p><input type="text"  value="" name="address" placeholder="Адресс ресторана*" required></p>
                <p><input type="text"  value="" name="phone" placeholder="Телефон ресторана*" required></p>
                <p><input type="text"  value="" name="site" placeholder="Сайт ресторана"></p>
                <p><input type="text"  value="" name="name_dir" placeholder="Имя"> <input type="text"  value="" name="fam_dir" placeholder="Фамилия"></p>
                <p><input type="text"  value="" name="contact_data" placeholder="Контактные данные"></p>
                <p>Фото лицензии <input type="file" name="somename"></p> 
                
                <p class="remember_me">
                    <label>
                        <input type="checkbox" name="remember_me" id="remember_me">
                        Я согласен(на) на использование введённых мною данных
                    </label>
                </p>
            <input type="submit" class="btn " id="reg" name="reg" value="Регистрация" disabled>
            <div class="rekviz">
                <h2>Реквизиты*</h2>   
                <p><input type="text"  value="" name="inn" placeholder="ИНН" required></p>
                <p><input type="text"  value="" name="ogrn" placeholder="ОГРН" required></p>
                <p><input type="text"  value="" name="rs" placeholder="Расчётный счёт" required></p>
            </div>
            </form>
        </div>
    </div>
<div class="footer">

    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    $(document).ready(function(){
        $('#remember_me').change(function(){
            if ($(this).is(':checked')){
                $('#reg').removeAttr('disabled');
                $('#reg').addClass('btn-success');                }

            else
                $('#reg').attr('disabled', 'disabled');
               
        });
    });
    </script>
    <script>
    document.getElementsByName('inn','rs','ogrn')[0].onkeypress = function(e) {

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
</script>


</body>
</html>