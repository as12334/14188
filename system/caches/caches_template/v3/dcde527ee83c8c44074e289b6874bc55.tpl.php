<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_x.css?v=150728" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.js"></script>
<div class="p-center-main clrfix">
            <!--左边导航-->
            <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-invitation.css"/>
  	<?php include templates("member","left");?>
            <div class="sidebar_main clrfix fr">
                <div class="g-obtain-title clrfix">
                    <ul id="ul_menu">
                        <li class="curr"><a href="javascript:;">邀请管理</a></li>
                        <li><a href="javascript:;">佣金明细</a></li>
                    </ul>
                </div>
                <!--邀请管理 -->
                <div  class="fri-req-wrap">
                    <div class="mana-req-wrap">
                        <div class="mana-req-inner">
                            <div class="fl">
                                <ul class="mana-req-m">
                                    <li>佣金余额 <span class="yu">￥<?php echo $cashouthdtotal; ?></span><i></i></li>
                                    <li>累计收入&nbsp;&nbsp;<span>￥<?php echo $shourutotal; ?></span><i></i></li>
                                    <li>累计(提现、充值)&nbsp;&nbsp;<span>￥<?php echo $zhichutotal; ?></span></li>
                                </ul>
                            </div>
                            <div class="money-wrap">
                                <a id="a_applycz" href="<?php echo WEB_PATH; ?>/member/home/recordlist" class="money-btn in">充值到<?php echo _cfg('web_name_two'); ?>账户</a>
                                <a id="a_applytx" href="<?php echo WEB_PATH; ?>/member/home/recordlist" class="money-btn out">申请提现</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <p class="grayb">佣金余额可实时充值到您的<?php echo _cfg('web_name_two'); ?>帐户，满10微币时才可申请提现。</p>
                    </div>
                    <div class="mana-rulesyaoqing">
                        <p class="gray9">邀请好友并消费即可获得<span class="orange">50微积分</span>和<span class="orange">6%的现金奖励！</span></p>
                        <div><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/yaoqing_1.png" /></div>
                        <div class="m-info-wrap"id="d_clip_container" style="position:relative;" >
                            <input id="txtInfo" class="m-info" type="text" value="1微币就能买IPhone 6哦，快去看看吧！ <?php echo WEB_PATH; ?>/register/<?php echo $uids; ?>" />
                            <a id="d_clip_button" href="javascript:;" >复制</a>

                        </div>
                        <br />
                        <div><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/yaoqing_2.png" /></div>
                        <!-- Baidu Button BEGIN -->
						<div class="bdsharebuttonbox" data-tag="share_1">
	<!--<a class="bds_mshare" data-cmd="mshare"></a> -->
    <a class="bds_sqq" data-cmd="sqq"></a>
	<a class="bds_qzone" data-cmd="qzone" href="#"></a>
    <a class="bds_weixin" data-cmd="weixin" href="#"></a>
	<a class="bds_tsina" data-cmd="tsina"></a>
	<a class="bds_baidu" data-cmd="baidu"></a>
	
	<a class="bds_tqq" data-cmd="tqq"></a>
    <a class="bds_renren" data-cmd="renren"></a>
	<a class="bds_more" data-cmd="more">更多</a>
