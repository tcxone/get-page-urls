<?php
if(isset($_GET["url"])){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $_GET["url"]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$html = curl_exec($ch);
	curl_close($ch);

	preg_match_all('/https?:\/\/[^"]+/', $html, $matches);
	$web_urls = $matches[0];

	foreach ($web_urls as $web_url) {
		$decoded_url = urldecode($web_url);
		echo $decoded_url . "<br/><br/>";
	}

}else{
	echo "<p>error</p>";
	echo "<p>Example: get_page_urls.php?url=https://github.com</p>";
}
?>