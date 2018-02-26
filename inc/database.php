<?php

require_once('db_creds.php');



function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($connection, 'utf8');
    return $connection;
}

function db_disconnect($connection) {
    if (isset($connection)) {
        mysqli_close($connection);
    }
}


