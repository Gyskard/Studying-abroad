<?php

require __DIR__ . '/../controller/controller_ge.php';

$_SESSION['page'] = "testimonials";
$_SESSION['security'] = 1;

require __DIR__ . '/templates/menu.php';
require __DIR__ . '/../security/security_level.php';

if ($access === false || !isset($_GET['id']) || !isset($_GET['type']) ) {
    header('location: index.php');
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
$json_data = json_decode(file_get_contents(__DIR__ . '/../manager/testimonies/testimonies' . $id . '.json'), true);

?>

<link rel="stylesheet" href="../public/manager/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Modification du témoignage #<?= $id ?></div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <form method="GET" action="/view/testimonials/actions.php">
                        <div class="card">
                            <div class="card-header">
                                <h4>Informations techniques</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="hidden" id="id" name="id" value="<?= $id ?>">
                                    <input type="hidden" name="type" value="modif">
                                    <input type="text" class="form-control" placeholder="<?= $id ?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $json_data["latitude"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $json_data["longitude"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="custom-select mb-2 mr-sm-2 mb-sm-0" name="status">
                                        <?php
                                            if ($json_data["status"] === 1) {
                                                echo '<option value="1" selected>Activé</option>';
                                                echo '<option value="0">Désactivé</option>';
                                            }
                                            else {
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
                            <div class="card-header">
                                <h4>Élements</h4>
                            </div>
                            <div class="card-body" id="elements">
                                <?php

                                    foreach ($json_data["elements"] as $element) {
                                        echo '
                                                <div class="form-group">
                                                    <label for="'. $element["name"] . '">' . $element["name"] . '</label>
                                                    <div class="input-group">
                                                        <input type="text" id="'. $element["name"] . '" class="form-control" name="' . $element["name"] . '" value="' . $element["content"] . '" required>
                                                        <div class="input-group-prepend">
                                                            <select class="custom-select">
                                            ';
                                        switch($element["type"]) {
                                            case "text":
                                                echo '<option selected name="typeContent" value="text">Texte</option>';
                                                echo '<option name="typeContent" value="image">Image</option>';
                                                echo '<option name="typeContent" value="video">Vidéo</option>';
                                                break;
                                            case "image":
                                                echo '<option name="typeContent" value="text">Texte</option>';
                                                echo '<option selected name="typeContent" value="image">Image</option>';
                                                echo '<option name="typeContent" value="video">Vidéo</option>';
                                                break;
                                            case "video":
                                                echo '<option name="typeContent" value="text">Texte</option>';
                                                echo '<option name="typeContent" value="image">Image</option>';
                                                echo '<option selected name="typeContent" value="video">Vidéo</option>';
                                                break;
                                        }
                                        echo '
                                                </select>
                                                    </div>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text clickUp ' . $element["name"] . '" style="cursor: pointer;">
                                                            <a class="' . $element["name"] . '">
                                                                <i class="fas fa-arrow-up ' . $element["name"] . '"></i>
                                                            </a>
                                                        </div>
                                                        <div class="input-group-text clickDown" style="cursor: pointer;">
                                                            <a>
                                                                <i class="fas fa-arrow-down"></i>
                                                            </a>
                                                        </div>
                                                        <div class="input-group-text clickDelete" style="cursor: pointer;">
                                                            <a>
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            ';
                                    }
                                
                                ?>
                                <button type="button" id="addElement" class="btn btn-primary btn-sm" style="margin-top: 2em;">Ajouter un élement</button>
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

require __DIR__ . 'templates/footer.html';

?>

</div>
</div>

<script src="../public/manager/modules/jquery.min.js"></script>
<script src="../public/manager/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/manager/js/interactions.js"></script>

</body>
</html>

