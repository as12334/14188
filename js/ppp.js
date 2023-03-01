
jQuery(document).ready(function(){
    
    jQuery("#ac").html('<p class="content">正在加载……</p>');
    jQuery("#PreAndNextPage").html("<a href='javascript:void(0)' class='nopage'>上一条</a><a href='javascript:getNextPage(2);'>下一条</a>");
	
    getNextPage(1);
	
	    jQuery("#pro_list").html('<p class="content">正在加载……</p>');
    jQuery("#PreAndNextPage").html("<a href='javascript:void(0)' class='nopage'>上一条</a><a href='javascript:pro(1,1,12);'>下一条</a>");
	
    pro(1,23,1);
	
});

function getNextPage(page)
{
debugger;
    if(typeof page == "undefined"){
        page = 1;       
    }
        var maxPage=jQuery("#NoticeCount").val();
        jQuery("#ac").html('<p class="content">正在加载……</p>');
         jQuery.ajax({
            type:"post",
            url:"pajax.php?mode=getnoticeinformation&page="+page,
            success:function(data){
                if(jQuery.trim(data)!="")
                {
                    jQuery("#ac").html("<p class='content'>"+data+"</p>");
                    if(page==1 && maxPage==1)
                    {
                         jQuery("#PreAndNextPage").html("<a href='javascript:void(0)' class='nopage'>上一条</a><a href='javascript:void(0)' class='nopage'>下一条</a>");
                    }
                    else if(page==1 && maxPage>1)
                    {
                        jQuery("#PreAndNextPage").html("<a href='javascript:void(0);'>上一条</a><a href='javascript:getNextPage("+(page+1)+");'>下一条</a>");
                    }
                    else if(page==maxPage)
                    {
                        jQuery("#PreAndNextPage").html("<a href='javascript:getNextPage("+(page-1)+");'>上一条</a><a href='javascript:void(0);'>下一条</a>");
                    }
                    else
                    {
                    jQuery("#PreAndNextPage").html("<a href='javascript:getNextPage("+(page-1)+");'>上一条</a><a href='javascript:getNextPage("+(page+1)+");'>下一条</a>");
                    }
                }
            }
        });
    
    }   
function pro(a,page,q){

        var maxPage=jQuery("#NoticeCount").val();
        jQuery("#pro_list").html('<p class="content" style=" text-align:content; padding:0px 0px 0px 450px;"><img src="images/loading.gif" /></p>');
         jQuery.ajax({
            type:"post",
            url:"jAjax.php?mode=getnoticeinformation&page=page",
            success:function(data){
                jQuery("#pro_list").html("<p class='content'>"+data+"</p>");
            }
        });
    
    
}