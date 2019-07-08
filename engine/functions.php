<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page, $action, $id, $category)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $allow=false;
    $user='';
    $params = [];

    if (is_auth()) {
        $allow = true;
        $user = get_user();
    }
    $params["allow"]=$allow;
    $params["user"]=$user;

    switch ($page) {
        case 'index':
            $params["username"] ="Вася";
            break;
        case 'gallery':

            $params["pictures"] = getPictures();

            break;
        case 'picture':

            $content = getPicture($id);
            $params['name'] = $content['name'];
            $params['show_number'] = $content['show_number'];

            break;
        case 'catalog':

            $params["catalog"] = readCatalog();

            if($action == 'add'){

                $params['new'] = true;
                if($category == 'new'){

                    if($_POST['addProduct']){

//                        var_dump($_GET['img']);die();
                        addProduct($_POST['name'],$_POST['description'],$_POST['price'], $_GET['img']);
                        header("Location: /catalog");
                    }
                }
                if($category == 'img'){

                    if(isset($_POST["load"])){

                        $path=IMGS_DIR . "big/" . $_FILES["rfile"][name];
                        uploadFile("rfile", $path);

                        $path2small=IMGS_DIR . "small/" . $_FILES["rfile"][name];
                        create_thumbnail($path, $path2small, 150, 100);
                    }
                    $img = $_FILES["rfile"][name];
                    header("Location: /catalog/add/new/?img=$img");
                }
            }

            break;
        case 'product':
//            var_dump($action);
            if($action=="") {

//                var_dump($action);

                if($id){

                    $params=initProduct($id);
                    $params["allow"]=$allow;
                    $params["user"]=$user;
                }
                var_dump($_GET['edit'],$_GET['new_img']);
//                die();
                if($_GET['edit']){

                    $params["edit"]= true;
                }else{

                    $params["edit"]= false;
                }
                if($_GET['new_img']){

                    $params["new_img"]= $_GET['newimg'];
                }else{

                    $params["new_img"]= false;
                }

            }elseif ($action=='add'){

                $id=$_POST['id'];
                if($_POST['name']!='' && $_POST['feedback'] != ''){

                    $name=$_POST['name'];
                    $feedback=$_POST['feedback'];
                    addfeedback($id,$name,$feedback);
                }else{

                }
                $params=initProduct($id);
                $params["allow"]=$allow;
                $params["user"]=$user;
                header("Location: /product/{$id}");

            }elseif($action == 'edit'){
                $params=initProduct($id);
                $params["allow"]=$allow;
                $params["user"]=$user;
//                var_dump("fdfsd");
                if($category == 'img'){

//                    var_dump("rfile",$_POST['load']);
                    if($_POST['load']){

//                        $path=IMGS_DIR . "big/" . $_FILES["rfile"][name];
//                        uploadFile("rfile", $path);
//
//                        $path2small=IMGS_DIR . "small/" . $_FILES["rfile"][name];
//                        create_thumbnail($path, $path2small, 150, 100);
                        $img = $_FILES["rfile"][name];
                        $id=(int)$id;

//                        var_dump("Location: /product/{$id}/?edit=true&new_img='{$img}'");
                        header("Location: /product/$id/?edit=true&newimg='$img'");
                    }

                }

                if($id){


                    header("Location: /product/{$id}/?edit=true");
                }
            }elseif($action == 'edited'){

//                var_dump($id);die();
                editProduct($id, $_POST['name'],$_POST['description'],$_POST['price']);
                header("Location: /product/{$id}");
            }
            break;
        case 'cart':
            //var_dump($id,$action);
            if($action == 'add'){

                addToCart($id, session_id());
//                var_dump($id);
                header("Location: /catalog");
            }
            if($action == ''){

//                $content = readCart(session_id());
//                $params['products'] = $content;
//                var_dump($content);die();
            }
            if($action == 'delete'){

                deleteFromCart($id, session_id());
            }
            $content = readCart(session_id());
            $params['products'] = $content;
//            header("Location: /cart");
            break;
        case 'api':

            if($action == "showOrder"){


                $orders=showOrder($id);
//                echo '[{"id":5,"product_name":"Товар5","description":"Описание товара5","price":500,"total":1000,"quantity":2,"img":"05.jpg","id_session":"svi46u8iifr4a0v5vki6hapsl637qjom"},{"id":7,"product_name":"Товар7","description":"Описание товара7","price":300,"total":600,"quantity":2,"img":"07.jpg","id_session":"svi46u8iifr4a0v5vki6hapsl637qjom"}]';
//                $params['order'] =
                echo json_encode($orders, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK); die();
            }elseif ($action == 'setOrderStatus'){

                $res = setOrderStatus($id, $_GET['new_status']);
//                var_dump($res);die;
                //echo json_encode($res,JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);die();
            }elseif($action == "deleteFromCart"){

                var_dump($id,session_id());
                $result = deleteFromCart((int)$id,session_id());
//                $result = showOrder(8);
                var_dump($result);
                $r = [["result"=>"$result"]];
                echo json_encode($r,JSON_UNESCAPED_UNICODE);die();
            }
            break;
        case 'order':

//            var_dump($action);die();
            if($action == "proceed"){

                proceedOrder(session_id(), $_POST['telefon']);
                session_regenerate_id(true);
                header("Location: /catalog");
            }

            break;
        case 'showOrder':

            $orders=showOrder($id);
            $params['products']=$orders;
            $params['id'] = $id;
//            header("Location: /order");
            break;
        case 'login':

           //$resonse=auth($_POST['login'], $_POST['pass']);
//           var_dump($resonse);die();
            if($action == "out"){

                session_destroy();

                setcookie("hash", "", -3600, "/");
                //header("Location: /");
            }
            if($_POST['send']){

                logIn($_POST['login'], $_POST['pass'], $_POST['save']);
            }
            //var_dump($user,$allow);die();
           header("Location: /");
            break;
        case 'orders':

            $order_list = ordersList();

            $params['orders'] = $order_list;
//            header("Location: /catalog");

            break;
    }
    return $params;
}


//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{

    return renderTamplate(LAYOUTS_DIR . 'layout', [
        "content" => renderTamplate($page, $params),
        "menu" => renderTamplate("menu", $params)
    ]);
}


//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTamplate($page, $params = [])
{
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }


    $fileName = TEMLATES_DIR . $page . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы не существует, 404");
    }


    return ob_get_clean();
}
