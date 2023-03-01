<?php
include("function.php");
$action=$_REQUEST["action"];
$acti=$_REQUEST["acti"];
$ID=$_REQUEST["ID"];
//===========================修改管理员密码============================//
if ($action=="update_pass")
{
$ID=$_REQUEST["ID"];
$user_pass=$_REQUEST["user_pass"];
$user_pass1=$_REQUEST["user_pass1"];
$name=$_REQUEST["name"];
$usertel=$_REQUEST["usertel"];
$adminqx=$_REQUEST["adminqx"];
if ($user_pass=="" || $user_pass1=="")
{
$ob->ShowMsg("请输入密码!","");
return;
}
if ($new_pass<>$new_pass1)
{
  $ob->ShowMsg("两次输入的密码不相同!","");
  return;
}
  $adminqx  = implode(',',$adminqx);
  $arrayInsert=array(adminpass=>md5($user_pass),adminname=>$name,admintel=>$usertel,adminqx=>",$adminqx");
  $user_update=$ob->upData($arrayInsert,"hn_admin","ID",$ID);
  $ob->ShowMsg("数据更新成功!","../admin/gl_user.php");
}
//-----------------删除管理员-----------------//
if ($action=="del_haibao")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_haibao","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/gl_haibao.php");
}
//-----------------删除图库-----------------//
if ($action=="Del_tuku")
{
 $BigID=$_REQUEST["BigID"];
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_mingren","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/tuku2.php?ID=".$BigID."");
}
//-----------------删除图库-----------------//
if ($action=="Del_tuku_big")
{
 $BigID=$_REQUEST["BigID"];
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_mingren_big","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/tuku1.php?BigID=".$BigID."");
}
//-----------------删除摄影图库-----------------//
if ($action=="Del_sy_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_all","id",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/sy_tuku.php");
}
//-----------------删除设计图库-----------------//
if ($action=="Del_sj_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_sj","id",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/sj_tuku.php");
}
//-----------------删除矢量图库-----------------//
if ($action=="Del_sl_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_sl","id",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/sl_tuku.php");
}
//-----------------删除经典图库-----------------//
if ($action=="Del_jd_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_jd","id",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/tuku_jd.php");
}
//-----------------删除图库社区-----------------//
if ($action=="Del_sq_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_sq","id",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/tuku_sq.php");
}
//-----------------删除原创作品-----------------//
if ($action=="Del_yuanchang")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_yuanchang","id",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/yuanchang.php");
}
//-----------------删除高清-----------------//
if ($action=="Del_gao")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_gao_tuku","id",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/gao_tuku.php");
}
//-----------------删除源文件-----------------//
if ($action=="Del_yuanwen")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_yuanwen","id",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/yuanwen.php");
}
//-----------------删除管理员-----------------//
if ($action=="del_user")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_admin","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/gl_user.php");
}

//-----------------删除专业新闻-----------------//
if ($action=="DEL_ZHUANYE_NEW")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("HN_ZHUANYE_NEW","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/ZHUANYE_NEW.php");
}

//-----------------删除专题-----------------//
if ($action=="del_zt")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hu_zt_new","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/huanan_new.php");
}
//-----------------删除新专题资讯-----------------//
if ($action=="del_xzt")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("pre_forum_notice","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/bbs.php");
}

//-----------------删除商家-----------------//
if ($action=="del_sj")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_sj","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/huanan_sj.php");
}
//-----------------删除独家-----------------//
if ($action=="del_dujian")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("dujian","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/dujian.php");
}
//-----------------删除专题留言----------------//
if ($action=="del_ly")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_zt_pl","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/hn_pro.php");
}
//-----------------删除专业地产项目----------------//
if ($action=="del_zhuanye")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_zhuanye_xiangmu","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/zhye.php");
}
//-----------------删除友情链接-----------------//
if ($action=="del_lianjie")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_youqing","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/gl_lianjie.php");
}
//-----------------删除会员图片-----------------//
if ($action=="Del_UserPic")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_userpic","ID",$ID);
 $ob->ShowMsg("数据删除成功!","");
}
//-----------------删除后台管理会员日志-----------------//
if ($action=="Del_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/UserNew.php?action=User_new");
}
//-----------------删除品牌会员日志-----------------//
if ($action=="Del_akg_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../akg.php?action=User_new");
}
//-----------------删除专场会员日志-----------------//
if ($action=="Del_buy_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../buy.php?action=User_new");
}
//-----------------删除商会会员日志-----------------//
if ($action=="Del_institute_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../institute.php?action=User_new");
}
//-----------------删除个人会员日志-----------------//
if ($action=="Del_geren_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../geren.php?action=User_new");
}

//-----------------删除合作伙伴-----------------//
if ($action=="del_huoban")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_huoban","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/gl_huoban.php");
}//-----------------删除合作伙伴-----------------//
if ($action=="del_update_user")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("web_user","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/User.php");
}
//=====================================================//
//-----------------添加管理员-----------------//
if ($action=="into_user"){

$user_name=$_REQUEST["user_name"];
$user_pass=$_REQUEST["user_pass"];
$user_pass1=$_REQUEST["user_pass1"];
$name=$_REQUEST["name"];
$usertel=$_REQUEST["usertel"];
$adminqx=$_REQUEST["adminqx"];
if ($user_name=="" || $user_pass=="" || $user_pass1=="")
{
$ob->ShowMsg("登录信息不能为空!","");
return;
}

if ($user_pass!=$user_pass1)
{
$ob->ShowMsg("两次输入的密码不相同!","");
return;
}
$adminqx  = implode(',',$adminqx);
$arrayInsert=array(adminuser=>$user_name,adminpass=>md5($user_pass),adminname=>$name,admintel=>$usertel,adminqx=>",$adminqx");

$ob->addData($arrayInsert,"hn_admin");
$ob->ShowMsg("数据已提交!","../admin/gl_user.php");
}

