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
                                    <li class="active"><a href="/offres">Nos offres</a></li>
                                    <li><a href="#">Informations</a>
                                        <ul class="dropdown">
                                            <li><a href="/terms">Conditions d'utilisation</a></li>
                                            <li><a href="/privacy">Confidentialité</a></li>
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
                                <li class="breadcrumb-item active" aria-current="page">Nos offres</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Price Plan Area Start -->
    <section class="hami-price-plan-area mt-50">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Choisissez votre service</h2>
                        <p>Tout est gratuit.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <!-- Single Price Plan -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-price-plan mb-100">
                        <div class="popular-tag">
                            <i class="icon_star"></i> Populaire <i class="icon_star"></i>
                        </div>
                        <!-- Title -->
                        <div class="price-plan-title">
                            <h4>Normal - Bot discord</h4>
                            <p>Compatibilité Musique</p>
                        </div>
                        <!-- Value -->
                        <div class="price-plan-value">
                            <h2>Gratuit</h2>
                            <p>/à vie*</p>
                        </div>
                        <!-- Button -->
                        <a href="/commander/bot" class="btn hami-btn w-100 mb-30">Commander</a>
                        <!-- Description -->
                        <div class="price-plan-desc">
                            <p><i class="icon_check"></i> 3 base de donnée MySQL</p>
                            <p><i class="icon_check"></i> 128MB RAM et 1GB NVMe SSD</p>
                            <p><i class="icon_check"></i> Compatibilité NodeJS et Python</p>
                            <p><i class="icon_check"></i> 20% 1 coeur i7-9700K OC 5GHz</p>
                            <p><i class="fa fa-warning"></i> Bande passante bridé à ~25Mbit/s</p>
                        </div>
                        <!-- View All Feature Button -->
                        <a href="https://discord.ryzeheberg.fr" class="btn view-all-btn">Cliquez ici pour avoir plus d'informations</a>
                    </div>
                </div>

                <!-- Single Price Plan -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-price-plan active mb-100">
                        <!-- Popular Tag -->
                        <div class="popular-tag">
                            <i class="icon_star"></i> Populaire <i class="icon_star"></i>
                        </div>
                        <!-- Title -->
                        <div class="price-plan-title">
                            <h4>Mini - Minecraft</h4>
                            <p>Jouer entre ami</p>
                        </div>
                        <!-- Value -->
                        <div class="price-plan-value">
                            <h2>Gratuit</h2>
                            <p>/à vie*</p>
                        </div>
                        <!-- Button -->
                        <a href="#" class="btn hami-btn w-100 mb-30">Soon</a>
                        <!-- Description -->
                        <div class="price-plan-desc">
                            <p><i class="icon_check"></i> 1 GO de RAM</p>
                            <p><i class="icon_check"></i> 1 coeur i9-9900K 5GHz</p>
                            <p><i class="icon_check"></i> 1Gbit/s Allemagne</p>
                            <p><i class="icon_check"></i> 1Go NVMe SSD</p>
                            <p><i class="fa fa-warning"></i> Serveur <strong>seulement</strong> entre ami!</p>
                        </div>
                        <!-- View All Feature Button -->
                        <a href="#" class="btn view-all-btn">Cliquez ici pour avoir plus d'informations</a>
                    </div>
                </div>

                <!-- Single Price Plan -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-price-plan mb-100">
                        <!-- Title -->
                        <div class="price-plan-title">
                            <h4>Normal - Web</h4>
                            <p>Sans accès SSH/Composer</p>
                        </div>
                        <!-- Value -->
                        <div class="price-plan-value">
                            <h2>Gratuit</h2>
                            <p>/à vie*</p>
                        </div>
                        <!-- Button -->
                        <a href="/commander/bot" class="btn hami-btn w-100 mb-30">Commander</a>
                        <!-- Description -->
                        <div class="price-plan-desc">
                            <p><i class="icon_check"></i> Comptes FTP illimités</p>
                            <p><i class="icon_check"></i> 0.5GB</p>
                            <p><i class="icon_check"></i> Bande passante illimitée</p>
                            <p><i class="icon_check"></i> Comptes mails illimités</p>
                            <p><i class="fas fa-dragon"></i></i><strong> Mode Turbo</strong></p>
                        </div>
                        <!-- View All Feature Button -->
                        <a href="https://discord.ryzeheberg.fr" class="btn view-all-btn">Cliquez ici pour avoir plus d'informations</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Call To Action Area Start -->
    <section class="hami-call-to-action">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="cta-thumbnail pr-3 mb-100">
                        <img src="https://www.solutions-numeriques.com/wp-content/uploads/2016/04/datacenterstockage.gif" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="cta--content pl-3 mb-100">
                        <h2>Serveur optimisé</h2>
                        <p>Déployez votre infrastructure de service sur notre plate-forme cloud haute performance entièrement redondante et profitez de ses fonctionnalités de haute fiabilité, de sécurité et d'entreprise. Améliorez facilement les performances, la sécurité et la fiabilité de vos services avec l'un de nos produits d'hébergement cloud géré, y compris la migration gratuite des données.</p>
                        <!-- Button -->
                        <a href="/dashboard" class="btn hami-btn mt-50">Commencer dès maintenant!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->

    <!-- Call To Action Area Start -->
    <!-- Call To Action Area Start -->
    <section class="hami-call-to-action bg-gray section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="cta-thumbnail mb-100">
                        <img src="/themes/<?php echo $_ENV['APP_THEME'];?>/img/bg-img/2.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="cta--content mb-100">
                        <h2>Performances</h2>
                        <!-- Description -->
                        <div class="cta-desc mb-50">
                            <h6><i class="icon_check"></i> Anti-DDOS GAME</h6>
                            <h6><i class="icon_check"></i> Sécurisé</h6>
                            <h6><i class="icon_check"></i> Support gratuit et rapide</h6>
                            <h6><i class="icon_check"></i> Gratuit, et pour toujours!</h6>
                            <h6><i class="icon_check"></i> Facile à utiliser</h6>
                        </div>
                        <!-- Button -->
                        <a href="#" class="btn hami-btn">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->
    <!-- Call To Action Area End -->

    <!-- Support Area Start -->
    <section class="hami-support-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="support-text">
                        <a href="https://discord.ryzeheberg.fr"><h2>Besoin d'aide? Rejoignez notre Discord!</h2></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Pattern -->
        <div class="support-pattern" style="background-image: url(/themes/<?php echo $_ENV['APP_THEME'];?>/img/core-img/support-pattern.png);"></div>
    </section>
    <!-- Support Area End -->

    <!-- Call To Action Area Start -->
    <section class="hami-cta-area">
        <div class="container">
            <div class="cta-text">
                <h2>Nous avons hébergé plus de <span class="counter">224</span> services en 2019.</h2>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->

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