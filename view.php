<?php
include('./inc/page-begin.php');

$dirname = "uploads/";
$contents = scandir($dirname);


foreach($contents as $image) {
    if (is_file($dirname . $image))
    print '<img class="img-fluid img-thumbnail 
    rounded float-left" src="/phppictureuploader/uploads/'.$image.'"/><br />';

}


include('./inc/page-end.php');

