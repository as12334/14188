<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/LotteryDetail.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/LotteryDetail.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/header.css"/>

<div class="Current_nav">
	<a href="<?php echo WEB_PATH; ?>">首页</a> <span>&gt;</span> 
	<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>">
	<?php echo $category['name']; ?>
	</a> <span>&gt;</span> 
	<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>e<?php echo $item['brandid']; ?>">
	<?php echo $brand['name']; ?>
	</a> <span>&gt;</span>揭晓详情 
</div>
<div class="show_content">
	<!-- 商品期数 -->
	<div id="divPeriodList" class="show_Period" style="max-height:99px;">	
    <div class="period_Open"><a class="gray02" click="off" id="btnOpenPeriod" href="javascript:void(0);">展开<i></i></a></div>	
		<?php echo $loopqishu; ?>	
	</div>
    <script>
		$("#btnOpenPeriod").click(function(){
				var ui_obj = $("#divPeriodList > ul");
				if($(this).attr("click")=='off'){
					$("#divPeriodList").css("max-height",ui_obj.length*33+"px");	
					$(this).attr("click","on");
					$(this).html("收起<s></s>");
					
				}else{
					$("#divPeriodList").css("max-height","99px");	
					$(this).attr("click","off");
					$(this).html("展开<i></i>");
				}			
		});
	</script>	
	<!-- 商品信息 -->
	<div id="div_ngresult" class="ng-result-wrapper clearfix  ">
                <!--图片展示-->
                <div class="ng-result-img">
                    <div class="result-img-wrapper">
                   
                            <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $itemss['id']; ?>" title="<?php echo $item['title']; ?>"><img width="242" height="242" alt="<?php echo $item['title']; ?>"  src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>"></a>
                    </div>
                    <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $itemss['id']; ?>" class="result-more">查看商品详情</a>
                </div>
                <!--揭晓结果-->
                <div class="ng-result-detail">
                    <div class="result-con-wrapper">
                        <h2 class="title"><span class="num">(第<?php echo $item['qishu']; ?>期)</span><?php echo $item['title']; ?></h2>
                        <p class="price">
                            价值：<?php echo $item['money']; ?>
                             
                        </p>
                        
                        <div class="result-main">
                            <div class="result-con-info">
                                <p class="r-name"  style="border:0px solid red; width:220px; height:25px;overflow:hidden">
                                    <span><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($item['q_uid']); ?>" target="_blank" class="blue" title="Warm">
                            	<?php echo get_user_name($q_user); ?></a></span>(<?php echo get_ip($gorecode['id'],'ipcity'); ?>)</p>
                                <p>本购参与：<span class="r-num"><?php echo $user_shop_number; ?></span>人次<a onClick="index()" href="javascript:;" class="r-look">点击查看</a></p>
                                <p>揭晓时间：<span><?php echo microt($item['q_end_time']); ?></span></p>
                                <p>抢购时间：<span><?php echo microt($user_shop_time); ?></span></p>
                                <div class="result-head-pic">
                                    <div class="rh-wrap"><img width="110" height="110" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $user_shop_hoto; ?>"/></div><a rel="nofollow" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($item['q_uid']); ?>" target="_blank" title="<?php echo get_user_name($q_user); ?>" class="ng-result-head transparent-png"><span class="name">获得者</span></a>
                                </div>
                            </div>
                            <div class="result-con-code">
                                <p class="code-name">— 幸运<?php echo _cfg('web_name_two'); ?>码 —</p>
                                <span class="code-num">
                                    <?php $ln=1;if(is_array($q_user_code_arr)) foreach($q_user_code_arr AS $q_code_num): ?>
                        <?php echo $q_code_num; ?>
                        <?php  endforeach; $ln++; unset($ln); ?></span>
                            </div>
                        </div>
                        <div class="result-how">
                            <h6>如何计算?</h6>
                            <p>1、取该商品最后购买时间前网站所有商品的最后100条购买时间记录；</p>
                            <p>2、按时、分、秒、毫秒排列取值之和，除以该商品总参与人次后取余数；</p>
                            <p>3、余数加上10000001 即为“幸运<?php echo _cfg('web_name_two'); ?>码”；</p>
                            <p>4、余数是指整数除法中被除数未被除尽部分， 如7÷3 = 2 ......1，1就是余数。</p>
                        </div>
                    </div>
                </div>
                <!--查看分期-->
                <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/GoodsDetail.css"/> 
                <div class="ng-result-select">
                <!--新加商家-->
                <div class="ng-goods-shop">
                <div id="J_ShopInfo" class="tb-shop-info tb-shop-info-gold-border" data-spm="1000126" data-creditscore="2103" data-creditflag="blue" data-rateurl="" data-spm-max-idx="13">
