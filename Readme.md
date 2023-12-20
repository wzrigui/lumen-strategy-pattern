
Steps to test the code 

PHP 8.1.25

```bash
composer install
```

```bash
php artisan migrate
```
Seeding test data

```bash
php artisan db:seed
```
Used built-in PHP development server 

```bash
php -S localhost:8000 -t public
GET http://localhost:8000/broker/{companyId}/{brokerNumber}
http://localhost:8000/broker/1/006545640
http://localhost:8000/broker/1/77/6545640
```

Unit test
```bash
php vendor/bin/phpunit tests/App/Service/BrokerServiceTest.php
```