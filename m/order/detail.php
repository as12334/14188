<?php 
session_start();

$uid  = $_COOKIE['wuid'];	
require"../../conn.php";
if (isset($_COOKIE['wuid'])!=1){
		msg('','location="'.$url.'/?/mobile/user/login"');
	}
	
isset($_GET['pass'])?$pass=$_GET['pass']:$pass='';
$order_num = isset($_GET['order_no'])?html($_GET['order_no']):'';

	$sql_o='select * from `'.$tablepre.'orders` where `order_num`="'.$order_num.'" and `email`="'.$uid.'"';
$result_o=$db->query($sql_o);
$row_o=$db->getrow($result_o);
if (!$row_o){
		msg('','location="/m/"');
	}
$nums = explode(",",$row_o['num']);
$numcount = count($nums)-1;
$sqladdr_o='select * from `'.$tablepre.'order_address` where `order_num`="'.$order_num.'"';
$resultaddr_o=$db->query($sqladdr_o);
$rowaddr_o=$db->getrow($resultaddr_o);



$sqlju='select * from `'.$tablepre.'go_pay` where  pay_class="jubaopay"';
$resultju=$db->query($sqlju);
$payju=$db->getrow($resultju);
$payarry = explode('"',$payju['pay_key']);
$app_id = $payarry[9];

$partnerid = $app_id;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link href="//<?php echo $yumin; ?>" rel="dns-prefetch">
      
        <title>我的订单-<?php echo $rowSeo['name'] ?>网</title>
        <meta content="我的订单,<?php echo $rowSeo['name'] ?>网" name="keywords">
        <meta content="" name="description">
        <meta content="" name="robots">
        <script type="text/javascript" src="<?php echo $url; ?>/m/js/Images.js?ts=<?php echo date("YmdHis"); ?>"></script>
        <!-- head css -->
        
        <link href="<?php echo $url; ?>/m/css/cart.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />

        <!-- head js  库文件js-->
        <script type="text/javascript" src="<?php echo $url; ?>/m/js/js.min.js"></script>
        <SCRIPT language="JavaScript" type="text/JavaScript">

$(function(){
$(".type li").click(function(){
		var id=$(".type li").index(this);
		var order = $(this).attr("data-pay-type");
		$(".type li").removeClass().eq(id).addClass("active");
		$("#pay_type").val(order);
		});
		
		})
</SCRIPT>
        <script type="text/javascript">
            var versionNumber="ts=08d33f1faffefc63_1452739628";
        </script>
        <!-- H5 -->
    </head>
    <body>
        <!-- 主体 -->
        
    <div class="main">
        <div class="app">
				        <header class="head" id="head">
		        <div class="fixtop">
			        <span id="t-find" class="classify"><a href="<?php echo $url; ?>/m/order" class="btn btn-left  btn-back"></a></span>
			        <span id="t-index">订单详情</span>
			        <span id="t-user"><a href="<?php echo $url; ?>/m" id="item-good-home">
                        <img src="<?php echo $url; ?>/m/images/icon/back-home.png" width="35" style="vertical-align:middle">
                    </a>
                    			        </span>
		        </div>
	        </header>
            	        <ul class="action-list action-bag">
                <li>
                  <div class="fl">
	                  <p class="special">订单状态：<span class="state"><?php if($row_o['pass']==0){echo '待付款';}elseif($row_o['pass']==1){echo '已关闭（超时未支付，欢迎再次购买。）';}elseif($row_o['pass']==2){echo '已付款';}elseif($row_o['pass']==3){echo '已发货';}elseif($row_o['pass']==4){echo '交易成功';}?></a></span></p>
	                  <p class="normal">下单时间：<?php echo date("Y-m-d H:i:s",$row_o['wtime']) ;?></p>
	                  <p class="normal">支付方式：<?php if($row_o['paytype']==5){ echo "支付宝支付"; }else{echo "微信支付";}?></p>
	                  <p class="normal">订单编号：<?php echo $rowaddr_o['order_num'];?></p>
                  </div>
                </li>
	         </ul>
             <!--支付选项卡开始-->
          
            <div class="pay-type">
                <p>支付方式</p>
                <ul class="type" id="pay-type-list">
                            <li data-pay-type="12"  class="active" >
                                <img src="<?php echo $url; ?>/m/images/shopping/icon_wx.png">
                                <span>聚宝支付</span><span style="color:#666; font-size:12px;">(仅支持微信6.0.2及以上版本)</span>
                                <i class="pay-type-radio"></i>
                            </li>
                                                  
                                    </ul>
                <input type="hidden" name="pay_type" value="12" />
            </div>
          
            <!--支付选项卡结束-->
            
	            <ul class="action-list action-bag">
	                <li>
	                  <div class="fl">
		                  <p class="name"><?php echo $rowaddr_o['name'];?></p>
		                  <p class="phone"><?php echo $rowaddr_o['mobile'];?></p>
		                  <p class="address"><?php echo $rowaddr_o['addr'];?></p>
	                  </div>
	                </li>
	            </ul>
            	 <?php if($row_o['pass']==3 || $row_o['pass']==4){?> 
            <!--订单跟踪-->
            <ul class="action-list action-bag">
	                <li>
	                  <div class="fl">
		                  <p class="name"><label>发货时间：</label><?php echo date("Y-m-d H:i:s",$row_o['ftime']) ;?></p>
		                  <p class="phone"><label>物流公司：</label><span class="blue_2"><?php if( $row_o['gc']==1)echo "韵达快递";?><?php if( $row_o['gc']==2)echo "圆通快递";?><?php if( $row_o['gc']==3)echo "中通快递";?><?php if( $row_o['gc']==4)echo "申通快递";?><?php if( $row_o['gc']==5)echo "邮政";?></span></p>
		                  <p class="address"><label>快递单号：</label><?php echo $row_o['dh'];?></p>
	                  </div>
	                </li>
	            </ul>
				<?php }?>                           
                <div class="order-detail">
                                        <p class="seller"><img src="<?php echo $url; ?>/m/images/shopping/seller-icon.png"><span><?php echo $rowSeo['name'] ?></span></p>
                    <ul class="bag-list">
                        <li>
                        <?php 
