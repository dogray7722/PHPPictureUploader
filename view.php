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
            print '<div style="margin-left: 10px">
                   <img class="img-fluid img-thumbnail rounded float-left" src="/PHPPictureUploader/' .$row['path'].'"/>
                        <div class="rounded" style="border-style: groove; border-width: 1px">
                            <span style="margin-right: 10px" class="float-right">
                                <a href="/PHPPictureUploader/delete.php?id='.$row['id'].'">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </span>
                            <h5 style="margin-left: 10px">'.ucfirst($row['title']).'</h5>
                         </div>
                     </div>';
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