//-----------------添加友情链接-----------------//
if ($action=="into_lianjie"){

$Name=$_REQUEST["Name"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(Name=>$Name,Lianjie=>$Lianjie);
$ob->addData($arrayInsert,"hn_youqing");
$ob->ShowMsg("数据已提交!","../admin/gl_lianjie.php");
}
//-----------------添加合作伙伴-----------------//
if ($action=="into_huoban"){

$pic=$_REQUEST["pic"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(pic=>$pic,Lianjie=>$Lianjie);
$ob->addData($arrayInsert,"hn_huoban");
$ob->ShowMsg("数据已提交!","../admin/gl_huoban.php");
}
//==================================================//
//-----------------修改网站标题-----------------//
if ($action=="update_biaoti")
{
$biaoti=$_REQUEST["biaoti"];

$arrayInsert=array(Biaoti=>$biaoti);
$user_update=$ob->upData($arrayInsert,"hn_about","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/biaoti.php");
}
//-----------------修改公告-----------------//
if ($action=="update_gonggao")
{
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_about","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/gonggao.php");
}
//-----------------修改网站底部-----------------//
if ($action=="update_botter")
{
$Content=$_REQUEST["Content"];

$arrayInsert=array(Botter=>$Content);
$user_update=$ob->upData($arrayInsert,"hn_about","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/update_botter.php");
}
//-----------------修改友情链接-----------------//
if ($action=="update_lianjie")
{
$Name=$_REQUEST["Name"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(Name=>$Name,Lianjie=>$Lianjie);
$user_update=$ob->upData($arrayInsert,"hn_youqing","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/gl_lianjie.php");
}
//-----------------修改合作伙伴-----------------//
if ($action=="update_huoban")
{
$pic=$_REQUEST["pic"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(pic=>$pic,Lianjie=>$Lianjie);
$user_update=$ob->upData($arrayInsert,"hn_huoban","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/gl_huoban.php");
}
//-----------------修改广告图片-----------------//
if ($action=="update_guanggao")
{
$pic=$_REQUEST["pic"];

$arrayInsert=array(pic=>$pic);
$user_update=$ob->upData($arrayInsert,"hn_guanggao","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/gl_guanggao.php");
}
//-----------------修改广告图片-----------------//
if ($action=="UPDATE_PICGUANGGAO")
{
$pic=$_REQUEST["pic"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(pic=>$pic,Lianjie=>$Lianjie);
$user_update=$ob->upData($arrayInsert,"hn_picguanggao","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/GUANGGAO2.PHP");
}
//-----------------加积分-----------------//
if ($action=="up_pointss")
{
//$name=$_REQUEST["Name"];
$points=$_REQUEST["points"];

$arrayInsert=array(points=>$points);
$user_update=$ob->points($arrayInsert,"hn_zhuanti_ziliao","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/uu.php");
}
if ($action=="up_points")
{
//$name=$_REQUEST["Name"];
$a=$_REQUEST["points"];

//$arrayInsert=array(points=>$points);
$user_update=$ob->update1($a,"hn_zhuanti_ziliao","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/uu.php");
}
//-----------------修改专业市场信息-----------------//
if ($action=="UPDATE_ZHUANYE_NEW")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["LAIYUAN"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];
$BIGCLASS=$_REQUEST["BIGCLASS"];
$SHIPIN_SMALLPIC=$_REQUEST["SHIPIN_SMALLPIC"];
$SHIPIN=$_REQUEST["SHIPIN"];
$GUANJIANZI=$_REQUEST["GUANJIANZI"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,LAIYUAN=>$LAIYUAN,FABUREN=>$FABUREN,BIG=>$BIG,BIGCLASS=>$BIGCLASS,SHIPIN_SMALLPIC=>$SHIPIN_SMALLPIC,SHIPIN=>$SHIPIN,GUANJIANZI=>$GUANJIANZI);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/ZHUANYE_NEW.PHP");
}
//-----------------修改专业市场信息-----------------//
if ($action=="update_conter_guanggao")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$conter=$_REQUEST["conter"];
$pic=$_REQUEST["pic"];
$LIANJIE=$_REQUEST["LIANJIE"];

$arrayInsert=array(TITLE=>$TITLE,conter=>$conter,pic=>$pic,LIANJIE=>$LIANJIE);
$user_update=$ob->upData($arrayInsert,"hn_conterguanggao","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/GUANGGAO1.PHP");
}

//-----------------添加专业市场信息-----------------//
if ($action=="INTO_ZHUANYE_NEW"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["LAIYUAN"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];
$BIGCLASS=$_REQUEST["BIGCLASS"];
$SHIPIN_SMALLPIC=$_REQUEST["SHIPIN_SMALLPIC"];
$SHIPIN=$_REQUEST["SHIPIN"];
$GUANJIANZI=$_REQUEST["GUANJIANZI"];
$TUIJIAN=$_REQUEST["TUIJIAN"];
$JINGPIN=$_REQUEST["JINGPIN"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,LAIYUAN=>$LAIYUAN,FABUREN=>$FABUREN,BIG=>$BIG,BIGCLASS=>$BIGCLASS,SHIPIN_SMALLPIC=>$SHIPIN_SMALLPIC,SHIPIN=>$SHIPIN,GUANJIANZI=>$GUANJIANZI,TUIJIAN=>$TUIJIAN,JINGPIN=>$JINGPIN);
$ob->addData($arrayInsert,"hn_zhuanye_new");
$ob->ShowMsg("数据已提交!","../admin/ZHUANYE_NEW.php");
}
//-----------------添加新闻-----------------//
if ($action=="IN_NEW"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];
$SHIPIN=$_REQUEST["SHIPIN"];
$SHIPIN_SMALLPIC=$_REQUEST["SHIPIN_SMALLPIC"];
$PROTITLE=$_REQUEST["protitle"];
$WJTITLE=$_REQUEST["WJTITLE"];
$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,FABUREN=>$FABUREN,BIG=>$BIG,SHIPIN=>$SHIPIN,SHIPIN_SMALLPIC=>$SHIPIN_SMALLPIC,PROTITLE=>$PROTITLE,WJTITLE=>$WJTITLE);
$ob->addData($arrayInsert,"hu_zt_new");
$ob->ShowMsg("数据已提交!","../admin/huanan_new.php");
}
//-----------------修改新闻-----------------//
if ($action=="up_new")
{

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];
$SHIPIN=$_REQUEST["SHIPIN"];
$SHIPIN_SMALLPIC=$_REQUEST["SHIPIN_SMALLPIC"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,FABUREN=>$FABUREN,BIG=>$BIG,SHIPIN=>$SHIPIN,SHIPIN_SMALLPIC=>$SHIPIN_SMALLPIC);
$user_update=$ob->upData($arrayInsert,"hu_zt_new","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/huanan_new.PHP");
}

//-----------------添加商家-----------------//
if ($action=="INTO_SJ"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];

$BIG=$_REQUEST["BIG"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,BIG=>$BIG);
$ob->addData($arrayInsert,"hn_sj");
$ob->ShowMsg("数据已提交!","../admin/huanan_sj.php");
}
//-----------------修改商家-----------------//
if ($action=="up_sj")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$conter=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];


$arrayInsert=array(TITLE=>$TITLE,conter=>$conter,PIC=>$PIC);
$user_update=$ob->upData($arrayInsert,"hn_sj","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/huanan_sj.PHP");
}

//-----------------添加独家-----------------//
if ($action=="INTO_DUJIAN"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["LAIYUAN"];
$BIG=$_REQUEST["BIG"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,LAIYUAN=>$LAIYUAN,BIG=>$BIG);
$ob->addData($arrayInsert,"dujian");
$ob->ShowMsg("数据已提交!","../admin/dujian.php");
}
//-----------------添加专业热门-----------------//
if ($action=="INTO_ZHYE"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$PIC=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["lianjie"];

$arrayInsert=array(NAME=>$TITLE,PIC=>$PIC,LIANJIE=>$LAIYUAN);
$ob->addData($arrayInsert,"hn_zhuanye_xiangmu");
$ob->ShowMsg("数据已提交!","../admin/zhye.php");
}
//-----------------修改独家-----------------//
if ($action=="up_dujian")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$conter=$_REQUEST["Content"];
$pic=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["LAIYUAN"];

$arrayInsert=array(TITLE=>$TITLE,conter=>$conter,PIC=>$pic,LAIYUAN=>$LAIYUAN);
$user_update=$ob->upData($arrayInsert,"dujian","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/dujian.PHP");
}
//-----------------修改专业地产项目-----------------//
if ($action=="up_zhuanye")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$pic=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["LIANJIE"];

$arrayInsert=array(NAME=>$TITLE,PIC=>$pic,lianjie=>$LAIYUAN);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_xiangmu","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/zhye.PHP");
}
//-----------------发起投票-----------------//
if ($action=="INTO_PRO"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,FABUREN=>$FABUREN,BIG=>$BIG);
$ob->addData($arrayInsert,"hn_pro");
$ob->ShowMsg("数据已提交!","../admin/hn_pro.php");
}


//-----------------发表专题资讯-----------------//
if ($action=="INTO_BBS_NOT"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];
$protitle=$_REQUEST["protitle"];
$wjtitle=$_REQUEST["wjtitle"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,FABUREN=>$FABUREN,BIG=>$BIG,protitle=>$protitle,wjtitle=>$wjtitle);
$ob->addData($arrayInsert,"pre_forum_notice");
$ob->ShowMsg("数据已提交!","../admin/bbs.php");
}
//-----------------修改专题资讯-----------------//
if ($action=="up_xzt")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$conter=$_REQUEST["Content"];
$pic=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];

