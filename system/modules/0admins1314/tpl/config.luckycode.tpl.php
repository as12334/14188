<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<style type="text/css">
tr{height:40px;line-height:40px}
.dingdan_content{width:650px;border:1px solid #d5dfe8;background:#eef3f7;float:left; padding:20px;}
.dingdan_content li{ float:left;width:310px;}
.dingdan_content_user{width:650px;border:1px solid #d5dfe8;background:#eef3f7;float:left; padding:20px;}
.dingdan_content_user li{ line-height:25px;}

.api_b{width:80px; display:inline-block;font-weight:normal}
.yun_ma{ word-break:break-all; width:200px; background:#fff; overflow:auto; height:100px; border:5px solid #09F; padding:5px;}
</style>
</head>
<body>
<div class="header-title lr10">
	<b>订单详情</b>
</div>
<div class="bk10"></div>
<div class="table-list lr10">
<!--start-->

		<div class="bk10"></div>
			
		<div class="dingdan_content_user">
			<li><b class="api_b">购买人ID：</b> <?php echo $user['uid'];?></li>
			<li><b class="api_b">购买人昵称：</b> <?php echo $user['username'];?></li>
			<li><b class="api_b">购买人邮箱：</b><?php echo $user['email'];?></li>		
			<li><b class="api_b">购买人手机：</b><?php echo $user['mobile'];?></li>					
			<li><b class="api_b">抽奖时间：</b><?php echo date("Y-m-d H:i:s",$record['time']);?></li>	
            <li><b class="api_b">收货信息：</b><?php 
			if($user_dizhi){
				foreach($user_dizhi as $k=>$v){
					$user_dizhi[$k] = _htmtocode($v);
				}
				echo $user_dizhi['sheng'].' - '.$user_dizhi['shi'].' - '.$user_dizhi['xian'].' - '.$user_dizhi['jiedao'];
							
				echo "&nbsp;&nbsp;&nbsp;收货人:".$user_dizhi['shouhuoren'];
				echo "&nbsp;&nbsp;&nbsp;手机:".$user_dizhi['mobile'];
			}else{
				echo "该用户未填写收货信息,请自行联系买家！";
			}
			?></li>			
		</div>			
		<div class="bk10"></div>
       
		<div class="dingdan_content_user">
			
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $record['id']; ?>"/>
			
			<li><b class="api_b">当前状态:</b> <font color="#0c0">
			<?php if($record['pass']==1){?>
            未发货
            <?php }if($record['pass']==2){ ?>
            待收货
            <?php }if($record['pass']==3){ ?>
            已收货
			<?php }else{ ?>
			未完成
			<?php }?></font></li>		
			<li><b class="api_b">订单状态:</b>
        <input type="radio" name="pass" value="1" <?php if( $record['pass']==1){ ?> checked="checked" <?php }?> /> 未发货
        <input type="radio" name="pass" value="2" <?php if( $record['pass']==2){ ?> checked="checked" <?php }?> /> 待收货
        <input type="radio" name="pass" value="3" <?php if( $record['pass']==3){ ?> checked="checked" <?php }?> /> 已收货
        <input type="radio" name="pass" value="4" <?php if( $record['pass']==4){ ?> checked="checked" <?php }?> /> 未完成
			</li>
			<li><b class="api_b">物流公司:</b><input type="text" name="company" value="<?php echo $record['company']; ?>" class="input-text wid150"> 请自行填写物流公司名称</li>
			<li><b class="api_b">快递单号:</b><input type="text" name="company_code" value="<?php echo $record['company_code']; ?>" class="input-text wid150"> 填写物流公司快递单号</li>
			
			
			<li><input type="submit" class="button" value="  更新  " name="dosubmit" /></li>		
			</form>
		</div>
        
</div><!--table-list end-->

<script>
	
</script>
</body>
</html> 