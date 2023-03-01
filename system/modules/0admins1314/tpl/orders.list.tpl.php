<?php 

defined('G_IN_ADMIN')or exit('No permission resources.'); 
$this->db=System::load_sys_class('model');

?>


			
<!DOCTYPE html>
<html  class="jp-pc">
    <head>
        <title>会员中心 - 聚优美妆网 - 专注独家折扣,1折特卖,全场包邮</title>
        <meta content="聚优美妆折扣,折扣,特卖,打折,9.9元包邮,聚优美妆网" name="keywords">
        <meta content="聚优美妆聚米折扣汇聚全网最优质折扣商品" name="description">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <link href="//127.0.0.1" rel="dns-prefetch">
        <link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/admin_order.css" type="text/css">
        <link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/pg-kimi.css" type="text/css">
       
        <link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
        <script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/copy_js/jquery.js"></script>
        <script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/copy_js/jquery.zclip.js"></script>

      
    
    </head>
    <body>
        
           
        
    <!-- 主体 开始-->
    <div class="main pr mt20 clear" >
        <div class="my-juanpi">
            <!-- 左导航 -->
           

            <!-- /左导航 -->
            <div class="order-lists" >
                <div class="all-orders">
                    <div class="all-orders-top clear">
                    <form id="sform" name="sform" method="get" action="<?php echo G_MODULE_PATH; ?>/orders/orders_list/">
						<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border3" valign="top">
<tr class="tdbg3">
<td width="8%" align="right">订 单 号：</td><td width="17%" align="left"><INPUT name="order_num" type="text" id="order_num" size="20" class="input150" value="<?php echo $order_num?>" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';"></td>
<td width="8%" align="right">订单状态：</td><td width="17%" align="left">
<select  name="pass" id="pass" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';">
                               <option value="" <?php if($pass=='') {?>  selected = "selected" <?php }?> data-msg="全部">全 部</option>
                               <option value="0" <?php if($pass=='0') {?>  selected = "selected" <?php }?>   data-msg="待付款">待付款</option>
                               <option value="2" <?php if($pass=='2') {?>  selected = "selected" <?php }?>  data-msg="待发货">待发货</option>
                               
                               <option value="3" <?php if($pass=='3') {?>  selected = "selected" <?php }?>  data-msg="已发货">已发货</option>
                               <option value="4" <?php if($pass=='4') {?>  selected = "selected" <?php }?>  data-msg="已成功">已成功</option>
                               <option value="1" <?php if($pass=='1') {?>  selected = "selected" <?php }?>  data-msg="已关闭">已关闭</option>
                               
                           </select></td>
<td width="8%" align="right">买家账号：</td><td width="17%" align="left"><INPUT name="user" type="text" id="user" size="20" class="input150" value="<?php echo $user?>" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';"></td>
<td width="8%" align="right">收 件 人：</td><td width="17%" align="left"><INPUT name="name" type="text" id="name" size="20" class="input150" value="<?php echo $name?>" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';"></td>
</tr>

<tr class="tdbg3">
<td align="right">电话号码：</td><td align="left"><INPUT name="mob" type="text" id="mob" size="20" class="input150" value="<?php echo $mob?>" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';"></td>
<td align="right">商品标题：</td><td align="left"><INPUT name="title" type="text" id="title" size="20" class="input150" value="<?php echo $title?>" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';"></td>
<td align="right">快递单号：</td><td align="left"><INPUT name="dh" type="text" id="dh" size="20" class="input150" value="<?php echo $dh?>" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';"></td>
<td align="right">订单来源：</td><td align="left"><select  name="type_o" id="type_o" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';">
                               <option value="" <?php if($type_o=='') {?>  selected = "selected" <?php }?> data-msg="全部">全 部</option>
                               
                               <option value="2" <?php if($type_o=='2') {?>  selected = "selected" <?php }?>  data-msg="电脑订单">电脑订单</option>
                              
                               <option value="1" <?php if($type_o=='1') {?>  selected = "selected" <?php }?>  data-msg="手机订单">手机订单</option>
                               
                           </select></td>
</tr>
<tr class="tdbg3">


<td align="right">按 时 间：</td><td align="left" colspan="3">
                <link href="<?php echo G_GLOBAL_STYLE; ?>/global/css/date/jscal2.css" type="text/css" rel="stylesheet"> 
                <link href="<?php echo G_GLOBAL_STYLE; ?>/global/css/date/win2k.css" type="text/css" rel="stylesheet">
                <script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/calendar.js" type="text/javascript"></script>
                <script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/en.js" type="text/javascript"></script>
            <INPUT name="time" type="text" id="time" value="<?php echo $time?>"  class="input250" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';">
             <script type="text/javascript">
                Calendar.setup({
                weekNumbers: true,
                inputField : "time",
                trigger    : "time",
                dateFormat: "%Y-%m-%d %H:00",
                showTime: false,
                minuteStep: 1,
                onSelect   : function() {this.hide();}
                });
            </script>&nbsp;

            <INPUT name="time1" type="text" id="time1" value="<?php echo $time1?>"  class="input250" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';">
             <script type="text/javascript">
                Calendar.setup({
                weekNumbers: true,
                inputField : "time1",
                trigger    : "time1",
                dateFormat: "%Y-%m-%d %H:00",
                showTime: false,
                minuteStep: 1,
                onSelect   : function() {this.hide();}
                });
            </script></td>
