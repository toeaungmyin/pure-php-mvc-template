# Database Setup Guide

This MVC framework now supports MySQL, PostgreSQL, and SQLite databases. Follow the instructions below to set up your preferred database.

## Configuration

### 1. Choose Your Database Type

Edit `config/config.php` and set the `DB_TYPE` constant to your preferred database:

```php
// For MySQL
define('DB_TYPE', 'mysql');

// For PostgreSQL  
define('DB_TYPE', 'pgsql');

// For SQLite
define('DB_TYPE', 'sqlite');
```

### 2. Configure Database Settings

#### MySQL Configuration
```php
// MySQL Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc_db');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_PORT', '3306');
```

#### PostgreSQL Configuration
```php
// PostgreSQL Configuration
define('PGSQL_HOST', 'localhost');
define('PGSQL_NAME', 'mvc_db');
define('PGSQL_USER', 'postgres');
define('PGSQL_PASS', 'password');
define('PGSQL_PORT', '5432');
```

#### SQLite Configuration
```php
// SQLite Configuration
define('SQLITE_PATH', ROOT . '/database.sqlite');
```

## Database Setup

### Option 1: Automatic Setup (Recommended)

Run the setup script to automatically create tables and insert sample data:

```bash
php setup_database.php
```

### Option 2: Manual Setup

#### MySQL Setup
1. Create the database:
```sql
CREATE DATABASE mvc_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Import the schema:
```bash
mysql -u root -p mvc_db < database/mysql.sql
```

#### PostgreSQL Setup
1. Create the database:
```sql
CREATE DATABASE mvc_db;
```

2. Import the schema:
```bash
psql -U postgres -d mvc_db -f database/pgsql.sql
```

#### SQLite Setup
1. The database file will be created automatically when you run the setup script
2. Or manually create it:
```bash
sqlite3 database.sqlite < database/sqlite.sql
```

## Testing the Connection

After setup, you can test the database connection by visiting your application or running:

```bash
php setup_database.php
```

## Database-Specific Features

### MySQL
- Uses `AUTO_INCREMENT` for primary keys
- Supports `utf8mb4` charset for full Unicode support
- Uses `ON UPDATE CURRENT_TIMESTAMP` for automatic timestamp updates

### PostgreSQL
- Uses `SERIAL` for auto-incrementing primary keys
- Implements triggers for automatic `updated_at` timestamp updates
- Uses `ON CONFLICT` for handling duplicate inserts

### SQLite
- Uses `AUTOINCREMENT` for primary keys
- Stores timestamps as `DATETIME`
- File-based database (no server required)

## Switching Between Databases

To switch between database types:

1. Update `DB_TYPE` in `config/config.php`
2. Configure the appropriate database settings
3. Run `php setup_database.php` to initialize the new database
4. Update your application code if you're using database-specific features

## Troubleshooting

### Common Issues

1. **Connection Refused**: Check if your database server is running
2. **Authentication Failed**: Verify username and password
3. **Database Not Found**: Create the database first
4. **Permission Denied**: Check file permissions for SQLite

### Testing Individual Databases

You can test each database type by temporarily changing `DB_TYPE` and running:

```bash
php setup_database.php
```

## Sample Data

All database schemas include sample user data:
- John Doe (john@example.com)
- Jane Smith (jane@example.com)  
- Bob Johnson (bob@example.com)

All users have the password hash: `$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi` (password: "password") 