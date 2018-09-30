<?php

/**
 * 接口
 */
class ApiController extends ControllerBase
{
	# banner列表
	public function bannerAction()
	{
		$banner = GetList('FtBanner',['order'=>'displayorder ASC']);
		$error = $this->config->error['success'];
		$banner = BuildList([
			'id'=>'id',
			'img'=>'thumb',
			'url'=>'url',
			'sort'=>'displayorder'
		],$banner);
		return $this->ReturnJson($error,$banner);
	}

	# 老师列表
	public function teacherAction()
	{
		$teacher = GetList('FtMemberTeacher',['audit_state=2','order'=>'uid ASC']);
		$error = $this->config->error['success'];
		$teacher = BuildList([
			'id'=>'uid',
			'name'=>'name',
			'img'=>'avatar',
			'sort'=>'status'
		],$teacher);
		return $this->ReturnJson($error,$teacher);
	}

	# 老师详情
	public function teacherinfoAction()
	{
		$id = $this->dispatcher->getParam('id');
		$info = GetOne('FtMemberTeacher',['uid='.$id]);
		$course = GetOne('FtClass',['uid='.$id,'order'=>'id DESC']);
		$error = $this->config->error['success'];
		$teacher = BuildInfo([
			'id'=>'uid',
			'name'=>'name',
			'img'=>'avatar',
			'infodesc'=>'infodesc',
			'teachdesc'=>'teachdesc',
			'attentnum'=>'subscribe',
			'learnyear'=>'FtMemberTeacherForm->teach_age',
			'learnum'=>'total'
		],$info);
		$teacher['grade'] = $course->gradeid;
		return $this->ReturnJson($error,$teacher);
	}

	# 课程列表
	public function courseAction()
	{
		$page = $this->request->getPost('page')?:1;
		$size = $this->request->getPost('size')?:16;

		# 查询条件
		$where = 'del_status=1';
		$tid = $this->request->getPost('teacher');
		if(!empty($tid)) $where.=' AND uid="'.$tid.'"';
		$gid = $this->request->getPost('grade');
		if(!empty($gid)) $where.=' AND gradeid="'.$gid.'"';
		$type = $this->request->getPost('type');
		if(!empty($type)) $where.=' AND catid="'.$type.'"';
		$arr[] = $where;

		# 查询关键词
		$key = $this->request->getPost('keywords');
		if(!empty($key)) $arr['conditions'] = 'title like "%'.$key.'%"';

		$arr['order'] = 'displayorder DESC, id DESC';

		$list = GetList('FtClass',$arr,$page,$size);
		$error = $this->config->error['success'];
		$course = BuildList([
			'id'=>'uid',
			'title'=>'title',
			'name'=>'FtMemberTeacher->name',
			'grade'=>'gradeid',
			'img'=>'thumb',
			'showtime'=>'starttime',
			'sort'=>'displayorder'
		],$list);
		return $this->ReturnJson($error,$course);
	}

	# 课程详情
	public function courseinfoAction()
	{
		$id = $this->dispatcher->getParam('id');
		$info = GetOne('FtClass',['id='.$id]);
		$error = $this->config->error['success'];
		$course = BuildInfo([
			'id'=>'uid',
			'title'=>'title',
			'name'=>'FtMemberTeacher->name',
			'doc'=>'introduce',
			'peoplenum'=>'play_num',
			'lineprice'=>'play_price',
			'backprice'=>'playback_price',
			'grade'=>'gradeid',
			'img'=>'thumb',
			'payid'=>'vid',
			'showtime'=>'starttime',
			'sort'=>'displayorder'
		],$info);
		return $this->ReturnJson($error,$course);
	}

	# 评论列表
	public function commentAction()
	{
		$page = $this->request->getPost('page')?:1;
		$size = $this->request->getPost('size')?:16;
		$type = $this->request->getPost('type')?:1;
		$id = $this->request->getPost('id')?:190;

		$list = $type==1?GetList('FtClassComment',['cid="'.$id.'"'],$page,$size):GetList('FtTeacherComment',['tid="'.$id.'"'],$page,$size);
		$error = $this->config->error['success'];
		$comment = $type==1?BuildList([
			'id'=>'id',
			'name'=>'FtMemberStudent->name',
			'img'=>'FtMemberStudent->avatar',
			'content'=>'comment',
			'addtime'=>'starttime'
		],$list,'id','pid'):BuildList([
			'id'=>'id',
			'name'=>'FtMemberStudent->name',
			'img'=>'FtMemberStudent->avatar',
			'content'=>'content',
			'addtime'=>'addtime'
		],$list,'id','pid');
		return $this->ReturnJson($error,$comment);
	}

	# 添加留言
	public function addcommentAction()
	{
		$error = $this->config->error['dataerror'];
		$pid = $this->request->getPost('pid')?:0;
		$id = $this->request->getPost('id')?:0;
		$type = $this->request->getPost('type')?:1;
		$content = htmlspecialchars(strip_tags($this->request->getPost('content')));
		$uid = !empty($this->safety->ReturnUser()) ? $this->safety->ReturnUser()->uid : '';
		if(!empty($uid))
		{
			if($type==1)
			{
				$arr = [
					'cid' => $id,
					'pid' => $pid,
					'uid' => $uid,
					'comment' => $content,
					'inputtime' => time()
				];
				if(AddData('FtClassComment',$arr))
				{
					$error = $this->config->error['success'];
				}
			}else{
				$arr = [
					'tid' => $id,
					'pid' => $pid,
					'sid' => $uid,
					'content' => $content,
					'addtime' => time()
				];
				if(AddData('FtClassComment',$arr)) $error = $this->config->error['success'];
			}
		}else{
			$error = $this->config->error['noland'];
		}
		return $this->ReturnJson($error);
	}

	# 关注老师
	public function teacheriattentionAction()
	{
		$error = $this->config->error['dataerror'];
		$id = $this->request->getPost('id');
		$uid = !empty($this->safety->ReturnUser()) ? $this->safety->ReturnUser()->uid : '';
		if(!empty($id))
		{
			if(!empty($uid))
			{
				$arr = [
					'tid' => $id,
					'pid' => $pid,
					'sid' => $uid,
					'content' => $content,
					'addtime' => time()
				];
				if(AddData('FtClassComment',$arr)) $error = $this->config->error['success'];
			}else{
				$error = $this->config->error['noland'];
			}
		}
		return $this->ReturnJson($error);
	}
}