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

function random_str($type = 'alphanum', $length = 8) {
    //source code => https://gist.github.com/irazasyed/5382685
    switch($type)
    {
        case 'basic'    : return mt_rand();
            break;
        case 'alpha'    :
        case 'alphanum' :
        case 'num'      :
        case 'nozero'   :
            $seedings             = array();
            $seedings['alpha']    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $seedings['alphanum'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $seedings['num']      = '0123456789';
            $seedings['nozero']   = '123456789';

            $pool = $seedings[$type];

            $str = '';
            for ($i=0; $i < $length; $i++)
            {
                $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
            }
            return $str;
            break;
        case 'unique'   :
        case 'md5'      :
            return md5(uniqid(mt_rand()));
            break;
    }
    return false;
}