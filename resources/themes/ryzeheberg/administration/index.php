
<?php
$db = MySQL::Database();
$RecoveryService = $db->prepare('SELECT * FROM rh_services WHERE sso = ? ');
$RecoveryService->execute(array($_SESSION['account']['sso']));
$ServicesRowCount = $RecoveryService->rowCount();
$Account = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
$Account->execute(array($_SESSION['account']['sso']));
$AccountFetch = $Account->fetch();
$AccountALL = $db->prepare('SELECT * FROM rh_users WHERE sso != ?');
$AccountALL->execute(array("cc"));
$AccountALLRow = $AccountALL->rowCount();
$ServicesALL = $db->prepare('SELECT * FROM rh_services WHERE id != ?');
$ServicesALL->execute(array("cc"));
$ServicesALLRow = $ServicesALL->rowCount();
$Tickets = $db->prepare('SELECT * FROM rh_support WHERE status = ? OR status = ? ORDER BY created_at');
$Tickets->execute(array('open', 'waiting'));
$TicketsrowCount = $Tickets->rowCount();
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            $.notify({
                title: '<strong>Bienvenue!</strong><br>',
                icon: 'glyphicon glyphicon-star',
                message: "Vous êtes actuellement sur l'administration de RyzeHeberg."
            }, {
                type: 'success',
                delay: '4000',
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
                <?php include "../public/themes/".$_ENV['APP_THEME']."/tpl/dashboard1.tpl"; ?>
            </div>    <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                    </i>
                                </div>
                                <div>Administration
                                    <div class="page-title-subheading">
                                    Accueil
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                    <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                                    Statistiques générales
                                </div>
                            </div>
                            <div class="no-gutters row">
                                <div class="col-sm-6 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                            <i class="fas fa-users text-dark opacity-8"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Utilisateurs</div>
                                            <div class="widget-numbers"><?php echo $AccountALLRow?></div>
                                        </div>
                                    </div>
                                    <div class="divider m-0 d-md-none d-sm-block"></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                            <i class="fas fa-server text-white"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Services</div>
                                            <div class="widget-numbers"><span><?php echo $ServicesALLRow?></span></div>
                                        </div>
                                    </div>
                                    <div class="divider m-0 d-md-none d-sm-block"></div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                            <i class="fas fa-ticket-alt text-white"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Tickets en attente</div>
                                            <div class="widget-numbers text-success"><span><?php echo $TicketsrowCount?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center d-block p-3 card-footer">
                            <a href="/dashboard">
                                <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg">
                                    <span class="mr-2 opacity-7">
                                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                    </span>
                                    <span class="mr-1">Retour à l'espace client</span>
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets\scripts\main.cba69814a806ecc7945a.js"></script></body>
</html>
