<?php /* Smarty version Smarty-3.1.10, created on 2023-03-01 09:19:37
         compiled from ".\templates\step1.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:262582535ed4b43d4-92951235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '310e1a71cf564499b2e7802de6a4ecaf0b0b097b' => 
    array (
      0 => '.\\templates\\step1.tpl.php',
      1 => 1488423767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '262582535ed4b43d4-92951235',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_582535ed7d70e9_77915322',
  'variables' => 
  array (
    'licenset' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582535ed7d70e9_77915322')) {function content_582535ed7d70e9_77915322($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="body_box">
        <div class="main_box">
            <div class="hd">
            	<div class="bz a1"><div class="jj_bg"></div></div>
            </div>
            <div class="ct">
            	<div class="bg_t"></div>
                <div class="clr">
                    <div class="l"></div>
                    <div class="ct_box">
                    <div class="nr">
                    <div style="font-size:18px; text-align:center; padding:5px 0;">欢迎安装使用一元购</div>
					<?php echo $_smarty_tpl->tpl_vars['licenset']->value;?>
 
					</div>
                    </div>
                </div>
                <div class="bg_b"></div>
            </div>
            <div class="btn_box"><a href="javascript:void(0);" class="is_btn" onclick="$('#install').submit();return false;">开始安装</a></div>
			<form id="install" action="index.php?" method="get">
			<input type="hidden" name="step" value="2">
			</form>
        </div>
    </div>
</body>
</html>
<?php }} ?>