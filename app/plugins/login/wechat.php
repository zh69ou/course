<?php

/**
 * 微信登录
 */
class wechat extends userinterface
{

	#设置配置文件
	public function SetConfig($config)
	{
		$this->user = !empty($config->user)?$config->user:'';
	}

	#获取用户信息
	public function GetInfo()
	{
		return $this->user;
	}

	#检查/获取授权
	public function CheckImpower()
	{
		return true;
	}
}