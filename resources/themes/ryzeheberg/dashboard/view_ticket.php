
<?php
$db = MySQL::Database();
 
$get_id = $ticket;
 $RecoveryID = $db->prepare('SELECT * FROM rh_support WHERE id = ?');
 $RecoveryID->execute(array($get_id));
 $rowCountID = $RecoveryID->rowCount();
 
 if($rowCountID == 0) {
     header('Location: /dashboard');
     exit();
 } else {
     $fetchID = $RecoveryID->fetch();
     
     $InfoAccount = $db->prepare('SELECT username, avatar, rank, sso FROM rh_users WHERE sso = ?');
     $InfoAccount->execute(array($fetchID['sso']));
     $fetchAccount = $InfoAccount->fetch();
 }
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
    <?php
     include_once (dirname(__FILE__) . '/../ads.php');
     ?>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-5688048366743262",
          enable_page_level_ads: true
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
                <?php include "../public/themes/".$_ENV['APP_THEME']."/tpl/dashboard.tpl"; ?>
            </div>    <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                    </i>
                                </div>
                                <div>Voir ticket
                                    <div class="page-title-subheading">
                                    Ticket - <?= $fetchID['sujet']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="wrapper content-wrapper">
                        <?php if ($fetchID['status'] == 'close') {
                            echo '<div class="alert alert-danger" role="alert">
                            Ce ticket est fermé
                          </div>';
                        }
                        ?>
                        <div class="main-card mb-3 card">
                                        <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>TICKET #<?php echo $fetchID['id'];?> - <?php echo $fetchID['sujet'];?>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                            <?php 
                                            $Responses = $db->prepare('SELECT * FROM rh_support_responses WHERE ticket_id = ? ORDER BY id DESC');
                                            $Responses->execute(array($get_id));
                                            $rowRes = $Responses->rowCount();
                                            $rowResS = $Responses->fetch();
                                            if ($rowRes == 0) {
                                                $last_update = $this->ConvertTime($fetchID['created_at']);
                                            } else {
                                                $last_update = $this->ConvertTime($rowResS['added_at']);
                                            }
                                                                                                ?>
                                                <h6>Status : <?php echo $this->StatusSupport($fetchID['status']);?></h6>
                                                <h6>Département : <?php echo $fetchID['department']?></h6>
                                                <h6>Dernière mise à jour : <?php echo $last_update?></h6>
                                            </div>
                                        </div>
                                    </div>
				<div class="page-content fade-in-up">
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox ibox-fullheight">
								<div class="ibox-body">
									<div class="ibox-fullwidth-block">
										<div class="row">
											<div class="col-md-12 rh_support" style="padding: 0px 25px 0px 25px">
												<ul class="media-list media-list-divider m-0">
                                                <div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box"><?php echo $fetchID['content'];?></div>
                                                    <small class="opacity-6">
                                                    <i class="fa fa-user-alt mr-1"></i>
                                                    <?php echo $fetchAccount['username'];?><br>
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    <?php echo $this->ConvertTime($fetchID['created_at']);?>
                                                </small>
                                                </div>
                                                <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="<?php echo $fetchAccount['avatar'];?>" alt=""></div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>          
													<?php
													
													$Responses = $db->prepare('SELECT * FROM rh_support_responses WHERE ticket_id = ? ORDER BY id ASC');
													$Responses->execute(array($get_id));
													
													while($R = $Responses->fetch()) {
														$Account = $db->prepare('SELECT username, rank, avatar, sso, username_pro FROM rh_users WHERE sso = ?');
														$Account->execute(array($R['sso']));
                                                        $fetch = $Account->fetch();
                                                        if ($R['staff'] == 1) {
														?>
                                                        <div class="chat-wrapper">
                                        <div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="<?php echo $fetch['avatar'];?>" alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box"><?php echo $R['reply'];?></div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-user-alt mr-1"></i>
                                                    <?php echo $fetch['username_pro'];?><br>
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    <?php echo $this->ConvertTime($R['added_at']);?>
                                                </small>
                                            </div>
                                        </div>
                                                        <?php } else {
                                                            ?>
 <div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box"><?php echo $R['reply'];?></div>
                                                    <small class="opacity-6">
                                                    <i class="fa fa-user-alt mr-1"></i>
                                                    <?php echo $fetch['username'];?><br>
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    <?php echo $this->ConvertTime($R['added_at']);?>
                                                </small>
                                                </div>
                                                <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="<?php echo $fetch['avatar'];?>" alt=""></div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>                         
                                                            <?php
                                                        } }
													
													?>
                                                    </div>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if ($fetchID['status'] != "close") {?>
					<div class="row">
						<div class="col-lg-12">
							<div id="error"></div>
							<div class="ibox ibox-fullheight">
								<div class="ibox-body">
									<form id="rh_reply">
										<div class="form-group">
											<label>Réponse</label>
											<textarea id="reply" class="form-control" name="reply" rows="3"></textarea>
										</div>
										<button style="float: left; margin-right: 10px"class="btn btn-primary">Envoyer</button>
									</form>
									<button id="rh_close_ticket" class="btn btn-danger">Fermer le ticket</button>
								</div>
							</div>
						</div>
                    </div><?php }?>
				</div>
			</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>var ticket_id = "<?= $ticket; ?>"</script>
<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/ajax/ticket.js"></script>
<div class="app-drawer-overlay d-none animated fadeIn"></div><script type="text/javascript" src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets\scripts\main.cba69814a806ecc7945a.js"></script></body>
</html>
