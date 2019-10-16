<?php
namespace App\Table;

use App\Model\Admins;

final class AdminsTable extends Table{

    protected $table = "admins";
    protected $class = Admins::class;

    public function findByUsername($name)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE name = :name");
        $query->execute(['name' => $name]);
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if($result === false){
            throw new \Exception("Cet enregistrement n'existe pas sur cet table");
        }
        return $result;
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
        $admin = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE name = ?", [$name]);
        var_dump($admin);
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }
}