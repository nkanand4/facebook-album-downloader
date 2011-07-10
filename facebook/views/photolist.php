<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title?></title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<style type="text/css">
	img {cursor: pointer;}
	.selected {
		background: none repeat scroll 0% 0% #cccccc; 
		padding: 3px;
		border: 1px solid #dddddd; 
		-moz-border-radius: 4px; 
		-moz-box-shadow: 0px 15px 10px;
	}
</style>
</head>
<body>
<div>
	<a href="list_albums.php?uid=<?php echo $_SESSION['uid']?>&name=<?php echo $name?>">Back to <?php echo $name?>'s albums</a>
	<a href="index.php">Back to friends</a>
</div>
<div>
	<a id="select_all" href="#">Select all photos</a> 
	<a id="unselect_all" href="#">Unselect all photos</a> 
	<a id="download_now" href="#">Download now</a>
	</div>
<?php for($i=0; $i<count($photos); $i++):?>
	<img alt="" src="<?php echo $photos[$i]['src_small']?>" name="<?php echo $photos[$i]['src_big']?>">
<?php endfor;?>
<form action="get_photos.php" method="post">
<input name="return_to" type="hidden" value="<?php echo $_SERVER['REQUEST_URI']?>">
</form>
</body>
<script type="text/javascript">
$(document).ready(function() {
	function download() {
		$('.selected').each(function(i) {
			var input = document.createElement('input');
			input.name = 'photos['+i+']';
			input.type = 'hidden';
			input.value = $(this).attr("name");
			input.className = 'images';
			$('form').append(input);
		});
		$('form').submit();
	}
	$("#select_all").bind('click', function(e) {
		$('img').addClass('selected');
		e.preventDefault();
	});
	$("#unselect_all").bind('click', function(e) {
		$('img').removeClass('selected');
		e.preventDefault();
	});
	$("img").bind('click', function(e) {
		$(this).toggleClass('selected');
		e.preventDefault();
	});
	$("#download_now").bind('click', function(e) {
		$(".images").remove();
		download();
		e.preventDefault();
	});
});
</script>
</html>