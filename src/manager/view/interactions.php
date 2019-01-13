<?php

require __DIR__ . '/../controller/controller_ge.php';
$_SESSION['page'] = "testimonials";
$_SESSION['security'] = 1;
require __DIR__ . '/../security/security_level.php';
/*======*/
if ($access === false || !isset($_GET['id']) || !isset($_GET['type']) ) {
    header('location: index.php');
}
/*======*/
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
if ($type === "modif" || $type === "delete") {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $json_data = json_decode(file_get_contents(__DIR__ . '/../manager/testimonies/testimonies' . $id . '.json'), true);
}
else if ($type === "modifUser" || $type === "deleteUser") {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
}

?>

<?php if ($type === "modif"):

    $_SESSION['page'] = "testimonials";
    require __DIR__ . '/templates/menu.php';

?>

<link rel="stylesheet" href="../public/manager/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link rel=icon href="../public/login/img/earth.png" type="image/png">
</head>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Modification du témoignage #<?= $id ?></div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <form method="POST" action="../view/actions.php">
                        <div class="card">
                            <div class="card-header">
                                <h4>Informations techniques</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="hidden" id="id" name="id" value="<?= $id ?>">
                                    <input type="hidden" name="type" value="modif">
                                    <input type="hidden" id="html" name="html" value="">
                                    <input type="text" class="form-control" placeholder="<?= $id ?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Longitude</label>
                                    <input type="text" class="form-control" id="latitude" name="longitude" value="<?= $json_data["longitude"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Latitude</label>
                                    <input type="text" class="form-control" id="longitude" name="latitude" value="<?= $json_data["latitude"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="custom-select mb-2 mr-sm-2 mb-sm-0" name="status">
                                        <?php
                                            if ($json_data["status"] === 1 || $json_data["status"] === "1") {
                                                echo '<option value="1" selected>Activé</option>';
                                                echo '<option value="0">Désactivé</option>';
                                            }
                                            else if ($json_data["status"] === 0 || $json_data["status"] === "0") {
                                                echo '<option value="1">Activé</option>';
                                                echo '<option value="0" selected>Désactivé</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Informations publiques</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Titre</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= $json_data["title"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="witnessesName">Prénom</label>
                                    <input type="text" class="form-control" id="witnessesName" name="witnessesName" value="<?= $json_data["witnessesName"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="witnessesLastName">Nom</label>
                                    <input type="text" class="form-control" id="witnessesLastName" name="witnessesLastName" value="<?= $json_data["witnessesLastName"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="country">Pays</label>
                                    <input type="text" id="country" class="form-control" name="country" value="<?= $json_data["country"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="region">Région</label>
                                    <input type="text" id="region" class="form-control" name="region" value="<?= $json_data["region"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="city">Ville</label>
                                    <input type="text" id="city" class="form-control" name="city" value="<?= $json_data["city"] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="oldText" style="display: none;">
                                <?php

                                print_r($json_data["elements"]);

                                ?>
                            </div>
                            <div class="card-header">
                                <h4>Élements</h4>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div id="toolbar">
                                        <select class="ql-size">
                                            <option value="small">Petit</option>
                                            <option selected="">Moyen</option>
                                            <option value="large">Grand</option>
                                            <option value="huge">Très grand</option>
                                        </select>
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                    </div>
                                    <div id="editor" style="min-height: 8em"></div>
                                    <div style="padding-top: 2em;">
                                        <p>
                                            <strong>Il faut <a style="color: red; font-weight: bold;">OBLIGATOIREMENT</a> mettre une balise [ol] et une balise [/ol] séparé d'au moins une ligne vide, et <a style="color: red; font-weight: bold;">APRÈS</a> une balise [fr] et une balise [/fr] avec aussi une ligne vide. Si vous ne voulez pas mettre de témoignages en langue originale ou en français, laissez l'espace entre les balises vides.</strong>
                                        </p>
                                        <hr>
                                        <p>
                                            <strong style="font-size: 1.3em; text-decoration: underline">Texte en langue d'origine autre que le français : <br/><br/></strong>[ol]<br/><br/><i> témoignage en langue original </i><br/><br/>[/ol]
                                            <br/><br/>
                                            <strong style="font-size: 1.3em; text-decoration: underline">Texte en français : <br><br></strong>[fr]<br><br><i> témoignage en français </i><br><br>[/fr]
                                            <br/><br/>
                                            <strong style="font-size: 1.3em; text-decoration: underline">Ajouter une image <a style="color: red">(laisser une ligne vide au-dessus et en-dessous, ne pas en mettre à entre des balises de textes)</a> : </strong><br/><br/>[img]<i> url de l'image</i> [/img]
                                            <br/><br/>
                                            <strong style="font-size: 1.3em; text-decoration: underline">Ajouter une vidéo YouTube <a style="color: red">(laisser une ligne vide au-dessus et en-dessous, ne pas en mettre à entre des balises de textes)</a> : </strong><br/><br/>[YT]<i> lien contenu dans le code d'intégration (<a href="https://image.noelshack.com/fichiers/2019/01/4/1546513414-tuto.png" onclick="window.open(this.href); return false;">image d'explication</a>)</i> [/YT]
                                        </p>
                                        <hr>
                                        <p>
                                            <strong style="font-size: 1.3em; text-decoration: underline">Exemple :</strong>
                                            <br/><br/>
                                            [YT] https://www.youtube.com/embed/FGjkPFHYb1I [/YT]
                                            <br/><br/>
                                            [ol]
                                            <br/><br/>
                                            <strong>How is life in this city going?</strong>
                                            <br/>
                                            Pretty well. The strikes are a bit disheartening though.
                                            <br/><br/>
                                            [/ol]
                                            <br/><br/>
                                            [fr]
                                            <br/><br/>
                                            <strong>Comment est la vie dans cette ville?</strong>
                                            <br/>
                                            L'ambiance est assez bonne, cependant les manifestations sont parfois décourageantes.
                                            <br/><br/>
                                            [/fr]
                                            <br/><br/>
                                            [img]https://img.lemde.fr/2017/03/17/0/0/1460/927/688/0/60/0/06986c8_1045-1bjwo2e.u45ebz9f6r.jpg[/img]
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info" style="margin-bottom: 2.5em;">Modifier le témoignage #<?= $id ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?
    require __DIR__ . '/templates/footer.html';
