<?php
function uploadFile($iname, $path)
{
    $flag = true;
//Проверка существует ли файл
    if (file_exists($path)) {
        echo "Файл $path существует, выберите другое имя файла!";
        $flage = false;
        exit;
    }

//Проверка на размер файла
    if ($_FILES[$iname]["size"] > 1024 * 1 * 1024) {
        echo("Размер файла не больше 5 мб");
        $flage = false;
        exit;
    }
//Проверка расширения файла
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES[$iname]['name'])) {
            echo "Загрузка php-файлов запрещена!";
            $flage = false;
            exit;
        }
    }
//Проверка на тип файла
//var_dump($_FILES[$iname]['tmp_name']);
//    $imageinfo = getimagesize($_FILES[$iname]['tmp_name']);
//    var_dump($imageinfo['mime'],$imageinfo['mime'] != 'image/jpeg');
//    if ($imageinfo['mime'] != 'image/gif' || $imageinfo['mime'] != 'image/jpeg') {
//        echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
//        $flage = false;
//        exit;
//    }

    if ($_FILES[$iname]['type'] != "image/jpeg") {
        echo "Можно загружать только jpg-файлы.";
        $flage = false;
        exit;
    }

    if($flag){
        if (move_uploaded_file($_FILES[$iname]['tmp_name'], $path)) {
           // echo "ФАйл загружен<br/>";
        } else {

            echo "Error <br/>";
        }
    }
}


