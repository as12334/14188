<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $tiezi['title']; ?></title>     
    
    <meta content="app-id=518966501" name="apple-itunes-app" />     
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />     
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />     
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css?" rel="stylesheet" type="text/css" />
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/single.css?" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/video.css" />
	<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
    <link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/bootstrap.css">

<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/main.min.css?i=2205"/>
</head>
<body>
<?php  
$urls    = $_SERVER['HTTP_HOST']; 
$webname = $this->_cfg['web_name'];
$appurl  = $this->_cfg['apk_url'];
$txt     = "app";
$app     = strstr($urls,$txt);
if(!$app){
 ?>
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/frozen.css" rel="stylesheet" type="text/css" />
<a href="http://a.app.qq.com/o/simple.jsp?pkgname=org.zywx.wbpalmstar.widgetone.uex11520819"
><header class="ui-header ui-header-positive" style="background-color: #ff0000!important;">
    <i class="ui-icon-menu left" data-menu=""><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/ba.png" width="31" height="24"></i>
            <div id="annun" style="white-space:nowrap;overflow:hidden;width:auto;margin: auto 40px">
            <span>&nbsp;&nbsp;<?php echo $webname; ?>，APP下载注册金。&nbsp;&nbsp;</span>
        </div>
        <i class="ui-icon-bugle right" data-href="<?php echo $appurl; ?>"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/down.png" width="30" ></i>
</header>
</a>
<script type="text/javascript">


    //跑马灯效果
    function marquee(obj) {
        if(obj!=null){
            var tmp = (obj.scrollLeft)++;
            if (obj.scrollLeft==tmp) obj.innerHTML += obj.innerHTML;
            if (obj.scrollLeft>=obj.firstChild.offsetWidth) obj.scrollLeft=0;
            window.setTimeout(function(){ marquee(obj); }, 20);
        }
    }
    marquee(document.getElementById('annun'));
</script>
<div style="height:44px;">&nbsp;</div>
<?php 
} 
 ?>
<div class="h5-1yyg-v1">
   <em style="display:none">
            <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $tiezi['image']; ?>"  />
            </em> 
<!-- 栏目页面顶部 -->
<header class="g-header">
        <div class="head-l">
	        <a href="<?php echo WEB_PATH; ?>/mobile/group/show/<?php echo $quanzi['id']; ?>/<?php echo $uids; ?>/" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo _strcut($tiezi['title'],32); ?></h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>

<!-- <div class="c_header" style="border-bottom: 16px solid #f3f3f3;height: 68px;">
      <div class="col-xs-4 text-left">
        <a href="javascript:;" onclick="history.go(-1)" class="c_header_left">
          <img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/deta_06.png" width=12  />
        </a>
      </div>
      <div class="col-xs-4 text-center c_header_center">
               <?php echo $quanzi['title']; ?>
      </div>
      <div class="col-xs-4 text-right">
      发现首页
      </div>
    </div> -->

<!-- 内页顶部 -->

        <section class="clearfix g-share-lucky">      
        
			<!-- <s class="z-Reward"></s> -->
            <a href="<?php echo WEB_PATH; ?>/mobile/group/show/<?php echo $quanzi['id']; ?>/<?php echo $uids; ?>/" class="fl u-lucky-img"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $quanzi['img']; ?>" border="0" ></a>
			
			<div class="u-lucky-r">
				<p><em class="green"><?php echo $quanzi['title']; ?></em><br/><em class="wz2">
       成员：<b class="red"><?php echo $quanzi['chengyuan']; ?></b>&nbsp;&nbsp;&nbsp;话题：<b class="red"><?php echo $quanzi['tiezi']; ?></b>
					
       </em><br/><em class="wz2"><?php echo _strcut($quanzi['jianjie'],52); ?></em></p> 
				
			</div>                
        </section>
        <!-- 热门推荐 -->
        <section class="clearfix g-share-ct">		
	        <b class="z-aw-es z-arrow"></b>	
	        	        
			<?php if($tiezi['qzid']==7  || $tiezi['qzid']==8): ?>
            <p style="margin: 0px 0px 14px; padding: 0px 0px 10px; font-weight: 200; font-size: 18px; line-height: 1.4; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(231, 231, 235); font-family: &#39;Helvetica Neue&#39;, Helvetica, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, Arial, sans-serif; white-space: normal; text-align:center"><?php echo $tiezi['title']; ?></p>
            <div class="c_big_box">
   
    <div class="c_video_name">
        
       
        <iframe frameborder="0" width="100%"  src="<?php echo $tiezi['url']; ?>"  height="255"    allowfullscreen></iframe>
                <p><span><?php echo date("Y-m-d",$tiezi['time']); ?></span><span class="c_play_num1 c_play_num">播放：<?php echo $tiezi['dianji']; ?></span></p>
        <!--<em id="zan" style="cursor:pointer">176</em>
         <input type="hidden" value="56"/> -->
          <br>
          
    </div>
    
 </div>