?>

</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="../public/manager/js/scripts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="../public/manager/js/interactions.js"></script>

</body>
</html>

<?php elseif ($type === "add"): ?>

    <?php

        $json_data = json_decode(file_get_contents(__DIR__ . '/../manager/testimonies/index.json'), true);
        $numberElement = count($json_data);
        echo($json_data);
        echo($numberElement);

    ?>

<?php elseif ($type === "delete"):

    $_SESSION['page'] = "testimonials";
    require __DIR__ . '/templates/menu.php';

?>

    <link rel="stylesheet" href="../public/manager/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>

    <div class="main-content">
        <section class="section">
            <h1 class="section-header">
                <div>Suppression du témoignage #<?= $id ?></div>
            </h1>
            <div class="section-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="../view/actions.php">
                            <input type="hidden" id="id" name="id" value="<?= $id ?>">
                            <input type="hidden" name="type" value="delete">
                            <div class="card">
                                <div class="card-body">
                                    <p style="font-size: 1.5em; color: red;">Attention, cette action est irréversible!</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger" style="margin-bottom: 2.5em;">Supprimer le témoignage #<?= $id ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?
    require __DIR__ . '/templates/footer.html';
    ?>

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="../public/manager/js/scripts.js"></script>
    <script src="../public/manager/js/interactions.js"></script>

    </body>
    </html>

<?php elseif ($type === "modifUser"):

    $_SESSION['page'] = "settings";
    require __DIR__ . '/templates/menu.php';

