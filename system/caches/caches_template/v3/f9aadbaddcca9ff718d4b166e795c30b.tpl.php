<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<script type="text/javascript">
function uaredirect(murl){
    try {
            if(document.getElementById("bdmark") != null){
                return;
            }
            var urlhash = window.location.hash;
            if (!urlhash.match("fromapp")){
                if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i))) {
                        location.replace(murl);
                }
            }
        } catch(err){}
		
}
urls=document.domain;
url = "http://"+urls+":"+location.port;
uaredirect(url+"/index.php/mobile/mobile/");

</script> 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title><?php if(isset($title)): ?><?php echo $title; ?><?php  else: ?><?php echo _cfg("web_name"); ?><?php endif; ?></title>
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<meta property="qc:admins" content="165064773761115161567753363757" />
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8;  IE=EDGE">
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm1.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/register.css"/>
<link rel="icon" type="image/x-icon" href="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/touch-icon.png">
 <link rel="icon" sizes="192x192" href="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/touch-icon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/touch-icon.png">
    <meta name="msapplication-TileImage" content="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/touch-icon.png">
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jquery.cookie.js"></script>
<meta name="pinggu-site-verification" content="99cdd3d4e37ce0865dd158cab6d87cfb" />
       
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_header.css" rel="stylesheet" type="text/css" />
</head>
<body>
 


