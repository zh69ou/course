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
	protected $lasttime = 'usetime';

	# 用户唯一识别码
	protected $usercode = '';

	# COOKIE存储时间
	protected $savetime = 0;

	# cookie有效期 number 0关闭有效期
	protected $indate = 0;

	# 状态码及返回信息 array
	protected $code = [];

	# 登录账号保存COOKIE名称
	protected $landname = 'uuid';

	# 第三方登录信息临时保存名称
	protected $threename = 'user_temp';

	public function __construct($app)
	{
		$this->app = &$app;
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
	 * 设置登录
	 */
	public function SetLogin($name,$psw)
	{
		$user = $this->GetUser($name);
		if(!empty($user))
		{
			if($user->password==$this->CryptPsw($psw,$user->salt))
			{
				$this->userinfo = $user;
				$this->SetCookies($this->landname,$name);
				$this->SetCookies($this->lasttime,time());
				return true;
			}
		}
		return false;
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
				$user = $this->GetUser($tuser->onlycode,$tuser->type);
				# 缓存数据
				if(empty($user))
				{
					$this->SetCookies($this->threename,$tuser);
				}
			}
		}
	}

	/**
	 * 获取用户 local本地 wechat微信 weibo新浪微博
	 */
	public function GetUser($value='',$type='local')
	{
		if($type=='local')
		{
			$user = FtMemberLogin::findFirstByUsername($value);
		}

		return !empty($user)?$user:'';
	}

	/**
	 * 设置用户
	 */
	public function SetUser($name='',$psw='123456',$img='')
	{
		# 没有创建用户/有更新数据
		$user = $this->GetUser($name);
		if(empty($user))
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
				# 更新头像
				if(!empty($img)) {}
			}
		}else{
			$user->logintime = time();
			$user->salt = $code = RandomNum();
			$user->password = $this->CryptPsw($psw,$code);
			if($user->save()!==false)
			{
				# 更新头像
				if(!empty($img)) {}
			}
		}
		# 更新第三方登录资料到数据库
		$tuser = $this->GetCookies($this->threename);
		if(!empty($tuser)){}
	}

	/**
	 * 通过COOKIE判断用户
	 */
	protected function CheckCookie()
	{
		# 判断登录是否过期
		$user = $this->GetCookies($this->landname);
		if(!$this->IsLanded()&&!empty($user))
		{
			if(empty($this->userinfo))
			{
				$this->userinfo = $this->GetUser($user);
			}
			$this->SetCookies($this->lasttime,time());
			return true;
		}else{
			$this->DelCookies($this->lasttime);
			return false;
		}
	}

	/**
	 * 通过实时验证登录码（待开发）
	 */
	protected function CheckAccess()
	{
		return false;
	}

	/**
	 * 退出
	 */
	public function Loginout()
	{
		$this->DelCookies($this->landname);
		$this->DelCookies($this->lasttime);
		$this->userinfo = null;
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
	public function IsLanded()
	{
		if(empty($this->indate))
		{
			return false;
		} else {
			return $status = (empty($this->GetCookies($this->lasttime))||$this->GetCookies($this->lasttime) + $this->indate < time()) ? true : false;
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