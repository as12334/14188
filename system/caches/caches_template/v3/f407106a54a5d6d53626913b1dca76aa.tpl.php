<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <title><?php echo $title; ?> - <?php echo $webname; ?>触屏版</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css?v=130715" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css?v=130726" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/invite.css?v=130726" rel="stylesheet" type="text/css" />

    <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm1.css"/>
</head>
<body>
<div class="h5-1yyg-v11">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo $title; ?></h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>

    <section class="clearfix g-member">
        <div class="clearfix m-round m-name">
            <div class="fl f-Himg">
                <a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $member['uid']; ?>/<?php echo $uids; ?>/" class="z-Himg">
                    <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($member['uid'],'img'); ?>" border=0/></a>
                <span class="z-class-icon0<?php echo $dengji_1['groupid']; ?> gray02"><s></s><?php echo $member['yungoudj']; ?></span>
            </div>
            <div class="m-name-info"><p class="u-name">
                <b class="z-name gray01"><?php echo get_user_name($member['uid']); ?></b><em>(<?php echo $member['mobile']; ?>)</em></p>
                <ul class="clearfix u-mbr-info"><li>可用微积分 <span class="orange"><?php echo $member['score']; ?></span></li>
                    <li>经验值 <span class="orange"><?php echo $member['jingyan']; ?></span></li>
                    <li>余额 <span class="orange">￥<?php echo $member['money']; ?></span>
                        <a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge/<?php echo $uids; ?>/" class="fr z-Recharge-btn">去充值</a></li>
                </ul>
            </div>
        </div>
        <div class="R-content">
            
            <div class="total">可用微积分 <span class="orange"><?php echo $member['score']; ?></span>， <span>可抵现金<span class="orange"><?php echo $mefufen; ?></span>微币，100积分=<span class="orange">1</span>微币 </span> 积分满1000以上可以提现，提现的积分需是100的倍数，提现的金额小于100的手续费<span class="orange"><?php echo $fufen['fufen_yongjintx']; ?></span>微币、大于100的免手续费。</div>
           
            <section class="clearfix g-member">
        <div class="g-tj">
	        <ul id="ulOption">
		       
		        <li><b><input type="text" class="z-init " placeholder="    输入积分" maxlength="8" id="t_txtInfo"/><s></s></b></li>
                <li><a id="t_button" href="javascript:;" >提现</a></li>
	        </ul>
	    </div>
	    
	   
    </section>
           
           <div class="total">
                <dt>
                </dt>
                   <dd>
                   <?php if(!$member_number): ?>
                <a href="<?php echo WEB_PATH; ?>/mobile/home/numberadd/<?php echo $uids; ?>/" class="orange">您还没有绑定账号哦，去绑定一个吧！》》</a>
                   
                   <?php  else: ?>		
                   <?php $ln=1;if(is_array($member_number)) foreach($member_number AS $val): ?>
                   <label>
                   <input id="numid"  name="numid" type="radio" value="<?php echo $val['id']; ?>"  <?php if($val['type']==1): ?> checked="checked" <?php endif; ?>/>
                   姓名：<b class="orange"><?php echo $val['username']; ?> </b>&nbsp;&nbsp;&nbsp;&nbsp;
                   账号：<b class="orange"><?php echo $val['banknumber']; ?></b>
                   </label>
                   <br />
                
			      <?php  endforeach; $ln++; unset($ln); ?>
			    
			      <?php endif; ?>
                   </dd>
            </div> 
            
           <div class="subMenu">
                <a id="luckylist" class="current">提现记录</a>
                <a id="linkApply">我的微积分</a>
               
            </div>
             <!--提现记录-->
             <div id="divlucky">
            
            <div id="divCommissionList" class="list-tab commission gray02">
            <ul class="listTitle">
            
            <li class="w40">时间</li>
            <li class="w20">提现金额</li>
            <li class="w20">手续费</li>
            <li class="w20">审核状态</li>
            
            </ul>
                <?php if($total2!=0): ?>
                   <?php $ln=1;if(is_array($account2)) foreach($account2 AS $at): ?>

                    
                    <ul class="listconfufen">
                        
                        <li class="w40"><?php echo date("Y-m-d H:i:s",$at['time']); ?></li>
                        <li class="w20"><?php echo $at['money']; ?></li>
                        <li class="w20"><?php if($at['money']>=100): ?> 0 <?php  else: ?> <?php echo $fufen['fufen_yongjintx']; ?> <?php endif; ?></li>
                        <li class="w20">
                        <?php if($at['auditstatus']==1): ?>
			<font color="#0c0">已审核</font>
		<?php  else: ?>
			<font color="red">未审核</font>
		<?php endif; ?>
                        </li>
                       
                    </ul>
                    <?php  endforeach; $ln++; unset($ln); ?>
                    
               <style>
			#divPageNav{ padding-top:10px;text-align:right}
			#divPageNav li a{ padding:5px;}
		</style>
		<div id="divPageNav" class="page_nav">
        	<?php echo $page->show('one'); ?> <li>共 <?php echo $total2; ?> 条</li>
        </div>
        <?php endif; ?>
                    </div>
              <div id="divPageNav" class="page_nav"></div>     
                <?php if($total==0): ?>
   <section class="clearfix">
        <ul >
	      <div class="haveNot z-minheight"><s></s><p>您还未有金币记录哦！</p></div>
        </ul>
    </section>
                <?php endif; ?> 
                
                </div>
             <!--提现记录-->
             
              <!--我的金币-->
            <div id="divSQTX" style="display:none;">
                <div id="divCommissionList" class="list-tab commission gray02">
            <ul class="listTitle">
            
            <li class="w40">时间</li>
            <li class="w40">渠道</li>
            <li class="w20">获得/支出</li>
            
            </ul>
                <?php if($total!=0): ?>
                   <?php $ln=1;if(is_array($account)) foreach($account AS $at): ?>

                    
                    <ul class="listconfufen">
                        
                        <li class="w40"><?php echo date("Y-m-d H:i:s",$at['time']); ?></li>
                        <li class="w40"><?php echo $at['content']; ?></li>
                        <li class="w20"><?php if($at['type']==1): ?>
			<font color="#0c0">+ <?php echo $at['money']; ?></font>
		<?php  else: ?>
			<font color="red">- <?php echo $at['money']; ?></font>
		<?php endif; ?></li>
                       
                    </ul>
                    <?php  endforeach; $ln++; unset($ln); ?>
                    
               <style>
			#divPageNav{ padding-top:10px;text-align:right}
			#divPageNav li a{ padding:5px;}
		</style>
		<!--<div id="divPageNav" class="page_nav">
        	<?php echo $page->show('one'); ?> <li>共 <?php echo $total; ?> 条</li>
        </div> -->
        <?php endif; ?>
                    </div>
              <div id="divPageNav" class="page_nav"></div>     
                <?php if($total==0): ?>
   <section class="clearfix">
        <ul >
	      <div class="haveNot z-minheight"><s></s><p>您还未有金币记录哦！</p></div>
        </ul>
    </section>
                <?php endif; ?> 
            
            </div>
            
             <!--我的金币-->
    </section>
    
