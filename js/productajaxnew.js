var mkmenu4=0,mkmenu5=0,mkmenu6=0;

jQuery(document).ready(function(){
    
//    BindData();//初始化+ -号显示隐藏
    
//    BindYouhui();
    shpopCount();//设置购买数量
    
//    jQuery("#btnBuyGroup").bind("click",function(){
//    
//        var aid = jQuery(this).attr("aid");
//        window.location = "/Transit/pbc.php?arid="+aid;
//    });
//    
    
    
    //去结账
     jQuery("#gotoShopingCar").bind("click",function(){
    
//        var aid = jQuery(this).attr("aid");
        window.location = "ShoppingCart.php";
    });
    var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum;  
    var ycount = jQuery("#"+OProductCount+">option").length;
        //积分换购
     jQuery("#rbtHuangou").bind("click",function(){
        
        if(getmiden())
        {            
            if(jQuery("#rbtHuangou").attr("checked")==true)
            {
                maxcount = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityMaxCount").value;
                if(parseInt(maxcount)>10)
                {
                    maxcount=10;
                }
            }
            else
            {
                maxcount=ycount;
            }
var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum;
            if(GetElementById(OProductCount)!=null)
            {
                jQuery("#"+OProductCount+">option").remove();    
                for(var i=1;i<=parseInt(maxcount);i++)
                {
                    var newChild=document.createElement("option");
                    newChild.value=i;
                    newChild.innerText=i;
                    newChild.textContent=i;
                    document.getElementById(OProductCount).appendChild(newChild);
                }
                
                
                BindYouhui();
            }
            else
            {
                BindGold();
            }
        }
        else
        {
            var a=parseFloat(jQuery("#rightDiv").css("top").replace("px",""))-600;
            jQuery("#divlogin").css({margin:a+"px 0 0 -270px"}); 
            $login.show();
            jQuery("#rbtHuangou").attr("checked","");
        }
    });
var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum;
    
    jQuery("#"+OProductCount).bind("change",function(){BindYouhui();});
    jQuery("#ctl00_ContentPlaceHolder1_ddlProductCountfmp").bind("change",function(){BindGold();});
});    