<img width="228" src="<?php echo G_TEMPLATES_STYLE; ?>/newimages/jinpai.png">
  <div class="tb-shop-info-wrap">
      <div class="tb-shop-info-hd">
          <div class="tb-shop-name">
              <dl>
                  <dd>
                     <strong> <?php echo $item['description']; ?></strong>
                  </dd>
              </dl>
          </div> 
          <!--<div class="tb-shop-rank tb-rank-blue">
                  <dl>
                      <!--<dt>信誉：</dt> 
                      <dd>
                          <a href="javascript:;">
                              
                                  <i></i>
                              
                                  <i></i>
                              
                                  <i></i>
                              
                                  <i></i>
                              
                          </a>
                      </dd>
                  </dl>
              </div> -->
         
          <div class="tb-shop-seller">
              <dl>
                  <dt>商家：</dt>
                  <dd><a class="tb-seller-name" href="javascript:;" title="<?php echo $item['description']; ?>" data-spm-anchor-id="2013.1.1000126.4"><?php echo $item['description']; ?>
                      </a>
                  </dd>
              </dl>
          </div>
         <!-- <div class="tb-shop-ww">
              <dl>
                  <dt>联系：</dt>
                  <dd>
                      <span class="ww-light ww-large" data-nick="" data-tnick="%E6%97%B6E4%BB%%E9%83%BD%E5%B8%82%E5%85%AC%E9%A6%86" data-encode="true"><a href="" target="_blank" class="ww-inline ww-online" title="，或相互交流网购体验，还支持语音视频噢。" data-spm-anchor-id="2013.1.1000126.5"><span></span></a></span>
                  </dd>
              </dl>
          </div> -->
         
              <div class="tb-shop-icon">
                  <dl>
                      <dt>资质：</dt>
                      <dd>
                          
                              <a class="tb-icon tb-icon-alipay-persion-auth" href="javascript:;" title="支付宝已认证" data-spm="d12" ></a>
                          
                              <a class="tb-seller-bail" href="javascript:;" title="已缴纳<?php echo $item_dealer['shopbzj']; ?>微币保证金" >
                                  <span class="tb-icon tb-icon-bail"></span>
                                  <span class="tb-seller-bail-text">
                                      <?php echo $item_dealer['shopbzj']; ?><span class="tb-seller-bail-unit">微币</span>
                                  </span>
                              </a>
                          
                      </dd>
                  </dl>
              </div>
          
      </div>
      <div class="tb-shop-info-bd">
          
              <div class="tb-shop-rate">
                  <dl>
                      <dt>描述</dt>
                      
                      <dd class="tb-rate-higher">
                          <?php echo $item_dealer['shopmiaoshu']; ?> 
                      </dd>
                  </dl>
                  <dl>
                      <dt>服务</dt>
                      
                      <dd class="tb-rate-higher">
                          <?php echo $item_dealer['shopfuwu']; ?> 
                      </dd>
                  </dl>
                  <dl>
                      <dt>物流</dt>
                      
                      <dd class="tb-rate-higher">
                          <?php echo $item_dealer['shopwuliu']; ?> 
                      </dd>
                  </dl>
              </div>
       </div>
      <div class="renzhen" >
      <?php echo _cfg('web_name_two'); ?>认证金牌商家   
      </div>
      
  </div>
