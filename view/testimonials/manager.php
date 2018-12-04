<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Témoignages</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des témoignages</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Crée le</th>
                                        <th>Dernière modif. le</th>
                                        <th>Lieu</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php

                                        foreach ($json_data as $testimonies) {
                                            echo('<tr id="' . $testimonies['id'] . '">');

                                            echo('<td>' . $testimonies['id'] . '</td>');
                                            echo('<td>' . $testimonies['name'] . '</td>');
                                            echo('<td>' . $testimonies['dateCreation'] . '</td>');
                                            echo('<td>' . $testimonies['dateModif'] . '</td>');
                                            echo('<td>' . $testimonies['location'] . '</td>');

                                            if (($testimonies['status'] === 1) or ($testimonies['status'] === "1")) {
                                                echo('<td><div class="badge badge-success">Active</div></td>');
                                            }
                                            else {
                                                echo('<td><div class="badge badge-danger">Désactivé</div></td>');
                                            }

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
                                <button id="actionAdd" class="btn btn-success btn-sm" type="button" aria-haspopup="true" aria-expanded="false">
                                    Ajouter un témoignage
                                </button>
                            </div>
                            <div class="btn-group" style="padding: 0.75em;">
                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Modifier un témoignage
                                </button>
                                <div class="dropdown-menu">
                                    <?php

                                        foreach ($json_data as $testimonies) {
                                            echo('<a class="dropdown-item actionModif" href="#" id="#'. $testimonies['id'] . '">#' . $testimonies['id'] . '</a>');
                                        }

                                    ?>
                                </div>
                            </div>
                            <div class="btn-group" style="padding: 0.75em;">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Supprimer un témoignage
                                </button>
                                <div class="dropdown-menu">
                                    <?php

                                        foreach ($json_data as $testimonies) {
                                            echo('<a class="dropdown-item actionDelete" href="#" id="#'. $testimonies['id'] . '">#' . $testimonies['id'] . '</a>');
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