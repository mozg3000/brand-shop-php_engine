
<h2>Заказ № <?=$id?></h2>
<?//var_dump($products)?>
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
        Количество <?=$product['quantity']?>
    </div>
    <div style="display: inline-block;margin: 0 20px;">
        Цена <?=$product['price']?>
    </div>
    <div style="display: inline-block;margin: 0 20px;">
        Цена всего <?=$product['total']?>
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
<div style="display: inline-block;margin: 0 20px;">

    <select id="status">
        <option value="Принят" <?if($product['status'] =='Принят')echo "selected"?> data-orderID="<?=$id?>">
            Принят
        </option>
        <option value="Передан в обработку" <?if($product['status'] =='Передан в обработку')echo "selected"?> data-orderID="<?=$id?>">
            Передан в обработку
        </option>
    </select>

</div>

<script>

    <?include "../public/js/showOrder.js";?>
</script>