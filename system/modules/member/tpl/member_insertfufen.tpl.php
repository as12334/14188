<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo G_PLUGIN_PATH; ?>/uploadify/api-uploadify.js" type="text/javascript"></script> 
<style>
table th{ border-bottom:1px solid #eee; font-size:12px; font-weight:100; text-align:right; width:200px;}
table td{ padding-left:10px;}
input.button{ display:inline-block}
</style>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table_form lr10">
<!--start-->
<form name="myform" action="" method="post" enctype="multipart/form-data">
  <table width="100%" cellspacing="0">
     <tr>
			<td width="120" align="right">注册获得积分：</td>
			<td>
				<input type="text" name="u_reg" value="<?php echo $config['u_reg'];?>" class="input-text">(积分)&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="z_reg" value="<?php echo $config['z_reg'];?>" class="input-text">(经验)
			</td>
		</tr>
       
  	 <tr>
			<td width="120" align="right">资料昵称完善奖励：</td>
			<td>
				<input type="text" name="f_overziliao" value="<?php echo $config['f_overziliao'];?>" class="input-text">(积分)&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="z_overziliao" value="<?php echo $config['z_overziliao'];?>" class="input-text">(经验)
			</td>
		</tr>
		<tr>
			<td width="120" align="right">商品购买奖励：</td>
			<td>
				<input type="text" name="f_shoppay" value="<?php echo $config['f_shoppay'];?>" class="input-text">(积分)&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="z_shoppay" value="<?php echo $config['z_shoppay'];?>" class="input-text">(经验)
			</td>
		</tr>
		<tr>
			<td width="120" align="right">手机验证完善奖励：</td>
			<td>
				<input type="text" name="f_phonecode" value="<?php echo $config['f_phonecode'];?>" class="input-text">(积分)&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="z_phonecode" value="<?php echo $config['z_phonecode'];?>" class="input-text">(经验)
			</td>
		</tr>
		<tr>
			<td width="120" align="right">邀请好友奖励：</td>
			<td>
				<input type="text" name="f_visituser" value="<?php echo $config['f_visituser'];?>" class="input-text">(积分)&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="z_visituser" value="<?php echo $config['z_visituser'];?>" class="input-text">(经验)
			</td>
		</tr>
        <tr>
			<td width="120" align="right">签到获得积分：</td>
			<td>
				<input type="text" name="u_jf" value="<?php echo $config['u_jf'];?>" class="input-text">(积分)&nbsp;&nbsp;&nbsp;&nbsp;备注：每天签到获得积分
			</td>
		</tr> 
		<tr>
			<td width="120" align="right">一元抵扣：</td>
			<td>
				<input type="text" name="fufen_yuan" value="<?php echo $config['fufen_yuan'];?>" class="input-text">(积分/元)&nbsp;&nbsp;&nbsp;&nbsp;备注：微积分请输入10的整数
			</td>
		</tr>
		<tr>
			<td width="120" align="right">一级佣金返回：</td>
			<td>
				<input type="text" name="fufen_yongjin" maxlength="4" value="<?php echo $config['fufen_yongjin'];?>" class="input-text">&nbsp;&nbsp;&nbsp;&nbsp;备注：被邀请好友每消费一元所产生的一级佣金返回给邀请者！
			</td>
		</tr>
        <tr>
			<td width="120" align="right">二级佣金返回：</td>
			<td>
				<input type="text" name="fufen_yongjin_2" maxlength="4" value="<?php echo $config['fufen_yongjin_2'];?>" class="input-text">&nbsp;&nbsp;&nbsp;&nbsp;备注：被邀请好友每消费一元所产生的二级佣金返回给邀请者！
			</td>
		</tr>
        <tr>
			<td width="120" align="right">三级佣金返回：</td>
			<td>
				<input type="text" name="fufen_yongjin_3" maxlength="4" value="<?php echo $config['fufen_yongjin_3'];?>" class="input-text">&nbsp;&nbsp;&nbsp;&nbsp;备注：被邀请好友每消费一元所产生的三级佣金返回给邀请者！
			</td>
		</tr>
        <tr>
			<td width="120" align="right">四级佣金返回：</td>
			<td>
				<input type="text" name="fufen_yongjin_4" maxlength="4" value="<?php echo $config['fufen_yongjin_4'];?>" class="input-text">&nbsp;&nbsp;&nbsp;&nbsp;备注：被邀请好友每消费一元所产生的四级佣金返回给邀请者！
			</td>
		</tr>
		<tr>
			<td width="120" align="right">佣金提现手续费：</td>
			<td>
				<input type="text" name="fufen_yongjintx" onkeyup="value=value.replace(/\D/g,'')"  value="<?php echo $config['fufen_yongjintx'];?>" class="input-text">&nbsp;&nbsp;&nbsp;&nbsp;备注：提现100元内佣金所产生的手续费
			</td>
		</tr>
       
		<tr>
        	<td width="120" align="right"></td>
            <?php if( $_COOKIE['auid'] == 1){?>		
                    <td><input type="submit" class="button" name="submit" value="提交" ></td>
                    <?php }else{ ?>	
                    <td><input type="button" onClick="alert('您没有权限哦！');" class="button" name=""  value=" 提交 " ></td>	
					
                    <?php } ?>
           
		</tr>
</table>
</form>
</div><!--table-list end-->
<script>
function upImage(){
	return document.getElementById('imgfield').click();
}
</script>
</body>
</html> 