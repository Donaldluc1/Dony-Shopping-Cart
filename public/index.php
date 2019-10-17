<?php

use App\Controller\Admin\AdminsController;
use App\Controller\CartController;
use App\Controller\ProductsController;
use Core\Auth\DBAuth;

require '../vendor/autoload.php';

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = htmlentities($_GET['id']);
}
if(isset($_GET['pid']) && !empty($_GET['pid'])){
    $pid = htmlentities($_GET['pid']);
}
if(isset($_GET['add']) && !empty($_GET['add'])){
    $add = htmlentities($_GET['add']);
}
if(isset($_POST['upd']) && !empty($_POST['upd'])){
    $upid = htmlentities($_POST['upd']);
    $qty = htmlentities($_POST['qty']);
    $price = htmlentities($_POST['price']);
    
}
if(isset($_POST['delete']) && !empty($_POST['delete'])){
    $delete = htmlentities($_POST['delete']);
}
if(isset($_POST['login']) && $_POST['login'] === '1'){
    $login = $_POST;
}
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $controller = new ProductsController();
    $controller->search($search);
    exit();
}
/*
header('HTTP/1.0 404 Not Found');
die('Page Introuvable'); */
//Auth



ob_start();
if($p === 'home'){
    $controller = new ProductsController();
    $controller->index();
}elseif ($p === 'products') {
    $controller = new ProductsController();
    if(isset($add) && !is_null($add)){
        $controller->products($add);
    }else {
        $controller->products();
    }
}elseif ($p === 'brand') {
    if(isset($add) && !is_null($add)){
        $controller = new ProductsController();
        $controller->products($add);
    }else{
    $controller = new ProductsController();
    $controller->brands($id);
    }
}elseif ($p === 'category') {
    if(isset($add) && !is_null($add)){
        $controller = new ProductsController();
        $controller->products($add);
    }else{
    $controller = new ProductsController();
    $controller->categories($id);
    }
}elseif ($p === 'product') {
    $controller = new ProductsController();
    $controller->show($pid, "pid");
}elseif ($p === 'card') {
    $controller = new CartController();
    if(isset($upid) && !is_null($upid)){
        $controller->update($upid, $qty, $price);
    }elseif(isset($delete) && !is_null($delete)){
        $controller->delete($delete);
    }else{
        $controller->index();
    }
}else{

    $auth = new DBAuth();
    if($p === 'login' || !$auth->logged()){
        header('HTTP/1.0 403 Forbiden');
        $controller = new AdminsController();
        if(isset($login)){
            $controller->index($login);
        }else{
            $controller->index();
        }
    }


}
