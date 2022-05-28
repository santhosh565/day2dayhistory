<?php
date_default_timezone_set('America/New_York');
require_once '/home/static_web/day2dayhistory.com/dbcon.php';
$url = "https://www.history.com/.rss/full/this-day-in-history";
$rss = new DOMDocument();
$rss->load($url);
$feed = array();

foreach ($rss->getElementsByTagName('item') as $node) {
	
	$post_title = $node->getElementsByTagName('title')->item(0)->nodeValue;
	$link = $node->getElementsByTagName('link')->item(0)->nodeValue;
	$pubDate = $node->getElementsByTagName('pubDate')->item(0)->nodeValue;
	$post_content = strip_tags($node->getElementsByTagName('encoded')->item(0)->nodeValue);
	
	$pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
        $domain_name = $regs['domain'];
    }	
	
	$post_content = str_replace( '"','',$post_content);
	$post_content = str_replace( "'","",$post_content);	
	$post_content = escape_string($post_content);
	
	$post_title = preg_replace("/[^a-zA-Z0-9]+/", " ", html_entity_decode($post_title, ENT_QUOTES));
	$post_title=trim($post_title);
	$post_title = escape_string($post_title);
	
	$sql = "SELECT * FROM history_news_feed WHERE post_title like '%$post_title%' and category=''";
	$result = $conn->query($sql);				
	$rowcount = mysqli_num_rows($result);
	if($rowcount == 0){
		
		$search_query = $post_title; //change this
		
		$URI="https://www.bing.com/images/search?q=".urlencode($search_query)."&FORM=OIIARP";
		$curl = curl_init($URI);
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 15);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.81 Safari/537.36");
		#curl_setopt($curl, CURLOPT_USERAGENT, "Dark Secret Ninja/1.0");
		$response = curl_exec($curl);
		curl_close($curl);
		
		$xpath = new DOMXPath(@DOMDocument::loadHTML($response));
		$src = $xpath->query('//div[@class="imgpt"]');
		$arr = $src->item(0)->getElementsByTagName("img")->item(0);
		$img_f = $arr->getAttributeNode("src")->nodeValue;
		list($img_url,$other) = explode("?",$img_f);
		$stringCut1 = substr($post_title,0,11);
		$stringCut1 = str_replace(' ', '', $stringCut1);
		$stringCut1 = str_replace( '"','',$stringCut1);
		$stringCut1 = str_replace( "'","",$stringCut1);
		
		$cdate = date("Ymd");
		$time=time();
		$img = "/home/static_web/day2dayhistory.com/images/upload/img_$cdate".$stringCut1.".jpg";
		$arrContextOptions=array(
		   "ssl"=>array(
			   "verify_peer"=>false,
			   "verify_peer_name"=>false,
		   ),
		);
		
		file_put_contents($img, file_get_contents("$img_url", false, stream_context_create($arrContextOptions)));
		$size = getimagesize($img);
		if(!empty($size)){
			
			$sql4 = "INSERT INTO history_news_feed (post_title,post_content,post_img,event_date,publish_date,	guid_link,domain,category) VALUES ('$post_title','$post_content','$img',now(),'$pubDate','$link','$domain_name','')";					
			$in_qry1 = $conn->query($sql4);			
		}
		else{
			//unlink($img);
		}
	}	
}

function escape_string($value) {
		
   $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
   $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
   return str_replace($search, $replace, $value);
}
?>