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
    <script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
     
</head>
<body>
<div class="h5-1yyg-v11">
    <input type="hidden" class="z-init " value="<?php echo $total; ?>" id="total"/>

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
            <div class="subMenu">
                <a id="linkApply" class="current">提现申请</a>
                <a id="linkRecharge">充值到<?php echo _cfg('web_name_two'); ?>账户</a>
            </div>
           <div id="commissions" class=" clearfix" style="display:none;">

           </div>

            
            <div id="divSQTX" >
             <section class="clearfix g-member">
        <div class="g-tj">
	        <ul id="ulOption">
		       
		        <li><b><input type="text" class="z-init " placeholder="    输入金额" maxlength="8" id="t_txtInfo"/><s></s></b></li>
                <li><a id="t_button" href="javascript:;" >提现</a></li>
	        </ul>
	    </div>
	    
	   
    </section>
    <div class="total">
                <dt>
                </dt>
                   
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
                   
            </div>
             <div id="t_commentList" class=" clearfix" style="display:none;">

            </div>
                
            </div>
            
            <div id="divSQCZ"  style="display:none;">
             <section class="clearfix g-member">
        <div class="g-tj">
	        <ul id="ulOption">
		       
		        <li><b><input type="text" class="z-init" placeholder="    输入金额" maxlength="8" id="c_txtInfo"/><s></s></b></li>
                <li><a id="c_button" href="javascript:;" >充值</a></li>
	        </ul>
	    </div>
	    
	   
    </section>
          
            <div id="c_commentList" class=" clrfix" style="display:none;">

            </div>
               
            </div>
        </div>
    </section>
   
<?php include templates("mobile/index","footer");?>

<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
<style type="text/css">

.wap-tips{ width: 50%; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; left: 25%; font-family: "微软雅黑"; margin-top: 20px; margin-left: 0px;opacity: 0.8; }

</style>
<script type="text/javascript">
       
            var commissions_url = "<?php echo WEB_PATH; ?>/mobile/invite/yue";//佣金余额
			var submit_url = "<?php echo WEB_PATH; ?>/member/home/cashout";//处理提现充值
			
			var c_base_url = "<?php echo WEB_PATH; ?>/mobile/invite/useryj";//充值记录
			var base_url = "<?php echo WEB_PATH; ?>/mobile/invite/record";//提现记录
            var ehtml = '<div id="divTopicShow"  style="text-align:center; padding:20px 0;" ><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/global/loading.gif" width="30" sytle="vertical-align:middle"/></div>';
			



            var getAllp = function(){
                    
					$("#t_commentList").html(ehtml);
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#t_commentList').html(data).show();
                        },
                        error: function () {
                            $('#t_commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
getAllp();
var getc = function(){
                    
					$("#c_commentList").html(ehtml);
                    $.ajax({
                        url: c_base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#c_commentList').html(data).show();
                        },
                        error: function () {
                            $('#c_commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
   getc();  
   
   var commissions = function(){
                    
					$("#commissions").html(ehtml);
                    $.ajax({
                        url: commissions_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                          
						   $('#commissions').html(data).show();
                        },
                        error: function () {
                            
							$('#commissions').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
   commissions();  
  
function checkt_txtInfo() {
                var value = $("#t_txtInfo").val();
				var total = parseInt($("#total").val());
               
				if (value == '') {
					$(".copy-tips").show();
                    $(".wap-tips").html("请填写提现的金额！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
					
                    return false;
                }
				if (value < 10) { 
					$(".copy-tips").show();
                    $(".wap-tips").html("提现的金额要大于10微币哦~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
					
                    return false;
                }
				 if (total<value) { 
					$(".copy-tips").show();
                    $(".wap-tips").html("提现的金额大于余额5！~").show();
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
								setTimeout(commissions,50);
								setTimeout(getAllp,50);
								
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 2000);
								$("#t_button").html("提现");
								
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
   

function checkc_txtInfo() {
                var value = $("#c_txtInfo").val();
				var total = parseInt($("#total").val());
               
				 if (value == '') {
					$(".copy-tips").show();
                    $(".wap-tips").html("请填写充值的金额！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
					
                    return false;
                }
				
				 if (total < value) {
				 
					$(".copy-tips").show();
                    $(".wap-tips").html("充值的金额大于余额！~").show();
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
					
                    return false;
                }
				

                
               
                return true;
				
            }


              
   $("#c_button").click(function () {
                 if (checkc_txtInfo()) {
                    c_txtInfo = $("#c_txtInfo").val();
					$("#c_button").addClass("letter-noSpac").html("正在充值...");
                    
					
                    $.ajax({
                        url: submit_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'submit2', money: c_txtInfo},
                        success: function (data) {
                            if (data != '1000') {
                                $(".copy-tips").show();
                                $(".wap-tips").html(data).show();
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 2000);
								$("#c_button").html("充值");
                            } else {
								 $(".copy-tips").show();
                                $(".wap-tips").html("充值成功").show();
								$("#c_txtInfo").val("");
								setTimeout(commissions,50);
								setTimeout(getc,50);
								
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 1000);
								
								$("#c_button").html("充值");
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
	$("#linkApply").click(function(){
	    $("#divSQTX").show();
	    $("#divTip").show();
		 $("#divSQCZ").hide();	
	});	
  $("#linkRecharge").click(function(){
		  $("#divSQTX").hide();
		  $("#divTip").hide();
		  $("#divSQCZ").show();
	
	});
})
	</script>
</div>
</body>
</html>
