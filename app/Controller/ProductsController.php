<?php
namespace App\Controller;

use App\Model\Cart;
use App\Model\Product;
use App\ObjectHelper;
use App\Table\BrandTable;
use App\Table\CartTable;
use App\Table\CategoryTable;
use App\Table\ProductTable;

class ProductsController extends AppController {
 
    private $categorieTabbe;
    private $brandsTable;
    private $productsTable;
    private $cartTable;

    public function __construct()
    {
        parent::__construct();
        $this->categorieTabbe = new CategoryTable($this->pdo);
        $this->brandsTable = new BrandTable($this->pdo);
        $this->productsTable = new ProductTable($this->pdo);
        $this->cartTable = new CartTable($this->pdo);

    }

    public function index()
    {
        $categories = $this->categorieTabbe->queryAndFetchAll("SELECT * FROM categories");
        $brands = $this->brandsTable->queryAndFetchAll("SELECT * FROM brands");
        $cardcount = $this->numProd();
        $this->render('products.index', compact('brands', 'categories', 'cardcount'));
    }

    public function products($pid = null)
    {
        $echo = [];
        [$products, $pagination] = $this->productsTable->findPaginated();
        $ip_add = $_SERVER["REMOTE_ADDR"];
        if(!is_null($pid)){
            $count = $this->cartTable->cardProductCount($pid,$ip_add);
            if($count > 0){
                $echo[] = "The product have being added to your cart, Please continue shopping";
            }else {
                $product = $this->productsTable->find($pid, "pid");
                $cart = new Cart();
                $cart->setPid($pid);
                $cart->setIpadd($ip_add);
                $cart->setUserid(0);
                $cart->setProductTitle($product->getProduct_name());
                $img = str_replace('/img/', '', $product->getProduct_img());
                $cart->setProductimage($img);
                $cart->setPrice($product->getProduct_price());
                $cart->setQty(1);
                $cart->setTotalamt($product->getProduct_price() * $cart->getQty());
                $this->cartTable->createCart($cart);
                $echo[] = "The product have being added to your cart, Please continue shopping";
            }
        }
        $cardcount = $this->numProd();
        $this->render('products.products', compact('products', 'pagination', 'echo', 'cardcount'));
    }

    public function brands($id)
    {
        [$brandsId, $pagination] = $this->productsTable->findPaginated(" WHERE bid = '$id' ");
        $categories = $this->categorieTabbe->queryAndFetchAll("SELECT * FROM categories");
        $brands = $this->brandsTable->queryAndFetchAll("SELECT * FROM brands");
        $cardcount = $this->numProd();
        $this->render('products.brand', compact('brandsId', 'pagination', 'categories', 'brands', 'cardcount'));
    }

    public function categories($id)
    {
        [$categoriesId, $pagination] = $this->productsTable->findPaginated(" WHERE cid = '$id' ");
        $categories = $this->categorieTabbe->queryAndFetchAll("SELECT * FROM categories");
        $brands = $this->brandsTable->queryAndFetchAll("SELECT * FROM brands");
        $cardcount = $this->numProd();
        $this->render('products.category', compact('categoriesId', 'pagination', 'categories', 'brands', 'cardcount'));
    }

    public function show($id, $tid)
    {
        $product = $this->productsTable->find($id, $tid);
        $cardcount = $this->numProd();
        $this->render('products.product', compact('product', 'cardcount'));
    }
}