<?if (!$allow):?>
    <form action="/login" method="post">
        <input type="text" name="login" placeholder="Логин"><br>
        <input type="password" name="pass" placeholder="Пароль"
               style="margin: 5px 0"><br>
        <input type="checkbox" name="save">Запомнить меня<br>
        <input type="submit" name="send" value="login">
    </form>
<?else:?>
    <!--    <p>-->
    <!--        Добро пожаловать --><?//=$user?><!-- <a href="/login/out"> Выход</a>-->
    <!--    </p>-->
<?endif;?>