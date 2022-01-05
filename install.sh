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

npm install
npm run dev
php artisan serve -q
npx mix watch --hot

echo "Projeto executando em: http://127.0.0.1:8000"
echo ""
echo "Tudo certo!"