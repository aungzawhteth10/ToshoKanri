<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('Asia/Tokyo');
$app = new \Slim\App([
'settings' => [
       'displayErrorDetails' => true,
]
]);
// $app->get('/first', function($request, $response) {
//    return 'My first route';
// });

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
$container['ApiLogin'] = function ($container) {
   return new \App\Api\ApiLogin();
};
$container['RunVideo'] = function ($container) {
   return new \App\Api\RunVideo($container->view);
};
$container['ApiShuukei'] = function ($container) {
   return new \App\Api\ApiShuukei();
};
$container['HtmlHelper'] = function ($container) {
   return new \App\Api\HtmlHelper();
};
$container['ApiStudentList'] = function ($container) {
   return new \App\Api\ApiStudentList();
};
