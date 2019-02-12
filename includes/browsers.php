<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*****************
*	Browsers array to filter
*	v 1.0.0
*	Fevrier 2019
*	author La Drome Laboratoire
*
*	Model:
*		"browsers": {
*			"browser": {
*				"name": "Browser name",
*				"UA-regexp": "",
*				"version-min": "minimum version allowed",
*				"UA-example": "",
*				"allowed": false | true // false if all rejected, true if allowed according to version-min
*			}
*		}
*	preg_match provides a matches array, version is set to be matches[2] is regexp
*	UA Source : http://useragentstring.com/pages/useragentstring.php/
*	Regexp validation https://regexr.com/ ; https://www.phpliveregex.com/
*
*	Order in the following array matters as some browsers use a matching string for others browsers (Edge for instance)
*
******************/

/////////// Desktop

$browsers["Opera1"]["Name"] = "Opera presto - variant #1";
$browsers["Opera1"]["UA-regexp"] = "/(Opera\/[0-9]{1,2}\.[0-9]).*Presto.*Version\/([0-9]{1,2}\.[0-9]{1,2})/i";
$browsers["Opera1"]["version-min"]= "13.0";
$browsers["Opera1"]["UA-example"] = "Opera/9.80 (Macintosh; Intel Mac OS X 10.6.8; U; fr) Presto/2.9.168 Version/11.52";
$browsers["Opera1"]["Allowed"]= false;

$browsers["Opera2"]["Name"] = "Opera presto - variant #2";
$browsers["Opera2"]["UA-regexp"] = "/(opera) ([0-9]{1,2}\.[0-9]{1,2})/i";
$browsers["Opera2"]["version-min"]= "13.0";
$browsers["Opera2"]["UA-example"] = "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; de) Opera 11.51";
$browsers["Opera2"]["Allowed"]= false;

$browsers["Netscape"]["Name"] = "Netscape";
$browsers["Netscape"]["UA-regexp"] = "/(netscape)\/([0-9]{1,2}\.[0-9]{1,2})/i";
$browsers["Netscape"]["version-min"]= "10";
$browsers["Netscape"]["UA-example"] = "Mozilla/5.0 (Windows; U; Win 9x 4.90; SG; rv:1.9.2.4) Gecko/20101104 Netscape/9.1.0285";
$browsers["Netscape"]["Allowed"]= false;

$browsers["IE"]["Name"] = "Internet Explorer";
$browsers["IE"]["UA-regexp"] = "/(MSIE) ([0-9]{1,2}\.[0-9])/i";
$browsers["IE"]["version-min"]= "11.0";
$browsers["IE"]["UA-example"] = "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 7.1; Trident/5.0)";
$browsers["IE"]["Allowed"]= true;

$browsers["Edge"]["Name"] = "MS Edge";
$browsers["Edge"]["UA-regexp"] = "/(Edge)\/([0-9]{1,2}\.[0-9]{1,3})/i";
$browsers["Edge"]["version-min"]= "10.000";
$browsers["Edge"]["UA-example"] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246";
$browsers["Edge"]["Allowed"]= true;

$browsers["Firefox"]["Name"] = "Mozilla Firefox";
$browsers["Firefox"]["UA-regexp"] = "/(Mozilla\/5.0).*rv:([0-9]{1,2}\.[0-9]).*Gecko.*/i";
$browsers["Firefox"]["version-min"]= "45.0";
$browsers["Firefox"]["UA-example"] = "Mozilla/5.0 (Windows NT 6.1; rv:60.0) Gecko/20100101 Firefox/60.0";
$browsers["Firefox"]["Allowed"]= true;

$browsers["Chrome"]["Name"] = "Chrome / Chromium";
$browsers["Chrome"]["UA-regexp"] = "/(Chrome)\/([0-9]{1,2}\.[0-9]{1,2})/i";
$browsers["Chrome"]["version-min"]= "45.0";
$browsers["Chrome"]["UA-example"] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1";
$browsers["Chrome"]["Allowed"]= true;

