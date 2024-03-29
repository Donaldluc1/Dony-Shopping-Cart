<?php
namespace App\Controller;

use App\Model\Cart;
use App\Table\CartTable;
use App\Table\ProductTable;

class CartController extends AppController{

    private $cartTable;
    private $productsTable;

    public function __construct()
    {
        parent::__construct();
        $this->cartTable = new CartTable($this->pdo); 
        $this->productsTable = new ProductTable($this->pdo);
    }

    public function index()
    {
        $ipAdd = $_SERVER["REMOTE_ADDR"];
        $carts = $this->cartTable->queryAndFetchAll("SELECT * FROM cart WHERE ip_add = '$ipAdd'");
        $cardcount = $this->numProd();
        $this->render('cart.index', compact('carts', 'cardcount'));
    }

    public function update($id, $qty, $price)
    {
        $this->cartTable->updateCart($qty, $id, $price);
        $ipAdd = $_SERVER["REMOTE_ADDR"];
        $carts = $this->cartTable->queryAndFetchAll("SELECT * FROM cart WHERE ip_add = '$ipAdd'");
        $cardcount = $this->numProd();
        $this->render('cart.index', compact('carts', 'cardcount'));
    }

    public function delete($id)
    {
        $this->cartTable->delete($id, 'id');
        return "DELETED";
    }
    
}
