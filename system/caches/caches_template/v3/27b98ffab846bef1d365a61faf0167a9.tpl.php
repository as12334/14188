<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Referrals.css"/>
<style>
body{color:#333; text-align:left; background:#fee3c1;}
.wrap{ width:1000px; margin:0 auto;}
.part1{ height:407px; background:url(/statics/uploads/newbie/part1-bg03.jpg) center top no-repeat;}
.part2{  height:367px; position:relative;background:url(/statics/uploads/newbie/part2-bg03.jpg) no-repeat;}
.part3{ position:relative; height:166px; color:#f9570b;background:url(/statics/uploads/newbie/part3-bg03.jpg) center top no-repeat;}
.part3 .wrap{ position:relative; height:166px;}
.part4{ height:385px; padding-top:25px; font-size:14px; background:url(/statics/uploads/newbie/part4-bg03.jpg) center top no-repeat;}
.activeRegulation{ width:450px; margin-left:50px; display:inline;}
.activeRegulation dt{ color:#f9560a;font-size:18px;}
.activeRegulation dd{ position:relative; line-height:24px; padding-left:25px; margin-top:5px; _zoom:1;font-size:14px;}
.activeRegulation dd.activeDetail{ margin-top:20px;}
.activeRegulation i{  position:absolute; vertical-align:middle; top:3px; left:0; text-align:center; color:#fff; width:17px; height:17px; line-height:17px; background:url(/statics/uploads/newbie/rItem.png) no-repeat;}
.part4-layB{ display:inline; width:430px; margin:1px 50px 0 0; }
</style>
<script>
$(function(){
	$("#referDocument li").bind({		
		mouseover:function(){
			var number=$("#referDocument li").index(this)+1;
			$(".S0"+number).removeClass("hidden");
		},
		mouseout:function(){
			var number=$("#referDocument li").index(this)+1;
			$(".S0"+number).addClass("hidden");
		}
	})
})
</script>
<?php 
	$uid = base64_encode(get_user_uid());
 ?>
<div class="part1">
	<div class="wrap"></div>
</div>
<div class="part2 wrap"></div>
<div class="part3 wrap"></div>
<div class="part4 ">
	<div class="wrap">
	<!--活动规则 start-->
	<dl class="activeRegulation fl">
		<dt>活动规则：</dt>
		<dd>
			<i>1</i>您每邀请一位好友成功参与<?php echo _cfg('web_name_two'); ?>即可获得50微积分。
		</dd>
		<dd>
			<i>2</i>经您邀请的所有好友，成功参与<?php echo _cfg('web_name_two'); ?>后，您都可以获得6%的现金奖赏，并且永久有效。
		</dd>
		<dd>
			<i>3</i>您每邀请一位好友成功参与<?php echo _cfg('web_name_two'); ?>，就可获得一个超级礼包抽奖机会；邀请越多，获奖机率就越大，快快告诉你QQ、MSN、人人、开心、微博上的朋友吧；具体活动详情请关注<?php echo _cfg('web_name_two'); ?>圈中活动专区。
		</dd>
		<dd>
			<i>4</i>在【我的个人中心】的【佣金明细】里可看到您的每次返现记录。佣金满10及以上可申请提现，任何时候都可充值到<?php echo _cfg('web_name_two'); ?>帐户。
		</dd>
		<dd>
			<i>5</i>对于查实的作弊行为，扣除一切佣金，取消邀请佣金的资格并清除您的微积分账户。借助网站及其他平台，恶意获取佣金，一经查实，扣除一切佣金，清除微积分账户且封号。
		</dd>
		<dd class="activeDetail tc"><a href="<?php echo WEB_PATH; ?>/group/show/3" target="_blank"><img src="/statics/uploads/newbie/activeDetail.png" alt="活动详情请点击" /></a></dd>
	</dl>
	<!--活动规则 end-->
	<div class="part4-layB fr">
		<?php if(!uidcookie('uid')): ?>
			<div class="login_reg">
				请先<a href="<?php echo WEB_PATH; ?>/member/user/login">登录</a>或者<a href="<?php echo WEB_PATH; ?>/member/user/register">注册</a>，获取您的专属邀请链接。
			</div>
			<div class="login_button">
				<a href="<?php echo WEB_PATH; ?>/member/user/login">立即登录，邀请好友 &gt;&gt;</a>
			</div>
			<div class="reg-txt">
				还没有<?php echo _cfg('web_name_two'); ?>帐号？<a href="<?php echo WEB_PATH; ?>/member/user/register"><b>立即注册</b></a>
			</div>
		<?php  else: ?>	
			<div class="Invitation-t">专用邀请链接</div>
		    <div class="Invitation-C1">
			    <p class="fs14">这是您的专属邀请链接，请通过 MSN 或 QQ 发送给您的好友</p>
			    <div class="">
			    <textarea  name="copyShareText" style="margin: 0px; width: 432px; height: 118px;" id="fe_text" class="textarea">我刚发现一个很好玩的网站，1微币就能买IPhone 6哦，快去看看吧！<?php echo WEB_PATH; ?>/register/<?php echo $uid; ?>
</textarea>
			    </div>	   
				
		    </div>
		    <div class="Invitation-C2">
			    <p class="fs14">通过分享方式邀请好友，立即分享到您的QQ、MSN、人人、开心、微博上的朋友吧！</p>
               
		    </div>
		    
		<?php endif; ?>
</div>
    </div>
</div>
<?php include templates("index","footer");?>