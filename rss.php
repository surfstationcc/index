<?php
//取得するRSSのURL
$rss = array('http://blog.surfstation.co/feed', 'http://scrap.surfstation.co/rss', 'http://twittergoodrss.herokuapp.com/68356123416599783907/surfstationco', 'http://rss.stagram.tk/feed.php?id=143365&username=surfstation&rss');

//2番目は1つのRSSから読み込む件数、3番目は実際に表示する件数
rssReader($rss, 10, 10);

function rssReader($rss, $read_count=0, $view_count=0) {
	$html = '';
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
	echo $html;
}
?>