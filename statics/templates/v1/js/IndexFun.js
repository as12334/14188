$(document).ready(function() {
	function GetJPData(a, b) {
		$.getJSON(a, b)
	}
	function formatFloat(A) {
		A = Math.round(A * 1000) / 1000;
		A = Math.round(A * 100) / 100;
		if (/^\d+$/.test(A)) {
			return A + ".00"
		}
		if (/^\d+\.\d$/.test(A)) {
			return A + "0"
		}
		return A
	}
	var j = function(C, E, D, K) {
            var F = C;
            E.empty();
            D.empty();
            var J = GG_SHOP_TIME.path+"/goods/";
            var B = GG_SHOP_TIME.path+"/statics/uploads/";
            for (var G = 0; G < F.length; G++) {
                var A = F[G].title;
                if (G < K) {
                    var I = parseInt(F[G].canyurenshu);
                    var M = parseInt(F[G].money);
                    var z = M - I;
                    var N = parseFloat(I) / M;
                    var H = '<li class="g-goods-list"><div class="pic"><a rel="nofollow" href="' + J + F[G].id + '.html" target="_blank" title="' + A + '"><img alt="' + A + '" src="' + B + F[G].thumb + '"></a></div><p class="name"><a href="' + J + F[G].id + '.html" target="_blank" title="' + A + '">' + A + '</a></p><p class="F_money">价值：<span class="F_dig"><span class="rmb"></span>' + F[G].money + '</span></p><div class="goods_Curbor"><div class="pic"><a rel="nofollow" href="' + J + F[G].id + '.html" target="_blank" title="' + A + '"><img alt="' + A + '" src="' + B + F[G].thumb + '"></a></div><div class="Progress-bar"><p title="已完成' + formatFloat(N * 100) + '%"><span style="' + (I > 0 ? ("width:" + (z > 0 ? (parseInt(170 * N) > 0 ? parseInt(170 * N) + "px" : "1%") : "100%")) : "display:none;") + '"></span></p><ul class="Pro-bar-li"><li class="P-bar01"><em>' + F[G].canyurenshu + '</em>已参与</li><li class="P-bar02"><em>' + F[G].zongrenshu + '</em>总需人次</li><li class="P-bar03"><em>' + z + '</em>剩余</li></ul></div><div class="g_buybtn"><a href="' + J + F[G].id + '.html" title="立即1元众购" class="orange_btn">立即1元众购</a></div></div></li>';
                    E.append(H)
                } else {
                    var H = '<li><div class="m-pic-txt"><div class="u-txt"><h5 class="gray3" title="' + A + '"><a class="gray6" href="' + J + F[G].id + '.html" target="_blank">' + F[G].title + '</a></h5><p class="orange">' + F[G].keywords + '</p></div><a href="' + J + F[G].id + '.html" target="_blank" class="u-img" title="' + A + '"><img src="'+ B + F[G].thumb + '" border=0 alt=""></a></div></li>';
                    D.append(H)
                }
            }
            E.children("li").hover(function() {
                $(this).addClass("goods_Cur")
            }, function() {
                $(this).removeClass("goods_Cur")
            });
            if (F.length < 2 * K) {
                var L = 2 * K - F.length;
                for (var G = 0; G < L; G++) {
                    D.append("<li></li>")
                }
            }
	};
	var sd = function(){
		GetJPData(GG_SHOP_TIME.path+"/api/sdjdata/get", function(SD) {
			var C = SD.listItems;
			var E = "";
			var B = GG_SHOP_TIME.path+"/goods/";
			for (var A = 0; A < C.length; A++) {
				var z = C[A].title;
				//E += '<li><div class="m-ranking-goods" style="' + (A == 0 ? "" : "display:none;") + '"><span class="u-ranking-dig">' + (A + 1) + '</span><div class="pic"><a rel="nofollow" href="' + B + C[A].id + '.html" target="_blank" title="' + z + '"><img alt="' + z + '" src="'+GG_SHOP_TIME.path+'/statics/uploads/' + C[A].thumb +'"></a></div><p class="name"><a class="gray6" href="' + B + C[A].id + '.html" target="_blank" title="' + z + '">' + z + '</a></p><p class="F_money gray9">价值：<span class="F_dig"><span class="rmb"></span>' + C[A].money + '</span></p></div><div class="m-ranking-tit" style="' + (A == 0 ? "display:none;" : "") + '"><span class="u-ranking-dig">' + (A + 1) + '</span><h4><a href="' + B + C[A].id + '.html" target="_blank" class="gray6">' + z + "</a></h4></div></li>"
            }
		})
	};
	var s = function() {
            GetJPData(GG_SHOP_TIME.path+"/api/newshopjdata/get", function(z) {
                    j(z.listItems, $("#ulNewRecList1"), $("#ulNewRecList2"), 5);
			});
            GetJPData(GG_SHOP_TIME.path+"/api/rankingjdata/get", function(D) {
                if (D.code == 0) {
                    var C = D.listItems;
                    var E = "";
                    var B = GG_SHOP_TIME.path+"/goods/";
                    for (var A = 0; A < C.length; A++) {
                        var z = C[A].title;
                        E += '<li><div class="m-ranking-goods" style="' + (A == 0 ? "" : "display:none;") + '"><span class="u-ranking-dig">' + (A + 1) + '</span><div class="pic"><a rel="nofollow" href="' + B + C[A].id + '.html" target="_blank" title="' + z + '"><img alt="' + z + '" src="'+GG_SHOP_TIME.path+'/statics/uploads/' + C[A].thumb +'"></a></div><p class="name"><a class="gray6" href="' + B + C[A].id + '.html" target="_blank" title="' + z + '">' + z + '</a></p><p class="F_money gray9">价值：<span class="F_dig"><span class="rmb"></span>' + C[A].money + '</span></p></div><div class="m-ranking-tit" style="' + (A == 0 ? "display:none;" : "") + '"><span class="u-ranking-dig">' + (A + 1) + '</span><h4><a href="' + B + C[A].id + '.html" target="_blank" class="gray6">' + z + "</a></h4></div></li>"
                    }
                    $("#ulWeekRanking").html(E).children("li").hover(function() {
                        $(this).children("div.m-ranking-goods").show().next().hide();
                        $(this).siblings().children("div.m-ranking-goods").hide().next().show()
                    }, function() {
                        $(this).children("div.m-ranking-goods").hide().next().show();
                        $(this).parent().children("li").eq(0).children("div.m-ranking-goods").show().next().hide()
                    })
                }
            })
	};
	var hot = function() {
            GetJPData(GG_SHOP_TIME.path+"/api/hotshopjdata/get", function(z) {
                    j(z.listItems, $("#ulHotRecList1"), $("#ulHotRecList2"), 4);
			});
	};
	var countsli=3;
	var GetLogoInfo = function(A) {
		var EE = $("#slideul");
		var ED = $(".rslides_tabs");
		EE.empty();
		ED.empty();
		var BB = GG_SHOP_TIME.path+"/statics/uploads/";
		GetJPData(GG_SHOP_TIME.path+"/api/slidejdata/get", function(G) {
			var H = "";
			var I = "";
			var x=1;
			countsli = G.listItems.length;
			if (G.state == 0) {
				var F = G.listItems;
				for (var E = 0; E < F.length; E++) {
					x+=E;
					H = '<li style="display:list-item;"><a href="'+ F[E].link +'" target="_blank"><img src="'+ BB + F[E].img +'"></a></li>';
					I  = '<li class=""><a href="javascript:;">'+ x +'</a></li>';
					EE.append(H);
					ED.append(I);
				}
			}A(H)
		})
	};
	    var k = 0;
        var g = $("#ulReplyList");
        var e = function() {
            var z = function(H) {
                var J = H;
                var N = 0;
                var M = 0;
                var I = 280;
                var L = J.children().length;
                M = L * I;
                N = I;
                J.width(M).css("left", "0px");
                var K = "500";
                J.show("fast");
                J.nextAll("a.js_pre").eq(0).show().bind("click", function() {
                    J.animate({
                        left: "-" + N + "px"
                    }, K, function() {
                        J.append(J.children().eq(0)).css("left", "0px")
                    })
                });
                J.nextAll("a.js_next").eq(0).show().bind("click", function() {
                    J.prepend(J.children().eq(L - 1)).css("left", "-" + N + "px");
                    J.animate({
                        left: "0px"
                    }, K, function() {})
                })
            };
            var D = GG_SHOP_TIME.path+"/statics/uploads/";
            GetJPData(GG_SHOP_TIME.path+"/api/sdjdata/get", function(K) {
                if (K.code == 0) {
                    var N = $("#ulPostRec");
                    var P = K.listItems;
                    var L = P.length;
                    var O = L > 3 ? 3 : L;
                    var M = "";
                    var I = GG_SHOP_TIME.path+"/go/shaidan/detail/";
                    var H = GG_SHOP_TIME.path+"/uname/";
                    for (var J = 0; J < O; J++) {
                        M += '<li class="u-single-hover" idx="' + J + '" style="width:280px; float:left; position:relative;"><div class="f-single-txt" style="display: none;"><a href="' + I + P[J].sd_id + '.html" class="white" target="_blank">' + P[J].sd_title + '</a></div><div class="f-single-info"><a href="' + H + P[J].sd_userid + '" target="_blank"><img class="f-single-pic" src="'+GG_SHOP_TIME.path+'/statics/uploads/' + P[J].userPhoto + '" width="40" height="40"></a><a class="f-name blue" href="' + H + P[J].sd_userid + '" title="' + P[J].sd_username + '" target="_blank">' + P[J].sd_username + '</a><span class="gray9 f-share-time">' + P[J].sd_title + '</span><span class="f-share-tit mlr5"><a href="' + I + P[J].sd_id + '.html" target="_blank" class="white" title="' + P[J].sd_title + '">' + P[J].sd_title + '</a></span></div><a href="' + I + P[J].sd_id + '.html" target="_blank"><img src="' + D + P[J].sd_thumbs + '" border="0" alt="" width="280" height="314"></a></li>'
                    }
                    N.html(M);
                    M = "";
                    for (var J = O; J < L; J++) {
                        M += '<li name="liPostList"><div class="f-single-txt"><a href="' + I + P[J].sd_id + '.html" class="white" target="_blank" >' + P[J].sd_title + '</a></div><div class="f-single-info" style="display: none;"><a href="' + H + P[J].sd_userid + '" target="_blank"><img class="f-single-pic" src="'+GG_SHOP_TIME.path+'/statics/uploads/' + P[J].userPhoto + '" width="40" height="40"></a><a class="f-name blue" href="' + H + P[J].sd_userid + '" title="' + P[J].sd_username + '" target="_blank">' + P[J].sd_username + '</a><span class="gray9 f-share-time">' + P[J].sd_time + '</span><span class="f-share-tit mlr5"><a href="' + I + P[J].sd_id + '.html" target="_blank" class="white" title="' + P[J].sd_title + '">' + P[J].sd_title + '</a></span></div><a href="' + I + P[J].sd_id + '.html" target="_blank"><img src="' + D + P[J].sd_thumbs + '" border="0" alt="" width="280" height="315"></a></li>'
                    }
                    $("#ulPostList").html(M).find('li[name="liPostList"]').each(function() {
                        $(this).hover(function() {
                            $(this).children(".f-single-txt").hide().next(".f-single-info").show()
                        }, function() {
                            $(this).children(".f-single-txt").show().next(".f-single-info").hide()
                        })
                    });
                    z(N)
                }
            });
        };
	var po = function() {
		GetJPData(GG_SHOP_TIME.path+"/api/posshop/get", function(K) {
			if (K.code == 0) {
				var N = $("#posnewshop");
				var R = $("#poslist");
                var P = K.listItems;
				var L = P.length;
				var O = L > 1 ? 1 : L;
				var M = "";
				var I = GG_SHOP_TIME.path+"/goods/";
				var H = GG_SHOP_TIME.path+"/statics/uploads/";
				for (var J = 0; J < O; J++) {
					M += '<s class="f-tj-tit"></s><div class="u-txt"><h5><a href="' + I + P[J].id + '" title="' + I + P[J].title + '" target="_blank" class="gray3">' + P[J].title + '</a></h5><p class="gray9">' + P[J].keywords + '</p></div><a href="' + I + P[J].id + '" target="_blank" title="' + I + P[J].title + '" class="u-img" rel="nofollow"><img src="' + H + P[J].thumb + '" border="0" alt="" width="100" height="100"></a>'
				}
				N.html(M);
				M = "";
				for (var J = O; J < L; J++) {
					M += '<li><div class="m-pic-txt"><div class="u-txt"><h5><a href="' + I + P[J].id + '" target="_blank" class="gray3" title="' + I + P[J].title + '">' + P[J].title + '</a></h5><p class="gray9">' + P[J].keywords + '</p><a href="' + I + P[J].id + '" target="_blank" rel="nofollow" title="立即1元众购" class="orange_btn">立即1元众购</a></div><a href="' + I + P[J].id + '" target="_blank" class="u-img" rel="nofollow" title="' + I + P[J].title + '"><img src="' + H + P[J].thumb + '" border="0" alt="' + P[J].title + '" width="100" height="100"></a></div></li>'
				}
				R.html(M);
				M = "";
				
			}
		});	
	};
	var jj = function() {
		GetJPData(GG_SHOP_TIME.path+"/api/jjanjdata/get", function(K) {
			var F = K.listItems;
			E = $("#jjjxlist");
            var J = GG_SHOP_TIME.path+"/goods/";
            var B = GG_SHOP_TIME.path+"/statics/uploads/";
            for (var G = 0; G < F.length; G++) {
                var A = F[G].title;
                if (G < F.length) {
                    var I = parseInt(F[G].canyurenshu);
                    var M = parseInt(F[G].money);
                    var z = M - I;
                    var N = parseFloat(I) / M;
                    var H = '<li class="g-goods-list"><div class="pic"><a rel="nofollow" href="' + J + F[G].id + '.html" target="_blank" title="' + A + '"> <img alt="' + A + '" src="' + B + F[G].thumb + '"></a></div><p class="name"><a href="' + J + F[G].id + '.html" target="_blank" title="' + A + '">' + A + '</a></p><p class="F_money">价值：<span class="F_dig"><span class="rmb"></span>' + F[G].money + '</span></p><div class="Progress-bar"><p title="已完成' + formatFloat(N * 100) + '%"><span style="' + (I > 0 ? ("width:" + (z > 0 ? (parseInt(170 * N) > 0 ? parseInt(170 * N) + "px" : "1%") : "100%")) : "display:none;") + '"></span></p><ul class="Pro-bar-li"><li class="P-bar01"><em>' + F[G].canyurenshu + '</em>已参与</li><li class="P-bar02"><em>' + F[G].zongrenshu + '</em>总需人次</li><li class="P-bar03"><em>' + z + '</em>剩余</li></ul></div><div class="g_buybtn"><a href="' + J + F[G].id + '.html" target="_blank" rel="nofollow" title="立即1元众购" class="orange_btn">立即1元众购</a></div><div class="goods_Curbor"></div></li>';
                    E.append(H)
                } 
            }
            E.children("li").hover(function() {
                $(this).addClass("goods_Cur")
            }, function() {
                $(this).removeClass("goods_Cur")
            });
		})
	};
	var newjx = function() {
		GetJPData(GG_SHOP_TIME.path+"/api/newjxjdata/get", function(K) {
			if (K.code == 0) {
				var N = $("#ulNewAwary");
				var NN = $("#divRaffList");
                var P = K.listItems;
				var L = P.length;
				var O = L > 1 ? 5 : L;
				var M = "";
				var Q = "";
				var I = GG_SHOP_TIME.path+"/dataserver/";
				var B = GG_SHOP_TIME.path+"/uname/";
				var H = GG_SHOP_TIME.path+"/statics/uploads/";
				for (var J = 0; J < O; J++) {
					M += '<li class="new_li"><a href="' + I + P[J].id + '.html" target="_blank" class="pic"><img src="' + H + P[J].thumb + '"></a><a href="' + I + P[J].id + '.html" target="_blank" class="name">' + P[J].title + '</a><span class="winner">获得者：<strong><a rel="nofollow" class="blue" href="' + B + P[J].q_uid + '" target="_blank">' + P[J].q_user + '</a></strong></span></li>';
					Q += '<div codeid="' + P[J].id + '" class="divls" last=""><div><span class="gray9">恭喜</span><a href="' + I + P[J].id + '.html" class="blue mlr5" target="_blank" title="' + P[J].q_user + '">' + P[J].q_user + '</a><span class="gray9"> 获得</span><span><a href="' + I + P[J].id + '.html" target="_blank" class="gray6 mlr5" title="' + P[J].title + '">第(' + P[J].qishu + ')期' + P[J].title + '</a></span><a href="' + I + P[J].id + '.html" class="u-rolling-btn Fr orange" target="_blank"><span>立即围观</span><i class="mod_dropmenu_arrow"></i></a></div></div>';
				}
				N.html(M);
				NN.html(Q);
				M = "";
				Q = "";
			}
		});	
	};
	var shoping = function() {
		GetJPData(GG_SHOP_TIME.path+"/api/sheshoppingjdata/get", function(K) {
			if (K.code == 0) {
				var N = $("#buyList");
                var P = K.listItems;
				var L = P.length;
				var O = L > 10 ? 13 : L;
				var M = "";
				var Q = "";
				var I = GG_SHOP_TIME.path+"/goods/";
				var B = GG_SHOP_TIME.path+"/uname/";
				var H = GG_SHOP_TIME.path+"/statics/uploads/";
				for (var J = 0; J < O; J++) {
					M += '<li><a href="' + I + P[J].shopid + '.html" target="_blank" class="f-pic" rel="nofollow" title="' + P[J].username + '"><img alt="" src="' + H + P[J].thumb + '" width="40" height="40"></a><div class="m-share-txt gray6"><a href="' + B + P[J].uid + '" class="f-name blue" target="_blank" title="' + P[J].username + '">' + P[J].username + '</a><span class="f-share-tit"><a href="' + I + P[J].shopid + '" class="gray6" target="_blank" title="' + P[J].shopname + '">' + P[J].shopname + '</a></span></div></li>';
				}
				N.html(M);
				M = "";
			}
		});	
	};
    var v = function() {
		GetLogoInfo(function(B) {
				var sw = 0;
				$(".m-slides .rslides_tabs li a").mouseover(function(){
					sw = $(".rslides_tabs a").index(this);
					myShow(sw);
				});
				function myShow(i){
					$(".m-slides .rslides_tabs li").eq(i).addClass("rslides_here").siblings("li").removeClass("rslides_here");
					$("#slideul li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
				}
					

		});
    };
	
	var i = function() {
            w = $(window).scrollTop();
			if (w >= 0 && w <= 360) {
                if (t[4] == 0) {
                    t[4] = 1;
					newjx()
                    shoping()
                }
            }
			if (w >= 80) {
                if (t[3] == 0) {
                    t[3] = 1;
                    jj()
                }
            }

            if (w >= 100) {
                if (t[0] == 0) {
                    t[0] = 1;
                    s()
                }
            }
            if (w >= 600) {
                if (t[1] == 0) {
                    t[1] = 1;
                    hot()
                }
            }
            if (w >= 800) {
                if (t[2] == 0) {
                    t[2] = 1;
                    e()
                }
            }
	};
	if ($(window).scrollTop() > 100) {
            i()
	}
        var eeE = function() {
            var w = $("#div_guide");
            var y = $("#guide_pre");
            var t = $("#guide_next");
            var C = $("#ul_guide").children("li");
            var z = $("#what_1yyg");
            var B = 0;
            var u = false;
            var v = 0;
            var DDdd = function() {
                w.show();
                if (C.length <= 1) {
                    y.hide();
                    t.hide()
                } else {
                    if (B <= 0) {
                        B = 0;
                        y.hide();
                        t.show()
                    } else {
                        if (B >= (C.length - 1)) {
                            B = C.length - 1;
                            y.show();
                            t.hide()
                        } else {
                            y.show();
                            t.show()
                        }
                    }
                }
                C.eq(B).hide().fadeToggle();
                C.eq(B).siblings().hide()
            };
            var E = function() {
                w.hide();
                y.hide();
                t.show();
                C.eq(B).show();
                C.eq(B).siblings().hide();
                H = 0;
                if (F != null) {
                    clearInterval(F)
                }
            };
            var AAaa = function() {
                B++;
                DDdd()
            };
            t.bind("click", function() {
                AAaa()
            });
            y.bind("click", function() {
                B--;
                DDdd()
            });
            var x = function() {
                if (u) {
                    return
                }
                u = true;
                var I = w;
                I.css({
                    left: I.width()
                }).show();
                I.animate({
                    left: 0
                }, {
                    queue: false,
                    duration: 500,
                    complete: function() {
                        if (C.length <= 1) {
                            y.hide();
                            t.hide()
                        } else {
                            y.hide();
                            t.show()
                        }
                        F = setInterval(s, 1000);
                        v = 1
                    }
                })
            };
            var r = function() {
                if (!u) {
                    return
                }
                u = false;
                var I = w;
                I.animate({
                    left: I.width()
                }, {
                    queue: false,
                    duration: 500,
                    complete: function() {
                        B = 0;
                        E();
                        v = 0
                    }
                })
            };
            z.bind("click", function() {
                if (v == 0) {
                    x()
                } else {
                    r()
                }
            });
            $("#guide_close").bind("click", function() {
                r()
            });
            C.each(function(I) {
                I = I + 1;
                if (I > 1) {
                    $(this).hide()
                }
                if (I < C.length) {
                    $(this).children("a").bind("click", AAaa)
                } else {
                    $(this).children("a").bind("click", r)
                }
            });
            var H = 0;
            var G = 60;
            var F = null;
            var s = function() {
                H++;
                if (H == G) {
                    r()
                }
            };
            w.hover(function() {
                H = 0;
                if (F != null) {
                    clearInterval(F)
                }
            }, function() {
                F = setInterval(s, 1000)
            })
        };
        eeE();
});