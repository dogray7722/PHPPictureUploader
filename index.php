<?php
include('./inc/page-begin.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ( (!empty($_POST['firstname'])) && (!empty($_POST['lastname']))) {

        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['loggedin'] = time();

        header("Location: livesession.php");
        exit();

    } else {
        print '<p class="text-danger">Please enter both a first and last name!</p>';
    }
}
?>

<h2>Enter your first and last name below:</h2>
    <form action="/PHPPictureUploader/index.php" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">First Name:</label>
            <div class="col-4">
                <input type="text" class="form-control" name="firstname" id="formGroupExampleInput">
            </div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Last Name:</label>
            <div class="col-4">
                <input type="text" class="form-control" name="lastname" id="formGroupExampleInput2">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
</form>

<?php
include('./inc/page-end.php');
?>