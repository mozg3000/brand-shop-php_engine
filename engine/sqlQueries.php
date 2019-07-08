<?php
function getPicture($id){
    $id = (int)$id;
    //var_dump($name);
    $sql = "SELECT * FROM pictures WHERE id = {$id}";
    $pics = getAssocResult($sql);
//    var_dump($pics);
    //В случае если новости нет, вернем пустое значение
    $result = [];
    if(isset($pics[0])){

        $result = $pics[0];
//        var_dump($result["show_number"]);
        $shownumber= $result["show_number"]+1;
        //$name = $result['name'];
        $sql_increase_show_number = "update pictures set show_number = {$shownumber}  WHERE id = {$id}";
//        $sql_increase_show_number = "UPDATE `pictures` SET `show_number`= {$shownumber} WHERE pictures.name = '{$name}' AND pictures.type = 'small';";
//        var_dump($sql_increase_show_number);

        if(increaseShowNumber($sql_increase_show_number)){

            $result["show_number"] += 1;
        }
    }

    return $result;
}
function getPictures()
{
    $sql = "SELECT * FROM `pictures` order by show_number desc";
    $pics = getAssocResult($sql);
    // var_dump($news);
    return $pics;
}
