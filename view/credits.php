<?php

require __DIR__ . '/../controller/controller_ge.php';

?>

  <link rel="stylesheet" href="../public/manager/css/style.css">
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
                          <h6>Gestionnaire de témoignages</h6>
                          <p>Thomas Margueritat</p>
                        </div>
                      </li>
                      <li class="media">
                          <div class="media-icon"><i class="ion ion-android-add-circle"></i></div>
                          <div class="media-body">
                              <h6>Site web public</h6>
                              <p>Guillaume Barnéoud & Thomas Margueritat</p>
                          </div>
                      </li>
                      <li class="media">
                          <div class="media-icon"><i class="ion ion-android-add-circle"></i></div>
                          <div class="media-body">
                              <h6>Tournage et montage des témoignages</h6>
                              <p>Victor Breton & Grégoire Durant</p>
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

  <script src="../public/manager/modules/jquery.min.js"></script>
  <script src="../public/manager/modules/popper.js"></script>
  <script src="../public/manager/modules/tooltip.js"></script>
  <script src="../public/manager/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../public/manager/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../public/manager/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="../public/manager/js/sa-functions.js"></script>

  <script src="../public/manager/js/scripts.js"></script>
  <script src="../public/manager/js/custom.js"></script>
</body>
</html>