<?php
include("function.php");
$action=$_REQUEST["action"];
$acti=$_REQUEST["acti"];
$ID=$_REQUEST["ID"];
//===========================�޸Ĺ���Ա����============================//
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
$ob->ShowMsg("����������!","");
return;
}
if ($new_pass<>$new_pass1)
{
  $ob->ShowMsg("������������벻��ͬ!","");
  return;
}
  $adminqx  = implode(',',$adminqx);
  $arrayInsert=array(adminpass=>md5($user_pass),adminname=>$name,admintel=>$usertel,adminqx=>",$adminqx");
  $user_update=$ob->upData($arrayInsert,"hn_admin","ID",$ID);
  $ob->ShowMsg("���ݸ��³ɹ�!","../admin/gl_user.php");
}
//-----------------ɾ������Ա-----------------//
if ($action=="del_haibao")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_haibao","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/gl_haibao.php");
}
//-----------------ɾ��ͼ��-----------------//
if ($action=="Del_tuku")
{
 $BigID=$_REQUEST["BigID"];
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_mingren","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/tuku2.php?ID=".$BigID."");
}
//-----------------ɾ��ͼ��-----------------//
if ($action=="Del_tuku_big")
{
 $BigID=$_REQUEST["BigID"];
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_mingren_big","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/tuku1.php?BigID=".$BigID."");
}
//-----------------ɾ����Ӱͼ��-----------------//
if ($action=="Del_sy_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_all","id",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/sy_tuku.php");
}
//-----------------ɾ�����ͼ��-----------------//
if ($action=="Del_sj_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_sj","id",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/sj_tuku.php");
}
//-----------------ɾ��ʸ��ͼ��-----------------//
if ($action=="Del_sl_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_sl","id",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/sl_tuku.php");
}
//-----------------ɾ������ͼ��-----------------//
if ($action=="Del_jd_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_jd","id",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/tuku_jd.php");
}
//-----------------ɾ��ͼ������-----------------//
if ($action=="Del_sq_tuku")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_tuku_sq","id",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/tuku_sq.php");
}
//-----------------ɾ��ԭ����Ʒ-----------------//
if ($action=="Del_yuanchang")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_yuanchang","id",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/yuanchang.php");
}
//-----------------ɾ������-----------------//
if ($action=="Del_gao")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_gao_tuku","id",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/gao_tuku.php");
}
//-----------------ɾ��Դ�ļ�-----------------//
if ($action=="Del_yuanwen")
{
 $ID=$_REQUEST["id"];
 $ob->delData("hn_yuanwen","id",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/yuanwen.php");
}
//-----------------ɾ������Ա-----------------//
if ($action=="del_user")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_admin","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/gl_user.php");
}

//-----------------ɾ��רҵ����-----------------//
if ($action=="DEL_ZHUANYE_NEW")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("HN_ZHUANYE_NEW","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/ZHUANYE_NEW.php");
}

//-----------------ɾ��ר��-----------------//
if ($action=="del_zt")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hu_zt_new","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/huanan_new.php");
}
//-----------------ɾ����ר����Ѷ-----------------//
if ($action=="del_xzt")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("pre_forum_notice","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/bbs.php");
}

//-----------------ɾ���̼�-----------------//
if ($action=="del_sj")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_sj","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/huanan_sj.php");
}
//-----------------ɾ������-----------------//
if ($action=="del_dujian")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("dujian","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/dujian.php");
}
//-----------------ɾ��ר������----------------//
if ($action=="del_ly")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_zt_pl","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/hn_pro.php");
}
//-----------------ɾ��רҵ�ز���Ŀ----------------//
if ($action=="del_zhuanye")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_zhuanye_xiangmu","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/zhye.php");
}
//-----------------ɾ����������-----------------//
if ($action=="del_lianjie")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_youqing","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/gl_lianjie.php");
}
//-----------------ɾ����ԱͼƬ-----------------//
if ($action=="Del_UserPic")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_userpic","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","");
}
//-----------------ɾ����̨�����Ա��־-----------------//
if ($action=="Del_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/UserNew.php?action=User_new");
}
//-----------------ɾ��Ʒ�ƻ�Ա��־-----------------//
if ($action=="Del_akg_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../akg.php?action=User_new");
}
//-----------------ɾ��ר����Ա��־-----------------//
if ($action=="Del_buy_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../buy.php?action=User_new");
}
//-----------------ɾ���̻��Ա��־-----------------//
if ($action=="Del_institute_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../institute.php?action=User_new");
}
//-----------------ɾ�����˻�Ա��־-----------------//
if ($action=="Del_geren_UserNew")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_usernew","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../geren.php?action=User_new");
}

//-----------------ɾ���������-----------------//
if ($action=="del_huoban")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_huoban","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/gl_huoban.php");
}//-----------------ɾ���������-----------------//
if ($action=="del_update_user")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("web_user","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/User.php");
}
//=====================================================//
//-----------------��ӹ���Ա-----------------//
if ($action=="into_user"){

$user_name=$_REQUEST["user_name"];
$user_pass=$_REQUEST["user_pass"];
$user_pass1=$_REQUEST["user_pass1"];
$name=$_REQUEST["name"];
$usertel=$_REQUEST["usertel"];
$adminqx=$_REQUEST["adminqx"];
if ($user_name=="" || $user_pass=="" || $user_pass1=="")
{
$ob->ShowMsg("��¼��Ϣ����Ϊ��!","");
return;
}

if ($user_pass!=$user_pass1)
{
$ob->ShowMsg("������������벻��ͬ!","");
return;
}
$adminqx  = implode(',',$adminqx);
$arrayInsert=array(adminuser=>$user_name,adminpass=>md5($user_pass),adminname=>$name,admintel=>$usertel,adminqx=>",$adminqx");

$ob->addData($arrayInsert,"hn_admin");
$ob->ShowMsg("�������ύ!","../admin/gl_user.php");
}

