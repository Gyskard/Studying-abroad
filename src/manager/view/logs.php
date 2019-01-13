<?php

require __DIR__ . '/../controller/controller_ge.php';

?>

<link rel="stylesheet" href="../public/manager/css/style.css">
<link rel=icon href="../public/login/img/earth.png" type="image/png">
</head>

<?php

    $_SESSION['page'] = "logs";
    $_SESSION['security'] = 2;

    require __DIR__ . '/../security/security_level.php';

    if ($access === false) {
        header('location: index.php');
    }

    require __DIR__ . '/../model/model_log.php';

    updateLog('load logs page', $_SESSION['user']);

    require __DIR__ . '/templates/menu.php';

?>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Logs</div>
        </h1>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Date</label>
                        </div>
                        <select class="custom-select" id="date">
                            <?php

                                $logs = scandir(__DIR__ . '/../log/');
                                unset($logs[0]);
                                unset($logs[1]);
                                usort($logs, "sortDateLog");
                                $first = true;

                                foreach ($logs as $logFiles) {
                                    $logFiles = substr($logFiles, 0, -4);
                                    if ($first === true) {
                                        echo('<option selected>' . $logFiles . '</option>');
                                        $first = false;
                                    }
                                    else {
                                        echo('<option>' . $logFiles . '</option>');
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Heure</th>
                                    <th>IP</th>
                                    <th>Utilisateur</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="action">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <?php require __DIR__ . '/templates/footer.html'; ?>

</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="../public/manager/js/scripts.js"></script>
<script src="../public/manager/js/logs.js"></script>

</body>
</html>