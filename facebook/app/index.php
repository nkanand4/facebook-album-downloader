<?php

include_once '../common/utilities.php';

$error_messages = array();
$title = 'Facebook album downloader';

$user = $fb->getUser();
$utilities = new Utilities();
if($user) {
	$me = $fb->api('/me');
	$title = $me['name'].' : '.$title;
	$userlist = $utilities->fql("SELECT uid, name, pic_square FROM user WHERE uid = me() OR uid IN (SELECT uid2 FROM friend WHERE uid1 = me())");	
} else {
	$title = 'Login : '.$title.'';
	$messages['info'][] = 'Please '.$utilities->url($fb->getLoginUrl(), 'login'). ' to use this app';
}

include "../views/userlist.php";
?>