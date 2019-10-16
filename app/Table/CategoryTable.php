<?php
namespace App\Table;

use App\Model\Categories;
use App\PaginatedQuery;

final class CategoryTable extends Table{

    protected $table = "categories";
    protected $class = Categories::class;


    public function updateCategory(Categories $categories, $id): void
    {
        $this->update([
            'parent_cat' => $categories->getParent_cat(),
            'category_name' => $categories->getCategory_name(),
            'status' => $categories->getStatus()
        ], $id, "cid");
    }

    public function createCategory(Categories $categories): void
    {
        $id = $this->create([
            'parent_cat' => $categories->getParent_cat(),
            'category_name' => $categories->getCategory_name(),
            'status' => $categories->getStatus()
        ]);
        $categories->setCid($id);
    }

    public function findPaginated()
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY cid DESC",
            "SELECT COUNT(cid) FROM {$this->table}",
            $this->pdo
        );
        $categories = $paginatedQuery->getItems(Categories::class);

        return [$categories, $paginatedQuery];
    }
}