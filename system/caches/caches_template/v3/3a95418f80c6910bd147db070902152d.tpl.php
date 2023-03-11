<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div style="margin-left: -117px;" class="ng-goods-detail ng-goods-detail-height">
                        
                            <h2 class="o-titlep"><span class="num">
                                (第<?php echo $item['qishu']; ?>期)</span><?php echo $item['title']; ?>
                            </h2>
                            <p class="text-left price o-p">价值：<?php echo $item['money']; ?></p>
<div id="divLotteryTimer" class="Announced_Frame">
		<div class="Announced_FrameTin">揭晓倒计时</div>
		<div class="Announced_FrameCode">
			<div class="Announced_FrameClock"><img src="<?php echo G_TEMPLATES_IMAGE; ?>/Announced_Clock.gif" border="0" alt=""></div>
				 <ul class="Announced_FrameClockMar">
					<li id="liMinute1" class="Code_9">9<b></b></li>
					<li id="liMinute2" class="Code_9">9<b></b></li>
					<li class="Code_Point">:<b></b></li>
					<li id="liSecond1" class="Code_9">9<b></b></li>
					<li id="liSecond2" class="Code_9">9<b></b></li>
					<li class="Code_Point">:<b></b></li>
					<li id="liMilliSecond1" class="Code_9">9<b></b></li>
					<li id="last" class="Code_9">9<b></b></li>
				</ul>
		</div>
			<div class="Announced_FrameGet">
				<p class="Announced_FrameLanguage"><img id="imgFunny" src="<?php echo G_TEMPLATES_IMAGE; ?>/10.gif" border="0" alt=""></p>
			</div>
			<div class="Announced_FrameBm"></div>
</div>
		
<div id="divLotteryTiming" class="Announced_Frame" style="display:none;">
		<div class="Announced_FrameTin">正在计算</div>
		<div class="Announced_FrameCal">
			<p><img src="<?php echo G_TEMPLATES_IMAGE; ?>/Announced_6.png" border="0" alt=""></p>
			<span><img src="<?php echo G_TEMPLATES_IMAGE; ?>/Announced_4.gif" border="0" alt=""></span>
		</div>
		<div class="Announced_FrameBm"></div>
</div>
<div id="span_a"></div>
<div id="span_b"></div>

		
                        <!--如何计算--
                        <div class="method">
                            <p class="t">如何计算？</p>
                            <p>1、取该商品最后购买时间前网站所有商品的最后100条购买时间记录；</p>
                            <p>2、按时、分、秒、毫秒排列取值之和，除以该商品总参与人次后取余数；</p>
                            <p>3、余数加上10000001 即为“幸运云购码”；</p>
                            <p>4、余数是指整数除法中被除数未被除尽部分， 如7÷3 = 2 ......1，1就是余数 。</p>
                        </div>
                        <!--计算过程-->
                        <div class="about-tips clearfix">
                            <ul class="f-inner clearfix">
                                <li class="z-beginning">服&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务：</li>
                                <li ><i class="ng-xq-bg t3"></i>通过第三方平台<span style="color: #06F;"><?php echo _cfg('web_name_two'); ?></span>开奖后由商家 <a href="javascript:;" title="<?php echo $item['description']; ?>"><span style="color:red; font-size:14px;"><?php echo _strcut($item['description'],16); ?></span></a> 负责发货</li>
                                
                               
                            </ul>
                        </div>
                        <div class="process">
                            <p class="t">计算过程</p>
                            <div class="process-detail clearfix">
                                <span>(</span>
                                <div class="process-btn step01">
                                    <div class="tb-cell">
                                        <p class="o-num">?</p>
                                        <p>
                                            100条时间<br />
                                            取值之和
                                        </p>
                                    </div>
                                </div>
                                <span>%</span>
                                <div class="process-btn step02">
                                    <div class="tb-cell">
                                        <p class="o-num">
                                            <?php echo $item['zongrenshu']; ?>
                                        </p>
                                        <p>
                                            总需参与人次
                                        </p>
                                    </div>
                                </div>
                                <span>) +</span>
                                <div class="process-btn step03">
                                    <div class="tb-cell">
                                        <p class="o-num">10000001</p>
                                        <p>固定数值</p>
                                    </div>
                                </div>
                                <span>=</span>
                                <div class="process-btn step04">
                                    <div class="tb-cell">
                                        <p class="o-num">?</p>
                                        <p>最终计算结果</p>
                                    </div>
                                </div>
                            </div>
                        </div>
 </div>                       
                        <script type="text/javascript">	 
