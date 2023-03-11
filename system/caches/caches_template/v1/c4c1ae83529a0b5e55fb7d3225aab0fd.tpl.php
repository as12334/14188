<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Home.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newscss/index.css?date=160728" />




<style>
.search a.seaIcon i,.m-menu-all h3 em,.nav-cart-btn i.f-cart-icon,a.u-cart s,.u-mui-tab li.f-cart a.u-menus i,.nav-main li.f-nav-thanks span,.u-shortcut .u-float-list i,.cartEmpty i,.g-toolbar li.u-arr .u-menu-hd{
	display:block;
	background-image:url(<?php echo G_TEMPLATES_STYLE; ?>/newimages/head-2014.png?v=0415);
	background-repeat:no-repeat;
}
a.u-now:hover{
	background:#f40;
	color:#fff;
}

a.u-cart{
	width:60px;
	background:#ffac4a;
}

a.u-cart s{
	display:block;
	width:21px;
	height:27px;
	background-position:0 -70px;
	margin:4px auto;
}

a.u-cart:hover{
	background:#f92;
}

 </style>



<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/index3.css?date=20140731">
<!--<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/mowonav/mowo.css?date=20140731"> -->
<style>
.pic{
	position: relative;
	display: block;
}
.light{
cursor:pointer;
position: absolute;
left: -180px;
top: 0;
width: 200px;
height: 180px;
background-image: -moz-linear-gradient(0deg,rgba(255,255,255,0),rgba(255,255,255,0.5),rgba(255,255,255,0));
background-image: -webkit-linear-gradient(0deg,rgba(255,255,255,0),rgba(255,255,255,0.5),rgba(255,255,255,0));
transform: skewx(-25deg);
-o-transform: skewx(-25deg);
-moz-transform: skewx(-25deg);
-webkit-transform: skewx(-25deg);
}
.pic:hover .light{
left:180px;
-moz-transition:0.5s;
-o-transition:0.5s;
-webkit-transition:0.5s;
transition:0.5s;
}
.fff1{
	display: inline-block; width: 29px; height: 25px; font-style: normal; font-size: 14px; color: rgb(255, 255, 255); background: transparent url(<?php echo G_TEMPLATES_STYLE; ?>/newimages/icon_index.png) no-repeat scroll -46px -22px; line-height: 30px; padding-left: 2px; margin-right: 18px; float: left; margin-top: 5px;
	}
</style>

<style>
.g-frame-head,div{margin: 0;}
.u-txt {
z-index: 10;
}
.g-width {
width:1190px;
}
</style>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/layer/layer.min.js"></script>

<script type="text/javascript" >
  $(function(){
	    var _BuyList=$("#buyList");
        var Trundle = function () {
            _BuyList.prepend(_BuyList.find("li:last")).css('marginTop', '-85px');
            _BuyList.animate({ 'marginTop': '0px' }, 800);
        }
        var setTrundle = setInterval(Trundle, 3000);
        _BuyList.hover(function () {
            clearInterval(setTrundle);
            setTrundle = null;
        },function () {
            setTrundle = setInterval(Trundle, 3000);
        });
    });
	
	
	  $(function(){
	    var _BuyList=$("#ulReplyList");
        var Trundle = function () {
            _BuyList.prepend(_BuyList.find("li:last")).css('marginTop', '-85px');
            _BuyList.animate({ 'marginTop': '0px' }, 800);
        }
        var setTrundle = setInterval(Trundle, 3000);
        _BuyList.hover(function () {
            clearInterval(setTrundle);
            setTrundle = null;
        },function () {
            setTrundle = setInterval(Trundle, 3000);
        });
    });

