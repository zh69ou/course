<?php

/**
 * 用户操作类
 */
interface userinterface{

	#设置配置文件
	public function SetConfig($config);

	#获取用户信息 return {name,url,onlycode,type}
	public function GetInfo();

	#检查/获取授权
	public function CheckImpower();

}