//标签（弹出框)
function tag1(aid,prices,pics,title,num)
{
//   window.location = "/Transit/pbc.php?arid="+aid;

   jQuery("#lableValue").show();
   
    var itop = jQuery("#btnBuyProduct").offset().top;
    var ileft = jQuery("#btnBuyProduct").offset().left;
   
   
    jQuery("#lableValue").css({ "margin": "0px 0px 0 0px"});

    
    var txtLable=GetElementById("txtLable");//数量
    var o = GetElementById("ctl00_ContentPlaceHolder1_txtProductCount");
    var pnum = 0;
    var format=/^[0-9]+$/;
   var name=title;
   var pid=aid;
   //var pnum=num;
   var price=prices;
   var pic=pics;
//   alert(pid);
   var txtvalue = jQuery.trim(txtLable.value);
  if(txtvalue=='批量添加颜色，用空隔隔开，比如黑色 白色 灰色 黄色 蓝色'){alert("提示！颜色不能为空");return false;}
  jQuery("#lableValues_none").hide();
    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
    
    jQuery.ajax({
        type:"post",
        url:"TagAjax.php",
        data:"mode=addtoshoppingcart&tag="+txtvalue,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
           
//            jQuery("#shopinfo").show();  
               getprodutiofo();
              jQuery("#lableValues").html(data);  
			  jQuery("#lableValues_none").hide();   
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    jQuery("#lableValue").find("#closesss,#btnCloseysc").click(function() {
        
        jQuery("#lableValue").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}


//直接修改文本框更新方法
//NewModifyQty1()
function NewModifyQty1()
{
    var   type= "^[0-9]*[1-9][0-9]*$";
    var   re   =   new   RegExp(type);
    var o = GetElementById(OProductCount);  
     if(o.value=="")
     {
       alert("请输入购买数量!!");
       o.value=1;
       BindData();
       return false;
     }
     else if(isNaN(o.value))
     {
        alert("请填写数字！！");
        o.value=1;
        BindData();
        return false;
     }
     else if(o.value.match(re)==null)
    {
        alert("请输入整数！！");
        o.value=1;
        BindData();
        return  false;
    }
    else if(parseInt(o.value)>999)
    {
    o.value=999;
    }
    BindData();
}

//点击+ -号更新方法
// - NewModifyQty(-1)
// + NewModifyQty(1)
function NewModifyQty(qtyChanged)
{
var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum; 
    //debugger;
    var o = GetElementById(OProductCount);
    
    var txtNumber = jQuery.trim(o.value);//文本框数量
    o.value = parseInt(txtNumber) + qtyChanged;
    BindData();
}

//获取元素控件
function GetElementById(controlId)
{
    var o = document.getElementById(controlId);
    if (o == null) {
        //alert("控件编号:" + controlId + "不存在");
        return null;
    }
    return o;
}


//初始化+ -号显示隐藏
function BindData()
{
var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum; 
    var o = GetElementById(OProductCount);
    if(o!=null)
    {
        GetElementById("aMinus").style.visibility = (parseInt(jQuery.trim(o.value)) > 1 ? "visible" : "hidden");
        GetElementById("aAdd").style.visibility = (parseInt(jQuery.trim(o.value)) >= 999 ? "hidden" : "visible")
        BindYouhui();
    }
}

//绑定一些优惠信息
function BindYouhui()
{
	var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum; 
alert(OProductCount);
var count=GetElementById(OProductCount);//数量

//如果有赠品改变赠品数量 (黄伟民加)

  
      
      var count_K=jQuery("#ctl00_ContentPlaceHolder1_hidcount").val();

      for(var i=0;i<count_K;i++)
      {
          if(document.getElementById("sp_maxcount"+i+""))
          {
              //var sp_maxcount=jQuery("#sp_maxcount0");
            
              var sp_maxcount=jQuery("#sp_maxcount"+i+"");
              
              var sp_price=jQuery("#spanPrice"+i+"");
          // alert(parseInt(count.value)*parseInt(sp_maxcount.html()));
            //sp_maxcount.innerHTML="";
             document.getElementById("h_sp_maxcounts"+i+"").innerHTML=parseInt(count.value)*parseInt(sp_maxcount.html());
             document.getElementById("h_spanPrice"+i+"").innerHTML="价值:"+parseInt(count.value)*parseInt(sp_price.html())+"元";
          }
    }

var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var Opri = "ctl00_ContentPlaceHolder1_ltlCurrentPrice"+pnum;
var Xji = "ctl00_ContentPlaceHolder1_ltlXiaoji"+pnum;
var memberLogin = GetElementById("ctl00_ContentPlaceHolder1_h_memberLogin");//用户是登陆
var h_memberzk = GetElementById("ctl00_ContentPlaceHolder1_h_memberzk");//用户折扣
var ltlOriginalPrice = GetElementById("ctl00_ContentPlaceHolder1_ltlOriginalPrice");//市场价格
var ltlCurrentPrice = GetElementById(Opri);//现在价格
var ltlCurrentPrice1 = GetElementById("ltlCurrentPrice1");//现在价格
var ltlYouhui = GetElementById("ctl00_ContentPlaceHolder1_ltlYouhui");//已经优惠多少
var ltlXiaoji = GetElementById(Xji);//小计


var h_ActivityPrice = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityPrice");//积分换购价格
var h_ActivityID = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityID");//积分换购促销ID

var h_promotions = GetElementById("ctl00_ContentPlaceHolder1_h_promotions");//是否是促销
var h_promotionsprice = GetElementById("ctl00_ContentPlaceHolder1_h_promotionsprice");//促销价格

var h_productkind = GetElementById("ctl00_ContentPlaceHolder1_h_productkind");//产品类型，0-正品，3-非卖品

if(h_productkind !=null && parseInt(h_productkind.value)!=3)
{
    if(h_ActivityID!=null && parseInt(h_ActivityID.value)>0)
    {
        ltlYouhui.innerHTML=((parseFloat(ltlCurrentPrice1.innerHTML)-parseFloat(h_ActivityPrice.value))*parseFloat(count.value)).toFixed(2);
        ltlXiaoji.innerHTML=(parseFloat(h_ActivityPrice.value)*parseFloat(count.value)).toFixed(2);
    }
    else if(h_promotions.value=="1")
    {
        ltlYouhui.innerHTML=((parseFloat(ltlCurrentPrice.innerHTML)-parseFloat(h_promotionsprice.value))*parseFloat(count.value)).toFixed(2);
        ltlXiaoji.innerHTML=(parseFloat(h_promotionsprice.value)*parseFloat(count.value)).toFixed(2);
    }
    else
    {
        if(memberLogin.value=="")
        {
            ltlYouhui.innerHTML=((parseFloat(ltlCurrentPrice.innerHTML)-parseFloat(ltlCurrentPrice.innerHTML))*parseFloat(count.value)).toFixed(2);
            ltlXiaoji.innerHTML=(parseFloat(ltlCurrentPrice.innerHTML)*parseFloat(count.value)).toFixed(2);
        }
        else
        {
            ltlYouhui.innerHTML=((parseFloat(ltlCurrentPrice.innerHTML)-(parseFloat(ltlCurrentPrice.innerHTML)*parseFloat(h_memberzk.value)))*parseFloat(count.value)).toFixed(2);;
            ltlXiaoji.innerHTML=((parseFloat(ltlCurrentPrice.innerHTML)*parseFloat(h_memberzk.value))*parseFloat(count.value)).toFixed(2);;
        }
    }
}

//赠送金币
if(jQuery("#strGold"))
{
    jQuery("#strGold").html(Math.ceil(ltlXiaoji.innerHTML));
}

}

//非卖品赠送金币
function BindGold()
{
    var count=GetElementById("ctl00_ContentPlaceHolder1_ddlProductCountfmp");//数量
    var radiohg = GetElementById("rbtHuangou"); //积分换购勾选按钮
    var h_ActivityPrice = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityPrice");//积分换购价格
    
    if(radiohg!=null && radiohg.checked)
    {
        if(jQuery("#strGold"))
        {
            jQuery("#strGold").html(Math.ceil((parseFloat(h_ActivityPrice.value)*parseFloat(count.value)).toFixed(2)));
            jQuery("#divGold").show();
        }
    }
    else
    {
        jQuery("#divGold").hide();
    }
}

//加入购物车（详情页）
function doAddToShoppingCart(pid,mini)
{   

	var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum;
    var haid = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityID");
    var aid = 0;
    if(haid!=null)
    {
        aid = haid.value;
    }
    var ltlMemberPoits = GetElementById("ctl00_ContentPlaceHolder1_ltlMemberPoits");//用户积分
    var h_ActivityPoies = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityPoies");//积分换购积分
    var count=GetElementById(OProductCount);//数量
    var o = GetElementById(OProductCount);
    var pnum = 0;
    var format=/^[0-9]+$/;
    var btype = 0;
    
    if(parseInt(aid)>0)
    {
        if(getmiden())
        { 
            btype=3;
            pid=aid;
        }
        else
        {
            var a=parseFloat(jQuery("#rightDiv").css("top").replace("px",""))-500;
            jQuery("#divlogin").css({margin:a+"px 0 0 -270px"}); 
            $login.show();
            return false;
        }
    }
    else
    {
        btype=1;
    }
    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
     
    jQuery("#shopbox").show(); 
    var itop = parseFloat(jQuery("#rightDiv").css("top").replace("px",""))-600;
    var ileft = jQuery("#btnBuyProduct").offset().left;
    
    jQuery("#shopbox").css({ "margin":"-80px 0 0 0px"});
    
   
   
    
    jQuery.ajax({
        type:"post",
        url:"ProductAjax.php",
        data:"mode=addtoshoppingcart&pid="+pid+"&pnum="+pnum+"&ptype=1&btype="+btype,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
//            jQuery("#shopinfo").show();  
              getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
}

//加入购物车（详情页）非卖品
function doAddToShoppingCartfmp(pid,mini)
{
    var radiohg = GetElementById("rbtHuangou");//积分换购复选框
    var ltlMemberPoits = GetElementById("ctl00_ContentPlaceHolder1_ltlMemberPoits");//用户积分
     var h_ActivityPoies = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityPoies");//积分换购积分
     
    if(radiohg!=null && radiohg.checked)
    {
        jQuery("#shopbox").show(); 
        var itop = jQuery("#btnfmpBuyProduct").offset().top;
        var ileft = jQuery("#btnfmpBuyProduct").offset().left;
        
        jQuery("#shopbox").css({ "margin":"-200px 0 0 0px"});
        
        var o = GetElementById("ctl00_ContentPlaceHolder1_ddlProductCountfmp");
        var pnum = 0;
        var format=/^[0-9]+$/;
        var btype = 0;
        var haid = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityID");
        var aid = 0;
        if(haid!=null)
        {
            aid = haid.value;
        }
        if(o!=null && jQuery.trim(o.value).match(format))
        {
            pnum=parseInt(jQuery.trim(o.value));
        }
        else
        {
            pnum=1;
        }
    
        btype=3;
        pid=aid;
       
        jQuery.ajax({
            type:"post",
            url:"ProductAjax.php",
            data:"mode=addtoshoppingcart&pid="+pid+"&pnum="+pnum+"&ptype=1&btype="+btype,
            async:false,
            complete:function(XMLHttpRequest, textStatus){
            },
            success:function(data, textStatus){  
                
                  getprodutiofo();
                  jQuery("#ShopingCar").html(data);     
            },
            error:function()
            {  
                alert("error");
            },
            cache:false
        });    
        
        jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
            
            jQuery("#shopbox").hide();
            return false;
        });   
    }
    else
    {
        alert("请选择积分换购方式进行购买");
        return false;
    }
}

//加入购物车（详情页 悬浮条）
function doAddToShoppingCartXuanfu(pid,mini)
{    
	var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum;  
    var haid = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityID");
    var aid = 0;
    if(haid!=null)
    {
        aid = haid.value;
    }
    var ltlMemberPoits = GetElementById("ctl00_ContentPlaceHolder1_ltlMemberPoits");//用户积分
    var h_ActivityPoies = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityPoies");//积分换购积分
    var count=1;//GetElementById("ctl00_ContentPlaceHolder1_txtProductCount");//数量
    var o = GetElementById(OProductCount);
    var pnum = 0;
    var format=/^[0-9]+$/;
    var btype = 0;
    
    if(parseInt(aid)>0)
    {
        if(getmiden())
        { 
            btype=3;
            pid=aid;
        }
        else
        {
            var a=parseFloat(jQuery("#rightDiv").css("top").replace("px",""))-500;
            jQuery("#divlogin").css({margin:a+"px 0 0 -270px"}); 
            $login.show();
            return false;
        }
    }
    else
    {
        btype=1;
    }
    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
    
    var a=parseFloat(jQuery("#rightDiv").css("top").replace("px",""))-500; 
      
    
    jQuery("#shopbox").css({ "margin":""+a+"px 0 0 -270px"});
    jQuery("#shopbox").show(); 
   
   
    
    jQuery.ajax({
        type:"post",
        url:"ProductAjax.php",
        data:"mode=addtoshoppingcart&pid="+pid+"&pnum="+pnum+"&ptype=1&btype="+btype,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
//            jQuery("#shopinfo").show();  
              getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
}


//购买组套
function addGroup(aid,prices,pics,title)
{
//   window.location = "/Transit/pbc.php?arid="+aid;

   jQuery("#shopbox").show();
   
    var itop = jQuery("#btnBuyProduct").offset().top;
    var ileft = jQuery("#btnBuyProduct").offset().left;
   
   
    jQuery("#shopbox").css({ "margin": "205px 0 0 0px"});

    
     
   var name=title;
   var pid=aid;
   var pnum=1;
   var price=prices;
   var pic=pics;
//   alert(pid);
    jQuery.ajax({
        type:"post",
        url:"ProductAjax.php",
        data:"mode=addtoshoppingcart&itempid="+pid+"&number="+pnum+"&action=additem&itemname="+name+"&img="+pic+"&price="+prices,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
//            jQuery("#shopinfo").show();  
               getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}

//加入购物车（弹出框)
function addGroups(aid,prices,pics,title,priceold)
{
//   window.location = "/Transit/pbc.php?arid="+aid;

   jQuery("#shopbox").show();
   
    var itop = jQuery("#btnBuyProduct").offset().top;
    var ileft = jQuery("#btnBuyProduct").offset().left;
   
   
    jQuery("#shopbox").css({ "margin": "-10px 0 0 0px"});

    var pStyle=GetElementById("picStyle");
       var count=GetElementById("amount");//数量
    var o = GetElementById("amount");
    var pnum = 0;
    var format=/^[0-9]+$/;
   var name=title;
   var pid=aid;
   //var pnum=num;
   var price=prices;
   var priceold=priceold;
   var pic=pics;
//   alert(pid);
// picStyle =  (jQuery.trim(pStyle.value));
 picStyle = jQuery(".J-other .color li.cur").data("c"); //颜色
 
    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
    
    jQuery.ajax({
        type:"post",
        url:"../shop/Ajax.php",
        data:"mode=addtoshoppingcart&itempid="+pid+"&number="+pnum+"&action=additem&itemname="+name+"&img="+pic+"&price="+prices+"&priceold="+priceold+"&picStyle="+picStyle,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
//            jQuery("#shopinfo").show();  
               getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
 
 
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}

//app加入购物车（弹出框)
function appaddGroups(aid,prices,pics,title,priceold)
{
//   window.location = "/Transit/pbc.php?arid="+aid;

   jQuery(".box-tips").show();
   
    jQuery(".normal_loading").show();

    var pStyle=GetElementById("picStyle");
       var count=GetElementById("amount");//数量
    var o = GetElementById("amount");
    var pnum = 0;
    var format=/^[0-9]+$/;
   var name=title;
   var pid=aid;
   //var pnum=num;
   var price=prices;
   var priceold=priceold;
   var pic=pics;
//   alert(pid);
// picStyle =  (jQuery.trim(pStyle.value));
 picStyle = jQuery(".J-other .color li.cur").data("c"); //颜色
 
    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
   
    jQuery.ajax({
        type:"post",
        url:'http://'+window.location.host+"/m/shop/Ajax.php",
        data:"mode=addtoshoppingcart&itempid="+pid+"&number="+pnum+"&action=additem&itemname="+name+"&img="+pic+"&price="+prices+"&priceold="+priceold+"&picStyle="+picStyle,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
            
               getprodutiofo();
              jQuery(".box-button").html(data); 
			   jQuery(".box-tips").fadeOut(9000);      
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
 
 
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}


//app+修改数量 （弹出框)
function increaseappeditGroups(aid,prices,pics,title,priceold,nums)
{
//   window.location = "/Transit/pbc.php?arid="+aid;
if ( $(this).hasClass("no") ) return false; 
            var num = parseInt($("input[name='amount"+nums+"']").val());//购买数量
			var priceC = prices;//购买价格
			var totalNum=parseInt($("#totalNum").text());//总数
			var totalNums = totalNum+1;
            var has_buy = parseInt($(".number dd:eq(0)").attr('_realbuy'));//已购买商品数量
            var sku_limit_buys = parseInt($(".number dd:eq(0)").attr('_sku_limit_buy'));//sku限购数
			var sku_limit_buy = 5;//sku限购数
            var sku_left = parseInt($(".number dd .stock b").text()); //sku仅剩数
			
            if(isNaN(num)){
                num = 1;
            }
            if(isNaN(has_buy)){
                has_buy = 0;
            }

            if(isNaN(sku_limit_buy)){
				if (XDPROFILE.uid == '') {
					sku_limit_buy = 2;
				} else {
					sku_limit_buy = 5;
				}
            }
            var user_buy_num = num + has_buy;
			var curnums = ".cur"+nums;
            if(!isNaN(sku_left) && num >= sku_left ){
                $('.increase '+curnums+'').addClass('no');
            }else if(user_buy_num >= sku_limit_buy){
                $('.number .skulimitbuy').show();
                $('.increase '+curnums+'').addClass('no');
            }else{
                $('.number .skulimitbuy').hide();
                $("input[name='amount"+nums+"']").val(num+1);
				
				$("#count"+nums).text((num+1)*priceC);
				
				$("#totalNum").text(totalNums);
                $('.decrease '+curnums+'').removeClass('no');
            }
			
			//alert(totalNum);
   jQuery(".box-tips").show();
   
  //  jQuery(".normal_loading").show();

    var pStyle=GetElementById("picStyle");
       var count=GetElementById("amount");//数量
	   var idn = "amount"+nums
    var o = GetElementById(idn);
    var pnum = 0;
    var format=/^[0-9]+$/;
   var name=title;
   var pid=aid;
   //var pnum=num;
   var price=prices;
   var priceold=priceold;
   var pic=pics;
   
// picStyle =  (jQuery.trim(pStyle.value));
 picStyle = jQuery(".J-other .color li.cur").data("c"); //颜色
 
 if(nums==5){$('.number .skulimitbuy').show();}
    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
	
  // alert(nums);
    jQuery.ajax({
        type:"post",
        url:'http://'+window.location.host+"/m/cart/Ajax.php",
        data:"mode=addtoshoppingcart&itempid="+pid+"&pnum["+aid+"][]="+pnum+"&action=修改&itemname="+name+"&img="+pic+"&price="+prices+"&priceold="+priceold+"&picStyle="+picStyle,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
            
               getprodutiofo();
              jQuery("#counts").html(data); 
			   jQuery(".box-tips").fadeOut(9000);      
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
 
 
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}

//app-修改数量 （弹出框)
function decreaseappeditGroups(aid,prices,pics,title,priceold,nums)
{
//   window.location = "/Transit/pbc.php?arid="+aid;
if ( $(this).hasClass("no") ) return false; 
            var num = parseInt($("input[name='amount"+nums+"']").val());//购买数量
			var priceC = prices;//购买价格
			var totalNum=parseInt($("#totalNum").text());//总数
			var totalNums = totalNum-1;
            var limitnum = $('.number dd').attr('_sku_limit_buy');
            if(num > 1){
                $("input[name='amount"+nums+"']").val(num-1);
				$("#count"+nums).text((num-1)*priceC);
				$("#totalNum").text(totalNums);
                $('.decrease,.increase').removeClass('no');
            }else{
                $(this).addClass('no');
            }
            
			$('.number .skulimitbuy').html('限购<em class="red">'+limitnum+'</em>件');
            $('.number .skulimitbuy').hide();
   jQuery(".box-tips").show();
   
  //  jQuery(".normal_loading").show();

    var pStyle=GetElementById("picStyle");
       var count=GetElementById("amount");//数量
	   var idn = "amount"+nums
    var o = GetElementById(idn);
    var pnum = 0;
    var format=/^[0-9]+$/;
   var name=title;
   var pid=aid;
   //var pnum=num;
   var price=prices;
   var priceold=priceold;
   var pic=pics;
//   alert(pid);
// picStyle =  (jQuery.trim(pStyle.value));
 picStyle = jQuery(".J-other .color li.cur").data("c"); //颜色
 
    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
	
  // alert(nums);
    jQuery.ajax({
        type:"post",
        url:'http://'+window.location.host+"/m/cart/Ajax.php",
        data:"mode=addtoshoppingcart&itempid="+pid+"&pnum["+aid+"][]="+pnum+"&action=修改&itemname="+name+"&img="+pic+"&price="+prices+"&priceold="+priceold+"&picStyle="+picStyle,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
            
               getprodutiofo();
              jQuery("#counts").html(data); 
			   jQuery(".box-tips").fadeOut(9000);      
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
 
 
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}
//加入购物车（弹出框)
function addGroupyhs(aid,prices,pics,title,priceold,yh)
{
//   window.location = "/Transit/pbc.php?arid="+aid;

   jQuery("#shopbox").show();
   
    var itop = jQuery("#btnBuyProduct").offset().top;
    var ileft = jQuery("#btnBuyProduct").offset().left;
   
   
    jQuery("#shopbox").css({ "margin": "-10px 0 0 0px"});

    var pStyle=GetElementById("picStyle");
       var count=GetElementById("amount");//数量
    var o = GetElementById("amount");
    var pnum = 0;
    var format=/^[0-9]+$/;
   var name=title;
   var pid=aid;
   var yh=yh;
   var price=prices;
   var priceold=priceold;
   var pic=pics;
//   alert(pid);
// picStyle =  (jQuery.trim(pStyle.value));
 picStyle = jQuery(".J-other .color li.cur").data("c"); //颜色
 
    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
    
    jQuery.ajax({
        type:"post",
        url:"../shop/Ajax.php",
        data:"mode=addtoshoppingcart&itempid="+pid+"&number="+pnum+"&action=additem&itemname="+name+"&img="+pic+"&price="+prices+"&priceold="+priceold+"&yh="+yh+"&picStyle="+picStyle,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
//            jQuery("#shopinfo").show();  
               getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}
//咨询加入购物车（弹出框)
function addGroupsc(aid,prices,pics,title,num)
{
//   window.location = "/Transit/pbc.php?arid="+aid;

   jQuery("#shopbox").show();
   
    var itop = jQuery("#btnBuyProduct").offset().top;
    var ileft = jQuery("#btnBuyProduct").offset().left;
   
   
    jQuery("#shopbox").css({ "margin": "100px 750px 0 0px"});

    
       var count=GetElementById("ctl00_ContentPlaceHolder1_txtProductCount");//数量
    var o = GetElementById("ctl00_ContentPlaceHolder1_txtProductCount");
    var pnum = 0;
    var format=/^[0-9]+$/;
   var name=title;
   var pid=aid;
   //var pnum=num;
   var price=prices;
   var pic=pics;
//   alert(pid);

    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
    
    jQuery.ajax({
        type:"post",
        url:"ProductAjax.php",
        data:"mode=addtoshoppingcart&itempid="+pid+"&number="+pnum+"&action=additem&itemname="+name+"&img="+pic+"&price="+prices,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
//            jQuery("#shopinfo").show();  
               getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}

//省市（弹出框)
function getCity(aid)
{
//   window.location = "/Transit/pbc.php?arid="+aid;

   jQuery("#shopbox").show();
   
  //  var itop = jQuery("#btnBuyProduct").offset().top;
   // var ileft = jQuery("#btnBuyProduct").offset().left;
   
   
   // jQuery("#shopbox").css({ "margin": "-200px 0 0 0px"});

    
       var count=GetElementById("selProvince");//数量
    var o = GetElementById("selProvince");
    var pnum = 0;
    var format=/^[0-9]+$/;
   var name=title;
   var pid=aid;
   //var pnum=num;
   var price=prices;
   var pic=pics;
//   alert(pid);

    if(o!=null && jQuery.trim(o.value).match(format))
    {
        pnum=parseInt(jQuery.trim(o.value));
    }
    else
    {
        pnum=1;
    }
    
    jQuery.ajax({
        type:"post",
        url:"getAjax.php",
        data:"mode=addtoshoppingcart&city="+pnum+"&number="+pnum+"&action=additem&itemname="+name+"&img="+pic+"&price="+prices,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
//            jQuery("#shopinfo").show();  
               getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    //jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
       // jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
      //  return false;
   // });   
    
}

//套装详细加入购物车（弹出框)
function addGroupss(aid,prices,pics,title,num)
{
//   window.location = "/Transit/pbc.php?arid="+aid;

   jQuery("#shopbox").show();
   
    var itop = jQuery("#btnBuyProduct").offset().top;
    var ileft = jQuery("#btnBuyProduct").offset().left;
   
   
    jQuery("#shopbox").css({ "margin": "-200px 0 0 0px"});

    
     
   var name=title;
   var pid=aid;
   var pnum=num;
   var price=prices;
   var pic=pics;
//   alert(pid);
    jQuery.ajax({
        type:"post",
        url:"ProductAjax.php",
        data:"mode=addtoshoppingcart&itempid="+pid+"&number="+pnum+"&action=additem&itemname="+name+"&img="+pic+"&price="+prices,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
            
//            jQuery("#shopinfo").html(data);
//            jQuery("#shoploading").hide();
//            jQuery("#shopinfo").show();  
               getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
//        jQuery("#shopinfo").hide();
        return false;
    });   
    
}
//加入购物车（弹出框）
function doAddToShoppingCartTui (pid,mini)
{

    jQuery("#shopbox").show(); 
      
   var btype=1;
   var pnum=1;
   
    jQuery.ajax({
        type:"post",
        url:"ProductAjax.php",
        data:"mode=addtoshoppingcart&pid="+pid+"&pnum="+pnum+"&ptype=1&btype="+btype,
        async:false,
        complete:function(XMLHttpRequest, textStatus){
        },
        success:function(data, textStatus){  
              getprodutiofo();
              jQuery("#ShopingCar").html(data);     
        },
        error:function()
        {  
            alert("error");
        },
        cache:false
    });    
    
    jQuery("#shopbox").find("#close,#jxgwbtn").click(function() {
        
        jQuery("#shopbox").hide();
        return false;
    });   
}


//绑定网站头部购买信息
function getprodutiofo()
{
// jQuery.ajax({
//        type:"post",
//        url:"/Product/Ajax.php",
//        data:"mode=getprodutiofo",
//        async:false,
//        complete:function(XMLHttpRequest, textStatus){
//        },
//        success:function(data, textStatus){  

//              jQuery("#myheaderproduif").html(data);     
//        },
//        error:function()
//        {     
//            alert("error");
//        },
//        cache:false
//    });    
    bindshoppingcartheader();  
}

 
//连接到组套页面
function togoGroup(aid)
{
   window.location = "http://www..com/suite/"+aid+".html"; 
;
}


//判断是否为迷你装，设置购买数量
function shpopCount()
{
		var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var OProductCount = "ctl00_ContentPlaceHolder1_txtProductCount"+pnum;  
var pnum = jQuery(".ddpp li.dfsdd").data("c"); 
var Opri = "ctl00_ContentPlaceHolder1_ltlCurrentPrice"+pnum;
var ltlCurrentPrice = GetElementById(Opri);//现在价格
var h_ActivityPrice = GetElementById("ctl00_ContentPlaceHolder1_h_ActivityPrice");//积分换购价格
if(ltlCurrentPrice!=null && ltlCurrentPrice.innerHTML=="0")
{
    jQuery("#"+OProductCount).attr("disabled","disabled");
//jQuery("#aMinus").attr("onclick","");
//jQuery("#aMinus").attr("disabled","disabled");
//jQuery("#aMinus").css({ "cursor": "auto"})
//jQuery("#aMinus").css({ "color": "#666666"})

//jQuery("#aAdd").attr("onclick","");
//jQuery("#aAdd").attr("disabled","disabled");
//jQuery("#aAdd").css({ "cursor": "auto"})
//jQuery("#aAdd").css({ "color": "#666666"})
}
}

function getmiden()
{
    var na = "";
    jQuery.ajax({
        type:"post",
        url:"ajax.php",
        data:"mode=getMemberLogin",
        async: false,
        success:function(data){
            na = data;
        }
    });
    return na;
}


//到货通知
function  btn_daohuotongzhi()
{
     var $divdhtz= new Dialog("divdhtz");// 第一步关闭
       
    if(getmiden()=="")
    {
         //设置弹框位置
          jQuery("#divlogin").css({margin:"-100px 0 0 -200px"});       
           $login.show();
         
        //弹出登录
        // $login.show();
    }
    else
    {
      
      jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=GetEmail",
            async: false,
            success:function(data){
                     jQuery("#ctl00_ContentPlaceHolder1_txtEmail").val(data);

                  }
            });
       jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=GetMoblie",
            async: false,
            success:function(data){
                     jQuery("#ctl00_ContentPlaceHolder1_txtMoblie").val(data);

                  }
            });
            clearp();
        $divdhtz.show();
    }

}

function  myclose()
{
    var $divdhtz= new Dialog("divdhtz");// 第一步关闭
    var $divdhtz_ok= new Dialog("divdhtz_ok");// 第一步关闭
    var $div_Jiangjia= new Dialog("div_Jiangjia");// 第一步关闭
    var $div_Jiangjia_ok= new Dialog("div_Jiangjia_ok");// 第一步关闭
    var $div_spys= new Dialog("div_spys");// 第一步关闭
    var $div_spysok= new Dialog("div_spysok");// 第一步关闭
    $divdhtz.hide();
    $divdhtz_ok.hide();
    $div_Jiangjia.hide();
    $div_Jiangjia_ok.hide();
    $div_spys.hide();
     $div_spysok.hide();
}

function updatebymemberemail(type)
{
  var Email="";
  var mob=jQuery("#ctl00_ContentPlaceHolder1_txtMoblie").val();
    if(type=="1")//到货通知
    {
      Email=jQuery("#ctl00_ContentPlaceHolder1_txtEmail").val();
    }
    if(type=="2")//降价通知
    {
      Email=jQuery("#ctl00_ContentPlaceHolder1_txtEmail_jj").val();
    }
    if(type=="3")//预售通知
    {
      Email=jQuery("#ctl00_ContentPlaceHolder1_txtEmail_ys").val();
    }
   
    if(CheckEmail(Email)==false)
     {
        return false;
     }
     
     else
     {
  
          jQuery.ajax({
	                type:"post",
	                url:"ajax.php",
	                data:"mode=UpdateByMemberEmail&Email="+Email+"&Mobile="+mob,
	                success:function(data){
	               
	                    if(data=="1")
	                    {
	                        window.open('/Member/safeAccount/emailbindstep1.php');
	                    }
	                    else
	                    {
	                        alert("验证失败！");
	                    }	            
	                },
	                dataType:"text"
	            });
	    }

}

function updatebymemberMoblie(type)
{
  var Email=jQuery("#ctl00_ContentPlaceHolder1_txtEmail").val();
  var mob="";
  
  
   if(type=="1")//到货通知
    {
      mob=jQuery("#ctl00_ContentPlaceHolder1_txtMoblie").val();
    }
    if(type=="2")//降价通知
    {
      mob=jQuery("#ctl00_ContentPlaceHolder1_txtMoblie_jj").val();
    }
    if(type=="3")//预售通知
    {
      mob=jQuery("#ctl00_ContentPlaceHolder1_txtMoblie_ys").val();
    }
   
  
   if(CheckMoblie(mob)==false)
   {
   
       return false;
   }
   else
  {
  
  
      jQuery.ajax({
	            type:"post",
	            url:"ajax.php",
	            data:"mode=UpdateByMemberMobile&Email="+Email+"&Mobile="+mob,
	            success:function(data){
	                if(data=="1")
	                {
	                    window.open('/Member/safeAccount/mobilebindstep1.php');
	                }
	                else
	                {
	                    alert("验证失败！");
	                }	            
	            },
	            dataType:"text"
	        });
 }

}

function isMobilePhone(obj)
{
	var partten = /^(1[3458])[0-9]{9}$/;
	
	if(partten.test(obj))
	{
		return true ;
	}
	else
	{
		return false ;
	}
}



// 到货通知
function  btn_qhtzClick(pid)
{

    var Email=jQuery("#ctl00_ContentPlaceHolder1_txtEmail").val();
    var mob=jQuery("#ctl00_ContentPlaceHolder1_txtMoblie").val();
     var name_regular = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
     jQuery("#p2").css({"display":"none"});
         
      jQuery("#jj_p2").css({"display":"none"});
         
     jQuery("#ys_p2").css({"display":"none"});
     if(CheckIsEmailbyMoblies(Email,mob)==false)
     {
        return false;
     }
     
     else
     {
        //判断是否添加到收藏夹
        var title =document.title;
         if(document.getElementById("ck1").checked)
         {
            jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=addtofavorites&pid="+pid+"&type="+1+"&url="+window.location+"&name="+escape(title),
            async: false,
            success:function(data){

                  }
            });
         }
         var $divdhtz= new Dialog("divdhtz");// 第一步关闭
         var $divdhtz_ok= new Dialog("divdhtz_ok");// 第一步关闭
          jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=AddProductNote&pid="+pid+"&Email="+Email+"&Mobile="+mob+"&type=1",
            async: false,
            success:function(data){

                    if(data=="1")
                    { 
                       $divdhtz.hide();
                       $divdhtz_ok.show();
                    }
                   if(data=="0")
                   {
                       alert("您已经预定过该产品");
                   }
                   if(data=="2")
                   {
                       alert("预定失败");
                   }
                    
                    
            }});
         
         
     
     }

}

function CheckEmail(Email)
{
    var a=false;
    
      var name_regular = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(jQuery.trim(Email)=="")
    {
      jQuery("#p1").html("邮箱不能为空!");
      jQuery("#p1").css({"display":"block"});
      jQuery("#jj_p1").html("邮箱不能为空!");
      jQuery("#jj_p1").css({"display":"block"});
      jQuery("#ys_p1").html("邮箱不能为空!");
      jQuery("#ys_p1").css({"display":"block"});
      a=false;
    }
    else if(!name_regular.test(Email))
    {
    
      jQuery("#p1").html("请输入正确的邮箱!");
      jQuery("#p1").css({"display":"block"});
      jQuery("#jj_p1").html("请输入正确的邮箱!");
      jQuery("#jj_p1").css({"display":"block"});
      jQuery("#ys_p1").html("请输入正确的邮箱!");
      jQuery("#ys_p1").css({"display":"block"});
      a=false;
    }
    else
    {
      jQuery("#p1").html("");
      jQuery("#p1").css({"display":"none"});
      jQuery("#jj_p1").html("");
      jQuery("#jj_p1").css({"display":"none"});
      jQuery("#ys_p1").html("");
      jQuery("#ys_p1").css({"display":"none"});
        a=true;
    }
    return a;

}

function CheckMoblie(mob)
{
 var a=false;
 
 if(mob=="")
  {   jQuery("#p2").html("手机不能为空!");
      jQuery("#p2").css({"display":"block"});
       jQuery("#jj_p2").html("手机不能为空!");
      jQuery("#jj_p2").css({"display":"block"});
       jQuery("#ys_p2").html("手机不能为空!");
      jQuery("#ys_p2").css({"display":"block"});
      
      a=false;
  
  }
  else if(!isMobilePhone(jQuery.trim(mob)))
  {
     jQuery("#p2").html("请输入正确的手机号码!");
      jQuery("#p2").css({"display":"block"});
        jQuery("#jj_p2").html("请输入正确的手机号码!");
      jQuery("#jj_p2").css({"display":"block"});
        jQuery("#ys_p2").html("请输入正确的手机号码!");
      jQuery("#ys_p2").css({"display":"block"});
      a=false;
        
  }
  else
  {
       jQuery("#p2").html("");
      jQuery("#p2").css({"display":"none"});
      jQuery("#jj_p2").html("");
      jQuery("#jj_p2").css({"display":"none"});
      jQuery("#ys_p2").html("");
      jQuery("#ys_p2").css({"display":"none"});
        a=true;
  }
  return  a;
}



function CheckIsEmailbyMoblies(Email,mob)
{
   var a=true;
   var name_regular = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
 if(mob=="" && Email=="")
  {   jQuery("#p1").html("邮箱不能为空!");
      jQuery("#p1").css({"display":"block"});
      jQuery("#jj_p1").html("邮箱不能为空!");
      jQuery("#jj_p1").css({"display":"block"});
      jQuery("#ys_p1").html("邮箱不能为空!");
      jQuery("#ys_p1").css({"display":"block"});
      a=false;
    
  
  }
  if(Email!="")
  {
         if(!name_regular.test(Email))
        {
        
          jQuery("#p1").html("请输入正确的邮箱!");
          jQuery("#p1").css({"display":"block"});
          jQuery("#jj_p1").html("请输入正确的邮箱!");
          jQuery("#jj_p1").css({"display":"block"});
          jQuery("#ys_p1").html("请输入正确的邮箱!");
          jQuery("#ys_p1").css({"display":"block"});
          a=false;
        }
         
  
  }
  if(mob!="")
  {
    
      if(!isMobilePhone(jQuery.trim(mob)))
      {
         jQuery("#p2").html("请输入正确的手机号码!");
          jQuery("#p2").css({"display":"block"});
            jQuery("#jj_p2").html("请输入正确的手机号码!");
          jQuery("#jj_p2").css({"display":"block"});
            jQuery("#ys_p2").html("请输入正确的手机号码!");
          jQuery("#ys_p2").css({"display":"block"});
          a=false;
            
      }
      else
      {
           
          jQuery("#p1").css({"display":"none"});
          
          jQuery("#jj_p1").css({"display":"none"});
      
          jQuery("#ys_p1").css({"display":"none"});
      }
  }
  return  a;
}



//到货通知
function  btn_JiangJiaTongZhi()
{
     var $div_Jiangjia= new Dialog("div_Jiangjia");// 第一步关闭
       
    if(getmiden()=="")
    {
         //设置弹框位置
          jQuery("#divlogin").css({margin:"-100px 0 0 -200px"});       
           $login.show();
         
        //弹出登录
        // $login.show();
    }
    else
    {
    
     jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=GetEmail",
            async: false,
            success:function(data){
                     jQuery("#ctl00_ContentPlaceHolder1_txtEmail_jj").val(data);

                  }
            });
       jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=GetMoblie",
            async: false,
            success:function(data){
                     jQuery("#ctl00_ContentPlaceHolder1_txtMoblie_jj").val(data);

                  }
            });
         clearp();
        $div_Jiangjia.show();
    }

}

function  JiangJiaTongZhi(pid)
{
   var Email=jQuery("#ctl00_ContentPlaceHolder1_txtEmail_jj").val();
    var mob=jQuery("#ctl00_ContentPlaceHolder1_txtMoblie_jj").val();
     var name_regular = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
   jQuery("#p2").css({"display":"none"});
         
      jQuery("#jj_p2").css({"display":"none"});
         
     jQuery("#ys_p2").css({"display":"none"});
     if(CheckIsEmailbyMoblies(Email,mob)==false)
     {
        return false;
     }
      
     else
     {
        //判断是否添加到收藏夹
        var title =document.title;
         if(document.getElementById("ck1_jj").checked)
         {
            jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=addtofavorites&pid="+pid+"&type="+1+"&url="+window.location+"&name="+escape(title),
            async: false,
            success:function(data){

                  }
            });
         }
         var $div_Jiangjia= new Dialog("div_Jiangjia");// 第一步关闭
         var $div_Jiangjia_ok= new Dialog("div_Jiangjia_ok");// 第一步关闭
          jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=AddProductNote&pid="+pid+"&Email="+Email+"&Mobile="+mob+"&type=3",
            async: false,
            success:function(data){

                    if(data=="1")
                    { 
                       $div_Jiangjia.hide();
                       $div_Jiangjia_ok.show();
                    }
                   if(data=="0")
                   {
                       alert("您已经预定过该产品");
                   }
                   if(data=="2")
                   {
                       alert("预定失败");
                   }
                    
                    
            }});
         
         
     
     }

}

//商品预售
function   btn_shangpingyushou()
{
  
   var $div_spys= new Dialog("div_spys");// 第一步关闭
       
    if(getmiden()=="")
    {
         //设置弹框位置
          jQuery("#divlogin").css({margin:"-100px 0 0 -200px"});       
           $login.show();
         
        //弹出登录
        // $login.show();
    }
    else
    {
    
     jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=GetEmail",
            async: false,
            success:function(data){
                     jQuery("#ctl00_ContentPlaceHolder1_txtEmail_ys").val(data);

                  }
            });
       jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=GetMoblie",
            async: false,
            success:function(data){
                     jQuery("#ctl00_ContentPlaceHolder1_txtMoblie_ys").val(data);

                  }
            });
         clearp();
        $div_spys.show();
    }


}


function  shangpingyushou(pid)
{

  var Email=jQuery("#ctl00_ContentPlaceHolder1_txtEmail_ys").val();
    var mob=jQuery("#ctl00_ContentPlaceHolder1_txtMoblie_ys").val();
     var name_regular = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
     
     jQuery("#p2").css({"display":"none"});
         
      jQuery("#jj_p2").css({"display":"none"});
         
     jQuery("#ys_p2").css({"display":"none"});
     if(CheckIsEmailbyMoblies(Email,mob)==false)
     {
        return false;
     }
      
     else
     {
        //判断是否添加到收藏夹
        var title =document.title;
         if(document.getElementById("ck1_ys").checked)
         {
            jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=addtofavorites&pid="+pid+"&type="+1+"&url="+window.location+"&name="+escape(title),
            async: false,
            success:function(data){

                  }
            });
         }
         var $div_spys= new Dialog("div_spys");// 第一步关闭
         var $div_spysok= new Dialog("div_spysok");// 第一步关闭
          jQuery.ajax({
            type:"post",
            url:"ajax.php",
            data:"mode=AddProductNote&pid="+pid+"&Email="+Email+"&Mobile="+mob+"&type=2",
            async: false,
            success:function(data){

                    if(data=="1")
                    { 
                       $div_spys.hide();
                       $div_spysok.show();
                    }
                   if(data=="0")
                   {
                       alert("您已经预定过该产品");
                   }
                   if(data=="2")
                   {
                       alert("预定失败");
                   }
                    
                    
            }});
         
         
     
     }
}


