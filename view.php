<?php
include('./inc/page-begin.php');

$dirname = "uploads/";
$contents = scandir($dirname);
//$images = glob($dirname. "*.jpg");


foreach($contents as $image) {
    if (is_file($dirname . $image))
    print '<img src="/sessiontester2/uploads/'.$image.'" /><br />';

}


include('./inc/page-end.php');

//<img src="http:\\localhost\site\img\mypicture.jpg"/>