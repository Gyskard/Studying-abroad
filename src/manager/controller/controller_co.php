<?php

session_start();

require __DIR__ . '/../model/model_co.php';
require __DIR__ . '/../model/model_log.php';

updateLog('load login page', 'anonymous');

require __DIR__ . '/../view/login.php';

if (isset($_POST['user']) and isset($_POST['password'])) {

    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $_SESSION['user'] = $user;

    if (login($user, $password) === true) {
        if (status($user) === false) {
            echo "<script>notActif('show')</script>";
        }
        else {
            $_SESSION['authenticated'] = 1;

            newDate($user);
            updateLog('successful connection', $user);

            header('Location: /../manager/view/index.php');
        }
    }

    else {

        updateLog('failed connection', $user);

        echo "<script>notValid('show')</script>";

    }
}