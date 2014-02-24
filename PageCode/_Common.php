<?php class _Common_PageCode extends PageCode {
public function go($api, $dom, $template, $tool) {
	$auth = new Auth(Auth_Config::$providers);
	$user = $tool["User"]->getUser($auth);

	$appUser = null;
	do {
		$appUser = $api["AppUser"]->getByID($user);
		if(!$appUser->hasResult) {
			$api["AppUser"]->create([
				"ID" => $user["ID"],
				"name" => null
			]);
		}
	}while(!$appUser->hasResult);

	if(Session::exists("CONFAB.User.name")) {
		$api["AppUser"]->setName([
			"name" => Session::get("CONFAB.User.name"),
			"ID" => $appUser["ID"],
		]);
	}

	if(false) {
		$dom["body > header form#auth .login"]->remove();
	}
	else {
		$dom["body > header form#auth .logout"]->remove();
	}
}
}#