$arrayInsert=array(TITLE=>$TITLE,conter=>$conter,PIC=>$pic,FABUREN=>$FABUREN);
$user_update=$ob->upData($arrayInsert,"pre_forum_notice","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/bbs.PHP");
}


//-----------------发起问卷-----------------//
if ($action=="INTO_WJ"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,FABUREN=>$FABUREN,BIG=>$BIG);
$ob->addData($arrayInsert,"hn_wj");
$ob->ShowMsg("数据已提交!","../admin/hn_wj.php");
}

//-----------------添加专业市场信息-----------------//
if ($action=="into_pinglun"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$conter=$_REQUEST["conter"];


if (!$Username)
{
$ob->ShowMsg("请先登录吧!","");
return;
}
if (!$conter)
{
$ob->ShowMsg("写点什么吧!","");
return;
}

$arrayInsert=array(USER=>$Username,CONTER=>$conter,NEW_ID=>$NEW_ID);
$ob->addData($arrayInsert,"hn_pinglun");
$ob->ShowMsg("数据已提交!","../NEW_CONTER.PHP?ID=".$ID."");
}
//-----------------发表点评-----------------//
if ($action=="into"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$conter=$_REQUEST["conter"];


if (!$Username)
{
$ob->ShowMsg("请先登录吧!","");
return;
}
if (!$conter)
{
$ob->ShowMsg("写点什么吧!","");
return;
}

$arrayInsert=array(USER=>$Username,CONTER=>$conter,NEW_ID=>$NEW_ID);
$ob->addData($arrayInsert,"hn_pinglun");
$ob->ShowMsg("数据已提交!","../bbs_conter.PHP?ID=".$ID."");
}
//-----------------发表专题-----------------//
if ($action=="into_zati"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];

$conter=$_REQUEST["conter"];
$title=$_REQUEST["title"];

if (!$Username)
{
$ob->ShowMsg("请先登录吧!","");
return;
}
if (!$conter)
{
$ob->ShowMsg("写点什么吧!","");
return;
}

$arrayInsert=array(USER=>$Username,CONTER=>$conter,title=>$title,NEW_ID=>$NEW_ID);
$ob->addData($arrayInsert,"hn_ZT_PL");
$ob->ShowMsg("数据已提交!","../new_cot.PHP?ID=".$ID."");
}
//-----------------添加专业市场信息-----------------//
if ($action=="into_haibao"){

$NAME=$_REQUEST["NAME"];
$LIANJIE=$_REQUEST["LIANJIE"];
$PIC=$_REQUEST["pic"];

$arrayInsert=array(NAME=>$NAME,LIANJIE=>$LIANJIE,PIC=>$PIC);
$ob->addData($arrayInsert,"hn_haibao");
$ob->ShowMsg("数据已提交!","../admin/gl_haibao.php");
}

//-----------------对投票的处理-----------------//
if ($action=="do_pro"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$n=$_REQUEST["n"];


if (!$Username)
{
$ob->ShowMsg("请先登录吧!","");
return;
}
if (!$n)
{
$ob->ShowMsg("写点什么吧!","");
return;
}

$arrayInsert=array(USER=>$Username,n=>$n,USER_ID=>$NEW_ID);
$user_update=$ob->upData($arrayInsert,"pre_forum_notice","id",$NEW_ID);
$ob->ShowMsg("数据已提交!","");
}
//-----------------对专题投票的处理-----------------//
if ($action=="zt_pro"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$n=$_REQUEST["n"];


if (!$Username)
{
$ob->ShowMsg("请先登录吧!","");
return;
}
if (!$n)
{
$ob->ShowMsg("写点什么吧!","");
return;
}

$arrayInsert=array(USER=>$Username,n=>$n,USER_ID=>$NEW_ID);
$user_update=$ob->upData($arrayInsert,"hu_zt_new","id",$NEW_ID);
$ob->ShowMsg("数据已提交!","");
}
//-----------------对专题问卷的处理-----------------//
if ($action=="zt_wj"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$w=$_REQUEST["w"];


if (!$Username)
{
$ob->ShowMsg("请先登录吧!","");
return;
}
if (!$w)
{
$ob->ShowMsg("写点什么吧!","");
return;
}

$arrayInsert=array(USER=>$Username,w=>$w,USER_ID=>$NEW_ID);
$user_update=$ob->upData($arrayInsert,"hu_zt_new","id",$NEW_ID);
$ob->ShowMsg("数据已提交!","");
}

