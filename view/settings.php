<?php

require __DIR__ . '/../controller/controller_ge.php';

?>

<link rel="stylesheet" href="../public/manager/css/style.css">
</head>

<?php

    $_SESSION['page'] = "settings";
    $_SESSION['security'] = 2;

    require __DIR__ . '/templates/menu.php';
    require __DIR__ . '/../security/security_level.php';

    if ($access === true) {         require __DIR__ . '/settings/settings.html';    }
    else if ($access === false) {   require __DIR__ . '/error/noaccess.html';       }

    require __DIR__ . '/templates/footer.html';

?>

</div>
</div>

<script src="../public/manager/modules/jquery.min.js"></script>
<script src="../public/manager/modules/popper.js"></script>
<script src="../public/manager/modules/tooltip.js"></script>
<script src="../public/manager/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/manager/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="../public/manager/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
<script src="../public/manager/js/sa-functions.js"></script>

<script src="../public/manager/modules/chart.min.js"></script>
<script src="../public/manager/modules/summernote/summernote-lite.js"></script>

<script src="../public/manager/js/scripts.js"></script>
<script src="../public/manager/js/custom.js"></script>

</body>
</html>