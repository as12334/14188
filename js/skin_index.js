function date(e,t,i,n,r,s){function a(e,t){return 32-new Date(e,t-1,32).getDate()}var o={_default:[],set:function(){this.setYear(),this.setMonth(),this.setDate(),this.setHours(),this.setMinutes(),this.setSeconds()},setYear:function(t,i){if(e){var n=(new Date).getFullYear();t=t?t:n-70,i=i?i:n,e.html("");for(var r=t;i>=r;r++)e.append("<option value='"+r+"' >"+r+"</option>");e.prepend("<option value=''></option>"),e.val("")}},setMonth:function(){if(t){t.html("");for(var e=1;12>=e;e++)t.append("<option value='"+(10>e?"0"+e:e)+"' >"+(10>e?"0"+e:e)+"</option>");t.prepend("<option value=''></option>"),t.val("")}},setDate:function(e,t){if(i){var n=a(e,t);i.html("");for(var r=1;n>=r;r++)i.append('<option value="'+(10>r?"0"+r:r)+'" >'+(10>r?"0"+r:r)+"</option>");i.prepend("<option value=''></option>"),i.val("")}},setHours:function(){if(n){n.html("");for(var e=0;24>e;e++)n.append("<option value='"+(10>e?"0"+e:e)+"' >"+(10>e?"0"+e:e)+"</option>")}},setMinutes:function(){if(r){r.html("");for(var e=0;60>e;e++)r.append("<option value='"+(10>e?"0"+e:e)+"' >"+(10>e?"0"+e:e)+"</option>")}},setSeconds:function(){if(s){s.html("");for(var e=0;60>e;e++)s.append("<option value='"+(10>e?"0"+e:e)+"' >"+(10>e?"0"+e:e)+"</option>")}},clear:function(){this.set(this._default[0],this._default[1],this._default[2],this._default[3],this._default[4],this._default[5])}};return e&&(o._default[0]=e.val()),t&&(o._default[1]=t.val()),i&&(o._default[2]=i.val()),n&&(o._default[3]=n.val()),r&&(o._default[4]=r.val()),s&&(o._default[5]=s.val()),o.setYear(),o.setMonth(),o.setDate(o._default[0],o._default[1]),o.setHours(),o.setMinutes(),o.setSeconds(),setTimeout(function(){e&&e.val(o._default[0]).change(function(){o.setMonth(),o.setDate(e.val(),t.val())}),t&&t.val(o._default[1]).change(function(){o.setDate(e.val(),t.val())}),i&&i.val(o._default[2])},200),o}$(function(){function e(e){$(".J_skinType").text(e.data.skin_type),$(".J_skinInfo").text(e.data.info),$(".J_skinTips").text(e.data.tips),$(".J_skinWant").text(e.data.want_type),$(".J_skinQun").text(e.data.qun),$(".J_skinGuid").attr("href",e.data.guide_link),e.data.click_add?$(".c_qun").attr("href",e.data.click_add):$(".c_qun").hide(),$(".J_skinQQ").text(e.data.qq),$(".J_skinQQlink").attr("href","http://wpa.qq.com/msgrd?v=3&uin="+e.data.qq+"&site=qq&menu=yes"),$(".J_skinGuid").attr("href",e.data.guid_link)}function t(t){var i=$(".J_skinForm"),n=i.serialize()+"&vcode="+(t?t:""),r=i.attr("action");$.ajax({url:r,type:"post",data:n,dataType:"json",success:function(t){1==t.code?($(".J_fixedPopup").hide(),e(t),$(".J_nextStep").click()):$.fn.tips(t.msg,"error")},error:function(){$.fn.tips("表单提交失败，请重新提交","error")}})}var i=$("#J_scrollTop").offset().top-6;$.get("http://www.yidejia.com/index.php?m=skin&c=index&a=checkResult",function(t){1==t.code&&($(".J_allQuestion").children().removeClass("S_current S_prev S_next").filter(".S_result").addClass("S_current"),e(t),$(".J_btns").children(":first").hide().siblings().show())},"jsonp"),$(".J_retest").click(function(){$(".J_skinForm")[0].reset(),$(".J_radioLabel, .J_checkboxLabel").removeClass("S_checked").find("input").attr("checked",!1),$(".J_verifyCode, .J_codeText").val(""),$(".S_info").find(".verify-tips table").removeClass("correct"),$(".J_allQuestion").children().removeClass("S_current S_prev S_next").filter(":first").addClass("S_current").next().addClass("S_next"),$(".J_btns").children(":last").hide().siblings().show().find(".J_nextStep").show().siblings(".J_prevStep, .J_submitInfo").hide(),$("html, body").animate({scrollTop:i})}),date($(".J_userYear"),$(".J_userMonth"),$(".J_userDate")),$(".J_radioLabel").click(function(){var e=$(this),t=e.closest(".J_options"),i=e.find(":radio");t.find(".J_radioLabel").removeClass("S_checked").find(":radio").attr("checked",!1),e.addClass("S_checked"),i.attr("checked",!0)}),$(".J_checkboxLabel").click(function(){var e=$(this),t=e.find(":checkbox");t.is(":checked")?(e.removeClass("S_checked"),t.attr("checked",!1)):(e.addClass("S_checked"),t.attr("checked",!0))}),$(".J_prevStep").click(function(){var e=$(this),t=e.closest(".J_btns"),n=$(".J_allQuestion").children(".S_current"),r=n.prev(".S_prev"),s=n.next(".S_next");e.attr("disabled",!0),t.addClass("S_opacity"),setTimeout(function(){r.addClass("S_right"),n.addClass("S_right"),setTimeout(function(){e.attr("disabled",!1),r.removeClass("S_prev S_right").addClass("S_current"),n.removeClass("S_current S_right").addClass("S_next"),s.removeClass("S_next"),r.prev().length?r.prev().addClass("S_prev"):e.hide(),n.is(".S_info")&&$(".J_nextStep").show().siblings(".J_submitInfo").hide(),t.removeClass("S_opacity"),$("html, body").animate({scrollTop:i})},600)},400)}),$(".J_nextStep").click(function(){var e=$(this),t=e.closest(".J_btns"),n=$(".J_allQuestion").children(".S_current"),r=n.prev(".S_prev"),s=n.next(".S_next"),a=n.find(":checked");a.length?(e.attr("disabled",!0),t.addClass("S_opacity"),setTimeout(function(){n.addClass("S_left"),s.addClass("S_left"),setTimeout(function(){e.attr("disabled",!1),r.removeClass("S_prev"),n.removeClass("S_current S_left").addClass("S_prev"),s.removeClass("S_next S_left").addClass("S_current"),s.next().addClass("S_next"),r.length||$(".J_prevStep").show(),s.is(".S_info")?e.hide().siblings(".J_submitInfo").show():s.is(".S_result")&&e.parent().hide().siblings().show(),t.removeClass("S_opacity"),$("html, body").animate({scrollTop:i})},600)},400)):$.fn.tips("请至少选择一个选项","error")}),$.fn.verifys({form:{ID:".J_submitInfo",ajax:function(){if(!$(".J_userYear").val()||!$(".J_userMonth").val()||!$(".J_userDate").val())return $.fn.tips("请选择生日","error"),!1;var e=$(".J_userPhone").val();return{url:"/index.php?m=skin&c=index&a=checkHandset",type:"post",data:{handset:e},dataType:"json",success:function(e){e?$(".J_fixedPopup").show():t()},error:function(){$.fn.tips("提交失败，请重新提交","error")},complete:function(){setTimeout(function(){$(".J_submitInfo").attr("disabled",!1)},1e3)}}}},name:{ID:".J_userName",focus:"请输入您的姓名",verifyFunc:function(e,t){return e=e.replace(/\s/g,""),$(".J_userName").val(e),e?!DVerify.isChar2(e)||e.length<2||e.length>5?t.error("姓名必须是2-5个汉字"):t.correct():t.error("姓名不能为空")}},qq:{ID:".J_userQQ",focus:"请输入您的QQ号",verifyFunc:function(e,t){return e=e.replace(/\s/g,""),$(".J_userQQ").val(e),e?DVerify.isQQ(e)?t.correct():t.error("您输入的QQ号错误"):t.error("QQ号不能为空")}},phone:{ID:".J_userPhone",focus:"请输入您的手机号",verifyFunc:function(e,t){return e=e.replace(/\s/g,""),$(".J_userPhone").val(e),e?DVerify.isPhone(e)?t.correct():t.error("您输入的手机号码错误"):t.error("手机号不能为空")}}}),$(".J_closePopup").click(function(){$(".J_fixedPopup").hide()}),$(".J_noRegister").click(function(){$(this).attr("disabled",!0),t()}),$(".J_okRegister").click(function(){var e=$(".J_verifyCode"),i=e.val().replace(/\s/g,"");if(e.val(i),!i)return $(".J_verifyCode").focus(),$.fn.tips("请请输入接收到的短信验证码","error"),!1;if(!/^[0-9]{4}$/.test(i))return $(".J_verifyCode").focus(),$.fn.tips("验证码格式错误","error"),!1;var n=$(this);n.attr("disabled",!0),t(i),setTimeout(function(){n.attr("disabled",!1)},1e3)});var n=!1;$(".J_closeCodeBox").click(function(){$(".J_codeBox").hide()}),$(".J_imgCode, .J_replaceCode").click(function(){var e=$(".J_imgCode"),t=e.attr("src")+"&t="+Math.random();e.attr("src",t).siblings(".J_codeText").val("").focus()}),$(".J_submitCode").click(function(){var e=$(".J_codeText"),t=e.val().replace(/\s/g,"");if(e.val(t),!t)return e.focus(),$.fn.tips("请输入验证码","error");var i=$(this),r=$(".J_userPhone").val();i.attr("disabled",!0),$.ajax({url:"http://u.yidejia.com/index.php?m=ucenter&c=user&a=sendHandsetCode",type:"get",data:{handset:r,imgCode:t},dataType:"jsonp",success:function(e){if(e.code){n=!0,$(".J_codeBox").hide(),$(".J_getVerifyCode").text("正在发送...").text("已经发送到您的手机上");var t=setInterval(function(){e.time>=0?$(".J_getVerifyCode").text(e.time+"秒后重新获取"):(n=!1,$(".J_getVerifyCode").text("获取短信验证码"),clearInterval(t)),e.time-=1},1e3)}else $.fn.tips(e.msg,"error")},error:function(){$.fn.tips("短信验证码发送失败，请重新获取","error")}}),setTimeout(function(){i.attr("disabled",!1)},1e3)}),$(".J_getVerifyCode").click(function(){return n?!1:($(".J_codeBox").show(),$(".J_imgCode").click(),void $(".J_codeText").focus())})});