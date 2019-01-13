<?php

require __DIR__ . '/../controller/controller_ge.php';
require __DIR__ . '/../model/model_log.php';

updateLog('load index page', $_SESSION['user']);

?>

<link rel="stylesheet" href="../public/manager/css/style.css">
<link rel=icon href="../public/login/img/earth.png" type="image/png">
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

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="../public/manager/js/scripts.js"></script>
</body>
</html>

<?php

if ($_SESSION['access'] == 'no') {
    echo '<script>alert("Vous n\'avez pas le droit d\'accèder à cette page!")</script>';
    $_SESSION['access'] = 'yes';
}

?>