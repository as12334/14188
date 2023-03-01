/**
 * 异步请求-渲染页面
 * @auth: heimei
 * @date: 2015-2-9
 * @param  goods_block      : string,    商品列表DOM节点
 * @param  page_load_block  : string,    "加载中，请稍候"DOM节点
 * @param  page_next_block  : string,    "点击查看更多"DOM节点
 * @param  page_no_block    : string,    "亲，已经到底了"DOM节点
 * @param  goods_info_block  : string,    商品豆腐块,htmlDOM节点,用于替换数据的，不作为显示
 * @param  goods_new_block   : string,    商品豆腐块，新品标签
 * @param  page_event_lock  : boolean,   加载下一页的锁，防止多次加载
 * @param  cur_page_num     : number,    当前页码
 * @param  page_size        : number,    一页加载个数
 * @param  goods_load_url   : string,    ajax商品数据url
 * @param  remove_goods     : boolean,   清空原来的内容
 * @param  is_target_blank  : boolean,   true，默认打开方式，false,所有标签为原窗口打开
 * @param  call_back_fn     : function,  渲染完页面的回调函数,外部声明
 * @param  goods_show       : function   渲染商品豆腐块，并输出HTML
 * @param  goods_auto_page  ：function   下滑，自动加载下一页
 * @param  goods_load       ：function   请求ajax, url
 * @param  goods_next_page  : function   手动加载下一页
 * @param  init             ：function    初始化
 */
var GOODS_LOAD = {
    goods_block      : '#goods_block',
    page_load_block  : '#page-loading',
    page_next_block  : '#page-next',
    page_no_block    : '#page-no-next',
    goods_info_block : '#goods_show_hidden',
    goods_new_block  : '#goods_new_icon_hidden',
    goods_over_block : '#goods_buy_over_icon_hidden',
    goods_brand_block: '#goods_brand_icon',
    goods_temai_block: '#goods_temai_icon',
    page_event_lock  : false,
    cur_page_num     : 1,
    page_size        : 20,
    goods_load_url   : '',
    goods_html       : '',
    goods_attr       : ['taobao_flag','targetUrl','picurl','is_new','is_over','title','jumpUrl','class','cprice','oprice','tag','status','target'],
    is_show_new      : true,
    goods_init       : [],
    goods_item_h     : 0,
    remove_goods     : false,
    is_target_blank  : true,
    call_back_fn     : function(){},

    goods_show : function( data ){

        var goods_list     = data;
        var is_show_new    = this.is_show_new;
        var html           = '';
        var new_icon       = $(this.goods_new_block).html();
        var over_icon      = $(this.goods_over_block).html();
        var brand_icon     = $(this.goods_brand_block).html();
        var temai_icon     = $(this.goods_temai_block).html();

        for( var i in goods_list ){
            var goods_info     =  goods_list[i];
            goods_info.is_new  =  goods_info.is_new==1&&is_show_new ? new_icon : '';//新品标签
            goods_info.is_over =  goods_info.class=='end' ? over_icon : '';
            goods_info.tag     =  '';
            //goods_info.target     =  goods_info.target == '' ? '_self' : '_blank';

            goods_info.status == '品牌折扣' && (goods_info.tag=brand_icon);
            goods_info.status == '特卖' && (goods_info.tag=temai_icon);

            html              += this.goods_format( goods_info );
        }
        if( data.length < this.page_size ){
            this.page_event_lock = true;
        }
        if( this.remove_goods ){
            $(this.goods_block).html('');
        }
        if( this.is_target_blank == false ){
            var reg = new RegExp('target="_blank"', 'g');
            html    = html.replace( reg, '' );
        }
        $(this.goods_block).append(html);
        if( typeof this.call_back_fn == 'function' ){
            this.call_back_fn();
        }
    },
    goods_format:function( goods_info ){
        if( this.goods_html.length<1 ){
            this.goods_html      = $(GOODS_LOAD.goods_info_block).html().replace(/[\r\n]/g, '');
        }
        var goods_attr     = this.goods_attr;
        var goods_html     = this.goods_html;
        var key,str,reg;
        for( var i in goods_attr ){
            key        = goods_attr[i];
            str        = '';
            reg        = new RegExp('_'+key+'_', 'g');
            ( typeof goods_info[key] != 'undefined' ) && (str = goods_info[key]);
            goods_html = goods_html.replace( reg, str);
        }
        return goods_html;
    },
    goods_auto_page:function(){
        if( this.goods_item_h < 1 ){
            this.goods_item_h = $(window).height()+50;
        }
        var self = this;
        $(window).bind('mouseup mousedown mousewheel scroll',function(ev){
            var h = $(this.goods_block).offset().height - self.goods_item_h;
            var p = ev.pageY;
            var s = this.scrollY;
            var i = p > s ? p : s;

            if( i > h && !self.page_event_lock ){
                self.goods_load();
            }
        });
    },
    goods_load:function(){
        $(this.page_load_block).show();
        $(this.page_next_block).hide()
        this.page_event_lock = true;

        var url       =  this.goods_load_url+'ts='+new Date().getTime();
        var auto_load =  !(this.cur_page_num%2==1);//3,5,7页不自动加载,3,5,7时true
        var self      = this;
        var post_data = { page:this.cur_page_num+1, is_ajax:1 };

        $.post(url, post_data, function( rs ){
            if( rs.code==1000 ){
                self.cur_page_num++;
                self.goods_show( rs.data );
            }

            if( rs.code!=1000 || rs.data.length<self.page_size ){
                //没有下一页或者没有数据
                $(self.page_no_block).show();
                auto_load = true;//锁
            }else{
                //"点击查看下一页"显示
                auto_load && $(self.page_next_block).show();
            }

            self.page_event_lock = auto_load;
            $(self.page_load_block).hide();
        }, 'json');
    },
    goods_next_page:function(){
        this.page_event_lock = false;//打开锁
        this.goods_load();//加载数据
    },
    init:function(data){
        $.extend(this,data);
        if( this.goods_init.length>0 ){
            this.goods_show( this.goods_init );
            this.goods_init = [];
        }else{
            this.page_event_lock = true;
        }
        this.goods_load_url += ( this.goods_load_url.indexOf('?')>1 ) ? '&' : '?';
        var self = this;
        //初始化-商品豆腐块
        $(function(){
            (!self.page_event_lock) && self.goods_auto_page();
        });
        return self;
    }
}

