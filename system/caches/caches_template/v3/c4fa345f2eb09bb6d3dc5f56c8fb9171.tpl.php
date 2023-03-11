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
            <div class="member-t"><h2>佣金明细</h2></div>
            <div class="total">
                <dl>
                 <dd>佣金余额：<b class="orange"><?php echo $total; ?></b>微币&nbsp;&nbsp;</dd>&nbsp;&nbsp;
                <dd>累计收入：<b class="orange"><?php echo $shourutotal; ?></b>微币&nbsp;&nbsp;&nbsp;&nbsp;</dd>&nbsp;&nbsp;
                    <dd>累计(提现/充值)：<b class="orange"><?php echo $zhichutotal; ?></b>微币&nbsp;&nbsp;&nbsp;&nbsp;</dd>
                   
                    <dt class="gray02">佣金余额可实时充值到您的<?php echo _cfg('web_name_two'); ?>帐户，满10微币时可申请提现。</dt>
                    <dt><a href="<?php echo WEB_PATH; ?>/mobile/invite/recordlist/<?php echo $uids; ?>/" title="申请提现" class="bluebut">申请提现</a>
                        <a href="<?php echo WEB_PATH; ?>/mobile/invite/recordlist/<?php echo $uids; ?>/" title="充值到账户" class="orangebut">充值到<?php echo _cfg('web_name_two'); ?>账户</a></dt>
                    
                </dl>

            </div>
            
            
            <!--             <div class="record-tit">
                            <div class="record-tab">
                                <a href="javascript:void();" class="record-cur">全部</a><a href="javascript:void();">今天</a><a href="javascript:void();">本周</a><a href="javascript:void();">本月</a><a href="javascript:void();">最近三个月</a>
                            </div>

                        </div> -->
            <div id="divCommissionList" class="list-tab commission gray02">
            <ul class="listTitle">
            <li class="w20">用户</li>
            <li class="w20">时间</li>
            <li class="w40">描述</li>
            <li class="w10">金额</li>
            <li class="w10">佣金</li>
            </ul>
                <?php if($recodetotal!=0): ?>
                    <?php $ln=1; if(is_array($recodearr)) foreach($recodearr AS $key => $val): ?>
                    
                    <ul class="listcon">
                        <li class="w20"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $val['uid']; ?>/<?php echo $uids; ?>/" target="_blank" class="blue"><?php echo $username[$val['uid']]; ?></a></li>
                        <li class="w20"><?php echo date('Y-m-d H:i:s',$val['time']); ?></li>
                        <li class="w40"><?php if($uid==$val['uid']): ?><?php echo _strcut($val['content'],28); ?><?php  else: ?><a target="_blank" href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $val['shopid']; ?>/<?php echo $uids; ?>/" title="<?php echo $val['content']; ?>" class="blue"><?php echo _strcut($val['content'],28); ?></a><?php endif; ?></li>
                        <li class="w10"><?php echo $val['ygmoney']; ?></li>
                        <li class="w10 orange"><?php if($uid==$val['uid']): ?>-<?php  else: ?>+<?php endif; ?><?php echo $val['money']; ?></li>
                    </ul>
                    <?php  endforeach; $ln++; unset($ln); ?>
                <?php  else: ?>
                    
                    
                <?php endif; ?>
                </div>
                <div id="divPageNav" class="page_nav"></div>
                
   <?php if($recodetotal==0): ?>
    <section class="clearfix">
        <ul >
	      <div class="haveNot z-minheight"><s></s><p>您还未有邀请谁哦！</p></div>
        </ul>
    </section>
    <?php endif; ?>
    </section>
    
<?php include templates("mobile/index","footer");?>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_WEB_PATH; ?>/statics/templates/{wc:fun_cfg('template_name')}";
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js');
</script>
 
</div>
</body>
</html>
