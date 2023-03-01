<?php 

defined('G_IN_ADMIN')or exit('No permission resources.'); 

?>

<!DOCTYPE html>
<html class="kimi-pc">
    <head>
        <title>订单详情</title>
       
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/admin_order.css" type="text/css">
        <link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/pg-kimi.css" type="text/css">
       
        
        <link rel="stylesheet" type="text/css" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/md-shopping.css?ts=<?php echo date("YmdHis"); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/pg-order.css?ts=<?php echo date("YmdHis"); ?>" />
        
        <script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">


function CheckForm(){
	var dh = ($("#dh").val());
		if(dh ==""){
			alert('快递单号不能为空');
			
			return false;
		}	
		
}


</SCRIPT>

       
    </head>
    <body>
        
          
           
        
        <!-- 主体 -->
        
    <div class="main pr mt20 clear">
        <div class="place-show clear">
    <div class="place-explain">
        <a href="<?php echo $url; ?>"><?php echo $rowSeo['name'] ?>折扣</a>&gt;
        <a href="javascript:;">会员订单</a>&gt;
        
        <span>订单号：<?php echo $rowaddr_o['order_num'];?></span>
    </div>
</div>
        <div class="confirm-order">
            <div class="deal-info order-state clear">
                <div class="tips clear">
					<b class="gray_6">支付单号：</b><span class="blue_2"><?php echo $rowaddr_o['order_num'];?></span>
					<b class="gray_6 ml50">订单状态：</b><span class="state"><?php if($row_o['pass']==0){echo '待付款';}elseif($row_o['pass']==1){echo '已关闭';}elseif($row_o['pass']==2){echo '已付款';}elseif($row_o['pass']==3){echo '已发货';}elseif($row_o['pass']==4){echo '交易成功';}?></span>
				</div>
                
            </div>
            <?php if($row_o['pass']==2){?> 
            <div class="deal-info order-state order-type clear">
            <h2>发货信息</h2>
                <div class="deal-pay"><form action="<?php echo G_MODULE_PATH; ?>/orders/orders_fh/" name="payOrder" id="payFormNew" method="post" onSubmit="return CheckForm()" >
                    <div class="pay-type fl">
                        <div class="order-payment fl">
					        <div class="pay-method">
                            
					            <ul>
                                                                            <li>
                                           <label class="fl">快递公司：</label>
                                               
                                                <select  name="gc" id="gc" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';">
                               <option value="1"  selected = "selected" data-msg="韵达快递">韵达快递</option>
                               <option value="2"  data-msg="圆通快递">圆通快递</option>
                               <option value="3"  data-msg="中通快递">中通快递</option>
                               <option value="4"  data-msg="申通快递">申通快递</option>
                               <option value="5"  data-msg="邮政">邮政</option>
                           </select>
                                                
                                            
                                            <span class="fl" style="color:#f36; line-height: 42px;margin-left: 5px"></span>
                                        </li>
                                        
                                        <li>
                                           
                                                <label class="fl">快递单号：</label>
                                            <INPUT name="dh" type="text" id="dh"   class="input250" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';">
                                            <span class="fl" style="color:#f36; line-height: 42px;margin-left: 5px"></span>
                                        </li>
                                                <li><input type="submit" class="go_pay fr" id="payOrder" style="border:0px; cursor:pointer" value="发 货"></li>                            
                                    					            </ul>
					        </div>
					    </div>
                    </div>
                   <!-- <a href="javascript:;" class="go_pay fr" id="payOrder">发货</a> -->
                        
                            
                            <input type="hidden" name="order_no" value="<?php echo $row_o['order_num'] ;?>">
                            <input type="hidden" name="token" value="dd725a56350bfb8d12d8dd590bac2dcd">
                            <input type="hidden" name="pstype" value="fh">

                        
                    </form>
                </div>
            </div>
            <?php }?>
            <div class="order-infor clear">
                <h2>订单信息</h2>
                <p class="address-infor">
                    <label>收货地址：</label><?php echo $rowaddr_o['name'];?>，<?php echo $rowaddr_o['mobile'];?>，<?php echo $rowaddr_o['addr'];?><br>
                    <label>下单时间：</label><?php echo date("Y-m-d H:i:s",$row_o['wtime']) ;?><br>
                    <label>支付方式：</label><span class="cg_pay_type"><?php if($row_o['paytype']==5){?>支付宝支付 <?php }else{?>微信支付<?php }?></span><br>
                    <!--<label>用券信息：</label>未使用优惠券   -->
                </p>
            </div>
            <div class="order-infor clear">
                <h2>备注信息</h2>
                <p class="address-infor">
                <form action="<?php echo G_MODULE_PATH; ?>/orders/orders_fh/" name="payOrder" id="payFormNew" method="post">
                    <label>客户备注：</label><span style="color:red"><?php echo $rowaddr_o['ps'];?></span><br><br>
                    <label>商家备注：</label><INPUT name="ps" type="text" id="ps" value="<?php echo $row_o['ps'] ;?>"  class="input450" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';"> <button type="submit" class="btn btn-gray ng-binding" >保 存</button>
                    <input type="hidden" name="order_no" value="<?php echo $row_o['order_num'] ;?>">
                    <input type="hidden" name="pstype" value="ps">
                </form>
                    
                </p>
            </div>
            <?php if($row_o['pass']==3 || $row_o['pass']==4){?> 
            <!--订单跟踪-->
            <a name="logistics"></a>
<div class="order-infor logistics-info clear">
    <h2>订单跟踪</h2>
    <p class="address-infor">
    <?php if($row_o['pass']==4){?> 
            <label>发货时间：</label><?php echo date("Y-m-d H:i:s",$row_o['ftime']) ;?><br>
            <label>物流公司：</label><span class="blue_2"><?php if( $row_o['gc']==1)echo "韵达快递";?><?php if( $row_o['gc']==2)echo "圆通快递";?><?php if( $row_o['gc']==3)echo "中通快递";?><?php if( $row_o['gc']==4)echo "申通快递";?><?php if( $row_o['gc']==5)echo "邮政";?></span><br>
            <label>快递单号：</label><?php echo $row_o['dh'];?><br>
            <?php }else{?>
            <form action="<?php echo G_MODULE_PATH; ?>/orders/orders_fh/" name="payOrder" id="payFormNew" method="post">
            <label>发货时间：</label><?php echo date("Y-m-d H:i:s",$row_o['ftime']) ;?><br><br>
            
            <label>物流公司：</label><select  name="gc" id="gc" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';">
                               <option value="1" <?php if( $row_o['gc']==1){?> selected = "selected" <?php }?> data-msg="韵达快递">韵达快递</option>
                               <option value="2" <?php if( $row_o['gc']==2){?> selected = "selected" <?php }?> data-msg="圆通快递">圆通快递</option>
                               <option value="3" <?php if( $row_o['gc']==3){?> selected = "selected" <?php }?> data-msg="中通快递">中通快递</option>
                               <option value="4" <?php if( $row_o['gc']==4){?> selected = "selected" <?php }?> data-msg="申通快递">申通快递</option>
                               <option value="5" <?php if( $row_o['gc']==5){?> selected = "selected" <?php }?> data-msg="邮政">邮政</option>
                           </select>
                           &nbsp;
                           
            <label>快递单号：</label><INPUT name="dh" type="text" id="dh"  value="<?php echo $row_o['dh'];?>"  class="input250" onfocus="style.border='1px solid red ';" onblur="style.border='1px solid #c6c6c6';">
            <button type="submit" class="btn btn-gray ng-binding" >保 存</button>
                    <input type="hidden" name="order_no" value="<?php echo $row_o['order_num'] ;?>">
                    <input type="hidden" name="pstype" value="dh">
                </form><br>
            <?php }?>
                    </p>
            <div class="wl-data"><label>订单跟踪：</label>
            <div class="wl-result">
                <ul>
                                                                        <li class="special"><span class="wl-text"><a href="https://www.baidu.com/s?wd=<?php if( $row_o['gc']==1)echo "韵达快递";?><?php if( $row_o['gc']==2)echo "圆通快递";?><?php if( $row_o['gc']==3)echo "中通快递";?><?php if( $row_o['gc']==4)echo "申通快递";?><?php if( $row_o['gc']==5)echo "邮政";?> <?php echo $row_o['dh'];?>" target="_blank" class="wl-time"><span class="wl-text">快速查询</span></a></span></li>
                                                                                                    
                                                            </ul>
            </div>
        </div>
    </div> <?php }?>
    <!--订单信息-->
            <div class="order-goods">
                <h2><span class="fl">订单信息</span></h2>
		        <div class="orders order-other clear">
			    <div class="orders-hd">
			        <ul>
			            <li class="product-item"><span>共（<em><?php echo $numcount; ?></em>）件商品</span></li>
			            <li class="quantity-item"><span class="text">单价</span></li>
			            <li class="subtotal-item"><span class="text">数量</span></li>
			            <li class="discount-item"><span class="text">优惠</span></li>
			            <li class="actions-item"><span class="text">小计</span></li>
			            <li class="price-item"><span class="text">运费</span></li>
			        </ul>
			    </div>
                
				                                <div class="order-list">
	                <div class="table-box">
	                    <span class="name">店铺：</span>
	                    <span><?php echo $rowSeo['name'] ?></span>
	                </div>
	                <div class="orders-bd">
						<table class="tbl-main">
							<tbody>
                            
                            <?php 