<!--顶部部分-->



  
   <div class="d"><div>
    
	<div class="g-frame-top">
  
		<div class="g-width head-nav-bd">
			<ul class="head-nav-bd-l">
				<li class="M-favorite menu">
					<div class="menu-hd">
						<a id="addSiteFavorite" href="javascript:;">收藏</a>
					</div>
				</li>
				<li name="seeweb" class="M-attention menu seewebmenu"  id="seeweb">
					<div class="menu-hd">
						<b>关注</b> <i></i>
					</div>
					<div class="menu-bd" id="showsee">
						<div class="top-nav-bor M-focus-size">
							<ul>
								<li class="U_sina"><a  href="javascript:void(0)" onClick="postToSb();"
									target="_blank"><s></s><em>新浪微博</em></a></li>
								<li class="U_qq"><a href="javascript:void(0)" onClick="postToWb();" class="tmblog"
									target="_blank"><s></s><em>腾讯微博</em></a></li>
								<li class="U_wx"><a
									href="javascript:void(0)"
									><s></s><em>微信关注</em></a></li>
								<li class="U_wximg"><img alt="" style="width: 81px;"
									src="<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('wx'); ?>"></li>
							</ul>
						</div>
					</div>
					
			 
				</li>
				
	 
				<li class="M-attention menu">
					<div class="menu-hd">
						<a href="<?php echo WEB_PATH; ?>/group_qq"
							target="_blank">官方QQ群</a>
					</div>
				</li>
                
             
                
			</ul>
			<ul class="head-nav-bd-r">
			<!--登录-->
			<?php if(get_user_arr()): ?>
			<li id="liLoginBox" class="M-name menu"><div class="menu-hd">
			<a class="" href="<?php echo WEB_PATH; ?>/member/home"><img class="M-name-img" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_img(); ?>"><span class="M-name-txt blue mlr5"><?php echo get_user_name(get_user_arr(),'username'); ?></span></a><a href="<?php echo WEB_PATH; ?>/member/user/cook_end" class="">[退出]</a></div></li>
			<?php  else: ?>
            
            <!--<li id="liLoginBox" class="M-login menu"><div class="menu-hd">
						<a id="qq_login_btn" href="<?php echo WEB_PATH; ?>/api/qqlogin/" class="qq-icon" tabindex="5">QQ登录</a>
					</div></li> -->
			 <li id="liLoginBox" class="M-login menu"><div class="menu-hd">
						<a rel="nofollow" href="<?php echo WEB_PATH; ?>/login" class="gray6">登录</a>
					</div></li>
			 <li id="liRegisterBox" class="M-login menu"><div class="menu-hd">
						<a rel="nofollow" href="<?php echo WEB_PATH; ?>/register" class="gray6">注册</a>
					</div></li>
			<?php endif; ?>
							
				<li class="mod_sitemap_gap"></li>
				<li name="liHover" class="M-my-1yyg menu">
					<div class="menu-hd">
						<a href="<?php echo WEB_PATH; ?>/member/home">我的<?php echo _cfg('web_name_two'); ?></a> <i></i>
					</div>
					<div class="menu-bd">
						<div class="top-nav-bor M-my-size">
							<ul class="U-txt">
								<li><a href="<?php echo WEB_PATH; ?>/member/home/userbuylist"><?php echo _cfg('web_name_two'); ?>记录</a></li>
								<li><a href="<?php echo WEB_PATH; ?>/member/home/orderlist">获得的商品</a></li>
								<li><a href="<?php echo WEB_PATH; ?>/member/home/modify">个人设置</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li class="mod_sitemap_gap"></li>
				<div class="menu-bd-msg" style="display: none;"></div>
				<li id="liTopUMsg" class="M-mark menu" style="display: none;">
					<div class="menu-hd">
						<a href="#">消息</a> <i></i>
					</div>
					<div class="menu-bd" style="display: none;"></div>
				</li>
				<li id="liTopCart" class="M-shop menu">
					<div class="menu-hd">
						<a class="u-shop-tit" target="_blank"
							href="<?php echo WEB_PATH; ?>/member/cart/cartlist"><span
							class="Hicon"></span>购物车(<strong id="sCartTotal">0</strong>)</a> <em></em>
					</div>
					<div class="menu-bd">
						<div class="top-nav-bor M-shop-size" style="height: 97px;">
							<div class="M-shop-content" id="sCart"><p>您的购物车有<span class="orange fb mlr5" id="sCartTotal2">0</span>件商品</p><p>共计：<span class="orange fb mlr5" id="sCartTotalM">0.00</span>微币</p><a class="orange_btn" href="<?php echo WEB_PATH; ?>/member/cart/cartlist" target="_blank">查看我的购物车</a></div>
						</div>
					</div>
				</li>
				<li class="mod_sitemap_gap"></li>
				<li class="F-money menu">
					<div class="menu-hd">
						<a href="<?php echo WEB_PATH; ?>/member/home/userrecharge">快速充值</a>
					</div>
				</li>
               <li class="mod_sitemap_gap"></li>
				<li class="F-invitation menu">
					<div class="menu-hd">
						<a href="<?php echo G_WEB_PATH; ?>/app"target="_blank">手机APP</a>
					</div>
				</li>
				<li class="mod_sitemap_gap"></li>
				<li class="F-invitation menu">
					<div class="menu-hd">
						<a href="<?php echo WEB_PATH; ?>/member/home/reg_shop">商家入驻</a>
					</div>
				</li>
                <li class="mod_sitemap_gap"></li>
				<li class="F-invitation menu">
					<div class="menu-hd">
						<a href="<?php echo WEB_PATH; ?>/single/pleasereg">邀请</a>
					</div>
				</li>
				<li class="mod_sitemap_gap"></li>
				<li class="F-help menu">
					<div class="menu-hd">
						<a href="<?php echo WEB_PATH; ?>/help/1">帮助</a>
					</div>
				</li>
				<li class="mod_sitemap_gap"></li>
				<li class="F-service menu">
					<div class="menu-hd">
						<a id="btnTopQQ" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg('qq'); ?>&site=qq&menu=yes" class="F-icon-guest" target="_blank"><s></s>在线客服</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
<!--end顶部-->
<!--头部-->

