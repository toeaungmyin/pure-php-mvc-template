<?php

class Database
{
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $port;
    private $dbh;
    private $stmt;
    private $error;
    private $config;

    public function __construct()
    {
        // Get database configuration
        $this->config = require ROOT . '/config/database.php';
        
        $this->connect();
    }

    private function connect()
    {
        try {
            $dsn = $this->buildDSN();
            $this->dbh = new PDO($dsn, $this->getUsername(), $this->getPassword(), $this->config['options']);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo "Database Connection Error: " . $this->error;
        }
    }

    private function buildDSN()
    {
        switch ($this->config['type']) {
            case 'mysql':
                return "mysql:host={$this->config['host']};port={$this->config['port']};dbname={$this->config['database']};charset={$this->config['charset']}";
                
            case 'pgsql':
                return "pgsql:host={$this->config['host']};port={$this->config['port']};dbname={$this->config['database']}";
                
            case 'sqlite':
                return "sqlite:{$this->config['path']}";
                
            default:
                throw new Exception("Unsupported database type: {$this->config['type']}");
        }
    }

    private function getUsername()
    {
        return $this->config['type'] === 'sqlite' ? null : $this->config['username'];
    }

    private function getPassword()
    {
        return $this->config['type'] === 'sqlite' ? null : $this->config['password'];
    }

    // Prepare statement with query
    public function query($query, $params = [])
    {
        $this->stmt = $this->dbh->prepare($query);
        $this->execute($params);
        return $this->stmt;
    }

    // Prepare statement
    public function prepare($query)
    {
        $this->stmt = $this->dbh->prepare($query);
        return $this->stmt;
    }

    // Execute the prepared statement
    public function execute($params = [])
    {
        return $this->stmt->execute($params);
    }

    // Get result set as array of objects
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    // Get last insert ID
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    // Get PDO connection
    public function getConnection()
    {
        return $this->dbh;
    }

    // Get database type
    public function getDatabaseType()
    {
        return $this->config['type'];
    }

    // Get database configuration
    public function getConfig()
    {
        return $this->config;
    }
} 