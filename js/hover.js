function setTab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"badyactive":"";
con.style.display=i==cursel?"block":"none";
}
}

function setTab1(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"active":"";
con.style.display=i==cursel?"block":"none";
}
}


jQuery(function(){
	jQuery("#mdtab > li").each(function(index){
	    var mdname="tabcont";
		jQuery(this).click(function(){
			jQuery(".hover").removeClass("hover");								 
			jQuery(this).addClass("hover");
			jQuery(".gocl").css("display","none");;
			jQuery("#"+mdname+index).css("display","block");
		});								
	});
});