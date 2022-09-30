<html>
<head>

</head>
    <body>
    <h3>Авторизация</h3>
    <br>
    <?php include_once (__DIR__ . '/../menu/menu.php'); ?>
    <br>
    <br>
    Логин:<input type><br><br>
    Пароль:<input type="password"><br><br>
    <input type="button" onclick="location.href='<?=route('admin')?>'" value="Вход" />
    <input type="button" onclick="location.href='<?=route('main')?>'" value="Отмена" />
    </body>
</html>
