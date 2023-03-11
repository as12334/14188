<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?> - <?php echo $webname; ?>触屏版</title>
 <meta content="app-id=518966501" name="apple-itunes-app" />     
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />     
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />     
    <meta content="telephone=no" name="format-detection" />


<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/haoping.css" rel="stylesheet" type="text/css" media="screen,projection,tv" />

<style>
body{ font-size:12px;}
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

.col{color:#fff; font-family:Verdana, Geneva, sans-serif;font-size:16px;}

.wap-tips{ width: 230px; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; left: 50%; font-family: "微软雅黑"; margin-top: 20px; margin-left: -112px;opacity: 0.8; }
</style>
</head>



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
		 $(".wap-tips").html("请登录！").show();
					 setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
		
			return false;
		
		}else if('<?php echo $user['score']; ?>'<15){
		 $(".wap-tips").html("您的微积分不够哦！").show();
					 setTimeout(function () {
					$(".wap-tips").hide();
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
				url:'<?php echo WEB_PATH; ?>/mobile/lucky/data',
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
							p.css({"font-size":"12px","line-height":"10px","padding-top":"0px"});
							
							p.attr("id","r");
							$("#viewother").show();
							$("#prize li").unbind('click').css("cursor","default").removeAttr("title");
							
							 url = "<?php echo WEB_PATH; ?>/mobile/lucky/luckylist/<?php echo $uids; ?>/";
							 
							 $("#data").html("<a href=\""+url+"\" class=\"col\"  target=\"_blank\"><span>恭喜您中奖的是<br />"+prize+"<br />查看详细</span></a>");  
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
					pr.css({"font-size":"12px","line-height":"10px","color":"#333","padding-top":"0px"});
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
<style>
#prize #r{width:49px; height:49px;}
</style>
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
                  <div class="clee">
                  <table align="conter" cellpadding="0" cellspacing="0" width="100%"> 
                  <tr><td valign="top">
                   <table align="conter" cellpadding="0" cellspacing="0" width="164" style=" border:0px solid #00F;" class="boxs">
                   <tr><td height="35">&nbsp;</td></tr>
                   
                   <tr id="zj" > 
                    <td style="padding:50px 0px 0px 6px;" align="center"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/lp/weizhi.jpg" width="49"  /></td></tr>
                    
                   <tr><td style=" border:0px solid #00F;">
                  <a href="javascript:void(0)" id="viewother" ><span style=" color:#FFF"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/lp/faikai.fw.png" width="100"/><br/></span></a>
                  
     <a href="javascript:void(0);" id="repeat"><span style=" color:#FFF"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/lp/re.png" width="100"/><br/></span></a>
     <!--<span style=" color:#FFF; display:none" id="re_zj">恭喜您中奖的是</span> -->
                  </td></tr>
                  
                  <tr><td id="data" style="padding-top:4px; color:#FFF; line-height:30px;" align="center"></td></tr></table>
                </td>
     
     <td valign="top" > 
     
     <table align="conter" cellpadding="0" cellspacing="0" width="100%" style="font-size:12px;line-height:18px; border:0px solid #00F; font-family: "宋体","Arial", "Tahoma",;" class="boxs">
     <tr><td height="10">&nbsp;</td></tr>
     <tr><td width="39" align="left" style=" line-height:20px;  border:0px solid #00F;"></td></tr>
     <tr><td  align="left" ></td></tr>
     <tr><td align="left" ></td></tr>
     <tr><td align="left" ></td></tr>
     
     <tr><td align="left" ></td></tr>
     <tr><td align="left" ></td></tr>
     </table>
     
     </td></tr></table>
     </div>
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
 margin: -181px 0 0 -121px;
 width: 240px;
 height:200px;
 border:0px solid #CCC;
 line-height: 280px;
 text-align:center;
 font-size: 14px;
 
 overflow:hidden;
}
</style>
<div class="dialog"></div>

</div>
     <div class="wap-tips" style="display: none">
        
    </div> 
</body>
</html>
