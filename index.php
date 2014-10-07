<?php
// whose redactie is it, anyway?
$owner="";

if ($_SERVER['HTTPS']) {
        $isSec="https://";
} else {
	$isSec="http://";
}
$baseUrl=$isSec.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$trustHTML=false;

// http headers
header("Cache-Control: max-age=60, must-revalidate");
header("Content-type: text/html; charset=utf-8",true);
setlocale(LC_ALL, 'nl_BE');

if (empty($owner)) {
        $owner=$_SERVER["SERVER_NAME"];
	}

// html head, including inline CSS
$head="<!doctype html><html lang=\"nl\"><head><meta charset=\"utf-8\"/><style>html,body{margin:0;padding:0;}body{background-color:#CBD9DB;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:normal;-webkit-hyphens:auto;-moz-hyphens:auto;hyphens:auto;word-wrap:break-word;}img{border:0;}h3{font-size:1.1em;}h2{font-size:1.2em;}h1,#titleText{font-size:1.3em;}#highNav{display:none;background-color:#32C032;position:fixed;top:50px;width:100%;z-index:999;}#highNav li.catHeader{color:transparent}#highNav li.menuItem a{color:white;margin:10px;font-weight:bold;text-decoration:none;}.nav ul{margin:0;padding:0;}.nav ul ul{columns:2;-webkit-columns:2;-moz-columns:2;}.nav ul li{list-style-type:none;}.nav .menuItem{padding:10px;}#header{background-color:rgb(63,184,29);height:50px;width:100%;top:0;left:0;z-index:999;}#logo{background-color:#3FB81D;color:white;font-weight:bolder;display:inline-block;float:left;margin:5px;}#logo a{text-decoration:none;color:white;}#logo #redactie{font-variant:small-caps;}#logo hr{color:white;margin-top:-1px;margin-bottom:-2px;border-width:1px;border-style:solid;}#content{margin:5px;}#toNav{float:left;margin-left:5px;}#toNav a{color:#ffffff;}#toNav img{margin:9px 1px 1px 1px;}#reload{float:right;margin-right:20px;margin-top:7px;}#back{float:left;margin:0px 5px;}#back a{text-decoration:none;color:white;font-size:250%;}#catTitle{width:80%;margin:auto;text-align:center;padding-top:10px;overflow:hidden;white-space:nowrap;}#titleText{color:white;font-weight:bold;}.right{float:right;}.inNav{margin:5px;font-size:small;text-align:center;}.article{background-color:#fff;max-width:960px;padding:0px 10px;}.article .image{margin-bottom:2px;margin-right:5px;width:320px;height:180px;max-width:100%;overflow:hidden;}.article img{max-width:100%;overflow:hidden;width:320px;height:180px;}.article .qwrap::before{content:'\"';font-size:64px;float:left;font-style:italic;color:green;clear:left;}#boilerplate{background-color:#3FB81D;padding:10px;margin-top:10px;color:white;}#boilerplate a {color:white;}</style><meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no\"/><meta name=\"apple-mobile-web-app-capable\" content=\"yes\"><meta name=\"mobile-web-app-capable\" content=\"yes\"><meta name=\"robots\" content=\"none\"><link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\" /><title>".$owner."'s redactie</title>";

