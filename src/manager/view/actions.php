<?php

//======================================================================================================================
function verifPost($elm)
{
    return filter_input(INPUT_POST, $elm, FILTER_SANITIZE_SPECIAL_CHARS);
}
//======================================================================================================================
require __DIR__ . '/../controller/controller_ge.php';
$_SESSION['security'] = 1;
require __DIR__ . '/../security/security_level.php';
//======================================================================================================================
if ($access === true)
{
    require __DIR__ . '/../model/model_log.php';
    if (isset($_POST['type']))
    {
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($type === 'modif')
        {
            if (isset($_POST['id'])
            && isset($_POST['latitude'])
            && isset($_POST['longitude'])
            && isset($_POST['status'])
            && isset($_POST['title'])
            && isset($_POST['witnessesName'])
            && isset($_POST['witnessesLastName'])
            && isset($_POST['country'])
            && isset($_POST['region'])
            && isset($_POST['city'])
            && isset($_POST['html']))
            {
                $id = verifPost('id');
                $latitude = verifPost('latitude');
                $longitude = verifPost('longitude');
                $status = verifPost('status');
                $title = verifPost('title');
                $witnessesName = verifPost('witnessesName');
                $witnessesLastName = verifPost('witnessesLastName');
                $country = verifPost('country');
                $region = verifPost('region');
                $city = verifPost('city');
                $html = verifPost('html');
                /*======*/
                $json_data = json_decode(file_get_contents(__DIR__ . '/../manager/testimonies/index.json'), true);
                $json_data["testimonies" . $id]["id"] = $id;
                $json_data["testimonies" . $id]["name"] = $title;
                $json_data["testimonies" . $id]["dateModif"] = date('d-m-Y');
                $json_data["testimonies" . $id]["location"] = $city . ', ' . $region . ', ' . $country;
                $json_data["testimonies" . $id]["longitude"] = $longitude;
                $json_data["testimonies" . $id]["latitude"] = $latitude;
                $json_data["testimonies" . $id]["status"] = $status;
                $fp = fopen(__DIR__ . '/../manager/testimonies/index.json', 'w');
                fwrite($fp, json_encode($json_data));
                fclose($fp);
                /*======*/
                $json_data = json_decode(file_get_contents(__DIR__ . '/../manager/testimonies/testimonies' . $id . '.json'), true);
                $json_data["title"] = $title;
                $json_data["status"] = $status;
                $json_data["witnessesName"] = $witnessesName;
                $json_data["witnessesLastName"] = $witnessesLastName;
                $json_data["country"] = $country;
                $json_data["region"] = $region;
                $json_data["city"] = $city;
                $json_data["latitude"] = $latitude;
                $json_data["longitude"] = $longitude;
                $json_data["elements"] = $html;
                $fp = fopen(__DIR__ . '/../manager/testimonies/testimonies' . $id . '.json', 'w');
                fwrite($fp, json_encode($json_data));
                fclose($fp);
                updateLog('modify testimony (number ' . $id . ')', $_SESSION['user']);
            }
            header('Location: testimonials.php');
        }
        else if ($type === "delete")
        {
            if (isset($_POST['id']))
            {
                $id = verifPost('id');
                /*======*/
                unlink(__DIR__ . '/../manager/testimonies/testimonies' . $id . '.json');
                /*======*/
                $json_data = json_decode(file_get_contents(__DIR__ . '/../manager/testimonies/index.json'), true);
                unset($json_data["testimonies" . $id]);
                $fp = fopen(__DIR__ . '/../manager/testimonies/index.json', 'w');
                fwrite($fp, json_encode($json_data));
                fclose($fp);
                updateLog('delete testimony (number ' . $id . ')', $_SESSION['user']);
            }
            header('Location: testimonials.php');
        }
        else if ($type === "modifUser")
        {
            if (isset($_POST['lastLogin']))
            {
                $lastLogin = filter_input(INPUT_POST, 'lastLogin', FILTER_SANITIZE_SPECIAL_CHARS);
                $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
                $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_SPECIAL_CHARS);
                $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);
                $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
                if ($mdp !== '') {
                    newMDP($lastLogin, $mdp);
                }
                newRole($lastLogin, intval($role));
                newStatus($lastLogin, intval($status));
                if ($lastLogin !== $login) {
                    $users = bddVerif('users', '');
                    $userExit = false;
                    foreach ($users as $user) {
                        if ($user['login'] === $login) {
                            $userExit = true;
                        }
                    }
                    if ($userExit === false) {
                        newLogin($lastLogin, $login);
                    }
                }
            }
            header('Location: settings.php');
        }
        else if ($type === "deleteUser")
        {
            if (isset($_POST['id']))
            {
                $type = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                deleteUser($type);
                header('Location: settings.php');
            }
        }
    }
    else if (isset($_GET['type']))
    {
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($type === "add")
        {
            $json_data = json_decode(file_get_contents(__DIR__ . '/../manager/testimonies/index.json'), true);
            $idMax = 1;
            foreach($json_data as $elements)
            {
                if (intval($elements['id']) > $idMax - 1)
                {
                    $idMax = intval($elements['id']) + 1;
                }
            }
            $json_data["testimonies" . $idMax]["id"] = strval($idMax);
            $json_data["testimonies" . $idMax]["name"] = "nom";
            $json_data["testimonies" . $idMax]["dateCreation"] = date('d-m-Y');
            $json_data["testimonies" . $idMax]["dateModif"] = date('d-m-Y');
            $json_data["testimonies" . $idMax]["location"] = "localisation";
            $json_data["testimonies" . $idMax]["dateModif"] = date('d-m-Y');
            $json_data["testimonies" . $idMax]["status"] = "0";
            $json_data["testimonies" . $idMax]["longitude"] = "0";
            $json_data["testimonies" . $idMax]["latitude"] = "0";
            $fp = fopen(__DIR__ . '/../manager/testimonies/index.json', 'w');
            fwrite($fp, json_encode($json_data));
            fclose($fp);
            /*======*/
            $json_data = array();
            $json_data["title"] = "titre";
            $json_data["status"] = "0";
            $json_data["witnessesLastName"] = "nom";
            $json_data["witnessesName"] = "prenom";
            $json_data["country"] = "pays";
            $json_data["region"] = "region";
            $json_data["city"] = "ville";
            $json_data["latitude"] = "0";
            $json_data["longitude"] = "0";
            $json_data["elements"] = "";
            $fp = fopen(__DIR__ . '/../manager/testimonies/testimonies' . $idMax . '.json', 'w');
            fwrite($fp, json_encode($json_data));
            fclose($fp);
            updateLog('add new testimony (number ' . $idMax . ')', $_SESSION['user']);
            header('Location: testimonials.php');
        }
        else if ($type === "addUser") {
            adduser();
            header('Location: settings.php');
        }
    }
}