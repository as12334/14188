<?php 
session_start();

require"../../conn.php";
isset($_GET['pass'])?$pass=$_GET['pass']:$pass='';
if (isset($_COOKIE['wuid'])!=1){
		msg('','location="'.$url.'/?/mobile/user/login"');
	}
	$uid  = $_COOKIE['wuid'];
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
        <link href="<?php echo $url; ?>/m/css/style.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/m/css/cart.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />

        <!-- head js  库文件js-->
        <script type="text/javascript" src="<?php echo $url; ?>/m/js/kimi.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
        
        <script type="text/javascript">
            var versionNumber="ts=08d33f1faffefc63_1452531046";
        </script>
        <!-- H5 -->
    </head>
    <body>
        <!-- 主体 -->
     <!-- 废弃了 -->
 <style>
 	#top_weixin{
 		width: 100%; z-index: 9999; position:fixed;top:0;display: none; background:#e4e4e4;
 	}
 	#open_d{
		height: 36px;  z-index: 99999; width: 100%; margin: 0 auto; position: relative; max-width: 476px; min-width: 320px; line-height: 36px; font-size: 14px; font-family: '微软雅黑';background: #e4e4e4;border: 1px solid rgba(255,56,56,1);margin: 1px auto;color:rgba(255,56,56,1);
 	}
 	#xq_a{
 		z-index: 99999;  margin: 0 auto; position: relative;max-width: 480px; min-width: 320px;display:none;
 	}
 </style>

 <?php 

$sqlcount='select COUNT(*) from `'.$tablepre.'orders` where `email`="'.$uid.'" ';
$counter=$db->getqueryallrow($sqlcount);
$sqls_o='select * from `'.$tablepre.'orders` where `email`="'.$uid.'" order by id desc';
$p=new page();
$p->setpage($counter,2);
$sqls_o.=$p->getlimit();
$results_o=$db->query($sqls_o);

$sqlcount0='select COUNT(*) from `'.$tablepre.'orders` where `pass`="0" and `email`="'.$uid.'"';
$counter0=$db->getqueryallrow($sqlcount0);
$sqls_o0='select * from `'.$tablepre.'orders` where `pass`="0" and `email`="'.$uid.'" order by id desc';
$p0=new page();
$p0->setpage($counter0,2);
$sqls_o0.=$p0->getlimit();
$results_o0=$db->query($sqls_o0);

$sqlcount1='select COUNT(*) from `'.$tablepre.'orders` where `pass`="1" and `email`="'.$uid.'"';
$counter1=$db->getqueryallrow($sqlcount1);
$sqls_o1='select * from `'.$tablepre.'orders` where `pass`="1" and `email`="'.$uid.'" order by id desc';
$p1=new page();
$p1->setpage($counter1,2);
$sqls_o1.=$p1->getlimit();
$results_o1=$db->query($sqls_o1);

$sqlcount2='select COUNT(*) from `'.$tablepre.'orders` where `pass`="2" and `email`="'.$uid.'"';
$counter2=$db->getqueryallrow($sqlcount2);
$sqls_o2='select * from `'.$tablepre.'orders` where `pass`="2" and `email`="'.$uid.'" order by id desc';
$p2=new page();
$p2->setpage($counter2,2);
$sqls_o2.=$p2->getlimit();
$results_o2=$db->query($sqls_o2);

$sqlcount3='select COUNT(*) from `'.$tablepre.'orders` where `pass`="3" and `email`="'.$uid.'"';
$counter3=$db->getqueryallrow($sqlcount3);
$sqls_o3='select * from `'.$tablepre.'orders` where `pass`="3" and `email`="'.$uid.'" order by id desc';
$p3=new page();
$p3->setpage($counter3,2);
$sqls_o3.=$p3->getlimit();
$results_o3=$db->query($sqls_o3);

