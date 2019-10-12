<?php
namespace App\Table;

use App\Model\Brand;
use App\PaginatedQuery;

final class BrandTable extends Table{

    protected $table = "brands";
    protected $class = Brand::class;


    public function updateBrand(Brand $brand): void
    {
        $this->update([
            'bid' => $brand->getBid(),
            'brand_name' => $brand->getBrand_name(),
            'status' => $brand->getStatus()
        ], $brand->getBid(), $brand->getBid());
    }

    public function createBrand(Brand $brand): void
    {
        $id = $this->create([
            'bid' => $brand->getBid(),
            'brand_name' => $brand->getBrand_name(),
            'status' => $brand->getStatus()
        ], $brand->getBid(), $brand->getBid());
        $brand->setBid($id);
    }

    public function findPaginated()
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY bid DESC",
            "SELECT COUNT(bid) FROM {$this->table}",
            $this->pdo
        );
        $brand = $paginatedQuery->getItems(Brand::class);

        return [$brand, $paginatedQuery];
    }
}