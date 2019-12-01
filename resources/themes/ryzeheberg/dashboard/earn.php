
<?php
$db = MySQL::Database();
$RecoveryService = $db->prepare('SELECT * FROM rh_services WHERE sso = ? ');
$RecoveryService->execute(array($_SESSION['account']['sso']));
$ServicesRowCount = $RecoveryService->rowCount();
$Account = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
$Account->execute(array($_SESSION['account']['sso']));
$AccountFetch = $Account->fetch();
?>
<!doctype html>
<html lang="en">

<head>
  <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/css/pace.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <title><?php echo $title;?></title>
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
                                    <i class="far fa-gem" aria-hidden="true"></i>
                                    </i>
                                </div>
                                <div>Gagner des diamants
                                    <div class="page-title-subheading">
                                    Gagner des diamants
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets\scripts\main.cba69814a806ecc7945a.js"></script></body>
</html>
