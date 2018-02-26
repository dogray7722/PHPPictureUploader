<?php
ob_start();
session_start();
require_once('database.php');
$db = db_connect();