$c_price = $rows_o['c_price'];	
$pid = explode(",",$rows_o['lm']);
$pname = explode(",",$rows_o['title']);
$pimg = explode(",",$rows_o['img_sl']);
$style = explode(",",$rows_o['style']);
$pprice = explode(",",$rows_o['price']);
$nums = explode(",",$rows_o['num']);
$numcount = count($nums)-1;
for($i=0;$i<$numcount;$i++){
							?>
																<tr ispost="1">
									<td class="product-item" data-skuid="59904">
										<div class="pic">
										   <a href="<?php echo $url; ?>/m/item/?id=<?php echo $pid[$i]; ?>" target="_blank">
										   <img style="display: inline;" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $pimg[$i]; ?>">
										   </a>
										</div>
										<div class="detail">
										<div class="title"><a href="<?php echo $url; ?>/m/item/?id=<?php echo $pid[$i]; ?>" target="_blank"><?php echo $pname[$i];?></a></div>
										<div class="other">
										<!--<p>尺码：36</p> -->										<p>颜色分类：<?php echo $style[$i];?></p>										</div>
										</div>
									</td>
									
									<td class="quantity-item cell-center"><p class="price"><em class="u-yen">¥</em><span><?php echo $pprice[$i];?></span></p></td>
									<td class="subtotal-item cell-center"><p class="number"><?php echo $nums[$i];?></p></td>
									<td class="discount-item cell-center"><p>-<em class="u-yen">¥</em><span>0.00</span></p></td>
									<td class="actions-item cell-center"><p class="count"><em class="u-yen">¥</em><span><?php echo $pprice[$i]*$nums[$i] ?></span></p></td>
									<td class="price-item cell-center">
										<p><em class="u-yen">¥</em><span>0.00</span></p>
									</td>
								</tr><?php }?>
																
															</tbody>
							<tfoot>
								<tr>
									<td class="bgc" colspan="3">
										<div class="message">
											<label class="hd">留言：</label>
																							<?php echo $rowaddr_o['ps'];?>
																					</div>
									</td>
								</tr>
							</tfoot>
						</table>
	                </div>
	            </div>
	            	            			</div>
		</div>
		<div class="orders-pay-fixed normal">
			<div class="orders-total-pay">
				<div class="other fr">
					<p class="all">商品金额<span><em class="u-yen">¥</em><?php echo $shop_price =  $row_o['act_yh']+$row_o['m_yh']+$row_o['k_yh']+$row_o['c_price']; ?></span></p>
					<p class="all">合计运费<span><em class="u-yen">¥</em>0.00</span></p>
					<p class="all">活动优惠<span>-<em class="u-yen">¥</em><?php echo $row_o['act_yh']; ?></span></p>
					<p class="all">满减优惠<span>-<em class="u-yen">¥</em><?php echo $row_o['m_yh']; ?></span></p>
                    <p class="all">优惠券抵扣<span>-<em class="u-yen">¥</em><?php echo $row_o['k_yh']; ?></span></p>
					<p class="count">共计<span><i>￥</i><?php echo $shop_price =  $row_o['c_price']; ?></span></p>
				</div>
			</div>
		</div>
        
        
   </div>
    <div id="timeInfo" style="display: none"><span>1450105255</span><span>1450106686</span></div>
