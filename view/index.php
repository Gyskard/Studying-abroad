<?php

require __DIR__ . '/../controller/controller_ge.php';

?>

<link rel="stylesheet" href="../public/manager/css/style.css">

</head>


<?php

$_SESSION['page'] = "index";
require __DIR__ . '/templates/menu.php';

?>

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Tableau de bord</div>
          </h1>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-primary">
                  <i class="ion ion-person"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Admins</h4>
                  </div>
                  <div class="card-body">
                      <?= $_SESSION['numberAdmin'] ?>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-lg-3 col-md-6 col-12">
                  <div class="card card-sm-3">
                      <div class="card-icon bg-primary">
                          <i class="ion ion-person"></i>
                      </div>
                      <div class="card-wrap">
                          <div class="card-header">
                              <h4>Utilisateurs</h4>
                          </div>
                          <div class="card-body">
                              <?= $_SESSION['numberUser'] ?>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-12">
                  <div class="card card-sm-3">
                      <div class="card-icon bg-primary">
                          <i class="ion ion-person"></i>
                      </div>
                      <div class="card-wrap">
                          <div class="card-header">
                              <h4>Visiteurs</h4>
                          </div>
                          <div class="card-body">
                              <?= $_SESSION['numberVisitor'] ?>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-danger">
                  <i class="ion ion-ios-paper-outline"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Témoignages</h4>
                  </div>
                  <div class="card-body">
                    <?= $_SESSION['numberTestimonies'] ?>
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

  <script src="../public/manager/modules/chart.min.js"></script>
  <script src="../public/manager/modules/summernote/summernote-lite.js"></script>

  <script src="../public/manager/js/scripts.js"></script>
  <script src="../public/manager/js/custom.js"></script>
</body>
</html>