<?php

include('./inc/page-begin.php');

?>

<div class="container-fluid page-wrap">
    <form action="/sessiontester2/livesession.php" method="post">


<?php print "<h3>Hello, " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "!</h3><br />";
date_default_timezone_set('America/Denver');
print "<h3>You have been logged in since " . date('g:i a', $_SESSION['loggedin']) . " MST.</h3>";
?>

    <h4>Since you're here, why not <a href="/sessiontester2/upload.php">upload</a> some photos?</h4>
    <br>
    </form>
</div>

<?php
include('./inc/page-end.php');
?>