</div>
                </div>
 <!--新加商家结束--> <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $itemzx['id']; ?>" target="_blank" class="Result_LConductBut">
                    <div class="Result_LConduct">
				<dl>
					
                   <dt> <b class="period_Ongoing">第<?php echo $itemzx['qishu']; ?>期<i></i></b></dt>
					<dd>
						<div class="Result_Progress-bar">
                        
							<p><span style="width:<?php if(($itemzx['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($itemzx['canyurenshu'],$itemzx['zongrenshu']); ?>%; border:1px solid #FF8A00;<?php endif; ?>"></span></p>
							<ul class="Pro-bar-li">
								<li class="P-bar01"><em><?php echo $itemzx['canyurenshu']; ?></em>已参与人次</li>
								<li class="P-bar02"><em><?php echo $itemzx['zongrenshu']; ?></em>总需人次</li>
								<li class="P-bar03"><em><?php echo $itemzx['shenyurenshu']; ?></em>剩余人次</li>
							</ul>
						</div>
						
					</dd>
				</dl>
			</div></a>
            
                </div>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
    <!-- 商品信息 end-->        
</div>
<!---新的--->


<!--开奖列表结束-->
<script type="text/javascript">
function index()
{
   var add=document.getElementById("add");
   add.style.display="block";
   
}

function indexout()
{
   var add=document.getElementById("add");
   add.style.display="none";
   
  
}
</script>
 
<div id="add" style="left: 361px; top: 370px; position: absolute; display: none;" id="ng_result_frame" class="ng-result-frame"><div class="ng-frame-con"><div class="ng-frame-wrap"><a id="a_close" onClick="indexout()" href="javascript:;" title="关闭" class="ng-frame-close ng-result-bg transparent-png">关闭</a><h3 class="name">幸运获得者本云总共参与<span class="num"><?php echo $user_shop_number; ?></span>人次</h3><div class="ng-frame-code" style="overflow: hidden; padding: 0px; width: 647px;"><div class="jspContainer" style="width: 647px; height: 282px;"><div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 647px;">
<dl class="f-dl clearfix">
<dt><?php echo microt($user_shop_time); ?>&nbsp;&nbsp;中奖号码为<span style="color:red"><?php $ln=1;if(is_array($q_user_code_arr)) foreach($q_user_code_arr AS $q_code_num): ?>
                        <?php echo $q_code_num; ?>
                        <?php  endforeach; $ln++; unset($ln); ?></span></dt>
 <?php echo yunma($user_shop_codes,"dd"); ?>
</dl>
                           
                       </div>

</div></div><div class="transparent-png filter-bg"></div></div></div></div>
        

<!----->


	<!-- 计算结果 所有参与记录 晒单 -->
	<div id="calculate" class="ProductTabNav">
	    <div id="divMidNav" class="DetailsT_Tit">
	        <div class="DetailsT_TitP">		     
                <ul>
			        <li class="Product_DetT DetailsTCur"><span class="DetailsTCur">计算结果</span></li>
			        <li class="All_RecordT"><span class="">所有参与记录</span></li>
			        <li class="Single_ConT"><span class="">晒单</span></li>          
		        </ul>
		    </div>
	    </div>
	</div>
