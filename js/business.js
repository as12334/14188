


//网站流量统计，大数据分析流量数据来源 2014-11-19
function getCookie(cookieName) {
	var cookiePattern = new RegExp('(^|;)[ ]*' + cookieName + '=([^;]*)'),
    	cookieMatch = cookiePattern.exec(document.cookie);

	return cookieMatch ? cookieMatch[2] : '';
}
  var _paq = _paq || [];
  //_paq.push(["setRequestMethod", 'POST']);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  //_paq.push(["setCustomVariable", "useragent", navigator.userAgent, "visit"]);
  //var piwikTracker = Piwik.getTracker();
  //_paq.push([ function() { var qt = this.getCookie("_Qt"); }]);
  //var qt = piwikTracker.getCookie("_Qt")
  (function() {
    var u="http://www.kimiwang.com/";
    _paq.push(["setTrackerUrl", u+"sermon/receiver/receive.do?ua="+navigator.userAgent
    		+"&_Qt="+getCookie("_Qt")
    		+"&s_uid="+getCookie("s_uid")
    		+"&s_name="+getCookie("s_name")
    		+"&s_pic="+getCookie("s_pic")
    		+"&s_sign="+getCookie("s_sign")
    		+"&s_exp="+getCookie("s_exp")
    		+"&sid="+getCookie("sid")
    		+"&newPerson="+getCookie("newPerson")
    		+"&utm="+getCookie("utm")
    		+"&topic=jp"
    		]);
    _paq.push(["setSiteId", "1"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"static/js/piwik.js"; s.parentNode.insertBefore(g,s);
  })();(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google','ga');
ga('create', 'UA-41505183-1', 'auto');
ga('require', 'linkid', 'linkid.js');
ga('require', 'displayfeatures');
if(XDPROFILE && XDPROFILE.uid){
	ga('set', '&uid', XDPROFILE.uid); 
}
ga('send', 'pageview');
(function(){
	var _lt_id=12;	var j=document.createElement('script');
	j.type='text/javascript'; j.async=true;
	j.src=(('https:' === document.location.protocol)?'https://':'http://')+'dmp.kejet.net/ad/kimiwang_liontrack.min.2.0.js';
	var s=document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(j,s);
})();