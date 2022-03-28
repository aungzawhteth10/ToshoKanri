<?php
$app->post('/Api/ApiSession/update', 'ApiSession:update');
$app->post('/Api/ApiLogin/loginAuth', 'App\Api\ApiLogin:loginAuth');
$app->post('/Api/ApiLogin/register', 'App\Api\ApiLogin:register');
$app->post('/Api/ApiBookRegister/register', 'ApiBookRegister:register');
$app->get('/Api/ApiBookManage', 'ApiBookManage:init');
$app->get('/Api/ApiBookInfo', 'ApiBookInfo:init');
$app->post('/Api/ApiBookInfo', 'ApiBookInfo:update');
$app->get('/Api/ApiRentalManage', '\App\Api\ApiRentalManage:init');
$app->post('/Api/ApiRentalRegister', '\App\Api\ApiRentalRegister:update');
$app->get('/Api/ApiRentalChoie', '\App\Api\ApiRentalChoie:init');
$app->get('/Api/ApiRentalInfo', '\App\Api\ApiRentalInfo:init');
$app->post('/Api/ApiRentalInfo', '\App\Api\ApiRentalInfo:update');