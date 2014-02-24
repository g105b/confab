<?php class Index_PageCode extends PageCode {
public function go($api, $dom, $template, $tool) {
	if(isset($_POST["room"])) {
		$roomName = $this->fixUrl($_POST["room"]);
		$userName = $_POST["userName"];

		header("Location: /Room/$roomName.html?u=$userName");
		exit;
	}
}

private function fixUrl($url) {
	// $url = preg_replace('/[^\W]/u', '', $url);
	$url = urlencode($url);
	return $url;
}
}#