<?php

/**
 * 首页
 */
class IndexController extends ControllerBase
{

  public function indexAction()
  {
    // echo strtotime('2019-01-01 00:00:00');
    // var_dump(date('Y-m-d H:i:s',1546272000)).'<br>';
  	// exit;
    # 获取banner
    $this->view->banner = GetList('FtBanner',['order'=>'displayorder ASC']);
    # 最新的几节课
    $this->view->course = GetList('FtClass',['del_status=1 and showid=0 and catid=1','order'=>'displayorder DESC,id DESC']);
    # 排名
    $uid = !empty($this->safety->ReturnUser()) ? $this->safety->ReturnUser()->uid : '';
    $this->view->ranked = GetRanked($this->db,$uid);
    // echo '<pre>';var_dump($this->view->ranked);
    echo 4;
    exit;
  }

  public function loginAction()
  {
    if ($this->request->isPost()&&$this->security->checkToken())
    {
      $error = $this->config->error['unameerror'];
      $user = $this->request->getPost('username');
      $psw = $this->request->getPost('password');
      if($this->safety->SetLogin($user,$psw))
      {
        $error = $this->config->error['unameerror'];
      }
      if ($this->request->isAjax())
      {
        return $this->ReturnJson($error);
      }
    }
    # 判断是否已登录
    if($this->safety->IsLogin())
    {
      $this->dispatcher->forward(
          [
              'controller' => 'index',
              'action'     => 'index'
          ]
      );
    }
  }

  public function logoutAction()
  {
    $this->safety->Loginout();
    $this->dispatcher->forward(
        [
            'controller' => 'index',
            'action'     => 'index'
        ]
    );
  }