</div>
    <div id="alert_pay_weixin">
<div class="content">
<span class="alert_close"></span>
<div class="content-tit">
    <img src="/images/shopping/content-topbg.png">
    <p id="wx_title_normal">请使用微信扫描二维码以完成支付</p>
    <p id="wx_title_count">请在 <span class="org_1"><i id="countm">00</i>分<i id="counts">00</i>秒</span>内使用微信扫描二维码以完成支付</p>
</div>
<div class="content-lr">
<div class="code"></div>
<div class="price">
    ￥<span class="pricenum aril"><label>98.00</label></span>
</div>
<div class="content-bot">
    <div class="tipsbg">
        <img src="/images/payment/tips.gif?"></div>
    <div class="order-mes">
        <p >支付单号：<span id="traceOrder"></span></p>
        <p class="clear">
            <span class="fl">创建时间：<span id="createTime"></span></span>
            <span class="fr tell">客服：</span>
        </p>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">

function createQrCode(code_url) {
    $(".code").html('');
    $(".code").qrcode({
        render : "table",
        text   : code_url,
        width  : 272,
        height : 270
    });
}

function callSync(out_trade_no,total_fee,code_url,expire_time,checkUrl){
    if($("#alert_pay_weixin").is(":visible")){
        setTimeout(function() {
            $.ajax({
                url: '/pay/pc_wxpay',
                type: 'post',
                data: {
                    'out_trade_no': out_trade_no,
                    'total_fee': total_fee,
                    'code_url': code_url,
                    'time_expire': expire_time,
                    'ajax_req': '1'
                },
                success: function(ret) {
                    if ( ret.status == 1 ||  ret.status == 2) {
                        window.location.href = checkUrl;
                    }else{
                        callSync(out_trade_no,total_fee,code_url,expire_time,checkUrl);
                    }
                }
            });
        }, 5000);
    }
}
$('.alert_close').on('click', function () {
    $('#alert_pay_weixin').hide();
    $('.alert_fullbg').hide();
});
</script>

        <!-- /主体 -->
        
            <!-- 页脚 -->

            <!-- /页脚 -->
        
        <!-- 脚本 -->
         
    

        <!-- /脚本 -->
        <br/>
    </body>
</html>