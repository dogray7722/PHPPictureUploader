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

    if (move_uploaded_file($tmp_file, $upload_dir."/".$target_file)) {
        $message = 'File uploaded successfully. <br><a href="/pictureuploader/view.php">Click here</a> to view your uploads';

    } else {
        $error = $_FILES['file_upload']['error'];
        $message = $upload_errors[$error];
    }
}

//Uncomment these lines to print the output of the $_FILES Superglobal
//echo "<pre>";
//print_r($_FILES['file_upload']);
//echo "</pre>";
//echo "<hr/>";

?>

<?php if(!empty($message)) { echo "<p>{$message}</p>"; } ?>
<form action="/sessiontester2/upload.php" enctype="multipart/form-data" method="post">

    <label class="custom-file">
        <input type="file" id="file" name="file_upload" class="custom-file-input">
        <span class="custom-file-control"></span>
    </label>
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <br>
    <br>
    <input type="submit" name="submit" value="Upload">
</form>

<?php
include('./inc/page-end.php');
?>