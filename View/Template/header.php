<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS Stylesheets -->
        <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/Public/css/styles.css">

        <!-- JavaScript -->
        <script src="/Public/js/bootstrap.bundle.min.js"></script>

        <!-- Favicon -->
        <link rel="icon" type="image/ico" href="/Public/img/favicon/favicon.ico">

        <!-- Title -->
        <title><?= SITE_NAME ?></title>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <header class="container-fluid border-bottom bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start py-3">
                <a href="/">
                    <img src="/Public/img/logo/logo_black.png" alt="MelodySquad Logo" width="250">
                </a>
                <ul class="nav col-12 col-md-auto me-lg-auto mb-2 justify-content-start mb-md-0 px-5">
                    <li>
                        <a href="formations" class="nav-link px-2 link-dark <?php echo ROUTE[0] == "formations" ? "active" : ""; ?>">Formations</a>
                    </li>
                    <li>
                        <a href="courses" class="nav-link px-2 link-dark <?php echo ROUTE[0] == "courses" ? "active" : ""; ?>">Cours</a>
                    </li>
                </ul>
                <?php if(isset($_SESSION['user'])) { ?>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle d-block link-dark text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="Profile picture" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="/courses-taken">Mes cours</a></li>
                        <li><a class="dropdown-item" href="/profile">Mon profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/disconnect">Se déconnecter</a></li>
                    </ul>
                </div>
                <?php } else { ?>
                <div>
                    <a href="/login" class="btn btn-primary">Se connecter</a>
                    <a href="/signin" class="btn btn-outline-primary">S'inscrire</a>
                </div>
                <?php } ?>
            </div>
        </header>
        <main class="flex-fill">


