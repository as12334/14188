
<?php 
$type = array("iPhone","iPod","Android","ios","iPad","pc");

			$addall = array(
			                  
							array("北京市",("北京市")),//0
							array("天津市",("天津市")),//1
							array("上海市","上海市"),//2
							array("重庆市",("重庆市")),//3  
							array("河北省","石家庄市","张家口市","承德市","秦皇岛市","唐山市","廊坊市","保定市","衡水市","沧州市","邢台市","邯郸市"),//4
							array("山西省","太原市","朔州市","大同市","阳泉市","长治市","晋城市","忻州市","晋中市","临汾市","吕梁市","运城市"),//5
							array("内蒙古","呼和浩特市","包头市","乌海市","赤峰市","通辽市","呼伦贝尔市","鄂尔多斯市","乌兰察布市","巴彦淖尔市","兴安盟","锡林郭勒盟","阿拉善盟"),//6
							array("辽宁省","沈阳市","朝阳市","阜新市","铁岭市","抚顺市","本溪市","辽阳市","鞍山市","丹东市","大连市","营口市","盘锦市","锦州市","葫芦岛市"),//7
							array("吉林省","长春市","白城市","松原市","吉林市","四平市","辽源市","通化市","白山市","延边州"),//8
							array("黑龙江省","哈尔滨市","齐齐哈尔市","七台河市","黑河市","大庆市","鹤岗市","伊春市","佳木斯市","双鸭山市","鸡西市","牡丹江市","绥化市","大兴安岭地区"),//9
							array("江苏省","南京市","徐州市","连云港市","宿迁市","淮安市","盐城市","扬州市","泰州市","南通市","镇江市","常州市","无锡市","苏州市"),//10
							array("浙江省","杭州市","湖州市","嘉兴市","舟山市","宁波市","绍兴市","衢州市","金华市","台州市","温州市","丽水市"),//11  
							array("安徽省","合肥市","宿州市","淮北市","亳州市","阜阳市","蚌埠市","淮南市","滁州市","马鞍山市","芜湖市","铜陵市","安庆市","黄山市","六安市","巢湖市","池州市","宣城市"),//12
							array("福建省","福州市","南平市","莆田市","三明市","泉州市","厦门市","漳州市","龙岩市","宁德市"),//13
							array("江西省","南昌市","九江市","景德镇市","鹰潭市","新余市","萍乡市","赣州市","上饶市","抚州市","宜春市","吉安市"),//14
							array("山东省","济南市","青岛市","聊城市","德州市","东营市","淄博市","潍坊市","烟台市","威海市","日照市","临沂市","枣庄市","济宁市","泰安市","莱芜市","滨州市","菏泽市"),//15
							array("河南省","郑州市","开封市","三门峡市","洛阳市","焦作市","新乡市","鹤壁市","安阳市","濮阳市","商丘市","许昌市","漯河市","平顶山市","南阳市","信阳市","周口市","驻马店市","济源市"),//16
							array("湖北省","武汉市","十堰市","襄樊市","荆门市","孝感市","黄冈市","鄂州市","黄石市","咸宁市","荆州市","宜昌市","随州市","省直辖县级行政单位","恩施州"),//17
							array("湖南省","长沙市","张家界市","常德市","益阳市","岳阳市","株洲市","湘潭市","衡阳市","郴州市","永州市","邵阳市","怀化市","娄底市","湘西州"),//18
							array("广东省","广州市","深圳市","清远市","韶关市","河源市","梅州市","潮州市","汕头市","揭阳市","汕尾市","惠州市","东莞市","珠海市","中山市","江门市","佛山市","肇庆市","云浮市","阳江市","茂名市","湛江市"),//19 
							array("广西","南宁市","桂林市","柳州市","梧州市","贵港市","玉林市","钦州市","北海市","防城港市","崇左市","百色市","河池市","来宾市","贺州市"),//20
							array("海南省","海口市","三亚市","省直辖行政单位"),//21
							array("四川省","成都市","广元市","绵阳市","德阳市","南充市","广安市","遂宁市","内江市","乐山市","自贡市","泸州市","宜宾市","攀枝花市","巴中市","达州市","资阳市","眉山市","雅安市","阿坝州","甘孜州","凉山州"),//22
							array("贵州省","贵阳市","六盘水市","遵义市","安顺市","毕节地区","铜仁地区","黔东南州","黔南州","黔西南州"),//23
							array("云南省","昆明市","曲靖市","玉溪市","保山市","昭通市","丽江市","思茅市","临沧市","德宏州","怒江州","迪庆州","大理州","楚雄州","红河州","文山州","西双版纳州"),//24
							array("西藏","拉萨市","那曲地区","昌都地区","林芝地区","山南地区","日喀则地区","阿里地区"),//25
							array("陕西省","西安市","延安市","铜川市","渭南市","咸阳市","宝鸡市","汉中市","榆林市","安康市","商洛市"),//26
							array("甘肃省","兰州市","嘉峪关市","白银市","天水市","武威市","酒泉市","张掖市","庆阳市","平凉市","定西市","陇南市","临夏州","甘南州"),//27  
							array("青海省","西宁市","海东地区","海北州","海南州","黄南州","果洛州","玉树州","海西州"),//28
							array("宁夏","银川市","石嘴山市","吴忠市","固原市","中卫市"),//29
							array("新疆","乌鲁木齐市","克拉玛依市","自治区直辖县级行政单位","喀什地区","阿克苏地区","和田地区","吐鲁番地区","哈密地区","克孜勒苏柯州","博尔塔拉州","昌吉州","巴音郭楞州","伊犁州","塔城地区","阿勒泰地区"),//30
							array("香港","香港特别行政区"),//31
							array("澳门","澳门特别行政区"),//32
							array("台湾省","台北","高雄","台中","花莲","基隆","嘉义","金门","连江","苗栗","南投","澎湖","屏东","台东","台南","桃园","新竹","宜兰","云林","彰化"),//33
							
							
			);
