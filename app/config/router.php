<?php

$router = $di->getRouter(false);

# 首页
$router->add('/',['controller'=>'index','action'=>'index'],['GET'])->setName('index');

# 登录
$router->add('/login',['controller'=>'index','action'=>'login'],['GET','POST'])->setName('login');

#注册
$router->add('/regin',['controller'=>'index','action'=>'regin'],['GET','POST'])->setName('regin');
$router->add('/logout',['controller'=>'index','action'=>'logout'],['GET','POST'])->setName('logout');

# 课程
$router->add('/course','Course::list',['GET'])->setName('courselist');

# 临时统计
$router->add('/statistics','Index::statistics',['GET']);

# 没有权限
$router->add('/nopower','Index::nopower',['GET']);

# 404
$router->notFound(['controller' => 'index','action' => 'er404'] );

$router->handle();