$browsers["Safari"]["Name"] = "Safari";
$browsers["Safari"]["UA-regexp"] = "/Mac OS.*(Safari)\/([0-9]{1,3}\.[0-9]{1,2})/i";
$browsers["Safari"]["version-min"]= "537.0";
$browsers["Safari"]["UA-example"] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/536.30.1 (KHTML, like Gecko) Version/6.0.5 Safari/536.30.1";
$browsers["Safari"]["Allowed"]= true;


/////////// Mobile

$browsers["Android"]["Name"] = "Android";
$browsers["Android"]["UA-regexp"] = "/(Android) ([0-9]{1,3}\.[0-9]{1,2})/i";
$browsers["Android"]["version-min"]= "4.4";
$browsers["Android"]["UA-example"] = "Mozilla/5.0 (Linux; U; Android 2.2; fr-fr; Desire_A8181 Build/FRF91) App3leWebKit/53.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1";
$browsers["Android"]["Allowed"]= true;

$browsers["iPhone"]["Name"] = "iPhone";
$browsers["iPhone"]["UA-regexp"] = "/(iPhone OS).*version\/([0-9]{1,3}\.[0-9]{1,2})/i";
$browsers["iPhone"]["version-min"]= "6.0";
$browsers["iPhone"]["UA-example"] = "Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_1 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B117 Safari/6531.22.7 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)";
$browsers["iPhone"]["Allowed"]= true;

$browsers["iPad"]["Name"] = "iPad";
$browsers["iPad"]["UA-regexp"] = "/(iPad).*version\/([0-9]{1,3}\.[0-9]{1,2})/i";
$browsers["iPad"]["version-min"]= "6.0";
$browsers["iPad"]["UA-example"] = "Mozilla/5.0 (iPad; CPU OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10B329 Safari/8536.25";
$browsers["iPad"]["Allowed"]= true;


/////////// Bots - added to avoid issue

$browsers["Qwant"]["Name"] = "Qwantify";
$browsers["Qwant"]["UA-regexp"] = "/(Qanwtify)\/([0-9]{1,2}\.[0-9])/i";
$browsers["Qwant"]["version-min"]= "0.0";
$browsers["Qwant"]["UA-example"] = "Mozilla/5.0 (compatible; Qwantify/2.0n; +https://www.qwant.com/)";
$browsers["Qwant"]["Allowed"]= true;

$browsers["Googlebot"]["Name"] = "Googlebot";
$browsers["Googlebot"]["UA-regexp"] = "/(Googlebot)\/([0-9]{1,2}\.[0-9])/i";
$browsers["Googlebot"]["version-min"]= "0.0";
$browsers["Googlebot"]["UA-example"] = "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)";
$browsers["Googlebot"]["Allowed"]= true;

$browsers["Bingbot"]["Name"] = "Bingbot";
$browsers["Bingbot"]["UA-regexp"] = "/(bingbot)\/([0-9]{1,2}\.[0-9])/i";
$browsers["Bingbot"]["version-min"]= "0.0";
$browsers["Bingbot"]["UA-example"] = "Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)";
$browsers["Bingbot"]["Allowed"]= true;

$browsers["Yandex"]["Name"] = "Yandex";
$browsers["Yandex"]["UA-regexp"] = "/(YandexBot)\/([0-9]{1,2}\.[0-9])/i";
$browsers["Yandex"]["version-min"]= "0.0";
$browsers["Yandex"]["UA-example"] = "Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)";
$browsers["Yandex"]["Allowed"]= true;

$browsers["Baidu"]["Name"] = "Baidu";
$browsers["Baidu"]["UA-regexp"] = "/(Baiduspider)\/([0-9]{1,2}\.[0-9])/i";
$browsers["Baidu"]["version-min"]= "0.0";
$browsers["Baidu"]["UA-example"] = "Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)";
$browsers["Baidu"]["Allowed"]= true;




?>