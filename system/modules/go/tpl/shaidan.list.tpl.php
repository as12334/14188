<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<style>
body{ background-color:#fff}
</style>
</head>
<body>
<script>
function shaidan(id){
	if(confirm("确定删除该晒单")){
		window.location.href="<?php echo G_MODULE_PATH;?>/shaidan_admin/sd_del/"+id;
	}
}
</script>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table-list lr10">
 <table width="100%" cellspacing="0">
 	<thead>
	<tr align="center">
		<th width="5%" height="30">ID</th>
        <th width="10%">晒单会员</th>
		<th width="14%">晒单标题</th>
		<th width="8%">缩略图</th>
		<th >晒单内容</th>
		<th width="6%">奖励微积分</th>
		<th width="6%">评论</th>
        <th width="6%">点击量</th>
        <th width="6%">状态</th>
		<th width="10%">管理</th>
	</tr>
    </thead>
    <tbody>
	<?php foreach($shaidan as $v) { $uid = $v['sd_userid']; $member=$this->db->GetOne("select * from `@#_member` where uid='$uid'");?>
	<tr align="center" class="mgr_tr">
		<td height="30"><?php echo $v['sd_id'];?></td>
        <td height="30"><?php if( $member['email']==''){echo $member['mobile'];}else{echo $member['email'];}?></td>
		<td><?php echo _strcut($v['sd_title'],22);?></td>
		<td><img height="30" src="<?php echo G_UPLOAD_PATH.'/'.$v['sd_thumbs'];?>"></td>
		<td><?php echo _strcut(strip_tags($v['sd_content']),44);?></td>
		<td><?php echo $v['sd_fufen'];?></td>
		<td><?php echo $v['sd_ping'];?></td>
        <td><?php echo $v['sd_read_num'];?></td>
        <td><?php if( $v['sd_pass']==0){?>正常<?php }elseif( $v['sd_pass']==1){?><span style="color: #03F;">通过</span><?php }elseif( $v['sd_pass']==2){?><span style="color:red;">不通过</span><?php }?></td>
		<td class="action">
        <span>[<a href="<?php echo G_MODULE_PATH;?>/shaidan_admin/sd_show/<?php echo $v['sd_id'];?>" >查看</a>]</span>
        <?php if( $_COOKIE['auid'] == 1){?>		
                   <span>[<a href="<?php echo G_MODULE_PATH;?>/shaidan_admin/sd_pass/<?php echo $v['sd_id'];?>" >不过</a>]</span>
        <span>[<a onClick="shaidan(<?php echo $v['sd_id'];?>)" href="javascript:;">删除</a>]</span>
                    <?php }else{ ?>		
                    <a href="javascript:;" onClick="alert('您没有权限哦！');">不过</a>
					<a href="javascript:;" onClick="alert('您没有权限哦！');">删除</a>
                    <?php } ?>
        </td>		
	</tr>
	<?php } ?> 
    </tbody>
</table>
<?php if($total>$num) {?> 

<div id="pages"><ul><li>共 <?php echo $total; ?> 条</li><?php echo $page->show('one','li'); ?></ul></div>

<?php } ?> 	

</div><!--table_list end-->

</body>
</html> 
