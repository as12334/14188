<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <title>邀请管理 - <?php echo $webname; ?>触屏版</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />

    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css?v=130715" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css?v=130726" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/invite.css?v=130726" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.js"></script>
    <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v11">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>邀请管理</h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>

    <section class="clearfix g-member">
        <div class="clearfix m-round m-name">
            <div class="fl f-Himg">
                <a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $member['uid']; ?>/<?php echo $uids; ?>/" class="z-Himg">
                    <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($member['uid'],'img'); ?>" border=0/></a>
                <span class="z-class-icon0<?php echo $dengji_1['groupid']; ?> gray02"><s></s><?php echo $member['yungoudj']; ?></span>
            </div>
            <div class="m-name-info"><p class="u-name">
                <b class="z-name gray01"><?php echo get_user_name($member['uid']); ?></b><em>(<?php echo $member['mobile']; ?>)</em></p>
                <ul class="clearfix u-mbr-info"><li>可用微积分 <span class="orange"><?php echo $member['score']; ?></span></li>
                    <li>经验值 <span class="orange"><?php echo $member['jingyan']; ?></span></li>
                    <li>余额 <span class="orange">￥<?php echo $member['money']; ?></span>
                        <a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge/<?php echo $uids; ?>/" class="fr z-Recharge-btn">去充值</a></li>
                </ul>
            </div>
        </div>
        <div class="R-content">
            <div class="member-t"><h2>邀请好友</h2></div>

           <!-- <div id="divInvited" class="success-invitation gray02"  >
                <p>您的专属邀请链接(长按全选复制) </p>
                <span><input id="txtInfo"  style="width:80%;height:20px; "  value="1微币就能买IPhone 6哦，快去看看吧！ <?php echo WEB_PATH; ?>/register/<?php echo $uid; ?>" onpaste="return false" type="text"><span id="d_clip_container"></span></span>

            </div> -->
            
            <div id="divInvited" class="success-invitation gray02">
                <p><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/yaoqing_1.png" /></p>
				<p>此链接支持在QQ,微信以及手机和电脑的浏览器使用!</p>
				<p><br></p>
                <span>
				<textarea id="txtInfo" style="width:90%;height:75px; padding:5px; " onpaste="return false" type="text"> 1微币就能买IPhone 6S哦，快去看看吧！<?php echo WEB_PATH; ?>/mobile/user/register/<?php echo $uids; ?></textarea> </span>
                <p><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/yaoqing_2.png" /></p>
                

				 <!-- Baidu Button BEGIN -->
						<div class="bdsharebuttonbox" data-tag="share_1">
	<a class="bds_mshare" data-cmd="mshare"></a> 
    <a class="bds_sqq" data-cmd="sqq"></a>
	<a class="bds_qzone" data-cmd="qzone" href="#"></a>
  <!--  <a class="bds_weixin" data-cmd="weixin" href="#"></a>-->
	<a class="bds_tsina" data-cmd="tsina"></a>
	<a class="bds_baidu" data-cmd="baidu"></a>
	
	<a class="bds_tqq" data-cmd="tqq"></a>
    <a class="bds_renren" data-cmd="renren"></a>
	<a class="bds_more" data-cmd="more">更多</a>
	<!--<a class="bds_count" data-cmd="count"></a> -->
</div>
<script>
	window._bd_share_config = {
		common : {
			bdText : '1微币就能买IPhone 6S哦，快去看看吧！  ',	
			bdDesc : '',	
			bdUrl : '<?php echo WEB_PATH; ?>/mobile/user/register/<?php echo $uids; ?>/', 	
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
                <br>
                <p><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/yaoqing_3.png" /></p>
                
                <div class="mt10 f-Recharge-btn">
		         <a id="btnSubmit" href="<?php echo WEB_PATH; ?>/mobile/mobile/glist/<?php echo $uids; ?>/" class="orgBtn">去选择分享商品》》》</a>
	            </div>

            </div>

            <div id="divInviteInfo" class="get-tips gray01" style="">成功邀请 <span class="orange"><?php echo $involvedtotal; ?></span> 位会员注册，已有 <span class="orange"><?php echo $involvednum; ?></span> 位会员参与<?php echo _cfg('web_name_two'); ?></div>
            <div id="divList" class="list-tab SuccessCon">
            <ul class="listTitle">
            <li class="w200">用户名</li>
            <li class="w200">时间</li>
            <li class="w200">邀请编号</li>
            <li class="w200">消费状态</li>
            </ul>
                <?php if($involvedtotal!=0): ?>
                <?php $ln=1; if(is_array($invifriends)) foreach($invifriends AS $key => $val): ?>
                <ul class="listcon"><li class="w200"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $val['uid']; ?>/<?php echo $uids; ?>/" target="_blank" class="blue"><?php $val['mobile'];
                if($val['username']==''){
echo _strcut($val['mobile'],8);}else{echo $val['username'];}
                 ?></a>
                </li>
                    <li class="w200"><?php echo date('Y.m.d',$val['time']); ?></li>
                    <li class="w200"><?php echo $val['uid']; ?></li>
                    <li class="w200"><?php echo $records[$val['uid']]; ?></li>
                </ul>
                <?php  endforeach; $ln++; unset($ln); ?>
                <?php  else: ?>
               
                <?php endif; ?>
            </div>
    <?php if($involvedtotal==0): ?>
    <section class="clearfix">
        <ul >
	      <div class="haveNot z-minheight"><s></s><p>您还未有邀请谁哦！</p></div>
        </ul>
    </section>
    <?php endif; ?>
        </div>
        <div id="divPageNav" class="page_nav"></div>
</div>
    </section>
    
<?php include templates("mobile/index","footer");?>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_TEMPLATES_STYLE; ?>";  
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js');
</script>
<script>
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
</div>
</body>
</html>
