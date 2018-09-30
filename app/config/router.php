<?php

$router = $di->getRouter(false);

# 首页
$router->add('/',['controller'=>'index','action'=>'index'],['GET'])->setName('index');

# 登录
$router->add('/login',['controller'=>'index','action'=>'login'],['GET','POST'])->setName('login');

# banner
$router->add('/api/banner',['controller'=>'api','action'=>'banner'],['GET','POST'])->setName('banner');
# 老师
$router->add('/api/teacher',['controller'=>'api','action'=>'teacher'],['GET','POST'])->setName('teacher');
$router->add('/api/teacher/{id:[0-9]+}',['controller'=>'api','action'=>'teacherinfo'],['GET','POST'])->setName('teacherinfo');
# 关注老师
$router->add('/api/teacher/attention',['controller'=>'api','action'=>'teacheriattention'],['GET','POST'])->setName('teacherattention');

# 课程
$router->add('/api/course',['controller'=>'api','action'=>'course'],['GET','POST'])->setName('course');
$router->add('/api/course/{id:[0-9]+}',['controller'=>'api','action'=>'courseinfo'],['GET','POST'])->setName('courseinfo');
$router->add('/api/course/collect',['controller'=>'api','action'=>'coursecollect'],['GET','POST'])->setName('coursecollect');

# 评论
$router->add('/api/comment',['controller'=>'api','action'=>'comment'],['GET','POST'])->setName('comment');
$router->add('/api/comment/add',['controller'=>'api','action'=>'addcomment'],['GET','POST'])->setName('addcomment');

# 排行
$router->add('/api/rank',['controller'=>'api','action'=>'rank'],['GET','POST'])->setName('rank');

# 签到
$router->add('/api/signin',['controller'=>'api','action'=>'signin'],['GET','POST'])->setName('signin');

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