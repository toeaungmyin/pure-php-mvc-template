<?php

$dbType = DB_TYPE;

switch ($dbType) {
    case 'mysql':
        return [
            'type' => 'mysql',
            'host' => DB_HOST,
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASS,
            'port' => DB_PORT,
            'charset' => 'utf8mb4',
            'options' => [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ]
        ];
        
    case 'pgsql':
        return [
            'type' => 'pgsql',
            'host' => PGSQL_HOST,
            'database' => PGSQL_NAME,
            'username' => PGSQL_USER,
            'password' => PGSQL_PASS,
            'port' => PGSQL_PORT,
            'charset' => 'utf8',
            'options' => [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        ];
        
    case 'sqlite':
        return [
            'type' => 'sqlite',
            'path' => SQLITE_PATH,
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        ];
        
    default:
        throw new Exception("Unsupported database type: {$dbType}");
} 