?>

    <?php if ($_SESSION['user'] === $id): ?>

        <link rel="stylesheet" href="../public/manager/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        </head>

        <div class="main-content">
            <section class="section">
                <h1 class="section-header">
                    <div>Modification de l'utilisateur <?= $id ?></div>
                </h1>
                <div class="section-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="../view/settings.php">
                                <div class="card">
                                    <div class="card-body">
                                        <p style="font-size: 1.5em; color: red;">Vous ne pouvez pas modifier votre propre compte!</p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 2.5em;">Retourner aux paramètres</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?
        require __DIR__ . '/templates/footer.html';
        ?>

        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="../public/manager/js/scripts.js"></script>
        <script src="../public/manager/js/interactions.js"></script>

        </body>
        </html>

    <?php else:

        $user = bddVerif('allInfoUser', $id)

    ?>

        <link rel="stylesheet" href="../public/manager/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">

        </head>

        <div class="main-content">
            <section class="section">
                <h1 class="section-header">
                    <div>Modification de l'utilisateur <?= $id ?></div>
                </h1>
                <div class="section-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="../view/actions.php">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Informations</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="login">Nom</label>
                                            <input type="hidden" name="type" value="modifUser">
                                            <input type="hidden" name="lastLogin" value="<?= $id ?>">
                                            <input type="text" id="login" name="login" class="form-control" value="<?= $id ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="mdp">Nouveau mot de passe</label>
                                            <input type="password" id="mdp" name="mdp" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Rôle</label>
                                            <select id="role" class="custom-select mb-2 mr-sm-2 mb-sm-0" name="role">
                                                <?php
                                                    if ($user["role"] === 2 || $user["role"] === "2") {
                                                        echo '<option value="2" selected>Administrateur</option>';
                                                        echo '<option value="1">Utilisateur</option>';
                                                        echo '<option value="0">Visiteur</option>';
                                                    }
                                                    else if ($user["role"] === 1 || $user["role"] === "1") {
                                                        echo '<option value="2">Administrateur</option>';
                                                        echo '<option value="1" selected>Utilisateur</option>';
                                                        echo '<option value="0">Visiteur</option>';
                                                    }
                                                    else if ($user["role"] === 0 || $user["role"] === "0") {
                                                        echo '<option value="2">Administrateur</option>';
                                                        echo '<option value="1">Utilisateur</option>';
                                                        echo '<option value="0" selected>Visiteur</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" class="custom-select mb-2 mr-sm-2 mb-sm-0" name="status">
                                                <?php
                                                    if ($user["status"] === 1 || $user["status"] === "1") {
                                                        echo '<option value="1" selected>Activé</option>';
                                                        echo '<option value="0">Désactivé</option>';
                                                    }
                                                    else if ($user["status"] === 0 || $user["status"] === "0") {
                                                        echo '<option value="1" >Activé</option>';
                                                        echo '<option value="0" selected>Désactivé</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info" style="margin-bottom: 2.5em;">Modifier l'utilisateur <?= $id ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?
        require __DIR__ . '/templates/footer.html';
        ?>

        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="../public/manager/js/scripts.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
        </body>
        </html>

    <?php endif ?>

<?php elseif ($type === "deleteUser"):

    $_SESSION['page'] = "settings";
    require __DIR__ . '/templates/menu.php';

?>

    <link rel="stylesheet" href="../public/manager/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>

    <div class="main-content">
        <section class="section">
            <h1 class="section-header">
                <div>Suppression de l'utilisateur <?= $id ?></div>
            </h1>
            <div class="section-body">
                <div class="row">
                    <div class="col">
                        <?php if ($_SESSION['user'] === $id): ?>
                            <form method="POST" action="../view/settings.php">
                                <div class="card">
                                    <div class="card-body">
                                        <p style="font-size: 1.5em; color: red;">Vous ne pouvez pas supprimer votre propre compte!</p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 2.5em;">Retourner aux paramètres</button>
                            </form>
                        <?php else: ?>
                            <form method="POST" action="../view/actions.php">
                                <input type="hidden" id="id" name="id" value="<?= $id ?>">
                                <input type="hidden" name="type" value="deleteUser">
                                <div class="card">
                                    <div class="card-body">
                                        <p style="font-size: 1.5em; color: red;">Attention, cette action est irréversible!</p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 2.5em;">Supprimer l'utilisateur <?= $id ?></button>
                            </form>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?
    require __DIR__ . '/templates/footer.html';
    ?>

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="../public/manager/js/scripts.js"></script>

    </body>
    </html>

<?php endif ?>

