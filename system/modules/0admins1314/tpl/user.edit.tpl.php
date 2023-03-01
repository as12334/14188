<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<div class="header lr10">
   	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<?php $ll = explode(",",$admin['useremail']);?>
<div class="table_form lr10">
<form action="" method="post" id="myform">
<input type="hidden" name="password" class="input-text" id="password" value="">
<input type="hidden" name="pwdconfirm" class="input-text" id="pwdconfirm" value="">
<table width="100%" class="lr10">
    <tr>
    	<td width="80">用户名</td> 
   		<td><?php echo $admin['username']; ?></td>
    </tr>
    
     <?php if( $admin['mid'] == 0){?>	
    <tr>
    <td>所属角色</td>
        <td>
        <select name="mid">
        <option value="0" ><span style="color:red">超级管理员</span></option>
        </select>
        </td>
    </tr>
    <tr>
    	<td>操作权限</td>
    	<td>所有权限</td>
	</tr>
    <?php }else{ ?>
         <tr>
    <td>所属角色</td>
        <td>
        <select name="mid">
        <option value="1" >普通管理员</option>
        </select>
        </td>
    </tr>
    <tr>
    	<td>操作权限</td>
    	<td>
        <label><input name="email[]" id="email" type="checkbox" value="0" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="0"){?> checked="checked"<?php }}?>> 系统设置&nbsp;</label>
        <label><input name="email[]" id="email" type="checkbox" value="1" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="1"){?> checked="checked"<?php }}?>> 内容管理&nbsp;</label>
        <label><input name="email[]" id="email" type="checkbox" value="2" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="2"){?> checked="checked"<?php }}?> > 商品管理&nbsp;</label>
        <label><input name="email[]" id="email" type="checkbox" value="8" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="8"){?> checked="checked"<?php }}?> > 订单管理&nbsp;</label>
        <label><input name="email[]" id="email" type="checkbox" value="3" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="3"){?> checked="checked"<?php }}?> > 用户管理&nbsp;</label>
        <label><input name="email[]" id="email" type="checkbox" value="4" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="4"){?> checked="checked"<?php }}?> > 商家管理&nbsp;</label>
        <label><input name="email[]" id="email" type="checkbox" value="5" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="5"){?> checked="checked"<?php }}?> > 界面管理&nbsp;</label>
       <label> <input name="email[]" id="email" type="checkbox" value="6" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="6"){?> checked="checked"<?php }}?> > 应用&nbsp;</label>
        <label><input name="email[]" id="email" type="checkbox" value="7" <?php for($i=0;$i<count($ll);$i++){if($ll[$i]=="7"){?> checked="checked"<?php }}?> > 免费抽奖&nbsp;</label>
        </td>
	</tr>
		 <?php } ?>
</table>
   	<div class="bk15"></div>
    <input type="hidden" name="submit-1" />
    <?php if($info['mid'] == 0){ ?>
       <input type="button" value=" 提交 " id="dosubmit" class="button">
        <?php }else{ ?>
        <input type="button" value=" 提交 " onClick="alert('您没有权限哦！');" class="button">
        
        <?php } ?>
    
</form>
</div><!--table-list end-->
<script type="text/javascript">
var error='';
var bool=false;
var id='';


$(document).ready(function(){		
		
	   document.getElementById('dosubmit').onclick=function(){
		   		bool=false;
				var myform=document.getElementById('myform');
				
				
				
				if(bool){					
					window.parent.message(error,8,2);
					$('#'+id).focus();
					return false;
				}else{
					if(myform.password.value!=myform.pwdconfirm.value){
					//	window.parent.message("2次密码不相等",8,2);
						return false;
					}
					
					document.getElementById('myform').submit();					
				}
	   }
				
	
		
});

</script>
</body>
</html> 