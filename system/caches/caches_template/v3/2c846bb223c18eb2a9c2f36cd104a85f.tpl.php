<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $title; ?> - <?php echo $webname; ?>触屏版</title>     
    <meta content="app-id=518966501" name="apple-itunes-app" />     
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />     
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />     
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css?" rel="stylesheet" type="text/css" />

<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/header_footer.css?i=2205">
<link rel="stylesheet" media="screen,projection,tv" href="<?php echo G_TEMPLATES_CSS; ?>/mobile/main.min.css?i=2205"/>

<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/haoping.css" rel="stylesheet" type="text/css" media="screen,projection,tv" />

<style>
.a_user_img1 {
display: block;
width:64px;
margin: 5px auto;
border-radius: 50%;

background:#fff;
}
.a_user_img {
display: block;
width:64px;
position:absolute;
border-radius: 50%;
margin:2px;

}
.IImg{
width:64px;
margin-top:12px;
 float: left;
 border-radius: 50%;
}
.wz1{
   float: left;
   line-height: 20px;
    width: 198px;
    font-size: 16px;
    margin-top: 24px;
    margin-left: 20px;
    color:#555555;
}
.wz2{
    font-size: 12px;
    color:#888888;
}

</style>

</head>
<body >
<?php  $urls = $_SERVER['HTTP_HOST']; if($urls=="m.1kqduobao.com"){
 ?>
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/frozen.css" rel="stylesheet" type="text/css" />
<a href="http://a.app.qq.com/o/simple.jsp?pkgname=org.zywx.wbpalmstar.widgetone.uex11520819"
><header class="ui-header ui-header-positive" style="background-color: #ff0000!important;">
    <i class="ui-icon-menu left" data-menu=""><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/ba.png" width="31" height="24"></i>
            <div id="annun" style="white-space:nowrap;overflow:hidden;width:auto;margin: auto 40px">
            <span>&nbsp;&nbsp;1元微购，APP下载注册即送5元体验金。&nbsp;&nbsp;</span>
        </div>
        <i class="ui-icon-bugle right" data-href="http://a.app.qq.com/o/simple.jsp?pkgname=org.zywx.wbpalmstar.widgetone.uex11520819"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/down.png" width="30" ></i>
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
<header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo $title; ?></h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>

    <!--S 内容区域 -->
    <div class="container-fluid">
      <div class="haoping_box">
       <div class="haoping">
       <iframe scrolling="no" frameborder="0" width="100%" src="<?php echo WEB_PATH; ?>/mobile/lucky/luckyshow" height="447" ></iframe>
       </div>
     </div>
    </div>

<div  style="padding:0px 4px;">
         <em class="clearfix" style=" color:red">分享，朋友成功注册有佣金哦</em>
						<!-- Baidu Button BEGIN -->
						<span class="bdsharebuttonbox" data-tag="share_1" style="padding:0px 4px;">
                        
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
			bdText : '免费抽奖',	
			bdDesc : '',	
			bdUrl : '<?php echo WEB_PATH; ?>/mobile/lucky/?yid=<?php echo $uids; ?>', 	
			bdPic : '<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/lp/haoping.jpg'
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


            </div>
<div class="clear" style="clear:0"></div>
   <!-- 热门推荐 -->
   <style>
.login_layouts{ margin:10px 0px;}
.prompt{ padding:10px;}

.my-list{ padding:10px 0; height:420px; overflow:hidden}
        .my-list ul li {
            width: 100%;
            height: 54px;
            line-height: 54px;
            padding: 0px 10px;
            border-bottom: 1px dotted #d0d0d0;
            font-size: 14px;
            /*color: #888;*/
           
            overflow: hidden;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            text-align: left;

        }
.my-list ul li img {
            display: inline-block;
            width: 30px;
            height: 30px;
            margin: 0px 10px -8px 0px;
            border-radius: 27px;
        }
.my-list em{ color:red;}
.my-list span{ float:right;}
.prompt tr td {  border-bottom: 1px dotted #d0d0d0;height: 25px;line-height: 25px; vertical-align:middle}
.login_title{ padding-left:20px;}
.g-main{ margin:10px;}
.m-round {
border: 1px solid #DCDCDC;
border-radius: 5px;
background: #fff;
box-shadow: 1px 1px 1px #e7e7e7;
}
.m-tt1{ padding-left:10px;}
.prompt .imgs{border-radius: 2px;
width: 50px;
height: 50px;
padding-top:14px;}
</style>

    <section class="g-main">
	    
	    <article class="clearfix h5-1yyg-w310 m-round m-tj-li">
		    <div class="login_layouts">
	<div class="m-tt1">
		    <h2 class="fl">抽奖产品</h2>
		    
	    </div>
	<div class="prompt orange" >
    <table width="100%" border="0"  style=" text-align:center;">
    <tr>
    <?php 
						for($i=0;$i<=11; $i++){	
                         $t = "title".$i;
                         $img = "img_sl".$i;
                       $a =$i+1;
						 ?>
                        
  
    <td width="25%"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $rowlp[$img]; ?>" class="imgs"><br><?php echo $rowlp[$t]; ?></td>
    
    <?php if($a%4==0): ?>
     </tr>
     <tr>
     <?php endif; ?>
   
    



  
    
  <?php 
								}
							 ?>
     </tr>
     </table>
    </div>	
</div>
	    </article>
    </section>
    
    
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<section class="g-main">
<article class="clearfix h5-1yyg-w310 m-round m-tj-li">
<div class="login_layouts">
	<div class="login_title">
		<h2>会员中奖名单</h2>
		
	</div>
	<div class="prompt orange" >
     <div class="my-list">
      <ul style="margin-top:0px;" id="UserBuyNewList" class="list">
      
      <?php $ln=1;if(is_array($memberlist)) foreach($memberlist AS $sd): ?>
                        <?php 
						$i=rand(0,11);
                        $t = "title".$i;
                      
						 ?>
						
		<li><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($sd['uid'],'img',''); ?>" ><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($sd['uid']); ?>" target="_blank">
        <?php echo _strcut(get_user_name($sd['uid'],'username'),12); ?>
         </a>&nbsp;抽中了&nbsp;<em><?php echo $rowlp[$t]; ?></em> <span><?php echo $time; ?></span></li>
									
								    

                            
                            <?php  endforeach; $ln++; unset($ln); ?>
								        </ul>   
                                        </div> 
    </div>	
</div>
</article>
    </section>	   
    
      <script> 
						function autoScroll(obj){  
							$(obj).find("#UserBuyNewList").animate({  
								marginTop : "-49px"  
							},300,function(){  
								$(this).css({marginTop : "0px"}).find("li:first").appendTo(this);  
							})  
						}  
						$(function(){  
							setInterval('autoScroll(".my-list")',3000)  
						})  
					</script> 
		    
<?php include templates("mobile/index","footer");?>
</body>
</html>