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
			<td width="120" align="right">昵称：</td>
			<td><input type="text" name="username" value="<?php echo $member['username'];?>" class="input-text"></td>
		</tr>
		<tr>
			<td width="120" align="right">邮箱：</td>
			<td><input type="text" name="email" value="<?php echo $member['email'];?>" class="input-text"></td>
		</tr>
		<tr>
			<td width="120" align="right">手机：</td>
			<td><input type="text" name="mobile" value="<?php echo $member['mobile'];?>" class="input-text" maxlength="11"></td>
		</tr>
		<tr>
			<td width="120" align="right">密码：</td>
			<td><input type="text" name="password" value="" class="input-text">(不填写默认为原密码)</td>
		</tr>
		<tr>
			<td width="120" align="right">账户金额</td>
			<td><input type="text" name="money" value="<?php echo $member['money'];?>" class="input-text">元</td>
		</tr>
		<tr>
			<td width="120" align="right">经验值</td>
			<td><input type="text" name="jingyan" value="<?php echo $member['jingyan'];?>" class="input-text"></td>
		</tr>	
		<tr>
			<td width="120" align="right">积&nbsp;&nbsp;分</td>
			<td><input type="text" name="score" value="<?php echo $member['score'];?>" class="input-text"></td>
		</tr>
		<tr>
			<td width="120" align="right">邮箱验证：</td>
			<td>
				<input type="radio" name="emailcode" value="1" <?php echo $member['emailcode']=='1'?'checked':'';?> class="input-text">已验证
				<input type="radio" name="emailcode" value="-1" <?php echo $member['emailcode']=='-1'?'checked':'';?> class="input-text">未验证
			</td>
		</tr>
		<tr>
			<td width="120" align="right">手机验证：</td>
			<td>
				<input type="radio" name="mobilecode" value="1" <?php echo $member['mobilecode']=='1'?'checked':'';?> class="input-text">已验证
				<input type="radio" name="mobilecode" value="-1" <?php echo $member['mobilecode']=='-1'?'checked':'';?> class="input-text">未验证
			</td>
		</tr>
		<tr>
			<td width="120" align="right">头像：</td>				
			<td>				
				<img src="<?php echo G_UPLOAD_PATH.'/'.$member['img'];?>" style="height:80px;width:80px;border:1px solid #eee;padding:1px">			
				<input type="text" id="imagetext" name="thumb" value="<?php echo $member['img']; ?>" class="input-text wid300">
				<input type="button" class="button" onClick="GetUploadify('<?php echo WEB_PATH; ?>','uploadify','头像上传','image','touimg',1,500000,'imagetext')" value="上传头像" />
			</td>
			</td>
		</tr>
		<tr>
			<td width="120" align="right">签名：</td>
			<td><textarea style="width:400px;height:100px;" name="qianming"><?php echo $member['qianming'];?></textarea></td>
		</tr>
		<tr>
			<td width="120" align="right">用户权限组：</td>
			<td>
				<select name="membergroup">
				<?php foreach($member_allgroup as $v){?>
					<option value="<?php echo $v['groupid'];?>" <?php echo $member_group['name']==$v['name']?'selected':''; ?>><?php echo $v['name'];?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td width="120" align="right">圈子组：</td>
			<td>
				<?php 
					if(!empty($quanziname)){ 
						echo implode(',',$quanziname);
					}
				?>
			</td>
		</tr>
		<tr>
        	<td width="120" align="right"></td>
            <td>		
            <input type="submit" class="button" name="submit" value="提交" >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="button" name="submit" value="返回"  onClick="javascript:history.go(-1);">
           
            </td>
		</tr>
</table>
</form>
</div><!--table-list end-->

<br>
<div class="bk10"></div>
<div class="table-list lr10">        
  <!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr>
            <th width="100px" align="center">会员</th>
			<th width="100px" align="center">操作时间</th>		
			<th width="100px" align="center">中奖商品</th>
            
		</tr>
    </thead>
    <tbody>
    
    	<?php foreach($member_lucky as $v){ ?>
			<tr>
				<td align="center"><?php echo $member['mobile'];?></td>
				<td align="center"><?php echo _put_time($v['time']); ?></td>
				<td align="center"><?php echo $v['content']; ?></td>
                
			</tr>
            <?php } ?>
            
  	</tbody>
</table>
  <!--table-list end-->
</div>
<br>
<div class="table-list lr10">        
  <!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr>
            <th width="100px" align="center">ID</th>
			<th width="100px" align="center">操作时间</th>		
			<th width="100px" align="center">来源渠道</th>
            <th width="100px" align="center">获得/支出</th>
		</tr>
    </thead>
    <tbody>
    
    	<?php foreach($member_account_list as $v){ ?>
			<tr>
				<td align="center"><?php echo $v['id']; ?></td>
				<td align="center"><?php echo _put_time($v['time']); ?></td>
				<td align="center"><?php echo $v['content']; ?></td>
                <td align="center">
			<?php if( $v['type']==1 ) {?>
			<font color="#0c0">+ <?php echo $v['money']; ?></font>
		    <?php }else{ ?>
			<font color="red">- <?php echo $v['money']; ?></font>
		    <?php } ?>
				</td>	
			</tr>
            <?php } ?>
            <tr><td colspan="3" align="center">总金额：<font color="red"><?php echo $member['money']; ?></font></td><td align="center">总微积分：<?php echo $member['score'];?></td></tr>
  	</tbody>
</table>
  <!--table-list end-->
</div>
<br>
<div class="bk10"></div>
<div class="table-list lr10">        
  <!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr>
            <th width="100px" align="center">会员</th>
			<th width="100px" align="center">操作时间</th>		
			<th width="100px" align="center">微购商品</th>
            <th width="100px" align="center">数量</th>
            <th width="100px" align="center">金额</th>
            <th width="100px" align="center">交易状态</th>
		</tr>
    </thead>
    <tbody>
    
    	<?php foreach($member_go_record as $v){ ?>
			<tr>
				<td align="center"><?php echo $v['username']; ?></td>
				<td align="center"><?php echo _put_time($v['time']); ?></td>
				<td align="center">【第<?php echo $v['shopqishu']; ?>期】<?php echo $v['shopname']; ?></td>
                <td align="center"><?php echo $v['gonumber']; ?></td>
                <td align="center"><?php echo $v['moneycount']; ?></td>
                <td align="center"><?php echo $v['status']; ?></td>	
			</tr>
            <?php } ?>
            
  	</tbody>
</table>
  <!--table-list end-->
</div>
<script>
function upImage(){
	return document.getElementById('imgfield').click();
}
</script>
</body>
</html> 