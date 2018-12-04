<?php

if (!isset($_SESSION['add-photo'])) {
    $_SESSION['add-photo'] = true;
}

if ($_SESSION['add-photo'] === false) {
    $_SESSION['add-photo'] = true;
}

else {
    $_SESSION['add-photo'] = false;
}


//echo '<script type="text/javascript">alert("' . $_SESSION['add-photo'] . '");</script>';

header('location: ../profile.php');