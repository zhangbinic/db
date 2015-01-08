formValidator-4.1.3.js 大概53行处

//解决IE8上浏览器崩溃 zhangbin by 2015-1-8 上午10:45
//alert(navigator.userAgent.toLowerCase());
var Browser = navigator.userAgent.toLowerCase();
var isIE = Browser.indexOf('msie');
//alert(isIE);
//return false;