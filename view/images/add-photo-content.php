<?php

if (!isset($_FILES['userfile'])) {
    if ($_FILES['userfile']['type'] === 'image/png') {
        require __DIR__ . '/../profile.php';
        echo '<script type="text/javascript">errorImage();</script>';
    }
}

echo '<script type="text/javascript">alert("' . $_FILES['userfile']['size'] . '");</script>';



if ($_FILES['userfile']['size'] > 3000000) {
    echo("test");
}