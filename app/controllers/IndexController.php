<?php

class IndexController extends ControllerBase
{

  public function indexAction()
  {
    // echo '<pre>';
    // var_dump($this->persistent->admin['power']);
    // exit;
    // $this->view->jsfile = 'adminindex';
  }

  public function myinfoAction()
  {

  }

  public function statisticsAction()
  {

  }

  public function accesspathAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看用户访问网站路径统计');
      $error = $this->config->error['success'];
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT source,count(id) as num FROM zl_accesspath GROUP BY source';
      $data = $pdo->fetchAll($sql);
    }
    return $this->reJson($error,$data);
  }

  public function browserAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看用户访问浏览器统计');
      $error = $this->config->error['success'];
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT type,count(id) as num FROM zl_accesspath GROUP BY type';
      $data = $pdo->fetchAll($sql);
    }
    return $this->reJson($error,$data);
  }

  public function plateAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看用户访问路径统计');
      $error = $this->config->error['success'];
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT path,count(id) as num FROM zl_accesspath GROUP BY path';
      $data = $pdo->fetchAll($sql);
    }
    return $this->reJson($error,$data);
  }

  public function addnumAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看每日用户增量统计');
      $error = $this->config->error['success'];
      $date = floor($this->request->getPost('date'))?:14;
      $time = strtotime(date('Y-m-d',strtotime('-'.$date.' day')));
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT FROM_UNIXTIME(inputtime,"%Y%m%d") day,count(uid) as num FROM ft_member_login WHERE inputtime>"'.$time.'" GROUP BY day';
      // var_dump($sql);var_dump(time());exit;
      $list = $pdo->fetchAll($sql);
      for ($i=1; $i <=$date ; $i++) {
        $data[date('Ymd',strtotime('-'.$i.' day'))]=['day'=>date('m/d',strtotime('-'.$i.' day')),'num'=>0];
      }
      foreach ($list as $k => $v) {
        $data[$v['day']]['num']=$v['num'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function landtimeAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看用户登录时间统计');
      $error = $this->config->error['success'];
      $bedate = floor($this->request->getPost('bedate'))?:date('Ymd',strtotime('-1 day'));
      $endate = floor($this->request->getPost('endate'))?:date('Ymd',time());
      $betime = strtotime($bedate);
      $entime = strtotime($endate);
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT FROM_UNIXTIME(betime,"%H") day,count(uid) as num FROM ft_look_log WHERE betime>"'.$betime.'" AND betime<"'.$entime.'" GROUP BY day,uid';
      // var_dump($sql);exit;
      $list = $pdo->fetchAll($sql);
      for ($i=0; $i <24 ; $i++) {
        $data[($i<10?'0'.$i:$i)]=['day'=>$i,'num'=>0];
      }
      foreach ($list as $k => $v) {
        $data[$v['day']]['num']=$data[$v['day']]['num']+$v['num'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function datevedioAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看每个时间段视频播放量统计');
      $error = $this->config->error['success'];
      $bedate = floor($this->request->getPost('bedate'))?:date('Ymd',strtotime('-1 day'));
      $endate = floor($this->request->getPost('endate'))?:date('Ymd',time());
      $grade = floor($this->request->getPost('grade'));
      $betime = strtotime($bedate);
      $entime = strtotime($endate);
      $where = '';
      if(!empty($grade))
      {
        $where = 'AND cid in(SELECT id FROM ft_class WHERE gradeid="'.$grade.'")';
      }
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT FROM_UNIXTIME(betime,"%H") day,count(uid) as num FROM ft_look_log WHERE betime>"'.$betime.'" AND betime<"'.$entime.'"'.$where.' GROUP BY day,uid';
      $list = $pdo->fetchAll($sql);
      // echo '<pre>';var_dump($sql);exit;
      for ($i=0; $i <24 ; $i++) {
        $data[($i<10?'0'.$i:$i)]=['day'=>$i,'num'=>0];
      }
      foreach ($list as $k => $v) {
        $data[$v['day']]['num']=$data[$v['day']]['num']+$v['num'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function datevedioinfoAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看每个段视频播放时间统计');
      $id = $this->dispatcher->getParam('id');
      $error = $this->config->error['success'];
      $bedate = floor($this->request->getPost('bedate'))?:date('Ymd',strtotime('-14 day'));
      $endate = floor($this->request->getPost('endate'))?:date('Ymd',time());
      $betime = strtotime($bedate);
      $entime = strtotime($endate);
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT FROM_UNIXTIME(betime,"%Y%m%d") day,betime FROM ft_look_log WHERE cid="'.$id.'" AND betime>"'.$betime.'" AND betime<"'.$entime.'"';
      $list = $pdo->fetchAll($sql);
      for ($i=1; $i <=14 ; $i++) {
        $data[date('Ymd',strtotime('-'.$i.' day'))]=['day'=>date('m/d',strtotime('-'.$i.' day')),'time'=>0];
      }
      foreach ($list as $k => $v) {
        $data[$v['day']]['time']=date('H:i',$v['betime']);
      }
    }
    return $this->reJson($error,$data);
  }

  public function userviewAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看用户观看时间统计');
      $id = $this->dispatcher->getParam('id');
      $error = $this->config->error['success'];
      $bedate = floor($this->request->getPost('bedate'))?:date('Ymd',strtotime('-14 day'));
      $endate = floor($this->request->getPost('endate'))?:date('Ymd',time());
      $betime = strtotime($bedate);
      $entime = strtotime($endate);
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT FROM_UNIXTIME(betime,"%Y%m%d") day,betime FROM ft_look_log WHERE uid="'.$id.'" AND betime>"'.$betime.'" AND betime<"'.$entime.'"';
      $list = $pdo->fetchAll($sql);
      for ($i=1; $i <=14 ; $i++) {
        $data[date('Ymd',strtotime('-'.$i.' day'))]=['day'=>date('m/d',strtotime('-'.$i.' day')),'time'=>0];
      }
      foreach ($list as $k => $v) {
        $data[$v['day']]['time']=date('H:i',$v['betime']);
      }
    }
    return $this->reJson($error,$data);
  }

  public function dayvedioAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看视频每日总播放量统计');
      $error = $this->config->error['success'];
      $grade = floor($this->request->getPost('grade'));
      $date = floor($this->request->getPost('date'))?:14;
      $time = strtotime(date('Y-m-d',strtotime('-'.$date.' day')));
      $where = '';
      if(!empty($grade))
      {
        $where = 'AND cid in(SELECT id FROM ft_class WHERE gradeid="'.$grade.'")';
      }
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT FROM_UNIXTIME(betime,"%Y%m%d") day,count(uid) as num FROM ft_look_log WHERE betime>"'.$time.'" '.$where.' GROUP BY day,uid';
      $list = $pdo->fetchAll($sql);
      for ($i=1; $i <=$date ; $i++) {
        $data[date('Ymd',strtotime('-'.$i.' day'))]=['day'=>date('m/d',strtotime('-'.$i.' day')),'num'=>0];
      }
      foreach ($list as $k => $v) {
        $data[$v['day']]['num']=$data[$v['day']]['num']+$v['num'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function jumpvedioAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看每个视频拖拽量统计');
      $id = $this->dispatcher->getParam('id');
      $error = $this->config->error['success'];
      $bedate = floor($this->request->getPost('bedate'))?:date('Ymd',strtotime('-1 day'));
      $endate = floor($this->request->getPost('endate'))?:date('Ymd',time());
      $grade = floor($this->request->getPost('grade'));
      $betime = strtotime($bedate);
      $entime = strtotime($endate);
      $select = '';
      for ($i=0; $i <= 24; $i++)
      {
        $t = ($i<10?'0'.$i:$i).':00';
        $b = (($i+1)<10?'0'.($i+1):($i+1)).':00';
        $select .= 'COUNT( CASE WHEN (`begintime` >= "'.$t.'" AND `begintime` < "'.$b.'" OR `endtime` >= "'.$t.'" AND `endtime` < "'.$b.'" OR `begintime` <= "'.$t.'" AND `endtime` > "'.$b.'") THEN 1 END ) AS `'.$t.'`,';
      }
      $select .= 'COUNT( CASE WHEN `begintime` >= "25:00" THEN 1 END ) AS `25:00`';
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT '.$select.' FROM ft_lookjump_log WHERE intime>"'.$betime.'" AND intime<"'.$entime.'" AND cid = "'.$id.'"';
      $data['list'] = $pdo->fetchAll($sql);
    }
    return $this->reJson($error,$data);
  }

  public function gradevedioAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看每个视频每个年级播放量统计');
      $data['list'] = array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0);
      $id = $this->dispatcher->getParam('id');
      $error = $this->config->error['success'];
      $bedate = floor($this->request->get('bedate'))?:date('Ymd',strtotime('-1 day'));
      $endate = floor($this->request->getPost('endate'))?:date('Ymd',time());
      $grade = floor($this->request->getPost('grade'));
      $betime = strtotime($bedate);
      $entime = strtotime($endate);
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT count(ll.id) as num,ms.clazz FROM ft_look_log as ll LEFT JOIN ft_member_student as ms ON ll.uid=ms.uid WHERE ll.betime>"'.$betime.'" AND ll.betime<"'.$entime.'" GROUP BY ms.clazz';
      $list = $pdo->fetchAll($sql);
      foreach ($list as $k => $v) {
        if(isset($data['list'][$v['clazz']]))
        {
          $data['list'][$v['clazz']]=$v['num'];
        }
      }
    }
    return $this->reJson($error,$data);
  }

  public function playvediolistAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看视频播放列表');
      $error = $this->config->error['success'];
      $page = floor($this->request->getPost('page'));
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $list = FtLookLog::find(['order'=>'cid DESC','offset' => ($page-1)*$size,'limit'=>$size]);
      foreach ($list as $k => $v) {
        $data[$k]['id'] = $v->id;
        $data[$k]['title'] = $v->FtClass->title;
        $data[$k]['vediosize'] = $v->FtClass->playsize;
        $data[$k]['begintime'] = $v->betime;
        $data[$k]['endtime'] = $v->entime;
      }
    }
    return $this->reJson($error,$data);
  }

  public function userlandAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看个人登录时间统计');
      $error = $this->config->error['success'];
      $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
      $sql = 'SELECT count(ll.id) as num,ms.clazz FROM ft_member_login_log as ll LEFT JOIN ft_member_student as ms ON ll.uid=ms.uid WHERE ll.betime>"'.$betime.'" AND ll.betime<"'.$entime.'" GROUP BY ms.clazz';
      $list = $pdo->fetchAll($sql);
    }
    return $this->reJson($error,$data);
  }

  public function statisticsvedioAction()
  {

  }

  public function statisticsvedioinfoAction()
  {
    $id = $this->dispatcher->getParam('id');
  }

  public function bannerAction()
  {

  }

  public function bannerinfoAction()
  {
    $id = $this->dispatcher->getParam('id');

  }

  public function syssetAction()
  {

  }

  public function getheadmenuAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $error = $this->config->error['success'];
      $num = ZlAdminMessage::count(['receiveid="'.$this->persistent->admin['id'].'"']);
      $data['name'] = '后台管理';
      $data['menu'][] = ['name'=>'通知','ico'=>'/img/notic.png','type'=>'notic','url'=>'/notic','num'=>$num];
      $list[] = ['name'=>'退出','ico'=>'/img/logout.png','url'=>'/logout'];
      $data['menu'][] = ['name'=>'个人中心','ico'=>'/img/user.png','type'=>'down','url'=>'','list'=>$list,'show'=>0];
      $user = ['name'=>'管理员','ico'=>'/img/myinfo.png','type'=>'user','url'=>'/myinfo','list'=>[]];
      // $admin = $this->persistent->admin;
      $data['menu'][] = $user;
    }
    return $this->reJson($error,$data);
  }

  public function getleftmenuAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax()&&!empty($this->persistent->admin))
    {
      $error = $this->config->error['success'];
      $list[] = ['name'=>'数据分析', 'ico'=>'/img/Dataanalysis.svg', 'type'=>'down', 'list'=>[
          [
            'name'=>'基础数据', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/statistics/basics', 'act'=>in_array($this->persistent->code,['adstatistics'])?1:0
          ],
          [
            'name'=>'视频数据', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/statistics/vedio', 'act'=>in_array($this->persistent->code,['adstatisticsvedio','adstatisticsvedioinfo'])?1:0
          ]
        ],
        'act'=>in_array($this->persistent->code,['adstatistics','adstatisticsvedio','adstatisticsvedioinfo'])?1:0
      ];
      $list[] = ['name'=>'账户管理', 'ico'=>'/img/accountmanagement.svg', 'type'=>'down', 'url'=>'', 'list'=>[
          [
            'name'=>'老师账户', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/userlist/teacher', 'act'=>in_array($this->persistent->code,['adulistteacher'])?1:0
          ],
          [
            'name'=>'机构账户', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/userlist/organ', 'act'=>in_array($this->persistent->code,['adulistorgan'])?1:0
          ],
          [
            'name'=>'教学管家', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/userlist/steward', 'act'=>in_array($this->persistent->code,['aduliststeward'])?1:0
          ],
          [
            'name'=>'用户列表', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/userlist/student', 'act'=>in_array($this->persistent->code,['aduliststudent'])?1:0
          ],
          [
            'name'=>'管理员', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/userlist/manage', 'act'=>in_array($this->persistent->code,['adulistmanage','aduinfomanage'])?1:0
          ],
          [
            'name'=>'操作记录', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/userlist/operationrecord', 'act'=>in_array($this->persistent->code,['aduseractlog'])?1:0
          ]
        ],
        'act'=>in_array($this->persistent->code,['adulistteacher','adulistorgan','aduliststeward','aduliststudent','adulistmanage','aduinfomanage','aduseractlog'])?1:0
      ];
      $list[] = ['name'=>'题库管理', 'ico'=>'/img/Managementofquestionbank.svg', 'type'=>'down', 'url'=>'', 'list'=>[
          [
            'name'=>'章管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/testtype/chapter', 'act'=>in_array($this->persistent->code,['adtestchapter'])?1:0
          ],
          [
            'name'=>'节管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/testtype/joint', 'act'=>in_array($this->persistent->code,['adtestjoint'])?1:0
          ],
          [
            'name'=>'知识点管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/testtype/knowledge', 'act'=>in_array($this->persistent->code,['adtestknowledge'])?1:0
          ],
          [
            'name'=>'试题管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/testtype/testlist', 'act'=>in_array($this->persistent->code,['adtestlist'])?1:0
          ],
          [
            'name'=>'试卷管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/testtype/testpaper', 'act'=>in_array($this->persistent->code,['adtestpaper'])?1:0
          ],
          [
            'name'=>'试题纠错', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/testtype/testrecovery', 'act'=>in_array($this->persistent->code,['testrecovery'])?1:0
          ]
        ],
        'act'=>in_array($this->persistent->code,['adtestchapter','adtestjoint','adtestknowledge','adtestlist','adtestpaper','testrecovery'])?1:0
      ];
      $list[] = ['name'=>'内容管理', 'ico'=>'/img/Contentmanagement.svg', 'type'=>'down', 'url'=>'', 'list'=>[
          [
            'name'=>'课程视频', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/management/course', 'act'=>in_array($this->persistent->code,['adcourse'])?1:0
          ],
          [
            'name'=>'banner管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/management/banner', 'act'=>in_array($this->persistent->code,['adbanner'])?1:0
          ],
          [
            'name'=>'金牌老师', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/management/absteacher', 'act'=>in_array($this->persistent->code,['absteacher'])?1:0
          ]
        ],
        'act'=>in_array($this->persistent->code,['adcourse','adbanner','absteacher'])?1:0
      ];
      $list[] = ['name'=>'劵码管理', 'ico'=>'/img/Vouchercodemanagement.svg', 'type'=>'down', 'url'=>'', 'list'=>[
          [
            'name'=>'兑换码管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/Voucher/redeemcode', 'act'=>in_array($this->persistent->code,['adredeemcode'])?1:0
          ],
          [
            'name'=>'优惠劵管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/Voucher/couponcode', 'act'=>in_array($this->persistent->code,['adcouponcode'])?1:0
          ]
        ],
        'act'=>in_array($this->persistent->code,['adredeemcode','adcouponcode'])?1:0
      ];
      $list[] = ['name'=>'资金管理', 'ico'=>'/img/fundmanagement.svg', 'type'=>'down', 'url'=>'', 'list'=>[
          [
            'name'=>'购买vip', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/fund/vip', 'act'=>in_array($this->persistent->code,['adfunvip'])?1:0
          ],
          [
            'name'=>'购买课程', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/fund/class', 'act'=>in_array($this->persistent->code,['adfunclass'])?1:0
          ],
          [
            'name'=>'退款管理', 'ico'=>'/img/Unselectedpull.svg', 'type'=>'a', 'url'=>'/fund/refund', 'act'=>in_array($this->persistent->code,['adrefund'])?1:0
          ]
        ],
        'act'=>in_array($this->persistent->code,['adfunvip','adfunclass','adrefund'])?1:0
      ];
      $list[] = ['name'=>'校区年级管理', 'ico'=>'/img/Schoolgradeclass.svg', 'type'=>'a', 'url'=>'/school'];
      $list[] = ['name'=>'网站配置', 'ico'=>'/img/Websiteconfiguration.svg', 'type'=>'a', 'url'=>'/sysset'];
      $data['menu'] = $list;
    }
    return $this->reJson($error,$data);
  }

  public function badminAction()
  {
    $username = 'manage';
    $user = ZlAdmin::findFirstByName($username);
    if(empty($user))
    {
      $user = new ZlAdmin();
      $user->name = $username;
      $user->psw = $this->security->hash('123456');
      $user->pswcode = 'abc123';
    }
    $user->type = 6;
    $user->phone = '18680885691';
    $user->email = 'zhou69.1@qq.com';
    $user->power = ['adtestchapter','adulistmanage','adulist','adstatistics','aduserlist','aduserinfo','aduseractlog','adredeemcode','adtesttype','adtestpaper','adtestlist','adtestrecovery','adcourse','adbanner','adteacher','adcomment','adfund','adrefund','adsysset','adactivity','adschool','adaddmanage'];
    $user->addtime = time();
    $user->status = 2;
    var_dump($user->save());
  }

  public function syssetdataAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      if(!empty($this->request->getPost('list')))
      {
        $list = $this->request->getPost('list');
        foreach ($list as $k => $v)
        {
          if(!empty($v['id']))
          {
            $info = ZlSysconfig::findFirstById($v['id']);
            if($v['type']=='arr')
            {
              $info->val = json_encode($v['value']);
            }elseif ($v['type']=='str') {
              $info->val = $v['value'];
            }
            $info->save();
            $this->addsyslog('更新系统配置','up');
          }
        }
      }
      $list = ZlSysconfig::find();
      foreach ($list as $k => $v) {
        $val = $v->type == 'arr'&&!empty($v->val) ? json_decode($v->val) : $v->val;
        $data['list'][]=[
          'id' => $v->id,
          'code' => $v->code,
          'name' => $v->name,
          'type' => $v->type,
          'value' => $val
        ];
      }
      $error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

  public function loginAction()
  {
    if(!empty($this->persistent->admin))
    {
      $this->response->redirect("/");
    }
    if($this->request->isPost())
    {
      $error = $this->config->error['dataerror'];
      // if($this->security->checkToken())
      // {
        $username = $this->request->getPost('username');
        $psw = $this->request->getPost('password');
        //var_dump($username);exit;
        $user = ZlAdmin::findFirstByName($username);
        if(empty($user)||$user->status==0)
        {
          $error = $this->config->error['unameerror'];
        }else{
          if($user->status==1)
          {
            $error = $this->config->error['noaudit'];
          }else{
            if($this->security->checkHash($psw, $user->psw))
            {
              $error = $this->config->error['success'];
              $filename = 'uinfo'.$user->id;
              $this->cookies->set($this->config->loginname,$filename);
              $this->modelsCache->save($filename,$user->toarray());
              $this->persistent->admin = $user->toarray();
            }else{
              $error = $this->config->error['pswerror'];
            }
          }
        }
      // }
      return $this->reJson($error);
    }
    $this->view->jsfile = 'login';
  }

  public function logoutAction()
  {
    $this->modelsCache->delete($filename);
    $this->persistent->admin = null;
    if($this->request->isAjax())
    {
      $error = $this->config->error['success'];
      return $this->reJson($error);
    }
    $this->response->redirect("/login");
  }

  public function nopowerAction()
  {
    if($this->request->isAjax())
    {
      $error = $this->config->error['nopower'];
      return $this->reJson($error);
    }
    $this->view->act = 'nopower';
  }

  public function notFoundAction()
  {
    if($this->request->isAjax())
    {
      $error = $this->config->error['dataerror'];
      return $this->reJson($error);
    }
    $this->view->act = 'noweb';
  }
}