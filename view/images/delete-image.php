<?php

require __DIR__ . '/../../security/security_agent.php';

$erreur = unlink(__DIR__ . '/../../public/manager/img/avatar/' . $_SESSION['user'] . '.png');
$_SESSION['image'] = '../public/manager/img/avatar/default-profil.png';

header('location: ../profile.php');