//-----------------�����������-----------------//
if ($action=="into_lianjie"){

$Name=$_REQUEST["Name"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(Name=>$Name,Lianjie=>$Lianjie);
$ob->addData($arrayInsert,"hn_youqing");
$ob->ShowMsg("�������ύ!","../admin/gl_lianjie.php");
}
//-----------------��Ӻ������-----------------//
if ($action=="into_huoban"){

$pic=$_REQUEST["pic"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(pic=>$pic,Lianjie=>$Lianjie);
$ob->addData($arrayInsert,"hn_huoban");
$ob->ShowMsg("�������ύ!","../admin/gl_huoban.php");
}
//==================================================//
//-----------------�޸���վ����-----------------//
if ($action=="update_biaoti")
{
$biaoti=$_REQUEST["biaoti"];

$arrayInsert=array(Biaoti=>$biaoti);
$user_update=$ob->upData($arrayInsert,"hn_about","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/biaoti.php");
}
//-----------------�޸Ĺ���-----------------//
if ($action=="update_gonggao")
{
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_about","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/gonggao.php");
}
//-----------------�޸���վ�ײ�-----------------//
if ($action=="update_botter")
{
$Content=$_REQUEST["Content"];

$arrayInsert=array(Botter=>$Content);
$user_update=$ob->upData($arrayInsert,"hn_about","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/update_botter.php");
}
//-----------------�޸���������-----------------//
if ($action=="update_lianjie")
{
$Name=$_REQUEST["Name"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(Name=>$Name,Lianjie=>$Lianjie);
$user_update=$ob->upData($arrayInsert,"hn_youqing","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/gl_lianjie.php");
}
//-----------------�޸ĺ������-----------------//
if ($action=="update_huoban")
{
$pic=$_REQUEST["pic"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(pic=>$pic,Lianjie=>$Lianjie);
$user_update=$ob->upData($arrayInsert,"hn_huoban","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/gl_huoban.php");
}
//-----------------�޸Ĺ��ͼƬ-----------------//
if ($action=="update_guanggao")
{
$pic=$_REQUEST["pic"];

$arrayInsert=array(pic=>$pic);
$user_update=$ob->upData($arrayInsert,"hn_guanggao","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/gl_guanggao.php");
}
//-----------------�޸Ĺ��ͼƬ-----------------//
if ($action=="UPDATE_PICGUANGGAO")
{
$pic=$_REQUEST["pic"];
$Lianjie=$_REQUEST["Lianjie"];

$arrayInsert=array(pic=>$pic,Lianjie=>$Lianjie);
$user_update=$ob->upData($arrayInsert,"hn_picguanggao","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/GUANGGAO2.PHP");
}
//-----------------�ӻ���-----------------//
if ($action=="up_pointss")
{
//$name=$_REQUEST["Name"];
$points=$_REQUEST["points"];

$arrayInsert=array(points=>$points);
$user_update=$ob->points($arrayInsert,"hn_zhuanti_ziliao","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/uu.php");
}
if ($action=="up_points")
{
//$name=$_REQUEST["Name"];
$a=$_REQUEST["points"];

//$arrayInsert=array(points=>$points);
$user_update=$ob->update1($a,"hn_zhuanti_ziliao","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/uu.php");
}
//-----------------�޸�רҵ�г���Ϣ-----------------//
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
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/ZHUANYE_NEW.PHP");
}
//-----------------�޸�רҵ�г���Ϣ-----------------//
if ($action=="update_conter_guanggao")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$conter=$_REQUEST["conter"];
$pic=$_REQUEST["pic"];
$LIANJIE=$_REQUEST["LIANJIE"];

$arrayInsert=array(TITLE=>$TITLE,conter=>$conter,pic=>$pic,LIANJIE=>$LIANJIE);
$user_update=$ob->upData($arrayInsert,"hn_conterguanggao","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/GUANGGAO1.PHP");
}

//-----------------���רҵ�г���Ϣ-----------------//
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
$ob->ShowMsg("�������ύ!","../admin/ZHUANYE_NEW.php");
}
//-----------------�������-----------------//
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
$ob->ShowMsg("�������ύ!","../admin/huanan_new.php");
}
//-----------------�޸�����-----------------//
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
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/huanan_new.PHP");
}

//-----------------����̼�-----------------//
if ($action=="INTO_SJ"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];

$BIG=$_REQUEST["BIG"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,BIG=>$BIG);
$ob->addData($arrayInsert,"hn_sj");
$ob->ShowMsg("�������ύ!","../admin/huanan_sj.php");
}
//-----------------�޸��̼�-----------------//
if ($action=="up_sj")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$conter=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];


$arrayInsert=array(TITLE=>$TITLE,conter=>$conter,PIC=>$PIC);
$user_update=$ob->upData($arrayInsert,"hn_sj","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/huanan_sj.PHP");
}

//-----------------��Ӷ���-----------------//
if ($action=="INTO_DUJIAN"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["LAIYUAN"];
$BIG=$_REQUEST["BIG"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,LAIYUAN=>$LAIYUAN,BIG=>$BIG);
$ob->addData($arrayInsert,"dujian");
$ob->ShowMsg("�������ύ!","../admin/dujian.php");
}
//-----------------���רҵ����-----------------//
if ($action=="INTO_ZHYE"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$PIC=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["lianjie"];

$arrayInsert=array(NAME=>$TITLE,PIC=>$PIC,LIANJIE=>$LAIYUAN);
$ob->addData($arrayInsert,"hn_zhuanye_xiangmu");
$ob->ShowMsg("�������ύ!","../admin/zhye.php");
}
//-----------------�޸Ķ���-----------------//
if ($action=="up_dujian")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$conter=$_REQUEST["Content"];
$pic=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["LAIYUAN"];

$arrayInsert=array(TITLE=>$TITLE,conter=>$conter,PIC=>$pic,LAIYUAN=>$LAIYUAN);
$user_update=$ob->upData($arrayInsert,"dujian","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/dujian.PHP");
}
//-----------------�޸�רҵ�ز���Ŀ-----------------//
if ($action=="up_zhuanye")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$pic=$_REQUEST["PIC"];
$LAIYUAN=$_REQUEST["LIANJIE"];

$arrayInsert=array(NAME=>$TITLE,PIC=>$pic,lianjie=>$LAIYUAN);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_xiangmu","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/zhye.PHP");
}
//-----------------����ͶƱ-----------------//
if ($action=="INTO_PRO"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,FABUREN=>$FABUREN,BIG=>$BIG);
$ob->addData($arrayInsert,"hn_pro");
$ob->ShowMsg("�������ύ!","../admin/hn_pro.php");
}


