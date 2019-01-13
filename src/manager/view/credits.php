<?php

require __DIR__ . '/../controller/controller_ge.php';
require __DIR__ . '/../model/model_log.php';

updateLog('load credits page', $_SESSION['user']);

?>

<link rel="stylesheet" href="../public/manager/css/style.css">
<link rel=icon href="../public/login/img/earth.png" type="image/png">
</head>

<?php

$_SESSION['page'] = "credits";
require __DIR__ . '/templates/menu.php';

?>

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Crédits</div>
          </h1>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                      Voici les personnes ayant participé à la réalisation de ce projet.
                      <div class="list-unstyled list-unstyled-border mt-4">
                      <li class="media">
                          <div class="media-icon"><i class="ion ion-android-add-circle"></i></div>
                          <div class="media-body">
                              <p><strong>Responsable du projet</strong><br>Lorraine Goeuriot</p>
                          </div>
                      </li>
                      <li class="media">
                        <div class="media-icon"><i class="ion ion-android-add-circle"></i></div>
                        <div class="media-body">
                            <p><strong>Gestionnaire de témoignages</strong><br>Thomas Margueritat</p>
                        </div>
                      </li>
                      <li class="media">
                          <div class="media-icon"><i class="ion ion-android-add-circle"></i></div>
                          <div class="media-body">
                              <p><strong>Site web public</strong><br>Thomas Margueritat & Guillaume Barnéoud</p>
                          </div>
                      </li>
                      <li class="media">
                          <div class="media-icon"><i class="ion ion-android-add-circle"></i></div>
                          <div class="media-body">
                              <p><strong>Tournage et montage des vidéos de témoignages</strong><br>Victor Breton & Grégoire Durant</p>
                          </div>
                      </li>
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

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
  <script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js"></script>
  <script src="../public/manager/js/scripts.js"></script>
</body>
</html>