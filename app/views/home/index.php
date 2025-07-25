<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="<?php echo BASE_URL; ?>/css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full">
            <div class="card">
                <h1 class="text-3xl font-bold text-center text-gray-900 mb-6"><?php echo $title; ?></h1>
                <p class="text-lg text-gray-600 text-center mb-8"><?php echo $message; ?></p>
                
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="<?php echo BASE_URL; ?>" class="btn-primary">Home</a>
                    <a href="<?php echo BASE_URL; ?>/home/about" class="btn-outline">About</a>
                    <a href="<?php echo BASE_URL; ?>/user" class="btn-secondary">Users</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 