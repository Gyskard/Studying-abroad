<?php

session_start();

require __DIR__ . '/../model/model_co.php';
require __DIR__ . '/../view/login.php';

if (isset($_POST['user']) and isset($_POST['password'])) {

    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    if (login($user, $password) === true) {
        $_SESSION['authenticated'] = 1;
        $_SESSION['user'] = $user;

        header('Location: ../index.php');

    }

    else {
        echo "<script>notValid('show')</script>";
    }

}