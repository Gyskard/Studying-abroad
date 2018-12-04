<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['authenticated'] !== 1) {
    header('location: ../index.php');
}