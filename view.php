<?php
include('./inc/page-begin.php');

//$dirname = "uploads/";
//$contents = scandir($dirname);
//foreach($contents as $image) {
//    $pic = $dirname . $image;
//    if (is_file($pic)) {
//        print '<div class="pics"><img class="img-fluid img-thumbnail
//                rounded float-left" src="/PHPPictureUploader/uploads/' . $image . '"/><span>'.$pic.'</span></div>';
//    }
//
//}

?>

<div id="wrapper" class="row">
<?php

$sql = "SELECT * FROM imagedata";
if ($result = mysqli_query($db, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
            print '<div style="margin-left: 10px" class=""><img class="img-fluid img-thumbnail
                rounded float-left" src="/PHPPictureUploader/'.$row['path'].'"/>
                <div class="rounded" style="border-style: groove; border-width: 1px">
                <span style="margin-right: 5px" class="float-right">
                <i class="far fa-trash-alt"></i></span><h3>'.ucfirst($row['title']).'</h3></div></div>';
    }
} else {
    print '<p style="color: red;">Could not retrieve the data because:<br>'
        .mysqli_error($db) . '</p>';
}
?>
</div>

<?php

mysqli_free_result($result);
include('./inc/page-end.php');
?>