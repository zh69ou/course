<?php
use Phalcon\Mvc\Router\Group as RouterGroup;

$router = $di->getRouter(false);
// ��ҳ
$router->add('/','Index::index',['GET']);
// �γ�
$router->add('/course','Course::list',['GET']);
// û��Ȩ��
$router->add('/nopower','Index::nopower',['GET']);
// 404
$router->notFound(['controller' => 'index','action' => 'er404'] );

$router->handle();