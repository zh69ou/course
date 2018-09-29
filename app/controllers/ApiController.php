<?php

/**
 * 接口
 */
class ApiController extends ControllerBase
{
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

	public function commentAction()
	{
		$page = $this->request->getPost('page')?:1;
		$size = $this->request->getPost('size')?:16;
		$type = $this->request->getPost('type')?:1;
		$id = $this->request->getPost('id');

		$list = $type==1?GetList('FtClassComment',['cid="'.$id.'" AND pid = 0'],$page,$size):GetList('FtTeacherComment',['tid="'.$id.'"'],$page,$size);
		$error = $this->config->error['success'];
		$comment = $type==1?BuildList([
			'id'=>'id',
			'name'=>'FtMemberStudent->name',
			'img'=>'FtMemberStudent->avatar',
			'content'=>'comment',
			'addtime'=>'starttime'
		],$list):BuildList([
			'id'=>'id',
			'name'=>'FtMemberStudent->name',
			'img'=>'FtMemberStudent->avatar',
			'content'=>'content',
			'addtime'=>'addtime'
		],$list);
		return $this->ReturnJson($error,$comment);
	}
}