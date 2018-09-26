<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	protected $safety;
	public function beforeExecuteRoute($dispatcher)
  {
  	# 实例化安全类
  	$app = $this;
  	$this->safety = new Safety($app);

  	# 判断是否页面需要登录
  	if($this->safety->IsLogin()&&$dispatcher->getParam('login')=='is')
  	{
  		# 处理非登录拦截
  	}
  	$this->view->user = $this->safety->ReturnUser();
  	$this->view->jsfile = $dispatcher->getActionName();
  }

  public function afterExecuteRoute($dispatcher)
  {}

  protected function ReturnJson($error=0,$data=[])
  {
    $arr['error'] = $error;
    $arr['data'] = $data;
    return $this->response->setJsonContent($arr);
  }
}