//-----------------����ר����Ѷ-----------------//
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
$ob->ShowMsg("�������ύ!","../admin/bbs.php");
}
//-----------------�޸�ר����Ѷ-----------------//
if ($action=="up_xzt")
{
$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$conter=$_REQUEST["Content"];
$pic=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];

$arrayInsert=array(TITLE=>$TITLE,conter=>$conter,PIC=>$pic,FABUREN=>$FABUREN);
$user_update=$ob->upData($arrayInsert,"pre_forum_notice","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/bbs.PHP");
}


//-----------------�����ʾ�-----------------//
if ($action=="INTO_WJ"){

$ID=$_REQUEST["ID"];
$TITLE=$_REQUEST["TITLE"];
$CONTER=$_REQUEST["Content"];
$PIC=$_REQUEST["PIC"];
$FABUREN=$_REQUEST["FABUREN"];
$BIG=$_REQUEST["BIG"];

$arrayInsert=array(TITLE=>$TITLE,CONTER=>$CONTER,PIC=>$PIC,FABUREN=>$FABUREN,BIG=>$BIG);
$ob->addData($arrayInsert,"hn_wj");
$ob->ShowMsg("�������ύ!","../admin/hn_wj.php");
}

//-----------------���רҵ�г���Ϣ-----------------//
if ($action=="into_pinglun"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$conter=$_REQUEST["conter"];


if (!$Username)
{
$ob->ShowMsg("���ȵ�¼��!","");
return;
}
if (!$conter)
{
$ob->ShowMsg("д��ʲô��!","");
return;
}

$arrayInsert=array(USER=>$Username,CONTER=>$conter,NEW_ID=>$NEW_ID);
$ob->addData($arrayInsert,"hn_pinglun");
$ob->ShowMsg("�������ύ!","../NEW_CONTER.PHP?ID=".$ID."");
}
//-----------------�������-----------------//
if ($action=="into"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$conter=$_REQUEST["conter"];


if (!$Username)
{
$ob->ShowMsg("���ȵ�¼��!","");
return;
}
if (!$conter)
{
$ob->ShowMsg("д��ʲô��!","");
return;
}

$arrayInsert=array(USER=>$Username,CONTER=>$conter,NEW_ID=>$NEW_ID);
$ob->addData($arrayInsert,"hn_pinglun");
$ob->ShowMsg("�������ύ!","../bbs_conter.PHP?ID=".$ID."");
}
//-----------------����ר��-----------------//
if ($action=="into_zati"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];

$conter=$_REQUEST["conter"];
$title=$_REQUEST["title"];

if (!$Username)
{
$ob->ShowMsg("���ȵ�¼��!","");
return;
}
if (!$conter)
{
$ob->ShowMsg("д��ʲô��!","");
return;
}

$arrayInsert=array(USER=>$Username,CONTER=>$conter,title=>$title,NEW_ID=>$NEW_ID);
$ob->addData($arrayInsert,"hn_ZT_PL");
$ob->ShowMsg("�������ύ!","../new_cot.PHP?ID=".$ID."");
}
//-----------------���רҵ�г���Ϣ-----------------//
if ($action=="into_haibao"){

$NAME=$_REQUEST["NAME"];
$LIANJIE=$_REQUEST["LIANJIE"];
$PIC=$_REQUEST["pic"];

$arrayInsert=array(NAME=>$NAME,LIANJIE=>$LIANJIE,PIC=>$PIC);
$ob->addData($arrayInsert,"hn_haibao");
$ob->ShowMsg("�������ύ!","../admin/gl_haibao.php");
}

//-----------------��ͶƱ�Ĵ���-----------------//
if ($action=="do_pro"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$n=$_REQUEST["n"];


if (!$Username)
{
$ob->ShowMsg("���ȵ�¼��!","");
return;
}
if (!$n)
{
$ob->ShowMsg("д��ʲô��!","");
return;
}

$arrayInsert=array(USER=>$Username,n=>$n,USER_ID=>$NEW_ID);
$user_update=$ob->upData($arrayInsert,"pre_forum_notice","id",$NEW_ID);
$ob->ShowMsg("�������ύ!","");
}
//-----------------��ר��ͶƱ�Ĵ���-----------------//
if ($action=="zt_pro"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$n=$_REQUEST["n"];


if (!$Username)
{
$ob->ShowMsg("���ȵ�¼��!","");
return;
}
if (!$n)
{
$ob->ShowMsg("д��ʲô��!","");
return;
}

$arrayInsert=array(USER=>$Username,n=>$n,USER_ID=>$NEW_ID);
$user_update=$ob->upData($arrayInsert,"hu_zt_new","id",$NEW_ID);
$ob->ShowMsg("�������ύ!","");
}
//-----------------��ר���ʾ�Ĵ���-----------------//
if ($action=="zt_wj"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$w=$_REQUEST["w"];


if (!$Username)
{
$ob->ShowMsg("���ȵ�¼��!","");
return;
}
if (!$w)
{
$ob->ShowMsg("д��ʲô��!","");
return;
}

$arrayInsert=array(USER=>$Username,w=>$w,USER_ID=>$NEW_ID);
$user_update=$ob->upData($arrayInsert,"hu_zt_new","id",$NEW_ID);
$ob->ShowMsg("�������ύ!","");
}

