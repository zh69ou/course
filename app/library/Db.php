<?php
/**
 * 数据库统一管理
 */

	/**
	 * 获取列表
	 * name 获取表名称
	 * where 条件
	 * page 页码
	 * size 数量
	 * field 显示字段逗号(,)分隔
	 */
if(!function_exists('GetList'))
{
	function GetList($name,$where=[],$page=1,$size=10,$field='')
	{
		$page = $page<1 ? 1 : $page;
		$size = $size<1 ? 1 : $size;

		# 条件
		if(!empty($where[0]))$arr[] = $where[0];

		# 显示字段
		if(!empty($where['columns'])) $arr['columns'] = $where['columns'];

		# 分组
		if(!empty($where['group'])) $arr['group'] = $where['group'];

		# 排序
		$arr['order'] = $where['order'];

		# 显示条数
		$arr['limit'] = $size;

		# 开始条数
		$arr['offset'] = ($page-1)*$size;
		$arr['cache'] = ['lifetime' => 3600, 'key' => md5($name.json_encode($where).$page.$size.$field)];

		$list = $name::find($arr);
		return $list;
	}
}

	/**
	 * 获取列表
	 * name 获取表名称
	 * where 条件
	 * page 页码
	 * size 数量
	 * field 显示字段逗号(,)分隔
	 */
if(!function_exists('GetOne'))
{
	function GetOne($name,$where=[],$field='')
	{
		# 条件
		$arr[] = $where[0];

		# 显示字段
		if(!empty($where['columns'])) $arr['columns'] = $where['columns'];

		# 分组
		if(!empty($where['group'])) $arr['group'] = $where['group'];

		# 排序
		if(!empty($where['group'])) $arr['order'] = $where['order'];

		$arr['cache'] = ['lifetime' => 3600, 'key' => md5($name.json_encode($where).$page.$size.$field)];

		$info = $name::findFirst($arr);
		return $info;
	}
}

	/**
	 * 排名
	 */
if(!function_exists('GetRanked'))
{
	function GetRanked($db,$uid = '')
	{
    $sql = 'SELECT uid,@num:=@num+1 AS num,score,name,avatar,sex FROM (SELECT uid,score,name,avatar,sex FROM ft_member_student ORDER BY score DESC,uid ASC) AS obj,(SELECT @num:=0) r';
    $val = $db->fetchAll($sql);
    $user = array();
    $ranked = array();
    if(!empty($val)) {
      foreach($val AS $k => $v) {
        $user[$v['uid']] = $v;
        if($k<=10)
        {
          $ranked[]=$v;
        }
      }
    }
    $list['user'] = !empty($uid)&&isset($user[$uid])?$user[$uid]:'';
    $list['rank'] = $ranked;
		return $list;
	}
}