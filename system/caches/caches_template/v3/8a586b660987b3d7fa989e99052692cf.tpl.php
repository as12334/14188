<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/mine-index.css?v=150728" />
<script>
$(function(){
	$("#ul_Menu li").click(function(){
		var id=$("#ul_Menu li").index(this);
		$("#ul_Menu li").removeClass().eq(id).addClass("current");
		$(".content-wrap").hide().eq(id).show();
		$(".c-line").hide().eq(id).show();
	});
	
})
</script>
<!--主体-->
    <div class="mine-wrapper">
        <div class="mine-inner">
            <!--banner以及相关操作-->
            <div class="map-banner">
                <div class="map-info">
                    <div class="h-pic"><a class="pic" href="javascript:;"><img alt="" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $member['img']; ?>" width="140" height="140"> </a></div><div class="text-info"><a class="name" href="javascript:;"><?php echo get_user_name($member,'username'); ?></a>
                    <p><span class="address"><?php echo $madd; ?></span><span class="net"><?php echo WEB_PATH; ?>/uname/<?php echo idjia($member['uid']); ?></span></p><p class="mr4"><span class="level class-icon0<?php echo $dengji_1['groupid']; ?>"><s></s><?php echo $dengji_1['name']; ?></span>&nbsp;<span class="grade">经验值：<?php echo $member['jingyan']; ?></span></p><p class="about" title="<?php if($member['qianming']!=null): ?>
			<?php echo $member['qianming']; ?>
			<?php  else: ?>
			这家伙忙着<?php echo _cfg('web_name_two'); ?>，还没写签名呢。
			<?php endif; ?>">
            <?php if($member['qianming']!=null): ?>
			<?php echo $member['qianming']; ?>
			<?php  else: ?>
			这家伙忙着<?php echo _cfg('web_name_two'); ?>，还没写签名呢。
			<?php endif; ?></p></div>
                    <!--三个操作选项-->
                    <ul class="option-wrapper">
                        <!-- <li><a  href="javascript:;"><b class="code transparent-png"></b><span>扫码</span> </a><i class="animation-bg transparent-png"></i></li>
                        <li style="display: none;"><a  class="o-inner" href="javascript:;"><b class="friend transparent-png"></b><span>加好友</span> </a><i class="animation-bg transparent-png"></i></li>
                        <li style="display: none;"><a  class="o-inner" href="javascript:;"><b class="message transparent-png"></b><span>发私信</span> </a><i class="animation-bg transparent-png"></i></li>-->
                    	<li style="display: none;">
							<i class="o-inner"></i>
							<a  id="btnAddFriend" class="o-href" href="javascript:;"><b class="friend transparent-png"></b><span>加好友</span> </a>
						</li>
                        <li style="display: none;">
							<i class="o-inner"></i>
							<a id="btnSendMsg" class="o-href" href="javascript:;"><b class="message transparent-png"></b><span>发私信</span></a>
						</li>
						
                    </ul>
                    <div id="div_jb" class="ju-b-wrap" style="right:0px;display:none; ">举报</div>
                    <!--私信编辑框-->
                    <div id="divMsgBox" class="Pop-news">
                        <div class="Pop-Con">
                            <div class="arrow arrow_left"><em></em><span></span></div>
                            <div class="Close"><a href="javascript:void(0);"></a></div>
                            <div class="Comment_form">
                                <textarea rows="3" cols="10" id="txtPrivateMsg"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--详细记录-->
            <div class="mine-content">
                <div class="left-sides">
                    <div class="con">
                        <div class="c-nav">
                            <ul id="ul_Menu">
                                <li ><a href="javascript:;"><?php echo _cfg('web_name_two'); ?>记录</a> </li>
                                <li class="current"><a href="javascript:;">获得的商品</a> </li>
                                <li><a href="javascript:;">晒单</a> </li>
                            </ul>
                            <div id="midNavLine" class="c-line" style="left: 297px; width: 64px; display: block;"></div>
                            <div id="midNavLine" class="c-line" style="left: 426px; width: 80px; display: none;"></div>
                            <div id="midNavLine" class="c-line" style="left: 575px; width: 30px; display: none;"></div>
                        </div>
                        <!--云购记录-->
                        <div id="div_BuyList" class="content-wrap" style="display: block;">
                           
                        </div>
                        
                        <!--获得的商品-->
                        <div id="div_OrderList" class="content-wrap" style="display: none;">
                           
                        </div>
                        <!--晒单列表-->
                        <div id="div_PostList" class="content-wrap" style="display: none;">
                           
                        </div>
                    </div>

                </div>
                <div class="right-sides">
                    <div class="con">
                        <p class="title">近期访客</p>
                        <div class="user-list-wrap">
                         <ul id="ul_visitors" class="user-list">
                         <?php if($memberfks): ?>
                        <?php $ln=1;if(is_array($memberfks)) foreach($memberfks AS $fk): ?>
                        <?php 
        				
                         $fks=$mysql_model->GetOne("select * from `@#_member` where `uid`='$fk[fkid]'");
                         $jingyan = $fks['jingyan'];
                         $dengji_fks1 = $mysql_model->GetOne("select * from `@#_member_group` where `jingyan_start` <= '$jingyan' and `jingyan_end` >= '$jingyan'");
 ?>
                        
			<li><a class="pic" uweb="1012670133" type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($fks['uid']); ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $fks['img']; ?>" width="50" height="50" alt="<?php echo get_user_name($fks,'username'); ?>"></a><div class="info"><span class="class-icon0<?php echo $dengji_fks1['groupid']; ?>"><a class="name" uweb="<?php echo idjia($fks['uid']); ?>" type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($fks['uid']); ?>" rel="nofollow"><?php echo get_user_name($fks,'username'); ?></a><s></s></span><p><?php echo date("Y年m月d日 H:i",$fk['time']); ?></p></div></li>
            <?php  endforeach; $ln++; unset($ln); ?>
			<?php  else: ?>
			<div class="null-retips-wrapper"><div class="gth-icon transparent-png"></div><span>暂无访客哦！</span></div>
			<?php endif; ?>
                            
                          </ul>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
       
            var buy_url = "<?php echo WEB_PATH; ?>/userbuy/<?php echo idjia($member['uid']); ?>";
			var Order_url = "<?php echo WEB_PATH; ?>/userraffle/<?php echo idjia($member['uid']); ?>";
			var Post_url = "<?php echo WEB_PATH; ?>/userpost/<?php echo idjia($member['uid']); ?>";
            var ehtml = '<div id="divTopicShow"  style="text-align:center; padding:20px 0;" ><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/global/loading.gif" width="30" sytle="vertical-align:middle"/></div>';
			$("#div_BuyList").html(ehtml).show();



var buy_getAllp = function(){
                    
					$("#div_BuyList").html(ehtml);
                    $.ajax({
                        url: buy_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#div_BuyList').html(data).show();
                        },
                        error: function () {
                            $('#div_BuyList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
buy_getAllp();
var Order_getAllp = function(){
                    
					$("#div_OrderList").html(ehtml);
                    $.ajax({
                        url: Order_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#div_OrderList').html(data);
                        },
                        error: function () {
                            $('#div_OrderList').html("数据加载失败,请重试!");
                        }
                    });
             	
};
Order_getAllp();
var Post_getAllp = function(){
                    
					$("#div_PostList").html(ehtml);
                    $.ajax({
                        url: Post_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#div_PostList').html(data);
                        },
                        error: function () {
                            $('#div_PostList').html("数据加载失败,请重试!");
                        }
                    });
             	
};
Post_getAllp();
        
    </script>
    <!--底部-->
<?php include templates("index","footer");?>