<td align="right"><button type="submit" class="btn btn-gray ng-binding" ng-bind="searching?'查询中..':'查询'">查询</button></td><td align="left"   colspan="2"></td>
</tr>
</table>
</form>
                       
							
					                      </div>
                    
                </div>
                                <!-- 只有第一次进入显示 -->
                <div style="padding-top:0px;"></div>
                <div class="mpanel">
                <div class="mpanel-heading"> <ul class="heading-tabs"> 
                <li class="tabs-list <?php if($pass=='') {?>  active <?php }?>"> <a class="tab ng-binding"  href="default.php?pass=">全 部( <font color="#ff0000" size="3"><?php echo $totals; ?></font> )</a> </li> 
                
                <li class="tabs-list <?php if($pass=='0') {?>  active <?php }?>"> <a class="tab ng-binding"  href="<?php echo G_MODULE_PATH; ?>/orders/orders_list/?pass=0">待付款( <font color="#ff0000" size="3"><?php echo $total0; ?></font> )</a> </li> 
                
                <li class="tabs-list <?php if($pass=='2') {?>  active <?php }?>"> <a class="tab ng-binding"  href="<?php echo G_MODULE_PATH; ?>/orders/orders_list/?pass=2">待发货(<?php echo $total2; ?>)</a> </li> 
                
                <li class="tabs-list <?php if($pass=='3') {?>  active <?php }?>"> <a class="tab ng-binding"  href="<?php echo G_MODULE_PATH; ?>/orders/orders_list/?pass=3">已发货(<?php echo $total3; ?>)</a> </li> 
                
                <li class="tabs-list <?php if($pass=='4') {?>  active <?php }?>" > <a class="tab ng-binding"  href="<?php echo G_MODULE_PATH; ?>/orders/orders_list/?pass=4">已成功(<?php echo $total4; ?>)</a> </li> 
                
                <li class="tabs-list <?php if($pass=='1') {?>  active <?php }?>" > <a class="tab ng-binding"  href="<?php echo G_MODULE_PATH; ?>/orders/orders_list/?pass=1">已关闭(<?php echo $total1; ?>)</a> </li> </ul> </div></div>
                <!-- 只有第一次进入显示 -->
                <?php foreach($shoplist as $v) {
$c_price = $v['c_price'];	
$pid = explode(",",$v['lm']);
$pname = explode(",",$v['title']);
$pimg = explode(",",$v['img_sl']);
$style = explode(",",$v['style']);
$pprice = explode(",",$v['price']);
$nums = explode(",",$v['num']);
$numcount = count($nums)-1;
$i=0;
$rows = $this->db->GetOne("select * from `@#_member` where `uid` = '$v[email]' limit 1");
			if($rows['mobile']==""){$user = $rows['username'];}else{$user = $rows['mobile'];}
			
	$rowaddr_o = $this->db->GetOne("select * from `order_address` where `order_num` = '$v[order_num]' limit 1");				
					 ?>
             <div class="order-infolist mb20">
        <div class="order-info-hd">
            <span class="order-time"><?php echo date("Y-m-d H:i:s",$v['wtime']) ;?></span>
                            <span class="order-no" _order_no="<?php echo $v['order_num'] ;?>" orderBack="1"><b>订单号：</b><?php echo $v['order_num'] ;?></span>
                            <span class="order-no" _order_no="<?php echo $v['order_num'] ;?>" orderBack="1"><b>买家：</b><?php echo $user;?></span>
                           <span class="pay-timeout" _pay_total_time="1450620372"><span class="fc_black"></span>
                                      </div>
        <dl class="my-order-list">
            <dd>
                                                    <!-- class="last-goods" -->
                        <ul >
                        <li class="oi-goods">
                        <a  class="aimg" target="_blank" href="<?php echo $url; ?>/m/item/?id=<?php echo $pid[0]; ?>">
                                <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $pimg[0]; ?>" width="60px" height="60px"/>
                            </a>
                            <div class="con">
                                
                                    <div class="good-name"><?php echo $pname[0];?></div>
                               
                                <div class="other">
                                    <p>颜色分类：<?php echo $style[0];?></p>                                                                    </div>
                            </div>
                        </li>
                        <li class="oi-price"></li>
                        <!--<li class="oi-price-paid"></li> -->
                        <li class="oi-other">
                                                                                                                                                                                                                               
                                                                                                                        </li>

                                                    <!-- <a>退货/退款</a> <p>售后完成</p> -->
                            <li class="oi-count">
                                <p class="all"><em class="u-yen">¥</em><span><?php echo $c_price;?></span></p>
                                
                                <p style="padding-top:4px;"><?php if( $v['type_o']==1){?><img src="<?php echo G_GLOBAL_STYLE; ?>/global/image/mob.png" width="46" height="16"><?php }?></p>
                                                                                            </li>
                            <li class="oi-status">
                                <p>
                                   <b class="wait-pay"><?php if($v['pass']==0){echo '待付款';}elseif($v['pass']==1){echo '已关闭';}elseif($v['pass']==2){echo '已付款';}elseif($v['pass']==3){echo '已发货';}elseif($v['pass']==4){echo '交易成功';}?></b>
                                </p>
                                <?php if( $v['pass']==3 || $v['pass']==4){?>
                                <p><?php if( $v['gc']==1)echo "韵达快递";?><?php if( $v['gc']==2)echo "圆通快递";?><?php if( $v['gc']==3)echo "中通快递";?><?php if( $rows_o['gc']==4)echo "申通快递";?><?php if( $v['gc']==5)echo "邮政";?></p>
                                
                                <p><?php echo $v['dh'];?></p><?php }?>
                                                            </li>
                            <li class="oi-button">
                            <?php if($v['pass']==2){?> 
                            <p><a class="btn-pay" href="<?php echo G_MODULE_PATH; ?>/orders/orders_detail/?order_no=<?php echo $v['order_num'] ;?>"  target="_blank">发货</a></p>
                              <br />       
                                                                            <?php }else{?>
                                                                            <?php }?>
                                                                            
                            <p><a href="<?php echo G_MODULE_PATH; ?>/orders/orders_detail/?order_no=<?php echo $v['order_num'] ;?>"  target="_blank" style="color:#0C0">订单详情</a></p> 
                                                                           
                                                                                                            
                                                                                                                                                                </li>
                                                    </ul>
                                            <!-- class="last-goods" -->
                                            <?php for($i=1;$i<$numcount;$i++){?>
                        <ul >
                        <li class="oi-goods">
                           <a  class="aimg" target="_blank" href="<?php echo $url; ?>/m/item/?id=<?php echo $pid[0]; ?>">
                                <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $pimg[0]; ?>" width="60px" height="60px"/>
                            </a>
                                
                            
                            <div class="con">
                                
                                    <div class="good-name"><?php echo $pname[$i];?></div>
                                
                                <div class="other">
                                    <p>颜色分类：<?php echo $style[$i];?></p>                                                                    </div>
                            </div>
                        </li>
                        <li class="oi-price"></li>
                        <!--<li class="oi-price-paid"></li> -->
                        <li class="oi-other">
                                                                                                                                                                                                                                <a href="" target="_blank"></a>
                                                                                                                        </li>

                                                    <li class="oi-count"></li>
                            <li class="oi-status"></li>
                            <li class="oi-button"></li>
                                                </ul>
                                                <?php $i++;}?>
                                                <ul>
                                                <li id="oi-address">
收货信息： <?php echo $rowaddr_o['name'];?>，<?php echo $rowaddr_o['mobile'];?>，<?php echo $rowaddr_o['addr'];?> <input type="hidden" class="input" value="<?php echo $rowaddr_o['name'];?>，<?php echo $rowaddr_o['mobile'];?>，<?php echo $rowaddr_o['addr'];?>" /><a href="javascript:;" class="copy-input " id="copys">复制</a>
	<br>
买家备注： <?php echo $rowaddr_o['ps'];?><br>
商家备注： <?php echo $v['ps'] ;?></li>
                                                
                                                </ul>
                                            <!-- class="last-goods" -->
                        
                                                                        </dd>
        </dl>
    </div>
    <br>
    <?php } ?>
    


                <div  align="center" >
                <div id="pages"><ul><li>共 <?php echo $total; ?> 条</li><?php echo $page->show('one','li'); ?></ul></div>
                </div>
            </div>
        </div>
    </div>
    
    
        <!-- /主体 -->
        
           <script type="text/javascript">
$('.item-a').css('background-color', 'red'); 
$(document).ready(function(){
/* 定义所有class为copy标签，点击后可复制被点击对象的文本 */
    $(".copy").zclip({
		path: "<?php echo G_GLOBAL_STYLE; ?>/global/js/copy_js/ZeroClipboard.swf",
		copy: function(){
		return $(this).find(".copys").text();
		},
		beforeCopy:function(){/* 按住鼠标时的操作 */
			$(this).css("color","orange");
		},
		afterCopy:function(){/* 复制成功后的操作 */
			var $copysuc = $("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
			$("body").find(".copy-tips").remove().end().append($copysuc);
			$(".copy-tips").fadeOut(3000);
        }
	});
/* 定义所有class为copy-input标签，点击后可复制class为input的文本 */
	$(".copy-input").zclip({
		path: "<?php echo G_GLOBAL_STYLE; ?>/global/js/copy_js/ZeroClipboard.swf",
		copy: function(){
		return $(this).parent().find(".input").val();
		
		},
		afterCopy:function(){/* 复制成功后的操作 */
			var $copysuc = $("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
			$("body").find(".copy-tips").remove().end().append($copysuc);
			$(".copy-tips").fadeOut(3000);
        }
	});
	
});
</script>
    </body>
</html>