$sqls_o='select * from `'.$tablepre.'orders` where `order_num`="'.$order_num.'"';
$results_o=$db->query($sqls_o);
$rows_o=$db->getrow($results_o);
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
                                                        <a class="box clear"
                                                              href="<?php echo $url; ?>/m/shop/?id=<?php echo $pid[$i]; ?>"
                                                                   >
                                <div class="pic fl"><img src="<?php echo $url; ?>statics/uploads/<?php echo $pimg[$i]; ?>"></div>
                                <div class="detail fl">
                                    <p class="title"><?php echo $pname[$i];?></p>
                                    <p class="type">
                                                                            颜色分类：<?php echo $style[$i];?>                                                                                                                    <div class="price"><span class="current">￥<?php echo $pprice[$i];?></span></div>
                                </div>
                                <div class="other"><span class="n">×<?php echo $nums[$i];?></span></div>
                            </a>
                            <?php }?>
                                                        
                                                                                </li>
                    </ul>
                                    </div>
                <div class="order_total">
                    <div class="total_info clear">
                        <span class="sp1">商品总额</span>
                        <span class="sp2">￥<?php echo $shop_price =  $row_o['act_yh']+$row_o['m_yh']+$row_o['k_yh']+$row_o['c_price']; ?></span>
                    </div>
                    <div class="ord_line"></div>
                    <div class="total_info clear">
                        <span class="sp1">满减优惠</span>
                    <span class="sp2">
                                                    -￥<?php echo $row_o['m_yh']; ?>
                                            </span>
                    </div>
                    <div class="ord_line"></div>
                    <div class="total_info clear">
                        <span class="sp1">活动优惠</span>
                    <span class="sp2">
                                                    -￥<?php echo $row_o['act_yh']; ?>
                                            </span>
                    </div>
                    <div class="ord_line"></div>
                    <div class="total_info clear">
                        <span class="sp1">优惠券抵扣</span>
                        <span class="sp2">
                                                            -￥<?php echo $row_o['k_yh']; ?>
                                                    </span>
                    </div>
                    <div class="ord_line"></div>
                    <div class="total_info clear">
                        <span class="sp1">实付款</span>
                        <span class="sp2 org">￥<?php echo $shop_price =  $row_o['c_price']; ?></span>
                    </div>
                </div>
                <?php if($row_o['pass']==0){?> 
                <div class="wx_pay">
                                                    <a href="del_can.php?reason=1&order_no=<?php echo $rows_o['order_num']?>&act=can" class="score go">取消订单</a>
                                            </div>
											<?php }?>
                                            <?php if($row_o['pass']==1 || $row_o['pass']==4){?> 
                <div class="wx_pay remove_ord">
                    <a href="del_can.php?reason=1&order_no=<?php echo $rows_o['order_num']?>&act=del" id="delete_order">删除订单</a>
                </div>
											<?php }?>
                                                                                
                <br>
                <?php if($row_o['pass']==0){ ?>
            <div class="bag-total">
                    <div class="bag-money fl">
                        <p class="count other">实付款：<span class="p">￥<?php echo $shop_price =  $row_o['c_price']; ?></span><span class="t"></span></p>
                    </div>
                                            <a class="go_pay fr" _payentrance="1" href="../jupay/wapDemoPost.php?order_num=<?php echo $order_num ?>&pprice=<?php echo $shop_price =  $row_o['c_price']; ?>&partnerid=<?php echo $partnerid ?>&pname=<?php echo $rowSeo['name'] ?>" >去付款</a>
                </div>
            <?php }?>
                	                               
                                              <?php require_once('../bottom.php');?>



                <div class="alert_fullbg" style="display: none; z-index: 201;"></div>
	            <div id="bag-alert" style="display:none;" class="normal-alert delete_order_alert">
			      <div class="box">
			          <p class="txt">确定要删除该笔订单吗？</p>
		             <div class="btn-all"><a class="btn01 fl cancel_delete" href="javascript:;">取消</a><a class="btn02 fr order_delete"   href="javascript:;">确定</a></div>
			      </div>
			    </div>
			    <div class="normal-alert confirm_order_alert" style="display:none;" id="bag-alert">
			      <div class="box">
			        <p class="txt">确认收货后，款项将打给卖家， 
			         <br>请确保你已收到货，以免造成损失。</p>
			          <div class="btn-all"><a href="javascript:;" class="btn01 fl cancel">取消</a><a href="javascript:;" class="btn02 fr confirm_order">确定</a></div>
			      </div>
			    </div>
        </div>
       
    </div>

       


    </body>
</html>