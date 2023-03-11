<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php 
            $wurl="http://".$_SERVER['HTTP_HOST']."/m/order/";
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <title>我的<?php echo _cfg('web_name_two'); ?> - <?php echo $webname; ?>触屏版</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/newComm.css?v=130715" rel="stylesheet" type="text/css" />
    
	<!--<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css?v=130726" rel="stylesheet" type="text/css" /> -->
    

	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
    <script language="javascript" type="text/javascript">
    function SetImg(){

	alert("如需更换头像！请使用电脑访问<?php echo _cfg('web_name_two'); ?>进行更换<?php echo G_WEB_PATH; ?>");
}
    </script>
</head>
<body>
<div class="h5-1yyg-v11">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>我的<?php echo _cfg('web_name_two'); ?></h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>
<!--
    <section class="clearfix g-member">
	    <div class="clearfix m-round m-name">
			<div class="fl f-Himg">
				<a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $member['uid']; ?>" class="z-Himg">
				<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($member['uid'],'img'); ?>" border=0/></a>
				<span class="z-class-icon01 gray02"><s></s><?php echo $member['yungoudj']; ?></span>
			</div>
			<div class="m-name-info"><p class="u-name">
				<b class="z-name gray01"><?php echo get_user_name($member['uid']); ?></b><em>(<?php echo $member['mobile']; ?>)</em></p>
				<ul class="clearfix u-mbr-info"><li>可用微积分 <span class="orange"><?php echo $member['score']; ?></span></li>
				<li>经验值 <span class="orange"><?php echo $member['jingyan']; ?></span></li>
				<li>余额 <span class="orange">￥<?php echo $member['money']; ?></span>
				<a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge" class="fr z-Recharge-btn">去充值</a></li>
				</ul>
			</div> 
		</div>
	    <div class="m-round m-member-nav">
		    <ul id="ulFun">
			    <li><a href="<?php echo WEB_PATH; ?>/mobile/home/userbuylist"><b class="z-arrow"></b>我的<?php echo _cfg('web_name_two'); ?>记录</a></li>
			    <li><a href="<?php echo WEB_PATH; ?>/mobile/home/orderlist"><b class="z-arrow"></b>获得的商品</a></li>
			    <li><a href="<?php echo WEB_PATH; ?>/mobile/home/singlelist"><b class="z-arrow"></b>我的晒单</a></li>
			    <li><a href="<?php echo WEB_PATH; ?>/mobile/home/userbalance"><b class="z-arrow"></b>帐户明细</a></li>
                 <li><a href="<?php echo WEB_PATH; ?>/mobile/home/invite"><b class="z-arrow"></b>邀请管理</a></li>
		    </ul>
	    </div> 
    </section>-->
    <div class="container-fluid">
      <div class="a_account_top">
        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $member['uid']; ?>/<?php echo $uids; ?>/" class="a_set_img"></a>
        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $member['uid']; ?>/<?php echo $uids; ?>/"><img class="a_user_img" id="headPic" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($member['uid'],'img'); ?>"></a>
        <p class="a_account_p1"><span id="userId">账号:<?php echo $member['mobile']; ?></span><em id="nickname">昵称:<?php echo $member['username']; ?></em></p>
        <p class="a_account_p2">可用微积分：<span class="a_orange" id="score"><?php echo $member['score']; ?></span>    <em>|</em>  可用余额：<span class="a_orange" id="moneyTotal">￥<?php echo $member['money']; ?></span></p>
         <p class="a_account_p2">经验值：<span class="a_orange" id="brokerageUsable"><?php echo $member['jingyan']; ?></span> <!--   <em>|</em> 会员等级：<span class="a_orange" id="cardUsable"></span> --></p>
        <a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge/<?php echo $uids; ?>/" class="a_now_recharge">立即充值</a>
      </div>
      <ul class="a_account_ul">
	  <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/profile/<?php echo $uids; ?>/">
            <span class="a_span_li10"></span>
            <div style="color:#FF0000;text-align:center;font-size:14px">获得50微积分</div>
          </a>
        </li>
        
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/userbuylist/<?php echo $uids; ?>/">
            <span class="a_span_li2"></span>
            <em><?php echo _cfg('web_name_two'); ?>记录</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/orderlist/<?php echo $uids; ?>/">
            <span class="a_span_li3"></span>
            <em>中奖记录</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/qiandao/<?php echo $uids; ?>/">
            <span class="a_span_li4"></span>
            <em>每日签到</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/userbalance/<?php echo $uids; ?>/">
            <span class="a_span_li1"></span>
            <em>消费明细</em>
          </a>
        </li>
		<li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/singlelist/<?php echo $uids; ?>/">
            <span class="a_span_li7"></span>
            <em>我的晒单</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/invite/commissions/<?php echo $uids; ?>/">
            <span class="a_span_li6"></span>
            <em>佣金明细</em>
          </a>
        </li>
        <li class="col-xs-4">
        
          <a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>">
            <span class="a_span_li0"></span>
            <em>发现</em>
          </a>
        </li>
       
        <li class="col-xs-4">

           <a href="<?php echo WEB_PATH; ?>/mobile/invite/friends/<?php echo $uids; ?>/">
            <span class="a_span_li98"></span>
            <em>邀请赚钱</em>
          </a>
        </li>
		   
		<li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/fufen/<?php echo $uids; ?>/">
            <span class="a_span_li5"></span>
            <div style="color:#FF0000;text-align:center;font-size:14px">我的微积分</div>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/reg_shop/<?php echo $uids; ?>/">
            <span class="a_span_li12"></span>
            <em>我要入驻</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/invite/recordlist/<?php echo $uids; ?>/">
            <span class="a_span_li9"></span>
            <em>提现充值</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/numberbind/<?php echo $uids; ?>/">
            <span class="a_span_li11"></span>
            <em>绑定账号</em>
          </a>
        </li>
		<li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/lucky/luckylist/<?php echo $uids; ?>/">
            <span class="a_span_li2"></span>
            <em>抽奖记录</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/lucky/?yid=<?php echo $uids; ?>/">
            <span class="a_span_li3"></span>
            <em>我要抽奖</em>
          </a>
        </li>
        <li class="col-xs-4">
	     <a href="<?php echo WEB_PATH; ?>/mobile/invite/mycode/<?php echo $uids; ?>/">
          <span class="a_span_li7"></span>
		  <em>二维码推广</em>
		   </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/invite/czk/<?php echo $uids; ?>/">
            <span class="a_span_li9"></span>
            <em>卡密充值</em>
          </a>
        </li>
         <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/mobilechecking/<?php echo $uids; ?>/">
            <span class="a_span_li11"></span>
            <em>绑定手机</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/lottery/?yid=<?php echo $uids; ?>/">
            <span class="a_span_li3"></span>
            <em>充值抽奖</em>
          </a>
        </li>
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/fufen/<?php echo $uids; ?>/">
            <span class="a_span_li9"></span>
            <em>微积分提现</em>
          </a>
        </li>
       <!-- <li class="col-xs-4">
          <a href="<?php echo $wurl; ?>">
            <span class="a_span_li2"></span>
            <em>我的订单</em>
          </a>
        </li> -->
        <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/user/cook_end/<?php echo $uids; ?>/">
            <span class="a_span_li23"></span>
            <em>安全退出</em>
          </a>
        </li>
               
        <div class="member_wz">资料编辑</div>
        
         <li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/address/<?php echo $uids; ?>/">
            <span class="a_span_li11"></span>
            <em>收货地址</em>
          </a>
        </li>  
		<!--<li class="col-xs-4">
          <a href="javascript:;"   onclick="SetImg()">
            <span class="a_span_li12"></span>
            <em>修改头像</em>
          </a>
        </li> -->
		<li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/profile/<?php echo $uids; ?>/">
            <span class="a_span_li4"></span>
            <em>修改资料</em>
          </a>
        </li>
		<li class="col-xs-4">
          <a href="<?php echo WEB_PATH; ?>/mobile/home/password/<?php echo $uids; ?>/">
            <span class="a_span_li8"></span>
            <em>修改密码</em>
          </a>
        </li>
        
      </ul>
    </div>




<?php include templates("mobile/index","footer");?>

<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_WEB_PATH; ?>/statics/templates/yungou";  
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js');
</script>
 
</div>
</body>
</html>
