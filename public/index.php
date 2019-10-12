<?php

use App\Controller\CartController;
use App\Controller\ProductsController;

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
    $controller = new ProductsController();
    $controller->brands($id);
}elseif ($p === 'category') {
    $controller = new ProductsController();
    $controller->categories($id);
}elseif ($p === 'product') {
    $controller = new ProductsController();
    $controller->show($pid, "pid");
}elseif ($p === 'card') {
    $controller = new CartController();
    $controller->index();
}

