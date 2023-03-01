(function($){
    $.fn.slowShow = function(ele,time){
        time = time == undefined?100:time;
        var timer=null;
        clearInterval(timer);
        this.hover(function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    ele.show();
                },time);
            },
            function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    ele.hide();
                },time);
            }
        )
    }



})(jQuery);

