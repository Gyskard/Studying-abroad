<?php

require __DIR__ . '/../../controller/controller_ge.php';

$_SESSION['security'] = 1;

require __DIR__ . '/../../security/security_level.php';

if ($access === false) {
    header('location: ' . __DIR__ . '../../index.php');
}

else if ($access === true) {

}