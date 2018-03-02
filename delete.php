<?php
include('./inc/page-begin.php');


if (isset($_GET['id'])) {
    $query = "SELECT * FROM imagedata WHERE id={$_GET['id']}";
    if ($result = mysqli_query($db, $query)) {
        $row = mysqli_fetch_array($result);
        print '<div class="row">
                <div class="col-lg-3">
                    <form action="/PHPPictureUploader/delete.php" method="post">
                        <h1>Delete Picture</h1>
                        <p>Are you sure you want to delete this picture:</p>
                        <img class="img-fluid img-thumbnail rounded" src="/PHPPictureUploader/'.$row['path'].'"/>
                            <div class="rounded">
                                <h6 style="margin-left: 10px">'.ucfirst($row['title']).'</h6>
                            </div><br>        
                            <input type="hidden" name="id" value="' . $_GET['id'] . '">
                            <input type="submit" class="btn btn-danger" name="submit" value="Delete Pic">
                    </form>
                </div>
               </div>
               <br>';
    }
} elseif (isset($_POST['id'])) {
    $query = "SELECT * FROM imagedata WHERE id={$_POST['id']}";
    if ($result = mysqli_query($db, $query)) {
        $row = mysqli_fetch_array($result);
        $path = $row['path'];
        unlink($path);
        $del = "DELETE from imagedata WHERE id={$_POST['id']} LIMIT 1";
        $delResult = mysqli_query($db, $del);
        if (mysqli_affected_rows($db) == 1) {
            print '<h2>The picture was deleted successfully!</h2>
                <br><a href="/PHPPictureUploader/view.php">Click here</a> to view your pictures
                <br><a href="/PHPPictureUploader/upload.php">Click here</a> to upload more pictures';
        }
    }
}

include('./inc/page-end.php');