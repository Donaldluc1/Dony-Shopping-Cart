<?php
namespace Core\Auth;

use App\Connection;
use App\Model\Admins;

class DBAuth{
    
    private $db;

    public function __construct()
    {
        $this->db = new Connection();
    }

    public function getAdminId()
    {
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * login
     *
     * @param  string $name
     * @param  string $password
     *
     * @return boolean
     */
    public function login($name, $password)
    {
        $query = $this->db->getPDO()->prepare('SELECT * FROM admins WHERE name = :name');
         $query->execute(['name' => $name]);
         $query->setFetchMode(\PDO::FETCH_CLASS, Admins::class);
         $admin = $query->fetch();
         if($admin){
            if($admin->getPassword() === sha1($password)){
                session_start();
                $_SESSION['auth'] = $admin->getPassword();
                return true;
            }
         }
         return false;
    }

    public function logged()
    {
        if(session_status() === PHP_SESSION_ACTIVE){
            return isset($_SESSION['auth']);
        }
        session_start();
         return isset($_SESSION['auth']);
    }
}