<?php
session_start();
$photos = $_POST['photos'];
$return = ($_POST['return_to']);
for($i=0; $i<count($photos); $i++) {
	$filename = '/home/nitesh/Pictures/'.time().$_SESSION['uid'].$i.".jpg";
	file_put_contents($filename, file_get_contents($photos[$i]));
	chmod($filename, 0777);
}
header("Location: ".$return);
?>