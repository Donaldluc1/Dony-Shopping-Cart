<?php
namespace App\Controller\Admin;

use App\Model\Brand;
use App\Table\BrandTable;

class BrandsController extends AppController {
 

    private $brandTable;

    public function __construct()
    {
        parent::__construct();
        $this->brandTable = new BrandTable($this->pdo);
    }

    public function index()
    {
        [$brands, $pagination] = $this->brandTable->findPaginated();
        $this->render('admin.brands.index', compact('brands', 'pagination'));
    }

    public function create()
    {
        $msg = "Create a new Brand";
        $this->render('admin.brands.edit', compact('msg'));
    }

    public function add($data)
    {
        $brand = new Brand();
        $brand->setBrand_name($data['brand_name']);
        $brand->setStatus(1);
        $this->brandTable->createBrand($brand);
        $msg = "Brand was recored successfully !!!";
        [$brands, $pagination] = $this->brandTable->findPaginated();
        $this->render('admin.brands.index', compact('msg', 'brands', 'pagination'));

    }

    public function edit($id)
    {
        $brand = $this->brandTable->find($id, 'bid');
        $msg = "Update Your Brand";
        $this->render('admin.brands.edit', compact('msg', 'brand'));
    }

    public function update(array $data)
    {
        $id = $data['bid'];
        $brand = new Brand();
        $brand->setBrand_name($data['brand_name']);
        $brand->setStatus(1);
        $this->brandTable->updateBrand($brand, $id);
        $msg = "Your Brand have beeing updated !!!";
        [$brands, $pagination] = $this->brandTable->findPaginated();
        $this->render('admin.brands.index', compact('brands', 'pagination', 'msg'));
    }

    public function delete($id)
    {
        $this->brandTable->delete($id, "bid");
        $msg = "Your Brand have been deleted successfully";
        [$brands, $pagination] = $this->brandTable->findPaginated();
        $this->render('admin.brands.index', compact('brands', 'pagination', 'msg'));
    }
}