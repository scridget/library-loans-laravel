# laravel-docker-boilerplate
This is a boilerplate for laravel.

# Get Started
```
docker-compose build
docker-compose up -d
docker exec -it php /bin/sh -c "cp .env.example .env"
docker exec -it php /bin/sh -c "composer install"
docker exec -it php /bin/sh -c "npm cache verify && npm install"
docker exec -it php /bin/sh -c "php artisan key:generate"
docker exec -it php /bin/sh -c "php artisan migrate && php artisan db:seed"
```

Add hosts settings to /etc/hosts
```
127.0.0.1 library-loans.test
```