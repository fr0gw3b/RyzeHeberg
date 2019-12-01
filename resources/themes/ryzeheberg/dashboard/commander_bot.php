<!doctype html>
<html lang="en">

<head>
  <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/css/pace.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <title>Commander un hébergement bot discord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
<link href="/themes/<?php echo $_ENV['APP_THEME'];?>/main.cba69814a806ecc7945a.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/pace.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/ryzeheberg.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/bootstrap-notify.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/bootstrap-notify.min.js"></script>
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
<script src="https://kit.fontawesome.com/3364714dc1.js" crossorigin="anonymous"></script>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <img src="/themes/<?php echo $_ENV['APP_THEME'];?>/img/logos/logo-dark.png" width="200" height="60">
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    
        <?php include "../public/themes/".$_ENV['APP_THEME']."/tpl/topbar.tpl"; ?>
        </div>
    </div>    
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    
                <?php include "../public/themes/".$_ENV['APP_THEME']."/tpl/dashboard.tpl"; ?>
            </div>    <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                <i class="fas fa-robot">
                                    </i>
                                </div>
                                <div>Commander un hébergement bot discord
                                    <div class="page-title-subheading">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <style>
                        .center-block {
    display: block;
    margin-right: auto;
    margin-left: auto;
}
</style>
                        <div class="row">
                        <div id="error"></div>
                        <div class="center" >
                        <form class="form-full-width" id="rh_commander">
                        <div class="col-md-12 col-lg-7 center-block">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div id="smartwizard2" class="forms-wizard-alt sw-main sw-theme-default">
                                                <ul class="forms-wizard nav nav-tabs step-anchor">
                                                    <li class="nav-item active">
                                                            <em>2</em><span>Configuration de l'hébergement</span>
                                                    </li>
                                                </ul>
                                                <div class="form-wizard-content sw-container tab-content" style="min-height: 200.333px;">
                                                    <div id="step-12" class="tab-pane step-content" style="display: block;">
                                                    <center>
                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group"><label for="name">Nom du bot</label><input name="name" id="name" placeholder="Nom du bot" type="text" maxlength="20" class="form-control">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group"><label for="nodejs">Version Node.js</label><select id="nodejsSelect" class="form-control" name="nodejs">
                                                                <option value="08">8.x</option>
							<option  value="010">10.x</option>
							<option selected="selected" value="012">12.x (Recommandé)</option>
                            <option value="013">13.x</option>
                                                            
                                                        </select></center></div>
                                                    </div>
                                                    <div class="card mb-3 widget-content bg-night-fade">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading"><i class="fas fa-memory" aria-hidden="true"></i> Mémoire RAM</div>
                                            <div class="widget-subheading">DDR4</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>256MB RAM</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading"><i class="fas fa-save" aria-hidden="true"></i> Espace disque</div>
                                            <div class="widget-subheading">NVMe SSD</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>1GB</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading"><i class="fas fa-microchip" aria-hidden="true"></i> Processeur</div>
                                            <div class="widget-subheading">Intel® Core™ i7-9700K OC 5GHz</div>
                                        </div>
                                        <div class="widget-content-right">
                                             <div class="widget-numbers text-warning"><span>30% de 1 coeur</span></div>
                                        </div>
                                    </div>
                                </div>
                                <p style="color:red;">Afin d'équilibrer la bande passante et d'éviter les lancements d'attaque DDOS, votre service est limité à 25Mbit/s, soit l'équivalent de 3Mo/s. <a href="/extensions">Augmenter la bande passante</a></p>
                                                </div>
                                            </div>
<center>
                                            <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" name="agree" type="checkbox" id="agree" value="yes">
                      <label class="custom-control-label" for="agree">
                        <span class="text-muted">J'accepte les <a href="#!">Conditions d'utilisations</a></span>
                      </label>
                    </div>
                  </div>
                  </center>
                  <br>
                  <br><center><div class="g-recaptcha" data-sitekey="<?php echo $_ENV['RECAPTCHA_PUBLIC_KEY'];?>"></div><center>
                                            <div class="divider sw-container tab-content"></div>
                                            <div class="clearfix sw-container tab-content">
                                                <button class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Commander</button><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/ajax/commander_bot.js"></script>
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets\scripts\main.cba69814a806ecc7945a.js"></script></body>
</html>