function show_date_time_location(){
	window.setTimeout(function(){
		$("#divLotteryTimer").hide();
		$("#divLotteryTiming").show();	
		$.post("<?php echo WEB_PATH; ?>/api/getshop/lottery_shop_set/",{"lottery_sub":"true","gid":<?php echo $item['id']; ?>},null);
		
		window.setTimeout(function(){window.location.href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $item['id']; ?>";},5000);},1000);}
function show_date_time(endTime,obj){	
	if(!this.endTime){this.endTime=endTime;this.obj=obj;}	
	rTimeout = window.setTimeout("show_date_time()",30);	
	timeold = this.endTime-(new Date().getTime());
	if(timeold <= 0){		
		$("#liMinute1").attr("class","Code_0");
		$("#liMinute2").attr("class","Code_0");
		$("#liSecond1").attr("class","Code_0");
		$("#liSecond2").attr("class","Code_0");
		$("#liMilliSecond1").attr("class","Code_0");
		$("#last").attr("class","Code_0");	
		rTimeout && clearTimeout(rTimeout);	
		show_date_time_location();	
		return;
	}	
	sectimeold=timeold/1000
	secondsold=Math.floor(sectimeold); 
	msPerDay=24*60*60*1000
	e_daysold=timeold/msPerDay 	
	daysold=Math.floor(e_daysold); 				//天	
	e_hrsold=(e_daysold-daysold)*24; 
	hrsold=Math.floor(e_hrsold); 				//时
	e_minsold=(e_hrsold-hrsold)*60;	
	//分
	minsold=Math.floor((e_hrsold-hrsold)*60);
	minsold = (minsold<10?'0'+minsold:minsold)
	minsold = new String(minsold);
	minsold_1 = minsold.substr(0,1);
	minsold_2 = minsold.substr(1,1);	

	//秒
	e_seconds = (e_minsold-minsold)*60;	
	seconds=Math.floor((e_minsold-minsold)*60);
	seconds = (seconds<10?'0'+seconds:seconds)
	seconds = new String(seconds);
	seconds_1 = seconds.substr(0,1);
	seconds_2 = seconds.substr(1,1);	
	//毫秒	
	ms = e_seconds-seconds;
	ms = new String(ms)
	ms_1 = ms.substr(2,1);
	ms_2 = ms.substr(3,1);
	
	$("#liMinute1").attr("class","Code_"+minsold_1);
	$("#liMinute2").attr("class","Code_"+minsold_2);
	$("#liSecond1").attr("class","Code_"+seconds_1);
	$("#liSecond2").attr("class","Code_"+seconds_2);
	$("#liMilliSecond1").attr("class","Code_"+ms_1);
	$("#last").attr("class","Code_"+ms_2);
	//this.obj.innerHTML=daysold+"天"+(hrsold<10?'0'+hrsold:hrsold)+"小时"+(minsold<10?'0'+minsold:minsold)+"分"+(seconds<10?'0'+seconds:seconds)+"秒."+ms;
}

$(function(){
	$.ajaxSetup({async:false});
	$.post("<?php echo WEB_PATH; ?>/api/getshop/lottery_shop_get",{"lottery_shop_get":true,"gid":<?php echo $item['id']; ?>,"times":Math.random()},function(sdata){	
	if(sdata!='no'){show_date_time((new Date().getTime())+(parseInt(sdata))*1000,null);}});});
</script>
                    
                
