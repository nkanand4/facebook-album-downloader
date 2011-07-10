<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title?></title>
<!--  script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script-->
</head>
<body>
<div class="info"><?php //echo $messages['info'][0]?></div>
<div><a href="index.php">Back to friends</a></div>
<div>Select the album(s) you want to choose photos from.</div>
<div class="album-list">
<?php for ($i=0; $i<count($albums); $i++) :?>
		<div class="album-row">
			<a href="list_photos.php?aid=<?php echo $albums[$i]['aid'];?>&name=<?php echo $name?>">
				<img alt="<?php echo $albums[$i]['name']?>" src="<?php echo $coverImages[$albums[$i]['cover_pid']]?>" title="<?php echo $albums[$i]['name']?>">
				<?php echo $albums[$i]['name']?>
			</a>
		</div>
<?php endfor;?>
</div>
</body>
</html>