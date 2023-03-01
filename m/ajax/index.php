<?php 
session_start();



require_once('../../include/mysql.php');
error_reporting ( 0 ); 
$conn = mysql_connect ( $db_host, $db_user, $db_pass ) or die ( "数据库服务器连接错误" . mysql_error () );
mysql_select_db ( $db_name, $conn ) or die ( "数据库访问错误" . mysql_error () );
mysql_query ( "set character set utf8" );
mysql_query ( "set names utf8" );
$email      = $_GET['email'];
$action     = $_GET['action'];
$username   = $_GET['username'];
$password   = $_GET['password'];
$password1  = $_GET['password1'];
$img_sl     = "images/face/default.jpg_100x100.jpg";
$iipp       = $_SERVER["REMOTE_ADDR"];
if($action=="login_user"){

$sqlaccount  = "SELECT * FROM `member_co` WHERE email='$username' or user='$username'";
$resaccount  = mysql_query($sqlaccount);
$rowsaccount = mysql_fetch_array($resaccount);  
if ($username == $rowsaccount['email'] || $username == $rowsaccount['user']) {
    
	if (md5($password) == $rowsaccount['password']) {
		$_SESSION['user'] = $username;
		
		

        echo "1000";
   
      }else{
	      echo '密码不对';
           }
   
}else{
	echo '账号不存在';
}
}elseif($action=="pass_user"){
	
	$sql = "SELECT * FROM `member_co` WHERE user='$email' or email='$email'";
$res = mysql_query($sql);
$rows=mysql_num_rows($res);  
if (intval($rows) > 0) {	
    echo "邮箱已经存在";
   
}else{
	$sql = "SELECT * FROM `member_co` WHERE user='$username' or email='$username'";
$res = mysql_query($sql);
$rows=mysql_num_rows($res);  
if (intval($rows) > 0) {	
    echo "用户名已经存在";
   
}else{
	  
if (($password) == ($password1) ) {
$sql='insert into `'.$tablepre.'member_co` (`lm`,`email`,`user`,`password`,`repass`,`mobile`,`img_sl`,`px`,`pass`,`haoping`,`wtime`,`type`,`ip`,`e_pass`,`m_pass`,`user_admin`,`user_member`,`tburl`) values(1,"'.$email.'","'.$username.'","'.md5($password).'","'.$password1.'","","'.$img_sl.'",100,"yes","yes",'.time().',0,"'.$iipp.'","no","no","","","")';
mysql_query($sql);	
	


$sqls='insert into `'.$tablepre.'jifen` (`lm`,`email`,`title`,`jf`,`type`,`types`,`pass`,`wtime`,`ttime`,`ftime`,`stime`,`ip`) values("-4","'.$email.'","注册",50,0,"-2","yes",'.time().',"0","0","0","'.$iipp.'")';
mysql_query($sqls);	

$_SESSION['user']=$username;
    echo "1000";
   
}else{
	echo '两次密码不对';
}
}
}
	}

 ?>
