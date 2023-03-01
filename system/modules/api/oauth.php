<?php  

$code = $_GET["code"]; 

		
$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';  

	
//$get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$weixin_token.'&openid='.$weixin_openid.'&lang=zh_CN';  

  $res = https_request($url);//调用SDK方法获取到res 从中可以得到openid
$res_g=(json_decode($res, true));//转换成array 方便调用openid

//根据openid和access_token查询用户信息  
 $access_token = $res_g['access_token'];  
 $openid = $res_g['openid'];  
  
  //获取用户基本信息
 
    $urls = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
    $ress = https_requests($urls);
    $go_user_infos = json_decode($ress, true);
 // echo $go_user_infos['nickname'];exit();
  
  //https请求
  function https_request($url, $data = null)
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
  }
 //https请求
  function https_requests($urls, $data = null)
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $urls);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
  }
  


?>  