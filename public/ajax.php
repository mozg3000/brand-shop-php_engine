<?php

if($_GET['showOrder']){

    $orders=showOrder($id);

    echo json_encode($orders, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}