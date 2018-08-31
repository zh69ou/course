<?php

class UserController extends ControllerBase
{
  public function teacherAction()
  {
  }

  public function organAction()
  {
  }

  public function stewardAction()
  {
  }

  public function studentAction()
  {
  }

  public function infoAction()
  {
  	$id = $dispatcher->getParam('id');
  }

  public function actlogAction()
  {
  	$id = $dispatcher->getParam('id');
  }

  public function absteacherAction()
  {
  }

  public function absteacherinfoAction()
  {
  	$id = $dispatcher->getParam('id');
  }

  public function commentAction()
  {
  }

  public function fundvipAction()
  {
  }

  public function fundlistAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看订单');
      $keywrods = $this->request->getPost('keywrods');
      $bedate = floor($this->request->getPost('bedate'))?:date('Ymd',strtotime('-14 day'));
      $endate = floor($this->request->getPost('endate'))?:date('Ymd',time());
      $betime = strtotime($bedate);
      $entime = strtotime($endate);
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      $arr[] = 'order_time > "'.$betime.'" AND order_time < "'.$endate.'"';
      if(!empty($keywrods))
      {
        $arr['conditions']='name like "%'.$keywrods.'%"';
      }
      $list = FtOrder::find($arr);
      $error = $this->config->error['success'];
      foreach ($list as $k => $v) {
        $data['uid'] = $info->buy_uid;
        $data['username'] = $info->buy_username;
        $data['paycontent'] = $info->name;
        $data['paytime'] = $info->order_time;
        $data['payprice'] = $info->order_price;
        $data['paytype'] = $info->pay_type;
        $data['status'] = $info->pay_status;
      }
    }
    return $this->reJson($error,$data);
  }

  public function pricedatabackAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $info = new FtPriceback();
      $info->uid = $this->request->getPost('uid');
      $info->username = $this->request->getPost('username');
      $info->backcontent = $this->request->getPost('backcontent');
      $info->acttime = $this->request->getPost('acttime');
      $info->paytime = $this->request->getPost('paytime');
      $info->payprice = $this->request->getPost('payprice');
      $info->paytype = $this->request->getPost('paytype');
      $info->status = $this->request->getPost('status');
      $info->note = $this->request->getPost('note');
      if($info->save()!==false)
      {
        $this->addsyslog('修改退款','up',json_encode($info));
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function pricebackAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看退款列表');
      $keywrods = $this->request->getPost('keywrods');
      // $bedate = floor($this->request->getPost('bedate'))?:date('Ymd',strtotime('-14 day'));
      // $endate = floor($this->request->getPost('endate'))?:date('Ymd',time());
      // $betime = strtotime($bedate);
      // $entime = strtotime($endate);
      // $arr[] = 'order_time > "'.$betime.'" AND order_time < "'.$endate.'"';
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      if(!empty($keywrods))
      {
        $arr['conditions']='username like "%'.$keywrods.'%" OR backcontent like "%'.$keywrods.'%"';
      }
      $list = FtPriceback::find($arr);
      $error = $this->config->error['success'];
      foreach ($list as $k => $v) {
        $data['uid'] = $list->uid;
        $data['username'] = $list->username;
        $data['backcontent'] = $list->backcontent;
        $data['acttime'] = $list->acttime;
        $data['paytime'] = $list->paytime;
        $data['payprice'] = $list->payprice;
        $data['paytype'] = $list->paytype;
        $data['status'] = $list->status;
        $data['note'] = $list->note;
      }
    }
    return $this->reJson($error,$data);
  }

  public function fundclassAction()
  {
  }

  public function refundAction()
  {
  }

  public function myinfodataAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $info = ZlAdmin::findFirstById($this->persistent->admin['id']);
      if(!empty($info))
      {
        $this->addsyslog('获取管理员信息');
        $error = $this->config->error['success'];
        $data['name'] = $info['name'];
        $data['himg'] = $info['himg'];
        $data['phone'] = $info['phone'];
        $data['email'] = $info['email'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function myinfodataupAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $info = ZlAdmin::findFirstById($this->persistent->admin['id']);
      if(!empty($info))
      {
        $info->himg = $this->request->getPost('himg');
        $info->phone = $this->request->getPost('phone');
        $info->email = $this->request->getPost('email');
        if($info->save()!==false)
        {
          $this->addsyslog('更新管理员账号','up',json_encode($info));
          $error = $this->config->error['success'];
        }
      }
    }
    return $this->reJson($error,$data);
  }

  public function myinfopswupAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax()&&$this->security->checkToken())
    {
      $info = ZlAdmin::findFirstById($this->persistent->admin['id']);
      if(!empty($info))
      {
        $psw = $this->request->getPost('psw');
        $newpsw = $this->request->getPost('newpsw');
        $truepsw = $this->request->getPost('truepsw');
        if($newpsw==$truepsw&&$this->security->checkHash($psw, $info->psw))
        {
          $info->psw = $this->security->hash($newpsw);
          if($info->save()!==false)
          {
            $this->addsyslog('修改密码','up',$psw);
            $error = $this->config->error['success'];
          }
        }
      }
    }
    return $this->reJson($error,$data);
  }

  public function userlistAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看用户列表');
      $arr = [];
      $data['page'] = $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      $type = $this->request->getPost('type');
      $name = $this->request->getPost('name');
      $order = $this->request->getPost('order');
      $sort = strtolower($this->request->getPost('sort'))=='asc'?'ASC':'DESC';
      if($type=='student'){
        if(!empty($name))
        {
          $arr['conditions']='name like "%'.$name.'%"';
        }
        if($order=='time'){
          $arr['order']='uid '.$sort;
        }elseif ($order=='score') {
          $arr['order']='score '.$sort;
        }
        $list = FtMemberStudent::find($arr);
        $error = $this->config->error['success'];
        foreach ($list as $k => $v) {
          $data['list'][]=[
            'id' => $v->uid,
            'name' => $v->name,
            'type' => 4,
            'credit' => $v->score,
            'point' => $v->experience,
            'score' => $v->page_score,
            'addtime' => $v->inputtime
          ];
        }
      }elseif($type=='teacher'){
        if(!empty($name))
        {
          $arr['conditions']='name like "%'.$name.'%"';
        }
        if($order=='time'){
          $arr['order']='uid '.$sort;
        }
        $list = FtMemberTeacher::find($arr);
        $error = $this->config->error['success'];
        foreach ($list as $k => $v) {
          $data['list'][]=[
            'id' => $v->uid,
            'name' => $v->name,
            'type' => 3,
            'testnum' => count($v->FtQuestion),
            'addtime' => $v->inputtime
          ];
        }
      }elseif($type=='manage'){
        if(!empty($name))
        {
          $arr['conditions']='name like "%'.$name.'%"';
        }
        if($order=='time'){
          $arr['order']='id '.$sort;
        }
        $list = FtMemberTeacher::find($arr);
        $error = $this->config->error['success'];
        foreach ($list as $k => $v) {
          $data['list'][]=[
            'id' => $v->id,
            'name' => $v->name,
            'type' => 1,
            'phone' => $v->phone,
            'email' => $v->email,
            'status' => $v->status,
            'addtime' => $v->addtime
          ];
        }
      }
    }
    return $this->reJson($error,$data);
  }

  public function adminlogAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看操作日志');
      $keywrods = $this->request->getPost('keywrods');
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      if(!empty($keywrods))
      {
        $arr['conditions']='actdesc like "%'.$keywrods.'%"';
      }
      $error = $this->config->error['success'];
      $list = ZlAdminLog::find($arr);
      foreach ($list as $k => $v) {
        $data['list'][] = array(
          'id' => $v->id,
          'type' => $v->type,
          'content' => $v->actdesc,
          'user' => $v->ZlAdmin->name,
          'time' => $v->inputtime
        );
      }
    }
    return $this->reJson($error,$data);
  }

  public function userinfoAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看用户详细信息');
      $id = floor($this->request->getPost('id'));
      $type = $this->request->getPost('type');
      if($type=='student')
      {
        $info = FtMemberStudent::findFirstByUid($id);
        $error = $this->config->error['success'];
        $data['info']=[
          'id' => $info->uid,
          'name' => $info->name,
          'type' => 4,
          'credit' => $info->score,
          'point' => $info->experience,
          'score' => $info->page_score,
          'addtime' => $info->inputtime
        ];
      }
      elseif($type=='teacher')
      {
        $info = FtMemberTeacher::findFirstByUid($id);
        $error = $this->config->error['success'];
        $data['info']=[
          'id' => $info->uid,
          'name' => $info->name,
          'type' => 3,
          'testnum' => count($info->FtQuestion),
          'addtime' => $info->inputtime
        ];
      }
      elseif($type=='manage')
      {
        $info = FtMemberTeacher::findFirstById($id);
        $error = $this->config->error['success'];
        $data['info']=[
            'id' => $info->id,
            'name' => $info->name,
            'type' => 1,
            'phone' => $info->phone,
            'email' => $info->email,
            'status' => $info->status,
            'addtime' => $info->addtime
          ];
      }
    }
    return $this->reJson($error,$data);
  }
}