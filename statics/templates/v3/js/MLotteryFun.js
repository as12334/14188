				function gg_show_Time_fun(times,objc,uhtml,data){
					time = times - (new Date().getTime());
					i =  parseInt((time/1000)/60);
					s =  parseInt((time/1000)%60);
					ms =  String(Math.floor(time%1000));
					ms = parseInt(ms.substr(0,2));
					if(i<10)i='0'+i;
					if(s<10)s='0'+s;
					if(ms<=0)ms='00';
					objc.html('<em class="minute">'+i+'</em><em class="second"> : '+s+' : </em><em class="millisecond">'+ms+'</em>');

					if(time<=0){

						var obj = objc.parent().parent();
							obj.find(".countdown_div").html('<span class="lateron" style="color: #fff;">正在计算,请稍后…</span>');
							 setTimeout(function(){
								obj.html(uhtml);
								//obj.attr('class',"new_li");
								$.ajaxSetup({
									async : false
								});
								$.post(data['path']+"/api/getshop/lottery_shop_set/",{'lottery_sub':'true','gid':data['id']},null);
							},5000);
							return;
					}

					 setTimeout(function(){
							gg_show_Time_fun(times,objc,uhtml,data);
					 },30);

				}
				function gg_show_time_add_li(div,path,info){

					var html = '';
					html+='<li>';
					
						html+='<a href="'+path+'/mobile/mobile/item/'+info.id+'"  class="u-lott-pic">';
							html+='<img src="'+info.upload+'/'+info.thumb+'" >';
						//	html+='<i class="light"></i>';
						html+='</a>';
					 
				//	html+='<dd class="u-name"><a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="name">'+info.title+'</a></dd>';
					html+='<span class="countdown_div">';
					//	html+='<img src="'+info.upload+'/photo/zhong.gif" style="vertical-align: middle;">';
					//	html+='<em class="wenzi">倒计时:</em>';
						html+='<em class="shi"><em class="minute">99</em>:<em class="second">99</em>:<em class="millisecond">99</em></em>';
						
					html+='</span>';
					html+='<div class="newawary"></div>';
					
					html+='</li>';

					var uhtml = '';
					//uhtml+='<li>';
					// uhtml+='<dl>';
				//	  uhtml+='<dt>';
						uhtml += '<a href="'+path+'/mobile/mobile/item/'+info.id+'" class="u-lott-pic">';
							uhtml +='<img src="'+info.upload+'/'+info.thumb+'">';
						//	uhtml +='<i class="light"></i>';
						uhtml +='</a>';
					//  uhtml+='</dt>';	
					  uhtml+='<p class="f-gx-user">';
					  uhtml+='<em class="zheng">中奖</em>  ';
					  uhtml+='<em class="blue">';
					  uhtml+='<a rel="nofollow" class="blue" href="'+path+'/uname/'+(1000000000 + parseInt(info.uid))+'" target="_blank">';
					  uhtml+=info.user;
					  uhtml+='</a></em>';
					  uhtml+='';
					  uhtml+='</p>';

					//  uhtml+='<dd class="u-name"><a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="name">'+info.title+'</a></dd>';
					//	uhtml +='</dl>';
					//	uhtml+='<cite style="display: inline;"></cite>';
						
				//	uhtml+='</li>';

					var divl = $("#"+div).find('li');
					var len = divl.length;
					if(len==6 && len  >0){
						var this_len = len - 1;
						//divl[this_len].remove();
						divl.eq(this_len).remove();
					}
					$("#"+div).prepend(html);
					$("#"+div+" li:last").remove();
					//var div_li_obj = $(".countdown_li").eq(0).find(".shi");
					var div_li_obj = $(".shi").eq(0);
					//setInterval(function(){gg_show_Time_fun(div_obj,info.times);},123);
					var data = new Array();
						data['id'] = info.id;
						data['path'] = path;
					info.times = (new Date().getTime())+(parseInt(info.times))*1000;
					gg_show_Time_fun(info.times,div_li_obj,uhtml,data,info.id);
				}//

				function gg_show_time_init(div,path,gid){
					window.setTimeout("gg_show_time_init()",5000);
					if(!window.GG_SHOP_TIME){
						window.GG_SHOP_TIME = {
							gid : '',
							path : path,
							div : div,
							arr : new Array()
						};
					}
					$.get(GG_SHOP_TIME.path+"/api/getshop/lottery_shop_json/"+new Date().getTime(),{'gid':GG_SHOP_TIME.gid},function(indexData){
							var info = jQuery.parseJSON(indexData);

							if(info.error == '0' && info.id != 'null'){
								if(!GG_SHOP_TIME.arr[info.id]){
											GG_SHOP_TIME.gid =  GG_SHOP_TIME.gid +'_'+info.id;
											GG_SHOP_TIME.arr[info.id] = true;
											gg_show_time_add_li(GG_SHOP_TIME.div,GG_SHOP_TIME.path,info);
								}
							}
					});

				}