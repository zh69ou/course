<?php

class ActivityController extends ControllerBase
{
	public function redeemcodeAction()
	{

	}

	public function redeemcodelistAction()
	{
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看兑换码');
      $keywrods = $this->request->getPost('keywrods');
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      if(!empty($keywrods))
      {
        $arr['conditions']='code like "%'.$keywrods.'%"';
      }
      $error = $this->config->error['success'];
      $list = FtRedemptionCode::find($arr);
      foreach ($list as $k => $v) {
        $data['list'][] = array(
          'id' => $v->id,
          'redeemcode' => $v->code,
          'sendtype' => $v->status,
          'validtime' => $v->endtime,
          'isuse' => $v->status
        );
      }
    }
    return $this->reJson($error,$data);
  }

  public function activitydataAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看活动');
      $keywrods = $this->request->getPost('keywrods');
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      if(!empty($keywrods))
      {
        $arr['conditions']='name like "%'.$keywrods.'%"';
      }
      $error = $this->config->error['success'];
      $list = ZlActivity::find($arr);
      foreach ($list as $k => $v) {
        $data['list'][] = array(
          'id' => $v->id,
          'title' => $v->title,
          'addtime' => $v->addtime,
          'endtime' => $v->endtime,
          'type' => $v->type,
          'rebate' => $v->rebate,
          'usertype' => $v->usertype,
          'usekey' => $v->usekey
        );
      }
    }
    return $this->reJson($error,$data);
  }

  public function activityeditAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('编辑活动','up');
      $id = $this->dispatcher->getParam('id');
      $info = ZlActivity::findFirstById($id);
      $info->title = $this->request->getPost('title');
      $info->addtime = $this->request->getPost('addtime');
      $info->endtime = $this->request->getPost('endtime');
      $info->type = $this->request->getPost('type');
      $info->rebate = $this->request->getPost('rebate');
      $info->usertype = $this->request->getPost('usertype');
      $info->usekey = $this->request->getPost('usekey');
      if($info->save()!==false)
      {
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function activitydelAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = $this->dispatcher->getParam('id');
      $info = ZlActivity::findFirstById($id);
      if(!empty($info)&&$info->delete()!==false)
      {
        $this->addsyslog('删除活动','del',$id);
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function activityaddAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $info = new ZlActivity();
      $info->title = $this->request->getPost('title');
      $info->addtime = $this->request->getPost('addtime');
      $info->endtime = $this->request->getPost('endtime');
      $info->type = $this->request->getPost('type');
      $info->rebate = $this->request->getPost('rebate');
      $info->usertype = $this->request->getPost('usertype');
      $info->usekey = $this->request->getPost('usekey');
      if($info->save()!==false)
      {
        $this->addsyslog('添加活动','into',$info->title);
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

	public function redeemcodeaddAction()
	{
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $num = floor($this->request->getPost('num'))?:1;
      $type = $this->request->getPost('type');
      $validtime = strtotime($this->request->getPost('validtime')?:date('Ymd',strtotime('+30 day')));
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $val = array();
      $arr = array();
      for ($i=0; $i < $num; $i++) {
      	$str = $this->randcode();
      	$code = $this->redemptioncode($str,$arr);
      	$arr[] = $str;
      	$val[]='("'.$code.'","0",1,"'.$validtime.'")';
      }
      $str = join(',',$val);
      $sql = 'INSERT INTO ft_redemption_code (code,exchange_time,status,endtime)VALUES'.$str.'';
      $re = $pdo->execute($sql);
      if($re)
      {
        $this->addsyslog('添加兑换码','into',json_encode($arr));
      	$error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function redeemcodedelAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($this->request->getPost('id'));
      $info = FtRedemptionCode::findFirstById($id);
      if(!empty($info)&&$info->delete()!==false)
      {
        $this->addsyslog('删除兑换码','del',$id);
      	$error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  protected function redemptioncode($str,$arr,$i=1)
  {
  	if($i>1000)
  	{
  		return '';
  	}
  	if(in_array($str,$arr)||!empty(FtRedemptionCode::findFirstByCode($str)))
  	{
  		$i = $i+1;
  		return $this->redemptioncode($this->randcode(),$arr,$i);
  	}else{
  		return $str;
  	}
  }

	public function activityAction()
	{

	}

	public function couponcodeAction()
	{

	}
}