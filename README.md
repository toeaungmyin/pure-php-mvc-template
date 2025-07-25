# PHP MVC Project with Multi-Database Support

A modern PHP MVC (Model-View-Controller) framework with support for MySQL, PostgreSQL, and SQLite databases, plus Tailwind CSS styling.

## Project Structure

```
php_mvc_test/
├── app/
│   ├── controllers/
│   │   ├── HomeController.php
│   │   └── UserController.php
│   ├── models/
│   │   └── User.php
│   ├── views/
│   │   ├── home/
│   │   ├── user/
│   │   └── error/
│   └── core/
│       ├── App.php
│       ├── Controller.php
│       ├── Model.php
│       └── Database.php
├── config/
│   ├── config.php
│   └── database.php
├── database/
│   ├── mysql.sql
│   ├── pgsql.sql
│   └── sqlite.sql
├── public/
│   ├── css/
│   │   └── style.css (generated)
│   ├── index.php
│   └── .htaccess
├── src/
│   └── input.css
├── package.json
├── tailwind.config.js
├── setup_database.php
├── test_database.php
└── DATABASE_SETUP.md
```

## Features

- 🏗️ Clean MVC architecture
- 🎨 Modern UI with Tailwind CSS
- 🗄️ Multi-database support (MySQL, PostgreSQL, SQLite)
- 🔄 URL routing system
- 📱 Responsive design
- 🛡️ Prepared statements for security
- 🎯 Component-based CSS classes
- 🔧 Easy database switching

## Database Support

This framework now supports three popular databases:

- **MySQL**: Full-featured relational database
- **PostgreSQL**: Advanced open-source database
- **SQLite**: Lightweight file-based database

See [DATABASE_SETUP.md](DATABASE_SETUP.md) for detailed setup instructions.

## Setup Instructions

### Prerequisites

- PHP 8.1+ with PDO extensions
- Database server (MySQL/PostgreSQL) or SQLite
- Node.js 16+ (for Tailwind CSS)
- Web server (Apache/Nginx) or PHP built-in server

### 1. Choose Your Database

Edit `config/config.php` and set your preferred database:

```php
// For MySQL
define('DB_TYPE', 'mysql');

// For PostgreSQL  
define('DB_TYPE', 'pgsql');

// For SQLite
define('DB_TYPE', 'sqlite');
```

### 2. Configure Database Settings

Update the database configuration in `config/config.php` according to your chosen database type.

### 3. Setup Database

Run the automatic setup script:
```bash
php setup_database.php
```

Or follow the manual setup instructions in [DATABASE_SETUP.md](DATABASE_SETUP.md).

### 4. Test Database Connection

Verify your database setup:
```bash
php test_database.php
```

### 5. Install Dependencies

```bash
npm install
```

### 6. Build Tailwind CSS

For development (with file watching):
```bash
npm run build-css
```

For production (minified):
```bash
npm run build
```

### 7. Start the Application

Using PHP built-in server:
```bash
cd public
php -S localhost:8080
```

Or configure your web server to point to the `public/` directory.

## Usage

### Available Routes

- `http://localhost:8080/` - Home page
- `http://localhost:8080/home/about` - About page
- `http://localhost:8080/user` - Users list
- `http://localhost:8080/user/create` - Create user form
- `http://localhost:8080/user/profile/{id}` - User profile

### Custom Tailwind Components

The project includes custom Tailwind components defined in `src/input.css`:

- `.btn-primary` - Primary button style
- `.btn-secondary` - Secondary button style
- `.btn-outline` - Outlined button style
- `.card` - Card container
- `.form-input` - Form input styling
- `.form-label` - Form label styling

## Development

### Adding New Controllers

1. Create a new controller in `app/controllers/`
2. Extend the base `Controller` class
3. Add methods for different actions

### Adding New Models

1. Create a new model in `app/models/`
2. Extend the base `Model` class
3. Implement your database methods

### Adding New Views

1. Create view files in `app/views/`
2. Use Tailwind CSS classes for styling
3. Include the CSS file: `<link href="<?php echo BASE_URL; ?>/css/style.css" rel="stylesheet">`

### Customizing Styles

1. Edit `src/input.css` to add custom components
2. Run `npm run build-css` to rebuild the CSS
3. Tailwind will automatically purge unused styles in production

### Switching Between Databases

To switch between database types:

1. Update `DB_TYPE` in `config/config.php`
2. Configure the appropriate database settings
3. Run `php setup_database.php` to initialize the new database
4. Test with `php test_database.php`

## Security Features

- ✅ Prepared statements for SQL queries
- ✅ Input sanitization with `htmlspecialchars()`
- ✅ CSRF protection ready (can be extended)
- ✅ Clean URL routing
- ✅ Database-agnostic security practices

## License

MIT License - feel free to use this project as a starting point for your applications. 