//-----------------对问卷的处理-----------------//
if ($action=="do_wj"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$w=$_REQUEST["w"];


if (!$Username)
{
$ob->ShowMsg("请先登录吧!","");
return;
}
if (!$w)
{
$ob->ShowMsg("写点什么吧!","");
return;
}

$arrayInsert=array(USER=>$Username,w=>$w,NEW_ID=>$NEW_ID);
$user_update=$ob->upData($arrayInsert,"pre_forum_notice","id",$NEW_ID);
$ob->ShowMsg("数据已提交!","");
}
//-----------------修改网站标题-----------------//
if ($action=="update_haibao")
{
$NAME=$_REQUEST["NAME"];
$LIANJIE=$_REQUEST["LIANJIE"];
$PIC=$_REQUEST["pic"];

$arrayInsert=array(NAME=>$NAME,LIANJIE=>$LIANJIE,PIC=>$PIC);
$user_update=$ob->upData($arrayInsert,"hn_haibao","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/gl_haibao.php");
}
//-----------------首页幻灯片-----------------//
if ($action=="update_index_pic")
{
$lianjie=$_REQUEST["lianjie"];
$title=$_REQUEST["title"];
$pic=$_REQUEST["pic"];

$arrayInsert=array(title=>$title,pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"hn_huandeng","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/gl_huandeng.php?actio=index_pic");
}
//-----------------艺术在线幻灯片-----------------//
if ($action=="update_yishu_pic")
{
$title=$_REQUEST["title"];
$pic=$_REQUEST["pic"];
$small=$_REQUEST["small_pic"];

$arrayInsert=array(title=>$title,pic=>$pic,small=>$small);
$user_update=$ob->upData($arrayInsert,"hn_huandeng1","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/gl_huandeng.php?actio=yishu_pic");
}
//-----------------艺术在线幻灯片-----------------//
if ($action=="update_zhuanye_big")
{
$big=$_REQUEST["big"];

$arrayInsert=array(big=>$big);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_big","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/web_big.php");
}
if ($action=="update_xueyuan_big")
{
$big=$_REQUEST["big"];

$arrayInsert=array(big=>$big);
$user_update=$ob->upData($arrayInsert,"hn_xueyuan_big","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/web_big.php");
}
if ($action=="update_paimai_big")
{
$big=$_REQUEST["big"];

$arrayInsert=array(big=>$big);
$user_update=$ob->upData($arrayInsert,"hn_paimai_big","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/web_big.php");
}
if ($action=="update_yishu_big")
{
$big=$_REQUEST["big"];

$arrayInsert=array(big=>$big);
$user_update=$ob->upData($arrayInsert,"hn_yishu_big","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/web_big.php");
}
//-----------------添加专业市场信息-----------------//
if ($action=="into_big"){

$BIGCLASS=$_REQUEST["BIGCLASS"];
$big=$_REQUEST["big"];

if ($BIGCLASS==1){
$arrayInsert=array(big=>$big);
$ob->addData($arrayInsert,"hn_zhuanye_big");
}
if ($BIGCLASS==2){
$arrayInsert=array(big=>$big);
$ob->addData($arrayInsert,"hn_xueyuan_big");
}
if ($BIGCLASS==3){
$arrayInsert=array(big=>$big);
$ob->addData($arrayInsert,"hn_paimai_big");
}
if ($BIGCLASS==4){
$arrayInsert=array(big=>$big);
$ob->addData($arrayInsert,"hn_yishu_big");
}

$ob->ShowMsg("数据已提交!","../admin/web_big.php");
}
//-----------------删除管理员-----------------//
if ($action=="del_zhuanye_big")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_zhuanye_big","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/web_big.php");
}
if ($action=="del_xueyuan_big")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_xueyuan_big","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/web_big.php");
}
if ($action=="del_paimai_big")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_paimai_big","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/web_big.php");
}
if ($action=="del_yishu_big")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_yishu_big","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/web_big.php");
}
//===========================修改用户信息============================//
if ($action=="update_akg"){

$actio=$_REQUEST["actio"];
$userpic=$_REQUEST["UserPic"];
$about=$_REQUEST["about"];
$username=$_COOKIE["username"];
$user_pass=$_REQUEST["user_pass"];
$user_pass1=$_REQUEST["user_pass1"];
$tiwen=$_REQUEST["tiwen"];
$huida=$_REQUEST["huida"];
$Dizhi=$_REQUEST["Dizhi"];
$xingbie=$_REQUEST["xingbie"];
$shengri=$_REQUEST["nian"]."/".$_REQUEST["yue"]."/".$_REQUEST["ri"];
$Name=$_REQUEST["Name"];
$Tel=$_REQUEST["Tel"];
$qq=$_REQUEST["qq"];
$Email=$_REQUEST["Email"];
$Chuanzhen=$_REQUEST["Chuanzhen"];
$Youbian=$_REQUEST["Youbian"];

if ($user_pass!=$user_pass1)
{
  $ob->ShowMsg("两次输入的密码不同!","");
}
if ($actio=="pass"){
$arrayInsert=array(pass=>md5($user_pass),tiwen=>$tiwen,huida=>$huida);
}elseif ($actio=="ziliao"){
$arrayInsert=array(Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
}elseif ($actio=="jianjie"){
$arrayInsert=array(about=>$about);
}elseif ($actio=="xingxiang"){
$arrayInsert=array(userpic=>$userpic);
}
$user_update=$ob->upData($arrayInsert,"web_user","user",$username);
$ob->ShowMsg("资料更新成功!","");
}
//-----------------首页三小图-----------------//
if ($action=="update_smallpic")
{
$pic=$_REQUEST["pic"];
$lianjie=$_REQUEST["lianjie"];

$arrayInsert=array(pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"hn_index_smallpic","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/GUANGGAO3.PHP");
}
//-----------------专题图片-----------------//
if ($action=="update_zt_pic")
{
$pic=$_REQUEST["pic"];
$lianjie=$_REQUEST["lianjie"];

$arrayInsert=array(pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"zt_pic","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/zt_pic.PHP");
}
//-----------------添加会员图库-----------------//
if ($action=="UserPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("相册新建成功!","../akg.php?action=PicShow");
}
//-----------------添加专场会员图库-----------------//
if ($action=="buy_UserPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("相册新建成功!","../buy.php?action=PicShow");
}
//-----------------添加地产会员图库-----------------//
if ($action=="dichang_UserPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("相册新建成功!","../dichang.php?action=PicShow");
}
//-----------------添加个人会员图库-----------------//
if ($action=="gerenPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("相册新建成功!","../geren.php?action=PicShow");
}
//-----------------修改会员图库-----------------//
if ($action=="Update_UserPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("数据更新成功!","../akg.php?action=PicShow&key=ShenHe1");
}
//-----------------修改商会会员图库-----------------//
if ($action=="Update_institute_UserPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("数据更新成功!","../institute.php?action=PicShow&key=ShenHe1");
}
//-----------------修改专场会员图库-----------------//
if ($action=="Update_buy_UserPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("数据更新成功!","../buy.php?action=PicShow&key=ShenHe1");
}
//-----------------修改地产会员图库-----------------//
if ($action=="Update_dichang_UserPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("数据更新成功!","../dichang.php?action=PicShow&key=ShenHe1");
}
//-----------------修改个人会员图库-----------------//
if ($action=="Update_gerenPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("数据更新成功!","../geren.php?action=PicShow&key=ShenHe1");
}
//----------------会员品牌日志----------------//
if ($action=="Into_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("日志添加成功!","../akg.php?action=User_new");
}
//----------------专场会员日志----------------//
if ($action=="Into_buy_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("日志添加成功!","../buy.php?action=User_new");
}
//----------------地产会员日志----------------//
if ($action=="Into_dichang_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("日志添加成功!","../dichang.php?action=User_new");
}
//----------------商会会员日志----------------//
if ($action=="Into_institute_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("日志添加成功!","../institute.php?action=User_new");
}
//----------------个人会员日志----------------//
if ($action=="geren_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("日志添加成功!","../geren.php?action=geren_new");
}
//-----------------管理员修改用户信息-----------------//
if ($action=="admin_update_user")
{
$user_name=$_REQUEST["user_name"];
$user_pass=$_REQUEST["user_pass"];
if ($user_pass==""){
$ob->ShowMsg("密码不能为空!","");
}

$arrayInsert=array(user=>$user_name,pass=>md5($user_pass));
$user_update=$ob->upData($arrayInsert,"web_user","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/User.php");
}
//-----------------管理员修改用户信息-----------------//
if ($action=="admin_update_name")
{
$email=$_REQUEST["email"];
$dizhi=$_REQUEST["dizhi"];
$xingbie=$_REQUEST["xingbie"];
$shengri=$_REQUEST["shengri"];
$name=$_REQUEST["name"];
$shouji=$_REQUEST["shouji"];
$qq=$_REQUEST["qq"];
$about=$_REQUEST["about"];
$userpic=$_REQUEST["UserPic"];

$arrayInsert=array(Email=>$email,Dizhi=>$dizhi,Name=>$name,Tel=>$shouji,Jianjie=>$about,Pic=>$userpic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("数据更新成功!","../admin/Update_User.php?ID=".$ID."");
}
//-----------------审核图片-----------------//
if ($action=="ShenHe_UserPic")
{
$arrayInsert=array(ShenHe=>2);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("审核条件已修改!","../admin/UserPic.php");
}
//----------------添加图库----------------//
if ($action=="into_tuku"){

$TITLE=$_REQUEST["TITLE"];
$BigClass=$_REQUEST["BigClass"];
$small_pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(TITLE=>$TITLE,BigClass=>$BigClass,Pic=>$small_pic,Jieshao=>$Jieshao);
$ob->addData($arrayInsert,"hn_mingren");
$ob->ShowMsg("信息添加成功!","../admin/tuku2.php?ID=".$BigClass."");
}
//----------------添加摄影图库----------------//
if ($action=="into_sy_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=1;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_all");
$ob->ShowMsg("上传成功!","../admin/sy_tuku.php");
}
//----------------添加设计图库----------------//
if ($action=="into_sj_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_sj");
$ob->ShowMsg("上传成功!","../admin/sj_tuku.php");
}
//----------------添加矢量图库----------------//
if ($action=="into_sl_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_sl");
$ob->ShowMsg("上传成功!","../admin/sl_tuku.php");
}
//----------------添加经典图库----------------//
if ($action=="into_jd_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_jd");
$ob->ShowMsg("上传成功!","../admin/tuku_jd.php");
}
//----------------添加图库社区----------------//
if ($action=="into_sq_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_sq");
$ob->ShowMsg("上传成功!","../admin/tuku_sq.php");
}
//----------------添加原创作品----------------//
if ($action=="into_yuanchang"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_yuanchang");
$ob->ShowMsg("上传成功!","../admin/yuanchang.php");
}
//----------------添加高清----------------//
if ($action=="into_gao"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_gao_tuku");
$ob->ShowMsg("上传成功!","../admin/gao_tuku.php");
}
//----------------添加源文件----------------//
if ($action=="into_yuanwen"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_yuanwen");
$ob->ShowMsg("上传成功!","../admin/yuanwen.php");
}
//----------------添加图库----------------//
if ($action=="into_tuku"){

$TITLE=$_REQUEST["TITLE"];
$BigClass=$_REQUEST["BigClass"];
$small_pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(TITLE=>$TITLE,BigClass=>$BigClass,Pic=>$small_pic,Jieshao=>$Jieshao);
$ob->addData($arrayInsert,"hn_mingren");
$ob->ShowMsg("信息添加成功!","../admin/tuku2.php?ID=".$BigClass."");
}
//----------------修改图库----------------//
if ($action=="update_tuku"){

$ID1=$_REQUEST["ID1"];
$TITLE=$_REQUEST["TITLE"];
$small_pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(TITLE=>$TITLE,Jieshao=>$Jieshao,Pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_mingren","ID",$ID1);
$ob->ShowMsg("信息修改成功!","../admin/tuku2.php?ID=".$ID."");
}
//----------------修改图库----------------//
if ($action=="update_tuku_big"){

$BigID=$_REQUEST["BigID"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];
$Big=$_REQUEST["Big"];

$arrayInsert=array(Name=>$Name,Big=>$Big,Pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_mingren_big","ID",$ID);
$ob->ShowMsg("信息修改成功!","../admin/tuku1.php?BigID=".$BigID."");
}
//----------------修改摄影图库----------------//
if ($action=="update_sy_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_all","id",$id);
$ob->ShowMsg("信息修改成功!","../admin/sy_tuku.php");
}
//----------------修改设计图库----------------//
if ($action=="update_sj_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_sj","id",$id);
$ob->ShowMsg("信息修改成功!","../admin/sj_tuku.php");
}
//----------------修改矢量图库----------------//
if ($action=="update_sl_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_sl","id",$id);
$ob->ShowMsg("信息修改成功!","../admin/sl_tuku.php");
}
//----------------修改经典图库----------------//
if ($action=="update_jd_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_jd","id",$id);
$ob->ShowMsg("信息修改成功!","../admin/tuku_jd.php");
}
//----------------修改图库社区----------------//
if ($action=="update_sq_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_sq","id",$id);
$ob->ShowMsg("信息修改成功!","../admin/tuku_sq.php");
}
//----------------修改原创作品----------------//
if ($action=="update_yuanchang"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_yuanchang","id",$id);
$ob->ShowMsg("信息修改成功!","../admin/yuanchang.php");
}
//----------------修改高清----------------//
if ($action=="hn_gao_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_gao_tuku","id",$id);
$ob->ShowMsg("信息修改成功!","../admin/gao_tuku.php");
}
//----------------修改源文件----------------//
if ($action=="hn_yuanwen"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_yuanwen","id",$id);
$ob->ShowMsg("信息修改成功!","../admin/yuanwen.php");
}
//----------------专题页留言----------------//
if ($action=="zhuanti_liuyan"){

$action_user=$_REQUEST["action_user"];
$User=$_REQUEST["User"];
$User_ID=$_REQUEST["User_ID"];
$Conter=$_REQUEST["Conter"];

$arrayInsert=array(User=>$User,Conter=>$Conter,User_ID=>$User_ID);
$ob->addData($arrayInsert,"hn_zhuanti_liuyan");
if ($action_user==""){
$ob->ShowMsg("留言添加成功!","../user_zhuanti.php");
}else{
$ob->ShowMsg("留言添加成功!","../user_zhuanti.php?action_user=".$action_user."");
}
}