</script>


  <!--中间内容-->
  	<!--内容-->
   
        <!--内容-->
        <div class="g-content clrfix">
            <div class="w1190">
                <div class="home-banner fl">
                    <div id="div_slide" class="slide-scroll m-slides">
                        <div id="div_guide" class="m-guide-con" style="display: none;">
                            <div class="m-guideBg"></div>
                            <div class="m-guide">
                                <ul id="ul_guide">
                                    <li class="f-step1"><a href="javascript:;" title="30秒了解"></a>
                                        <img src="<?php echo G_UPLOAD_PATH; ?>/banner/step_01.gif?v=141113" /></li>
                                    <li class="f-step2"><a href="javascript:;" title="下一步"></a>
                                        <img src="<?php echo G_UPLOAD_PATH; ?>/banner/step_02.gif?v=141113" /></li>
                                    <li class="f-step3"><a href="javascript:;" title="下一步"></a>
                                        <img src="<?php echo G_UPLOAD_PATH; ?>/banner/step_03.gif?v=141113" /></li>
                                    <li class="f-step4"><a href="javascript:;" title="下一步"></a>
                                        <img src="<?php echo G_UPLOAD_PATH; ?>/banner/step_04.gif?v=141113" /></li>
                                    <li class="f-step5"><a href="javascript:;" title="下一步"></a>
                                        <img src="<?php echo G_UPLOAD_PATH; ?>/banner/step_05.gif?v=141113" /></li>
                                    <li class="f-step6"><a href="/index.php/single/newbie" target="_blank" title="继续了解详情"></a>
                                        <img src="<?php echo G_UPLOAD_PATH; ?>/banner/step_06.gif?v=141113" /></li>
                                </ul>
                                <a id="guide_close" href="javascript:;" class="m-guide-close" title="关闭"></a>
                            </div>
                            <div class="u-guide-arrow">
                                <a id="guide_pre" href="javascript:;" class="u-guide-prev"><s></s></a>
                                <a id="guide_next" href="javascript:;" class="u-guide-next"><s></s></a>
                            </div>
                        </div>
                        <?php $slides=$this->DB()->GetList("select * from `@#_slide` where 1",array("type"=>1,"key"=>'',"cache"=>0)); ?>
                         <div id="slideImg" class="rslides" style="opacity: 1;">
							<ul id="slideul">
								 
								
								<?php $ln=1;if(is_array($slides)) foreach($slides AS $slide): ?>
								<?php if($ln == 1): ?>
								<li style="display:list-item;"><a href="<?php echo $slide['link']; ?>" target="_blank"><img width="750" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $slide['img']; ?>"></a></li>
								<?php  else: ?>
								<li style="display:none;"><a href="<?php echo $slide['link']; ?>" target="_blank"><img width="750" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $slide['img']; ?>"></a></li>
								<?php endif; ?>
								<?php  endforeach; $ln++; unset($ln); ?>
							</ul>
						</div>
                        <div id="posterBanner" style="display: none;"></div>
						 <a class="rslides_nav rslides1_nav pre" href="javascript:;" style="display: none;">Previous</a>
						 <a class="rslides_nav rslides1_nav next" href="javascript:;" style="display: none;">Next</a>
						 <ul class="rslides_tabs">
						<?php 					
							for($i=1;$i<=count($slides);$i++){
							echo '<li class=""><a href="javascript:;">'.$i.'</a></li>' ;
							}
						 ?>						
						</ul>
                    </div>

                    <!--广告位下方推荐-->
                    <div class="slide-comd">
                        <?php $ln=1;if(is_array($ggshop2)) foreach($ggshop2 AS $gshop): ?>
                        
                                <div class="commodity">
                                    <ul>
                                        <li class="comm-info fl">
                                            <span><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $gshop['id']; ?>" target="_blank" title="<?php echo $gshop['title']; ?>"><?php echo _strcut($gshop['title'],50); ?></a></span>
                                            <p class="gray">已参与<em class="orange"><?php echo $gshop['canyurenshu']; ?></em>人次</p>
                                            
                                            <p class="gray">由商家<em class="orange"><?php echo _strcut($gshop['description'],20); ?></em>负责发货</p>
                                        </li>
                                        <li class="comm-pic fr"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $gshop['id']; ?>" target="_blank" title="<?php echo $gshop['title']; ?>">
                                            <cite>
                                                <img alt="<?php echo $gshop['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $gshop['thumb']; ?>" border="0" width="100" height="100"></cite>
                                            
                                        </a>
                                        </li>
                                    </ul>
                                </div>
                         <?php  endforeach; $ln++; unset($ln); ?>   
                                
                            
                    </div>
                </div>
                <div class="home-event fr">
                    <div class="what-1yyg">
                        <a id="what_1yyg" href="javascript:void(0);" title="什么是<?php echo _cfg('web_name_two'); ?>？30秒了解">
                            <img src="<?php echo G_UPLOAD_PATH; ?>/banner/index-come.gif" alt="" /></a>
                    </div>
                    <div class="honesty">
                        <ul>
                            <li><a href="javascript:;" title="诚信网站"><i class="i1"></i>诚信网站</a></li>
                            <li><a href="javascript:;" rel="nofollow" title="可信网站"><i class="i2"></i>可信网站</a></li>
                            <li><a href="javascript:;" rel="nofollow" title="电商诚信"><i class="i3"></i>电商诚信</a></li>
                            <li><a href="javascript:;" rel="nofollow" title="监督管理局"><i class="i5"></i>监督管理局</a></li>
                            <li><a href="javascript:;" rel="nofollow" title="服务保证"><i class="i4"></i>服务保证</a></li>
                            <li><a href="javascript:;" rel="nofollow" title="更多"><i class="i6"></i>更多</a></li>
                        </ul>
                    </div>
                    <div class="index_news clrfix">
                        <dl>
                            <dt><a href="<?php echo WEB_PATH; ?>/group/show/3" target="_blank" title="平台公告">平台公告</a></dt>
                            <?php $ln=1;if(is_array($ggtitle2)) foreach($ggtitle2 AS $val): ?>
                            
                                    <dd class=""><b></b><a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $val['id']; ?>" target="_blank" title="<?php echo $val['title']; ?>"><?php echo _strcut($val['title'],40); ?></a></dd><?php  endforeach; $ln++; unset($ln); ?>
                                
                                    
                                
                        </dl>
                    </div>
                </div>
            </div>
        </div>



