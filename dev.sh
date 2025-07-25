#!/bin/bash

# Development script for PHP MVC with Tailwind CSS

echo "🚀 Starting PHP MVC Development Environment"
echo "=========================================="

# Check if Node.js is installed
if ! command -v npm &> /dev/null; then
    echo "❌ Node.js/npm is not installed. Please install Node.js first."
    exit 1
fi

# Check if dependencies are installed
if [ ! -d "node_modules" ]; then
    echo "📦 Installing npm dependencies..."
    npm install
fi

# Build CSS initially
echo "🎨 Building Tailwind CSS..."
npm run build

echo ""
echo "✅ Setup complete!"
echo ""
echo "🌐 PHP Server: http://localhost:8080"
echo "🎨 Tailwind CSS: Watching for changes..."
echo ""
echo "Press Ctrl+C to stop both services"
echo ""

# Start Tailwind CSS in watch mode in background
npm run build-css &
TAILWIND_PID=$!

# Start PHP server
cd public
php -S localhost:8080 &
PHP_PID=$!

# Wait for interrupt
trap "echo ''; echo '🛑 Stopping services...'; kill $TAILWIND_PID $PHP_PID; exit 0" INT

# Keep script running
wait 