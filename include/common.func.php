<?php
if(!defined('IN_MO')){
//	exit('Access Denied');
}
function replaceKey($key,$text){
	$keys = explode(' ', $key);
	foreach($keys as $v){
		if(preg_match('/'.$v.'/iSU', $text)){
			$text = str_replace($v, '<font color="#f6699">'.$v.'</font>', $text);
		}
	}
	return $text;
}

/* 搜索获取纯文本 */
function stripSearch($str){
	$str = strip_tags($str);
	$str = str_replace('&nbsp','',$str);
	$str = str_replace(' ','',$str);
	return $str;
}


//获取客服端IP
function getip() {
	$IP = getenv('REMOTE_ADDR');
	/*
	getenv() 功能是获取环境变量的值 格式: string getenv(string varname)
	getenv('REMOTE_ADDR');等价于 : $_SERVER['REMOTE_ADDR'];
	*/
	$IP_ = getenv('HTTP_X_FORWARDED_FOR');
	if (($IP_ != "") && (IP_ != "unknown"))
		$IP = $IP_;
	return $IP;
}

//获得GD库版本
function getGdVersion() {
	$ver = gd_info();
	$ver = $ver['GD Version'];
	return $ver;
}

/*
 * 转换HTML标签
 */
function html($str){
	if(!is_array($str)){
		$str = str_replace('  ', '&nbsp;', $str);
		$str = str_replace('<', '&lt', $str);
		$str = str_replace('>', '&gt', $str);
		$str = str_replace("\"", '&quot;', $str);
		$str = str_replace("'", '&rsquo;', $str);
		$str = str_replace(chr(10), '<br />', $str);
		return $str;
	}else{
		return array_map("html",$str);
	}
}

/**
 * 将实体<br>转换为\n
 */
function rehtml($str){
	$str = str_replace('<br />',"\n",$str);
	$str = str_replace('<br>',"\n",$str);
	$str = str_replace('&quot;', "\"", $str);
	$str = str_replace('&rsquo;', "'", $str);
	$str = str_replace('&nbsp;'," ",$str);
	$str = str_replace('&lt','<',$str);
	$str = str_replace('&gt','>',$str);
	return $str;
}



/**
 * 显示错误
 */
function msg($str1='',$str2=''){
	global $db;
	if($db->link_id){
		$db->close();
	}
	if($str1!=''){
		$str1='alert("'.$str1.'");';
	}
	if($str2==''){
		$str2='history.back();';
	}
	$html='<script>'.$str1.$str2.'</script>';
	exit ($html);
}
/**
 * 获取前一页网址
 */
function previous() {
	if (isset($_SERVER['HTTP_REFERER'])){
		$url = $_SERVER['HTTP_REFERER'];
		return $url;
	}
}

/**
 * 记录系统错误
 */
function myErrorHandler($errno,$errstr,$errfile,$errline){
	if(MY_ERROR_TIPS){
		$errfile = str_replace('\\','/',$errfile); //兼容系统路径格式
		$errfile = str_replace(MO_ROOT,'root',$errfile); //为了安全把错误信息中的完整路径替换掉
		echo '<div style="color:#ff0000;font:12px;">出错啦！';
		echo '<br>出错文件：' . $errfile;
		echo '<br>出错行数：' . $errline;
		echo '<br>错误信息：' . $errstr;
		echo '<br>错误级别：' . $errno . '<br><div>';
	}else{
		echo 'PHP Error!';
	}
	exit();
}

/**
 * 为字符串或数组元素添加反斜杠
 */
function myAddslashes($str){
	if(!is_array($str)){
		//如果传进来不不是数组
		$str = addslashes($str); //那么进行转义
		return $str;
	}else{
		return array_map("myAddslashes",$str);
	}
}


/**
 *  过滤SQL关键字函数
 */
function stripSql($str){
	$sqlkey = array(	 //SQL过滤关键字
		'/\s+select\s+/i',
		'/\s+delete\s+/i',
		'/\s+update\s+/i',
		'/\s+or\s+/i',
		'/\s+union\s+/i',
		'/\s+outfile\s+/'
	);
	$replace = array(  //和上面数组内容对应
		'&nbsp;select&nbsp;',
		'&nbsp;delete&nbsp;',
		'&nbsp;update&nbsp;',
		'&nbsp;or&nbsp;',
		'&nbsp;union&nbsp;',
		'&nbsp;outfile&nbsp;'
	);
	if(!is_array($str)){
		//如果不是数组直接替换
		$str = preg_replace($sqlkey,$replace,$str); 
		return $str;
	}else{
		return array_map("stripSql",$str);
	}
}