<div class="g-wrap w1190">
       <!--最新揭晓-->
            <div class="g-title">
                <h3 class="fl">最新揭晓<span></span></h3>
                <div class="m-other fr"><cite><a href="<?php echo WEB_PATH; ?>/goods_lottery" target="_blank" title="看看附近都有谁获得了商品？"><img src="<?php echo G_TEMPLATES_STYLE; ?>/newimages/mowomap.gif" style="position:relative;top:4px;">看看附近都有谁获得了商品？</a></cite></div>
            </div>
            <div class="g-list">
                <ul id="ulNewAwary">
                <?php $ln=1;if(is_array($shopqishu)) foreach($shopqishu AS $qishu): ?>
                     <?php 
            	$qishu['q_user'] = unserialize($qishu['q_user']);
             ?>
						  	<li>
						<dl>
							<dt><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>" target="_blank" class="pic">
							<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $qishu['thumb']; ?>" height="200px" width="200px">
							<i class="light"></i>
							</a></dt>
						  <dd class="f-gx"><div class="f-gx-user"><span>恭喜</span><span class="blue"><a rel="nofollow" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($qishu['q_uid']); ?>" target="_blank"><?php echo get_user_name($qishu['q_user']); ?></a></span><span>获得</span></div></dd><br>
							<dd class="u-name"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>" target="_blank" class="name"><?php echo _strcut($qishu['title'],50); ?></a></dd>
						</dl>
						<cite style="display: inline;"></cite>
					</li>
						<?php  endforeach; $ln++; unset($ln); ?>
													
					<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/GLotteryFun.js"></script>
						<script type="text/javascript">
							$(document).ready(function(){gg_show_time_init("ulNewAwary",'<?php echo WEB_PATH; ?>',0);});					
						</script>
                </ul>
            </div>
            <!--热门推荐-->
            <div class="g-title">
                <h3 class="fl">热门推荐</h3>
                <div class="m-other fr"><a href="<?php echo WEB_PATH; ?>/goods_list"  target="_blank" title="更多" class="u-more">更多</a></div>
            </div>
            <div class="g-hot clrfix">
                <div class="g-hotL fl" id="divHotGoodsList">
                <?php $ln=1;if(is_array($shoplistrenqi2)) foreach($shoplistrenqi2 AS $renqi): ?>
									<div class="g-hotL-list">
						<div class="g-hotL-con">
							<ul>
								<li class="g-hot-pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>" class="pic"><img alt="<?php echo $renqi['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>"><i class="light"></i></a></li>
								<li class="g-hot-name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>"><?php echo _strcut($renqi['title'],50); ?></a></li>
								<li class="gray">价值：<?php echo $renqi['money']; ?></li>
								<li class="g-progress"><dl class="m-progress">
                                <dt><b style="width:<?php if(($renqi['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($renqi['canyurenshu'],$renqi['zongrenshu']); ?><?php endif; ?>;"></b></dt>
                                <dd><span class="orange fl"><em><?php echo $renqi['canyurenshu']; ?></em>已参与</span><span class="gray6 fl"><em><?php echo $renqi['zongrenshu']; ?></em>总需人次</span><span class="blue fr"><em><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></em>剩余</span></dd></dl></li>
								<li><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" class="u-imm" target="_blank" title="只要1微币，即可购买">立即<?php echo _cfg('web_name_two'); ?></a></li>
							</ul>
						</div>
					</div><?php  endforeach; $ln++; unset($ln); ?>
										
									</div>
                <div class="g-hotR fr">
                    <div class="u-are">正在<?php echo _cfg('web_name_two'); ?></div>
                    <div class="g-zzyging">
                        <ul id="UserBuyNewList" style="margin-top: 0px;">
                        <?php $ln=1;if(is_array($go_record)) foreach($go_record AS $gorecord): ?>
						
                        <li><span class="fl"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $gorecord['shopid']; ?>" target="_blank" title="<?php echo get_user_name($gorecord); ?>"><img alt="<?php echo get_user_name($gorecord); ?>" width="40" height="40" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo shopimg($gorecord['shopid']); ?>"><i></i></a></span><p><a target="_blank" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($gorecord['uid']); ?>" title="<?php echo get_user_name($gorecord); ?>" class="blue"><?php echo get_user_name($gorecord); ?></a><br><a target="_blank" href="<?php echo WEB_PATH; ?>/goods/<?php echo $gorecord['shopid']; ?>" title="<?php echo $gorecord['shopname']; ?>" class="u-ongoing"><?php echo $gorecord['shopname']; ?></a></p>
                        </li>
						<?php  endforeach; $ln++; unset($ln); ?>
														
														
													</ul>
					</div>
					<script> 
						function autoScroll(obj){  
							$(obj).find("#UserBuyNewList").animate({  
								marginTop : "-89px"  
							},500,function(){  
								$(this).css({marginTop : "0px"}).find("li:first").appendTo(this);  
							})  
						}  
						$(function(){  
							setInterval('autoScroll(".g-zzyging")',3000)  
						})  
					</script>
                    <div class="u-see100">看一看谁的运气最好！</div>
                </div>
            </div>
            
            <!--0元专区--
			<div class="g-title">
                <h3 class="fl" style="color:red"><i class="fff">0F</i>0元专区</h3>
                <div class="m-other fr"><a href="<?php echo WEB_PATH; ?>/goods_list/0_0_7" target="_blank" title="更多" class="u-more">更多</a></div>
            </div>

            <div class="announced-soon clrfix" id="divSoonGoodsList">
            
				<?php $ln=1;if(is_array($meoney0)) foreach($meoney0 AS $renqi): ?>	
                
				 <div class="soon-list-con">

					<div class="soon-list">
                    
						<ul id="ulGoodsList">
                        
                        
                        <li class="g-soon-pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>" class="pic"><img alt="<?php echo $renqi['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>"><i class="light"></i>
                            <li class="soon-list-name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>"><?php echo $renqi['title']; ?></li></a>
							<li class="gray">价值：<?php echo $renqi['money']; ?></li>
							<li class="g-progress"><dl class="m-progress"><dt><b style="width:<?php if(($renqi['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($renqi['canyurenshu'],$renqi['zongrenshu']); ?><?php endif; ?>;"></"></b></dt><dd><span class="orange fl"><em><?php echo $renqi['canyurenshu']; ?></em>已参与</span><span class="gray6 fl"><em><?php echo $renqi['zongrenshu']; ?></em>总需人次</span><span class="blue fr"><em><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></em>剩余</span></dd></dl></li>
							<li><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" class="u-now">立即<?php echo _cfg('web_name_two'); ?></a>
                            <span style="display:none"><a  title="加入到购物车" class="u-cart"><s></s></a></span></li>
                         </ul>
                            
                        <div class="Curbor_id" style="display:none;"><?php echo $renqi['id']; ?></div>
							<div class="Curbor_yunjiage" style="display:none;">><?php echo $renqi['yunjiage']; ?></div>
							<div class="Curbor_shenyu" style="display:none;"><?php echo $renqi['money']; ?></div>
                            
					</div>
				</div>
                        
									
                    <?php  endforeach; $ln++; unset($ln); ?>
                    
							
					 				
							</div>
                            <!--end-->
            
			<!--10元专区-->
			<div class="g-title">
                <h3 class="fl"><i class="fff"></i>10元专区</h3>
                <!--<div class="m-other fr"><a href="<?php echo WEB_PATH; ?>/goods_list/31" target="_blank" title="更多" class="u-more">更多</a></div> -->
            </div>

            <div class="announced-soon clrfix" id="divSoonGoodsList">
            
				<?php $ln=1;if(is_array($meoney10)) foreach($meoney10 AS $renqi): ?>	
                
				 <div class="soon-list-con">

					<div class="soon-list">
                    
						<ul id="ulGoodsList">
                        
                        
                        <li class="g-soon-pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>" class="pic"><img alt="<?php echo $renqi['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>"><i class="light"></i>
                            <li class="soon-list-name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>"><?php echo $renqi['title']; ?></li></a>
							<li class="gray">价值：<?php echo $renqi['money']; ?></li>
							<li class="g-progress"><dl class="m-progress"><dt><b style="width:<?php if(($renqi['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($renqi['canyurenshu'],$renqi['zongrenshu']); ?><?php endif; ?>;"></"></b></dt><dd><span class="orange fl"><em><?php echo $renqi['canyurenshu']; ?></em>已参与</span><span class="gray6 fl"><em><?php echo $renqi['zongrenshu']; ?></em>总需人次</span><span class="blue fr"><em><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></em>剩余</span></dd></dl></li>
							<li><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" class="u-now">立即<?php echo _cfg('web_name_two'); ?></a><a href="javascript:;" title="加入到购物车" class="u-cart"><s></s></a></li>
                         </ul>
                            
                        <div class="Curbor_id" style="display:none;"><?php echo $renqi['id']; ?></div>
							<div class="Curbor_yunjiage" style="display:none;">><?php echo $renqi['yunjiage']; ?></div>
							<div class="Curbor_shenyu" style="display:none;"><?php echo $renqi['money']; ?></div>
                            
					</div>
				</div>
                        
									
                    <?php  endforeach; $ln++; unset($ln); ?>
                    
							
					 				
							</div>
                            <!--end-->
            <!--100元专区-->
            <div class="g-title">
                <h3 class="fl"><i class="fff"></i>100元专区</h3>
                <!--<div class="m-other fr"><a href="<?php echo WEB_PATH; ?>/goods_list/5" target="_blank" title="更多" class="u-more">更多</a></div> -->
            </div>

            <div class="announced-soon clrfix" id="divSoonGoodsList">
            
				<?php $ln=1;if(is_array($meoney100)) foreach($meoney100 AS $renqi): ?>	
                
				 <div class="soon-list-con">

					<div class="soon-list">
                    
						<ul id="ulGoodsList">
                        
                        
                        <li class="g-soon-pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>" class="pic"><img alt="<?php echo $renqi['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>"><i class="light"></i>
                            <li class="soon-list-name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>"><?php echo $renqi['title']; ?></li></a>
							<li class="gray">价值：<?php echo $renqi['money']; ?></li>
							<li class="g-progress"><dl class="m-progress"><dt><b style="width:<?php if(($renqi['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($renqi['canyurenshu'],$renqi['zongrenshu']); ?><?php endif; ?>;"></"></b></dt><dd><span class="orange fl"><em><?php echo $renqi['canyurenshu']; ?></em>已参与</span><span class="gray6 fl"><em><?php echo $renqi['zongrenshu']; ?></em>总需人次</span><span class="blue fr"><em><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></em>剩余</span></dd></dl></li>
							<li><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" class="u-now">立即<?php echo _cfg('web_name_two'); ?></a><a href="javascript:;" title="加入到购物车" class="u-cart"><s></s></a></li>
                         </ul>
                            
                        <div class="Curbor_id" style="display:none;"><?php echo $renqi['id']; ?></div>
							<div class="Curbor_yunjiage" style="display:none;">><?php echo $renqi['yunjiage']; ?></div>
							<div class="Curbor_shenyu" style="display:none;"><?php echo $renqi['money']; ?></div>
                            
					</div>
				</div>
                        
									
                    <?php  endforeach; $ln++; unset($ln); ?>
                    
							
					 				
							</div>
			
            <!--end-->
            
            <!--即将揭晓-->
            <div class="g-title">
                <h3 class="fl"><i class="fff"></i>即将揭晓</h3>
                <div class="m-other fr"><a href="<?php echo WEB_PATH; ?>/goods_list/5_0_1" target="_blank" title="更多" class="u-more">更多</a></div>
            </div>

            <div class="announced-soon clrfix" id="divSoonGoodsList">
            
				<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $renqi): ?>	
                
				 <div class="soon-list-con">

					<div class="soon-list">
                    
						<ul id="ulGoodsList">
                        
                        
                        <li class="g-soon-pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>" class="pic"><img alt="<?php echo $renqi['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>"><i class="light"></i>
                            <li class="soon-list-name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>"><?php echo $renqi['title']; ?></li></a>
							<li class="gray">价值：<?php echo $renqi['money']; ?></li>
							<li class="g-progress"><dl class="m-progress"><dt><b style="width:<?php if(($renqi['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($renqi['canyurenshu'],$renqi['zongrenshu']); ?><?php endif; ?>;"></"></b></dt><dd><span class="orange fl"><em><?php echo $renqi['canyurenshu']; ?></em>已参与</span><span class="gray6 fl"><em><?php echo $renqi['zongrenshu']; ?></em>总需人次</span><span class="blue fr"><em><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></em>剩余</span></dd></dl></li>
							<li><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" class="u-now">立即<?php echo _cfg('web_name_two'); ?></a><a href="javascript:;" title="加入到购物车" class="u-cart" <?php if($renqi['yunjiage'] == 0): ?> style="display:none;" <?php endif; ?>><s></s></a></li>
                         </ul>
                            
                        <div class="Curbor_id" style="display:none;"><?php echo $renqi['id']; ?></div>
							<div class="Curbor_yunjiage" style="display:none;">><?php echo $renqi['yunjiage']; ?></div>
							<div class="Curbor_shenyu" style="display:none;"><?php echo $renqi['money']; ?></div>
                            
					</div>
				</div>
                        
									
                    <?php  endforeach; $ln++; unset($ln); ?>
                    
							
					 				
							</div>
			
            <!--end-->
            
            <!--最新商品-->
            <div class="g-title">
                <h3 class="fl"><i class="fff"></i>最新商品</h3>
                <div class="m-other fr"><a href="<?php echo WEB_PATH; ?>/goods_list/5_0_4" target="_blank" title="更多" class="u-more">更多</a></div>
            </div>

            <div class="announced-soon clrfix" id="divSoonGoodsList">
            
				<?php $ln=1;if(is_array($newsshop)) foreach($newsshop AS $renqi): ?>	
                
				 <div class="soon-list-con">

					<div class="soon-list">
                    
						<ul id="ulGoodsList">
                        
                        
                        <li class="g-soon-pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>" class="pic"><img alt="<?php echo $renqi['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>"><i class="light"></i>
                            <li class="soon-list-name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>"><?php echo $renqi['title']; ?></li></a>
							<li class="gray">价值：<?php echo $renqi['money']; ?></li>
							<li class="g-progress"><dl class="m-progress"><dt><b style="width:<?php if(($renqi['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($renqi['canyurenshu'],$renqi['zongrenshu']); ?><?php endif; ?>;"></"></b></dt><dd><span class="orange fl"><em><?php echo $renqi['canyurenshu']; ?></em>已参与</span><span class="gray6 fl"><em><?php echo $renqi['zongrenshu']; ?></em>总需人次</span><span class="blue fr"><em><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></em>剩余</span></dd></dl></li>
							<li><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" class="u-now">立即<?php echo _cfg('web_name_two'); ?></a><a href="javascript:;" title="加入到购物车" class="u-cart" <?php if($renqi['yunjiage'] == 0): ?> style="display:none;" <?php endif; ?>><s></s></a></li>
                         </ul>
                            
                        <div class="Curbor_id" style="display:none;"><?php echo $renqi['id']; ?></div>
							<div class="Curbor_yunjiage" style="display:none;">><?php echo $renqi['yunjiage']; ?></div>
							<div class="Curbor_shenyu" style="display:none;"><?php echo $renqi['money']; ?></div>
                            
					</div>
				</div>
                        
									
                    <?php  endforeach; $ln++; unset($ln); ?>
                    
							
					 				
							</div>
			
            <!--end-->
            
            
            
           
           
           
            
			
            
	
