<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title?></title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
</head>
<body>
<div class="info"><?php echo $messages['info'][0]?></div>
<div><a href="../views/invite.html">Invite someone</a></div>
<div>Select the person whose album(s)/picture(s) you want to see.</div>
<div class="user-list">
<?php for ($i=0; $i<count($userlist); $i++) :?>
	<a href="list_albums.php?uid=<?php echo $userlist[$i]['uid']?>&name=<?php echo $userlist[$i]['name']?>">
		<img title="<?php echo $userlist[$i]['name']?>" 
			alt="<?php echo $userlist[$i]['name']?>" src="<?php echo $userlist[$i]['pic_square']?>">
	</a>
<?php endfor;?>
</div>
</body>
<script>
window.fbAsyncInit = function() {
	FB.init( {
		appId : '22593781256',
		status : true,
		cookie : true,
		xfbml : true
	});
	FB.getLoginStatus(function(response) {
		if (response.session) {
		} else {
			// no user session available, someone you dont know
			FB.login(function(response) {
			});
		}
	});
};
(function() {
	var e = document.createElement('script');
	e.async = true;
	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
	if($('#fb-root').length === 0) {
		var fbroot = document.createElement('div');
		fbroot.setAttribute('id', 'fb-root');
		document.getElementsByTagName('body')[0].appendChild(fbroot);
	}	
	document.getElementById('fb-root').appendChild(e);
}());
</script>
</html>