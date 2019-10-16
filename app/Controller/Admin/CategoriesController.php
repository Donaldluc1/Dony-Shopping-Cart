<?php
namespace App\Controller\Admin;

use App\Model\Categories;
use App\Table\CategoryTable;

class CategoriesController extends AppController {
 

    private $categorieTabbe;

    public function __construct()
    {
        parent::__construct();
        $this->categorieTabbe = new CategoryTable($this->pdo);
    }

    public function index()
    {
        [$categories, $pagination] = $this->categorieTabbe->findPaginated();
        $this->render('admin.categories.index', compact('categories', 'pagination'));
    }

    public function create()
    {
        $categories = $this->categorieTabbe->queryAndFetchAll("SELECT * FROM categories");
        $msg = "Create a new Category";
        $this->render('admin.categories.edit', compact('msg', 'categories'));
    }

    public function add($data)
    {
        $category = new Categories();
        $category->setCategory_name($data['category_name']);
        $category->setParent_cat($data['parentCat']);
        $category->setStatus(1);
        $this->categorieTabbe->createCategory($category);
        $msg = "Category was recored successfully !!!";
        [$categories, $pagination] = $this->categorieTabbe->findPaginated();
        $this->render('admin.categories.index', compact('msg', 'category', 'categories', 'pagination'));

    }

    public function edit($id)
    {
        $category = $this->categorieTabbe->find($id, 'cid');
        $msg = "Update Your Category";
        $categories = $this->categorieTabbe->queryAndFetchAll("SELECT * FROM categories");
        $this->render('admin.categories.edit', compact('msg', 'category', 'categories'));
    }

    public function update(array $data)
    {
        $id = $data['cid'];
        $category = new Categories();
        $category->setParent_cat($data['parentCat']);
        $category->setCategory_name($data['category_name']);
        $category->setStatus(1);
        $this->categorieTabbe->updateCategory($category, $id);
        $msg = "Your Category have beeing updated !!!";
        [$categories, $pagination] = $this->categorieTabbe->findPaginated();
        $this->render('admin.categories.index', compact('msg', 'categories', 'pagination'));
    }

    public function delete($id)
    {
        $this->categorieTabbe->delete($id, "cid");
        $msg = "Your Category have been deleted successfully";
        [$categories, $pagination] = $this->categorieTabbe->findPaginated();
        $this->render('admin.categories.index', compact('msg', 'categories', 'pagination'));
    }
}