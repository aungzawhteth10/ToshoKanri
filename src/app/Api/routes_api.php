<?php
$app->post('/Api/ApiSession/update', 'ApiSession:update');
$app->post('/Api/ApiLogin/loginAuth', 'App\Api\ApiLogin:loginAuth');
$app->post('/Api/ApiLogin/register', 'App\Api\ApiLogin:register');
$app->post('/Api/ApiBookRegister/register', 'ApiBookRegister:register');
$app->get('/Api/ApiBookManage', 'ApiBookManage:init');
$app->get('/Api/ApiBookInfo', 'ApiBookInfo:init');
$app->post('/Api/ApiBookInfo', 'ApiBookInfo:update');
$app->get('/Api/ApiBookRyoukinn', '\App\Api\ApiBookRyoukinn:init');
$app->post('/Api/ApiBookRyoukinn', '\App\Api\ApiBookRyoukinn:update');
$app->get('/Api/ApiBookRental', 'ApiBookRental:init');