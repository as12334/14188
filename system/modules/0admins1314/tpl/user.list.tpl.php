<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>

<div class="bk10"></div>

<div class="table-list lr10">
<form name="myform" action="" method="post">
  <table width="100%" cellspacing="0">
    <thead>
		<tr>
		<th width="6%">序号</th>
		<th width="10%" align="center">用户名</th>
		<th width="10%" align="center">所属角色</th>
		<th width="10%" align="center">最后登录IP</th>
		<th width="15%" align="center">最后登录时间</th>
		<th  align="center">操作权限</th>
		<th width="10%">管理操作</th>
		</tr>
    </thead>
  	<tbody>
    	<?php foreach($AdminList as $v){ ?>
        <?php $ll = explode(",",$v['useremail']);?>
        <tr>
        <td  align="center"><?php echo $v['uid']; ?></td>
        <td  align="center"><?php echo $v['username']; ?></td>
        <td  align="center"><?php if($v['mid']==0){echo '<span style="color:red">超级管理员</span>';}else{echo "普通管理员";} ?></td>
        <td  align="center"><?php echo $v['loginip']; ?></td>
        <td  align="center"><?php echo date("Y-m-d H:i:s",$v['logintime']); ?></td>
        <td  align="center"><?php if($v['mid']==0){ echo '<span style="color:red">所有权限</span>';}else{ for($i=0;$i<count($ll);$i++){if($ll[$i]=="0"){echo '<span style="color: #960">系统设置</span>';}if($ll[$i]=="1"){echo ' <span style="color: #0C3">内容管理</span>';}if($ll[$i]=="2"){echo ' <span style="color: #F39">商品管理</span>';}if($ll[$i]=="3"){echo ' <span style="color: #939">用户管理</span>';}if($ll[$i]=="4"){echo ' <span style="color: #ab0">商家管理</span>';}if($ll[$i]=="5"){echo ' <span style="color: #120">界面管理</span>';}if($ll[$i]=="6"){echo ' <span style="color: #923">应用</span>';}if($ll[$i]=="7"){echo ' <span style="color: #9CF">免费抽奖</span>';}if($ll[$i]=="8"){echo ' <em style="color: #88F">订单管理</em>';}}}?></td>
        <td  align="center">
        <a href="<?php echo G_ADMIN_PATH; ?>/user/edit/<?php echo $v['uid']; ?>">修改</a>
        <span class="span_fenge lr5">|</span>
        <?php if($v['uid']==1){ ?>
        <font color="#cccccc">删除</font>
        <?php }else{ ?>
        <?php if($info['uid']==1){ ?>
        <a href="javascript:window.parent.Del('<?php echo G_ADMIN_PATH.'/'.ROUTE_C; ?>/del/<?php echo $v['uid']; ?>', '是否删除该管理员?')">删除</a>
        <?php }else{ ?>
        <a onClick="alert('您没有权限哦！');" href="javascript:;">删除</a>
        <?php } }?>
        </td>
        </tr>
        <?php } ?>
	</tbody>
</table>
 <div id="pages"><ul><li>共 <?php echo $total; ?> 条</li><?php echo $page->show('one','li'); ?></ul></div>
</form>
</div><!--table-list end-->

<script>
	
</script>
</body>
</html> 