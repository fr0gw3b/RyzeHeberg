<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <!-- Title -->
    <title>RyzeHeberg - <?php echo $title?></title>

    <!-- Favicon -->
<script src="https://kit.fontawesome.com/3364714dc1.js" crossorigin="anonymous"></script>
    <!-- Icones -->
    <script src="https://kit.fontawesome.com/3364714dc1.js" crossorigin="anonymous"></script>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/themes/<?php echo $_ENV['APP_THEME'];?>/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-5688048366743262",
              enable_page_level_ads: true
         });
    </script>
     <?php
     include_once (dirname(__FILE__) . '/../ads.php');
     ?>

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000"
    },
    "button": {
      "background": "#f1d600"
    }
  },
  "theme": "classic",
  "content": {
    "message": "Ce site utilise les cookies afin d'assurer la meilleur expérience sur notre site.",
    "dismiss": "J'accepte",
    "link": "En savoir plus"
  }
});
</script>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">

                    <div class="col-6">
                        <div class="top-header-content">
                            <a href="https://invite.gg/ryzeheberg"><i class="fab fa-discord"></i> <span>Serveur Discord</span></a>
                            <a href="mailto:support@ryzeheberg.fr"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Email: support@ryzeheberg.fr</span></a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="top-header-content">
                            <!-- Login -->
                            <a href="/login"><i class="fa fa-lock" aria-hidden="true"></i> <span>Se connecter / S'inscrire</span></a>
                            <!-- Language -->
                            <div class="dropdown">
                                <a class="btn pr-0 dropdown-toggle" href="#" role="button" id="langdropdown" data-toggle="dropdown"><img src="/themes/<?php echo $_ENV['APP_THEME'];?>/img/core-img/fr.png"  style="max-height: 20px; max-width: 20px;" alt=""> Français</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="hamiNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="/"><img src="https://ryzeheberg.fr/themes/ryzeheberg/logo.png" style="max-height: 200px; max-width: 200px;" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="/">Accueil</a></li>
                                    <li><a href="/offres">Nos offres</a></li>
                                    <li><a href="#">Informations</a>
                                        <ul class="dropdown">
                                            <li><a href="/terms">Conditions d'utilisation</a></li>
                                            <li class="active"><a href="/privacy">Confidentialité</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Autres</a>
                                        <ul class="dropdown">
                                            <li><a href="https://panel.ryzeheberg.fr" target="_blank">Panel</a></li>
                                            <li><a href="#" target="_blank">CPanel</a></li>
                                            <li><a href="https://docs.ryzeheberg.fr" target="_blank">Documentation</a></li>
                                            <li><a href="https://status.ryzeheberg.fr" target="_blank">Status</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="icon_house_alt"></i> Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Politique de confidentialité</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Video Area Start -->
    <div class="hami--video--area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Politique de confidentialité</h2>
                    </div>
                </div>
            </div>
            <p><p>Le site ne stocke en aucun cas de données personnelles, tel que adresse IP, e-mail etc.</p></p>
        </div>
    </div>

    <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">

        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row justify-content-between">

                    <!-- Single Footer Widget Area -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">Produits</h5>

                            <!-- Footer Nav -->
                            <ul class="footer-nav">
                                <li><a href="/commander/bot">Hébergement bot discord</a></li>
                                <li><a href="#">Hébergement Web</a></li>
                                <li><a href="#">Hébergement Serveur MC</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">Autres</h5>

                            <!-- Footer Nav -->
                            <ul class="footer-nav">
                                <li><a href="#">Conditions d'utilisations</a></li>
                                <li><a href="#">Confidentialité</a></li>
                                <li><a href="https://www.trustpilot.com/review/ryzeheberg.fr">Avis des clients</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-8 col-lg-4">
                        <div class="single-footer-widget mb-80">

                            <!-- Social Info -->
                            <div class="social-info">
                                <a href="https://discord.ryzeheberg.fr" class="discord"><i class="fab fa-discord" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area bg-gray">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> Tout droits réservés | Made with &#10084 by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/hami.bundle.js"></script>
    <!-- Active -->
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/default-assets/active.js"></script>

</body>

</html>