// page header, including inlined images
$header="</head><body><div id=\"header\"><div id=\"toNav\"><a href=\"#nav\"><img width=\"32\" height=\"32\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowQTY5QURGRDUzQjkxMUUzOUMyQUIwMDg2RkVBNDg1QyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowQTY5QURGRTUzQjkxMUUzOUMyQUIwMDg2RkVBNDg1QyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjBBNjlBREZCNTNCOTExRTM5QzJBQjAwODZGRUE0ODVDIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjBBNjlBREZDNTNCOTExRTM5QzJBQjAwODZGRUE0ODVDIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+07+sRQAAARlJREFUeNpi/P//P8NAAiaGAQajDhh1AAsS2wWIg4DYA4g/AzG1swcjEPMC8Q4gXgfEe8CioGwIxdOB+Md/2oMfULvA9iJHgSUQs9Mh1NmhdmGkgYd0jHq4XYxIJaEYENsBcQyU/4dG6W0JEB8C4lfoDhgtBwa8HJAAYicgDgHir0D8jwae5QbiNUC8D4hfoJcDm/7TD2zCVg7I0THk5bClgc1A/JIOlr+E2oVRDoDSgwoQWwPxXxqlAWYgPgrEd2DlzGg5wIJFjAcqTovqGBTsX3A5AFQGhANxLDT+aVEXgEJ8MRCvhJYFKGngAhDr0ynkLwKxwaBLA91AHAfEbkD8iUZpgA+IdwHxImzlwGh1POqAkekAgAADAH+XMgsip0joAAAAAElFTkSuQmCC\" alt=\"Categorie&euml;n\"></a></div><div id=\"logo\"><a href=\"/redactie/\">".$owner."'s</a><hr><span id=\"redactie\"><a href=\"/redactie/\">redactie</a></span></div><div id=\"reload\"><a href=\"/redactie/\"><!-- &#x21bb; --><img width=\"32\" height=\"32\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsTAAALEwEAmpwYAAACPklEQVRYw9WXPWgVQRDHf8uLEiwCQZFEAuJHJQRFEIOJIEIsFK3SWNiJhaWNCBEREQQbS5EESxtJIxEEC9HCLzCixIhaBBSCgpVEMST52dyT89y79+7dIyEDx93tzX/+s7Ozs3OwlkQtfF9J4n51y4qQqn3qqPpQnfd/eaOOqwfbTbxJvWU5+aDuq7w86gGryd2WnVCv2h6ZSuyFIr5Q9zSEgDoKXMnRnQYeAS+AWWAjsBMYAo4BtQhmFtgOGEJoOPPdOTP5ph6K7YjM8x11OYK/3TDp1A51LgK+r9aaXU91q7oUsTNSiFdPRUAPyiRSavcMRmx9LLSVE/ruslmccuJ6xN7ePFB/RPlixVrSFbH5Kk/5dEZxQV3f4szTY5MRu+uy2A5gf2ZsDlgsOemg3gNmEifmky2YlhpwVH0N/AJCCOEr6kxToWocheEWitUE6nSsgrW4BCMlyMfqoOeZD+8alc8GTlxugvzcX4x6PlL5ahVP0hsF5Cf/SVj1RKwGtOFYH4/sgqGYYl9e5arSU6hBfZnYW1Z7c6uh+jjixHCbGpyJQvLkQ4+6mHFgUd1R4iDKPS2bSmr1SSQKv9U9RV1wmlg9W6kdUz/nZO6zehhzcMfV74nupVIlNGUkAL3AFLA5R/8t8B74AXQC3cAg0JXRuxBCuFbvtMpEIKgb1C9t6AkHqmRuUMdaJF5SB6q25fX7NvVmk8Q/1TNqZ0s5kOdI0i13AkeAw8AuoAdYAD4l12QI4Wkas2o/rGtO/gAvNmhE/flaqQAAAABJRU5ErkJggg==\" alt=\"Herladen\"></a></div></div><div id=\"highNav\" class=\"nav\"></div><div id=\"content\">";

// page footer
$footer="<div id=\"boilerplate\">Dit is een continu evoluerende \"proof of concept\" van een mobile-first, progressive enhancete nieuws-website volgens <a href=\"http://responsivenews.co.uk/post/18948466399/cutting-the-mustard\">de \"cut the mustard\"-aanpak van de BBC</a>. Alle content is en blijft &copy; VRT Nieuwsdienst, wiens <a href=\"http://blog.futtta.be/2014/05/12/nieuwe-m-deredactie-be-niet-meer-mobiel/\">mobiele website echter niet meer echt mobiel is</a>.</div>";

// get/set menu (and remove from cache if nocache in QS
if ($_GET["nocache"]) {apc_delete("menu");}