function  clearp()
{
     
      jQuery("#p1").css({"display":"none"});
   
      jQuery("#jj_p1").css({"display":"none"});
    
      jQuery("#ys_p1").css({"display":"none"});
    
      jQuery("#p2").css({"display":"none"});
         
      jQuery("#jj_p2").css({"display":"none"});
         
     jQuery("#ys_p2").css({"display":"none"});
}

function BindMenu5()
{
    if(mkmenu5==0)
    {
        jQuery.ajax({
            type:"post",
            url:"ProductAjax.php",
            data:"mode=bindmenu5&cid=81,94",
            async:false,
            complete:function(XMLHttpRequest, textStatus){
            },
            success:function(data, textStatus){  
                
                jQuery("#divmenu5content").html(data);
                jQuery("#divmenu5loading").hide();
                mkmenu5=1;
            },
            cache:false
        });
    }   
}

function BindMenu6()
{
    if(mkmenu6==0)
    {
        jQuery.ajax({
            type:"post",
            url:"ProductAjax.php",
            data:"mode=bindmenu5&cid=67",
            async:false,
            complete:function(XMLHttpRequest, textStatus){
            },
            success:function(data, textStatus){  
                
                jQuery("#divmenu6content").html(data);
                jQuery("#divmenu6loading").hide();
                mkmenu6=1;
            },
            cache:false
        });
    }   
}

