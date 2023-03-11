<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/home.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_header.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-Frame.css"/>



<div class="sidebar_l clrfix fl">
        	<ul>
                
                <li <?php if($cur==1): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home" title="首页">首页</a><b></b></li>
                <li <?php if($cur==2): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/modify" title="帐号设置">帐号设置</a><b></b></li>
                <li <?php if($cur==3): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/userbuylist" title="<?php echo _cfg('web_name_two'); ?>记录"><?php echo _cfg('web_name_two'); ?>记录</a><b></b></li>
                <li <?php if($cur==4): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/orderlist" title="获得的商品">获得的商品</a><b></b></li>
                <li <?php if($cur==5): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/singlelist" title="晒单管理">晒单管理</a><b></b></li>
                <!--<li><a href="" title="我的关注">我的关注</a><b></b></li> -- -->
                <li <?php if($cur==6): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/userbalance" title="我的账户">我的账户</a><b></b></li>
                <!--<li><a href="/MyFriends.do" title="我的好友">我的好友</a><b></b></li> -->
                <li <?php if($cur==7): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/joingroup" title="<?php echo _cfg('web_name_two'); ?>圈"><?php echo _cfg('web_name_two'); ?>圈</a><b></b></li>
                <li <?php if($cur==8): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/invitefriends" title="邀请管理">邀请管理</a><b></b></li>
                <li <?php if($cur==11): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/numberbind" title="绑定账号">绑定账号</a><b></b></li>
               <li <?php if($cur==12): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/recordlist" title="充值提现">充值提现</a><b></b></li>
                <li <?php if($cur==9): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/userfufen" title="我的微积分">我的微积分</a><b></b></li>
                <li <?php if($cur==10): ?>class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/qiandao" title="我的微积分">每日签到</a><b></b></li>
                <li ><a href="<?php echo WEB_PATH; ?>/go/lucky" title="免费抽奖">免费抽奖</a><b></b></li>
                <li <?php if($cur==13 ): ?> class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/go/lucky/luckylist" title="抽奖记录">抽奖记录</a><b></b></li>
                <li <?php if($cur==14 ): ?> class="curr z-first" <?php endif; ?>><a href="<?php echo WEB_PATH; ?>/member/home/czk" title="卡密充值">卡密充值</a><b></b></li>
                <!--<li><a href="/UserMessage.do" title="消息管理">消息管理</a><b></b></li> -->
                
               </ul>
</div>