$menu=apc_fetch("menu");
if ($menu===false) {
	$menuIn=fetchUrl("http://m.deredactie.be/client/mvc/config/vrtnieuws");	
	$menuArr=json_decode($menuIn,true);

	$menu="<div class=\"footer\"><div class=\"nav\" id=\"nav\"><ul><li class=\"catHeader\">Categorie&euml;n<ul><li class=\"menuItem\"><a href=\"/redactie/\">Hoofdpunten</a></li><li class=\"menuItem\"><a href=\"/redactie/#nieuwsstroom\">Laatste Nieuws</a></li>";
	if (is_array($menuArr)){
	  foreach($menuArr["clientConfiguration"]["navigationItems"] as $menuItem) {
		if ($menuItem["new"]!==true) {
			$menu.="<li class=\"menuItem\"><a href=\"?url=http://m.deredactie.be/client/mvc/detail/StoryBundle/".$menuItem["referralId"]."\">".$menuItem["label"]."</a></li>";
		} else {
                        $newMenu.="<li class=\"menuItem new\"><a href=\"?url=http://m.deredactie.be/client/mvc/detail/StoryBundle/".$menuItem["referralId"]."\">".$menuItem["label"]."</a></li>";
		}
	  }
	  $menu.=$newMenu;
	}
	$menu.="</ul></li></ul></div>";

	if (is_array($menuArr)){
		apc_store("menu",$menu,3600);
	}
}

// get that content already!
// first fetch deredactie-API URL from QueryString
/*
example URL's:
http://m.deredactie.be/client/mvc/contents?channel=vrtnieuws -> hp
http://m.deredactie.be/client/mvc/config/vrtnieuws -> categorien
http://m.deredactie.be/client/mvc/contents/StoryBundle/533adeb00cf2062a6460b1ca -> politiek
http://m.deredactie.be/client/mvc/contents/ContentBundle/537dea120cf2e2e365c098af -> artikel
*/

// default: vrt nieuws HP
$nothomepage=false;
$url="http://m.deredactie.be/client/mvc/contents?channel=vrtnieuws";

// if channel=sporza (and if no url in querystring)
if ($_GET["channel"]){
        if ($_GET["channel"]==="sporza") {
                $url="http://m.deredactie.be/client/mvc/contents?channel=sporza";
        }
}

// if deredactie-url in querystring -> detail/ category
if ($_GET["url"]){
        if (strpos($url,"http://m.deredactie.be/")===0) {
                $nothomepage=true;
                $url=$_GET["url"];
                $header="</head><body><div id=\"header\"><div id=\"back\"><a href=\"/redactie/\">&lt;</a></div><div id=\"logo\"><a href=\"/redactie/\">".$owner."'s</a><hr><span id=\"redactie\"><a href=\"/redactie/\">redactie.be</a></span></div><div id=\"catTitle\"><span id=\"titleText\"></span></div></div><div id=\"content\">";
        }
}

if ($_GET["nocache"]) {apc_delete(md5($url));}

// fetch content from cache or vrt
$htmlCache=apc_fetch(md5($url));
if (!empty($htmlCache)) {
	$htmlCache=json_decode(gzuncompress($htmlCache),true);
	if (!empty($htmlCache["html"])) {
		$htmlOut=$htmlCache["html"];
		$permalink=$htmlCache["permalink"];
		$catTitle=$htmlCache["catTitle"];
	} else {
		$notCached=true;
	}
} else {
	$notCached=true;
}

