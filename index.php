<?php

session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== 1) {
    header('Location: ../controller/controller_co.php');
}

if ($_SESSION['authenticated'] === 1) {
    header('Location: ../view/index.php');
}