#Pre-requisite
- Redis
- PHP 8
- MYSQL

Setup step

1. composer install --ignore-platform-reqs
2. npm install && run dev
3. php artisan migrate
4. php artisan horizon

ENV additional

- REDIS_CLIENT=predis
