<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div style="margin-left: -117px;" class="ng-goods-detail ng-goods-detail-height">
                        
                            <h2 class="o-title"><span class="num">
                                (第<?php echo $item['qishu']; ?>期)</span><?php echo $item['title']; ?><span class="o-info" style="<?php echo $item['title_style']; ?>"><?php echo $item['title2']; ?></span>
                            </h2>
                            <p class="text-left price o-p">价值：<?php echo $item['money']; ?></p>

<?php if($item['xsjx_time']!='0'): ?> <?php  else: ?><br /><?php endif; ?>
						
			<?php if($item['shenyurenshu']=='0' && $item['xsjx_time']=='0' && empty($item['q_uid'])): ?>               
                <div class="Immediate">
                  <span style="left:10px;right:0px;">这个商品未揭晓成功,请联系客服手动揭晓！</span> 
                </div>     
            <?php  else: ?>
                <div class="line-time">
			<!-- 限时揭晓end -->
							
                                <div class="line-wrapper u-progress" title="已完成<?php echo percent($item['canyurenshu'],$item['zongrenshu']); ?>"><span class="pgbar" style="width:<?php if(($item['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($item['canyurenshu'],$item['zongrenshu']); ?><?php endif; ?>;"><span class="pging"></span></span></div>
                                <div class="text-wrapper clearfix">
                                    <div class="now-has">
                                        <span>
                                            <?php echo $item['canyurenshu']; ?></span>
                                        <p>已参与</p>
                                    </div>
                                    <div class="total-has">
                                        <span id="CodeQuantity">
                                            <?php echo $item['zongrenshu']; ?></span>
                                        <p>总需人次</p>
                                    </div>
                                    <div class="overplus-has">
                                        <span id="CodeLift">
                                            <?php echo $syrs; ?></span>
                                        <p>剩余</p>
                                    </div>
                                </div>
                            </div>        
			<?php endif; ?>
			
			 <!-- 限时揭晓 -->
            <?php if($item['xsjx_time']!='0'): ?>
            <div id="divAutoRTime" class="Immediate">
			            <span><!--<a class="orange" target="_blank" href="#">限时揭晓的规则？</a> --></span>
                        <i id="timeall" endtime="<?php echo date("m-d-Y H:i:s",$item['xsjx_time']); ?>" lxfday="no"></i>		                           
			</div>
            <script type="text/javascript">			
			function lxfEndtime(xsjx_time_shop,this_time){	
				if(!this.xsjx_time_shop){
					this.xsjx_time_shop = xsjx_time_shop;	
					this.this_time		= this_time
				}
				this.this_time = this.this_time + 1000;
				lxfEndtime_setTimeout  = window.setTimeout("lxfEndtime()",1000);				
				var endtime = <?php echo $item['xsjx_time']; ?>000;
			    var youtime = endtime - this.this_time;	   	   //还有多久(毫秒值)
				
				var seconds = youtime/1000;
				var minutes = Math.floor(seconds/60);
				var hours = Math.floor(minutes/60);
				var days = Math.floor(hours/24);
				var CDay= days;
				var CHour= hours % 24;
				var CMinute= minutes % 60;
				var CSecond= Math.floor(seconds%60);//"%"是取余运算，可以理解为60进一后取余数，然后只要余数							
				this.xsjx_time_shop.html("<b>限时揭晓</b><p>剩余时间：<em>"+days+"</em>天<em>"+CHour+"</em>时<em>"+CMinute+"</em>分<em>"+CSecond+"</em>秒</p>");
				delete youtime,seconds,minutes,hours,days,CDay,CHour, CMinute, CSecond;
				if(endtime <= this.this_time){			
					lxfEndtime_setTimeout && clearTimeout(lxfEndtime_setTimeout);					
					this.xsjx_time_shop.html("<b>限时揭晓</b><p>正在计算中....</p>");//如果结束日期小于当前日期就提示过期啦	
					xsjx_time_shop = this.xsjx_time_shop;
					$.ajaxSetup({
						async : false
					});
					$.post("<?php echo WEB_PATH; ?>/go/autolottery/autolottery_ret_install",{"shopid":<?php echo $item['id']; ?>},function(data){		
						//alert(data)
						if(data == '-1'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>没有这个商品!</p>");
							return;
						}
						if(data == '-2'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品揭晓失败!</p>");
							return;
						}
						if(data == '-3'){							
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品参与人数为0，商品不予揭晓!</p>");
							return;
						}
						if(data == '-4'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品还未到揭晓时间!</p>");
							return;
						}
						if(data == '-5'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品揭晓时间已过期!</p>");
							return;
						}if(data == '-6'){							
							 xsjx_time_shop.html("<b>限时揭晓</b>商品正在揭晓中!");								
							 window.location.href=location.href;
							 return;
						}else{							
							xsjx_time_shop.html("<b>限时揭晓</b><p>揭晓幸运码:<i style='color:#fff;background:#f60; padding:3px 5px;'>"+data+"</i></p>");						
							return;
						}						
						
					});
					
				}							
			  }			  
			 $(function(){lxfEndtime($("#timeall"),<?php echo time(); ?>000);});
			</script>
            <?php  else: ?>
            <br />
            <?php endif; ?>			
			<!-- 限时揭晓end -->
                            <div class="my-buy clearfix">
                            <?php if($item['yunjiage'] != '0'): ?>
                                <p class="mine">我要参与</p>
                                <div id="divNumber" class="option-wrapper clearfix">
                                    <a href="javascript:;" class="mius"id="shopsub">-</a>
                                    <input class="input-num" value="1" type="text" onKeyUp="value=value.replace(/\D/g,'')" id="num_dig">
                                    <a href="javascript:;" class="add" id="shopadd">+</a>
				
                                </div>
                                <div class="mine-prob" style="display: none;"><span class="txt" id="chance">获得机率5.35%<i></i></span></div>
                                <!--<ul class="check-num clearfix"></ul>
                                <p class="fl">人次</p> -->
                                <div class="mine-prob" style="display:none;"><i></i></div>
                                <div class="biaoqianS" style="float: left;color: #333;text-align: center;line-height: 28px;font-size: 14px;position: relative;">
					<ul>
						<style type="text/css">
							li:hover{color: #ff6600;}
							span:hover{color: #ff6600;}
							.label{
								height: 28px;width: 50px;border-radius: 10px;float: left;margin: 0 6px;cursor: pointer;
								position: relative;border: 1px solid #e4e4e4;
							}
							#baowei{
								border:none!important;
							}
							.baowei{
								left: 0px;
								top: -8px;
							}
							.wy{
								border-radius: 10px;
							    cursor: pointer;
							    float: left;
							    height: 28px;
							    margin: 0 6px;
							    position: relative;
							    width: 50px;
							    border: 1px solid #dcdcdc;
							    background: #ccc;
							}
							
						</style>
                        <script>
$(function(){
	var numjg=<?php echo $syrs; ?>;
	if(numjg>10){$("#num10").css("display","block");}else{$("#num10").css("display","none");}
	if(numjg>50){$("#num50").css("display","block");}else{$("#num50").css("display","none");}
	if(numjg>100){$("#num100").css("display","block");}else{$("#num100").css("display","none");}
	if(numjg>200){$("#num200").css("display","block");}else{$("#num200").css("display","none");}
})
</script>

							    <li class="label" id="num10" data-val="10">10</li>
								<li class="label" id="num50" data-val="50">50</li>
								<li class="label" id="num100" data-val="100">100</li>
								<li class="label" id="num200" data-val="200">200</li>
								<li class="label" data-val="<?php echo $syrs; ?>" id="baowei"><div class="baowei">包尾</div></li>
                                
                            
						<script type="text/javascript">
							$(".biaoqianS li").on("click",function(){
							    var num = $(this).data("val");
							    $("#num_dig").val(num);
							});
						</script>
					</ul>
				</div>
                                <!--<span id="span_tip"></span>
								<span id="chance" class="gray03">购买人次越多获得几率越大哦！</span> -->
                                <?php  else: ?>
                                <input class="input-num" value="1" type="hidden" onKeyUp="value=value.replace(/\D/g,'')" id="num_dig">
                                <p class="mine" style="color:red">限购，一个人只能参与一次！</p>
                                 <?php endif; ?>
                            </div>

							<div style="display:none;" id="hqid"><?php echo $item['id']; ?></div>
                            <div id="divBuy" class="consume-wrapper clearfix">
                <?php if($item['shenyurenshu'] == '0'): ?>
                <a href="javascript:;" class="Det_Shopbut_exit">已满员</a>
                
                <?php  else: ?>
                  <?php if($item['yunjiage'] == '0'): ?>
                      <?php if($yes_record): ?>
                       <a href="javascript:window.alert('您已经参与过了哦');" id="consume-now" >立即<?php echo _cfg('web_name_two'); ?></a>
                      <?php  else: ?>
				       <a href="javascript:;" id="consume-now" class="Det_Shopbut">立即<?php echo _cfg('web_name_two'); ?></a>
                
                      <?php endif; ?>
                
                <?php  else: ?>
                <a href="javascript:;" id="consume-now" class="Det_Shopbut">立即<?php echo _cfg('web_name_two'); ?></a>
                <a href="javascript:;" id="consume-addcar" class="Det_Cart">加入购物车</a>
                <?php endif; ?>
                <?php endif; ?>
							                                
							                                
                                                            
                            </div>
								
                            
                         <?php if($item['xsjx_time']!='0'): ?><?php  else: ?> <br/> <?php endif; ?>	
                        <div class="about-tips clearfix">
                            <ul class="f-inner clearfix">
                                <li class="z-beginning">服&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务：</li>
                                <li ><i class="ng-xq-bg t3"></i>通过第三方平台<span style="color: #06F;"><?php echo _cfg('web_name_two'); ?></span>开奖后由商家 <a href="javascript:;" title="<?php echo $item['description']; ?>"><span style="color:red; font-size:14px;"><?php echo _strcut($item['description'],14); ?></span></a> 负责发货</li>
                                
                               
                            </ul>
                        </div>
                        
                        <div class="about-tips clearfix">
                            <ul class="f-inner clearfix">
                                <li class="z-beginning">服务保证：</li>
                                <li><a href="<?php echo WEB_PATH; ?>/help/4" target="_blank"><i class="ng-xq-bg t1"></i>100%公平公正</a></li>
                                <li class="z-lines"><b></b></li>
                                <li><a href="<?php echo WEB_PATH; ?>/help/5" target="_blank"><i class="ng-xq-bg t2"></i>100%正品保证</a></li>
                                <li class="z-lines"><b></b></li>
                                <li><a href="<?php echo WEB_PATH; ?>/help/7" target="_blank"><i class="ng-xq-bg t3"></i>全国免费配送</a></li>
                            </ul>
                        </div>
					
			
			 

            
   <script>  
   	 $(function(){
		 $("#num_dig").mousemove(function(){
		  $(this).css("border","1px solid #C40000");		 
		});
		 $("#num_dig").mouseout(function(){
		  $(this).css("border","1px solid #CFCFCF");		 
		});		
	});
   </script>       
           				

                        <div class="advert-wrapper">
                            <ul class="select-wrapper">
                                <li class="gray9">怎么玩儿<i class="ng-xq-bg"></i></li>
                            </ul>
                            <div id="div_advertinner" class="advert-inner clearfix">
                                <div class="advert-list01 advert-m">
                                    <div class="ad-icon01 ng-xq-bg"></div>
                                    <p class="ad-title">选择商品</p>
                                    <p class="ad-info">
                                        每个商品规定总需<br>
                                        参与人次(1人次=1微币)
                                    </p>
                                    <div class="arrow ng-xq-bg"></div>
                                </div>
                                <div class="advert-list02 advert-m">
                                    <div class="ad-icon02 ng-xq-bg"></div>
                                    <p class="ad-title">支付1微币</p>
                                    <p class="ad-info">
                                        参与人次越多<br>
                                        获得机率越大
                                    </p>
                                    <div class="arrow ng-xq-bg"></div>
                                </div>
                                <div class="advert-list03 advert-m">
                                    <div class="ad-icon03 ng-xq-bg"></div>
                                    <p class="ad-title">抽出幸运获得者</p>
                                    <p class="ad-info">
                                        所有人次售完后根据计算规则<br>
                                        抽出一位幸运获得者
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>