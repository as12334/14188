<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>好评抽奖</title>

</head>
<link type="text/css" rel="stylesheet" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/jf.css" />
<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
<style type="text/css">
.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -50px -170px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:3px;}
.wap-tips{padding:30px 80px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;vertical-align:middle; }
.col{ color:#fff;}
</style>

<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jf_js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jf_js/js1.js"></script>
<script type="text/javascript">
function  fd(){
	var editOk=document.getElementById("editOk");
	$("#editOk").show(10);
	if( editOk.style.display="block"){ $("#editOk").hide(6200);}
	}
function  checkLogin(){
	if(!'<?php echo $user; ?>'){
		 $(".copy-tips").show();
		 $(".wap-tips").html("请登录！").show();
					 setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
		
			return false;
		
		}else if('<?php echo $user['score']; ?>'<15){
			 $(".copy-tips").show();
		 $(".wap-tips").html("您的微积分不够哦！").show();
					 setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
		
			return false;		
		}else{
			return true;
			}
			return true;
	}	

$(function(){
	$("#prize li").each(function(){
		var p = $(this);
		var c = $(this).attr('class');
		p.css("background-color",c);
		
		p.click(function(){
			if (checkLogin()) {
			$.ajax({
				type:'GET',
				url:'<?php echo WEB_PATH; ?>/go/lucky/data',
				dataType:'json',
				cache:false,
				success:function(json){
					var prize = json.yes;
					$("#editOk").hide(16200);
					
					p.flip({
						direction:'rl',
						content:prize,
						
						
						color:c,
						onEnd: function(){
							p.css({"font-size":"18px","line-height":"30px","padding-top":"1px"});
							
							p.attr("id","r");
							$("#viewother").show();
							$("#prize li").unbind('click').css("cursor","default").removeAttr("title");
							
							 url = "<?php echo WEB_PATH; ?>/go/lucky/luckylist/<?php echo $uids; ?>/";
							 
							 $("#data").html("<a href=\""+url+"\" class=\"col\"  target=\"_blank\"><span>恭喜您中奖的是<br /><br />"+prize+"<br /><br />查看详细</span></a>");  
							  var viewother=document.getElementById("viewother");
							   var zj=document.getElementById("zj");
							  
							  if( viewother.style.display="block"){ zj.style.display="none";}
                                
							
							
						}
					});
					$("#data").data("nolist",json.no);
				}
			});
			}
		});
	});
	    
     
	$("#viewother").click(function(){
		var mydata = $("#data").data("nolist"); //获取数据
		var mydata2 = eval(mydata);
			 
		$("#prize li").not($('#r')[0]).each(function(index){
			var pr = $(this);
			pr.flip({
				direction:'bt',
				color:'lightgrey',
				content:mydata2[index],
				onEnd:function(){
					pr.css({"font-size":"18px","line-height":"60px","color":"#333","padding-top":"1px"});
					$("#viewother").hide();
					$("#repeat").show();
					var repeat=document.getElementById("repeat");
							  var zj=document.getElementById("zj");
							  if( repeat.style.display="block"){ zj.style.display="none";}
					          $("#editOk").hide(10);
				}
			});
		});
		$("#data").removeData("nolist");
	});
	$("#repeat").click(function(){
		window.location.reload();
	});
});


</script>
</head>

<body>



  <div id="main">
    <div class="demo"> 
    <div class="haoping40">&nbsp;</div>
     <ul id="prize">
      <li class="red" title="点击抽奖" onclick="fd()">1</li>
         <li class="green" title="点击抽奖" onclick="fd()">2</li>
         <li class="blue" title="点击抽奖" onclick="fd()">3</li>
         <li class="purple" title="点击抽奖" onclick="fd()" class="hp_box">4</li>
         <li class="olive" title="点击抽奖" onclick="fd()">5</li>
         <li class="khaki" title="点击抽奖" onclick="fd()">6</li>
         <li class="yellow" title="点击抽奖" onclick="fd()">7</li>
         <li class="lightpink" title="点击抽奖" onclick="fd()" >8</li>
         <li class="darkcyan" title="点击抽奖" onclick="fd()">9</li>   
         <li class="cyan" title="点击抽奖" onclick="fd()">10</li>
         <li class="lightgrey" title="点击抽奖 " onclick="fd()">11</li>   
         <li class="darksalmon" title="点击抽奖" onclick="fd()">12</li>
     </ul>
                  <div style="width:678px; clear:both; text-align:conter; color:#FFF" class="clee">
                  <table align="conter" cellpadding="0" cellspacing="0" width="678" border="0"> 
                  <tr><td valign="top" width="339">
                   <table align="conter" cellpadding="0" cellspacing="0" width="100%" style=" border:0px solid #00F;" class="boxs">
                   <tr><td height="110">&nbsp;</td></tr>
                   <tr id="zj" > 
                    <td style="padding-top:50px; padding-left:30px"  align="conter"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/lp/weizhi.jpg"   /></td></tr>
                    
                   <tr><td style=" border:0px solid #00F; height:80px;padding-left:30px; text-align:center">
                  <a href="javascript:void(0)" id="viewother" ><span style=" color:#FFF"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/lp/faikai.fw.png" width=""/></span></a><a href="javascript:void(0);" id="repeat"><span style=" color:#FFF"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/lp/re.png" width=""/></span></a>
    <br/>
                  </td></tr>
                  <tr><td id="data" valign="top" style="padding-left:30px"  align="conter">  </td></tr></table>
     </td>
     
     <td valign="top" > 
     
     <table align="conter" cellpadding="0" cellspacing="0" width="100%" style="font-size:14px;line-height:18px; border:0px solid #00F; font-family: "宋体","Arial", "Tahoma",;" class="boxs">
    
     <tr><td>&nbsp;</td><td align="centent" style=" line-height:20px;"><strong><span style="font-size:16px"></span></strong></td></tr>
     
     <tr><td>&nbsp;</td><td width="90%" align="left" ><span class="bdsharebuttonbox" data-tag="share_1"> 
	<a class="bds_mshare" data-cmd="mshare"></a> 
    <a class="bds_sqq" data-cmd="sqq"></a>
	<a class="bds_qzone" data-cmd="qzone" href="#"></a>
    <a class="bds_weixin" data-cmd="weixin" href="#"></a>
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
			bdUrl : '<?php echo WEB_PATH; ?>/go/lucky/?yid=<?php echo $uids; ?>', 	
			bdPic : '<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/lp/haoping.jpg'
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
</script></td></tr>
<tr><td>&nbsp;</td><td width="90%" align="left" >备注：现金可以充值到余额或提现哦！</td></tr>
     <tr><td>&nbsp;</td><td align="left" ><div style="padding:4px 0px 0px 80px; width:130px;height:130px; text-align:center;">
        <img border="0" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo _cfg('wx'); ?>" width="130">
        <br /><p style="color:red; font-size:18px;">关注官方微信</p>
        </div></td></tr>
     <tr><td>&nbsp;</td><td align="left" ></td></tr>
     <tr><td>&nbsp;</td><td align="left" ></td></tr>
     <tr><td>&nbsp;</td><td align="left" ></td></tr>
     <tr><td>&nbsp;</td><td align="left" ></td></tr>
     <tr><td colspan="2" align="left" style="padding:0px 14px 0px 36px;"></td></tr>
     </table>
     
     </td></tr></table>
     </div>
  </div>


<div id="editOk" style=" display:none">
<style type="text/css">
.dialog{
 position: fixed;
 _position:absolute; /* hack for IE6 */
 z-index:1;
 top: 50%;
 left: 50%;
 margin: -341px 0 0 -331px;
 width: 650px;
 height:340px;
 border:0 solid #CCC;
 line-height: 280px;
 text-align:center;
 font-size: 14px;
 
 overflow:hidden;
}
</style>
<div class="dialog"></div>
</div>
</body>
</html>




