<?php

$access = false;

if ($_SESSION['role'] >= $_SESSION['security']) {
    $access = true;
}