<?php

require __DIR__ . '/../controller/controller_ge.php';

?>

<link rel="stylesheet" href="../public/manager/css/style.css">
<link rel=icon href="../public/login/img/earth.png" type="image/png">
</head>

<?php

    $_SESSION['page'] = "settings";
    $_SESSION['security'] = 2;

    require __DIR__ . '/../security/security_level.php';

    require __DIR__ . '/../security/security_level.php';

    require __DIR__ . '/../model/model_log.php';

    updateLog('load settings page', $_SESSION['user']);

    require __DIR__ . '/templates/menu.php';

    $users = bddVerif('users', '');

?>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Paramètres</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des utilisateurs</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Rôle</th>
                                        <th>Dernière connexion</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php

                                    foreach ($users as $user) {
                                        echo('<tr>');
                                        //======================================================================
                                        echo('    <td>' . $user['login'] . '</td>');
                                        //======================================================================
                                        if ($user['role'] === "2") {
                                            echo('<td>Administrateur</td>');
                                        }
                                        else if ($user['role'] === "1") {
                                            echo('<td>Utilisateur</td>');
                                        }
                                        else if ($user['role'] === "0") {
                                            echo('<td>Visiteur</td>');
                                        }
                                        //======================================================================
                                        echo('    <td class="date">' . $user['lastCo'] . '</td>');
                                        //======================================================================
                                        if ($user['status'] === "1") {
                                            echo('<td><div class="badge badge-success">Activé</div></td>');
                                        }
                                        else {
                                            echo('<td><div class="badge badge-danger">Désactivé</div></td>');
                                        }
                                        //======================================================================
                                        echo('</tr>');
                                    }

                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Actions</h4>
                        </div>
                        <div class="card-body" style="display: flex; flex-direction: column;">
                            <div class="btn-group" style="padding: 0.75em;">
                                <a class="btn btn-success btn-sm" href="actions.php?type=addUser" role="button">Ajouter un utilisateur</a>
                            </div>
                            <div class="btn-group" style="padding: 0.75em;">
                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Modifier un utilisateur
                                </button>
                                <div class="dropdown-menu">
                                    <?php
                                    foreach ($users as $user) {
                                        echo('<a class="dropdown-item"  href="interactions.php?id=' . $user['login'] . '&type=modifUser">' . $user['login'] . '</a>');
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="btn-group" style="padding: 0.75em;">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Supprimer un utilisateur
                                </button>
                                <div class="dropdown-menu">
                                    <?php
                                        foreach ($users as $user) {
                                            echo('<a class="dropdown-item"  href="interactions.php?id=' . $user['login'] . '&type=deleteUser">' . $user['login'] . '</a>');
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div id="action" style="display: none;">
                        </div>
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
<script src="../public/manager/js/settings.js"></script>

</body>
</html>