if ($notCached==true) {
	$contentstring=fetchUrl($url);
	$contentarr=json_decode(removeCallback($contentstring),true);
	$permalink="";
	$catTitle="";

	if (is_array($contentarr)){
	  if (array_key_exists("rows",$contentarr)) {
    		// channel overview i.e. homepage
		foreach ($contentarr["rows"] as $bundles){
		   if ($bundles["bundle"]["type"]==="HighLightsCardBundle") {
			// headlines
			$htmlOut.="<div class=\"right inNav\"><div id=\"hoofdpunten\">Hoofdpunten</div><a href=\"#nieuwsstroom\" id=\"stroomLink\">Laatste nieuws</a></div><div id=\"hoofdpunten\" class=\"headlines\">";
			$iterationCounter=0;
			foreach ($bundles["bundle"]["content"] as $bundlecontent) {
					if (array_key_exists("content",$bundlecontent)) {
						if ($iterationCounter>=3) {$loadImg=false;} else {$loadImg=true;}
						$contentHTML=getAbstractFromContentBundle($bundlecontent,$loadImg);
                                                $iterationCounter++;
					}
					$htmlOut.=$contentHTML;
				}
				$htmlOut.="</div><hr /><div id=\"startstroom\" class=\"right inNav\"><a href=\"#hoofdpunten\" id=\"hoofdpunten\">Hoofdpunten</a><br /><a name=\"nieuwsstroom\">Laatste nieuws</a></div>";
		   }  else if ($bundles["bundle"]["type"]==="ContentBundle") {
			// after headlines
			$bundlecontent=$bundles["bundle"];
			if (array_key_exists("content",$bundlecontent)) {
				$contentHTML=getAbstractFromContentBundle($bundlecontent,false);
			}
			$htmlOut.=$contentHTML;
		   }	
		}
	  } else if (array_key_exists("bundle",$contentarr)) {
		if ($contentarr["bundle"]["type"]==="ContentBundle") {
			// full article
			$htmlOut="<div class=\"article\"><h2 class=\"title\">".$contentarr["bundle"]["content"][0]["title"]."</h2>";
			$htmlOut.="<em>(door ".$contentarr["bundle"]["author"].", op ".niceDate($contentarr["bundle"]["lastUpdateTime"]).")</em>";
			$htmlOut.="<p class=\"intro\"><b>".$contentarr["bundle"]["content"][0]["text"]."</b></p>";
			$permalink=$contentarr["bundle"]["externalPermaLink"];

			$htmlOut.="<div class=\"detail\">";
			foreach ($contentarr["bundle"]["content"] as $contentItem) {
				if ($contentItem["jsonType"]==="ContentBundle" && array_key_exists("format",$contentItem)) {
					// video missing
					if ($contentItem["format"]==="paragraphs") {
						foreach ($contentItem["content"] as $paragraph) {
							if ($paragraph["jsonType"]==="TextSnippet") {
								if (!empty($paragraph["title"])) {
									$paraText.="<h3>".$paragraph["title"]."</h3>";
								}
								$paraText.=$paragraph["text"];
							} else if ($paragraph["jsonType"]==="ContentBundle") {
								if ($imageUrl=getImageFromContentBundle($paragraph)) {
									$paraText.="<img src=\"".$imageUrl."\">";
								}
							}
						}
						$htmlOut.=$paraText;
					} else if ($contentItem["format"]==="image") {
						if ($imageUrl=getImageFromContentBundle($contentItem)) {
							$htmlOut.="<img src=\"".$imageUrl."\">";
						}
					}
				}
			}
			$htmlOut.="</div></div>";
		} else if ($contentarr["bundle"]["type"]==="StoryBundle") {
			// category page
			$iterationCounter=0;
			foreach ($contentarr["bundle"]["content"] as $contentItem) {
				if ($contentItem["type"]==="TextSnippet") {
					$catTitle=$contentItem["title"];
				} else if ($contentItem["type"]==="ContentBundle") {
                                	if (array_key_exists("content",$contentItem)) {
						if ($iterationCounter>=3) {$loadImg=false;} else {$loadImg=true;}
                                        	$contentHTML=getAbstractFromContentBundle($contentItem,$loadImg);
						$iterationCounter++;
                                	}
                                	$htmlOut.=$contentHTML;
				}
			}
		}
	  } else {
		echo "Ow, dit antwoord hadden we niet verwacht van de VRT;</br>";
		debugOut($contentarr);
	  }
	$htmlCache["permalink"]=$permalink;
	$htmlCache["html"]=$htmlOut;
	$htmlCache["catTitle"]=$catTitle;

	$result=apc_store(md5($url),gzcompress(json_encode($htmlCache)),180);
	} else {
		$htmlOut="Oeps! Klein probleem, probeer je zodadelijk nog eens?";
	}
}

