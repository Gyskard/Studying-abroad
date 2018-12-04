<?php

function numberFiles($path)
{
    return iterator_count(new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/..' . $path))) - 3;
}


function showRole($number) {

    if ($number === "1") {
        return "Utilisateur";
    }

    else if ($number === "2") {
        return "Administrateur";
    }

    return "Visiteur";

}

function imageUser($user) {

    if (file_exists('../public/manager/img/avatar/' . $user . '.png')) {
        return '../public/manager/img/avatar/' . $user . '.png';
    }

    else {
        return '../public/manager/img/avatar/default-profil.png';
    }

}

function deleteImage($user) {

    if (file_exists('../public/manager/img/avatar/' . $user . '.png')) {
        unlink('../public/manager/img/avatar/' . $user . '.png');
    }

}