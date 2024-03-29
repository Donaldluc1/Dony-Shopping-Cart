<?php
namespace App\Table;

use App\Model\Product;
use App\PaginatedQuery;

final class ProductTable extends Table{

    protected $table = "products";
    protected $class = Product::class;


    public function updateProduct(Product $product, $pid): void
    {
        $this->update([
            'cid' => $product->getCid(),
            'bid' => $product->getBid(),
            'product_name' => $product->getProduct_name(),
            'product_price' => $product->getProduct_price(),
            'product_stock' => $product->getProduct_stock(),
            'added_date' => $product->getAdded_date()->format('Y-m-d H:i:s'),
            'product_img' => $product->getProduct_img(),
            'p_status' => $product->getP_status(),
            'product_key' =>$product->getProduct_key()
        ], $pid, "pid");
    }

    public function createProduct(Product $product): void
    {
        $id = $this->create([
            'cid' => $product->getCid(),
            'bid' => $product->getBid(),
            'product_name' => $product->getProduct_name(),
            'product_price' => $product->getProduct_price(),
            'product_stock' => $product->getProduct_stock(),
            'added_date' => $product->getAdded_date()->format('Y-m-d H:i:s'),
            'product_img' => $product->getProduct_img(),
            'p_status' => $product->getP_status(),
            'product_key' =>$product->getProduct_key()
        ]);
        $product->setPid($id);
    }

    public function findPaginated(?string $where = null)
    {
        $sql = "SELECT * FROM {$this->table}";
        if($where){
            $sql = $sql . ' ' .  $where;
        }
        $paginatedQuery = new PaginatedQuery(
            $sql . " ORDER BY added_date DESC",
            "SELECT COUNT(pid) FROM {$this->table}",
            $this->pdo
        );
        $products = $paginatedQuery->getItems(Product::class);

        return [$products, $paginatedQuery];
    }

    public function findPaginatedProductsForAdmin()
    {
        $sql = "
            SELECT `pid`,p.`product_name`,c.`cid`,c.`category_name`,b.`brand_name`,p.`product_price`,
            p.`product_stock`,p.`product_key`,
            p.`added_date`,p.`p_status`,p.`product_img` 
            FROM `products` p, `brands` b, `categories` c 
            WHERE p.`bid` = b.`bid` 
            AND p.`cid` = c.`cid`
        ";
        $paginatedQuery = new PaginatedQuery(
            $sql . " ORDER BY added_date DESC",
            "SELECT COUNT(pid) FROM {$this->table}",
            $this->pdo
        );
        $products = $paginatedQuery->getProducts();

        return [$products, $paginatedQuery];
    }

}