//----------------专题页留言----------------//
if ($action=="z"){

$action_user=$_REQUEST["action_user"];
$User=$_REQUEST["User"];
$User_ID=$_REQUEST["User_ID"];
$Conter=$_REQUEST["Conter"];

$arrayInsert=array(User=>$User,Conter=>$Conter,User_ID=>$User_ID);
$ob->addData($arrayInsert,"hn_zhuanti_liuyan");
if ($action_user==""){
$ob->ShowMsg("留言添加成功!","../4.php");
}else{
$ob->ShowMsg("留言添加成功!","../4.php?action_user=".$action_user."");
}
}
//----------------添加q----------------//
if ($action=="users"){

$name1=$_REQUEST["name1"];
$pass=$_REQUEST["pass"];
$guan=$_REQUEST["guan"];

$lianxi=$_REQUEST["lianxi"];
$souzhai=$_REQUEST["souzhai"];

$jz=$_REQUEST["jz"];
$small_pic=$_REQUEST["small_pic"];

$y=$_REQUEST["y"];
    if(!empty($y)) {  
    $expr = join(",", $y);  
    } 

$arrayInsert=array(title=>$name1,pro_can2=>$pass,pro_can4=>$guan,pro_can3=>$lianxi,pro_can1=>$souzhai,f_body=>$jz,img_sl=>"upimg/".$small_pic,lm=>$expr,px=>"100",tuijian=>"no",pass=>"yes",hot=>"no",wtime=>time(),ip=>"getip()");
$ob->addData($arrayInsert,"pro_co");
if($expr==12){
$ob->ShowMsg("提交成功!","../time.php");
}elseif($expr==9){
$ob->ShowMsg("提交成功!","../yingsh.php");
}elseif($expr==10){
$ob->ShowMsg("提交成功!","../all_jianzheng.php");
}elseif($expr==11){
$ob->ShowMsg("提交成功!","../bao.php");
}elseif($expr==13){
$ob->ShowMsg("提交成功!","../yue.php");
}elseif($expr==14){
$ob->ShowMsg("提交成功!","../jianti.php");
}elseif($expr==15){
$ob->ShowMsg("提交成功!","../ts.php");
}elseif($expr==16){
$ob->ShowMsg("提交成功!","../yanlao.php");
}elseif($expr==17){
$ob->ShowMsg("提交成功!","../yys.php");
}elseif($expr==10){
$ob->ShowMsg("提交成功!","../guanjian.php");
}
}
//----------------添加商会相片----------------//
if ($action=="user_institute_upfiletppic"){

$Pic=$_REQUEST["Pic"];
$Title=$_REQUEST["Title"];
$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic,Title=>$Title,Pic_Big=>$Pic_Big);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("图片上传成功!","../institute.php?action=PicShow");
}
//----------------添加品牌相片----------------//
if ($action=="user_upfiletppic"){

$Pic=$_REQUEST["Pic"];
$Title=$_REQUEST["Title"];
$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic,Title=>$Title,Pic_Big=>$Pic_Big);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("图片上传成功!","../akg.php?action=PicShow");
}
//----------------添加专场相片----------------//
if ($action=="user_buy_upfiletppic"){

$Pic=$_REQUEST["Pic"];
$Title=$_REQUEST["Title"];
$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic,Title=>$Title,Pic_Big=>$Pic_Big);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("图片上传成功!","../buy.php?action=PicShow");
}
//----------------添加地产相片----------------//
if ($action=="user_dichang_upfiletppic"){

$Pic=$_REQUEST["Pic"];
$Title=$_REQUEST["Title"];
$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic,Title=>$Title,Pic_Big=>$Pic_Big);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("图片上传成功!","../dichang.php?action=PicShow");
}
//----------------添加个人相片----------------//
if ($action=="geren_upfiletppic"){
$User=$_REQUEST["username"];
$Pic=$_REQUEST["UserPic"];
//$Title=$_REQUEST["Title"];
//$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic);
$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("图片上传成功!","../geren.php?action=PicShow");
}
//----------------修改形象----------------//
if ($action=="update_xingxiang"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息修改成功!","../akg.php");
}
//----------------修改专场形象----------------//
if ($action=="update_buy_xingxiang"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息修改成功!","../buy.php");
}
//----------------修改地产形象----------------//
if ($action=="update_dichang_xingxiang"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息修改成功!","../dichang.php");
}
//----------------修改专场形象----------------//
if ($action=="update_institute_xingxiang"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息修改成功!","../institute.php");
}
//----------------修改个人形象----------------//
if ($action=="update_geren_xx"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_userpic_small","User",$User);
$ob->ShowMsg("信息修改成功!","../geren.php");
}
//----------------修改公告----------------//
if ($action=="update_gonggao1"){

$User=$_REQUEST["username"];
$Jianjie=$_REQUEST["Jianjie"];
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Jianjie=>$Jianjie,Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息修改成功!","../akg.php?action=jianjie");
}
//----------------修改专场公告----------------//
if ($action=="update_buy_gonggao1"){

$User=$_REQUEST["username"];
$Jianjie=$_REQUEST["Jianjie"];
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Jianjie=>$Jianjie,Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息修改成功!","../buy.php?action=jianjie");
}
//----------------修改地产公告----------------//
if ($action=="update_dichang_gonggao1"){

$User=$_REQUEST["username"];
$Jianjie=$_REQUEST["Jianjie"];
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Jianjie=>$Jianjie,Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息修改成功!","../dichang.php?action=jianjie");
}
//----------------修改商会公告----------------//
if ($action=="update_institute_gonggao1"){

$User=$_REQUEST["username"];
$Jianjie=$_REQUEST["Jianjie"];
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Jianjie=>$Jianjie,Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息修改成功!","../institute.php?action=jianjie");
}
//----------------修改品牌资料----------------//
if ($action=="update_akg_ziliao"){

$User=$_REQUEST["username"];
$BigClass=1;
$Dizhi=$_REQUEST["Dizhi"];
$Name=$_REQUEST["Name"];
$Tel=$_REQUEST["Tel"];
$qq=$_REQUEST["qq"];
$xingbie=$_REQUEST["xingbie"];
$nian=$_REQUEST["nian"];
$Email=$_REQUEST["Email"];
$Chuanzhen=$_REQUEST["Chuanzhen"];
$Youbian=$_REQUEST["Youbian"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../akg.php?action=ziliao");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../akg.php?action=ziliao");
}
}
//----------------修改专卖资料----------------//
if ($action=="update_buy_ziliao"){

$User=$_REQUEST["username"];
$BigClass=2;
$Dizhi=$_REQUEST["Dizhi"];
$Name=$_REQUEST["Name"];
$Tel=$_REQUEST["Tel"];
$xingbie=$_REQUEST["xingbie"];
$nian=$_REQUEST["nian"];
$qq=$_REQUEST["qq"];
$Email=$_REQUEST["Email"];
$Chuanzhen=$_REQUEST["Chuanzhen"];
$Youbian=$_REQUEST["Youbian"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../buy.php?action=ziliao");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../buy.php?action=ziliao");
}
}
//----------------修改地产资料----------------//
if ($action=="update_dichang_ziliao"){

$User=$_REQUEST["username"];
$BigClass=5;
$Dizhi=$_REQUEST["Dizhi"];
$Name=$_REQUEST["Name"];
$Tel=$_REQUEST["Tel"];
$xingbie=$_REQUEST["xingbie"];
$nian=$_REQUEST["nian"];
$qq=$_REQUEST["qq"];
$Email=$_REQUEST["Email"];
$Chuanzhen=$_REQUEST["Chuanzhen"];
$Youbian=$_REQUEST["Youbian"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../dichang.php?action=UserZhaoPian");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../dichang.php?action=UserZhaoPian");
}
}
//===========================修改专卖用户信息============================//
if ($action=="update_buy"){

$actio=$_REQUEST["actio"];
$userpic=$_REQUEST["UserPic"];
$about=$_REQUEST["about"];
$username=$_COOKIE["username"];
$user_pass=$_REQUEST["user_pass"];
$user_pass1=$_REQUEST["user_pass1"];
$tiwen=$_REQUEST["tiwen"];
$huida=$_REQUEST["huida"];
$Dizhi=$_REQUEST["Dizhi"];
$xingbie=$_REQUEST["xingbie"];
$shengri=$_REQUEST["nian"]."/".$_REQUEST["yue"]."/".$_REQUEST["ri"];
$Name=$_REQUEST["Name"];
$Tel=$_REQUEST["Tel"];
$qq=$_REQUEST["qq"];
$Email=$_REQUEST["Email"];
$Chuanzhen=$_REQUEST["Chuanzhen"];
$Youbian=$_REQUEST["Youbian"];

if ($user_pass!=$user_pass1)
{
  $ob->ShowMsg("两次输入的密码不同!","");
}
if ($actio=="pass"){
$arrayInsert=array(pass=>md5($user_pass),tiwen=>$tiwen,huida=>$huida);
}elseif ($actio=="ziliao"){
$arrayInsert=array(Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
}elseif ($actio=="jianjie"){
$arrayInsert=array(about=>$about);
}elseif ($actio=="xingxiang"){
$arrayInsert=array(userpic=>$userpic);
}
$user_update=$ob->upData($arrayInsert,"web_user","user",$username);
$ob->ShowMsg("资料更新成功!","");
}
//===========================修改商会用户信息============================//
if ($action=="update_institute_userconter"){

$actio=$_REQUEST["actio"];
$userpic=$_REQUEST["UserPic"];
$about=$_REQUEST["about"];
$username=$_COOKIE["username"];
$user_pass=$_REQUEST["user_pass"];
$user_pass1=$_REQUEST["user_pass1"];
$tiwen=$_REQUEST["tiwen"];
$huida=$_REQUEST["huida"];
$Dizhi=$_REQUEST["Dizhi"];
$xingbie=$_REQUEST["xingbie"];
$shengri=$_REQUEST["nian"]."/".$_REQUEST["yue"]."/".$_REQUEST["ri"];
$Name=$_REQUEST["Name"];
$Tel=$_REQUEST["Tel"];
$qq=$_REQUEST["qq"];
$Email=$_REQUEST["Email"];
$Chuanzhen=$_REQUEST["Chuanzhen"];
$Youbian=$_REQUEST["Youbian"];

if ($user_pass!=$user_pass1)
{
  $ob->ShowMsg("两次输入的密码不同!","");
}
if ($actio=="pass"){
$arrayInsert=array(pass=>md5($user_pass),tiwen=>$tiwen,huida=>$huida);
}elseif ($actio=="ziliao"){
$arrayInsert=array(Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
}elseif ($actio=="jianjie"){
$arrayInsert=array(about=>$about);
}elseif ($actio=="xingxiang"){
$arrayInsert=array(userpic=>$userpic);
}
$user_update=$ob->upData($arrayInsert,"web_user","user",$username);
$ob->ShowMsg("资料更新成功!","");
}
//----------------修改商会资料----------------//
if ($action=="update_institute_ziliao"){

$User=$_REQUEST["username"];
$BigClass=3;
$Dizhi=$_REQUEST["Dizhi"];
$Name=$_REQUEST["Name"];
$Tel=$_REQUEST["Tel"];
$xingbie=$_REQUEST["xingbie"];
$nian=$_REQUEST["nian"];
$qq=$_REQUEST["qq"];
$Email=$_REQUEST["Email"];
$Chuanzhen=$_REQUEST["Chuanzhen"];
$Youbian=$_REQUEST["Youbian"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../institute.php?action=ziliao");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../institute.php?action=ziliao");
}
}
//----------------修改个人资料----------------//

if ($action=="update_geren_ziliao"){

$User=$_REQUEST["username"];
$BigClass=4;
$Dizhi=$_REQUEST["Dizhi"];
$xingbie=$_REQUEST["xingbie"];
$Name=$_REQUEST["Name"];
$Tel=$_REQUEST["Tel"];
$nian=$_REQUEST["nian"];
$qq=$_REQUEST["qq"];
$Email=$_REQUEST["Email"];
$Chuanzhen=$_REQUEST["Chuanzhen"];
$Youbian=$_REQUEST["Youbian"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,Dizhi=>$Dizhi,xingbie=>$xingbie,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../geren.php?action=ziliao");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,Dizhi=>$Dizhi,xingbie=>$xingbie,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../geren.php?action=ziliao");
}
}
//----------------修改品牌资料----------------//
if ($action=="update_jiben"){

$User=$_REQUEST["User"];
$Hangye_BigClass=$_REQUEST["Hangye_BigClass"];
$KaiyeDatatime=$_REQUEST["KaiyeDatatime"];
$XiangmuBig=$_REQUEST["XiangmuBig"];
$ShangyeMianji=$_REQUEST["ShangyeMianji"];
$ZujinMoshi=$_REQUEST["ZujinMoshi"];
$XiangmuDizhi=$_REQUEST["XiangmuDizhi"];
$Yaoqiu=$_REQUEST["Yaoqiu"];
$Zhuangtai=$_REQUEST["Zhuangtai"];
$Youxiaoqi=$_REQUEST["Youxiaoqi"];
$Suozai=$_REQUEST["Suozai"];
$Tingchewei=$_REQUEST["Tingchewei"];
$Quancheng=$_REQUEST["Quancheng"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../akg.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../akg.php?action=jiben");
}
}
//----------------修改专场资料----------------//
if ($action=="update_buy_jiben"){

$User=$_REQUEST["User"];
$Hangye_BigClass=$_REQUEST["Hangye_BigClass"];
$KaiyeDatatime=$_REQUEST["KaiyeDatatime"];
$XiangmuBig=$_REQUEST["XiangmuBig"];
$ShangyeMianji=$_REQUEST["ShangyeMianji"];
$ZujinMoshi=$_REQUEST["ZujinMoshi"];
$XiangmuDizhi=$_REQUEST["XiangmuDizhi"];
$Yaoqiu=$_REQUEST["Yaoqiu"];
$Zhuangtai=$_REQUEST["Zhuangtai"];
$Youxiaoqi=$_REQUEST["Youxiaoqi"];
$Suozai=$_REQUEST["Suozai"];
$Tingchewei=$_REQUEST["Tingchewei"];
$Quancheng=$_REQUEST["Quancheng"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../buy.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../buy.php?action=jiben");
}
}
//----------------修改商业地产资料----------------//
if ($action=="update_dichang_jiben"){

$User=$_REQUEST["User"];
$Hangye_BigClass=$_REQUEST["Hangye_BigClass"];
$KaiyeDatatime=$_REQUEST["KaiyeDatatime"];
$XiangmuBig=$_REQUEST["XiangmuBig"];
$ShangyeMianji=$_REQUEST["ShangyeMianji"];
$ZujinMoshi=$_REQUEST["ZujinMoshi"];
$XiangmuDizhi=$_REQUEST["XiangmuDizhi"];
$Yaoqiu=$_REQUEST["Yaoqiu"];
$Zhuangtai=$_REQUEST["Zhuangtai"];
$Youxiaoqi=$_REQUEST["Youxiaoqi"];
$Suozai=$_REQUEST["Suozai"];
$Tingchewei=$_REQUEST["Tingchewei"];
$Quancheng=$_REQUEST["Quancheng"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../dichang.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../dichang.php?action=jiben");
}
}
//----------------修改商会资料----------------//
if ($action=="update_institute_jiben"){

$User=$_REQUEST["User"];
$Hangye_BigClass=$_REQUEST["Hangye_BigClass"];
$KaiyeDatatime=$_REQUEST["KaiyeDatatime"];
$XiangmuBig=$_REQUEST["XiangmuBig"];
$ShangyeMianji=$_REQUEST["ShangyeMianji"];
$ZujinMoshi=$_REQUEST["ZujinMoshi"];
$XiangmuDizhi=$_REQUEST["XiangmuDizhi"];
$Yaoqiu=$_REQUEST["Yaoqiu"];
$Zhuangtai=$_REQUEST["Zhuangtai"];
$Youxiaoqi=$_REQUEST["Youxiaoqi"];
$Suozai=$_REQUEST["Suozai"];
$Tingchewei=$_REQUEST["Tingchewei"];
$Quancheng=$_REQUEST["Quancheng"];

$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../institute.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../institute.php?action=jiben");
}
}
//----------------修改个人资料----------------//
if ($action=="update_geren"){

$User=$_REQUEST["User"];
$Hangye_BigClass=$_REQUEST["Hangye_BigClass"];

$XiangmuDizhi=$_REQUEST["XiangmuDizhi"];
$Yaoqiu=$_REQUEST["Yaoqiu"];


$Suozai=$_REQUEST["Suozai"];


$user_update=$ob->isRecord("hn_zhuanti","User",$User);

if ($user_update=="")
{
$arrayInsert=array(User=>$User,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Hangye_BigClass=>$Hangye_BigClass);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("信息保存成功!","../geren.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("信息保存成功!","../geren.php?action=jiben");
}
}
//----------------添加品牌资料----------------//
if ($action=="into_akg_userziliao"){

$User=$_REQUEST["User"];
$Title=$_REQUEST["Title"];
$Text=$_REQUEST["Text"];

$arrayInsert=array(User=>$User,Title=>$Title,Pic=>$Text);
$ob->addData($arrayInsert,"hn_zhuanti_ziliao");
$ob->ShowMsg("文件上传成功!","../akg.php?action=update_userziliao");
}
//----------------添加商会资料----------------//
if ($action=="into_institute_userziliao"){

$User=$_REQUEST["User"];
$Title=$_REQUEST["Title"];
$Text=$_REQUEST["Text"];

$arrayInsert=array(User=>$User,Title=>$Title,Pic=>$Text);
$ob->addData($arrayInsert,"hn_zhuanti_ziliao");
$ob->ShowMsg("文件上传成功!","../institute.php?action=update_userziliao");
}
//----------------添加地产资料----------------//
if ($action=="into_dichang_userziliao"){

$User=$_REQUEST["User"];
$Title=$_REQUEST["Title"];
$Text=$_REQUEST["Text"];

$arrayInsert=array(User=>$User,Title=>$Title,Pic=>$Text);
$ob->addData($arrayInsert,"hn_zhuanti_ziliao");
$ob->ShowMsg("文件上传成功!","../dichang.php?action=update_userziliao");
}
//----------------添加个人资料----------------//
if ($action=="into_gerenziliao"){

$User=$_REQUEST["User"];
$Title=$_REQUEST["Title"];
$Text=$_REQUEST["Text"];

$arrayInsert=array(User=>$User,Title=>$Title,Pic=>$Text);
$ob->addData($arrayInsert,"hn_zhuanti_ziliao");
$ob->ShowMsg("图片上传成功!","../geren.php?action=update_userziliao");
}
//----------------新建图库----------------//
if ($action=="into_tuku_big"){

$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];
$Big=$_REQUEST["Big"];

$arrayInsert=array(Name=>$Name,Big=>$Big,Pic=>$small_pic);
$ob->addData($arrayInsert,"hn_mingren_big");
$ob->ShowMsg("新建成功!","../admin/tuku1.php?BigID=".$Big."");
}
//-------------地产下载扣积分-------------------//
if ($action=="dichang_download"){

$User=$_REQUEST["User"];
$act=$_REQUEST["download"];

$arrayInsert=array(User=>$User,act=>$act);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","user",$User);
$ob->ShowMsg("下载成功!","../dichang.php");
}