<?php include templates("mobile/index","footer");?>

<script type="text/javascript">
       
            
			var submit_url = "<?php echo WEB_PATH; ?>/member/home/txjifen";//处理提现充值
			
			
		
            var ehtml = '<div id="divTopicShow"  style="text-align:center; padding:20px 0;" ><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/global/loading.gif" width="30" sytle="vertical-align:middle"/></div>';
			



        

 
  
function checkt_txtInfo() {
                var value = $("#t_txtInfo").val();
				var total = <?php echo $totalscore; ?>;
               
				if (value == '') {
					$(".copy-tips").show();
                    $(".wap-tips").html("请填写提现的积分！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
					
                    return false;
                }
				if (value < 1000) { 
					$(".copy-tips").show();
                    $(".wap-tips").html("提现的微积分要大于1000微积分哦~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
					
                    return false;
                }
				if (value%100!=0) { 
					$(".copy-tips").show();
                    $(".wap-tips").html("提现的微积分需要是100的倍数哦~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
					
                    return false;
                }
				 if (total < value) {
					$(".copy-tips").show();
                    $(".wap-tips").html("提现的微积分大于总微积分！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
					
                    return false;
                }
				
				

                
               
                return true;
				
            }


              
   $("#t_button").click(function () {
                 if (checkt_txtInfo()) {
                    t_txtInfo = $("#t_txtInfo").val();
					numid = $('input:radio[name=numid]:checked').val();
					$("#t_button").addClass("letter-noSpac").html("正在提现...");
                    
					
                    $.ajax({
                        url: submit_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'submit1', money: t_txtInfo, numid: numid},
                        success: function (data) {
                            if (data != '1000') {
                                $(".copy-tips").show();
                                $(".wap-tips").html(data).show();
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 2000);
								$("#t_button").html("提现");
                            } else {
								 $(".copy-tips").show();
                                $(".wap-tips").html("申请成功！请等待审核！").show();
								$("#t_txtInfo").val("");
								
								location.href = "<?php echo WEB_PATH; ?>/mobile/home/fufen/";
								
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 2000);
								
								
                               // $(".login-success").show();
								//$("#btnSubmitMsg").addClass("letter-noSpac").html("登录成功");
                                  //  location.href = "<?php echo WEB_PATH; ?>/go/shaidan/Editor/<?php echo $shaidan['sd_id']; ?>";
                               
                            }
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
				 }
            });  
   


    </script>
<script>
$(function(){
	$("#ul_menu li").click(function(){
		var id=$("#ul_menu li").index(this);
		$("#ul_menu li").removeClass().eq(id).addClass("curr");
		$(".fri-req-wrap").hide().eq(id).show();
	});
	$("#ul_state li a").click(function(){
		var id=$("#ul_state li a").index(this);
		$("#ul_state li a").removeClass().eq(id).addClass("z-checked");
		$(".mon-wrap").hide().eq(id).show();
	});
	
$(".subMenu a").click(function(){
		var id=$(".subMenu a").index(this);
		$(".subMenu a").removeClass().eq(id).addClass("current");
		$(".R-content .topic").hide().eq(id).show();
	});
	$("#luckylist").click(function(){
	    $("#divSQTX").hide();
	    $("#divlucky").show();
		 $("#divSQCZ").hide();	
	});
	$("#linkApply").click(function(){
	    $("#divSQTX").show();
	    $("#divlucky").hide();
		 $("#divSQCZ").hide();	
	});	
  $("#linkRecharge").click(function(){
		  $("#divSQTX").hide();
		  $("#divlucky").hide();
		  $("#divSQCZ").show();
	
	});
})
	</script>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_WEB_PATH; ?>/statics/templates/{wc:fun_cfg('template_name')}";
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js');
</script>
 
</div>


<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
<style type="text/css">

.wap-tips{ width: 50%; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; left: 25%; font-family: "微软雅黑"; margin-top: 20px; margin-left: 0px;opacity: 0.8; }

</style>
</body>
</html>
