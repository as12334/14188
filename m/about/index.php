<?php session_start();require"../../conn.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link href="<?php echo $url; ?>/m/css/style.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/m/css/bag.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
        <title><?php echo $rowSeo['title'] ?></title>
        <meta content="<?php echo $rowSeo['keys'] ?>" name="keywords">
        <meta content="<?php echo $rowSeo['description'] ?>" name="description">
<script src="<?php echo $url; ?>/m/js/js.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script src="<?php echo $url; ?>/m/js/underscore.js?ts=<?php echo date("YmdHis"); ?>"></script>

    <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>/m/css/md-other.css?ts=<?php echo date("YmdHis"); ?>" />

</head>
<body>
    
  
    <!-- 主体 -->


    <div class="main">
        <!-- 页头 -->
                    <?php require"../top.php";?>
                <!-- /页头 -->
        <div class="app">
            <div class="view current" id="seach-page">
                <div id="p-head">
                    <div class="fixtop" style="z-index:1;">
                        <span id="classify" class="classify"><a href="javascript:;" class="btn btn-left btn-type"></a></span>
                        <span id="p-index">关于我们</span>
                        <span id="p-user"></span>
                    </div>
                </div>
            </div>
            <div class="about_us">
               <!-- <h1 class="logo"><img width="29%" src="<?php echo $url; ?>/m/images/about/juan04_logo.png?ts=<?php echo date("YmdHis"); ?>"></h1> -->
                <ul class="about-box_v04">
                    <li>
                        <span class="juan04_title">上<?php echo $rowSeo['name'] ?>·购便宜</span>

                        <div class="mid-logo" style="width:100%"><img width="100%" src="<?php echo $url; ?>/m/images/about/juan04_md.png?ts=<?php echo date("YmdHis"); ?>"></div>
                        <p class="con">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowSeo['name'] ?>(<em><?php echo $rowSeo['wwwname'] ?></em>)是一家专注网购省钱的折扣精选特卖平台。每日通过汇聚各大电商平台的独家折扣精品，以更低的价格优惠，严格的样品质检和服务监督，为广大的用户提供最实惠的商品和完整的网购服务,是目前中国成长最快的电子商务企业之一。<!--<br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowSeo['name'] ?>9.9包邮（九块邮）是<?php echo $rowSeo['name'] ?>旗下的一款9.9元包邮移动购物应用。 --></p>
                    </li>

                    <li>
                        <h3>精品服务</h3>
                        <div class="box-ab">
                            <img class="fl" alt="" src="<?php echo $url; ?>/m/images/about/about_v04_01.jpg?ts=<?php echo date("YmdHis"); ?>">
                        </div>

                        <div class="box-ab">
                            <img class="fl" alt="" src="<?php echo $url; ?>/m/images/about/about_v04_02.jpg?ts=<?php echo date("YmdHis"); ?>">
                        </div>

                        <div class="box-ab">
                            <img class="fl" alt="" src="<?php echo $url; ?>/m/images/about/about_v04_03.jpg?ts=<?php echo date("YmdHis"); ?>">
                        </div>
                        <div class="box-ab ">
                            <img class="fl" alt="" src="<?php echo $url; ?>/m/images/about/about_v04_04.jpg?ts=<?php echo date("YmdHis"); ?>">
                        </div>

                        <div class="box-ab">
                            <img class="fl" alt="" src="<?php echo $url; ?>/m/images/about/about_v04_05.jpg?ts=<?php echo date("YmdHis"); ?>">
                        </div>
                    </li>
                    <style type="text/css">
#alert_wrap .alert_contents .message .icon{
width: 55px;
}
.alert_contents {
font-size: 12px;
width: 100%;
height: 114px;
overflow: hidden;
}
.alert_contents .message{
margin: 1% 0 0 13%;
}
.alert_contents .message .icon{
width: 30%;
float: left;
margin:0 1% 0 0;
}
.alert_contents .sub{
border: none;
background: #2cbd2e;
border-radius: 6px;
color: #fff;
font-size: 12px;
margin-top: 2%;
width:32%;
text-align: center;
padding: 12px 0;
}
.alert_contents .sub:hover{background:#40c042;}
.alert_contents .sub:active{background:#40c042;}
#alert_wrap .alert_contents .message .jky_des{
height: 28px;
line-height: 28px;}
#alert_wrap .message .f16 {
color: #fff;
}
#alert_wrap .alert_contents .message .yellow{
line-height:22px;
color:#e5e5e5;
}
#alert_wrap .alert_contents .message .yellow img{
vertical-align:-1px;height:14px;margin-left:2px;}
#alert_wrap .alert_contents .sub{
position:absolute;
width:16%;
right:9%;
top:25%;
margin:0;
}
#alert_wrap .alert_contents .message {
margin:10px 2% 0;
height:55px;
}
</style>

<?php require_once('../bottom.php');?>

<script>
var wap_type = getCookie('wap_type');
if(wap_type!='' || wap_type != null){
    var wap_type_int = parseInt(wap_type);
    switch(wap_type_int){
        case 1:
            $("#alert_wrap").hide();
            break;
    }
}
//alert($(".alert_wrap").attr("style"));
$('.joa_load_app').click(function(){
    JOA.iframe2open();
    JOA.jump2download();
});
</script>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo $url; ?>/m/js/common.js?ts=<?php echo date("YmdHis"); ?>"></script>

<!-- /主体 -->

<script type="text/javascript">
            $(function(){
            function hideMenu() {
                setTimeout("window.scrollTo(0, 0)", 1);
            }

            $('.alert_black_bg .close').on('click', function(){
                $('.alert_black_bg').hide();
                $('#foot').height(120);
            });
            });
            $(".go-app .closed").on("click",function(){
                $(".go-app").hide();
                return false;
            })

</script>
</body>
</html>