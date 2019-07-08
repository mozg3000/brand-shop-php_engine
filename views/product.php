
<?= var_dump($edit,$new_img,$allow);?>
<div>
    <?if($allow):?>
    <?if(!$edit):?>
    <a href="/product/edit/<?=$id?>" id="edit">
        Редактировать
    </a>
    <?else:?>
    <a href="#" id="cancel" style="display: block">
        Отмена
    </a>
    <?endif;?>
    <br>
    <?endif;?>
    <?if(!$new_img):?>
        <img src="<?= GALLERY_DIR . 'big/' . $img?>" alt="" style="width: 350px"><br>
    <?else:?>
        <img src="<?= GALLERY_DIR . 'big/' . $new_img?>" alt="" style="width: 350px"><br>
    <?endif;?>
    <?if($allow):?>
    <?if($edit):?>
    <form method="post" action="/product/edit/img/<?=$id?>" enctype="multipart/form-data"
            name="img_download" style="display: block">

        Изображение <br>
        <input type="file" name="rfile"><br>
        <input type="submit" name="load" value="Загрузить"><br>
    </form>
    <?endif;?>
    <br>
    <?endif;?>
    <form name="product" action="/product/edited/--><?=$id?>" method="post">
        <input type="text" name="name" value="<?=$product_name?>" <?if(!$edit)echo readonly?>>
        <br>
        <input type="text" name="price" value="<?=$price?>" <?if(!$edit)echo readonly?>>
        <br>
        <textarea name="description" cols="30" rows="10" <?if(!$edit)echo readonly?>>
            <?=$description?>
        </textarea><br>
        <?if($allow):?>
        <?if($edit):?>
            <input type="submit" name="edit" value="Изменить" style="display: none">
        <?endif;?>
        <?endif;?>
        </form>

</div>
<p>
    Добавте свой отзыв
</p>
<form action="/product/add" method="post">
    <input type="hidden" value="<?=$id?>" name="id">
    <input type="text" placeholder="Ваше имя" name="name"><br>
    <textarea name="feedback" id="feedback1" cols="30" rows="10" placeholder="Ваш отзыв">
    </textarea><br>
    <input type="submit" value="Отправить">
</form>
<h3>
    Отзывы
</h3>
<hr>
<?//=var_dump($feedback);die();?>
<?foreach ($feedback as $feed):?>
<h3>
    <?=$feed['sender']?>
</h3>
<p>
    <?=$feed['message']?>
</p>
    <hr>
<?endforeach;?>
<script>
    <?include "../public/js/product.js";?>
</script>
<!---->
<!--<div>-->
<!--    --><?//if(!$edit):?>
<!--        <p>-->
<!--            <a href="/product/edit/--><?//=$id?><!--">-->
<!--                Редактировать-->
<!--            </a>-->
<!--        </p>-->
<!--    --><?//else:?>
<!--        <p>-->
<!--            <a href="/product/--><?//=$id?><!--">-->
<!--                Отмена-->
<!--            </a>-->
<!--        </p>-->
<!--    --><?//endif;?>
<!--    <img src="--><?//= GALLERY_DIR . 'big/' . $img?><!--" alt="" style="width: 350px"><br>-->
<!--    <!--    -->--><?////= var_dump($_GET['img'],'tut');?>
<!--    --><?//if($edit):?>
<!--        --><?//if($_GET["new_img"]):?>
<!--            Имя файла:- --><?//=$img?><!--<br>-->
<!--            <img src="--><?//=GALLERY_DIR . 'small/' . $_GET["new_img"]?><!--" alt=""><br>-->
<!--        --><?//else:?>
<!--            <!--            -->--><?////= var_dump($_GET['img'],'zdes');?>
<!--            <form method="post" action="/product/edit/img/--><?//=$id?><!--" enctype="multipart/form-data">-->
<!---->
<!--                Изображение <br>-->
<!--                <input type="file" name="rfile"><br>-->
<!--                <input type="submit" name="load" value="Загрузить"><br>-->
<!--            </form>-->
<!--        --><?//endif;?>
<!--    --><?//endif;?>
<!--    <form action="/product/edited/--><?//=$id?><!--" method="post">-->
<!--        <input type="text" name="name" value="--><?//=$product_name?><!--" --><?//if(!$edit){echo "readonly";}?><!-->-->
<!--        <br>-->
<!--        <input type="text" name="price" value="--><?//=$price?><!--" --><?//if(!$edit){echo "readonly";}?><!-->-->
<!--        <br>-->
<!--        <textarea name="description" cols="30" rows="10" --><?//if(!$edit){echo "readonly";}?><!-->-->
<!--        --><?//=$description?>
<!--    </textarea><br>-->
<!--        --><?//if($edit):?>
<!--            <input type="submit" name="edit" value="Изменить">-->
<!--        --><?//endif;?>
<!--    </form>-->
<!--    <!--    -->--><?////=$id?>
<!--</div>-->