<style>
.g-nav a {
font-size: 16px;
}
.number li.gray6 {
width: 56px;
font-size: 14px;
line-height: 29px;
_line-height: 31px;
}
.g-toolbar {width: 100%;height: 36px;border-bottom: 1px solid #ddd;position: relative;z-index: 99;background: #fff;-moz-box-shadow: 1px 1px 1px #f7f7f7;-webkit-box-shadow: 1px 1px 1px #f7f7f7;box-shadow: 1px 1px 1px #f7f7f7;}
.g-toolbar .w1190 {margin: 0 auto;}
.fl, .fl-img {float: left;}
ol, ul {list-style: none;}
div, ul, li, dl, dt, dd, table, td, input {font-size: 12px;}
.g-toolbar li {float: left;height: 36px;position: relative;z-index: 0;}
li {list-style: none;}
.g-toolbar li .u-menu-hd {float: left;height: 20px;line-height: 18px;padding: 8px 17px;position: relative;z-index: 93;}
.g-toolbar li a {color: #666;}
a:focus, a:link {outline: none;}
a:link, a:visited {text-decoration: none;}
a {text-decoration: none;color: #666;margin: 0;padding: 0;word-break: break-all;}
.g-toolbar li.u-arr, .g-toolbar li.u-arr-1yyg, .g-toolbar li.u-arr-news {position: relative;}
.g-toolbar li.u-arr .u-menu-hd {width: 79px;padding: 8px 17px 8px;_padding: 9px 17px 7px;}
.g-toolbar li .u-menu-hd {float: left;height: 20px;line-height: 18px;padding: 8px 17px;position: relative;z-index: 93;}
.g-toolbar li a {color: #666;}

.g-toolbar li.u-arr .u-select {width: 91px;height: 93px;padding: 7px 0 3px;text-align: center;}
.g-toolbar li .u-select {background: #fff;position: absolute;top: 36px;left: 0;z-index: 90;border: 1px solid #ddd;border-top: 0 none;display: none;overflow: hidden;}
* {padding: 0;margin: 0;}
.g-toolbar li.u-arr .u-select a {line-height: 20px;text-align: center;}
.g-toolbar li.u-arr .u-select img {display: block;width: 66px;height: 66px;margin: 0 auto 3px;}
.g-toolbar li.f-gap s {width: 0;height: 12px;font-size: 0;display: inline-block;border-left: 1px solid #ddd;overflow: hidden;margin: 12px 0;}
.g-toolbar li {float: left;height: 36px;position: relative;z-index: 0;}
.fr {float: right;}
.g-toolbar li {float: left;height: 36px;position: relative;z-index: 0;}
.g-toolbar li .u-select span {display: block;padding-left: 17px;text-align: left;margin-bottom: 7px;}
.g-toolbar li.u-arr .u-select a {text-align: center;}
h1, h2, h3, h4, h5, h6 {font-size: 100%;}
a.u-service-off i {background: url(/statics/templates/mowo/images/service-off-2014.gif) no-repeat;}
a.u-service i {display: block;float: left;width: 24px;height: 24px;cursor: pointer;}
.g-toolbar li i {display: block;float: left;background-position: 0 0;position: relative;top: -2px;left: -2px;_left: 0;}
.g-header {clear: both;height: 110px;}
.g-header .w1190 {position: relative;}
.logo_1yyg {width: 260px;height: 110px;background-repeat: no-repeat;}
.logo_1yyg a.logo {float: left;display: block;width: 230px;height: 100px;margin: 25px -5px;}
a:hover {color: #C40000;}
fieldset, img {border: 0;}
.search_cart_wrap {width: 930px;position: relative;z-index: 0;}
.number {width: 380px;height: 29px;margin-left: 600px;text-align: center;padding-top: 59px;}
.number ul {float: left;position: relative;}
.number li.gray6 {width: 56px;font-size: 14px;line-height: 29px;_line-height: 31px;}
.number li.nobor {width: 10px;border: 0 none;}
.number a li {display: block;width: 21px;color: #C40000;position: relative;}
.number li {float: left;display: block;font-size: 24px;height: 27px;line-height: 27px;text-align: center;margin: 0 2px;border-radius: 1px;border: 1px solid #ddd;overflow: hidden;}
.gray6, a.gray6:link, a.gray6:visited {color: #666;}
.gray6, a.gray6:link, a.gray6:visited {color: #666;}
.gray6 {color: #666!important;}
.number li cite {display: block;width: 21px;position: absolute;top: 0;left: 0;z-index: 1;}
.number li em {display: block;width: 21px;color:#C40000;}
.number li i {width: 196px;height: 0;border-top: 1px solid #ededed;position: absolute;top: 13px;left: 0;z-index: 0;}
.number li.nobor {width: 10px;border: 0 none;}
.number li.u-secondary {width: 40px;position: relative;text-align: left;}
.number li.u-secondary b {border-style: solid;border-width: 4px 0 4px;border-color: #fff;border-left: 4px solid rgb(102,102,102);width: 0;height: 0;font-size: 0;line-height: 0;position: absolute;left: 33px;top: 11px;}
.number li.u-secondary b s {border-style: solid;_border-style: dashed;border-width: 3px;border-color: transparent;border-left-width: 0;border-left: 3px solid #fff;width: 0;height: 0;font-size: 0;line-height: 0;position: absolute;top: -3px;left: -5px;}
s, strike, del {text-decoration: line-through;}
.searchs {width: 520px;position: absolute;top: 50px;left: 26px;}
.search .form {float: left;border: 1px solid #ccc;border-right: 0 none;width: 430px;height: 36px;position: relative;}
.search .form input {position: absolute;left: 0;top: 0;z-index: 0;color: #bbb;width: 295px;height: 18px;line-height: 18px;border: 0 none;padding: 9px 130px 9px 5px;font: 12px/150% "\5FAE\8F6F\96C5\9ED1",Arial;outline: 0;}
body, button, input, select, textarea {margin: 0 auto;font: 12px tahoma,arial,'Hiragino Sans GB',\5b8b\4f53,sans-serif;}
.search .form span {height: 36px;position: absolute;top: 0;right: 0;z-index: 10;}
.search .form span a {display: block;float: left;width: 35px;height: 20px;line-height: 20px;background: #eee;color: #666;margin: 8px 7px 0 0;display: inline;text-align: center;cursor: pointer;}
.search a.seaIcon {display: block;float: left;width: 80px;height: 30px;background: #C40000;padding-top: 8px;cursor: pointer;}
.search a.seaIcon i {display: block;width: 21px;height: 21px;background-position: 0 0;margin: 0 auto;}
.search a.seaIcon i, .m-menu-all h3 em, .nav-cart-btn i.f-cart-icon, a.u-cart s, .u-mui-tab li.f-cart a.u-menus i {display: block;background-image: url(/statics/templates/mowo/images/head-2014.png?v=141124);background-repeat: no-repeat;}
.g-nav {width: 1190px;height: 40px;line-height: 40px;margin: 0 auto;background: #C40000;color: #fff;}
.g-nav .w1190 {position: relative;z-index: 20;}
.w1190 {clear: both;width: 1190px;margin: 0 auto;}
.m-menu {width: 240px;height: 40px;float: left;background: #2af;position: relative;z-index: 60;}
.m-menu-all {width: 240px;position: absolute;left: 0;top: 0;z-index: 20;}
.m-menu-all h3 a {display: block;width: 222px;height: 40px;padding-left: 18px;position: relative;z-index: 5;color: #fff;}
.m-menu-all h3 em {display: block;width: 16px;height: 10px;background-position: -27px 0;position: absolute;right: 16px;top: 15px;}
.m-all-sort {display: block;}
.m-all-sort {width: 238px;height: 438px;background: #fff;border: 1px solid #21a5f7;border-top: 0 none;position: absolute;left: 0;top: 40px;z-index: 200;overflow: hidden;}
.m-all-sort dl.hover {background: #fffdf0;width: 238px;height: auto;padding: 13px 0 18px;position: relative;z-index: 10;}
.m-all-sort dl {clear: both;border-top: 1px solid #e6e6e6;margin-top: -1px;padding: 13px 0 18px;height: auto;line-height: 25px;overflow: hidden;}
.m-all-sort dl.hover dt a {color: #C40000;}
.m-all-sort dl a {margin-left: 15px;color: #666;}
.m-all-sort dt a {font-size: 15px;color: #333;}
.m-all-sort dl {clear: both;border-top: 1px solid #e6e6e6;margin-top: -1px;padding: 13px 0 18px;height: auto;line-height: 18px;overflow: hidden;}
body.home .nav-main li.f-nav-home, body.lottery .nav-main li.f-nav-lottery, body.share .nav-main li.f-nav-share, body.group .nav-main li.f-nav-group, body.cooperation .nav-main li.f-nav-invite, body.helper .nav-main li.f-nav-guide {background: #f04900;line-height: 40px;}
.nav-main li {float: left;}
.nav-main li a {display: block;padding: 0 30px;color: #fff;}
.nav-cart {width: 135px;height: 40px;background: #2af;position: relative;z-index: 20;}
.nav-cart-con {width: 239px;background: #fff;border: 1px solid #2af;position: absolute;right: 0;_right: -1px;z-index: 20;font-size: 12px;display: none;overflow: hidden;}
.nav-cart-con .m-loading-2014 {height: 100px;position: relative;display: none;}
.nav-cart-con .m-loading-2014 em {background: url(/statics/templates/mowo/images/goods_loading2.gif) no-repeat;width: 50px;height: 50px;position: absolute;top: 25px;left: 94px;}
.nav-car-cartEmpty {text-align: center;font-size: 14px;height: 100px;padding: 30px 0;line-height: 50px;position: relative;display: none;color: #666;text-align: center;}
.nav-car-cartEmpty i {display: block;width: 54px;height: 53px;background-position: 0 -30px;margin: 0 auto;}
.m-ser li .u-icons, .g-special li em, .nav-car-cartEmpty i, .u-cartEmpty i {display: block;background-image: url(/statics/templates/mowo/images/comm-2014.gif?v=1411112);background-repeat: no-repeat;}
.nav-cart-select {clear: both;width: 239px;overflow: hidden;}
.nav-cart-pay {clear: both;}
.nav-cart-btn i.f-cart-icon {display: block;width: 21px;height: 20px;float: left;background-position: 0 -34px;position: absolute;top: 10px;left: 17px;display: inline;}
.nav-cart-btn a {display: block;color: #fff;height: 40px;line-height: 40px;padding-left: 42px;position: relative;cursor: pointer;}
.g-frame-head,.g-frame-top{background: #fff;}
.head_mid{ padding-top:15px;}
</style>

<!--顶部下部分-->

	<div class="g-frame-head">
    
		<div class="head_mid">
			<div class="g-width head_mid_bg">
				<div id="topLogoAd" class="logo_1yyg"
					style="height: 100px; background: url(<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>) no-repeat;">
				<a class="logo_1yyg_img" href="<?php echo WEB_PATH; ?>" title="<?php echo _cfg('web_name_two'); ?>网站"><?php echo _cfg('web_name_two'); ?></a>
			  </div>
              <div style="padding-top:10px;">
				<div class="head_number">
					<ul>
						<li class="F-number-l"></li>
                        <a  href="<?php echo WEB_PATH; ?>/buyrecord" target="_blank">
						<li class="F-number-bg">
							<span class="gray9">累积参与</span>
							<span class="f-fn-size" id="spHeadTotalNum" style="width:83px; text-align:center">00000</span>
							
							<span class="gray9">
								<span>人次</span>
								<i class="mod_dropmenu_arrow"></i>
							</span>
						</li></a>
						<li class="F-number-r"></li>
					</ul>
			  </div>
              
				<div class="head_search">
                <div class="search">
                 <div class="form">
                      <input id="txtSearch" type="text" value=""输入手机试试"" />
                     <span>
                         <a href="<?php echo WEB_PATH; ?>/s_tag/苹果" target="_blank">苹果</a>
                         <a href="<?php echo WEB_PATH; ?>/s_tag/电脑" target="_blank">电脑</a>
                         <a href="<?php echo WEB_PATH; ?>/s_tag/手机" target="_blank">手机</a>
                     </span>
                 </div>
                 <a id="butSearch" href="javascript:;" class="seaIcon" style="line-height:20px;font-size:18px;text-align:center;deceration:none;color:white;background:#f60;">搜索</a>
             </div>
					<!--<div class="top_search">
						<input type="text" id="txtSearch" class="init" value='输入"iphone"试一试'
							placeholder="" style="color: rgb(187, 187, 187);"> <input
							type="button" id="butSearch" class="search_submit" value="搜索"
							onmouseout="this.className='search_submit'"
							onmouseover="this.className='search_submit_hover'">
                            
					</div> -->
					
				</div>
                </div>
			</div>
		</div>
		<!-- 头部导航栏 -->
		
	<?php 
		if($this->db){
			$cmodel=$this->db;
		}else{
			$cmodel=$mysql_model;
		}
       
		
		$two_cate_list = $cmodel->GetList("select cateid,parentid,name from `@#_category` where `model` = '1' and `parentid` = '0' order by `order` DESC");
		
	 ?>
	
	
	
		<div class="nav">
			<div class="g-width nav-bd">
				<div id="divGoodsSortList" class="M-All-goods">
					<div class="U-All-T">
						<a href="<?php echo WEB_PATH; ?>/goods_list" class="white"><b></b>所有商品</a>
					</div>					
					<div class="U-goods-class">
						<div class="goods-class-list">
						
						<?php $ln=1; if(is_array($two_cate_list)) foreach($two_cate_list AS $key => $catelist): ?>	
						<?php 							
							//$brand=$this->db->GetList("select id,cateid,name from `@#_brand` where `cateid` LIKE '%$catelist[cateid]%' order by `order` DESC");
							
								$cate2 = $cmodel->GetList("select cateid,parentid,name from `@#_category` where `parentid` = '$catelist[cateid]' order by `order` DESC");
								//echo "select cateid,parentid,name from `@#_category` where `parentid` = '$catelist[cateid]' order by `order` DESC";
								 
								
 							$i=$key+1;
						 ?>	
						
							<dl>
								<dt class="U-goods-<?php echo $i; ?>">
									<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $catelist['cateid']; ?>_0_0"> <i
										class="F-goods-img"></i><?php echo $catelist['name']; ?><i class="F-goods-arrow"></i>
									</a>
								</dt>
								
								<?php 	
							        
									if(is_array($cate2)){
									   foreach($cate2 AS $bval){
								 ?>	
								<dd>
									<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $bval['cateid']; ?>_0_0"><?php echo $bval['name']; ?></a>
								</dd>
								<?php 							        
									 }}
								 ?>	
						 
							</dl>
							 
							<?php  endforeach; $ln++; unset($ln); ?>	
							 
							 
							 
							 
						</div>
					</div>
				</div>
				<div class="M-nav-column">
					<ul>
						<li class="F-nav-back"><a href="<?php echo WEB_PATH; ?>"  class="home">首页</a></li>
						<?php echo Getheader('index'); ?>						 
					</ul>
				</div>
				<div class="M-nav-help">
					<a href="<?php echo WEB_PATH; ?>/member/home/qiandao" title="签到"
						target="_blank"><s></s></a>
				</div>
			</div>
		</div>
	</div>
<!--end 顶部下部分-->



<!--所有商品下拉特效-->
	<script>
		$(document).ready(function(){
				$("#divGoodsSortList").hover(function() {
				$(this).addClass("U-goods-hover").children("div.U-goods-class").show().prev().find("b").addClass("b_Triangle")
				}
				,function() {
					$(this).removeClass("U-goods-hover").children("div.U-goods-class").hide().prev().find("b").removeClass("b_Triangle")
				}
				).find("dl").each(function() {
					$(this).hover(function() {
					$(this).addClass("U-list-hover")
				}
				,function() {
					$(this).removeClass("U-list-hover")
				}
				)});
		});
	</script>
	<script>
$(function(){
	$("#sCart,#liTopCart").hover(
		function(){			
			$("#sCartlist,#sCartLoading").show();
			$("#sCartlist p,#sCartlist h3").hide();
			$("#sCart .mycartcur").remove();
			$("#sCartTotal2").html("");
			$("#sCartTotalM").html("");
			$.getJSON("<?php echo WEB_PATH; ?>/member/cart/cartheader/="+ new Date().getTime(),function(data){
				$("#sCart .mycartcur").remove();
				$("#sCartLoading").before(data.li);
				$("#sCartTotal2").html(data.num);
				$("#sCartTotalM").html(data.sum);
				$("#sCartLoading").hide();
				$("#sCartlist p,#sCartlist h3").show();
			});
		},
		function(){
			$("#sCartlist").hide();
		}
	);	
	
	
	$("#seeweb").hover(
		function(){			
			$("#seeweb,#showsee").show();		 
		},
		function(){
			$("#showsee").hide();
		}
	);
	$("#sGotoCart").click(function(){
		window.location.href="<?php echo WEB_PATH; ?>/member/cart/cartlist";
	});
})
function delheader(id){
	var Cartlist = $.cookie('Cartlist');
	var info = $.evalJSON(Cartlist);
	var num=$("#sCartTotal2").html()-1;
	var sum=$("#sCartTotalM").html();
	info['MoenyCount'] = sum-info[id]['money']*info[id]['num'];
		
	delete info[id];
	//$.cookie('Cartlist','',{path:'/'});
	$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
	$("#sCartTotalM").html(info['MoenyCount']);
	$('#sCartTotal2').html(num);
	$('#sCartTotal').text(num);											
	$('#btnMyCart em').text(num);
	$("#mycartcur"+id).remove();
}
$(function(){
	$(".M-my-1yyg").mouseover(function(){
		$(this).addClass("menu-hd-hover");
	});
	$(".M-shop").mouseover(function(){
		$(this).addClass("menu-hd-hover");
	});
	
	$(".seewebmenu").mouseover(function(){
		$(this).addClass("menu-hd-hover");
	});
	
	
	$(".M-my-1yyg").mouseout(function(){
		$(this).removeClass("menu-hd-hover");
	});
	$(".M-shop").mouseout(function(){
		$(this).removeClass("menu-hd-hover");
	});	
	
	$(".seewebmenu").mouseout(function(){
		$(this).removeClass("menu-hd-hover");
	});
});
$(function(){
	var key = "iphone";
	$("#txtSearch").focus(function(){
		$("#txtSearch").css({background:"#FFFFCC"});
		var va1=$("#txtSearch").val();
		if(va1=='输入"'+key+'"试一试'){
			$("#txtSearch").val("");
		}
	});
	$("#txtSearch").blur(function(){
		$("#txtSearch").css({background:"#FFF"});
		var va2=$("#txtSearch").val();
		if(va2==""){
			$("#txtSearch").val('输入"'+key+'"试一试');
		}			
	});
	
	$("#butSearch").click(function(){
		var keyval = $("#txtSearch").val();
		if(keyval=='输入"'+key+'"试一试' || keyval==""){keyval = key;}
		window.location.href="<?php echo WEB_PATH; ?>/s_tag/"+keyval;
	});
});
var allcount = 0;
var H = $("#spHeadTotalNum");
var getAllNum = function(){
	var a = $("#spBuyCount");
	var b = a.text();
	$.ajax({
		url: "<?php echo WEB_PATH; ?>/api/ajaxcount2/buy_count",
		type:"POST",
		success: function(ret){
			ret = JSON.parse(ret);
			if (ret.status == 0) {
                if (allcount != ret.count) {
                    if (allcount == 0) {
                        allcount = ret.count;
                        var aE = ret.count.toString();
                        var aD = aE.length;
                        var az = -12;
                        var aF = "";
                        for (var aI = 0; aI < aD; aI++) {
                            az = az + 12;
							var au = '<div sytle=" border:1px solid red;">';
                            var aA = '<div name="dig" class="roll" style="right:' + az + 'px; top:-270px;text-align:center">';
                            for (var aG = 9; aG > -1; aG--) {
                                aA += '<em t="' + aG + '">' + aG + "</em>"
                            }
                            aA += "</div>";
							au += '</div>';
                            if (aI != 0 && (aI + 1) % 3 == 0) {
                                az = az + 12;
                                aA = '<div class="roll" style="right:' + az + 'px;"></div>' + aA
                            }
                            aF = aA + aF + au}
                         H.html(aF + au);
                        var aC = aE.split("");
                        H.children('div[name="dig"]').each(function(aN, aK) {
                            var aM = $(this);
                            var aL = parseInt(aC[aN]);
                            aM.animate({
                                top: "-" + (30 * (9 - aL)) + "px"
                            },1500)
                            // aM.animate({
                            //     top: "-" + (30 * (9 - aL)) + "px"
                            // },
                            // {
                            //     queue: false,
                            //     duration: b,
                            //     complete: function() {}
                            // })
                        })
                    } else {
                        var aB = allcount.toString().split("");
                        var aJ = ret.count.toString().split("");
                        allcount = ret.count;
                        H.children('div[name="dig"]').each(function(aP, aL) {
                            var aO = $(this);
                            var aQ = 0;
                            var aN = parseInt(aB[aP]);
                            if (aB[aP] < aJ[aP]) {
                                aQ = parseInt(aJ[aP]) - parseInt(aB[aP])
                            } else {
                                aQ = 10 + parseInt(aJ[aP]) - parseInt(aB[aP])
                            }
                            aO.css("top", "-270px");
                            var aR = aO.children('em[t="' + aN + '"]');
                            var aK = aR.nextAll();
                            for (var aM = aK.length - 1; aM > -1; aM--) {
                                aO.prepend(aK[aM])
                            }
                            aO.animate({
                                top: "-" + (270 - aQ * 30) + "px"
                            },1500)
                            // aO.animate({
                            //     top: "-" + (270 - aQ * 30) + "px"
                            // },
                            // {
                            //     queue: false,
                            //     duration: b,
                            //     complete: function() {}
                            // })
                        })
                    }
                }
            }
		}
	});
	setTimeout(getAllNum,5000);
};
getAllNum();

function postToWb(){

var _t = encodeURI(document.title);

var _url = encodeURI(document.location);

var _appkey = encodeURI("appkey");//你从腾讯获得的appkey

var _pic = encodeURI('');//（列如：var _pic='图片url1|图片url2|图片url3....）

var _site = '';//你的网站地址


var _u = 'http://v.t.qq.com/share/share.php?title='+_t+'&url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic;

window.open( _u,'转播到腾讯微博', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );

}


function postToSb(){

var _t = encodeURI(document.title);

var _url = encodeURI(document.location);

var _appkey = encodeURI("appkey");//你从腾讯获得的appkey

var _pic = encodeURI('');//（列如：var _pic='图片url1|图片url2|图片url3....）

var _site = '';//你的网站地址

var _u = 'http://v.t.sina.com.cn/share/share.php?title='+_t+'&url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic;

window.open( _u,'转播到新浪微博', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );

}

</script>

<!--end所有商品下拉特效-->