<?php

class TestController extends ControllerBase
{
	public function knowledgeAction()
	{
	}

	public function knowledgedataAction()
	{
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看知识点');
      $grade = floor($this->request->getPost('gradeid'));
      $keywrods = $this->request->getPost('keywrods');
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      if(!empty($keywrods))
      {
      	$arr['conditions']='name like "%'.$keywrods.'%"';
      }
      $where = !empty($grade)?'gradeid="'.$grade.'"':'';
    	$arr[] = $where;
    	$list = FtKnowledgePointer::find($arr);
    	foreach ($list as $k => $v) {
    		$data['list'][]=array(
    			'id' => $v->id,
    			'name' => $v->name,
    			'gradeid' => $v->gradeid,
    			'grade' => $v->FtGrade->name,
    			'sectionid' => $v->chapid,
    			'sectionname' => $v->FtChapter->name,
    			'panelidid' => $v->burlid,
    			'panelidname' => $v->FtBurl->name
    		);
    	}
    	$error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

	public function knowledgeinfoAction()
	{
		$id = $dispatcher->getParam('id');
	}

	public function jointAction()
	{
	}

	public function jointinfoAction()
	{
		$id = $dispatcher->getParam('id');
	}

	public function chapterAction()
	{
	}

	public function testtypeAction()
	{
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看试题类型');
    	$list = FtClassCat::find();
    	foreach ($list as $k => $v)
    	{
    		$data[]=array(
    			'id' => $v->id,
    			'name' => $v->name
    		);
    	}
  		$error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

	public function testtypedataAction()
	{
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看试题章/节');
      $id = floor($this->request->getPost('id'));
      $grade = floor($this->request->getPost('grade'));
      $keywrods = $this->request->getPost('keywrods');
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      if(!empty($keywrods))
      {
      	$arr['conditions']='name like "%'.$keywrods.'%"';
      }
      $where = !empty($grade)?'clazzid="'.$grade.'"':'';
      if(empty($id))
      {
      // 章
      	$arr[] = $where;
      	$list = FtChapter::find($arr);
      	foreach ($list as $k => $v) {
      		$data[]=array(
      			'id' => $v->id,
      			'pid' => 0,
      			'name' => $v->name,
      			'gradeid' => $v->clazzid
      		);
      	}
      }else{
      // 节
      	$where .= !empty($where)?' and ':'';
      	$where .= 'chapterid = "'.$id.'"';
      	$arr[] = $where;
      	$list = FtBurl::find($arr);
      	foreach ($list as $k => $v) {
      		$data[]=array(
      			'id' => $v->id,
      			'pid' => $v->chapterid,
      			'name' => $v->name,
      			'gradeid' => $v->clazzid
      		);
      	}
      }
    	$error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

  public function testtypeinfoAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看试题章/节详细');
      $id = floor($this->request->getPost('id'));
      $pid = floor($this->request->getPost('pid'));
      if(empty($pid))
      {
      	$info = FtChapter::findFirstById($id);
      	$data=array(
      			'id' => $info->id,
      			'pid' => 0,
      			'name' => $info->name,
      			'gradeid' => $info->clazzid
      		);
      }else{
      	$info = FtBurl::findFirstById($id);
      	$data=array(
      			'id' => $info->id,
      			'pid' => $info->chapterid,
      			'name' => $info->name,
      			'gradeid' => $info->clazzid
      		);
      }
    	$error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

  public function testtypeaddAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('添加试题章/节详细','into');
      $id = floor($this->request->getPost('id'));
      $pid = floor($this->request->getPost('pid'));
      $name = $this->request->getPost('name');
      $gradeid = floor($this->request->getPost('gradeid'));
      if(empty($pid))
      {
      	$info = new FtChapter();
      	$info->name = $name;
      	$info->clazzid = $gradeid;
      	$info->subjectid = 2;
      	$info->status = 1;
      	$info->inputtime = time();
      	if($info->save()!==false)
      	{
    			$error = $this->config->error['success'];
      	}
      }else{
      	$info = new FtBurl();
      	$info->name = $name;
      	$info->clazzid = $gradeid;
      	$info->chapterid = $pid;
      	$info->subjectid = 2;
      	$info->status = 1;
      	$info->inputtime = time();
      	if($info->save()!==false)
      	{
    			$error = $this->config->error['success'];
      	}
      }
    }
    return $this->reJson($error,$data);
  }

  public function testtypeeditAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('编辑试题章/节详细','up',$id);
      $id = floor($this->request->getPost('id'));
      $pid = floor($this->request->getPost('pid'));
      $name = $this->request->getPost('name');
      $gradeid = floor($this->request->getPost('gradeid'));
      if(empty($pid))
      {
      	$info = FtChapter::findFirstById($id);
      	$info->name = $name;
      	$info->clazzid = $gradeid;
      	$info->subjectid = 2;
      	$info->status = 1;
      	$info->inputtime = time();
      	if($info->save()!==false)
      	{
    			$error = $this->config->error['success'];
      	}
      }else{
      	$info = FtBurl::findFirstById($id);
      	$info->name = $name;
      	$info->clazzid = $gradeid;
      	$info->chapterid = $pid;
      	$info->subjectid = 2;
      	$info->status = 1;
      	$info->inputtime = time();
      	if($info->save()!==false)
      	{
    			$error = $this->config->error['success'];
      	}
      }
    }
    return $this->reJson($error,$data);
  }

  public function testtypedelAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($this->request->getPost('id'));
      $pid = floor($this->request->getPost('pid'));
      $this->addsyslog('删除试题章/节详细','del',$id);
      if(empty($pid))
      {
      	$info = FtChapter::findFirstById($id);
      	if(!empty($info)&&$info->delete()!==false)
      	{
    			$error = $this->config->error['success'];
      	}
      }else{
      	$info = FtBurl::findFirstById($id);
      	if(!empty($info)&&$info->delete()!==false)
      	{
    			$error = $this->config->error['success'];
      	}
      }
    }
    return $this->reJson($error,$data);
  }

  public function gradedataAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看年级列表');
    	$list = FtGrade::find();
    	foreach ($list as $k => $v)
    	{
    		$data[]=array(
    			'id' => $v->id,
    			'name' => $v->name
    		);
    	}
  		$error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

	public function chapterinfoAction()
	{
		$id = $dispatcher->getParam('id');
	}

	public function testpaperAction()
	{
	}

  public function testdataAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $gradeid = floor($this->request->getPost('gradeid'));
      $sectionid = floor($this->request->getPost('sectionid'));
      $panelid = floor($this->request->getPost('panelid'));
      $knowledgeid = floor($this->request->getPost('knowledgeid'));
      $keywrods = $this->request->getPost('keywrods');
      // 查找试题ID
      $wh = '';
      if(!empty($gradeid))
      {
        $wh = !empty($wh)?$wh.' AND ':'';
        $wh .= 'clazzid="'.$gradeid.'"';
      }
      if(!empty($sectionid))
      {
        $wh = !empty($wh)?$wh.' AND ':'';
        $wh .= 'chapterid="'.$sectionid.'"';
      }
      if(!empty($panelid))
      {
        $wh = !empty($wh)?$wh.' AND ':'';
        $wh .= 'burlid="'.$panelid.'"';
      }
      if(!empty($knowledgeid))
      {
        $wh = !empty($wh)?$wh.' AND ':'';
        $wh .= 'point_id="'.$knowledgeid.'"';
      }
      $question = FtQuestion::find([$wh]);
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      $conditions = '';
      foreach ($question as $k => $v)
      {
        $cid[] = 'content like "%'.$v->id.'%"';
      }
      if(!empty($cid))
      {
        $conditions = !empty($conditions)?$conditions.' AND ':'';
        $conditions .= '('.join(' OR ',$cid).')';
      }
      if(!empty($keywrods))
      {
        $conditions = !empty($conditions)?$conditions.' AND ':'';
        $conditions .= 'title like "%'.$keywrods.'%"';
      }
      if(!empty($conditions))
      {
        $arr['conditions']=$conditions;
      }
      $error = $this->config->error['success'];
      $this->addsyslog('查看试卷列表');
      $list = FtTestPaper::find($arr);
      foreach ($list as $k => $v) {
        $data['list'][] = array(
          'id' => $v->id,
          'title' => $v->title,
          'test' => $v->content,
          'typeid' => $v->type,
          'gradeid' => $v->gradeid,
          'teacherid' => $v->uid,
          'teachername' => $v->FtMemberTeacher->name,
          'pushtime' => $v->inputtime
        );
      }
    }
    return $this->reJson($error,$data);
  }

  public function testinfodataAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($dispatcher->getParam('id'));
      $error = $this->config->error['success'];
      $this->addsyslog('查看试卷信息数据');
      $info = FtTestPaper::findFirstById($id);
      $data = array(
        'id' => $info->id,
        'title' => $info->title,
        'test' => $info->content,
        'typeid' => $info->type,
        'gradeid' => $info->gradeid,
        'teacherid' => $info->uid,
        'teachername' => $info->FtMemberTeacher->name,
        'pushtime' => $info->inputtime
      );
    }
    return $this->reJson($error,$data);
  }

  public function testinfoeditAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($dispatcher->getParam('id'));
      $error = $this->config->error['success'];
      $info = FtTestPaper::findFirstById($id);
      if(!empty($info))
      {
        $info->title = $this->request->getPost('title');
        $info->type = $this->request->getPost('typeid');
        $info->gradeid = $this->request->getPost('gradeid');
        $info->uid = $this->request->getPost('teacherid');
        if($info->save()!==false)
        {
          $this->addsyslog('编辑试卷信息','up',$id);
          $error = $this->config->error['success'];
        }
      }
    }
    return $this->reJson($error,$data);
  }

  public function testinfodelAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($dispatcher->getParam('id'));
      $info = FtTestPaper::findFirstById($id);
      if(!empty($info)&&$info->delete()!==false)
      {
        $this->addsyslog('删除试卷信息','del',json_encode($info));
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

	public function testlistAction()
	{
	}

  public function usetestAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($dispatcher->getParam('id'));
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      $arr[] = 'testid = "'.$id.'"';
      $list = FtTestPaperPushlog::find($arr);
      $this->addsyslog('查看试卷答题列表');
      if(count($list)>0)
      {
        foreach ($list as $k => $v) {
          $data['list'][] = [
            'id' => $v->id,
            'testid' => $v->testid,
            'testname' => $v->FtTestPaper->title,
            'userid' => $v->sid,
            'username' => $v->FtMemberStudent->name,
            'score' => 0,
            'usetime' => 0,
            'filltime' => 0
          ];
        }
      }
      $error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

  public function questionsAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看试题列表');
      $id = floor($this->request->getPost('id'));
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      if(!empty($id))
      {
        $t = FtTestPaper::findFirstById($id);
        $arr[] = 'id in ('.$t->content.')';
      }
      $list = FtQuestion::find($arr);
      if(count($list)>0)
      {
        foreach ($list as $k => $v) {
          $data['list'][] = [
            'id' => $v->id,
            'gradetid' => $v->gradetid,
            'title' => $v->title,
            'options' => !empty($v->options)?json_decode($v->options):'',
            'correct' => $v->correct,
            'score' => $v->score,
            'analysis' => $v->analysis,
            'level' => $v->level,
            'stars' => $v->stars,
            'sectionid' => $v->chapterid,
            'sectionname' => $v->FtChapter->name,
            'panelid' => $v->burlid,
            'panelname' => $v->FtBurl->name,
            'knowledgeid' => $v->point_id,
            'knowledge' => $v->FtKnowledgePointer->name,
            'type' => $v->type,
            'ability' => $v->math_ability,
            'term' => $v->term,
            'filltime' => $v->finish_time,
            'addtime' => $v->inputtime
          ];
        }
      }
      $error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

  public function questionsinfoAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看试题详细');
      $id = floor($dispatcher->getParam('id'));
      $info = FtQuestion::findFirstById($id);
      $data = [
        'id' => $info->id,
        'gradetid' => $info->gradetid,
        'title' => $info->title,
        'options' => !empty($info->options)?json_decode($info->options):'',
        'correct' => $info->correct,
        'score' => $info->score,
        'analysis' => $info->analysis,
        'level' => $info->level,
        'stars' => $info->stars,
        'sectionid' => $info->chapterid,
        'sectionname' => $info->FtChapter->name,
        'panelid' => $info->burlid,
        'panelname' => $info->FtBurl->name,
        'knowledgeid' => $info->point_id,
        'knowledge' => $info->FtKnowledgePointer->name,
        'type' => $info->type,
        'ability' => $info->math_ability,
        'term' => $info->term,
        'filltime' => $info->finish_time,
        'addtime' => $info->inputtime
      ];
      $error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

  public function questionseditAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($dispatcher->getParam('id'));
      $info = FtQuestion::findFirstById($id);
      $info->gradetid = $this->request->getPost('gradetid');
      $info->title = $this->request->getPost('title');
      $info->options = json_encode($this->request->getPost('options'));
      $info->correct = $this->request->getPost('correct');
      $info->score = $this->request->getPost('score');
      $info->analysis = $this->request->getPost('analysis');
      $info->level = $this->request->getPost('level');
      $info->stars = $this->request->getPost('stars');
      $info->chapterid = $this->request->getPost('sectionid');
      $info->burlid = $this->request->getPost('panelid');
      $info->point_id = $this->request->getPost('knowledgeid');
      $info->type = $this->request->getPost('type');
      $info->math_ability = $this->request->getPost('ability');
      $info->term = $this->request->getPost('term');
      $info->finish_time = $this->request->getPost('filltime');
      $info->inputtime = $this->request->getPost('addtime');
      if($info->save()!==false)
      {
        $this->addsyslog('编辑试题','up',$id);
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function questionsaddAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $info = new FtQuestion;
      $info->gradetid = $this->request->getPost('gradetid');
      $info->title = $this->request->getPost('title');
      $info->options = json_encode($this->request->getPost('options'));
      $info->correct = $this->request->getPost('correct');
      $info->score = $this->request->getPost('score');
      $info->analysis = $this->request->getPost('analysis');
      $info->level = $this->request->getPost('level');
      $info->stars = $this->request->getPost('stars');
      $info->chapterid = $this->request->getPost('sectionid');
      $info->burlid = $this->request->getPost('panelid');
      $info->point_id = $this->request->getPost('knowledgeid');
      $info->type = $this->request->getPost('type');
      $info->math_ability = $this->request->getPost('ability');
      $info->term = $this->request->getPost('term');
      $info->finish_time = $this->request->getPost('filltime');
      $info->inputtime = $this->request->getPost('addtime');
      if($info->save()!==false)
      {
        $this->addsyslog('添加试题','into');
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function errorquestionsAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $keywrods = $this->request->getPost('keywrods');
      if(!empty($keywrods))
      {
        $arr['conditions']='note like "%'.$keywrods.'%"';
      }
      $page = floor($this->request->getPost('page'))?:1;
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      $list = FtQuestionErrorLog::find($arr);
      foreach ($list as $k => $v) {
        $data['list'][] = array(
          'id' => $v->id,
          'title' => $v->FtQuestion->name,
          'content' => $v->note,
          'uid' => $v->endtime,
          'name' => $v->FtMemberStudent->name,
          'phone' => $v->FtMemberStudent->phone,
        );
      }
      $this->addsyslog('查看错题列表');
      $error = $this->config->error['success'];
    }
    return $this->reJson($error,$data);
  }

	public function usertestAction()
	{
		$error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看用户试题');
    	$type = floor($this->request->getPost('type'));
    	$keywrods = $this->request->getPost('keywrods');
    	$page = floor($this->request->getPost('page'))?:1;
    	$uid = floor($this->request->getPost('uid'));
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      $where = 'sid="'.$uid.'"';
    	if(!empty($type))
    	{
    		$where .= ' AND type = "'.$type.'"';
    	}
    	$arr[] = $where;
    	if(!empty($keywrods))
      {
        $arr['conditions']='title like "%'.$keywrods.'%"';
      }
      $error = $this->config->error['success'];
      $list = FtTestPaperPushlog::find($arr);
      foreach ($list as $k => $v) {
      	$data['list'][] = array(
      		'id' => $v->id,
      		'type' => $v->type,
      		'name' => $v->title,
      		'score' => $v->note,
      		'tshow' => $v->note,
      		'time' => $v->inputtime
      	);
      }
    }
    return $this->reJson($error,$data);
	}

	public function testlistinfoAction()
	{
	}

	public function testrecoveryAction()
	{
	}

	public function courseAction()
	{
	}

  public function coursedataAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看课程');
      $keywrods = $this->request->getPost('keywrods');
      $page = floor($this->request->getPost('page'))?:1;
      $gradeid = floor($this->request->getPost('gradeid'));
      $typeid = floor($this->request->getPost('typeid'));
      $sectionid = floor($this->request->getPost('sectionid'));
      $panelid = floor($this->request->getPost('panelid'));
      $knowledgeid = floor($this->request->getPost('knowledgeid'));
      $order = $this->request->getPost('order');
      $sort = strtolower($this->request->getPost('sort'))=='asc'?'ASC':'DESC';
      $size = floor($this->request->getPost('size'))?:$this->config->listsize;
      $arr['offset'] = ($page-1)*$size;
      $arr['limit'] = $size;
      $where = '';
      if(!empty($gradeid))
      {
        $where .= !empty($where) ? ' AND ' : '';
        $where .= ' gradeid = "'.$gradeid.'"';
      }
      if(!empty($typeid))
      {
        $where .= !empty($where) ? ' AND ' : '';
        $where .= ' catid = "'.$typeid.'"';
      }
      if(!empty($sectionid))
      {
        $where .= !empty($where) ? ' AND ' : '';
        $where .= ' chapid = "'.$sectionid.'"';
      }
      if(!empty($panelid))
      {
        $where .= !empty($where) ? ' AND ' : '';
        $where .= ' burlid = "'.$panelid.'"';
      }
      if(!empty($knowledgeid))
      {
        $where .= !empty($where) ? ' AND ' : '';
        $where .= ' pointid = "'.$knowledgeid.'"';
      }
      $arr[] = $where;
      if(!empty($keywrods))
      {
        $arr['conditions']='title like "%'.$keywrods.'%"';
      }
      if($order=='type'){
        $arr['order']='catid '.$sort;
      }elseif ($order=='gradeid') {
        $arr['order']='gradeid '.$sort;
      }else{
        $arr['order']='id '.$sort;
      }
      $error = $this->config->error['success'];
      $type = FtClassCat::find();
      foreach ($tyep as $k => $v) {
        $cat[$v->id]=$v->name;
      }
      $list = FtClass::find($arr);
      foreach ($list as $k => $v) {
        $data['list'][] = array(
          'id' => $v->id,
          'tid' => $v->uid,
          'tname' => $v->FtMemberTeacher->name,
          'title' => $v->title,
          'typeid' => $v->catid,
          'typename' => $cat[$v->catid]?:'',
          'thumb' => $v->thumb,
          'gradeid' => $v->gradeid,
          'gradename' => $v->FtGrade->name,
          'starttime' => $v->starttime,
          'endtime' => $v->endtime,
          'oneplayprice' => $v->play_price,
          'twoplayprice' => $v->playback_price,
          'introduce' => $v->introduce,
          'ispay' => $v->type,
          'note' => $v->note,
          'ishot' => $v->ishot,
          'displayorder' => $v->displayorder,
          'addtime' => $v->inputtime,
          'term' => $v->term,
          'isshow' => $v->showid
        );
      }
    }
    return $this->reJson($error,$data);
  }

	public function courseinfoAction()
	{
	}

  public function courseinfodataAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $this->addsyslog('查看课程详细');
      $id = floor($dispatcher->getParam('id'));
      $error = $this->config->error['success'];
      $type = FtClassCat::find();
      foreach ($tyep as $k => $v) {
        $cat[$v->id]=$v->name;
      }
      $info = FtClass::findFirstById($id);
      $data = array(
        'id' => $info->id,
        'tid' => $info->uid,
        'tname' => $info->FtMemberTeacher->name,
        'title' => $info->title,
        'typeid' => $info->catid,
        'typename' => $cat[$info->catid]?:'',
        'thumb' => $info->thumb,
        'gradeid' => $info->gradeid,
        'gradename' => $info->FtGrade->name,
        'starttime' => $info->starttime,
        'endtime' => $info->endtime,
        'oneplayprice' => $info->play_price,
        'twoplayprice' => $info->playback_price,
        'introduce' => $info->introduce,
        'ispay' => $info->type,
        'note' => $info->note,
        'ishot' => $info->ishot,
        'displayorder' => $info->displayorder,
        'addtime' => $info->inputtime,
        'term' => $info->term,
        'isshow' => $info->showid
      );
    }
    return $this->reJson($error,$data);
  }

  public function courseeditAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($this->dispatcher->getParam('id'));
      $info = FtClass::findFirstById($id);
      $info->uid = floor($this->dispatcher->getParam('tid'));
      $info->title = $this->request->getPost('title');
      $info->catid = floor($this->request->getPost('typeid'));
      $info->thumb = $this->request->getPost('thumb');
      $info->gradeid = floor($this->request->getPost('gradeid'));
      $info->starttime = $this->request->getPost('starttime');
      $info->endtime = $this->request->getPost('endtime');
      $info->play_price = $this->request->getPost('oneplayprice');
      $info->playback_price = $this->request->getPost('twoplayprice');
      $info->introduce = $this->request->getPost('introduce');
      $info->note = $this->request->getPost('note');
      $info->type = $this->request->getPost('ispay');
      $info->ishot = $this->request->getPost('ishot');
      $info->displayorder = $this->request->getPost('displayorder');
      $info->inputtime = $this->request->getPost('addtime');
      $info->term = $this->request->getPost('term');
      $info->showid = $this->request->getPost('isshow');
      if($info->save()!==false)
      {
        $this->addsyslog('编辑课程','up',$id);
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function courseaddAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $info = new FtClass();
      $info->uid = floor($this->dispatcher->getParam('tid'));
      $info->title = $this->request->getPost('title');
      $info->catid = floor($this->request->getPost('typeid'));
      $info->thumb = $this->request->getPost('thumb');
      $info->gradeid = floor($this->request->getPost('gradeid'));
      $info->starttime = $this->request->getPost('starttime');
      $info->endtime = $this->request->getPost('endtime');
      $info->play_price = $this->request->getPost('oneplayprice');
      $info->playback_price = $this->request->getPost('twoplayprice');
      $info->introduce = $this->request->getPost('introduce');
      $info->note = $this->request->getPost('note');
      $info->type = $this->request->getPost('ispay');
      $info->ishot = $this->request->getPost('ishot');
      $info->displayorder = $this->request->getPost('displayorder');
      $info->inputtime = $this->request->getPost('addtime');
      $info->term = $this->request->getPost('term');
      $info->showid = $this->request->getPost('isshow');
      if($info->save()!==false)
      {
        $this->addsyslog('添加课程','into');
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

  public function coursedelAction()
  {
    $error = $this->config->error['dataerror'];
    $data = [];
    if($this->request->isPost()&&$this->request->isAjax())
    {
      $id = floor($this->dispatcher->getParam('tid'));
      $info = FtClass::findFirstById($id);
      if(!empty($info)&&$info->delete()!==false)
      {
        $this->addsyslog('删除课程','del',$id);
        $error = $this->config->error['success'];
      }
    }
    return $this->reJson($error,$data);
  }

	public function schoolAction()
	{
	}

	public function schoolinfoAction()
	{
	}

	public function classAction()
	{
	}

	public function classinfoAction()
	{
	}

}