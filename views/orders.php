<?//var_dump($orders)?>
<?foreach ($orders as $order):?>
<div>

    <h3 style="display: inline-block">
        <?=$order['id_order']?>
    </h3>
    : -
    <p style="display: inline-block">
        <a href="/showOrder/<?=$order['id_order']?>">
            <?=$order['telefon']?>
        </a>
    </p>
<!--    --><?//var_dump($order['id_order'])?>
</div>
<?endforeach;?>
