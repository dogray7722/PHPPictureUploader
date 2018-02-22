<?php
require_once('initialize.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="sessiontester2/index.php">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>PHP Project</title>
</head>
<body>

<?php

if(!isset($_SESSION['loggedin'])) {

    print
        "<nav class='navbar nav navbar-expand-lg navbar-light bg-inverse'>
            <ul class='nav'>
                <li class='nav-item'>
                    <a class='nav-link active' href='../index.php'>Login</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../index.php'>About</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='https://github.com/dogray7722'>GitHub</a>
                </li>
               </ul>
        </nav>";
} else {
    print
        "<nav class='navbar nav navbar-expand-lg navbar-light bg-inverse'>
            <ul class='nav'>
                <li class='nav-item'>
                    <a class='nav-link active' href='../logout.php'>Logout</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='../upload.php'>Upload</a>
                </li>
                 <li class='nav-item'>
                    <a class='nav-link active' href='../view.php'>View</a>
                </li>
            </ul>
        </nav>";
    }
?>
<br>
<div class='container-fluid'>
    <header class='p-2 mb-2 bg-success text-gray-dark col-5 rounded'>
        <h1 class='display-4' >Picture Uploader</h1>
    </header>
<!--page begin-->