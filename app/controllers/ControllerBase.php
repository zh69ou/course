<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	protected $safety;
	public function beforeExecuteRoute($dispatcher)
  {
  	# 实例化安全类
  	$app = $this;
  	$safety = new Safety($app);

  	# 判断是否页面需要登录
  	if($safety->IsLogin()&&$dispatcher->getParam('login')=='is')
  	{
  		# 处理非登录拦截
  	}
  }

  public function afterExecuteRoute($dispatcher)
  {}
}