/**
 * 字符串截取
 */
function getstr($String, $Length,$act = true) {
	if (mb_strwidth($String, 'UTF8') <= $Length) {
		return $String;
	} else {
		$I = 0;
		$len_word = 0;
		while ($len_word < $Length) {
			$StringTMP = substr($String, $I, 1);
			if (ord($StringTMP) >= 224) {
				$StringTMP = substr($String, $I, 3);
				$I = $I +3;
				$len_word = $len_word +2;
			}
			elseif (ord($StringTMP) >= 192) {
				$StringTMP = substr($String, $I, 2);
				$I = $I +2;
				$len_word = $len_word +2;
			} else {
				$I = $I +1;
				$len_word = $len_word +1;
			}
			$StringLast[] = $StringTMP;
		}
		/* raywang edit it for dirk for (es/index.php)*/
		if (is_array($StringLast) && !empty ($StringLast)) {
			$StringLast = implode("", $StringLast);
			if($act){
				$StringLast .= "...";
			}
		}
		return $StringLast;
	}
}

function getstrs($String, $Length,$act = true) {
	if (mb_strwidth($String, 'UTF8') <= $Length) {
		return $String;
	} else {
		$I = 0;
		$len_word = 0;
		while ($len_word < $Length) {
			$StringTMP = substr($String, $I, 1);
			if (ord($StringTMP) >= 224) {
				$StringTMP = substr($String, $I, 3);
				$I = $I +3;
				$len_word = $len_word +2;
			}
			elseif (ord($StringTMP) >= 192) {
				$StringTMP = substr($String, $I, 2);
				$I = $I +2;
				$len_word = $len_word +2;
			} else {
				$I = $I +1;
				$len_word = $len_word +1;
			}
			$StringLast[] = $StringTMP;
		}
		/* raywang edit it for dirk for (es/index.php)*/
		if (is_array($StringLast) && !empty ($StringLast)) {
			$StringLast = implode("", $StringLast);
			if($act){
				$StringLast .= "";
			}
		}
		return $StringLast;
	}
}
function cut_strs($string,$start = 0,$sublen, $code = 'utf-8')
{
    if($code == 'utf-8')
    {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);
 
        if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."";
        return join('', array_slice($t_string[0], $start, $sublen));
    }
    else
    {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = '';
 
        for($i=0; $i< $strlen; $i++)
        {
            if($i>=$start && $i< ($start+$sublen))
            {
                if(ord(substr($string, $i, 1))>129)
                {
                    $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        if(strlen($tmpstr)< $strlen ) $tmpstr.= "";
        return $tmpstr;
    }
}
/**
function checklogin1(){
	session_cache_limiter("private, must-revalidate");
	session_start();
	if (!isset($_SESSION['title'])||$_SESSION['title']==''){
		msg('','location="index.php"');
	}
}*/
//检查后台登录
function checklogin(){
	session_cache_limiter("private, must-revalidate");
	session_start();
	if (!isset($_SESSION['pyadmin'])||$_SESSION['pyadmin']==''){
		msg('未登录或登录已超时','location="../default.php"');
	}
}
//检查其他页面登录
function chklogin(){
	session_cache_limiter("private, must-revalidate");
	session_start();
	if (!isset($_SESSION['pyadmin'])||$_SESSION['pyadmin']==''){
		msg('未登录或登录已超时','location="default.php"');
	}
}
//检查登录页
function checkdefault(){
	session_cache_limiter("private, must-revalidate");
	session_start();
	if (isset($_SESSION['pyadmin'])&&$_SESSION['pyadmin']!=''){
		msg('','location="system.php"');
	}
}

function checknum($pid){
	if (!is_array($pid)){
  		return preg_match("/^[0-9]+$/",$pid);
	}else{
		$str=true;
		foreach ($pid as $v){
			if (!checknum($v)){
				$str=false;
				break;
			}
		}
		return $str;
	}
}

function delfile($path){
	if($path!=''){
		$path=MO_ROOT.'/'.$path;
		if (file_exists($path)){
			unlink($path);
		}
	}
}
?>