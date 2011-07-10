<?php
include_once '../common/utilities.php';
$uid = $_SESSION['uid'] = $_GET['uid'];
$name = $_GET['name'];
$cols = 4;

$utilities = new Utilities();
$albums = $utilities->fql("SELECT aid, name, cover_pid FROM album WHERE owner = ".$uid);
$pids = array();
for($i=0;$i<count($albums); $i++) {
	$pids[] = '"'.$albums[$i]['cover_pid'].'"';
}
$photos = $utilities->fql("SELECT pid, src FROM photo WHERE pid in (". implode(',',$pids) .")");
$coverImages = array();
for($i=0;$i<count($photos); $i++) {
	$coverImages[$photos[$i]['pid']] = $photos[$i]['src'];
}
$title = $name ."'s Albums";

include "../views/albumlist.php";
?>