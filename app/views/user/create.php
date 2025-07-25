<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="<?php echo BASE_URL; ?>/css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto">
            <div class="card">
                <h1 class="text-3xl font-bold text-center text-gray-900 mb-8"><?php echo $title; ?></h1>
                
                <form method="POST" action="<?php echo BASE_URL; ?>/user/create" class="space-y-6">
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" required class="form-input">
                    </div>
                    
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" required class="form-input">
                    </div>
                    
                    <div>
                        <button type="submit" class="btn-primary w-full">Create User</button>
                    </div>
                </form>
                
                <div class="flex flex-wrap justify-center gap-4 mt-8">
                    <a href="<?php echo BASE_URL; ?>" class="btn-outline">Home</a>
                    <a href="<?php echo BASE_URL; ?>/user" class="btn-secondary">All Users</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 