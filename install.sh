#!/bin/bash
echo "Iniciando instalação..."
echo "^.^"

composer install &&
cp .env.example .env &&
php artisan key:generate &&
php artisan cache:clear &&
php artisan route:clear &&
php artisan config:clear &&
php artisan view:clear &&
php artisan migrate:fresh --seed
php artisan serve