$sqlcount4='select COUNT(*) from `'.$tablepre.'orders` where `pass`="4" and `email`="'.$uid.'"';
$counter4=$db->getqueryallrow($sqlcount4);
$sqls_o4='select * from `'.$tablepre.'orders` where `pass`="4" and `email`="'.$uid.'" order by id desc';
$p4=new page();
$p4->setpage($counter4,2);
$sqls_o4.=$p4->getlimit();
$results_o4=$db->query($sqls_o4);
?>
    <div class="main">
        <div class="app">
             <header id="head" class="head">
                <div class="fixtop">
                    <span id="t-find"><a class="btn btn-left btn-back" href="<?php echo $url; ?>/m/user"></a></span>
                    <span id="t-index">全部订单</span>
                    <span id="t-user"><a href="<?php echo $url; ?>/m" id="item-good-home">
                        <img src="<?php echo $url; ?>/m/images/icon/back-home.png" width="35" style="vertical-align:middle">
                    </a></span>
                </div>
            </header>
                            
                                              <div class="nav_box">
        <nav class="nav" id="nav">
            <ul class="">
            <li><a <?php if( $pass==""){ ?> class="active" <?php }?> href="<?php echo $url; ?>/m/order/?pass="><br><span>全 部<?php 
		if (isset($counter)&&$counter){
		$pra='';
		echo $p->getpagemenu($pra,5,'首页','上一页','下一页','尾页');
		
		}else{ echo "0";}
		?></span><em class="line"></em></a></li>
            <li><a <?php if( $pass=="0"){ ?> class="active" <?php }?> href="<?php echo $url; ?>/m/order/?pass=0"><br><span>待付款<?php 
		if (isset($counter0)&&$counter0){
		$pra='';
		echo $p0->getpagemenu($pra,5,'首页','上一页','下一页','尾页');
		
		}else{ echo "0";}
		?></span><em class="line"></em></a></li>
            <li><a <?php if( $pass=="3"){ ?> class="active" <?php }?> href="<?php echo $url; ?>/m/order/?pass=3"><br><span>已发货<?php 
		if (isset($counter3)&&$counter3){
		$pra='';
		echo $p3->getpagemenu($pra,5,'首页','上一页','下一页','尾页');
		
		}else{ echo "0";}
		?></span><em class="line"></em></a></li>
            <li class="_border"><a <?php if( $pass=="4"){ ?> class="active" <?php }else{?>  <?php }?>  href="<?php echo $url; ?>/m/order/?pass=4"><br><span>已成功<?php 
		if (isset($counter4)&&$counter4){
		$pra='';
		echo $p4->getpagemenu($pra,5,'首页','上一页','下一页','尾页');
		
		}else{ echo "0";}
		?></span><em class="line"></em></a></li> 
            </ul>
        </nav>
    </div><!--<div class="time-box" id="time-order-box"></div> -->
                <script>
    var wap_type = getCookie('wap_type');
    if(wap_type!='' || wap_type != null){
        var wap_type_int = parseInt(wap_type);
        switch(wap_type_int){
            case 1:
            case 2:
                $(".go-app").hide();
                break;
        }
    }
</script>
                                    <div id="orderlist"  page="1" ordertype="" orderperiod="1" hasnext="1" style="min-height:480px;">
<?php 
$sq='';