<script>
function MM_over() {
	var mSubObj=document.getElementById("div_whatmod");
	
	mSubObj.style.display = "block";
	//mSubObj.style.backgroundColor = "#f60";
}
function MM_out() {
	var mSubObj=document.getElementById("div_whatmod");
	mSubObj.style.display = "none";
	
}
</script>
	<!--补丁3.1.6_b.0.1-->
  <div id="divCalResult" class="Product_Content">	  
    <div class="ng-data-wrapper" name="div_tab">
    
    <div id="div_evaldata" class="ng-data-inner">
    <div class="ng-data-info">
    <div class="ng-data-head"><span class="time"><?php echo _cfg('web_name_two'); ?>时间</span><span class="data">转换数据</span><span class="user">会员</span><span class="num">参与人次</span><span class="product">商品名称</span>
    </div>
    </div>
    <div class="ng-data-detail">
    <div class="ng-data-step">
    <p class="title">截止该商品最后购买时间【<?php echo microt($item['q_end_time']); ?>】网站所有商品的最后100条购买时间(时、分、秒、毫秒)记录</p>
    <div class="step">
    <ul class="step-inner clearfix">
    <li class="s-r1"><p>计算结果</p></li>
    <li class="s-t">=</li>
    <li class="s-t">(</li><li class="s-r2"><p><?php echo $item['q_counttime']; ?></p><span>以下100条时间取值之和</span></li>
    <li id="li_mod" class="s-t mod" onmouseover="MM_over()" onmouseout="MM_out()" ><i>%</i><span class="txt">(取余)</span></li>
    <li class="s-r3"><p><?php echo $item['canyurenshu']; ?></p><span>总需参与人次</span></li><li class="s-t">)</li>
    <li class="s-t">+</li><li class="s-r4"><p>10000001</p><span>固定数值</span></li>
    <li class="s-t">=</li><li class="s-r5"><p><?php echo $item['q_user_code']; ?></p><span>最终计算结果</span></li>
    </ul>
    <div class="ng-result-bg equals transparent-png"></div>
    </div>
    <div id="div_whatmod" class="ng-mod-wrapper" style="display: none;">
    <div class="ng-mod-inner"><p>余数是指整数除法中被除数未被除尽部分,<br>如7÷3 = 2 ......1，1就是余数。</p></div><i class="s"><i class="s"></i></i>
    </div>
    </div>
    <div class="ng-table-wrapper">
    <div id="div_nginner" class="ng-table-inner">
    <ul class="ng-table-ul clearfix">
    <?php $ln=1;if(is_array($item['q_content'])) foreach($item['q_content'] AS $record): ?>
				   <?php 
						$itemid = $item['id'];
						$record_time = explode(".",$record['time']);
						$record['time'] = $record_time[0];
				    ?>	
    <li>
    <span class="time"><b><?php echo date("Y-m-d",$record['time']); ?></b><?php echo date("H:i:s",$record['time']); ?>.<?php echo $record_time['1']; ?></span>
    <span class="code"><?php echo $record['timeadd']; ?></span>
    <span class="name"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($record['uid']); ?>" target="_blank"><?php echo get_user_name($record['uid']); ?></a></span>
    <span class="num"><?php echo $record['gonumber']; ?>人次</span>
    <span class="pro"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $record['shopid']; ?>" target="_blank">（第<?php echo $record['shopqishu']; ?>期）<?php echo $record['shopname']; ?></a></span>
    </li>
    <?php  endforeach; $ln++; unset($ln); ?>
    </ul>
    
    <div class="ng-table-bg01 transparent-png"></div>
    
    <div class="ng-table-bg02 transparent-png"></div>
    <div class="ng-table-bg03 ng-result-bg transparent-png"></div> 
    </div>
    <!--<div id="div_showmore" class="ng-see-more"><span>展开全部100条数据<b><s></s></b></span></div> -->
    </div></div>
    <div class="ygRecord" >
				<div class="yghelp">
					1、取该商品最后购买时间前网站所有商品的最后100条购买时间记录
					<br>
					2、每个时间记录按时、分、秒、毫秒依次排列取数值
					<br>
					3、将这100个数值之和除以该商品总参与人次后取余数，余数加上10000001 即为“幸运<?php echo _cfg('web_name_two'); ?>码”。
					<?php if(!$item['q_content']): ?>
					<br>
					<b>由于网站还未满100条购买记录。所以按照   10000001 + (揭晓时间求和结果*100/参与人数) 的余数   即为“幸运<?php echo _cfg('web_name_two'); ?>码”。</b>
					<?php endif; ?>
				</div>
				
				<?php if(!$item['q_content']): ?>
				<div class="RecordOnehundred"><h4> 未满100条计算结果 </h4>
					<div class="ResultBox"><h2>计算结果</h2>
							<p class="num4">求和：
								<span class="Fb"><?php echo $user_shop_time_add; ?></span>(揭晓时间求和结果)<br>取余：
								<span class="Fb"><?php echo $user_shop_time_add; ?></span>(揭晓时间)
								<span class="Fb"> * 100 / <?php echo $item['canyurenshu']; ?></span>(本商品总需参与人次)
								<span class="Fb"> = <?php echo $user_shop_fmod; ?></span>(余数)<br>结果：
								<span class="Fb"><?php echo $user_shop_fmod; ?></span>(余数)
								<span class="Fb"> + 10000001 = <em> <?php echo $item['q_user_code']; ?></em></span>
							</p>
							<b>最终结果：<?php echo $item['q_user_code']; ?></b>
						</div>  
						<div style="width:100%;height:30px;clear:bolt;"></div>
				</div>          
				<?php  else: ?>
			  
		
					<?php 
						$shop_fmod = fmod($item['q_counttime'],$item['canyurenshu']);
					 ?>
					<div class="RecordOnehundred"><h4> 100条计算结果 </h4>
					 <div class="ResultBox"><h2>计算结果</h2>
						<p class="num4">求和：
							<span class="Fb"><?php echo $item['q_counttime']; ?></span>(上面100条<?php echo _cfg('web_name_two'); ?>记录时间取值相加之和)<br>取余：
							<span class="Fb"><?php echo $item['q_counttime']; ?></span>(100条时间记录之和)
							<span class="Fb"> % <?php echo $item['canyurenshu']; ?></span>(本商品总需参与人次)
							<span class="Fb"> =  <?php echo $shop_fmod; ?></span>(余数)<br>结果：
							<span class="Fb"><?php echo $shop_fmod; ?></span>(余数)
							<span class="Fb"> + 10000001 = <em><?php echo $item['q_user_code']; ?></em></span>
						</p>
						<b>最终结果：<?php echo $item['q_user_code']; ?></b>
					</div>
					<div style="width:100%;height:30px;clear:bolt;"></div>
				   </div>
				<?php endif; ?>
				
			</div>
     </div>
    
    </div>
   
    <!-------计算完------->
	
		
            
        
		<!-- 购买记录20条 -->
		<div name="div_tab" id="bitem" class="AllRecordCon">
			<iframe id="iframea_bitem" g_src="<?php echo WEB_PATH; ?>/go/goods/go_record_ifram/<?php echo $itemid; ?>/20" style="width:978px; border:none;height:0px;" frameborder="0" scrolling="no"></iframe>		
		</div>	
	   <!-- /购买记录20条 -->
       <!--补丁3.1.6_b.0.1-->
       
       <!--补丁3.1.6_b.0.2-->
		<!-- 晒单 -->
		<div name="div_tab" id="divPost" class="Single_Content">
			<iframe id="iframea_divPost" g_src="<?php echo WEB_PATH; ?>/go/shaidan/itmeifram/<?php echo $itemid; ?>" style="width:978px; border:none;height:0px;" frameborder="0" scrolling="no"></iframe>
		</div>
		<!-- 晒单 -->   
        <!--补丁3.1.6_b.0.2-->
	</div>
