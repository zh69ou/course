<?php

/**
 * 安全管理
 */
class Safety
{
	# 注入项目对象
	protected $app;

	# 用户信息 object
	protected $userinfo;

	# 用户权限 array
	protected $userpower;

	# 用户COOKIE最后操作时间名称
	protected $lasttime = '';

	# 用户唯一识别码
	protected $usercode = '';

	# COOKIE存储时间
	protected $savetime = 0;

	# cookie有效期 number 0关闭有效期
	protected $indate = 0;

	# 状态码及返回信息 array
	protected $code = [];

	public function __construct($app)
	{
		$this->app = $app;
		$this->SetSysinfo();
	}

	/**
	 * 装载系统配置
	 */
	public function SetSysinfo()
	{
		if($this->app->config)
		{
			$this->indate = $this->app->config->cookieindate;
			$this->code = $this->app->config->error;
			$this->usercode = $this->app->config->usercodename;
			$this->lasttime = $this->app->config->lasttimename;
			$this->savetime = $this->app->config->savetime;
		}
	}

	/**
	 * 通过用户信息，判断是否登录
	 */
	public function IsLogin()
	{
		return ($this->CheckCookie()||$this->CheckAccess()) ? true : false;
	}

	/**
	 * 三方登录
	 */
	public function ThreeLand($value='wechat')
	{
		require_once(APP_PATH.'/plugins/login/'.$value.'.php');
		$thclass = new $value();
		if(isset($this->app->config->$value))
		{
			$thclass->SetConfig($this->app->config->$value);
		}
		if($thclass->CheckImpower())
		{
			$tuser = $thclass->GetInfo();
			# 判断用户是否注册
			if(isset($tuser->type)&&isset($tuser->onlycode))
			{
				# 获取数据库用户信息
				$user = GetUser($tuser->onlycode,$tuser->type);
				# 缓存数据
				if(empty($user))
				{
					$this->SetCookies('user_temp',$tuser);
				}
			}
		}
	}

	/**
	 * 获取用户
	 */
	public function GetUser($value='',$type='local')
	{
		# code...
	}

	/**
	 * 设置用户
	 */
	public function SetUser($name='',$psw='123456',$img='')
	{
		# 没有创建用户/有更新数据
		if(empty($this->GetUser($name)))
		{
			$user = new FtMemberLogin();
			$user->username = $name;
			$user->salt = $code = RandomNum();
			$user->loginip = $this->app->request->getClientAddress();
			$user->password = $this->CryptPsw($psw,$code);
			$user->logintime = time();
			$user->inputtime = time();
			$user->status = 1;
			if($user->save()!==false)
			{
				return $this->ErrorCode('noregin');
			}
		}else{
			$user->salt = $code = RandomNum();
			$this->userinfo->password = $this->CryptPsw($psw,$code);
			if(!empty($img)){}
		}
		$tuser = $this->GetCookies('user_temp');
	}

	/**
	 * 通过COOKIE判断用户
	 */
	protected function CheckCookie()
	{
		return true;
	}

	/**
	 * 通过实时验证登录码
	 */
	protected function CheckAccess()
	{
		return true;
	}

	/**
	 * 退出
	 */
	public function Loginout()
	{
		return true;
	}

	/**
	 * 设置COOKIE
	 */
	public function SetCookies($key,$value,$time = '')
	{
		$time = $time==''?$this->savetime:$time;
		if($this->app->cookies)
		{
			$this->app->cookies->set($key, $value, time()+$time);
			$this->app->cookies->send();
		}else{
			$value=json_encode($value);
			setcookie($key, $value, time()+$time);
		}
	}

	/**
	 * 获取COOKIE
	 */
	public function GetCookies($key)
	{
		if($this->app->cookies)
		{
			if($this->app->cookies->has($key))
			{
				return $this->app->cookies->get($key)->getValue();
			}
		}else{
			return $_COOKIE($key)?json_decode($_COOKIE($key)):"";
		}
	}

	/**
	 * 删除COOKIE
	 */
	public function DelCookies($key)
	{
		if($this->app->cookies)
		{
			if($this->app->cookies->has($key))
			{
				$this->app->cookies->get($key)->delete();
			}
		}else{
			setcookie($key, "", time()-3600);
		}
	}

	/**
	 * 加密密码
	 */
	public function CryptPsw($psw,$cry)
	{
		return md5(md5($psw.$cry));
	}

	/**
	 * 通过存储COOKIE值的时间，判断是否登录过期
	 */
	public function IsLanding()
	{
		if(empty($this->indate))
		{
			return false;
		} else {
			return $status = (empty($this->cookies['usetime'])||$this->cookies['usetime'] + $this->indate < time()) ? true : false;
		}
	}

	/**
	 * 根据状态返回错误信息
	 * @param integer $code [状态码]
	 */
	public function ErrorCode($code='success')
	{
		return isset($this->code->$code) ? $this->code->$code : $this->code->dataerror;
	}
}