<div style="font-size: 12px;padding:0 0 14px 0;"><?php echo $tiezi['neirong']; ?></div>
            <?php  else: ?>
            <article class="m-share-con">
		        <h3><?php echo $tiezi['title']; ?></h3>
		        <em class="arial"><?php echo date("Y-m-d H:i:s",$tiezi['time']); ?></em>
		        <p class="z-share-pad" id="shareContent">
                <?php echo $tiezi['neirong']; ?>
            <?php if($tiezi['url']!=''): ?>
            <br />
            <iframe frameborder="0" width="100%"  src="<?php echo $tiezi['url']; ?>"  height="255"    allowfullscreen></iframe>
        
        <?php endif; ?>
                </p>
	        </article>
            <?php endif; ?>
            <div><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/fx.jpg" style="width:100%;" /></div>

<!--<div class="ui-btn-wrap" style="padding:5%;"> 
            <a class="ui-btn-lg ui-btn-danger" id="fxblock" onClick="indexblock()" href="javascript:void(0);">立即分享，邀请好友</a>
        </div> -->


<div class="wx-share" style="display: none" id="app">
    <div class="wx-share-txt">
        <!--<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/wxshare.png" style="width:100%;" /> -->
    </div>
    <div class="wx-share-btn">
        <a onClick="index()" href="javascript:void(0);">我知道了</a>
    </div>
</div>

<script type="text/javascript">
function indexblock()
{
  
   
   var app=document.getElementById("app");
   app.style.display="block";
}
function index()
{
  
   
   var fxblock=document.getElementById("fxblock");
   fxblock.style.display="none";
}

</script>


                <em style="padding-left:10px;">
                <!-- Baidu Button BEGIN -->
						<span class="bdsharebuttonbox" data-tag="share_1" > 
	<a class="bds_mshare" data-cmd="mshare"></a> 
    <a class="bds_sqq" data-cmd="sqq"></a>
	<a class="bds_qzone" data-cmd="qzone" href="#"></a>
    <!--<a class="bds_weixin" data-cmd="weixin" href="#"></a> -->
	<a class="bds_tsina" data-cmd="tsina"></a>
	<a class="bds_baidu" data-cmd="baidu"></a>
	
	<a class="bds_tqq" data-cmd="tqq"></a>
    <a class="bds_renren" data-cmd="renren"></a>
	<a class="bds_more" data-cmd="more"></a>
	<a class="bds_count" data-cmd="count"></a>