<script type="text/javascript">
$(function(){
        $("body1").attr('class','index');
	var sw = 0;
	$(".m-slides .rslides_tabs li a").mouseover(function(){
		sw = $(".rslides_tabs a").index(this);
		myShow(sw);
	});
	function myShow(i){
		$(".m-slides .rslides_tabs li").eq(i).addClass("rslides_here").siblings("li").removeClass("rslides_here");
		$("#slideul li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
	}
	//滑入停止动画，滑出开始动画
	$("#slideImg,.rslides_nav").hover(function(){
		if(myTime){
		   clearInterval(myTime);
		}
	},function(){
		myTime = setInterval(function(){
		  myShow(sw)
		  sw++;
		  if(sw==0){sw=0;}
		} , 3000);
	});
	//自动开始
	var myTime = setInterval(function(){
	   myShow(sw)
	   sw++;
	   if(sw==0){sw=0;}
	} , 3000);
	$(".next").click(function(){
		myShow(sw)
		sw++;
 		if(sw==0){sw=0;}
	});
	$(".pre").click(function(){
		myShow(sw)
 		if(sw==0){sw=0;}
 		sw--;
	});

})
 var l = $("#myTab_Content0");
        $("#myTab").children().each(function(A, z) {
            var B = $(this);
            B.hover(function() {
                if (A == 0) {
                    B.attr("class", "f-notice-hover").next().attr("class", "");
                    l.show().next().hide()
                } else {
                    B.attr("class", "f-notice-hover").prev().attr("class", "");
                    l.hide().next().show()
                }
            }, function() {})
        });
</script>

<script type="text/javascript">
$(document).ready(function(){
	
	var timer = {};

	$('#m_btn').delegate('li', 'mouseenter', function(){
		var self = $(this);
		var tp = self.attr('data-type');
		clearTimeout(timer[tp]);
		timer[tp] = setTimeout(function(){
			self.addClass('text-d-on');
			$('div[data-panel=' + tp + ']').removeClass('hide');
		},100);
	}).delegate('li', 'mouseleave', function(){
		var self = $(this);
		var tp = self.attr('data-type');
		clearTimeout(timer[tp])
		timer[tp] = setTimeout(function(){
			self.removeClass('text-d-on');
			$('div[data-panel=' + tp + ']').addClass('hide');
		},100);
	});
	
	$(document.body).delegate('div.m_content', 'mouseenter', function(){
		clearTimeout(timer[$(this).attr('data-panel')]);
	}).delegate('div.m_content', 'mouseleave', function(){
		$(this).addClass('hide');
		$('span[data-type='+ $(this).attr('data-panel') +']').removeClass('text-d-on');
	});
	
});
</script>
<script type="text/javascript">
$(function(){
	$("#ulGoodsList a.u-cart").click(function(){ 
		var sw = $("#ulGoodsList a.u-cart").index(this);
		var src = $("#ulGoodsList .g-soon-pic a img").eq(sw).attr('src');				
		var $shadow = $('<img id="cart_dh" style="display:none; border:1px solid #aaa; z-index:99999;" width="200" height="200" src="'+src+'" />').prependTo("body");  			
		var $img = $("#ulGoodsList .g-soon-pic").eq(sw);
		$shadow.css({ 
			'width' : 200, 
			'height': 200, 
			'position' : 'absolute',      
			"left":$img.offset().left+16, 
			"top":$img.offset().top+9,
			'opacity' : 1    
		}).show();
		var $cart = $("#btnMyCart");
		$shadow.animate({   
			width: 1, 
			height: 1, 
			top: $cart.offset().top,    
			left: $cart.offset().left, 
			opacity: 0
		},500,function(){
			Cartcookie(sw,false);
		});	
		
	});
	$("#ulGoodsList a.go_Shopping").click(function(){	
		var sw = $("#ulGoodsList a.go_Shopping").index(this);

		Cartcookie(sw,true); 
	});	
});
//存到COOKIE
function Cartcookie(sw,cook){
	var shopid = $(".Curbor_id").eq(sw).text(),
		shenyu = $(".Curbor_yunjiage").eq(sw).text(),
		money = $(".Curbor_shenyu").eq(sw).text();
	var Cartlist = $.cookie('Cartlist');
	if(!Cartlist){
		var info = {};
	}else{
		var info = $.evalJSON(Cartlist);
	}
	if(!info[shopid]){
		var CartTotal=$("#sCartTotal").text();
			$("#sCartTotal").text(parseInt(CartTotal)+1);
			$("#btnMyCart em").text(parseInt(CartTotal)+1);
	}	
	info[shopid]={};
	info[shopid]['num']=1;
	info[shopid]['shenyu']=shenyu;
	info[shopid]['money']=money;
	info['MoenyCount']='0.00';
	$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
	if(cook){
		window.location.href="<?php echo WEB_PATH; ?>/member/cart/cartlist";
	}
}
</script>




	
	


 	</div>
    <script>
$(document).ready(function(){
      var ulpotxt = $("#ulPostList").html();
      var ulprec =  $("#ulPostRec");
      z(ulprec);
      $("#ulPostList").html(ulpotxt).find('li[name="liPostList"]').each(function() {
           $(this).hover(function() {
               $(this).children(".f-single-txt").hide().next(".f-single-info").show()
           }, function() {
               $(this).children(".f-single-txt").show().next(".f-single-info").hide()
           })
      });

});

var z = function(H) {
                var J = H;
                var N = 0;
                var M = 0;
                var I = 280;
                var L = J.children().length;
                M = L * I;
                N = I;
                J.width(M).css("left", "0px");
                var K = "500";
                J.show("fast");
                J.nextAll("a.js_pre").eq(0).show().bind("click", function() {
                    J.animate({
                        left: "-" + N + "px"
                    }, K, function() {
                        J.append(J.children().eq(0)).css("left", "0px")
                    })
                });
                J.nextAll("a.js_next").eq(0).show().bind("click", function() {
                    J.prepend(J.children().eq(L - 1)).css("left", "-" + N + "px");
                    J.animate({
                        left: "0px"
                    }, K, function() {})
                })
       };

	   $("li.g-goods-list").each(function() {
            $(this).hover(function() {
                $(this).addClass("goods_Cur")
            }, function() {
                $(this).removeClass("goods_Cur")
            })
        });
		var E = $("#ulWeekRanking").html();
		 $("#ulWeekRanking").html(E).children("li").hover(function() {
                        $(this).children("div.m-ranking-goods").show().next().hide();
                        $(this).siblings().children("div.m-ranking-goods").hide().next().show()
                    }, function() {
                        $(this).children("div.m-ranking-goods").hide().next().show();
                        $(this).parent().children("li").eq(0).children("div.m-ranking-goods").show().next().hide()
                    });

		$('.m-slides').hover(function() {
                $('.rslides1_nav').show();
            }, function() {
                $('.rslides1_nav').hide();
            });
			
			
</script>  
<script type="text/javascript">
$(function(){
        $("body").attr('class','index');
	var sw = 0;
	$(".m-slides .rslides_tabs li a").mouseover(function(){
		sw = $(".rslides_tabs a").index(this);
		myShow(sw);
	});
	function myShow(i){
		$(".m-slides .rslides_tabs li").eq(i).addClass("rslides_here").siblings("li").removeClass("rslides_here");
		$("#slideul li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
	}
	//滑入停止动画，滑出开始动画
	$("#slideImg,.rslides_nav").hover(function(){
		if(myTime){
		   clearInterval(myTime);
		}
	},function(){
		myTime = setInterval(function(){
		  myShow(sw)
		  sw++;
		  if(sw==<?php echo count($slides); ?>){sw=0;}
		} , 3000);
	});
	//自动开始
	var myTime = setInterval(function(){
	   myShow(sw)
	   sw++;
	   if(sw==<?php echo count($slides); ?>){sw=0;}
	} , 3000);
	$(".next").click(function(){
		myShow(sw)
		sw++;
 		if(sw==<?php echo count($slides); ?>){sw=0;}
	});
	$(".pre").click(function(){
		myShow(sw)
 		if(sw==0){sw=<?php echo count($slides); ?>;}
 		sw--;
	});

})
 var l = $("#myTab_Content0");
        $("#myTab").children().each(function(A, z) {
            var B = $(this);
            B.hover(function() {
                if (A == 0) {
                    B.attr("class", "f-notice-hover").next().attr("class", "");
                    l.show().next().hide()
                } else {
                    B.attr("class", "f-notice-hover").prev().attr("class", "");
                    l.hide().next().show()
                }
            }, function() {})
        });
</script>           
<script type="text/javascript">
  $(function(){
	F = 5;
	var _BuyList=$("#divRaffList");
        var Trundle = function () {
			F--;
				_BuyList.prepend(_BuyList.find("divls")).css('marginTop', '0px');
				_BuyList.animate({ 'marginTop': "-" + (F * 30) + "px"}, 800);
			if(F==0){
				F=5;
			}
        }
        var setTrundle = setInterval(Trundle, 5000);
    });
</script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/IndexFun.js"></script> 

<?php include templates("index","footer");?>
 </body>
</html>