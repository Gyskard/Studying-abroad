<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_unset();
session_destroy();
session_destroy();
setcookie(session_name(), '', 0, '/');
$_SESSION = array();

header('location: ../index.php');