$emnum = rand(0,1);
$monum = rand(10000000,99999999);			
$enum1 = rand(100,9999);
$enum2 = rand(10,9999);
$abc = "a,b,c,d,e,f,g,h,j,k,l,m,n,o,p,q,s,r,w,z,v,x,y,t";
$aex = explode(",",$abc);
$emailnumco = rand(0,count($aex)-1);
			$emailall =  array("@qq.com","@163.com","@126.com","@qq.com","@yahoo.com","@139.com","@qq.com"); #随机生成邮箱
			$mobileall =  array("134","135","137","132","152","139","189","136","138","186","156","150","182"); #随机生成手机
			$emailco = rand(0,count($emailall)-1);
			$mobileco = rand(0,count($mobileall)-1);
			if($emnum==0){
			$email = $enum1.$aex[$emailnumco].$enum2.$emailall[$emailco];
			}else{
			$mobile = $mobileall[$mobileco].$monum;	
				}
			
			
			$tyco = rand(0,count($type)-1);#随机生成"iPhone","iPod","Android","ios","iPad","pc"
		  
		    $adds = rand(0,count($addall)-1);#随机生成省
			$addc = rand(1,count($addall[$adds])-1);#随机生成以应的市
			
			$ip_3 = $addall[$adds][0];
			$ip_4 = $addall[$adds][$addc];
			$getType = $type[$tyco];
		    $user_ip = $ip_3.' '.$ip_4;
	
 $hostdir = $_SERVER['DOCUMENT_ROOT']."/statics/uploads/member/";//本地为$hostdir="E:\wamp\www\statics\uploads\member";

 $filesnames = scandir($hostdir);
 
 $photoall = count($filesnames)-1;
  $photonum = rand(1,$photoall);	
$photonums =   $filesnames[$photonum];		
	
?>