<!--	<a class="bds_count" data-cmd="count"></a> -->
</div>
<script>
	window._bd_share_config = {
		common : {
			bdText : '1微币就能买IPhone 6S哦，快去看看吧！  ',	
			bdDesc : '',	
			bdUrl : '<?php echo WEB_PATH; ?>/register/<?php echo $uids; ?>/', 	
			bdPic : ''
		},
		share : [{
			"bdSize" : 32
		}],
		
		image : [{
			viewType : 'list',
			viewPos : 'top',
			viewColor : 'black',
			viewSize : '32',
			viewList : ['sqq','qzone','tsina','huaban','tqq','renren','weixin']
		}],
		selectShare : [{
			"bdselectMiniList" : ['sqq','qzone','weixin','tqq','kaixin001','bdxc','tqf']
		}]
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>

				<!-- Baidu Button END -->
                <br />
                        <div><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/yaoqing_3.png" /></div>
                        <div class="mana-req-wrap">
                        <div class="mana-req-inner">
                        <div class="money-wrap">
                                <a id="a_applycz" href="<?php echo WEB_PATH; ?>/goods_list" class="money-btn in">去选择分享商品</a>
                               </div> 
                            </div>
                            </div>
                    </div>
                    <div class="mana-protail-wrap">
                        <div class="mana-protail">
                            <div class="title">成功邀请的好友</div>
                            <div id="div_stat" class="blackbord">成功邀请&nbsp;<span class="orange"><?php echo $involvedtotal; ?></span>&nbsp;位会员注册，已有&nbsp;<span class="orange"><?php echo $involvednum; ?></span>&nbsp;位会员参与<?php echo _cfg('web_name_two'); ?><!--，您通过邀请获得奖励：<span class="orange">0</span>&nbsp;微积分 --></div>
                           <br />
                        </div>
                        <div id="divList" class="list-tab SuccessCon">
                           <ul class="listTitle">
                            <li class="w200">用户名</li>
                            <li class="w200">时间</li>
                            <li class="w200">邀请编号</li>
                            <li class="w200">消费状态</li>
                           </ul>
			                <?php if($involvedtotal!=0): ?>
			                <?php $ln=1; if(is_array($invifriends)) foreach($invifriends AS $key => $val): ?>
			               <ul>
                           <li class="w200">  
                           <a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($val['uid']); ?>" target="_blank" class="blue"><?php echo $username[$val['uid']]; ?></a>
                           </li>
			               <li class="w200"><?php echo date('Y.m.d H:i:s',$val['time']); ?></li>
			               <li class="w200"><?php echo idjia($val['uid']); ?></li>
			               <li class="w200"><?php echo $records[$val['uid']]; ?></li></ul>
			               <?php  endforeach; $ln++; unset($ln); ?>
                          <?php  else: ?>
			               <div class="null-retips-wrapper"><div class="gth-icon transparent-png"></div><span>您还没有邀请谁哦！</span></div>
			             <?php endif; ?>			
			           </div>
                    </div>
                </div>
                <!--佣金明细 -->
                <div class="fri-req-wrap" style="display: none;" >
                <div class="g-screen-state clrfix "  >
                    <ul id="ul_state" class="a-screen">
                        <!--<li><a state="0" href="javascript:;" >全部</a></li> -->
                        <li><a state="1" href="javascript:;" class="z-checked">全部记录</a></li>
                       <!-- <li><a state="2" href="javascript:;">提现记录</a></li> -->
                    </ul>
                </div>
                <!--收入记录 -->
                <div class="mon-wrap"  >
                    <div class="mon-inner">
                    <div id="divCommissionList" class="list-tab commission gray02">
                    <ul class="listTitle">
            <li class="w140">用户</li>
            <li class="w150">时间</li>
            <li class="w280">描述</li>
            <li class="w90"><?php echo _cfg('web_name_two'); ?>金额(微币)</li>
            <li class="w90">佣金(微币)</li>
            </ul>
			         <?php if($recodearr!=''): ?>
				<?php $ln=1; if(is_array($recodearr)) foreach($recodearr AS $key => $val): ?>
			<ul>
			<li class="w140"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($val['uid']); ?>" target="_blank"><!--<img src= "<?php if($member['img']==null): ?><?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg<?php  else: ?><?php echo G_UPLOAD_PATH; ?>/<?php echo $val['img']; ?><?php endif; ?>" alt="" border="0"> --></a><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($val['uid']); ?>" target="_blank" class="blue"><?php echo $username[$val['uid']]; ?></a></li>
			<li class="w150"><?php echo date('Y-m-d H:i:s',$val['time']); ?></li>
            <li class="w280"><?php if($uid==$val['uid']): ?><?php echo $val['content']; ?><?php  else: ?><a target="_blank" href="<?php echo WEB_PATH; ?>/goods/<?php echo $val['shopid']; ?>" title="<?php echo $val['content']; ?>" class="blue"><?php echo $val['content']; ?></a><?php endif; ?></li>
            <li class="w90"><?php echo $val['ygmoney']; ?></li><li class="w90 orange"><?php if($uid==$val['uid']): ?>-<?php  else: ?>+<?php endif; ?><?php echo $val['money']; ?></li>
			</ul>
			<?php  endforeach; $ln++; unset($ln); ?>
			<?php  else: ?>
			<ul id="ul_commissionlist" class="t-info">
            <div class="null-retips-wrapper"><div class="gth-icon transparent-png"></div><span>您还未有邀请谁哦！</span></div>


                    </ul>
			
			 <?php endif; ?>
                    </div>     
                 </div>
                </div>
                <!--收入记录end -->
               
               </div> 

            </div>
        </div>
<script>


$(function(){
	$("#ul_menu li").click(function(){
		var id=$("#ul_menu li").index(this);
		$("#ul_menu li").removeClass().eq(id).addClass("curr");
		$(".fri-req-wrap").hide().eq(id).show();
	});
	
	$("#ul_state li a").click(function(){
		var id=$("#ul_state li a").index(this);
		$("#ul_state li a").removeClass().eq(id).addClass("z-checked");
		$(".mon-wrap").hide().eq(id).show();
	});
})

 var clip = null;	
function copy(id){ return document.getElementById(id); }	
function initx(){
	clip = new ZeroClipboard.Client();
	clip.setHandCursor(true);
	ZeroClipboard.setMoviePath("<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.swf");
	clip.addEventListener('mouseOver',function (client){
		clip.setText(copy('txtInfo').value );
	});		
	clip.addEventListener('complete',function(client,text){
		alert("邀请复制成功");
	});		
	clip.glue('d_clip_button','d_clip_container');
}
$(function(){
	initx();
})

</script>
<?php include templates("index","footer");?>