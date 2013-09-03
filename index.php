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
	<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script>
	$(document).ready(function(){
		/**
		 * Ajax通信メソッド
		 * @param type      : HTTP通信の種類
		 * @param url       : リクエスト送信先のURL
		 * @param dataType  : データの種類
		 */
		$("#load").html("<img src='loader.gif' width='64' height='64' />");
		$.ajax({
			type: "POST", url: "rss.php", dataType: "html",
			success: function(data, dataType){
				//結果が0件の場合
				if(data == null){
					data = 'No data';
				}
				document.getElementById('act').innerHTML=data;
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert('Error : ' + errorThrown);
			},
			complete: function(data) {
				$("#load").empty();
			}
		});
	});
	</script>
</head>
<body>
<div id="wrap">
	<div id="header">
		<h1>Surf<span>station</span></h1>
	</div>
	<div id="content">
		<ul>
			<li><a href="http://blog.surfstation.co/">Blog</a></li>
			<li><a href="http://scrap.surfstation.co/">Tumblr</a></li>
			<li><a href="https://twitter.com/surfstationco">Twitter</a></li>
			<li><a href="http://instagram.com/surfstation">Instagram</a></li>
			<!--<li><a href="https://foursquare.com/jasonchandlr">Foursquare</a></li>-->
			<li><a href="https://github.com/surfstationcc">Github</a></li>
		</ul>

		<h2>Activities</h2>
		<div id="load"></div>
		<ul id="act" class="act"></ul>

		<h2>About</h2>
		<dl class="about clearfix">
			<dd class="icon"><a href="https://twitter.com/surfstationco"><img src="http://furyu.nazo.cc/twicon/surfstationco/original" width="73" height="73" /></a></dd>
			<dd class="content"><span>I am surfstation. Tech enthusiast, web design freak, amazed by anything mobile.</span></dd>
		</dl>
		
	</div>
	<div id="foot">
		<p>&copy; 2013 Surfstation.</p>
	</div>
</div>
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43443737-1', 'surfstation.co');
  ga('send', 'pageview');

</script>
</body>
</html>