  # 临时统计数据
  public function statisticsAction()
  {
    $pdo = new \Phalcon\Db\Adapter\Pdo\Mysql($this->config->database->toarray());
    for ($i=2; $i <=6; $i++)
    {
      # 获取每个年级 总播放次数
      // $sql = 'SELECT COUNT(l.id) FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE c.id>=165 AND c.showid=0 AND c.gradeid='.$i.' AND l.entime-l.betime>=300';
      $sql = 'SELECT COUNT(l.id) AS num FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE c.id>=165 AND c.showid=0 AND c.gradeid='.$i.'';
      $allpaynum[$i] = $pdo->fetchOne($sql);
      # 获取每个年级点击次数
      $sql = 'SELECT SUM(play_num) AS num FROM ft_class WHERE id>=165 AND showid=0 AND gradeid='.$i;
      $allpointnum[$i] = $pdo->fetchOne($sql);
      # 获取每个年级每期都观看的人
      $sql = 'SELECT COUNT(uid) AS num FROM ft_member_student WHERE uid IN(SELECT l.uid FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE c.id>=165 AND c.showid=0 AND c.gradeid='.$i.' GROUP BY l.uid,l.cid HAVING COUNT(l.uid)>=3 )';
      $allshownum[$i] = $pdo->fetchOne($sql);
      # 获取只看了一期的人
      $sql = 'SELECT COUNT(uid) AS num FROM (SELECT uid,count(cid) AS snum,name,phone FROM (SELECT l.uid,l.cid,ms.name,ms.phone FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid LEFT JOIN ft_member_student AS ms ON ms.uid=l.uid WHERE c.id>=165 AND c.showid=0 AND c.gradeid='.$i.' AND ms.clazz='.$i.' AND l.entime-l.betime>=300 GROUP BY l.uid,l.cid HAVING COUNT(l.uid)=1) newlist GROUP BY uid HAVING snum=1) list';
      $oneshownum[$i] = $pdo->fetchOne($sql);
      # 重复观看三次以上的人数
      $sql = 'SELECT COUNT(uid) AS num FROM ft_member_student WHERE uid IN(SELECT uid FROM(SELECT l.uid,l.cid,COUNT(l.cid) AS cnum FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE c.id>=165 AND c.showid=0 AND c.gradeid='.$i.' AND l.entime-l.betime>=300 GROUP BY l.uid,l.cid HAVING cnum>=3) AS looknum)';
      $repeat3shownum[$i] = $pdo->fetchOne($sql);
      # 获取单个年级H5观看次数
      $sql = 'SELECT COUNT(uid) AS num FROM ft_member_student WHERE uid IN(SELECT l.uid FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE c.id>=165 AND c.showid=0 AND c.gradeid='.$i.' AND l.ismobile=1)';
      $showh5num[$i] = $pdo->fetchOne($sql);
      # 获取单个年级PC观看次数
      $sql = 'SELECT COUNT(uid) AS num FROM ft_member_student WHERE uid IN(SELECT l.uid FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE c.id>=165 AND c.showid=0 AND c.gradeid='.$i.' AND l.ismobile!=1)';
      $showpcnum[$i] = $pdo->fetchOne($sql);
    }
    $this->view->allpaynum = $allpaynum;
    $this->view->allpointnum = $allpointnum;
    $this->view->allshownum = $allshownum;
    $this->view->oneshownum = $oneshownum;
    $this->view->repeat3shownum = $repeat3shownum;
    $this->view->showh5num = $showh5num;
    $this->view->showpcnum = $showpcnum;
    # 每个课程的播放次数
    $sql = 'SELECT COUNT(l.id) AS num,c.id,c.title,c.gradeid FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE l.cid>=165 AND c.showid=0 GROUP BY c.id';
    $list = $pdo->fetchAll($sql);
    foreach ($list as $k => $v) {
      $classshow[$v['gradeid']][$v['id']] = $v;
    }
    $this->view->classshow = $classshow;
    # 单课程重复观看三次以上的人数
    $sql = 'SELECT COUNT(uid) AS num,cid,title,gradeid FROM(SELECT l.uid,l.cid,c.title,c.gradeid,COUNT(l.cid) AS cnum FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE c.id>=165 AND c.showid=0 AND l.entime-l.betime>=300 GROUP BY l.uid,l.cid HAVING cnum>=3) AS looknum GROUP BY cid';
    $list = $pdo->fetchAll($sql);
    foreach ($list as $k => $v) {
      $classshow3[$v['gradeid']][$v['cid']] = $v;
    }
    $this->view->classshow3 = $classshow3;
    # 单课程H5观看的人数
    $sql = 'SELECT COUNT(l.id) AS num,c.id,c.title,c.gradeid FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE l.ismobile=1 AND l.cid>=165 AND c.showid=0 GROUP BY c.id';
    $list = $pdo->fetchAll($sql);
    foreach ($list as $k => $v) {
      $classh5show[$v['gradeid']][$v['id']] = $v;
    }
    $this->view->classh5show = $classh5show;
    # 单课程PC观看的人数
    $sql = 'SELECT COUNT(l.id) AS num,c.id,c.title,c.gradeid FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid WHERE l.ismobile!=1 AND l.cid>=165 AND c.showid=0 GROUP BY c.id';
    $list = $pdo->fetchAll($sql);
    foreach ($list as $k => $v) {
      $classpcshow[$v['gradeid']][$v['id']] = $v;
    }
    $this->view->classpcshow = $classpcshow;
    # 获取一节课观看三次以上的用户
    // $sql = 'SELECT name,phone,title,gradeid FROM(SELECT l.uid,ms.name,ms.phone,c.title,c.gradeid,l.cid,COUNT(l.cid) AS cnum FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid LEFT JOIN ft_member_student AS ms ON ms.uid=l.uid WHERE c.id>=165 AND c.showid=0 AND l.entime-l.betime>=300 GROUP BY l.uid,l.cid,c.gradeid HAVING cnum>=3 ORDER BY ms.name ASC) AS ulist GROUP BY uid';
    $sql = 'SELECT uid,name,phone,title,gradeid FROM (SELECT l.uid,ms.name,ms.phone,c.title,c.gradeid,l.cid,COUNT(l.cid) AS cnum FROM ft_look_log AS l LEFT JOIN ft_class AS c ON c.id=l.cid LEFT JOIN ft_member_student AS ms ON ms.uid=l.uid WHERE c.id>=165 AND c.showid=0 AND l.entime-l.betime>=300 GROUP BY l.uid,l.cid,c.gradeid HAVING cnum>=3 ORDER BY ms.name ASC) uist WHERE name!=""';
    $list = $pdo->fetchAll($sql);
    foreach ($list as $k => $v) {
      $classshow3user[$v['gradeid']][$v['uid']] = $v;
    }
    $this->view->classshow3user = $classshow3user;
    // echo '<pre>';
    // print_r($classshow3user);exit;
  }

  public function nopowerAction()
  {
  	echo 'no power';exit;
  }

  public function er404Action()
  {
  	echo 404;exit;
  }
}