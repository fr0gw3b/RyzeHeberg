
<?php
$db = MySQL::Database();

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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
		<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/bootstrap-notify.js"></script>
		<?php
     include_once (dirname(__FILE__) . '/../ads.php');
     ?>

	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/bootstrap-notify.min.js"></script>
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
                                    <i class="fa fa-hammer icon-gradient bg-arielle-smile"></i>
                                    </i>
                                </div>
                                <div>Exentensions
                                    <div class="page-title-subheading">
                                    Améliorer vos Services !
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <br />
                        <br />

                        <div id="error"></div>

                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><i class="header-icon lnr-laptop-phone icon-gradient bg-plum-plate"> </i>Les Services, c'est COOL !</div>
                                        <div class="card-body">
                                            <p>Vous avez toujours voulu avoir plus de services ?</p>
                                            <p class="mb-0">Cette <font color="#f54242">extension</font> est faite pour vous !</p></div>
                                        <div class="d-block text-right card-footer">
                                            <button type="button" class="btn mr-2 mb-2 btn-success" data-toggle="modal" data-target="#ServiceAddModal">Acheter</button>
                                        </div>
                                    </div>
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><i class="header-icon fas fa-microchip icon-gradient bg-plum-plate"> </i>J'ai mal au Coeur !</div>
                                        <div class="card-body">
                                            <p>Besoin d'augmenter le CPU d'un de vos service ?</p>
                                        </div>
                                        <div class="d-block text-right card-footer">
                                            <button type="button" class="btn mr-2 mb-2 btn-success">Acheter</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><i class="header-icon fas fa-tachometer-alt icon-gradient bg-plum-plate"> </i>Passe là troisième !</div>
                                        <div class="card-body">
                                            <p>Ton service est trop lent ?</p>
                                            <p class="mb-0">Améliore la RAM de un de tes service !</p></div>
                                            <div class="d-block text-right card-footer">
                                            <button type="button" class="btn mr-2 mb-2 btn-success" data-toggle="modal" data-target="#RAMModal">Acheter</button>
                                        </div>
                                    </div>
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><i class="header-icon fas fa-microchip icon-gradient bg-plum-plate"> </i>Plus assez de débits !</div>
                                        <div class="card-body">
                                            <p>Besoin d'augmenter la bande passante d'un de vos service ?</p>
                                        </div>
                                        <div class="d-block text-right card-footer">
                                            <button class="btn btn-success btn-lg">Acheter</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header"><i class="header-icon fas fa-hdd icon-gradient bg-plum-plate"> </i>Trop Gourmand !</div>
                                        <div class="card-body">
                                            <p>Plus beaucoup de place ?</p>
                                            <p class="mb-0">Améliore le Stockage de un de tes service !</p></div>
                                        <div class="d-block text-right card-footer">
                                            <button class="btn btn-success btn-lg">Acheter</button>
                                        </div>
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

<form class="form-full-width" id="rh_commander">
    <div class="modal fade" id="ServiceAddModal" name='ServiceAddModal' tabindex="-1" role="dialog" aria-labelledby="ServiceAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ServiceAddLabel">Achat - Emplacement Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Vous êtes sur le point d'acheter 1 emplacement de service en plus.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Acheter (50 diamants)</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form class="form-full-width" id="rh_commanderRAM">
    <div class="modal fade" id="RAMModal" name='RAMModal' tabindex="-2" role="dialog" aria-labelledby="RAMLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="RAMLabel">Achat - Emplacement Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Vous êtes sur le point d'acheter 64MB de RAM en plus</p>
                    <br>
                    <label for="select" style="color:red;" class="">Quelle service voulez-vous avoir les 64MB de RAM en plus :</label>
                    <select name="select" id="select" class="form-control">
                        <?php
                            $AllService = $db->prepare('SELECT * FROM rh_services WHERE sso = ? AND status = "active" AND solution = "Bot discord"');
                            $AllService->execute(array($_SESSION['account']['sso']));
                            while ($row = $AllService->fetch()){
                        ?>
                        <option name="<?= $row['uuid'] ?>"><?= $row['name'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Acheter (50 diamants)</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/ajax/extensions.js"></script>

</html>