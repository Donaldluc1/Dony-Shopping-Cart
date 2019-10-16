<?php
namespace App\Controller\Admin;

use App\HTML\Form;
use App\Model\Admins;
use App\Table\AdminsTable;
use Core\Auth\DBAuth;

class AdminsController extends AppController {
 
    private $adminsTable;

    public function __construct()
    {
        parent::__construct();
        $this->adminsTable = new AdminsTable($this->pdo);
    }

    public function index($data = null)
    {
        $auth = new DBAuth();
        if($auth->logged()){
            header('Location: admin.php?p=admin.products.index');
        }
        $admin = new Admins();
        $fail = null;
        $errors = [];
        if(!is_null($data)){
            if($auth->login($data['name'], $data['password'])){
                header('Location: admin.php?p=admin.products.index');
            }else{
                $fail = "Identifiants Incorrectes";
            }
            
        }

        $form = new Form($admin, $errors);
        $formName = $form->input("name", "Username");
        $formPass = $form->input("password", "User Password");
        $this->render("admin.auth.login", compact('formName', 'formPass', 'fail'));

    }

    public function logout()
    {
        $this->render('admin.auth.logout');
    }

}