<?php

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected function query($sql, $params = [])
    {
        return $this->db->query($sql, $params);
    }

    protected function find($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->query($sql, ['id' => $id]);
    }

    protected function findAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->query($sql);
    }

    protected function create($data)
    {
        $tableName = $this->getTableName();
        $columns = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        return $this->query($sql, $data);
    }

    protected function update($id, $data)
    {
        $tableName = $this->getTableName();
        $setClause = implode(', ', array_map(function($key) {
            return "{$key} = :{$key}";
        }, array_keys($data)));
        
        $data['id'] = $id;
        $sql = "UPDATE {$tableName} SET {$setClause} WHERE id = :id";
        return $this->query($sql, $data);
    }

    protected function delete($id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->query($sql, ['id' => $id]);
    }

    private function getTableName()
    {
        $className = get_class($this);
        return strtolower(str_replace('Model', '', $className)) . 's';
    }
} 