//-----------------���ʾ�Ĵ���-----------------//
if ($action=="do_wj"){

$NEW_ID=$_REQUEST["ID"];
$Username=$_REQUEST["Username"];
$w=$_REQUEST["w"];


if (!$Username)
{
$ob->ShowMsg("���ȵ�¼��!","");
return;
}
if (!$w)
{
$ob->ShowMsg("д��ʲô��!","");
return;
}

$arrayInsert=array(USER=>$Username,w=>$w,NEW_ID=>$NEW_ID);
$user_update=$ob->upData($arrayInsert,"pre_forum_notice","id",$NEW_ID);
$ob->ShowMsg("�������ύ!","");
}
//-----------------�޸���վ����-----------------//
if ($action=="update_haibao")
{
$NAME=$_REQUEST["NAME"];
$LIANJIE=$_REQUEST["LIANJIE"];
$PIC=$_REQUEST["pic"];

$arrayInsert=array(NAME=>$NAME,LIANJIE=>$LIANJIE,PIC=>$PIC);
$user_update=$ob->upData($arrayInsert,"hn_haibao","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/gl_haibao.php");
}
//-----------------��ҳ�õ�Ƭ-----------------//
if ($action=="update_index_pic")
{
$lianjie=$_REQUEST["lianjie"];
$title=$_REQUEST["title"];
$pic=$_REQUEST["pic"];

$arrayInsert=array(title=>$title,pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"hn_huandeng","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/gl_huandeng.php?actio=index_pic");
}
//-----------------�������߻õ�Ƭ-----------------//
if ($action=="update_yishu_pic")
{
$title=$_REQUEST["title"];
$pic=$_REQUEST["pic"];
$small=$_REQUEST["small_pic"];

$arrayInsert=array(title=>$title,pic=>$pic,small=>$small);
$user_update=$ob->upData($arrayInsert,"hn_huandeng1","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/gl_huandeng.php?actio=yishu_pic");
}
//-----------------�������߻õ�Ƭ-----------------//
if ($action=="update_zhuanye_big")
{
$big=$_REQUEST["big"];

$arrayInsert=array(big=>$big);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_big","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/web_big.php");
}
if ($action=="update_xueyuan_big")
{
$big=$_REQUEST["big"];

$arrayInsert=array(big=>$big);
$user_update=$ob->upData($arrayInsert,"hn_xueyuan_big","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/web_big.php");
}
if ($action=="update_paimai_big")
{
$big=$_REQUEST["big"];

$arrayInsert=array(big=>$big);
$user_update=$ob->upData($arrayInsert,"hn_paimai_big","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/web_big.php");
}
if ($action=="update_yishu_big")
{
$big=$_REQUEST["big"];

$arrayInsert=array(big=>$big);
$user_update=$ob->upData($arrayInsert,"hn_yishu_big","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/web_big.php");
}
//-----------------���רҵ�г���Ϣ-----------------//
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