if ($pass!=''){
	$sq.=' and pass="'.$pass.'"';
}
$sqls_o='select * from `'.$tablepre.'orders` where email="'.$uid.'" '.$sq.' order by id desc';
$results_o=$db->query($sqls_o);
while($rows_o=$db->getrow($results_o)){
$c_price = $rows_o['c_price'];	
$pid = explode(",",$rows_o['lm']);
$pname = explode(",",$rows_o['title']);
$pimg = explode(",",$rows_o['img_sl']);
$style = explode(",",$rows_o['style']);
$pprice = explode(",",$rows_o['price']);
$nums = explode(",",$rows_o['num']);
$numcount = count($nums)-1;
?>  
                <div class="order-detail my-order" _payentrance="1">
        <a href="<?php echo $url; ?>/m/order/detail.php?order_no=<?php echo $rows_o['order_num']?>" >
		            <div class="order-state clear"><span class="state fr"><?php if($rows_o['pass']==0){echo '待付款';}elseif($rows_o['pass']==1){echo '已关闭';}elseif($rows_o['pass']==2){echo '已付款';}elseif($rows_o['pass']==3){echo '已发货';}elseif($rows_o['pass']==4){echo '交易成功';}?></span><span class="time fl"><?php echo date("Y-m-d H:i:s",$rows_o['wtime']) ;?></span></div>
        </a>
        <ul class="bag-list"><?php for($i=0;$i<$numcount;$i++){?>
                                                                                <li >
                    <a class="box clear" href="<?php echo $url; ?>/m/order/detail.php?order_no=<?php echo $rows_o['order_num']?>"><div class="pic fl"><img src="<?php echo $url; ?>statics/uploads/<?php echo $pimg[$i]; ?>"></div>
                        <div class="detail fl"><p class="title"><?php echo $pname[$i];?></p>
                            <p class="type">颜色分类：<?php echo $style[$i];?></p>
                            <div class="price"><span class="current">￥<?php echo $pprice[$i];?></span></div>
                        </div>
                        <div class="other"><span class="n">×<?php echo $nums[$i];?></span></div>
                    </a>
                    </li> <?php }?>
                                    </ul>
                <a href="<?php echo $url; ?>/m/order/detail.php?order_no=<?php echo $rows_o['order_num']?>" >
            <div class="pay-detail">
                <span class="pay-all fl">实付款：<em>￥<?php echo $c_price;?></em></span>
                                                				            </div>
        </a>
    </div>
    <?php }?>
    
            </div>
             <div class="more" id="page-loading" style="display: none;"><span>正在努力加载中<img style="height: 5px;" src="<?php echo $url; ?>/m/images/icon/goods_loading.gif"></span></div>
             <div class="more" id="page-no-next" style="display: none;"><span>亲，已经到底了</span></div>
                         <?php require_once('../bottom.php');?>



             <div class="alert_fullbg" style="display: none; z-index: 201;"></div>
              <div class="normal-alert confirm_order_alert" style="display:none;" id="bag-alert">
                  <div class="box">
                    <p class="txt">确认收货后，款项将打给卖家， 
                     <br>请确保你已收到货，以免造成损失。</p>
                     <input type="hidden"  name="order_no" value="" />
                     <div class="btn-all"><a href="javascript:;" class="btn01 fl cancel">取消</a><a href="javascript:;" class="btn02 fr confirm_order">确定</a></div>
                  </div>
                </div>
                <div style="display:none;" class="temai_tips" >
                 <div class="temai_box">
                     <p class="txt" id="qiang">支付系统正在维护中，预计8点维护完成。<br /><br />对您带来不便深表歉意</p>
                     <div class="temai_btn">
                         <a  href="javascript:;">确定</a>
                     </div>
                 </div>
             </div>
        </div>
        <div>
            
        </div>
    </div>
    

        <!-- 业务js -->
        

    <script type="text/javascript">
       use('order');
    </script>

        <!-- 微信分享配置 -->
        
    
<script type="text/javascript">
    var weixin_cfg={
        // appId:"wx645fc030441e3451"||'',
        // timestamp:"1452612735"||'',
        // nonceStr:"8ytg1ST4I4x6ObVz"||'',
        // signature:"8701b436db49903bf7c3b94524b33df0e538086b"||''
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: "wx645fc030441e3451", // 必填，公众号的唯一标识
        timestamp: "1452612735", // 必填，生成签名的时间戳
        nonceStr: "8ytg1ST4I4x6ObVz", // 必填，生成签名的随机串
        signature: "8701b436db49903bf7c3b94524b33df0e538086b",// 必填，签名，见附录1
        jsApiList: ['onMenuShareAppMessage','onMenuShareQQ','onMenuShareTimeline','hideOptionMenu','chooseWXPay','showMenuItems'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    };

    //app分享
    var shareUrl = self.location.href + "?qmshareview=1";
    var shareTitle = "";
    var shareContent = "";
    var shareImgUrl = "?ts=08d33f1faffefc63_1452531046";

</script>
<script src="<?php echo $url; ?>/m/js/js.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script type="text/javascript" src="<?php echo $url; ?>/m/js/common.js?ts=<?php echo date("YmdHis"); ?>"></script>
        
       
    </body>
</html>