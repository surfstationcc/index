<!DOCTYPE html>
<html lang="ja">
<head>
	<title>Surfstation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Typekit -->
	<script type="text/javascript" src="http://use.typekit.com/hxh6zbd.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<!-- Font Awesome -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />

	<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	.clearfix:after {
		content: "";
		clear: both;
		display: block;
	}
	body {
		background: #fff;
		color: #333;
		font: 12px/1.5 Helvetica, Arial, sans-serif;
    	width: 100%;
		padding: 30px 0;
	}
	a {
	    color: #51B6EB;
	    text-decoration: none;
	    -webkit-transition:color .2s ease-in-out,background-color .2s ease-in-out;
	    -moz-transition:color .2s ease-in-out,background-color .2s ease-in-out;
	    -o-transition:color .2s ease-in-out,background-color .2s ease-in-out;
	    transition:color .2s ease-in-out,background-color .2s ease-in-out;
	}
	a:active, a:hover {
		color: #6fc4f2;
		text-decoration: underline;
	}
	#wrap{
	    width: 765px;
	    margin: 0 auto;
	}
	#wrap h1{
		font-weight: normal;
		font-size: 32px;
		text-transform: lowercase;
		margin-bottom: 15px;
	}
	#wrap h1 span{
	    font-weight: bold;
	    letter-spacing: -1px;
	}
	#wrap h1 a:hover,
	#wrap h1 a:active{
	    text-decoration: none;
	    color: #666;
	}
	#content {
		width: 100%;
	}
	#content h2{
		font-size: 18px;
		font-weight: normal;
		margin: 20px 0 10px 0;
	}
	#content ul li{
		list-style-position: inside;
	}
	#content ul.act li{
		list-style-type: none;
		clear: both;
	}
	#content ul.act i{
		float: left;
		display: block;
		margin: 3px 6px 0 0;
		width: 12px;
		text-align: center;
		line-height: 1em;
	}
	#content ul.act li span{
		padding-right: 1em;
		color: #666;
	}
	#content ul.act .blog{
		color: #468aca;
	}
	#content ul.act .twitter{
		color: #00aced;
	}
	#content ul.act .tumblr{
		color: #385774;
	}
	#content ul.act .instagram{
		color: #705c47;
	}
	#content ul.act .foursquare{
		color: #0072b1;
	}
	#content dl.about{
	}
	#content dl.about dd.icon{
		float: left;
	}
	#content dl.about dd.icon img{
		width: 73px;
		height: 73px;
		-webkit-border-radius:3px;
		-moz-border-radius:3px;
		border-radius:3px;
	}
	#content dl.about dd.content{
		float: left;
		width: 672px;
		color: #666;
		padding-left: 1em;
	}
	#foot{
		clear: both;
		border-top: 1px solid #e0e0e0;
		padding-top: 1em;
		margin-top: 2em;
		font-size: 10px;
		font-family: Verdana;
		text-align: right;
	}
	/* =============================================== 
	Media Queries
	================================================== */
	@media only screen and (min-width: 768px) {
	}
	/* ========================================= */
	@media only screen and (min-width: 480px) and (max-width: 768px) {
	    body {
	        padding: 20px 0;
	    }
	    #wrap{
	        width: 680px;
	    }
		#content dl.about dd.content{
			width: 587px;
		}
	}
	/* ========================================= */
	@media only screen and (max-width: 480px) {
	    body {
	        padding: 10px 0;
	    }
	    #wrap{
	        width: 285px;
	     }
	    #wrap h1{
	        text-align: center;
	    }
		#content dl.about dd.content{
			width: 192px;
		}
	}
	</style>
</head>
<body>
<div id="wrap">
	<div id="header">
		<h1>Surf<span>station</span></h1>
	</div>
	<div id="content">
		<!--<h2>Activities</h2>-->
		<ul>
			<li><a href="http://blog.surfstation.cc/">Blog</a></li>
			<li><a href="http://scrap.surfstation.cc/">Tumblr</a></li>
			<li><a href="https://twitter.com/surfstationcc">Twitter</a></li>
			<li><a href="http://instagram.com/surfstation">Instagram</a></li>
			<!--<li><a href="https://foursquare.com/jasonchandlr">Foursquare</a></li>-->
			<li><a href="https://github.com/surfstationcc">Github</a></li>
		</ul>

<?php
//取得するRSSのURL
$rss = array('http://blog.surfstation.cc/feed', 'http://scrap.surfstation.cc/rss', 'http://twittergoodrss.herokuapp.com/68356123416599783907/surfstationcc', 'http://rss.stagram.tk/feed.php?id=143365&username=surfstation&rss');

//2番目は1つのRSSから読み込む件数、3番目は実際に表示する件数
rssReader($rss, 10, 10);

function rssReader($rss, $read_count=0, $view_count=0) {
	$html = '<h2>Activities</h2>';
	$html .= '<ul class="act">';
	$ardaysort = array();
	$arday = array();
	$arcontent = array();
	$rsscount = 0;
	foreach ($rss as $url) {
		$count = 0;
		$rssclass = '';
		switch($rsscount){
		case 0:
			$rssclass = '<i class="icon-circle blog"></i><span>';
			break;
		case 1:
			$rssclass = '<i class="icon-tumblr tumblr"></i><span>';
			break;
		case 2:
			$rssclass = '<i class="icon-twitter twitter"></i><span>';
			break;
		case 3:
			$rssclass = '<i class="icon-instagram instagram"></i><span>';
			break;
		case 4:
			$rssclass = '<i class="icon-foursquare foursquare"></i><span>';
			break;
		}
		foreach (simplexml_load_file($url)->channel->item as $item) {
			$count++;
			$day = date('Y.m.d', strtotime($item->pubDate)); //M jS, Y
			$daysort = date('YmdHs', strtotime($item->pubDate)); // ソート用
			if($rsscount == 2){
				// Twitterはdescriptionを取得
				$content = '<li>'.$rssclass.$day.'</span><a href="'.$item->link.'" title="'.htmlspecialchars(strip_tags($item->description)).'">'.mb_substr(strip_tags($item->description),2,20,'utf-8').'</a></li>';
			} else {
				$content = '<li>'.$rssclass.$day.'</span><a href="'.$item->link.'" title="'.htmlspecialchars($item->title).'">'.mb_substr($item->title,0,20,'utf-8').'</a></li>';
			}
			array_push($ardaysort, $daysort);
			array_push($arday, $day);
			array_push($arcontent, $content);
			if ($count >= $read_count) {
				break;
			}
		}
		$rsscount++;
	}
	// 日付の新しい順に並び替え
	array_multisort($ardaysort, SORT_DESC, $arday, $arcontent);
	$valcnt = 0;
	foreach ($arcontent as $value) {
		$valcnt++;
		$html .= $value;
		if ($valcnt >= $view_count) {
			break;
		}
	}

	$html .= '</ul>';
	echo $html;
}
?>

		<h2>About</h2>
		<dl class="about clearfix">
			<dd class="icon"><img src="http://furyu.nazo.cc/twicon/jasonchandlr/original" width="73" height="73" /></dd>
			<dd class="content"><span>I am Jason Chandler aka surfstation. Tech enthusiast, web design freak, amazed by anything mobile.</span></dd>
		</dl>
		
	</div>
	<div id="foot">
		<p>&copy; 2013 Surfstation.</p>
	</div>
</div>
<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22339599-1']);
  _gaq.push(['_setDomainName', 'surfstation.cc']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>