if (!empty($permalink)) {
	$head.="<link rel=\"canonical\" href=\"".$permalink."\" />";
}

if (!empty($catTitle)) {
	// ugly str_replace to force category title in header
	$header=str_replace("<span id=\"titleText\"></span>","<span id=\"titleText\">".$catTitle."</span>",$header);
	$header=str_replace("<div id=\"logo\"><a href=\"/redactie/\">".$owner."'s</a><hr><span id=\"redactie\"><a href=\"/redactie/\">redactie.be</a></span></div>","",$header);
}

// output all
echo $head;
echo $header;
echo $htmlOut;
echo "</div><hr />";
echo $menu;
echo $footer;

// dump inline javascript at bottom of HTML, still to be minified
?>
<script>
var highNavVisible=false;
var d=document;

if (navigator.userAgent.match(/Opera Mini/)) {
	// Ugly hack to force Mini not to show horizontal scrollbar
	document.write("<style>body{width:90%;overflow:hidden;}</style>");
	}

if((typeof(d.getElementsByClassName)==="function")&&(typeof(d.addEventListener)==="function")&&(!navigator.userAgent.match(/Opera Mini/))) {(function(){
	var hN=d.getElementById("highNav");if(hN){hN.innerHTML=d.getElementById("nav").innerHTML;
	d.getElementById("toNav").onclick=showHideHighNav;}
	prepareLazyLoad();
	var sL=d.getElementById('stroomLink');if(sL){sL.addEventListener('click',scrollToStream,false);}
	onscroll=function(){var scrollTop=d.documentElement.scrollTop||d.body.scrollTop;if(scrollTop>350){lazyLoadNextImage();}}
	cssheet=d.styleSheets[0];cssheet.insertRule('#header,#highNav{position:fixed;}',cssheet.cssRules.length);cssheet.insertRule('#content{margin:60px 5px 5px 5px !important;}',cssheet.cssRules.length);
}())}

<?php if ($nothomepage===false) { ?>
var mm=window.matchMedia("(min-width: 700px)");
function aniHead() {if((typeof(d.querySelectorAll)==="function")&&(mm.matches)){lazyLoadAllImages();var _headAnim=d.createElement('script');_headAnim.src="js/aniHead.js";_headAnim.type="text/javascript";var head=d.getElementsByTagName("head")[0];head.appendChild(_headAnim);}}
<?php } ?>

function showHideHighNav(){if(highNavVisible==true){d.getElementById("highNav").style.display="none";highNavVisible=false;}else{d.getElementById("highNav").style.display="block";highNavVisible=true;}return false;}
function lazyLoadNextImage(){var lazyLoads=d.getElementsByClassName("lazyImg");if(lazyLoads[0]!==undefined){lazyLoadOneImage(lazyLoads[0]);}}
function lazyLoadAllImages(){var lazyLoads=d.getElementsByClassName("lazyImg");for (i=0;i<lazyLoads.length;++i){lazyLoadOneImage(lazyLoads[i]);}}
function lazyLoadOneImage(node){var _imgSrc=node.getAttribute("imgsrc");var _newI=new Image;_newI.src=_imgSrc;node.appendChild(_newI);node.className="image imgLoaded";}
function prepareLazyLoad() {var lazyLoads=d.getElementsByClassName("lazyImg");for (i=0;i<lazyLoads.length;++i) {_newClass=lazyLoads[i].className+" image";lazyLoads[i].className=_newClass;}}
function scrollToStream(){lazyLoadAllImages();setTimeout(function(){d.getElementById("startstroom").scrollIntoView();window.scrollBy(0,-60);},50);return false;}
</script>
</body>
</html>
<?php
// php deredactie helper functions
function getImageFromContentBundle($bundlecontent){
	if ($bundlecontent["format"]==="image") {
       	foreach ($bundlecontent["content"] as $imageNode) {
			if ($imageNode["type"]==="ImageSnippet") {
				if (!empty($imageNode["guid"])){
					$image=str_replace("/orig/","/mobile320/",$imageNode["guid"]);
					break;
				}
			}
		}
		return $image;
	} else {
		return false;
	}
}

