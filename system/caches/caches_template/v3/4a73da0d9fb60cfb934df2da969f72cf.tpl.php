<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div class="total">
                <dt>
                </dt><dd>佣金总余额：<b class="orange"><?php echo $cashouthdtotal; ?></b>微币 &nbsp;
                累计收入：<b class="orange"><?php echo $shourutotal; ?></b>微币&nbsp;<br />
                    累计(提现/充值)：<b class="orange"><?php echo $zhichutotal; ?></b>微币</dd>
                   <dd>佣金余额可实时充值到您的微购帐户，满10微币时可申请提现。<br /> 提现的金额小于100的手续费<b class="orange"><?php echo $fufen['fufen_yongjintx']; ?></b>微币、大于100的免手续费。</dd>
            </div>