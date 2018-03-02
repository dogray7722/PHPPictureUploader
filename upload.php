<?php
include('./inc/page-begin.php');

//PHP For the Web Visual Guide uses a switch statement, but I will use an associative array
$upload_errors = array(
    UPLOAD_ERR_OK => "Relax, everything went OK.",
    UPLOAD_ERR_INI_SIZE => "Slow down there, turbo!  You've exceeded the upload_max_filesize of ~32M.",
    UPLOAD_ERR_FORM_SIZE => "File is too big.  Exceeded MAX_FILE_SIZE of ~10M.",
    UPLOAD_ERR_PARTIAL => "Partial upload.",
    UPLOAD_ERR_NO_FILE => "No file submitted.",
    UPLOAD_ERR_NO_TMP_DIR => "No Temp directory found.  Check your php.ini.",
    UPLOAD_ERR_CANT_WRITE => "Can't write the file.",
    UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
);

if (isset($_POST['submit'])) {
    $tmp_file = $_FILES['file_upload']['tmp_name'];

    //Use basename to escape file name inputs
    $target_file = basename($_FILES['file_upload']['name']);
    $upload_dir = "uploads";

    //Set a variable to capture file extension
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $title = trim(strip_tags($_POST['picture_title']));

    //Concatenating this file path will make life easier for our sql query
    $uploaded_file = $upload_dir . "/" . $target_file;

    //Validate file type is picture
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

    } else {
        if (move_uploaded_file($tmp_file, $uploaded_file)) {
            $message = 'File uploaded successfully. <br><a href="/PHPPictureUploader/view.php">Click here</a> to view your uploads';
            $query = "INSERT INTO imagedata (path, title) VALUES ('$uploaded_file', '$title');";
            mysqli_query($db, $query);
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        }
    }
}

?>

<?php if(!empty($message)) { echo "<p>{$message}</p>"; } ?>

    <hr>
    <form action="/PHPPictureUploader/upload.php" enctype="multipart/form-data" method="post">
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="pic_title">Picture Title:</label>
                <input class="form-control" id="pic_title" type="text" name="picture_title">
            </div>
        </div>
        <div class="form-group">
            <label for="file">File type must be JPG, JPEG, PNG or GIF.</label>
            <input type="file" id="file" name="file_upload" class="form-control-file">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000"><br>
            <input type="submit" name="submit" value="Upload">
        </div>
    </form>
<?php
include('./inc/page-end.php');
?>