$ob->ShowMsg("�������ύ!","../admin/web_big.php");
}
//-----------------ɾ������Ա-----------------//
if ($action=="del_zhuanye_big")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_zhuanye_big","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/web_big.php");
}
if ($action=="del_xueyuan_big")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_xueyuan_big","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/web_big.php");
}
if ($action=="del_paimai_big")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_paimai_big","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/web_big.php");
}
if ($action=="del_yishu_big")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_yishu_big","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/web_big.php");
}
//===========================�޸��û���Ϣ============================//
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
  $ob->ShowMsg("������������벻ͬ!","");
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
$ob->ShowMsg("���ϸ��³ɹ�!","");
}
//-----------------��ҳ��Сͼ-----------------//
if ($action=="update_smallpic")
{
$pic=$_REQUEST["pic"];
$lianjie=$_REQUEST["lianjie"];

$arrayInsert=array(pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"hn_index_smallpic","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/GUANGGAO3.PHP");
}
//-----------------ר��ͼƬ-----------------//
if ($action=="update_zt_pic")
{
$pic=$_REQUEST["pic"];
$lianjie=$_REQUEST["lianjie"];

$arrayInsert=array(pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"zt_pic","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/zt_pic.PHP");
}
//-----------------��ӻ�Աͼ��-----------------//
if ($action=="UserPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("����½��ɹ�!","../akg.php?action=PicShow");
}
//-----------------���ר����Աͼ��-----------------//
if ($action=="buy_UserPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("����½��ɹ�!","../buy.php?action=PicShow");
}
//-----------------��ӵز���Աͼ��-----------------//
if ($action=="dichang_UserPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("����½��ɹ�!","../dichang.php?action=PicShow");
}
//-----------------��Ӹ��˻�Աͼ��-----------------//
if ($action=="gerenPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("����½��ɹ�!","../geren.php?action=PicShow");
}
//-----------------�޸Ļ�Աͼ��-----------------//
if ($action=="Update_UserPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../akg.php?action=PicShow&key=ShenHe1");
}
//-----------------�޸��̻��Աͼ��-----------------//
if ($action=="Update_institute_UserPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../institute.php?action=PicShow&key=ShenHe1");
}
//-----------------�޸�ר����Աͼ��-----------------//
if ($action=="Update_buy_UserPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../buy.php?action=PicShow&key=ShenHe1");
}
//-----------------�޸ĵز���Աͼ��-----------------//
if ($action=="Update_dichang_UserPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../dichang.php?action=PicShow&key=ShenHe1");
}
//-----------------�޸ĸ��˻�Աͼ��-----------------//
if ($action=="Update_gerenPic")
{
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,PicTitle=>$PicTitle);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../geren.php?action=PicShow&key=ShenHe1");
}
//----------------��ԱƷ����־----------------//
if ($action=="Into_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("��־��ӳɹ�!","../akg.php?action=User_new");
}
//----------------ר����Ա��־----------------//
if ($action=="Into_buy_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("��־��ӳɹ�!","../buy.php?action=User_new");
}
//----------------�ز���Ա��־----------------//
if ($action=="Into_dichang_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("��־��ӳɹ�!","../dichang.php?action=User_new");
}
//----------------�̻��Ա��־----------------//
if ($action=="Into_institute_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("��־��ӳɹ�!","../institute.php?action=User_new");
}
//----------------���˻�Ա��־----------------//
if ($action=="geren_new"){

$User=$_COOKIE["username"];
$Title=$_REQUEST["Title"];
//$BigClass=$_REQUEST["BigClass"];
$Content=$_REQUEST["Content"];

$arrayInsert=array(User=>$User,Title=>$Title,Content=>$Content);
$ob->addData($arrayInsert,"hn_usernew");
$ob->ShowMsg("��־��ӳɹ�!","../geren.php?action=geren_new");
}
//-----------------����Ա�޸��û���Ϣ-----------------//
if ($action=="admin_update_user")
{
$user_name=$_REQUEST["user_name"];
$user_pass=$_REQUEST["user_pass"];
if ($user_pass==""){
$ob->ShowMsg("���벻��Ϊ��!","");
}

$arrayInsert=array(user=>$user_name,pass=>md5($user_pass));
$user_update=$ob->upData($arrayInsert,"web_user","ID",$ID);
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/User.php");
}
//-----------------����Ա�޸��û���Ϣ-----------------//
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
$ob->ShowMsg("���ݸ��³ɹ�!","../admin/Update_User.php?ID=".$ID."");
}
//-----------------���ͼƬ-----------------//
if ($action=="ShenHe_UserPic")
{
$arrayInsert=array(ShenHe=>2);
$user_update=$ob->upData($arrayInsert,"hn_userpic","ID",$ID);
$ob->ShowMsg("����������޸�!","../admin/UserPic.php");
}
//----------------���ͼ��----------------//
if ($action=="into_tuku"){

$TITLE=$_REQUEST["TITLE"];
$BigClass=$_REQUEST["BigClass"];
$small_pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(TITLE=>$TITLE,BigClass=>$BigClass,Pic=>$small_pic,Jieshao=>$Jieshao);
$ob->addData($arrayInsert,"hn_mingren");
$ob->ShowMsg("��Ϣ��ӳɹ�!","../admin/tuku2.php?ID=".$BigClass."");
}
//----------------�����Ӱͼ��----------------//
if ($action=="into_sy_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=1;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_all");
$ob->ShowMsg("�ϴ��ɹ�!","../admin/sy_tuku.php");
}
//----------------������ͼ��----------------//
if ($action=="into_sj_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_sj");
$ob->ShowMsg("�ϴ��ɹ�!","../admin/sj_tuku.php");
}
//----------------���ʸ��ͼ��----------------//
if ($action=="into_sl_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_sl");
$ob->ShowMsg("�ϴ��ɹ�!","../admin/sl_tuku.php");
}
//----------------��Ӿ���ͼ��----------------//
if ($action=="into_jd_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_jd");
$ob->ShowMsg("�ϴ��ɹ�!","../admin/tuku_jd.php");
}
//----------------���ͼ������----------------//
if ($action=="into_sq_tuku"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_tuku_sq");
$ob->ShowMsg("�ϴ��ɹ�!","../admin/tuku_sq.php");
}
//----------------���ԭ����Ʒ----------------//
if ($action=="into_yuanchang"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_yuanchang");
$ob->ShowMsg("�ϴ��ɹ�!","../admin/yuanchang.php");
}
//----------------��Ӹ���----------------//
if ($action=="into_gao"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_gao_tuku");
$ob->ShowMsg("�ϴ��ɹ�!","../admin/gao_tuku.php");
}
//----------------���Դ�ļ�----------------//
if ($action=="into_yuanwen"){

$TITLE=$_REQUEST["TITLE"];
$Big=3;
$pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(title=>$TITLE,Big=>$Big,pic=>$pic,conter=>$Jieshao);
$ob->addData($arrayInsert,"hn_yuanwen");
$ob->ShowMsg("�ϴ��ɹ�!","../admin/yuanwen.php");
}
//----------------���ͼ��----------------//
if ($action=="into_tuku"){

$TITLE=$_REQUEST["TITLE"];
$BigClass=$_REQUEST["BigClass"];
$small_pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(TITLE=>$TITLE,BigClass=>$BigClass,Pic=>$small_pic,Jieshao=>$Jieshao);
$ob->addData($arrayInsert,"hn_mingren");
$ob->ShowMsg("��Ϣ��ӳɹ�!","../admin/tuku2.php?ID=".$BigClass."");
}
//----------------�޸�ͼ��----------------//
if ($action=="update_tuku"){

$ID1=$_REQUEST["ID1"];
$TITLE=$_REQUEST["TITLE"];
$small_pic=$_REQUEST["small_pic"];
$Jieshao=$_REQUEST["Jieshao"];

$arrayInsert=array(TITLE=>$TITLE,Jieshao=>$Jieshao,Pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_mingren","ID",$ID1);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/tuku2.php?ID=".$ID."");
}
//----------------�޸�ͼ��----------------//
if ($action=="update_tuku_big"){

$BigID=$_REQUEST["BigID"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];
$Big=$_REQUEST["Big"];

$arrayInsert=array(Name=>$Name,Big=>$Big,Pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_mingren_big","ID",$ID);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/tuku1.php?BigID=".$BigID."");
}
//----------------�޸���Ӱͼ��----------------//
if ($action=="update_sy_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_all","id",$id);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/sy_tuku.php");
}
//----------------�޸����ͼ��----------------//
if ($action=="update_sj_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_sj","id",$id);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/sj_tuku.php");
}
//----------------�޸�ʸ��ͼ��----------------//
if ($action=="update_sl_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_sl","id",$id);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/sl_tuku.php");
}
//----------------�޸ľ���ͼ��----------------//
if ($action=="update_jd_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_jd","id",$id);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/tuku_jd.php");
}
//----------------�޸�ͼ������----------------//
if ($action=="update_sq_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_tuku_sq","id",$id);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/tuku_sq.php");
}
//----------------�޸�ԭ����Ʒ----------------//
if ($action=="update_yuanchang"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_yuanchang","id",$id);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/yuanchang.php");
}
//----------------�޸ĸ���----------------//
if ($action=="hn_gao_tuku"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_gao_tuku","id",$id);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/gao_tuku.php");
}
//----------------�޸�Դ�ļ�----------------//
if ($action=="hn_yuanwen"){
$id=$_REQUEST["id"];
$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];


$arrayInsert=array(title=>$Name,pic=>$small_pic);
$user_update=$ob->upData($arrayInsert,"hn_yuanwen","id",$id);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../admin/yuanwen.php");
}
//----------------ר��ҳ����----------------//
if ($action=="zhuanti_liuyan"){

$action_user=$_REQUEST["action_user"];
$User=$_REQUEST["User"];
$User_ID=$_REQUEST["User_ID"];
$Conter=$_REQUEST["Conter"];

$arrayInsert=array(User=>$User,Conter=>$Conter,User_ID=>$User_ID);
$ob->addData($arrayInsert,"hn_zhuanti_liuyan");
if ($action_user==""){
$ob->ShowMsg("������ӳɹ�!","../user_zhuanti.php");
}else{
$ob->ShowMsg("������ӳɹ�!","../user_zhuanti.php?action_user=".$action_user."");
}
}

