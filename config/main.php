<?php
//Файл констант
define("TEMLATES_DIR", '../views/');
define("LAYOUTS_DIR", 'layout/');
define("GALLERY_DIR", '/img/gallery_img/');
define(IMGS_DIR, "img/gallery_img/");

/* DB config */
define('HOST', 'engino');
define('USER', 'root');
define('PASS', '');
define('DB', 'enginodb');


//Тут же подключим основные функции нашего приложения, пока это render
//Можете кстати подключить и в главном index.php если такая вложенность напрягает
include_once "../engine/resize.php";
include_once "../engine/upload.php";
include_once "../engine/functions.php";
include_once "../engine/log.php";
include_once "../engine/db.php";
include_once "../engine/sqlQueries.php";
include_once "../engine/catalog.php";
include_once "../engine/cart.php";
include_once "../engine/auth.php";
include_once "../engine/orders.php";

