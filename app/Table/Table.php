<?php
namespace App\Table;

use App\Table\Exception\NotFoundException;
use \PDO;

abstract class Table{

    protected $pdo;
    protected $table = null;
    protected $class = null;

    public function __construct(PDO $pdo)
    {
        if ($this->table === null) {
            throw new \Exception("La classe " . get_class($this) . " n'a pas de propriété \$table");
        }
        if ($this->class === null) {
            throw new \Exception("La classe " . get_class($this) . " n'a pas de propriété \$class");
        }
        $this->pdo = $pdo;
    }

    /**
     * find
     *
     * @param  int $id
     *
     * @return void
     */
    public function find(int $id, $tid)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $tid . ' = :id');
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === false) {
            throw new NotFoundException($this->table, $id);
        }
        return $result;
    }

    public function exists(string $field, $values,int $id, ?int $except = null): bool
    {
        $sql = "SELECT COUNT($id) FROM {$this->table} WHERE $field = ?";
        $params = [$values];
        if ($except !== null) {
            $sql .= " AND id != ?";
            $params[] = $except;
        }
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        return (int)$query->fetch(PDO::FETCH_NUM)[0] > 0;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql, PDO::FETCH_CLASS, $this->class)->fetchAll();
    }

    public function delete($id, int $tid)
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE {$tid} = ?");
        $ok = $query->execute([$id]);
        if ($ok === false) {
            throw new \Exception("Impossible de supprimer $id dans la table {$this->table}");
        }
    }

    public function create(array $data): int
    {
        $sqlFields = [];
        foreach($data as $key => $values){
            $sqlFields[] = "$key = :$key";
        }
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET " . implode(', ', $sqlFields));
        $ok = $query->execute($data);
        if($ok === false){
            throw new \Exception("Impossible de créer l'enregistrement dans la table {$this->table}");
        }
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $data, int $id, int $tid)
    {
        $sqlFields = [];
        foreach($data as $key => $values){
            $sqlFields[] = "$key = :$key";
        }
        $query = $this->pdo->prepare("UPDATE {$this->table} SET " . implode(', ', $sqlFields) . " WHERE {$tid} = :id");
        $ok = $query->execute(array_merge($data, ['id' => $id]));
        if($ok === false){
            throw new \Exception("Impossible de modifier l'enregistrement de la table {$this->table}");
        }
    }

    public function queryAndFetchAll(string $sql): array
    {
        return $this->pdo->query($sql, PDO::FETCH_CLASS, $this->class)->fetchAll();
    }

    public function cardProductCount($pid, $ip): int
    {
        $sql = "SELECT * FROM {$this->table} WHERE p_id = :pid AND ip_add = :ip";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'pid' => $pid,
            'ip' => $ip
        ]);
         return $query->rowCount();
    }

    public function carCount($ip)
    {
        $sql = "SELECT * FROM {$this->table} WHERE ip_add = :ip";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'ip' => $ip
        ]);
          return $query->rowCount();
    }
}