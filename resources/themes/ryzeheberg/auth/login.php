<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        RyzeHeberg -
        <?php echo $title;?>
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/css/animate.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/bootstrap-notify.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/bootstrap-notify.min.js"></script>
    <script src="https://kit.fontawesome.com/3364714dc1.js" crossorigin="anonymous"></script>
    
    
    <script>
        $(document).ready(function() {
            $.notify({
                title: '<strong>Bienvenue!</strong><br>',
                icon: 'glyphicon glyphicon-star',
                message: "Pour accéder à l'espace client, vous devez vous connecter."
            }, {
                type: 'info',
                delay: '1000',
                animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutRight'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
            });
        });
    </script>
</head>
<body class="bg-default">
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="/">
          <img src="/themes/<?php echo $_ENV['APP_THEME'];?>/logo.png" />
        </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="/">
                  <img src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/img/brand/blue.png">
                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Navbar items -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="/">
                                <i class="fas fa-arrow-left"></i>
                                <span class="nav-link-inner--text">Retour sur le site</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">Bon retour parmis nous !</h1>
                            <p class="text-lead text-light">Veuillez vous connecter à votre compte ci-dessous.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-transparent pb-5">
                            <div class="text-muted text-center mt-2 mb-3"><small>Se connecter avec</small></div>
                            <div class="btn-wrapper text-center">
                                <a href="/login/discord" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><img src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/img/icons/common/discord.svg"></span>
                                    <span class="btn-inner--text">Discord</span>
                                </a>
                            </div>
                            <br>
                            <br>
                            <p>Nous ne recevons pas votre mot de passe des sites tiers de connexion, mais uniquement votre nom d'utilisateur ainsi que votre ID Discord.</p>
                            <p>Vous acceptez que ces données soient stockées en France.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-5">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            © 2019 <a href="https://ryzeheberg.fr" class="font-weight-bold ml-1" target="_blank">RyzeHeberg</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--   Core   -->
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <!--   Argon JS   -->
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>
</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/ajax/login.js"></script>
</html>