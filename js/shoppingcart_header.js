
//绑定头部购物车
function bindshoppingcartheader()
{
    jQuery("#divloadingheader").show();
    jQuery("#divshoppingcartheader").hide();
    
    jQuery.ajax({
        type:"post",
        url:"/ajax.aspx",
        data:"mode=bindshoppingcartheader",
        async:false,
        success:function(data){
                
                var d = data.split("$##$");               
                jQuery("#divshoppingcartheader").html(d[0]);
                jQuery("#sProductCount").html(d[1]);
                jQuery("#sProductCount1").html(d[1]);
                jQuery("#divloadingheader").hide();
                jQuery("#divshoppingcartheader").show();  
                
            },
        cache:false    
    });

}


//删除购物车中产品
function DeleteProduct_Header(GiftBagId,GiftBagNum,ProductId,ProductNum,IsGiftBag,ProductType,BuyType,Type)
{ 
    jQuery.ajax({
        type:"post",
        url:"/ajax.aspx",
        data:"mode=deleteproheader&gbid="+GiftBagId+"&gbnum="+GiftBagNum+"&pid="+ProductId+"&pnum="+ProductNum+"&isgb="+IsGiftBag+"&ptype="+ProductType+"&btype="+BuyType+"&type="+Type,
        async:false,
        success:function(data){
                
                bindshoppingcartheader();  
                
            },
        cache:false    
    });

}