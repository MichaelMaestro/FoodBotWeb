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
            <a href="index.php"><h1 class="logo">FoodBot</h1></a>
        </div>
    </header>

    <div class="backgr">
        <div class="regForm">   
            <form action="save_res.php" method="post" enctype = 'multipart/form-data'>
                <legend>Заполните данные о вашем заведении</legend>
                <p><input type="text" value=""  name="login" placeholder="Логин*" required></p>
                <p><input type="text" value=""  name="pass"  placeholder="Пароль*" required></p>
                <p><input type="text"  value="" name="name" placeholder="Название ресторана*" required></p>
                <p><input type="text"  value="" name="address" placeholder="Адрес ресторана*" required></p>
                <p><input id="phone" type="text"   value="" name="phone" placeholder="Телефон ресторана*" required></p>
                <p><input type="text"  value="" name="site" placeholder="Сайт ресторана"></p>
                <p><input type="text"  value="" name="name_dir" placeholder="ФИО"> 
                <p><input type="email"  value="" name="email" placeholder="E-mail*" required></p>
                <p>Фото лицензии 
                <input type="file" id="file" name="somename">
                <label for="file">
                <img src="images/add_icon.png"> 
                </label>
                </p>
                <p class="remember_me">
                    <label>
                        <input type="checkbox" name="remember_me" id="remember_me">
                        Я согласен(на) на использование введённых мною данных
                    </label>
                </p>
            <input type="submit" class="btn " id="reg" name="reg" value="Регистрация" disabled>
            <div class="rekviz">
                <legend>Реквизиты</legend>  
                <p><input type="text" id="num_check" value="" name="inn" placeholder="ИНН" required></p>
                <p><input type="text" id="num_check1" value="" name="ogrn" placeholder="ОГРН" required></p>
                <p><input type="text" id="rs" value="" name="rs" placeholder="Расчётный счёт" required></p>
            </div>
            </form>
        </div>
    </div>
<div class="footer">

    </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.2.2.js"></script>
<script>

</script>
<script src="js/input_Mask.js"></script> 
</body>
</html>