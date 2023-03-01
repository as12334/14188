seajs.config({
	base:'http://s.juancdn.com/jpwebapp_v1/',
	alias:{
		'zepto':'js/lib/zepto.min',
		'touch':'js/plugins/touch.min',
		'underscore':'js/lib/underscore.min',
		'swipeSlide':'js/plugins/swipeSlide.min'
	},
	map: [
        [/^.*$/, function(url) {
            return url += (url.indexOf('?') === -1 ? '?' : '&') +  versionNumber;
        }]
    ],

	debug:true
});

function use(pageName){
	var basePath=seajs.data.base,
		mode="build";
   	if(location.search.indexOf('debug=true')>-1){
        mode='src';
   	}

	// mode='src';

   seajs.use('js/'+mode+'/'+pageName);
  
}