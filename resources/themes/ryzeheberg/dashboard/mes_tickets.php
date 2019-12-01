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
<link href="/themes/<?php echo $_ENV['APP_THEME'];?>/main.cba69814a806ecc7945a.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/pace.js"></script>
    <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/js/ryzeheberg.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
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
                                     <i class="fa fa-ticket-alt"></i>
                                    </i>
                                </div>
                                <div>Mes tickets
                                    <div class="page-title-subheading">
                                    Tickets créés
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="main-card mb-3 card">
                        <div class="card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Mes tickets</div>
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle text-truncate mb-0 table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Sujet</th>
                                    <th class="text-center">Département</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php
										
							$Services = $db->prepare('SELECT * FROM rh_support WHERE sso = ? ORDER by id DESC');
							$Services->execute(array($_SESSION['account']['sso']));
                            $rowCount = $Services->rowCount();
							if($rowCount > 0) {
								while($S = $Services->fetch()) { 
                                    ?>
                                    <tr>
                                    <td class="text-center text-muted" style="width: 80px;">#<?php echo $S['id']?></td>
                                    <td class="text-center"><a href="javascript:void(0)"><?php echo $S['sujet'];?></a></td>
                                    <td class="text-center"><a href="javascript:void(0)"><?php echo $S['department']?></a></td>
                                    <td class="text-center">
                                    <?php echo $this->StatusSupportE($S['status']);?>
                                    </td>
                                    <td class="text-center">
                                        <a href="/tickets/<?php echo $S['id']?>">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="btn-shadow btn btn-primary">Voir</button>
                                        </div>
                                        </a>
                                    </td>
                                </tr>
								<?php } }?>
                                </tbody>
                            </table>
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