//----------------ר��ҳ����----------------//
if ($action=="z"){

$action_user=$_REQUEST["action_user"];
$User=$_REQUEST["User"];
$User_ID=$_REQUEST["User_ID"];
$Conter=$_REQUEST["Conter"];

$arrayInsert=array(User=>$User,Conter=>$Conter,User_ID=>$User_ID);
$ob->addData($arrayInsert,"hn_zhuanti_liuyan");
if ($action_user==""){
$ob->ShowMsg("������ӳɹ�!","../4.php");
}else{
$ob->ShowMsg("������ӳɹ�!","../4.php?action_user=".$action_user."");
}
}
//----------------���q----------------//
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
$ob->ShowMsg("�ύ�ɹ�!","../time.php");
}elseif($expr==9){
$ob->ShowMsg("�ύ�ɹ�!","../yingsh.php");
}elseif($expr==10){
$ob->ShowMsg("�ύ�ɹ�!","../all_jianzheng.php");
}elseif($expr==11){
$ob->ShowMsg("�ύ�ɹ�!","../bao.php");
}elseif($expr==13){
$ob->ShowMsg("�ύ�ɹ�!","../yue.php");
}elseif($expr==14){
$ob->ShowMsg("�ύ�ɹ�!","../jianti.php");
}elseif($expr==15){
$ob->ShowMsg("�ύ�ɹ�!","../ts.php");
}elseif($expr==16){
$ob->ShowMsg("�ύ�ɹ�!","../yanlao.php");
}elseif($expr==17){
$ob->ShowMsg("�ύ�ɹ�!","../yys.php");
}elseif($expr==10){
$ob->ShowMsg("�ύ�ɹ�!","../guanjian.php");
}
}
//----------------����̻���Ƭ----------------//
if ($action=="user_institute_upfiletppic"){

$Pic=$_REQUEST["Pic"];
$Title=$_REQUEST["Title"];
$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic,Title=>$Title,Pic_Big=>$Pic_Big);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("ͼƬ�ϴ��ɹ�!","../institute.php?action=PicShow");
}
//----------------���Ʒ����Ƭ----------------//
if ($action=="user_upfiletppic"){

$Pic=$_REQUEST["Pic"];
$Title=$_REQUEST["Title"];
$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic,Title=>$Title,Pic_Big=>$Pic_Big);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("ͼƬ�ϴ��ɹ�!","../akg.php?action=PicShow");
}
//----------------���ר����Ƭ----------------//
if ($action=="user_buy_upfiletppic"){

$Pic=$_REQUEST["Pic"];
$Title=$_REQUEST["Title"];
$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic,Title=>$Title,Pic_Big=>$Pic_Big);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("ͼƬ�ϴ��ɹ�!","../buy.php?action=PicShow");
}
//----------------��ӵز���Ƭ----------------//
if ($action=="user_dichang_upfiletppic"){

$Pic=$_REQUEST["Pic"];
$Title=$_REQUEST["Title"];
$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic,Title=>$Title,Pic_Big=>$Pic_Big);
$ob->addData($arrayInsert,"hn_zhuanti");
$ob->ShowMsg("ͼƬ�ϴ��ɹ�!","../dichang.php?action=PicShow");
}
//----------------��Ӹ�����Ƭ----------------//
if ($action=="geren_upfiletppic"){
$User=$_REQUEST["username"];
$Pic=$_REQUEST["UserPic"];
//$Title=$_REQUEST["Title"];
//$Pic_Big=$_REQUEST["Pic_Big"];

$arrayInsert=array(Pic=>$Pic);
$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("ͼƬ�ϴ��ɹ�!","../geren.php?action=PicShow");
}
//----------------�޸�����----------------//
if ($action=="update_xingxiang"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../akg.php");
}
//----------------�޸�ר������----------------//
if ($action=="update_buy_xingxiang"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../buy.php");
}
//----------------�޸ĵز�����----------------//
if ($action=="update_dichang_xingxiang"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../dichang.php");
}
//----------------�޸�ר������----------------//
if ($action=="update_institute_xingxiang"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../institute.php");
}
//----------------�޸ĸ�������----------------//
if ($action=="update_geren_xx"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];
$UserPic1=$_REQUEST["UserPic1"];

