<?php

session_start();

require __DIR__ . '/model/model_log.php';

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== 1) {

    updateLog('new connection', 'anonymous');

    header('Location: controller/controller_co.php');

}

if ($_SESSION['authenticated'] === 1) {

    updateLog('recovery connection', $_SESSION['user']);

    header('Location: view/index.php');

}