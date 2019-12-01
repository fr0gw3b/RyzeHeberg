
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
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
                                    Tickets
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <?php
										
								  
										$Tickets = $db->prepare('SELECT * FROM rh_support WHERE status = ? OR status = ? OR status = ? ORDER BY created_at AND FIELD(status, "open", "waiting")');
										$Tickets->execute(array('open', 'waiting', 'answered'));
										$rowCount = $Tickets->rowCount();
										
										
										if($rowCount == 0) {
											echo 'Aucun ticket';
										} else {
								
											echo '<table class="table table-striped">
													<thead>
													<tr>
													<th>#</th>
													<th>Sujet</th>
													<th>Département</th>
                                                    <th>Ouvert</th>
                                                    <th>Priorité</th>
                                                    <th>Status</th>
													<th>Action</th>
													</tr>
													</thead>
													<tbody> ';
							
											while($T = $Tickets->fetch()) {
												$acc = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
												$acc->execute(array($T['sso']));
												$cc = $acc->fetch();
												
												if($cc['rank'] >= 2) {
													echo '<tr>
												<td>'.$T['id'].'</td>
												<td>'.$T['sujet'].'</td>
												<td>'.$T['department'].'</td>
                                                <td>'.$this->ConvertTime($T['created_at']).'
                                                <td><div class="badge badge-primary ml-2">Premium - Prioritaire</div></td>
                                                <td class="text-center">'.$this->StatusSupportE($T['status']).'</td>
												<td><a href="/administration/tickets/'.$T['id'].'">Voir</a></td>
												</tr>';
												} else {
													echo '<tr>
												<td>'.$T['id'].'</td>
												<td>'.$T['sujet'].'</td>
												<td>'.$T['department'].'</td>
                                                <td>'.$this->ConvertTime($T['created_at']).'
                                                <td><div class="badge badge-primary ml-2">Normal</div></td>
                                                <td class="text-center">'.$this->StatusSupportE($T['status']).'</td>
												<td><a href="/administration/tickets/'.$T['id'].'">Voir</a></td>
												</tr>';
												}
											}
											
											echo '</tbody>
											</table>';
										}
									
									  ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets\scripts\main.cba69814a806ecc7945a.js"></script></body>
</html>
