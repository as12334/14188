<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_x.css?v=150728" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.js"></script>
<div class="p-center-main clrfix">
            <!--左边导航-->
            <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-invitation.css"/>
  	<?php include templates("member","left");?>
            <div class="sidebar_main clrfix fr">
                <div class="g-obtain-title clrfix">
                    <ul id="ul_menu">
                        <li class="curr"><a href="javascript:;">申请提现</a></li>
                        <li><a href="javascript:;">充值到<?php echo _cfg('web_name_two'); ?>账户</a></li>
                    </ul>
                </div>
                <!--提现 -->
                <div  class="fri-req-wrap">
                 
                
                
                    <div class="mana-req-wrap">
                        <div class="mana-req-inner">
                            <div class="fl">
                                <div id="commissions" class=" clrfix" style="display:none;">

                                </div>
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                       
                    </div>
                   
                    <div class="mana-rules" id="divSQTX">
                        <p class="gray9">满10微币时才可申请提现，
                        提现的金额小于100的手续费<span class="orange"><?php echo $fufen['fufen_yongjintx']; ?>微币</span>，
                        提现的金额大于100的免手续费</p>
                        <div class="m-info-wrap"id="d_clip_container" style="position:relative;" >
                            <input id="t_txtInfo" class="m-info" type="text"  style="width:180px;" onKeyUp="value=value.replace(/\D/g,'')"/>
                            <a id="t_button" href="javascript:;" >提现</a>

                        </div>
                    </div>
                  <div class="mana-protail">
                            <div class="title">选择提现账号</div>
                            
                            
                        </div>  
                   <div class="mana-rules" id="divSQTX">
                       <dt>
                </dt>
                   <dd>
                   <?php if(!$member_number): ?>
                <a href="<?php echo WEB_PATH; ?>/member/home/numberbind/" class="orange">您还没有绑定账号哦，去绑定一个吧！》》</a>
                <br />
                 <br />
                <div class="m-info-wrap"id="d_clip_container" style="position:relative;" ><a  href="<?php echo WEB_PATH; ?>/member/home/numberbind/"  >绑定</a></div>
                   
                   <?php  else: ?>		
                 
                   <br />
                   <?php $ln=1;if(is_array($member_number)) foreach($member_number AS $val): ?>
                   <label>
                   <input id="numid"  name="numid" type="radio" value="<?php echo $val['id']; ?>"  <?php if($val['type']==1): ?> checked="checked" <?php endif; ?>/>
                   姓名：<b class="orange"><?php echo $val['username']; ?> </b>&nbsp;&nbsp;&nbsp;&nbsp;
                   账号：<b class="orange"><?php echo $val['banknumber']; ?></b>
                   </label>
                   <br />
                 <br />
			      <?php  endforeach; $ln++; unset($ln); ?>
                  
			      <?php endif; ?>
                   </dd>
                    </div>
                    
                    
                    <div class="mana-protail-wrap">
                        <div class="mana-protail">
                            <div class="title">提现记录</div>
                            
                            
                        </div>
                       <!--提现记录 -->
                <div class="mon-wrap" >
                    <div class="mon-inner">
                    <div id="divMentionList" class="list-tab commission gray02">
			            <ul class="listTitle">
                        <li class="w140">申请时间</li>
                        <li class="w90">姓名</li>
                        <li class="w140">账号</li>
                        <li class="w140">提现金额(微币)</li>
                        <li class="w90">手续费(微币)</li>
                        <li class="w90">审核状态</li>
                        </ul>
			  <div id="t_commentList" class=" clrfix" style="display:none;">

        </div>            
		              </div>      
                 </div>
                </div>
                <!--提现记录end -->
                    </div>
                </div>
                <!--提现 -->
                
                <!--充值 -->
                <div  class="fri-req-wrap" style="display:none;"> 
                    <div class="mana-req-wrap">
                        <div class="mana-req-inner">
                            <div class="fl">
                                <div id="commissions1" class=" clrfix" style="display:none;">

                                </div>
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                        
                    </div>
                   
                    <div class="mana-rules" id="divSQTX">
                       <p class="gray9">佣金余额可实时充值到您的<?php echo _cfg('web_name_two'); ?>帐户。</p>
                        <div class="m-info-wrap"id="d_clip_container" style="position:relative;" >
                            <input id="c_txtInfo" class="m-info" type="text"  style="width:180px;" onKeyUp="value=value.replace(/\D/g,'')"/>
                            <a id="c_button" href="javascript:;" >充值</a>

                        </div>
                    </div>
                    
                   
                    
                    
                    <div class="mana-protail-wrap">
                        <div class="mana-protail">
                            <div class="title">充值记录</div>
                            
                            
                        </div>
                       <!--充值记录 -->
                <div class="mon-wrap" >
                    <div class="mon-inner">
                    <div id="divMentionList" class="list-tab commission gray02">
			            <ul class="listTitle">
		<li class="w150">充值时间</li>
        <li class="w90">&nbsp;</li>
		<li class="w150">资金渠道</li>
        <li class="w90">&nbsp;</li>
		<li class="w150">收入</li>
	</ul>
    <div id="c_commentList" class=" clrfix" style="display:none;">

        </div>
			              
		              </div>      
                 </div>
                </div>
                <!--充值记录end -->
                    </div>
                </div>
                <!--充值 -->
                

            </div>
        </div>
<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
<style type="text/css">
.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -50px -170px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:3px;}
.wap-tips{padding:30px 80px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;vertical-align:middle; }

</style>
<script type="text/javascript">
       
            var commissions_url = "<?php echo WEB_PATH; ?>/member/home/commissions";//佣金余额
			var submit_url = "<?php echo WEB_PATH; ?>/member/home/cashout";//处理提现充值
			
			var c_base_url = "<?php echo WEB_PATH; ?>/member/home/useryj";//充值记录
			var base_url = "<?php echo WEB_PATH; ?>/member/home/record";//提现记录
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
                    $("#commissions1").html(ehtml);
					$("#commissions").html(ehtml);
                    $.ajax({
                        url: commissions_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                           $('#commissions1').html(data).show();
						   $('#commissions').html(data).show();
                        },
                        error: function () {
                            $('#commissions1').html("数据加载失败,请重试!").show();
							$('#commissions').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
   commissions();  
  
function checkt_txtInfo() {
                var value = $("#t_txtInfo").val();
				var total = <?php echo $total; ?>;
               
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
				 if (total < value) {
					$(".copy-tips").show();
                    $(".wap-tips").html("提现的金额大于余额！~").show();
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
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 2000);
								$("#t_txtInfo").val("");
								setTimeout(commissions,50);
								setTimeout(getAllp,50);
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
				var total = <?php echo $total; ?>;
               
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
					            setTimeout(function () {
				             	$(".copy-tips").hide();
                                }, 2000);
								$("#c_txtInfo").val("");
								setTimeout(commissions,50);
								setTimeout(getc,50);
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
<?php include templates("index","footer");?>