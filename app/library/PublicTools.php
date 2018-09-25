<?php
# 公用工具

# 发送短信
if(!function_exists('SendSMS'))
{
	function SendSMS($phone,$content)
	{
		// $post_data = array(
		//     "account" => "sdk_cq14k",
		//     "password" => "14ke#ps168",
		//     "destmobile" => $phone,
		//     "msgText" => "【14课】".$content,
		//     "sendDateTime" => ""
		// );
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_HEADER, false);
		// curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// $post_data = http_build_query($post_data);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		// curl_setopt($ch, CURLOPT_URL, 'http://www.jianzhou.sh.cn/JianzhouSMSWSServer/http/sendBatchMessage');
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		// $return = curl_exec($ch);
		// curl_close($ch);
		// return $return;
	}
}

# 判断是否是手机浏览器
if(!function_exists('IsMobile'))
{
	function IsMobile()
	{
		if(isset($_SERVER['HTTP_X_WAP_PROFILE'])){return TRUE;}

		if(isset($_SERVER['HTTP_VIA']) && stristr($_SERVER['HTTP_VIA'], "wap")){return TRUE; }

		if(isset($_SERVER['HTTP_USER_AGENT'])){
			$clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-','philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');

    		if(preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))){
      			return TRUE;
    		}
  		}
		if(isset($_SERVER['HTTP_ACCEPT'])){
			if((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))){
      			return TRUE;
			}
		}
		return FALSE;
	}
}

# 获取系统类型
if(!function_exists('GetOS'))
{
	function GetOS()
	{
	    $ua = $_SERVER['HTTP_USER_AGENT'];
	    if (strpos($ua, 'Android') !== false) {
	        preg_match("/(?<=Android )[\d\.]{1,}/", $ua, $version);
	        return 'Android'.$version[0];
	    } elseif (strpos($ua, 'iPhone') !== false) {
	        preg_match("/(?<=CPU iPhone OS )[\d\_]{1,}/", $ua, $version);
	        return 'iPhone'.str_replace('_', '.', $version[0]);
	    } elseif (strpos($ua, 'iPad') !== false) {
	        preg_match("/(?<=CPU OS )[\d\_]{1,}/", $ua, $version);
	        return 'iPad'.str_replace('_', '.', $version[0]);
	    } elseif (strpos($ua, 'Win') !== false) {
	        preg_match("/(?<=nt )[\d\_]{1,}/", $ua, $version);
	        return 'windows'.str_replace('_', '.', $version[0]);
	    } elseif (strpos($ua, 'Mac') !== false) {
	        preg_match("/(?<=os )[\d\_]{1,}/", $ua, $version);
	        return 'mac'.str_replace('_', '.', $version[0]);
	    } elseif (strpos($ua, 'linux') !== false) {
	        preg_match("/(?<=os )[\d\_]{1,}/", $ua, $version);
	        return 'linux'.str_replace('_', '.', $version[0]);
	    } elseif (strpos($ua, 'unux') !== false) {
	        preg_match("/(?<=os )[\d\_]{1,}/", $ua, $version);
	        return 'unux'.str_replace('_', '.', $version[0]);
	    }
	}
}

# 判断浏览器
if(!function_exists('GetBrowser'))
{
	function GetBrowser()
	{
		$agent       = $_SERVER['HTTP_USER_AGENT'];
	    $arr['browser']     = 'Unknow';
	    $arr['var'] = addslashes($_SERVER['HTTP_USER_AGENT']);
		if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Internet Explorer';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/MicroMessenger\/([^\s]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Wchat';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/Chrome\/([^\s]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Chrome';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'FireFox';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/Maxthon/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Internet Explorer Maxthon';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Opera';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'OmniWeb';
	        $arr['var'] = addslashes($regs[2]);
	    }
	    elseif (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Netscape';
	        $arr['var'] = addslashes($regs[2]);
	    }
	    elseif (preg_match('/safari\/([^\s]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Safari';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Internet Explorer NetCaptor';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/Lynx\/([^\s]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Lynx';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    elseif (preg_match('/AlipayClient\/([^\s]+)/i', $agent, $regs))
	    {
	        $arr['browser']     = 'Ali';
	        $arr['var'] = addslashes($regs[1]);
	    }
	    return $arr;
	}
}

# 屏蔽特殊文字
if(!function_exists('FilterStr'))
{
	function FilterStr($string)
	{
		$str = "/你大爷|你麻痹|玩意|SB|sb|你他妈|你妈|他妈|丑|西撇|出售|假钞|国家|政府|枪|办证|假|办|MMP|mmp|TM|tm|西藏|寡妇|大妈|撕逼|举报|屏蔽|诅|咒|傻|逼|游戏|滚|婊/";
		return preg_replace($str, "*", $string);
	}
}

# 生成随机数
if(!function_exists('RandomNum'))
{
	function RandomNum($num = 4,$type="str")
	{
		$random = new \Phalcon\Security\Random();
		if($type=='str')
		{
			return $code = $random->hex($num);
		}else{
			$begin = '1';
			$end = '9';
			for ($i=1; $i < $num; $i++)
			{
				$begin.='0';
				$end.='9';
			}
			$code = mt_rand($begin,$end);
			return $code;
		}
	}
}