</span>
<script>
	window._bd_share_config = {
		common : {
			bdText : '<?php echo $tiezi['title']; ?>',	
			bdDesc : '<?php echo $tiezi['neirong']; ?>',	
			bdUrl : '<?php echo WEB_PATH; ?>/mobile/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/', 	
			bdPic : '<?php echo G_UPLOAD_PATH; ?>/<?php echo $tiezi['image']; ?>'
		},
		share : [{
			"bdSize" : 16
		}],
		
		image : [{
			viewType : 'list',
			viewPos : 'top',
			viewColor : 'black',
			viewSize : '16',
			viewList : ['sqq','qzone','tsina','huaban','tqq','renren','weixin']
		}],
		selectShare : [{
			"bdselectMiniList" : ['sqq','qzone','weixin','tqq','kaixin001','bdxc','tqf']
		}]
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
                </em>
               
                

                  
            <div id="commentList" class=" clrfix" style="display:none;">

             </div>
             <?php if($tiezi['qzid']==16 || $tiezi['qzid']==17): ?>
   <div class="c_big_box">  
   <br>        
             <h2><?php echo $othertitle; ?></h2>
    <ul class="c_video_list">
     <?php $ln=1;if(is_array($tieziother)) foreach($tieziother AS $tiezi): ?>
    <li>
            <a class="c_video_img" href="<?php echo WEB_PATH; ?>/mobile/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/" >
                <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $tiezi['image']; ?>" style="width:160px;height:120px;">
               <?php if($tiezi['qzid']==7): ?> <span></span><?php endif; ?>
            </a>
            <div class="c_video_right">
                <a class="c_video_text" href="<?php echo WEB_PATH; ?>/mobile/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/"><?php echo _strcut($tiezi['title'],58); ?></a>
                <p><span><?php echo date("Y-m-d",$tiezi['time']); ?></span>
                <?php if($tiezi['qzid']==6): ?> 
                <em class="c_play_num">阅读 <?php echo $tiezi['dianji']; ?></em>
                <?php elseif ($tiezi['qzid']==7): ?><span class="c_play_num"><?php echo $tiezi['dianji']; ?></span><?php endif; ?>
                
                </p>
            </div>
        </li>
        <?php  endforeach; $ln++; unset($ln); ?>
        </ul>
</div>
<?php endif; ?>
        </section>
        

        
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/foorFixed.css" rel="stylesheet" type="text/css" />                        
<footer class="footers" style=" padding-bottom:60px;">
	<div class="u-ft-nav" id="fLoginInfo">
	    <span><a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>">发现</a><b></b></span>
        <span><a href="<?php echo WEB_PATH; ?>/mobile/lucky/?yid=<?php echo $uids; ?>">免费抽奖</a><b></b></span>
		<span><a href="<?php echo WEB_PATH; ?>/mobile/mobile/about/<?php echo $uids; ?>/">新手指南</a><b></b></span>
        <?php if(get_user_arr()): ?>
        <span><a href="<?php echo WEB_PATH; ?>/mobile/home/?yid=<?php echo $uids; ?>" class="Member"><?php echo get_user_name(get_user_arr(),'username'); ?></a>
        <a href="<?php echo WEB_PATH; ?>/mobile/user/cook_end/<?php echo $uids; ?>/" class="Exit">退出</a></span>
        
        <?php  else: ?>
        <span><a href="<?php echo WEB_PATH; ?>/mobile/user/login/<?php echo $uids; ?>/">登录</a><b></b></span>
		<span><a href="<?php echo WEB_PATH; ?>/mobile/user/register/<?php echo $uids; ?>/">注册</a></span>
        <?php endif; ?>
		
	</div>
  <!--
	<p class="m-ftA"><a href="<?php echo WEB_PATH; ?>/mobile/mobile">触屏版</a><a href="<?php echo G_WEB_PATH; ?>" target="_blank">电脑版</a></p> 
	<p class="grayc">客服热线<span class="orange"><?php echo _cfg("cell"); ?></span> <br /><?php echo _cfg('web_copyright'); ?></p>
	<a id="btnTop" href="javascript:;" class="z-top" style="display:none;"><b class="z-arrow"></b></a>-->
</footer> 

<script type="text/javascript">

        $(function () {
			    
				
            var base_url = "<?php echo WEB_PATH; ?>/mobile/group/hueifuinsert";
            var ehtml = '<i></i> ';
			
			 

				
				

               
			 
			  function checkUserName() {
                var value = $("#sdhf_content").val();
                var length = len(value);
				var regM = /^1\d{10}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				 if (value == '' || value.length == 0) {
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "说点什么吧？").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                    return false;
                    
                }
				

                if (value == '' || value.length < 3) {
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "评论内容不能少于3个字！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                    return false;
                }
				if (value.length > 150) {
					var lentext = value.length-150;
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "已超过"+lentext+"个字了，删除一些吧！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                    return false;
                }
               
                return true;
				
            }


            function len(value) {
                var total = 0;
                for (i = 0; i < value.length; i++) {
                    var char = value.charCodeAt(i);
                    if ((char >= 0x0001 && char <= 0x007e) || (0xff60 <= char && char <= 0xff9f)) {
                        total++;
                    }
                    else {
                        total += 2;
                    }
                }
                return total;
            }


           

            $("#btnSubmitMsg").click(function () { 
                 if (checkUserName()) {
                    sdhf_content = $("#sdhf_content").val();
					tzid = $("#tzid").val();
					qzid = $("#qzid").val();
                    
					
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'EditorAjax', sdhf_content: sdhf_content, tzid: tzid, qzid: qzid},
                        success: function (data) {
                            if (data != '1000') {
                                $(".copy-tips").show();
                                $(".wap-tips").html(ehtml + data).show();
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 2000);
							//	$("#btnSubmitMsg").val("立即发送");
                            } else {
								//$("#btnSubmitMsg").addClass("letter-noSpac").val("正在发送...");
								$("#sdhf_content").val("");
								setTimeout(getAllp,30);
                               // $(".login-success").show();
								//$("#btnSubmitMsg").addClass("letter-noSpac").html("登录成功");
                                  //  location.href = "<?php echo WEB_PATH; ?>/go/shaidan/Editor/<?php echo $shaidan['sd_id']; ?>";
                               
                            }
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
				 }
            });
        });
    </script>
