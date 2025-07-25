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
        <div class="max-w-2xl mx-auto">
            <div class="card">
                <h1 class="text-3xl font-bold text-center text-gray-900 mb-8"><?php echo $title; ?></h1>
                
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-24">ID:</span>
                            <span class="text-gray-900"><?php echo htmlspecialchars($user['id']); ?></span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-24">Name:</span>
                            <span class="text-gray-900"><?php echo htmlspecialchars($user['name']); ?></span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-24">Email:</span>
                            <span class="text-gray-900"><?php echo htmlspecialchars($user['email']); ?></span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-24">Created:</span>
                            <span class="text-gray-900"><?php echo htmlspecialchars($user['created_at']); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="<?php echo BASE_URL; ?>" class="btn-outline">Home</a>
                    <a href="<?php echo BASE_URL; ?>/user" class="btn-primary">All Users</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 