<?php
namespace App\Table;

use App\Model\Cart;

class CartTable extends Table{

    protected $table = "cart";
    protected $class = Cart::class;

    public function createCart(Cart $cart): void
    {
        $id = $this->create([
            'p_id' => $cart->getP_id(),
            'ip_add' => $cart->getIp_add(),
            'user_id' => $cart->getUser_id(),
            'product_title' => $cart->getProduct_title(),
            'product_image' => $cart->getProduct_image(),
            'qty' => $cart->getQty(),
            'price' => $cart->getPrice(),
            'total_amt' => $cart->getTotal_amt(),
        ]);
        $cart->setId($id);
    }

    public function updateCart($qty, $id, $price): void
    {
        $this->update([
            'qty' => $qty,
            'total_amt' => $qty * $price
        ], $id, 'id');
    }

}