function getAbstractFromContentBundle($bundlecontent,$showImage=true){
	global $trustHTML;
	$detailID=$baseUrl."?url=http://m.deredactie.be/client/mvc/contents/ContentBundle/".$bundlecontent["id"];
	foreach ($bundlecontent["content"] as $content) {
		if ($content["type"]==="TextSnippet"){
			if (!empty($content["title"])) {
				$title="<h2 class=\"title\"><a href=\"".$detailID."\">".$content["title"]."</a></h2>";
				$text="<p>".strip_tags($content["abstract"])." <em>(".niceDate($bundlecontent["publicationDate"]).").</em></p>";
			} else if ($content["format"]==="quote") {
				$title="";
				$text="<div class=\"qwrap\"><blockquote>".strip_tags($content["abstract"])."<br/><em>(".$content["source"]." ".niceDate($bundlecontent["publicationDate"]).").</em></blockquote></div>";
			} else if ($content["format"]==="twitter") {
				$title="";
				$text="<div class=\"qwrap\"><blockquote class=\"twitter\">".strip_tags($content["abstract"])."<br/><em>(".$content["source"]." via Twitter, ".niceDate($bundlecontent["publicationDate"]).").</em></blockquote></div>";
			}
		} else if ($content["type"]==="HtmlSnippet") {
			$title="";
			if ($trustHTML!==true) {
				$htmlSnippet=cleanHTML($content["html"]);
			} else {
				$htmlSnippet=$content["html"];
			}
			$text="<p class=\"qwrap\">".$htmlSnippet."</p>";
		} else if (array_key_exists("format",$content)) {
			if ($content["format"]==="image") {
				$image=getImageFromContentBundle($content);
			}
		}
	}

	$imgOut="";
	if ((!empty($image))&&($showImage===true)) {
		$imgOut="<div class=\"image\"><img width=\"320\" height=\"180\" src=\"".$image."\"></div>";
	} else if ((!empty($image))&&($showImage===false)){
		$imgOut="<div class=\"lazyImg\" imgsrc=\"".$image."\"></div>";
	}
	if (!empty($imgOut)) {
		$imgOut="<a href=\"".$detailID."\">".$imgOut."</a>";
	}

	if (!empty($title)||!empty($text)) {
		return "<div class=\"article\">".$title.$imgOut."<div class=\"summary\">".$text."</div></div>";
	} else {
		return false;
	}
}

function debugOut($debug) {
	echo "<pre>";
	print_r($debug);
	echo "</pre>";
}


function removeCallback($contentstring) {
	$stringlength=strlen($contentstring);
	$startjson=strpos($contentstring,'({')+1;
	$jsonlength=$stringlength-($stringlength-strrpos($contentstring,'})'))-$startjson;
	if (($startjson!==false)&&($startjson!==1)) {
		$contentjson=substr($contentstring,$startjson,$jsonlength);
	} else {
		$contentjson=$contentstring;
	}
	return $contentjson;
}

function fetchUrl($url) {
	if (strpos($url,"http://m.deredactie.be/")===0) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2; .NET CLR 1.1.4322; .NET CLR 2.0.50727)");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		$str = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if (!$err) {
			return $str;
		} else {
			echo $err;
			return false;
		}
	} else {
		return false;
	}
}

function niceDate($input) {
	return strftime("%d/%m/%Y om %T",strtotime($input));
	}

function cleanHtml($htmlString) {
	foreach(array('script','object','iframe') as $removeTag) {
		$_regex="/<".$removeTag."\b[^<]*(?:(?!<\/".$removeTag.">)<[^<]*)*<\/".$removeTag.">/i";
		$htmlString=preg_replace($_regex,"",$htmlString);
	}
	return $htmlString;
}
?>
