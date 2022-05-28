<?php
require_once '/home/static_web/day2dayhistory.com/dbcon.php';
date_default_timezone_set('America/New_York');
$timestamp = date("Y-m-d H:i:s");
$day = date('d');
$month = date('F');
$url_domain = "https://www.onthisday.com/birthdays/$month/$day";

$url = "https://www.onthisday.com/birthdays/$month/$day";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.81 Safari/537.36");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$html_content = curl_exec($ch);
curl_close($ch);

$domOb = new DOMDocument();
@$html = $domOb->loadHTML($html_content);
# Remove whitespace
$domOb->preserveWhiteSpace = false;
$container = $domOb->getElementsByTagName('ul');
# Loop through UL values  
foreach ($container as $row) 
{ 
  # Grab all <li>
  $items = $row->getElementsByTagName('li'); 

  foreach ($items as $key => $val) {
	
	 $year = substr($val->textContent,0,4);
	 $title = trim(str_replace($year,"",$val->textContent));
	 
	 if(strlen($val->textContent)>50 && is_numeric($year)){
		 
		$post_title = strip_tags($year);
		$post_content = strip_tags($title);
				
		$pieces = parse_url($url_domain);
		$domain = isset($pieces['host']) ? $pieces['host'] : '';
		if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
			$domain_name = $regs['domain'];
		}	
		
		if($post_title != "" && $post_content!=""){
			
			$post_content = str_replace( '"','',$post_content);
			$post_content = str_replace( "'","",$post_content);
			$post_content = escape_string($post_content);
			//$addS = addslashes($post_content);
			
			$sql1 = "SELECT * FROM history_news_feed WHERE post_content like '%$post_content%' and category!=''";
			$result = $conn->query($sql1);				
			$rowcount=mysqli_num_rows($result);
			
			if($rowcount == 0){
				$sql2 = "INSERT INTO history_news_feed (post_title,post_content,post_img,event_date,publish_date,guid_link,domain,category) VALUES ('$post_title','$post_content','',now(),'','','$domain_name','birthdayevent')";				
				$in_qry = $conn->query($sql2);
			}
		}
	 }		 
  }
} 

$url1 = "https://www.onthisday.com/events/$month/$day";
$url_domain1 = "https://www.onthisday.com/events/$month/$day";
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.81 Safari/537.36");
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
$html_content1 = curl_exec($ch1);
curl_close($ch1);

$domOb1 = new DOMDocument();
@$html1 = $domOb1->loadHTML($html_content1);
$domOb1->preserveWhiteSpace = false;
$container1 = $domOb1->getElementsByTagName('ul');

foreach ($container1 as $row1) 
{ 
  # Grab all <li>
  $items1 = $row1->getElementsByTagName('li'); 

  foreach ($items1 as $key => $val1) {
	
	 $year1 = substr($val1->textContent,0,4);
	 $title1 = trim(str_replace($year1,"",$val1->textContent));
	 
	 if(strlen($val1->textContent)>50 && is_numeric($year1)){
		 
		$post_title1 = strip_tags($year1);
		$post_content1 = strip_tags($title1);
		
		$pieces1 = parse_url($url_domain1);
		$domain1 = isset($pieces1['host']) ? $pieces1['host'] : '';
		if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain1, $regs1)){
			$domain_name1 = $regs1['domain'];
		}			
		
		if($post_title1 != "" && $post_content1!=""){
			
			$post_content1 = str_replace( '"','',$post_content1);
			$post_content1 = str_replace( "'","",$post_content1);
			$post_content1 = escape_string($post_content1);
			//$addS1 = addslashes($post_content1);
			
			$sql3 = "SELECT * FROM history_news_feed WHERE post_content like '%$post_content1%'";
			$result3 = $conn->query($sql3);				
			$rowcount1 = mysqli_num_rows($result3);
						
			if($rowcount1 == 0){
				$sql4 = "INSERT INTO history_news_feed (post_title,post_content,post_img,event_date,publish_date,guid_link,domain,category) VALUES ('$post_title1','$post_content1','',now(),'','','$domain_name1','historicalevents')";				
				$in_qry1 = $conn->query($sql4);
			}
		}
	 }		 
  }
}

function escape_string($value) {
		
   $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
   $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
   return str_replace($search, $replace, $value);
}

?>