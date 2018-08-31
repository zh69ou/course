<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function beforeExecuteRoute($dispatcher)
  {
    if(!empty($dispatcher->getParam('name')))
    {
      $this->persistent->code = $dispatcher->getParam('name');
    }
    if($this->cookies->has($this->config->loginname)&&empty($this->persistent->admin))
    {
      $this->persistent->admin = $this->modelsCache->get($this->cookies->get($this->config->loginname));
    }
    if($this->request->isAjax())
    {
      if(empty($this->persistent->admin)&&$dispatcher->getActionName()!=='login')
      {
        return $this->reJson($this->config->error['noland']);
      }else{
        $power = $dispatcher->getParam('power');
        if(!empty($power)&&!empty($this->persistent->admin['power'])&&!in_array($power,json_decode($this->persistent->admin['power'],true)))
        {
          return $this->reJson($this->config->error['nopower']);
        }
      }
    }else{
      if(empty($this->persistent->admin)&&$dispatcher->getParam('adlogin')=='is')
      {
        // var_dump($this->persistent->admin);exit;
        $this->response->redirect("/login");
      }else{
        $power = $dispatcher->getParam('power');
        if(!empty($power)&&!in_array($power,$this->persistent->admin['power']))
        {
          $this->response->redirect("/nopower");
        }
      }
    }
  }

  protected function reJson($error=0,$data=[])
  {
    $arr['error'] = $error;
    $arr['data'] = $data;
    return $this->response->setJsonContent($arr);
  }

  protected function randcode($len = 8)
  {
    $str_ = 'ABCDEFHGJKMNPQRSTUVWXY3456789';
    $max = strlen($str_) - 1;
    $str = '';
    for ($i = 0; $i < $len; $i++)
    {
        $str .= $str_[rand(0, $max)];
    }
    return $str;
  }

  protected function addsyslog($content,$type='show',$data='')
  {
    $log = new ZlAdminLog();
    $log->aid = $this->persistent->admin['id']?:'';
    $log->acttype = in_array($type,['show','into','up','del'])?$type:'show';
    $log->actdesc = $content;
    $log->actdata = $data;
    $log->acttime = time();
    $log->save();
  }
}