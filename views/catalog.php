<h2>Каталог</h2>
<?if($allow):?>
<?if(!$new):?>
<a href="/catalog/add/"
   style="padding: 7px;border: 1px solid; margin-bottom: 20px;display: block; width: 80px;">
    Добавить
</a><br>
<?else:?>
    <a href="/catalog/"
       style="padding: 7px;border: 1px solid; margin-bottom: 20px;display: block; width: 80px;">
        Отмена
    </a><br>
<?endif;?>
<?endif;?>
<?if($new):?>
    <?if($_GET['img']):?>
        Имя файла:- <?=$_GET['img']?><br>
        <img src="<?=GALLERY_DIR . 'small/' . $_GET['img']?>" alt=""><br>
    <?else:?>
    <form method="post" action="/catalog/add/img/" enctype="multipart/form-data">

        Изображение <br>
        <input type="file" name="rfile"><br>
        <input type="submit" name="load" value="Загрузить"><br>
    </form>
    <?endif;?>
    <form method="post"action="/catalog/add/new/?img=<?=$_GET['img']?>"enctype="multipart/form-data">
        <input type="hidden" name="img" value="$img">
        <input type="text" name="name" placeholder="Название"><br>
        <textarea name="description" id="" cols="30" rows="10"></textarea><br>
        <input type="number" placeholder="Цена" name="price" value="0"><br>
        <input type="submit" name="addProduct" value="Добавить">

    </form>
<?endif;?>
<? foreach ($catalog as $product): ?>

    <a href="/product/<?=$product['id']?>"  style="display: inline-block;">

        <div style="display: inline-block;border: 1px solid; margin: 5px">
            <form action="/cart/add/<?=$product['id']?>/" method="post">
                <img src="<?= GALLERY_DIR . 'small/' . $product['img']?>" alt="">
                <h4>
                    <?=$product['product_name']?>
                </h4>
                <p>
                    <?=$product['price']?> руб.
                </p>
                <input type="submit" name="buy" value="В корзину">
            </form>
        </div>
    </a>

<?endforeach;?>