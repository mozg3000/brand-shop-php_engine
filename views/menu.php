<div style="display: flex; justify-content: space-between; vertical-align: center">
    <div style="margin: auto 0">
        <a href="/">Главная</a>
        <a href="/catalog/">Каталог</a>
        <?if($allow):?>
        <a href="/orders/">Список заказов</a>
        <?endif;?>
    </div>
    <div>
        <?if($allow):?>
        <p>
            <?=$user?> <a href="/login/out" style="font-size: small"> Выход</a>
        </p>
        <?else:?>
            <a href="/Login" style="border: 1px solid; padding: 10px 25px; margin: auto 0; vertical-align: center ">
                    Login
            </a>
        <?endif;?>
    </div>
    <a href="/cart" style="margin-right: 30%; border: 1px solid; padding: 10px 25px;">
    <div >
            Cart
    </div>
    </a>
</div>