<?php

$row = bddVerif('role', $_SESSION['user']);
$_SESSION['role'] = $row['role'];
$_SESSION['roleShow'] = showRole($_SESSION['role']);
$_SESSION['image'] = imageUser($_SESSION['user']);