$arrayInsert=array(Pic=>$UserPic,Logo=>$UserPic1);
$user_update=$ob->upData($arrayInsert,"hn_userpic_small","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../geren.php");
}
//----------------�޸Ĺ���----------------//
if ($action=="update_gonggao1"){

$User=$_REQUEST["username"];
$Jianjie=$_REQUEST["Jianjie"];
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Jianjie=>$Jianjie,Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../akg.php?action=jianjie");
}
//----------------�޸�ר������----------------//
if ($action=="update_buy_gonggao1"){

$User=$_REQUEST["username"];
$Jianjie=$_REQUEST["Jianjie"];
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Jianjie=>$Jianjie,Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../buy.php?action=jianjie");
}
//----------------�޸ĵز�����----------------//
if ($action=="update_dichang_gonggao1"){

$User=$_REQUEST["username"];
$Jianjie=$_REQUEST["Jianjie"];
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Jianjie=>$Jianjie,Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../dichang.php?action=jianjie");
}
//----------------�޸��̻ṫ��----------------//
if ($action=="update_institute_gonggao1"){

$User=$_REQUEST["username"];
$Jianjie=$_REQUEST["Jianjie"];
$Gonggao=$_REQUEST["Gonggao"];

$arrayInsert=array(Jianjie=>$Jianjie,Gonggao=>$Gonggao);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ�޸ĳɹ�!","../institute.php?action=jianjie");
}
//----------------�޸�Ʒ������----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../akg.php?action=ziliao");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../akg.php?action=ziliao");
}
}
//----------------�޸�ר������----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../buy.php?action=ziliao");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../buy.php?action=ziliao");
}
}
//----------------�޸ĵز�����----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../dichang.php?action=UserZhaoPian");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../dichang.php?action=UserZhaoPian");
}
}
//===========================�޸�ר���û���Ϣ============================//
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
  $ob->ShowMsg("������������벻ͬ!","");
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
$ob->ShowMsg("���ϸ��³ɹ�!","");
}
//===========================�޸��̻��û���Ϣ============================//
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
  $ob->ShowMsg("������������벻ͬ!","");
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
$ob->ShowMsg("���ϸ��³ɹ�!","");
}
//----------------�޸��̻�����----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../institute.php?action=ziliao");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,xingbie=>$xingbie,Dizhi=>$Dizhi,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../institute.php?action=ziliao");
}
}
//----------------�޸ĸ�������----------------//

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
$ob->ShowMsg("��Ϣ����ɹ�!","../geren.php?action=ziliao");
}else{
$arrayInsert=array(User=>$User,BigClass=>$BigClass,Dizhi=>$Dizhi,xingbie=>$xingbie,Name=>$Name,Tel=>$Tel,nian=>$nian,qq=>$qq,Email=>$Email,Chuanzhen=>$Chuanzhen,Youbian=>$Youbian);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../geren.php?action=ziliao");
}
}
//----------------�޸�Ʒ������----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../akg.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../akg.php?action=jiben");
}
}
//----------------�޸�ר������----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../buy.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../buy.php?action=jiben");
}
}
//----------------�޸���ҵ�ز�����----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../dichang.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../dichang.php?action=jiben");
}
}
//----------------�޸��̻�����----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../institute.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,KaiyeDatatime=>$KaiyeDatatime,XiangmuBig=>$XiangmuBig,ShangyeMianji=>$ShangyeMianji,ZujinMoshi=>$ZujinMoshi,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Zhuangtai=>$Zhuangtai,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Tingchewei=>$Tingchewei,Quancheng=>$Quancheng,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../institute.php?action=jiben");
}
}
//----------------�޸ĸ�������----------------//
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
$ob->ShowMsg("��Ϣ����ɹ�!","../geren.php?action=jiben");
}else{
$arrayInsert=array(User=>$User,XiangmuDizhi=>$XiangmuDizhi,Yaoqiu=>$Yaoqiu,Youxiaoqi=>$Youxiaoqi,Suozai=>$Suozai,Hangye_BigClass=>$Hangye_BigClass);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("��Ϣ����ɹ�!","../geren.php?action=jiben");
}
}
//----------------���Ʒ������----------------//
if ($action=="into_akg_userziliao"){

$User=$_REQUEST["User"];
$Title=$_REQUEST["Title"];
$Text=$_REQUEST["Text"];

$arrayInsert=array(User=>$User,Title=>$Title,Pic=>$Text);
$ob->addData($arrayInsert,"hn_zhuanti_ziliao");
$ob->ShowMsg("�ļ��ϴ��ɹ�!","../akg.php?action=update_userziliao");
}
//----------------����̻�����----------------//
if ($action=="into_institute_userziliao"){

$User=$_REQUEST["User"];
$Title=$_REQUEST["Title"];
$Text=$_REQUEST["Text"];

$arrayInsert=array(User=>$User,Title=>$Title,Pic=>$Text);
$ob->addData($arrayInsert,"hn_zhuanti_ziliao");
$ob->ShowMsg("�ļ��ϴ��ɹ�!","../institute.php?action=update_userziliao");
}
//----------------��ӵز�����----------------//
if ($action=="into_dichang_userziliao"){

$User=$_REQUEST["User"];
$Title=$_REQUEST["Title"];
$Text=$_REQUEST["Text"];

$arrayInsert=array(User=>$User,Title=>$Title,Pic=>$Text);
$ob->addData($arrayInsert,"hn_zhuanti_ziliao");
$ob->ShowMsg("�ļ��ϴ��ɹ�!","../dichang.php?action=update_userziliao");
}
//----------------��Ӹ�������----------------//
if ($action=="into_gerenziliao"){

$User=$_REQUEST["User"];
$Title=$_REQUEST["Title"];
$Text=$_REQUEST["Text"];

$arrayInsert=array(User=>$User,Title=>$Title,Pic=>$Text);
$ob->addData($arrayInsert,"hn_zhuanti_ziliao");
$ob->ShowMsg("ͼƬ�ϴ��ɹ�!","../geren.php?action=update_userziliao");
}
//----------------�½�ͼ��----------------//
if ($action=="into_tuku_big"){

$Name=$_REQUEST["Name"];
$small_pic=$_REQUEST["small_pic"];
$Big=$_REQUEST["Big"];

$arrayInsert=array(Name=>$Name,Big=>$Big,Pic=>$small_pic);
$ob->addData($arrayInsert,"hn_mingren_big");
$ob->ShowMsg("�½��ɹ�!","../admin/tuku1.php?BigID=".$Big."");
}
//-------------�ز����ؿۻ���-------------------//
if ($action=="dichang_download"){

$User=$_REQUEST["User"];
$act=$_REQUEST["download"];

$arrayInsert=array(User=>$User,act=>$act);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","user",$User);
$ob->ShowMsg("���سɹ�!","../dichang.php");
}

