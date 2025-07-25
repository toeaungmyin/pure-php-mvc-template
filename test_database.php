<?php
/**
 * Database Test Script
 * This script tests the database connection and basic functionality
 */

require_once 'config/config.php';
require_once 'app/core/Database.php';

echo "=== Database Connection Test ===\n";
echo "Database Type: " . DB_TYPE . "\n\n";

try {
    // Test database connection
    $db = new Database();
    echo "✓ Database connection successful\n";
    
    // Test basic query
    $stmt = $db->query("SELECT COUNT(*) as count FROM users");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "✓ Query execution successful\n";
    echo "✓ Found {$result['count']} users in database\n";
    
    // Test database type detection
    $dbType = $db->getDatabaseType();
    echo "✓ Database type detected: {$dbType}\n";
    
    // Test configuration retrieval
    $config = $db->getConfig();
    echo "✓ Database configuration retrieved\n";
    
    // Test PDO connection
    $pdo = $db->getConnection();
    echo "✓ PDO connection accessible\n";
    
    echo "\n=== All Tests Passed ===\n";
    echo "Your database is working correctly!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "\nPlease check your database configuration and ensure the database is set up.\n";
    echo "Run 'php setup_database.php' to initialize the database.\n";
    exit(1);
} 