<?php 
						$yid=!isset($_GET['yid']) ? $yid : $_GET['yid'];
						 ?>
  <script type="text/javascript">
       
            var base_url_yaoqing = "<?php echo WEB_PATH; ?>/member/user/regAjax/<?php echo $yid; ?>";
            var ehtml = '';
			//$("#commentList").html(ehtml).show();



            var getAllp = function(){
                    
				//	$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url_yaoqing,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                        //  $('#commentList').html(data).show();
                        },
                        error: function () {
                        //    $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
getAllp();
        
    </script>                      
<script type="text/javascript">
       
            var base_url = "<?php echo WEB_PATH; ?>/mobile/group/neifu/<?php echo $tid; ?>";
            var ehtml = '<div id="divTopicShow"  style="text-align:center; padding:20px 0;" ><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/global/loading.gif" width="30" sytle="vertical-align:middle"/></div>';
			$("#commentList").html(ehtml).show();



            var getAllp = function(){
                    
					$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#commentList').html(data).show();
                        },
                        error: function () {
                            $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
getAllp();
        
    </script>

</div>
<div style="height:60px;">&nbsp;</div>
<div class="c_write_text c_write_newtext" id="replyDiv"><input type="text" class="col-xs-8" id="sdhf_content" maxlength="150" placeholder="我也说两句（不大于150个汉字）"><span class="col-xs-2" id="btnSubmitMsg">发送</span></div>

<input value="<?php echo $tiezi['id']; ?>" name="tzid" id="tzid" class="hidden"/>
					<input value="<?php echo $quanzi['id']; ?>" name="qzid" id="qzid" class="hidden"/>

<!--<div class="footerdi1" style="bottom: 0px; font-size:12px">
<div class="u-comment_q ">  <a id="btnSubmitMsg" href="javascript:;" class="z-DefineBtn_q">发表评论</a>
                            <span><textarea name="comment" id="sdhf_content" rows="1" class="z-comment-txt_q" >说点什么吧？</textarea></span>
                            
                            <input value="<?php echo $tiezi['id']; ?>" name="tzid" id="tzid" class="hidden"/>
					<input value="<?php echo $quanzi['id']; ?>" name="qzid" id="qzid" class="hidden"/>
                            
                        </div>
</div>  -->

    <div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
    <style type="text/css">
.copy-tips{position:fixed;z-index:999;top: 50%; left: 25%;width: 50%; height: 50px;}
.wap-tips{width: 100%; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; font-family: "微软雅黑"; margin-top: 20px; margin-left: 0px;opacity: 0.8; }

</style>

</body>
</html>
