<?php

$router = $di->getRouter(false);

# 首页
$router->add('/',[
	'controller' => 'index',
  'action'     => 'index'
],['GET'])->setName('index');

# 课程
$router->add('/course','Course::list',['GET'])->setName('courselist');

# 临时统计
$router->add('/statistics','Index::statistics',['GET']);

# 没有权限
$router->add('/nopower','Index::nopower',['GET']);

# 404
$router->notFound(['controller' => 'index','action' => 'er404'] );

$router->handle();