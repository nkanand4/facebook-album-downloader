<?php
$aid = isset($_GET['aid']) ? $_GET['aid'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';

include_once '../common/utilities.php';


if($aid) {
	// user is requesting photos from album
	$fql = "SELECT src_small, src_big FROM photo where aid = '".$aid."'";
	$title = "Album photos : ".$name;
}

$utilities = new Utilities();
$photos = $utilities->fql($fql);

include '../views/photolist.php';
?>