//--------------------------------//
if ($action=="Into_maichang"){

$User=$_REQUEST["User"];
$User1=$_REQUEST["User1"];

$arrayInsert=array(BigClass=>$User);
$user_update=$ob->upData($arrayInsert,"web_user","user",$User1);
$ob->ShowMsg("信息添加成功!","../admin/User.php");
}
//--------------------------------//
if ($action=="update_maichang"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(BigClass=>"");
$user_update=$ob->upData($arrayInsert,"web_user","ID",$ID);
$ob->ShowMsg("修改为品牌用户!","../admin/User.php");
}
//--------------------------------//
if ($action=="update_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../akg.php");
}
//---------------商会地图-----------------//
if ($action=="update_institute_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../institute.php");
}
//---------------专卖地图-----------------//
if ($action=="update_buy_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../buy.php");
}
//---------------地产地图-----------------//
if ($action=="update_dichang_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../dichang.php");
}
//------------个人地图--------------------//
if ($action=="update_geren_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../geren.php?action=ziliao");
}
//--------------------------------//
if ($action=="tuijian_user"){

$ID=$_REQUEST["ID"];
$acti=$_REQUEST["acti"];
if ($acti=="tuijian"){
 $actio=1;
}elseif ($acti=="quxiao"){
 $actio="";
}

$arrayInsert=array(Tuijian=>$actio);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("修改成功!","../admin/User.php");
}
if ($action=="tuijian_user1"){

$ID=$_REQUEST["ID"];
$acti=$_REQUEST["acti"];
if ($acti=="tuijian"){
 $actio=1;
}elseif ($acti=="quxiao"){
 $actio="";
}

$arrayInsert=array(Tuijian=>$actio);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("修改成功!","../admin/show.php");
}
//----------------添加会员大类----------------//
if ($action=="Into_UserBigClass"){

$BigClass=$_REQUEST["BigClass"];
$Big=$_REQUEST["Big"];

$arrayInsert=array(BigClass=>$BigClass,Big=>$Big);
$ob->addData($arrayInsert,"hn_sousuo_big");
$ob->ShowMsg("新建成功!","../admin/User_hangyeBig.php");
}
//----------------设置会员等级----------------//
if ($action=="set_vip"){

$vip=$_REQUEST["vip"];

$arrayInsert=array(vip=>$vip);
$ob->addData($arrayInsert,"web_user");
$ob->ShowMsg("设置成功!","../admin/user.php");
}
//-----------------删除会员大类-----------------//
if ($action=="Del_UserBigClass")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_sousuo_big","ID",$ID);
 $ob->ShowMsg("数据删除成功!","../admin/User_hangyeBig.php");
}
//-------------修改会员大类-------------------//
if ($action=="Update_UserBigClass"){

$ID=$_REQUEST["ID"];
$BigClass=$_REQUEST["BigClass"];

$arrayInsert=array(BigClass=>$BigClass);
$user_update=$ob->upData($arrayInsert,"hn_sousuo_big","ID",$ID);
$ob->ShowMsg("修改成功!","../admin/User_hangyeBig.php");
}
//-------------修改品牌会员广告-------------------//
if ($action=="update_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../akg.php?action=ziliao");
}
//-------------修改专场会员广告-------------------//
if ($action=="update_buy_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../buy.php?action=ziliao");
}
//-------------修改地产会员广告-------------------//
if ($action=="update_dichang_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../dichang.php?action=ziliao");
}
//-------------修改地产会员广告-------------------//
if ($action=="update_dichang_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../dichang.php?action=ziliao");
}
//-------------修改商会会员广告-------------------//
if ($action=="update_institute_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../institute.php?action=ziliao");
}
//-----------------添加专场会员图库-----------------//
if ($action=="institute_UserPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("相册新建成功!","../institute.php?action=PicShow");
}

