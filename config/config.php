<?php

// Define root path
define('ROOT', dirname(__DIR__));

// Define app paths
define('APP', ROOT . '/app');
define('CORE', APP . '/core');
define('CONTROLLERS', APP . '/controllers');
define('MODELS', APP . '/models');
define('VIEWS', APP . '/views');

// Define public path
define('PUBLIC_PATH', ROOT . '/public');

// Define URL constants
define('BASE_URL', 'http://localhost:8080');

// Database configuration
define('DB_TYPE', 'pgsql'); // Options: 'mysql', 'pgsql', 'sqlite'

// MySQL Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc_db');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_PORT', '3306');

// PostgreSQL Configuration (used when DB_TYPE = 'pgsql')
define('PGSQL_HOST', 'localhost');
define('PGSQL_NAME', 'mvc_db');
define('PGSQL_USER', 'postgres');
define('PGSQL_PASS', 'password');
define('PGSQL_PORT', '5432');

// SQLite Configuration (used when DB_TYPE = 'sqlite')
define('SQLITE_PATH', ROOT . '/database.sqlite'); 