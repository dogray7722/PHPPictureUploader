<?php
include('./inc/page-begin.php');
?>

<div class="card-group">
<?php
$sql = "SELECT * FROM imagedata";
if ($result = mysqli_query($db, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
            print
                '<div>
                   <div id="pictures" class="card">
                   <img  class="card-img-top img-thumbnail rounded float-left" src="/PHPPictureUploader/' .$row['path'].'"/>
                        <div class="card-block rounded">
                        <h6 class="card-text" style="margin-left: 10px">'.ucfirst($row['title']).'
                            <span style="margin-right: 10px" class="float-right">
                                <a href="/PHPPictureUploader/delete.php?id='.$row['id'].'">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </span></h6>
                        </div>
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


