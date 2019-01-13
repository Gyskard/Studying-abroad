<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="../security/security_logout.php" class="nav-link nav-link-lg">
                        <div class="d-sm-none d-lg-inline-block"><i class="ion ion-log-out"></i> Déconnexion</div>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.php">Gestionnaire</a>
                </div>
                <div class="sidebar-user">
                    <div class="sidebar-user-picture">
                        <img alt="image" src="../public/manager/img/default-profil.png">
                    </div>
                    <div class="sidebar-user-details">
                        <div class="user-name"><?= $_SESSION['user'] ?></div>
                        <div class="user-role">
                            <?= $_SESSION['roleShow'] ?>
                        </div>
                    </div>
                </div>

<?php

function isActive($page)
{
    if (
            (($_SESSION['page'] === "index") && ($page === "index"))
         || (($_SESSION['page'] === "testimonials") && ($page === "testimonials"))
         || (($_SESSION['page'] === "settings") && ($page === "settings"))
         || (($_SESSION['page'] === "credits") && ($page === "credits"))
         || (($_SESSION['page'] === "logs") && ($page === "logs"))
    ) {
        return 'active';
    }

    return '';
}

?>

                <ul class="sidebar-menu">
                    <li class="<?= isActive("index") ?>">
                        <a href="../view/index.php"><i class="ion ion-speedometer"></i><span>Tableau de bord</span></a>
                    </li>
                    <li class="<?= isActive("map") ?>">
                        <a href="../../index.html"><i class="ion ion-map"></i><span>Carte interactive</span></a>
                    </li>
                    <li class="<?= isActive("testimonials") ?>">
                        <a href="../view/testimonials.php"><i class="ion ion-clipboard"></i> Témoignages <div class="badge badge-primary"><?= $_SESSION['numberTestimonies'] ?></div></a>
                    </li>
                    <li class="<?= isActive("logs") ?>">
                        <a href="../view/logs.php"><i class="ion ion-ios-search"></i><span>Logs</span></a>
                    </li>
                    <li class="<?= isActive("settings") ?>">
                        <a href="../view/settings.php"><i class="ion ion-ios-settings"></i><span>Paramètres</span></a>
                    </li>
                    <li class="<?= isActive("credits") ?>">
                        <a href="credits.php"><i class="ion ion-ios-information-outline"></i> Crédits</a>
                    </li>
                </ul>
            </aside>
        </div>