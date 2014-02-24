<?php class Room_Common_PageCode extends PageCode {
public function go($api, $dom, $template, $tool) {
	if(isset($_GET["u"])) {
		Session::set("CONFAB.User.name", $this->fixUsername($_GET["u"]));
		header("Location: " . strtok($_SERVER["REQUEST_URI"], "?"));
	}
	if(!Session::exists("CONFAB.User")) {
		header("Location: /");
		exit;
	}

	$jsVars = new StdClass();
	$jsVars->u = base64_encode(Session::get("CONFAB.User.name"));
	$dom["script#vars"]->innerHTML = "if(!window.CONFAB)window.CONFAB={};\n"
		. "CONFAB.vars = " . json_encode($jsVars);

	// Remove any whitespace.
	$dom["#cams"]->innerHTML = "";
}

private function fixUsername($username) {
	return $username;
}
}#