<script>
<!--补丁3.1.6_b.0.3-->
function set_iframe_height(fid,did,height){
	$("#"+fid).css("height",height);
}

$(function(){
var fouli=$(".DetailsT_TitP ul li");
var divCalResult =  $("div[name='div_tab']");
	fouli.click(function(){				
		var index=fouli.index(this);
		fouli.removeClass("DetailsTCur").eq(index).addClass("DetailsTCur");
		var iframe = divCalResult.hide().eq(index).find("iframe");
			if (typeof(iframe.attr("g_src")) != "undefined") {
			  	 iframe.attr("src",iframe.attr("g_src"));
				 iframe.removeAttr("g_src");
			}
			
		divCalResult.hide().eq(index).show();
	});
<!--补丁3.1.6_b.0.3-->
	

	$(".Announced_But").click(function(){
		var next_li = $(".DetailsT_TitP ul>li");
		var index = $(this).index()
		next_li.eq(index).click();
	});

	
	$(window).scroll(function(){
		if($(window).scrollTop()>=941){
			$("#divMidNav").addClass("nav-fixed");
		}else if($(window).scrollTop()<941){
			$("#divMidNav").removeClass("nav-fixed");
		}
	});
});
function divOpen(){
var height=$("#userRnoId").css("height");
	if(height=="90px"){
		$("#userRnoId").css("height","auto");
	}else{
		$("#userRnoId").css("height",90);
	};
}
$(function(){	
	$("#divOpen").click(divOpen);
});
</script>	
<?php include templates("index","footer");?>