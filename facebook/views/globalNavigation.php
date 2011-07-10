<?php
$params = array(
	'scope' => 'user_photos,friends_photos'
	);
if($user) {
	$logText = 'Please click here to '.$utilities->url($fb->getLogoutUrl($params), 'logout');
} else {
	$logText = 'Please click here to '.$utilities->url($fb->getLoginUrl($params), 'login');
}
?>
<div>
	<span>Hi username,</span>
	<span><?php echo $logText;?></span>
</div>