<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('Asia/Tokyo');
$app = new \Slim\App([
'settings' => [
       'displayErrorDetails' => true,
]
]);
$container = $app->getContainer();
$container['view'] = function ($container) {
   $view = new \Slim\Views\Twig(__DIR__ . '/../app/templates', [
       'cache' => false,
   ]);
   $view->addExtension(new \Slim\Views\TwigExtension(
       $container->router,
       $container->request->getUri()
   ));
   return $view;
};
$container['HtmlHelper'] = function () {
   return new \App\Api\HtmlHelper();
};
$container['ApiSession'] = function () {
   return new \App\Api\ApiSession();
};
$container['ApiLogin'] = function () {
   return new \App\Api\ApiLogin();
};
$container['ApiBookRegister'] = function () {
   return new \App\Api\ApiBookRegister();
};
$container['ApiBookManage'] = function () {
   return new \App\Api\ApiBookManage();
};
$container['ApiBookInfo'] = function () {
   return new \App\Api\ApiBookInfo();
};

