<?php
$db = MySQL::Database();
$RecoveryAccount = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
$RecoveryAccount->execute(array($_SESSION['account']['sso']));
$Account = $RecoveryAccount->fetch();
$pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
?>
<!doctype html>
<html lang="en">

<head>
  <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/css/pace.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
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

<link href="/themes/<?php echo $_ENV['APP_THEME'];?>/main.cba69814a806ecc7945a.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/pace.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/ryzeheberg.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    
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
                                     <i class="fa fa-server"></i>
                                    </i>
                                </div>
                                <div>Mes services
                                    <div class="page-title-subheading">
                                    Services auxquels vous avez accès
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="main-card mb-3 card">
                        <div class="card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Mes services</div>
                            <div class="btn-actions-pane-right">
                            <button type="button" onclick="SFTP()" class="btn-icon btn-wide btn-outline-2x btn btn-outline-focus btn-sm d-flex">
                                    Mot de passe SFTP général
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle text-truncate mb-0 table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">Code Support</th>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Solution</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Expiration</th>
                                    <th class="text-center">Durée</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php
										
							$Services = $db->prepare('SELECT * FROM rh_services WHERE sso = ?');
							$Services->execute(array($_SESSION['account']['sso']));
                            $rowCount = $Services->rowCount();
							if($rowCount > 0) {
								while($S = $Services->fetch()) { 
                                    if ($S['solution'] == "Bot discord") {
                                        $date = strtotime($S['expire_at']);
                                        $fromDate = strtotime($S['last_renew']);
                                        $currentDate = time();
                                        $toDate = strtotime($S['expire_at']);
                                        //days between From and To
                                        $datediffA = round(($toDate- $fromDate) / (60 * 60 * 24));
                                        //days between From and Current
                                        $datediffB =  round(($currentDate- $fromDate) / (60 * 60 * 24));
                                        $pourcentage = ($datediffB*100)/$datediffA;
                                        $pourcentage = number_format($pourcentage, 0, '.', '');
                                        $pourcentage = 100 - $pourcentage;
                                        $getServer = json_encode($pterodactyl->serverEx($S['external_id']));
                                        $server = json_decode($getServer, true);
                                        setlocale(LC_TIME, "fr_FR");
                                        $expire = strftime("%d %B", strtotime($S['expire_at']));
                                        $expire = str_replace(
                                            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                                           array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'),
                                           $expire
                                        );
                                        $uuid1 = mb_substr($server['uuid'], 0, 8);
                                    ?>
                                    <tr>
                                    <td class="text-center text-muted" style="width: 80px;">#<?php echo $S['uuid']?></td>
                                    <td class="text-center"><a href="https://panel.ryzeheberg.fr/server/<?php echo $uuid1?>" target="_blank"><?php echo $this->Security($server['attributes']['name'])?></a></td>
                                    <td class="text-center"><a href="/commander/bot"><?php echo $S['solution']?></a></td>
                                    <?php echo $this->StatusServicePterodactyl($S['external_id'], false);?>
                                    <td class="text-center">
                                        <span class="pr-2 opacity-6">
                                            <i class="fa fa-business-time"></i>
                                        </span>
                                        <?php echo $expire;?>
                                    </td>
                                    <td class="text-center" style="width: 200px;">
                                    <?php echo $this->BarProgress($pourcentage);?>
                                    </td>
                                    <td class="text-center">
                                        <a href="/service/<?php echo $S['uuid']?>">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="btn-shadow btn btn-primary">Gérer</button>
                                        </div>
                                        </a>
                                    </td>
                                </tr>
                                <?php } elseif ($S['solution'] == "Site Web") {
                                        $date = strtotime($S['expire_at']);
                                        $fromDate = strtotime($S['last_renew']);
                                        $currentDate = time();
                                        $toDate = strtotime($S['expire_at']);
                                        //days between From and To
                                        $datediffA = round(($toDate- $fromDate) / (60 * 60 * 24));
                                        //days between From and Current
                                        $datediffB =  round(($currentDate- $fromDate) / (60 * 60 * 24));
                                        $pourcentage = ($datediffB*100)/$datediffA;
                                        $pourcentage = number_format($pourcentage, 0, '.', '');
                                        $pourcentage = 100 - $pourcentage;
                                        setlocale(LC_TIME, "fr_FR");
                                        $expire = strftime("%d %B", strtotime($S['expire_at']));
                                        $expire = str_replace(
                                            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                                           array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'),
                                           $expire
                                        );
                                    ?>
                                    <tr>
                                    <td class="text-center text-muted" style="width: 80px;">#<?php echo $S['uuid']?></td>
                                    <td class="text-center"><a href="https://<?php echo $this->Security($S['name'])?>" target="_blank"><?php echo $this->Security($S['name'])?></a></td>
                                    <td class="text-center"><a href="/commander/web"><?php echo $S['solution']?></a></td>
                                    <td class="text-center"><div class="badge badge-pill badge-success">Actif</div></td>
                                    <td class="text-center">
                                        <span class="pr-2 opacity-6">
                                            <i class="fa fa-business-time"></i>
                                        </span>
                                        <?php echo $expire;?>
                                    </td>
                                    <td class="text-center" style="width: 200px;">
                                    <?php echo $this->BarProgress($pourcentage);?>
                                    </td>
                                    <td class="text-center">
                                        <a href="/service/<?php echo $S['uuid']?>">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="btn-shadow btn btn-primary">Gérer</button>
                                        </div>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                                    <?php }}}?>
                            </table>
                        </div>
                        <div class="d-block p-4 text-center card-footer">
                        <a href="https://panel.ryzeheberg.fr" target="_blank">
                            <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-dark btn-lg">
                                <span class="mr-2 opacity-7"><i class="fa fa-cog fa-spin"></i>
                                </span>
                                <span class="mr-1">Accéder au panel de gestion (Bot)</span>
                            </button>
                            </a>
                            <a href="https://web.ryzeheberg.fr:2083" target="_blank">
                            <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-dark btn-lg">
                                <span class="mr-2 opacity-7"><i class="fa fa-cog fa-spin"></i>
                                </span>
                                <span class="mr-1">Accéder au panel de gestion (Web)</span>
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
<script>
function SFTP() {
    Swal.fire({
    timer: 10000,
  title: 'Mot de passe SFTP',
  input: 'text',
  inputValue: '<?php echo $Account['password_pterodactyl']?>',
  inputAttributes: {
    autocapitalize: 'off',
    disabled: 'true'
  },
  showCancelButton: false,
  confirmButtonText: 'Générer un nouveau mot de passe',
  showLoaderOnConfirm: true,
  preConfirm: (login) => {
    return fetch(`/panel/generate`),
    location.reload()
  }
  }
)}

</script>
