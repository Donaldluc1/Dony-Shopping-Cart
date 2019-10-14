<?php
namespace App\Controller\Admin;

use App\Model\Product;
use App\Table\BrandTable;
use App\Table\CategoryTable;
use App\Table\ProductTable;

class ProductsController extends AppController {
 

    private $categorieTabbe;
    private $brandsTable;
    private $productsTable;

    public function __construct()
    {
        parent::__construct();
        $this->categorieTabbe = new CategoryTable($this->pdo);
        $this->brandsTable = new BrandTable($this->pdo);
        $this->productsTable = new ProductTable($this->pdo);
    }

    public function index()
    {
        [$products, $pagination] = $this->productsTable->findPaginatedProductsForAdmin();
        $this->render('admin.products.index', compact('products', 'pagination'));
    }

    public function create()
    {
        $categories = $this->categorieTabbe->queryAndFetchAll("SELECT * FROM categories");
        $brands = $this->brandsTable->queryAndFetchAll("SELECT * FROM brands");
        $msg = "Créer votre produit";
        $this->render('admin.products.edit', compact('msg', 'categories', 'brands'));
    }

    public function add($data, $file)
    {
        $product = new Product();
        $product->setAdded_date($data['added_date']);
        $product->setBid($data['select_brand']);
        $product->setCid($data['select_cat']);
        $product->setProduct_name($data['product_name']);
        $product->setProduct_price($data['product_price']);
        $product->setProduct_stock($data['product_qty']);
        $product->setProduct_img($file);
        $product->setP_status(1);
        $product->setProduct_key($data['product_key']);
        $this->productsTable->createProduct($product);
        $msg = "Product was encored successfully !!!";
        $this->render('admin.products.edit', compact('msg'));

    }

    public function edit($id)
    {
       $product = $this->productsTable->queryAndFetchAll("SELECT * FROM products WHERE pid = $id");
       $bid = $product[0]->getBid();
       $cid = $product[0]->getCid();
       $category = $this->categorieTabbe->find($cid, "cid");
       $catname = $category->getCategory_name(); 
       $brand = $this->brandsTable->find($bid, "bid");
       $brandname = $brand->getBrand_name();
       $categories = $this->categorieTabbe->queryAndFetchAll("SELECT * FROM categories");
       $brands = $this->brandsTable->queryAndFetchAll("SELECT * FROM brands");
       $this->render('admin.products.edit', compact('product', 'brandname', 'catname', 'categories', 'brands'));
    }

    public function update(array $data, $image, $pid)
    {
        $product = new Product();
        $product->setCid($data['select_cat']);
        $product->setBid($data['select_brand']);
        $product->setProduct_name($data['product_name']);
        $product->setProduct_price($data['product_price']);
        $product->setProduct_stock($data['product_qty']);
        $product->setAdded_date($data['added_date']);
        $product->setProduct_img($image);
        $product->setP_status(1);
        $product->setProduct_key($data['product_key']);
        $this->productsTable->updateProduct($product, $pid);
        $sms = "Your Product have beeing updated successfully !!";
        [$products, $pagination] = $this->productsTable->findPaginatedProductsForAdmin();
        $this->render('admin.products.index', compact('sms', 'products', 'pagination'));

    }

    public function delete($id)
    {
        $this->productsTable->delete($id, 'pid');
        $deleted = "Your product was deleted successfully";
        [$products, $pagination] = $this->productsTable->findPaginatedProductsForAdmin();
        $this->render('admin.products.index', compact('products', 'pagination', 'deleted'));

    }
}