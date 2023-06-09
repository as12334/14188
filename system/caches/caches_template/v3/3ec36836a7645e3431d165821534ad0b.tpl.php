<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <title>充值大抽奖 - <?php echo _cfg("web_name_two"); ?>触屏版</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css?v=20150129" rel="stylesheet" type="text/css" />
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css?v=1" rel="stylesheet" type="text/css" />
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/help.css?v=130726001" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo G_TEMPLATES_CSS; ?>/lottery/jQueryRotate.js"></script>
	
</head>
<body>



<div class="h5-1yyg-v11">
<header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo $title; ?></h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/group/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>

<script>

$(function(){

    var b = function() {

		var isRunning = false;
		$("#lot-btn").click(function() {
			if (isRunning) {
				return;
			}
			$('#imgs').rotate(0);
			$.ajax({
				url: "<?php echo WEB_PATH; ?>/member/lottery/submit/"+(new Date()).getTime(),
				dataType : 'json',
				beforeSend: function(){
					isRunning = true;
					$("#imgs").rotate({
						animateTo: 360*30,
						duration: 20000,
						callback: function(){
							$.PageDialog.fail('哎呀，没有抽中，再接再厉！');
							isRunning = false;
						}
					});
				},
				success: function(data){
					if ( !data.ok ) {
						$('#imgs').stopRotate();
						$("#imgs").rotate({
							animateTo: 360*6,
							duration: 5000,
							callback: function(){
								$('#lottery_tips').text(data.desc);
								$.PageDialog.fail(data.desc);
								isRunning = false;
							}
						});
					} else {
						$('#imgs').stopRotate();
						$("#imgs").rotate({
							animateTo: 360*6 + Number(data.round),
							duration: 5000,
							callback: function(){
								if ( data.left <=0 ) {
									$('#lottery_tips').text('抱歉，您的抽奖次数用完了。');
								} else {
									$('#lottery_tips').text('您拥有的微积分足够抽奖啦！');
								}
								isRunning = false;
								$.PageDialog.fail(data.desc);
								/*
								$.PageDialog('<div class="Prompt">' + data.desc + "</div>", {
									autoTime: 5000,
									submit: function(){
										window.location.reload(true);
									}
								});
								*/
							}
						});
					}

				}

			});
		});
	};

    Base.getScript(Path.Skin + "/js/mobile/pageDialog.js", b);

	function startmarquee(lh, speed, delay) {
		var t;
		var p = false;
		var o = document.getElementById("newList");
		o.innerHTML += o.innerHTML;
		o.scrollTop = 0;

		function start() {
			t = setInterval(scrolling, speed);
			if (!p) {
				o.scrollTop += 1;
			}
		}

		function scrolling() {
			if (o.scrollTop % lh != 0) {
				o.scrollTop += 1;
				if (o.scrollTop >= o.scrollHeight / 2) o.scrollTop = 0;
			} else {
				clearInterval(t);
				setTimeout(start, delay);
			}
		}
		setTimeout(start, delay);
	}
	startmarquee(25, 30, 0, 1);
});
</script>


	<style>
	.helpCon{
		padding: 0;
		padding-bottom:10px;
	}
	#lottery {
		margin: 0 auto;
		width: 200px;
		height: 200px;
	}
	#lottery .arrow {
		height: 110px;
		width: 18px;
		background: url("<?php echo G_TEMPLATES_CSS; ?>/lottery/arrow-mobile.png") no-repeat scroll 0 0 transparent;
		top: 22px;
		left: 90px;
		position: relative;
	}
	#lottery .image{
		width: 200px;
		height: 200px;
		position: absolute;
	}
	#lottery #lot-btn {
		height: 50px;
		width: 50px;
		overflow: hidden;
		position: relative;
		top: -34px;
		left: 74px;
	}
	#lottery #lot-btn span {
		cursor: pointer;
		display: block;
		height: 50px;
		position: relative;
		width: 50px;
	}
	#lottery .first span {
		background: url("<?php echo G_TEMPLATES_CSS; ?>/lottery/buttons_01-mobile.png") no-repeat scroll 0 0 transparent;
	}
	#lottery_tips{
		border-top: 1px solid #eee;
		color: red;
		text-align: center;
		padding: 10px;
	}
	#newList{
		max-height: 140px;
		overflow: hidden;
	}

	span.z-Recharge-btn{
		float: right;
		font-size: 12px;
		color:#fff;
	
	}
	span.z-Recharge-btn a{
		float: right;
		font-size: 12px;
		color:#fff;
	
	}
	</style>

    <section class="clearfix g-member">

	    <div class="helpCon">
    	    <div class="helpMain m-round">
        	    <div class="helpInfo">
            	    <dt>
                	    <h3>
							100%中奖
							<span class="z-Recharge-btn">
								<!--<a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge" >充值</a>  -->
								<?php if(!$this->userinfo): ?>
									<a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge" >登录</a>
                                 <?php  else: ?>
                                    <a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge" >充值</a>
								<?php endif; ?>
							</span>
						</h3>
                    </dt>
                    <dd class="helpBox">
						<div id="lottery">
							<img id="imgs" src="<?php echo G_TEMPLATES_CSS; ?>/lottery/disc-rotate.gif" class="image">
							<div class="arrow"></div>
							<div class="first" id="lot-btn">
								<span></span>
							</div>
						</div>
                    </dd>
                    <dd class="helpBox" id="lottery_tips">
						<?php 
						if ( !$this->userinfo ){
							echo '您还没有登录，无法参与抽奖哦';
						}else if ($this->userinfo['score'] > 1000) {
							echo '您拥有的微积分足够抽奖啦！';
						}else{
							echo '抱歉，您还没有抽奖机会快去赚微积分吧！';
						}
						 ?>
                    </dd>
                </div>
			</div>
		</div>

	    <div class="helpCon">
    	    <div class="helpMain m-round">
        	    <div class="helpInfo">
            	    <dt>
                	    <h3 style="">最新抽奖</h3>
                    </dt>
                    <dd class="helpBox" id="newList">
						<ul>
						<?php $ln=1;if(is_array($LotteryList)) foreach($LotteryList AS $item): ?>
							<li>【<b class="orange"><?php echo _strcut(userid($item['uid'],'username'),11,'***'); ?></b>】 抽中<b class="orange"><?php echo $item['title']; ?></b>，获得<b class="orange"><?php echo $item['desc']; ?></b></li>
						<?php  endforeach; $ln++; unset($ln); ?>
						</ul>
                    </dd>
                </div>
			</div>
		</div>

	    <div class="helpCon">
    	    <div class="helpMain m-round">
        	    <div class="helpInfo">
            	    <dt>
                	    <h3 style="">活动规则</h3>
                    </dt>
                    <dd class="helpBox">
						1. 活动时间: 2016/7/1 - 2016/12/30<br>
						2. 活动内容：在活动时间内，所有注册会员购买商品，做任务得到微积分满1000获得一次抽奖机会哦！<br>
						3. 活动奖品：<br>
							&nbsp; &nbsp; 一等奖: <b class="orange">10元</b> <?php echo _cfg('web_name_two'); ?>红包<br>
							&nbsp; &nbsp; 二等奖: <b class="orange">8元</b> <?php echo _cfg('web_name_two'); ?>红包<br>
							&nbsp; &nbsp; 三等奖: <b class="orange">6元</b> <?php echo _cfg('web_name_two'); ?>红包<br>
							&nbsp; &nbsp; 四等奖: <b class="orange">4元</b> <?php echo _cfg('web_name_two'); ?>红包<br>
							&nbsp; &nbsp; 五等奖: <b class="orange">3元</b> <?php echo _cfg('web_name_two'); ?>红包<br>
							&nbsp; &nbsp; 六等奖: <b class="orange">2元</b> <?php echo _cfg('web_name_two'); ?>红包<br>
							&nbsp; &nbsp; 七等奖: <b class="orange">1元</b> <?php echo _cfg('web_name_two'); ?>红包。<br>
						4. 活动说明：活动中奖率<b class="orange">100%</b>，用户获奖后<?php echo _cfg('web_name_two'); ?>红包将直接充值至用户余额内，红包金额不得提现。<br>
						5. 对于查实的作弊行为，扣除一切红包金额，取消抽奖资格。借助网站漏洞或其他平台，恶意获取红包，一经查实将扣除用户所有红包金额，所获商品按作废处理。
                    </dd>
                </div>
			</div>
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

</div>
</body>
</html>
