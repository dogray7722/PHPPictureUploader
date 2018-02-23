<?php
include('./inc/page-begin.php');

$dirname = "uploads/";
$contents = scandir($dirname);
?>

<div id="wrapper">
<?php
foreach($contents as $image) {
    if (is_file($dirname . $image))
    print '<div class="pics"><img class="img-fluid img-thumbnail 
    rounded float-left" src="/pictureuploader/uploads/'.$image.'"/></div>';

}
?>
</div>

<div id="push"></div>

<?php
include('./inc/page-end.php');
?>
