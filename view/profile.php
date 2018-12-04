<?php

require __DIR__ . '/../controller/controller_ge.php';

?>

<link rel="stylesheet" href="../public/manager/css/style.css">
</head>

<?php

$_SESSION['page'] = "profile";
require __DIR__ . '/templates/menu.php';

?>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Profil</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Informations générales</h4>
                            <dl class="row" style="padding-left: 5em; padding-top: 1em;">
                                <dt class="col-sm-3">Nom d'utilisateur</dt>
                                <dd class="col-sm-9"><?= $_SESSION['user'] ?></dd>

                                <dt class="col-sm-3">Rôle</dt>
                                <dd class="col-sm-9"><?= $_SESSION['roleShow'] ?></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4>Photo de profil</h4>
                            <div class="row" style="padding-left: 3em; padding-top: 1em;">
                                <h5>Actuelle</h5>
                                <div class="col-12">
                                    <div class="text-center">
                                        <img alt="image" src="<?= $_SESSION['image'] ?>" height="150px" width="150px">
                                        <br>
                                        <a href="images/delete-image.php" class="btn btn-sm btn-secondary" style="margin-top: 1em;">Supprimer cette image</a>
                                    </div>
                                </div>
                                <h5 style="padding-top: 3em;">Nouvelle</h5>
                                <div class="col-12" >
                                    <div class="text-center">
                                        <form enctype="multipart/form-data" action="" method="post">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                            <input name="userfile" type="file" />
                                            <br>
                                            <input id="sendImage" type="submit" value="Envoyer l'image" style="margin-top: 1em;"/>
                                        </form>
                                        <p id="errorMsgImage" style="color: #d33333; margin-top: 1.5em; font-weight: bold; display: none;">L'image n'est pas conforme.</p>
                                    </div>
                                </div>
                            </div>
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

<script src="../public/manager/modules/jquery.min.js"></script>
<script src="../public/manager/modules/popper.js"></script>
<script src="../public/manager/modules/tooltip.js"></script>
<script src="../public/manager/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/manager/modules/bootstrap/confirmation/bootstrap-confirmation.min.js"></script>

<script src="../public/manager/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="../public/manager/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
<script src="../public/manager/js/sa-functions.js"></script>

<script src="../public/manager/js/scripts.js"></script>
<script src="../public/manager/js/custom.js"></script>

<script src="../public/manager/js/profile.js"></script>
</body>
</html>