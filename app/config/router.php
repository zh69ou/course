<?php
use Phalcon\Mvc\Router\Group as RouterGroup;

$router = $di->getRouter(false);
// 首页
$router->add('/','Index::index',['GET']);
// 课程
$router->add('/course','Course::list',['GET']);
// 没有权限
$router->add('/nopower','Index::nopower',['GET']);
// 404
$router->notFound(['controller' => 'index','action' => 'er404'] );

$router->handle();