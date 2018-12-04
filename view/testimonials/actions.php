<?php

require __DIR__ . '/../../controller/controller_ge.php';

$_SESSION['security'] = 1;

require __DIR__ . '/../../security/security_level.php';

if ($access === false) {
    require __DIR__ . '/../error/noaccess.html';
}

else if ($access === true) {

    if (isset($_POST['type'])) {

        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

        if (($type === 'delete') and (isset($_POST['id']))) {

            $number = substr(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS), 1);
            unlink(__DIR__ . '/../../manager/testimonies/testimonies' . $number . '.json');

            $json_data = json_decode(file_get_contents(__DIR__ . '/../../manager/testimonies/index.json'), true);
            unset($json_data['testimonies' . $number]);

            $fp = fopen(__DIR__. '/../../manager/testimonies/index.json', 'w');
            fwrite($fp, json_encode($json_data));
            fclose($fp);

        }

        if ((($type === 'add') or ($type === 'modif')) and (isset($_POST['id'])) and (isset($_POST['name'])) and (isset($_POST['location'])) and (isset($_POST['status']))) {

            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($type === 'add') {
                fopen(__DIR__ . '/../../manager/testimonies/testimonies' . $id . '.json', 'w');
            }

            $json_data = json_decode(file_get_contents(__DIR__ . '/../../manager/testimonies/index.json'), true);

            $json_data["testimonies" . $id]["id"] = $id;
            $json_data["testimonies" . $id]["name"] = $name;
            $json_data["testimonies" . $id]["dateModif"] = date('d-m-Y');
            $json_data["testimonies" . $id]["location"] = $location;
            $json_data["testimonies" . $id]["status"] = $status;

            if ($type === 'add') {
                $json_data["testimonies" . $id]["dateCreation"] = date('d-m-Y');
            }

            $fp = fopen(__DIR__. '/../../manager/testimonies/index.json', 'w');
            fwrite($fp, json_encode($json_data));
            fclose($fp);

        }

    }

    /*

    else if (isset($_GET['id'])) {

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $json_data = json_decode(file_get_contents(__DIR__ . '/../../manager/testimonies/testimonies' . $id . '.json'), true);
        $count = count($json_data["elements"]) + 1;
        $json_data["elements"]["element" . $count]["type"] = "text";
        $json_data["elements"]["element" . $count]["name"] = "element" . $count;
        $json_data["elements"]["element" . $count]["content"] = "blop";
        $json_data["elements"]["element" . $count]["position"] = $count;
        $fp = fopen(__DIR__ . '/../../manager/testimonies/testimonies' . $id . '.json', 'w');
        fwrite($fp, json_encode($json_data));
        fclose($fp);
        header('Location: ../testimonials.php?id=' . $id);

    }


    else {

        header('Location: ../testimonials.php');

    }

    */
}