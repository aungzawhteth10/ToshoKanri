<?php
$app->post('/Api/ApiSession/update', 'ApiSession:update');
$app->post('/Api/ApiLogin/loginAuth', 'App\Api\ApiLogin:loginAuth');
$app->post('/Api/ApiLogin/register', 'App\Api\ApiLogin:register');
$app->post('/Api/ApiBookRegister/register', 'ApiBookRegister:register');
$app->get('/Api/ApiBookManage', 'ApiBookManage:init');
$app->get('/Api/ApiBookInfo', 'ApiBookInfo:init');
$app->post('/Api/ApiBookInfo', 'ApiBookInfo:update');
$app->get('/Api/ApiRentalRegister', '\App\Api\ApiRentalRegister:init');
$app->post('/Api/ApiRentalRegister', '\App\Api\ApiRentalRegister:update');
$app->get('/Api/ApiRentalChoie', '\App\Api\ApiRentalChoie:init');
$app->get('/Api/ApiSyainnRegister', '\App\Api\ApiSyainnRegister:init');
$app->post('/Api/ApiSyainnRegister', '\App\Api\ApiSyainnRegister:update');
$app->get('/Api/ApiSyainnManage', '\App\Api\ApiSyainnManage:init');
$app->get('/Api/ApiSyainnFix', '\App\Api\ApiSyainnFix:init');
$app->post('/Api/ApiSyainnFix', '\App\Api\ApiSyainnFix:update');
$app->get('/Api/ApiBookSelect', '\App\Api\ApiBookSelect:init');
$app->post('/Api/ApiBookSelect', '\App\Api\ApiBookSelect:update');