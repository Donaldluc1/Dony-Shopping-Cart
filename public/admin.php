<?php

use App\Controller\Admin\AdminsController;
use App\Controller\Admin\CategoriesController;
use App\Controller\Admin\ProductsController as AppProductsController;
use CoffeeCode\Uploader\Image;
use Core\Auth\DBAuth;

require '../vendor/autoload.php';

$auth = new DBAuth();
$p = null;
if($auth->logged()){
    if(isset($_GET['p'])){
        $p = $_GET['p'];
    }else{
        $p = 'admin.products.index';
    }
}else{
    header('HTTP/1.0 403 Forbiden');
        header('Location: index.php?p=login');
}



if(isset($_POST['add']) && $_POST['add'] === '1'){
    $image = new Image("img", "images");
     if (!empty($_FILES)) {
    $upload = $image->upload($_FILES['upload'], $_POST['product_name']);
}
    $create = $_POST;
}
if(isset($_GET['cre']) && !empty($_GET['cre'])){
    $cre = htmlentities($_GET['cre']);
}
if(isset($_POST['update']) && $_POST['update'] === '1'){
    $image = new Image("img", "images");
    if (!empty($_FILES)) {
   $photo = $image->upload($_FILES['upload'], $_POST['product_name']);
}
   $update  = $_POST;
}
if(isset($_POST['supp'])){
    $supp = $_POST['supp'];
}
if(isset($_GET['updcat']) && !empty($_GET['updcat'])){
    $updcat = htmlentities($_GET['updcat']);
}
if(isset($_POST['editCat']) && $_POST['editCat'] === '1'){
    $editCat = $_POST;
}
if(isset($_POST['addCat']) && $_POST['addCat'] === '1'){
    $addCat = $_POST;
}
if(isset($_POST['suppcat'])){
    $suppcat = $_POST['suppcat'];
}

if($p === 'logout'){
    $controller = new AdminsController();
    $controller->logout();
}elseif($p === 'admin.products.index'){
    $controller = new AppProductsController();
    if(isset($supp) && !is_null($supp)){
        $controller->delete($supp);
    }else{
        $controller->index();
    }
}elseif($p === 'admin.products.create'){
    $controller = new AppProductsController();
    if(isset($create) && !is_null($create)){
        $controller->add($create, $upload);
    }elseif(isset($update) && !is_null($update)){
        $controller->update($update, $photo, $update['pid']);
    }elseif(isset($cre) && !is_null($cre)){
        $controller->edit($cre);
    }else{
        $controller->create();
    }
}elseif($p === 'admin.categories.index'){
    $controller = new CategoriesController();
    if(isset($suppcat)){
        $controller->delete($suppcat);
    }else{
        $controller->index();
    }
}elseif($p === 'admin.Categories.update'){
    $controller = new CategoriesController();
    if(isset($editCat)){
        $controller->update($editCat);
    }else{
        $controller->edit($updcat);
    }
}elseif($p === 'admin.Categories.create'){
    $controller = new CategoriesController();
    if(isset($addCat)){
        $controller->add($addCat);
    }else{
        $controller->create();
    }
}