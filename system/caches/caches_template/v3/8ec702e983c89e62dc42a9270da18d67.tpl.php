<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>

<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_x.css?v=150728" rel="stylesheet" type="text/css" />
<div class="p-center-main clrfix">
            <!--左边导航-->
            
<?php include templates("member","left");?>
            <div class="sidebar_main clrfix fr">
                <?php include templates("member","shezhi");?>
                <div class="security-settings clrfix">
                    <ul>
                        <li>
                            <span class="g-xuan"><i></i>登录密码</span>
                            <span class="orange"><b></b>建议您定期更改密码以保护账户安全。</span>
                            <span class="u-operating"><a href="<?php echo WEB_PATH; ?>/member/home/password">修改</a></span>
                        </li>
                       <!-- <li><span class="g-xuan g-ganta"><i></i>支付密码</span><span><b></b>用于使用账户余额、微积分支付和转账时使用。</span><span class="u-operating u-operating-open"><a id="btnSetPayPwd" href="javascript:;" type="0">立即开启</a></span></li><li><span class="g-xuan g-ganta"><i></i>小额免密码设置</span><span><b></b>开启后支付金额小于设置额度时，无需输入支付密码。</span><span class="u-operating u-operating-open"><a id="btnSetSmall" href="javascript:;" type="0">立即开启</a></span></li> -->
                       <?php if($member['mobile']!=null && $member['mobilecode']=='1'): ?>
                       
                       <li><span class="g-xuan "><i></i>手机号绑定</span><span><b></b>您当前绑定的手机号<?php echo $member['mobile']; ?>，若已丢失或更换，请立即修改。</span><span class="u-operating ">已绑定</span></li>

                                   
                                    <?php  else: ?>
                       <li><span class="g-xuan g-ganta"><i></i>手机号绑定</span><span><b></b>多种渠道收到揭晓通知，快去绑定吧！</span><span class="u-operating u-operating-open"><a href="<?php echo WEB_PATH; ?>/member/home/mobilechecking">立即绑定</a></span></li>
                                    
                                   
                                    <?php endif; ?>
                        
                        <?php if($member['email']!=null && $member['emailcode']=='1'): ?>	
                         <li><span class="g-xuan "><i></i>邮箱绑定</span><span><b></b>您当前绑定的邮箱<?php echo $member['email']; ?>，若已停用，请立即修改。</span><span class="u-operating ">已绑定</span></li>
                                    <?php  else: ?>
                         <li><span class="g-xuan g-ganta"><i></i>邮箱绑定</span><span><b></b>多种渠道收到揭晓通知，快去绑定吧！</span><span class="u-operating u-operating-open"><a href="<?php echo WEB_PATH; ?>/member/home/mailchecking">立即绑定</a></span></li>
                                    <?php endif; ?>
                        
                        
                       <!-- <li><span class="g-xuan g-ganta"><i></i>登录保护</span><span><b></b>关注官网微信后，登录您的账号时，将使用微信的方式提醒您，防止盗号。</span><span class="u-operating u-operating-open"><a id="btnSetWxMsg" href="javascript:;">立即开启</a></span></li> -->

                    </ul>
                </div>
            </div>

        </div>

<?php include templates("index","footer");?>