//-------------修改人个会员logo-------------------//
if ($action=="update_geren_logo"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(logo=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("资料保存成功!","../geren.php?action=ziliao");
}
//-------------修改独家推荐-------------------//
if ($action=="Update_dujia"){

$ID=$_REQUEST["ID"];

$user_update=$ob->isRecord("hn_zhuanti","Dujia","yes");
$arrayInsert=array(Dujia=>"no");
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","Dujia","yes");

$arrayInsert=array(Dujia=>"yes");
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);

$ob->ShowMsg("修改成功!","../admin/User.php");
}
//--------------------------------//
if ($action=="Remen_user"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(Remen=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("资料保存成功!","../admin/User.php");
}
//--------------------------------//
if ($action=="Remen"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(Remen=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("资料保存成功!","../admin/User.php");
}
//--------------------------------//
if ($action=="Del_Tuijian"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(Tuijian_xiangmu=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("资料保存成功!","../admin/User.php");
}
//--------------------------------//
if ($action=="Tuijian"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(Tuijian_xiangmu=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("资料保存成功!","../admin/User.php");
}
//-------------	取消专业热门-------------------//
if ($action=="Del_zhye_Tuijian"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(redian=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_xiangmu","ID",$ID);
$ob->ShowMsg("取消成功!","../admin/zhye.php");
}
//-------------	取消作品-------------------//
if ($action=="Del_zhping_Tuijian"){

$ID=$_REQUEST["id"];

$arrayInsert=array(tujian=>"");
$user_update=$ob->upData($arrayInsert,"hn_yuanchang","id",$ID);
$ob->ShowMsg("取消成功!","../admin/yuanchang.php");
}
//-----------------专业热门---------------//
if ($action=="zhye_Tuijian"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(redian=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_xiangmu","ID",$ID);
$ob->ShowMsg("推荐成功!","../admin/zhye.php");
}
//-----------------推荐作品---------------//
if ($action=="zhping_Tuijian"){

$ID=$_REQUEST["id"];

$arrayInsert=array(tujian=>1);
$user_update=$ob->upData($arrayInsert,"hn_yuanchang","id",$ID);
$ob->ShowMsg("推荐成功!","../admin/yuanchang.php");
}
//--------------------------------//
if ($action=="Del_Tuijian_new"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(TUIJIAN=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("资料保存成功!","../admin/ZHUANYE_NEW.PHP");
}
//--------------------------------//
if ($action=="Tuijian_new"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(TUIJIAN=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("资料保存成功!","../admin/ZHUANYE_NEW.PHP");
}
//--------------------------------//
if ($action=="Del_jingpin_new"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(JINGPIN=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("资料保存成功!","../admin/ZHUANYE_NEW.PHP");
}
//--------------------------------//
if ($action=="jingpin_new"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(JINGPIN=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("资料保存成功!","../admin/ZHUANYE_NEW.PHP");
}
//--------------------------------//
if ($action=="update_indexpic"){

$ID=$_REQUEST["ID"];
$pic=$_REQUEST["pic"];
$lianjie=$_REQUEST["lianjie"];

$arrayInsert=array(pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"hn_index_guanggao","ID",$ID);
$ob->ShowMsg("保存成功!","../admin/GUANGGAO3.PHP");
}
//--------------------------------//
if ($action=="update_web_pic"){

$ID=$_REQUEST["ID"];
$pic=$_REQUEST["pic"];
$lianjie=$_REQUEST["lianjie2"];

$arrayInsert=array(pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"hn_index_guanggao","ID",$ID);
$ob->ShowMsg("保存成功!","../admin/GUANGGAO3.PHP");
}
?>