<?php
/**
 * Database Setup Script
 * This script initializes the database based on the configured database type
 */

require_once 'config/config.php';

class DatabaseSetup
{
    private $config;
    private $db;

    public function __construct()
    {
        $this->config = require ROOT . '/config/database.php';
        $this->initDatabase();
    }

    private function initDatabase()
    {
        try {
            // Create database connection
            $dsn = $this->buildDSN();
            $username = $this->getUsername();
            $password = $this->getPassword();
            
            $this->db = new PDO($dsn, $username, $password, $this->config['options']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "Connected to {$this->config['type']} database successfully!\n";
            
            // Create tables
            $this->createTables();
            
            echo "Database setup completed successfully!\n";
            
        } catch (PDOException $e) {
            echo "Database setup failed: " . $e->getMessage() . "\n";
            exit(1);
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
                // Ensure the directory exists
                $dir = dirname($this->config['path']);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }
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

    private function createTables()
    {
        $schemaFile = ROOT . "/database/{$this->config['type']}.sql";
        
        if (!file_exists($schemaFile)) {
            echo "Schema file not found: {$schemaFile}\n";
            return;
        }

        $sql = file_get_contents($schemaFile);
        
        // Split SQL by semicolon and execute each statement
        $statements = array_filter(array_map('trim', explode(';', $sql)));
        
        foreach ($statements as $statement) {
            if (!empty($statement)) {
                try {
                    $this->db->exec($statement);
                    echo "Executed: " . substr($statement, 0, 50) . "...\n";
                } catch (PDOException $e) {
                    // Ignore errors for statements that might already exist
                    if (strpos($e->getMessage(), 'already exists') === false) {
                        echo "Error executing statement: " . $e->getMessage() . "\n";
                    }
                }
            }
        }
    }

    public function testConnection()
    {
        try {
            $stmt = $this->db->query("SELECT COUNT(*) as count FROM users");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "Database test successful! Found {$result['count']} users.\n";
        } catch (PDOException $e) {
            echo "Database test failed: " . $e->getMessage() . "\n";
        }
    }
}

// Run the setup
echo "Starting database setup...\n";
$setup = new DatabaseSetup();
$setup->testConnection();
echo "Setup complete!\n"; 