//--------------------------------//
if ($action=="Into_maichang"){

$User=$_REQUEST["User"];
$User1=$_REQUEST["User1"];

$arrayInsert=array(BigClass=>$User);
$user_update=$ob->upData($arrayInsert,"web_user","user",$User1);
$ob->ShowMsg("��Ϣ��ӳɹ�!","../admin/User.php");
}
//--------------------------------//
if ($action=="update_maichang"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(BigClass=>"");
$user_update=$ob->upData($arrayInsert,"web_user","ID",$ID);
$ob->ShowMsg("�޸�ΪƷ���û�!","../admin/User.php");
}
//--------------------------------//
if ($action=="update_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../akg.php");
}
//---------------�̻��ͼ-----------------//
if ($action=="update_institute_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../institute.php");
}
//---------------ר����ͼ-----------------//
if ($action=="update_buy_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../buy.php");
}
//---------------�ز���ͼ-----------------//
if ($action=="update_dichang_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../dichang.php");
}
//------------���˵�ͼ--------------------//
if ($action=="update_geren_ditu"){

$User=$_REQUEST["username"];
$Ditu=$_REQUEST["Content"];

$arrayInsert=array(Ditu=>$Ditu);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../geren.php?action=ziliao");
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
$ob->ShowMsg("�޸ĳɹ�!","../admin/User.php");
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
$ob->ShowMsg("�޸ĳɹ�!","../admin/show.php");
}
//----------------��ӻ�Ա����----------------//
if ($action=="Into_UserBigClass"){

$BigClass=$_REQUEST["BigClass"];
$Big=$_REQUEST["Big"];

$arrayInsert=array(BigClass=>$BigClass,Big=>$Big);
$ob->addData($arrayInsert,"hn_sousuo_big");
$ob->ShowMsg("�½��ɹ�!","../admin/User_hangyeBig.php");
}
//----------------���û�Ա�ȼ�----------------//
if ($action=="set_vip"){

$vip=$_REQUEST["vip"];

$arrayInsert=array(vip=>$vip);
$ob->addData($arrayInsert,"web_user");
$ob->ShowMsg("���óɹ�!","../admin/user.php");
}
//-----------------ɾ����Ա����-----------------//
if ($action=="Del_UserBigClass")
{
 $ID=$_REQUEST["ID"];
 $ob->delData("hn_sousuo_big","ID",$ID);
 $ob->ShowMsg("����ɾ���ɹ�!","../admin/User_hangyeBig.php");
}
//-------------�޸Ļ�Ա����-------------------//
if ($action=="Update_UserBigClass"){

$ID=$_REQUEST["ID"];
$BigClass=$_REQUEST["BigClass"];

$arrayInsert=array(BigClass=>$BigClass);
$user_update=$ob->upData($arrayInsert,"hn_sousuo_big","ID",$ID);
$ob->ShowMsg("�޸ĳɹ�!","../admin/User_hangyeBig.php");
}
//-------------�޸�Ʒ�ƻ�Ա���-------------------//
if ($action=="update_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../akg.php?action=ziliao");
}
//-------------�޸�ר����Ա���-------------------//
if ($action=="update_buy_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../buy.php?action=ziliao");
}
//-------------�޸ĵز���Ա���-------------------//
if ($action=="update_dichang_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../dichang.php?action=ziliao");
}
//-------------�޸ĵز���Ա���-------------------//
if ($action=="update_dichang_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../dichang.php?action=ziliao");
}
//-------------�޸��̻��Ա���-------------------//
if ($action=="update_institute_userguanggao"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(Guanggao=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../institute.php?action=ziliao");
}
//-----------------���ר����Աͼ��-----------------//
if ($action=="institute_UserPic"){

$username=$_COOKIE["username"];
$UserPic=$_REQUEST["UserPic"];
$PicTitle=$_REQUEST["PicTitle"];

$arrayInsert=array(UserPic=>$UserPic,User=>$username,PicTitle=>$PicTitle);
$ob->addData($arrayInsert,"hn_userpic");
$ob->ShowMsg("����½��ɹ�!","../institute.php?action=PicShow");
}

//-------------�޸��˸���Աlogo-------------------//
if ($action=="update_geren_logo"){

$User=$_REQUEST["username"];
$UserPic=$_REQUEST["UserPic"];

$arrayInsert=array(logo=>$UserPic);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","User",$User);
$ob->ShowMsg("���ϱ���ɹ�!","../geren.php?action=ziliao");
}
//-------------�޸Ķ����Ƽ�-------------------//
if ($action=="Update_dujia"){

$ID=$_REQUEST["ID"];

$user_update=$ob->isRecord("hn_zhuanti","Dujia","yes");
$arrayInsert=array(Dujia=>"no");
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","Dujia","yes");

$arrayInsert=array(Dujia=>"yes");
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);

$ob->ShowMsg("�޸ĳɹ�!","../admin/User.php");
}
//--------------------------------//
if ($action=="Remen_user"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(Remen=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("���ϱ���ɹ�!","../admin/User.php");
}
//--------------------------------//
if ($action=="Remen"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(Remen=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("���ϱ���ɹ�!","../admin/User.php");
}
//--------------------------------//
if ($action=="Del_Tuijian"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(Tuijian_xiangmu=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("���ϱ���ɹ�!","../admin/User.php");
}
//--------------------------------//
if ($action=="Tuijian"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(Tuijian_xiangmu=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanti","ID",$ID);
$ob->ShowMsg("���ϱ���ɹ�!","../admin/User.php");
}
//-------------	ȡ��רҵ����-------------------//
if ($action=="Del_zhye_Tuijian"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(redian=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_xiangmu","ID",$ID);
$ob->ShowMsg("ȡ���ɹ�!","../admin/zhye.php");
}
//-------------	ȡ����Ʒ-------------------//
if ($action=="Del_zhping_Tuijian"){

$ID=$_REQUEST["id"];

$arrayInsert=array(tujian=>"");
$user_update=$ob->upData($arrayInsert,"hn_yuanchang","id",$ID);
$ob->ShowMsg("ȡ���ɹ�!","../admin/yuanchang.php");
}
//-----------------רҵ����---------------//
if ($action=="zhye_Tuijian"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(redian=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_xiangmu","ID",$ID);
$ob->ShowMsg("�Ƽ��ɹ�!","../admin/zhye.php");
}
//-----------------�Ƽ���Ʒ---------------//
if ($action=="zhping_Tuijian"){

$ID=$_REQUEST["id"];

$arrayInsert=array(tujian=>1);
$user_update=$ob->upData($arrayInsert,"hn_yuanchang","id",$ID);
$ob->ShowMsg("�Ƽ��ɹ�!","../admin/yuanchang.php");
}
//--------------------------------//
if ($action=="Del_Tuijian_new"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(TUIJIAN=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("���ϱ���ɹ�!","../admin/ZHUANYE_NEW.PHP");
}
//--------------------------------//
if ($action=="Tuijian_new"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(TUIJIAN=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("���ϱ���ɹ�!","../admin/ZHUANYE_NEW.PHP");
}
//--------------------------------//
if ($action=="Del_jingpin_new"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(JINGPIN=>"");
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("���ϱ���ɹ�!","../admin/ZHUANYE_NEW.PHP");
}
//--------------------------------//
if ($action=="jingpin_new"){

$ID=$_REQUEST["ID"];

$arrayInsert=array(JINGPIN=>1);
$user_update=$ob->upData($arrayInsert,"hn_zhuanye_new","ID",$ID);
$ob->ShowMsg("���ϱ���ɹ�!","../admin/ZHUANYE_NEW.PHP");
}
//--------------------------------//
if ($action=="update_indexpic"){

$ID=$_REQUEST["ID"];
$pic=$_REQUEST["pic"];
$lianjie=$_REQUEST["lianjie"];

$arrayInsert=array(pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"hn_index_guanggao","ID",$ID);
$ob->ShowMsg("����ɹ�!","../admin/GUANGGAO3.PHP");
}
//--------------------------------//
if ($action=="update_web_pic"){

$ID=$_REQUEST["ID"];
$pic=$_REQUEST["pic"];
$lianjie=$_REQUEST["lianjie2"];

$arrayInsert=array(pic=>$pic,lianjie=>$lianjie);
$user_update=$ob->upData($arrayInsert,"hn_index_guanggao","ID",$ID);
$ob->ShowMsg("����ɹ�!","../admin/GUANGGAO3.PHP");
}
?>