
<h2>Корзина</h2>
<?//var_dump($id_session)?>
<? foreach ($products as $product): ?>


        <!--        <div style="display: inline-block;border: 1px solid; margin: 5px">-->
    <!--            <form action="/cart/add/--><?//=$product['id']?><!--/" method="post">-->

    <div style="display: block; width= 100%;height: auto">
        <a href="/product/<?=$product['id']?>"  >
            <img src="<?= GALLERY_DIR . 'small/' . $product['img']?>" alt=""
                    style="display: inline-block;" width="100px">
                <div style="display: inline-block;margin: 0 20px;">
                    <h4 style="display: inline-block;margin: 0 auto; vertical-align: center">
                        <?=$product['product_name']?>
                    </h4>
        </a>
                    <p>
                        <?=$product['description']?>
                    </p>
                </div>
<!--            </form>-->
                <div style="display: inline-block;margin: 0 20px;">
                    Количество <span id="quantity"><?=$product['quantity']?></span>
                </div>
                <div style="display: inline-block;margin: 0 20px;">
                    Цена <?=$product['price']?>
                </div>
                <div style="display: inline-block;margin: 0 20px;">
                    Цена всего <?=$product['total']?>
                </div>
                <div style="display: inline-block;margin: 0 20px;">
<!--                    </cart/delete/--><?//=$product['id']?>
                    <button
                        id="delete_item" data-id="<?=$product['id']?>">
                        [X]
                    </button>
                </div>

    </div>

<?endforeach;?>
<div>
    <h3>
        Общая стоимость: <?=array_reduce($products,function ($carry, $item)
        {
            $carry += (int) $item['total'];
//            var_dump($item);
            return $carry;
        })?>
    </h3>
</div>
<div>
    <a href="/order" style="margin-left: 0%; border: 1px solid; padding: 10px 25px;">
        Оформить
    </a>
</div>
<script>
    <?include "../public/js/cart.js"?>
</script>