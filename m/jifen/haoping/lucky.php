<?php 
session_start(); 
require"../../../conn.php";

$y2 = 2;
$y3 = 3;
$y4 = 4;
$y5 = 5;
$y6 = 6;
$y7 = 7;
$y8 = 8;
$y9 = 9;
$y10 = 10;
$y12 = 12;
$y15 = 15;
$y20 = 20;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>抽奖红利</title>
<style>

.col{color:#fff; font-family:Verdana, Geneva, sans-serif;font-size:16px;}
</style>
</head>
<link href="<?php echo $url; ?>/m/css/haoping.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="<?php echo $url; ?>/jf_js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>/jf_js/js1.js"></script>
<script type="text/javascript">
function  fd(){
	var editOk=document.getElementById("editOk");
	$("#editOk").show(10);
	//if( editOk.style.display="block"){ $("#editOk").hide(6200);}
	}
	
$(function(){
	$("#prize li").each(function(){
		var p = $(this);
		var c = $(this).attr('class');
		p.css("background-color",c);
		
		p.click(function(){
			$.ajax({
				type:'GET',
				url:'data.php',
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
							var nums = prize.split("/")[5];
							     num = nums.split(".")[0];
							 if(num=="5jf" || num=="10jf" || num=="20jf" ){
							      url = "<?php echo $url; ?>/m/jifen/wjf/";
								 }else{
								  url = "<?php echo $url; ?>/m/jifen/wjf/";
								 }
							 $("#data").append("<span>恭喜您中奖的是<br />"+prize+"<br /><a href=\""+url+"\" class=\"col\"  target=\"_blank\">查看详细</a></span>");  
							  var viewother=document.getElementById("viewother");
							  var zj=document.getElementById("zj");
							  
							  if( viewother.style.display="block"){ zj.style.display="none";}
                                
							
							
						}
					});
					$("#data").data("nolist",json.no);
				}
			});
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

<?php 
$alert = "您的积分不够哦！";
$logins = "先登录！";
if (!isset($_SESSION['user'])||$_SESSION['user']==''){
		
	}else{

$sqls='select * from `'.$tablepre.'member_co` where `email`="'.$_SESSION['user'].'" or `user`="'.$_SESSION['user'].'"';
$results=$db->query($sqls);
$rows=$db->getrow($results);
	  
$sqlj='select  sum(jf) from `'.$tablepre.'jifen` where  email="'.$rows['email'].'"';
$resultj=$db->query($sqlj);
$rowj=$db->getrow($resultj);


	}
?>

  <div id="main">
    <div class="demo"> 
    <div class="haoping40">&nbsp;</div>
     <ul id="prize">
      <?php 
		         if (!isset($_SESSION['user'])||$_SESSION['user']==''){?>
                 <?php for($i=1;$i<=12;$i++){?>
		 <li class="reds" title="点击抽奖" ><a href="javascript:window.alert('<?php echo $logins; ?>');"><span class="block" ><?php echo $i;?></span></a></li>
         <?php }?>
        
					 <?php }else{
		        ?> 
     <?php if($rowj['sum(jf)']>=15){?>
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
         
         <?php }else{?>
         <?php for($i=1;$i<=12;$i++){?>
		 <li class="reds" title="点击抽奖" ><a href="javascript:window.alert('<?php echo $alert; ?>');"><span class="block" ><?php echo $i;?></span></a></li>
         <?php }?>
       
          <?php }}?>
     </ul>
                  <div class="clee">
                  <table align="conter" cellpadding="0" cellspacing="0" width="100%"> 
                  <tr><td valign="top">
                   <table align="conter" cellpadding="0" cellspacing="0" width="164" style=" border:0px solid #00F;" class="boxs">
                   <tr><td height="30">&nbsp;</td></tr>
                   
                   <tr id="zj" > 
                    <td style="padding:50px 0px 0px 6px;" align="center"><img src="<?php echo $url; ?>/images/jifen/weizhi.jpg" width="49"  /></td></tr>
                    
                   <tr><td style=" border:0px solid #00F;">
                  <a href="javascript:void(0)" id="viewother" ><span style=" color:#FFF"><img src="<?php echo $url; ?>/m/images/jifen/faikai.fw.png" width=""/><br/></span></a>
                  
     <a href="javascript:void(0);" id="repeat"><span style=" color:#FFF"><img src="<?php echo $url; ?>/m/images/jifen/re.png" width=""/><br/></span></a>
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
</body>
</html>
