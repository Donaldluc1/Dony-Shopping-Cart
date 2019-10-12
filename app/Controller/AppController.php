<?php
namespace App\Controller;

use App\Connection;
use App\Table\CartTable;
use Core\Controller\Controller;

class AppController extends Controller{


    protected $template = 'default';
    protected $pdo;
    protected $ip;
    private $cartTable;
    
    public function __construct()
    {
        $this->viewPath = dirname(__DIR__) . '/Views/';

        $this->pdo = Connection::getPDO();
        $this->ip = $_SERVER["REMOTE_ADDR"];
        $this->cartTable = new CartTable($this->pdo);
    }

    public function numProd()
    {
        return $this->cartTable->carCount($this->ip);
    }
}