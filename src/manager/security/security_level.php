<?php

$access = false;

if ($_SESSION['role'] >= $_SESSION['security']) {
    $access = true;
}

else {
    $_SESSION['access'] = 'no';
    header('location: index.php');
}