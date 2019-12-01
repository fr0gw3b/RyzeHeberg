
<?php
$db = MySQL::Database();
$RecoveryService = $db->prepare('SELECT * FROM rh_services WHERE sso = ? AND uuid = ?');
$RecoveryService->execute(array($_SESSION['account']['sso'], $uuid));
$RecoveryServiceRowCount = $RecoveryService->rowCount();
$Service = $RecoveryService->fetch();
$Account = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
$Account->execute(array($_SESSION['account']['sso']));
$AccountFetch = $Account->fetch();
if ($RecoveryServiceRowCount == 0) {
    header("Location: /"); 
    exit();
} else {
	if ($Service['solution'] == "Bot discord") {
    $pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
    $getServer = json_encode($pterodactyl->serverEx($Service['external_id']));
	$server = json_decode($getServer, true);
	}
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
		<title>
			<?php echo $title;?> 
			<?php if ($Service['solution'] == "Bot discord") { echo $this->Security($server['attributes']['name']); } else { echo $this->Security($Service['name']); }?>
		</title>
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
							<span class="hamburger-inner">
							</span>
							</span>
							</button>
						</div>
					</div>
				</div>
				<div class="app-header__mobile-menu">
					<div>
						<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
						<span class="hamburger-box">
						<span class="hamburger-inner">
						</span>
						</span>
						</button>
					</div>
				</div>
				<div class="app-header__menu">
					<span>
					<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
					<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6">
					</i>
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
					<div class="logo-src">
					</div>
					<div class="header__pane ml-auto">
						<div>
							<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
							<span class="hamburger-box">
							<span class="hamburger-inner">
							</span>
							</span>
							</button>
						</div>
					</div>
				</div>
				<div class="app-header__mobile-menu">
					<div>
						<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
						<span class="hamburger-box">
						<span class="hamburger-inner">
						</span>
						</span>
						</button>
					</div>
				</div>
				<div class="app-header__menu">
					<span>
					<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
					<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6">
					</i>
					</span>
					</button>
					</span>
				</div>
				<?php include "../public/themes/".$_ENV['APP_THEME']."/tpl/dashboard.tpl"; ?>
			</div>
			<?php if ($Service['solution'] == "Bot discord") {?>
			<div class="app-main__outer">
				<div class="app-main__inner">
					<div class="app-inner-layout">
						<div class="app-inner-layout__header-boxed p-0">
							<div class="app-inner-layout__header page-title-icon-rounded text-white bg-premium-dark mb-4">
								<div class="app-page-title">
									<div class="page-title-wrapper">
										<div class="page-title-heading">
											<div class="page-title-icon">
												<i class="fa fa-server icon-gradient bg-sunny-morning">
												</i>
											</div>
											<div>
												Gérer mon service 
												<div class="page-title-subheading">
													<?php echo $this->Security($server['attributes']['name'])?>
												</div>
											</div>
										</div>
										<div class="page-title-actions">
											<a href="https://fr.trustpilot.com/review/ryzeheberg.fr" target="_blank">
											<button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Noter RyzeHeberg sur TrustPilot">
											<i class="fa fa-star">
											</i>
											</button>
											</a>
											<button type="button" onclick="CodeSupport()" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
											<span class="btn-icon-wrapper pr-2 opacity-7">
											<i class="metismenu-icon fas fa-headset">
											</i>
											</span>
											Code support
											</button>
											<a href="https://docs.ryzeheberg.fr" target="_blank">
											<button type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info" data-original-title="Documentation officielle">
											<span class="btn-icon-wrapper pr-2 opacity-7">
											<i class="fa fa-book">
											</i>
											</span>
											Documentation
											</button>
											</a>
											<button type="button" onclick="SFTP()" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
											<span class="btn-icon-wrapper pr-2 opacity-7">
											<i class="fa fa-files-o">
											</i>
											</span>
											Accès SFTP
											</button>
											<button type="button" onclick="Update()" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
											<span class="btn-icon-wrapper pr-2 opacity-7">
											<i class="fas fa-sync"></i>
											</i>
											</span>
											Mettre à jour
											</button>
                                            <div class="d-inline-block dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                                    <span class="btn-icon-wrapper pr-2 opacity-7">
														<i class="fas fa-directions "></i>
                                                    </span>
                                                    Actions
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link" onclick="DeleteBot()">
															<i class="nav-link-icon pe-7s-trash"></i>
                                                                <span>
																Supprimer le bot
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" onclick="ChangeVersionBot()">
                                                                <i class="nav-link-icon pe-7s-refresh-2"></i>
                                                                <span>
                                                                    Reinstaller le bot
                                                                </span>
                                                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                            </a>
                                                        </li>
														<li class="nav-item">
                                                            <a disabled="" class="nav-link disabled">
                                                                <i class="nav-link-icon lnr-file-empty"></i>
                                                                <span>
                                                                    Transferer la propriété du bot (Soon)
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" onclick="GoPanel()">
                                                                <i class="nav-link-icon pe-7s-airplay"></i>
                                                                <span>
																	Accéder au panel de gestion
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<br>
							</div>
						</div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card mb-3 widget-content bg-night-fade sw-container tab-content">
                            <div class="widget-content-wrapper text-white tab-pane step-content">
                            <div class="widget-content-left">
                            <div class="widget-heading"><i class="fas fa-memory" aria-hidden="true"></i> Mémoire RAM</div>
                            <div class="widget-subheading">DDR4</div>
                            </div>
                            <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo$server['attributes']['limits']['memory'];?>MB RAM</span></div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                            <div class="card mb-3 widget-content bg-arielle-smile sw-container tab-content">
<div class="widget-content-wrapper text-white tab-pane step-content">
<div class="widget-content-left">
<div class="widget-heading"><i class="fas fa-save" aria-hidden="true"></i> Espace disque</div>
<div class="widget-subheading">NVMe SSD</div>
</div>
<div class="widget-content-right">
<div class="widget-numbers text-white"><span><?php echo sprintf("%.2f", $server['attributes']['limits']['disk'] * (1/1024));?>GB</span></div>
</div>
</div>
</div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
							<div class="card mb-3 widget-content bg-premium-dark sw-container tab-content">
<div class="widget-content-wrapper text-white tab-pane step-content">
<div class="widget-content-left">
<div class="widget-heading"><i class="fas fa-microchip" aria-hidden="true"></i> Processeur</div>
<div class="widget-subheading">Intel® Core™ i7-9700K OC 5GHz</div>
</div>
<div class="widget-content-right">
<div class="widget-numbers text-warning"><span><?php echo$server['attributes']['limits']['cpu'];?>%</span></div>
</div>
</div>
</div>

                            </div><div id="error"></div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="card mb-3 widget-content bg-happy-green">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">

                                            <div class="widget-heading"><i class="fas fa-sync-alt"></i> Version : </div>
                                        </div>
                                        <div class="widget-content-right">
										<div class="widget-numbers text-white"><span><?php echo $Service['version'];?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
				<center><br>
<a>
<button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg" onclick="GoPanel()">
<span class="mr-2 opacity-7"><i class="fa fa-cog fa-spin" aria-hidden="true"></i>
</span>
<span class="mr-1">Accéder au panel de gestion</span>
</button>
<br><BR>
<form id="rh_renouvellement">
<input type="hidden" id="uuid" name="uuid" value="<?php echo $Service['uuid'];?>">
<button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-danger btn-lg">
<span class="mr-2 opacity-7"><i class="fas fa-sync-alt" aria-hidden="true"></i>
</span>
<span class="mr-1">Renouveler le service</span>
<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/ajax/renouveller.js"></script>
</button>
</form>
</a>
</center>
			</div>
			<?php } elseif ($Service['solution'] == "Site Web") {?>
			<div class="app-main__outer">
				<div class="app-main__inner">
					<div class="app-inner-layout">
						<div class="app-inner-layout__header-boxed p-0">
							<div class="app-inner-layout__header page-title-icon-rounded text-white bg-premium-dark mb-4">
								<div class="app-page-title">
									<div class="page-title-wrapper">
										<div class="page-title-heading">
											<div class="page-title-icon">
												<i class="fa fa-server icon-gradient bg-sunny-morning">
												</i>
											</div>
											<div>
												Gérer mon service 
												<div class="page-title-subheading">
													<?php echo $this->Security($Service['name'])?>
												</div>
											</div>
										</div>
										<div class="page-title-actions">
											<a href="https://fr.trustpilot.com/review/ryzeheberg.fr" target="_blank">
											<button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Noter RyzeHeberg sur TrustPilot">
											<i class="fa fa-star">
											</i>
											</button>
											</a>
											<button type="button" onclick="CodeSupport()" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
											<span class="btn-icon-wrapper pr-2 opacity-7">
											<i class="metismenu-icon fas fa-headset">
											</i>
											</span>
											Code support
											</button>
											<button type="button" onclick="Password()" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
											<span class="btn-icon-wrapper pr-2 opacity-7">
											<i class="metismenu-icon fa fa-user">
											</i>
											</span>
											Identifiants CPanel
											</button>
											<button type="button" onclick="NameServers()" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
											<span class="btn-icon-wrapper pr-2 opacity-7">
											<i class="metismenu-icon fa fa-server">
											</i>
											</span>
											Noms de serveurs
											</button>
											<button type="button" onclick="SFTP()" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
											<span class="btn-icon-wrapper pr-2 opacity-7">
											<i class="fa fa-files-o">
											</i>
											</span>
											Accès FTP
											</button>
                                            <div class="d-inline-block dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                                    <span class="btn-icon-wrapper pr-2 opacity-7">
														<i class="fas fa-directions "></i>
                                                    </span>
                                                    Actions
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link" onclick="DeleteBot()">
															<i class="nav-link-icon pe-7s-trash"></i>
                                                                <span>
																Supprimer le site
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" onclick="GoPanel()">
                                                                <i class="nav-link-icon pe-7s-airplay"></i>
                                                                <span>
																	Accéder au panel de gestion
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<br>
							</div>
						</div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                            <div class="card mb-3 widget-content bg-arielle-smile sw-container tab-content">
<div class="widget-content-wrapper text-white tab-pane step-content">
<div class="widget-content-left">
<div class="widget-heading"><i class="fas fa-save" aria-hidden="true"></i> Espace disque</div>
<div class="widget-subheading">HDD</div>
</div>
<div class="widget-content-right">
<div class="widget-numbers text-white"><span><?php echo sprintf("%.2f", "500" * (1/1024));?>GB</span></div>
</div>
</div>
</div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
							<div class="card mb-3 widget-content bg-premium-dark sw-container tab-content">
<div class="widget-content-wrapper text-white tab-pane step-content">
<div class="widget-content-left">
<div class="widget-heading"><i class="fas fa-database" aria-hidden="true"></i> Bande passante</div>
<div class="widget-subheading"></div>
</div>
<div class="widget-content-right">
<div class="widget-numbers text-warning"><span>Illimité</span></div>
</div>
</div>
</div>
</div>

                            </div><div id="error"></div>
				<center><br>
<a>
<button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg" onclick="GoPanel()">
<span class="mr-2 opacity-7"><i class="fa fa-cog fa-spin" aria-hidden="true"></i>
</span>
<span class="mr-1">Accéder au panel de gestion</span>
</button>
<br><BR>
<form id="rh_renouvellement">
<input type="hidden" id="uuid" name="uuid" value="<?php echo $Service['uuid'];?>">
<button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-danger btn-lg">
<span class="mr-2 opacity-7"><i class="fas fa-sync-alt" aria-hidden="true"></i>
</span>
<span class="mr-1">Renouveler le service</span>
<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/ajax/renouveller.js"></script>
</button>
</form>
</a>
</center>
			</div>
			<?php } ?>
		</div>
		</div>
		</div>
		</div>
		</div>
		<div class="app-drawer-overlay d-none animated fadeIn"></div>
		<script type="text/javascript" src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets\scripts\main.cba69814a806ecc7945a.js"></script>
	</body>
</html>
<?php if ($Service['solution'] == "Bot discord") {?>
<script>
function SFTP() {
    Swal.fire({
  title: 'Accès SFTP pour <?php echo $this->Security($server['attributes']['name'])?>',
  html:
     '<div class="form-group"> <label for="ip">Hôte du serveur SFTP</label> <input type="text" class="form-control" id="ip" value="<?php echo $this->SFTPHost($server['attributes']['node']);?>" readonly=""> </div>' +
    '<div class="form-group"> <label for="ip">Identifiant</label> <input type="text" class="form-control" id="ip" value="<?php echo strtolower("{$_SESSION['account']['username']}.{$server['identifier']}");?>" readonly=""> </div>' +
    '<div class="form-group"> <label for="ip">Mot de passe</label> <input type="text" class="form-control" id="ip" value="<?php echo $AccountFetch['password_pterodactyl'];?>" readonly=""> </div>' +
    '<div class="form-group"> <label for="ip">Port</label> <input type="text" class="form-control" id="ip" value="<?php echo $this->SFTPPort($server['attributes']['node']);?>" readonly=""> </div>' +
    '<a class="btn btn-primary" href="winscp-sftp://<?php echo strtolower("{$_SESSION['account']['username']}.{$server['identifier']}");?>:<?php echo $AccountFetch['password_pterodactyl'];?>@<?php echo $this->SFTPHost($server['attributes']['node'])?>:<?php echo $this->SFTPPort($server['attributes']['node']);?>" style="max-width: 200px;margin: 0 auto;">WinSCP</a>' +
    '<br><br><br><center><b style="color: red;">Attention : Le protocole est SFTP. Veuillez bien à ne pas mettre FTP.</b></center>',

  showCancelButton: false,
  confirmButtonText: 'Générer un nouveau mot de passe',
  showLoaderOnConfirm: true,
  preConfirm: (login) => {
    return fetch(`/panel/generate`),
    location.reload()
  }
  }
)}
function DeleteBot() {
	Swal.fire({
  title: 'Êtes-vous sûr de supprimer <?php echo $this->Security($server['attributes']['name'])?>?',
  text: "Vous ne pourrez pas revenir en arrière!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Supprimer'
}).then((result) => {
  if (result.value) {
	return fetch("/service/<?php echo$Service['uuid']?>/deleteee"),
	setTimeout(function () {
     // after 2 seconds
     window.location = "/services";
  }, 2000),
    Swal.fire(
      'Supprimé!',
      'Votre bot a été supprimé avec succès',
      'success'
    )
  }
})
}
function CodeSupport() {
    Swal.fire({
  title: 'Code Support de <?php echo $this->Security($server['attributes']['name'])?>',
  input: 'text',
  inputValue: '<?php echo $Service['uuid']?>',
  inputAttributes: {
    autocapitalize: 'off',
    readonly: 'true'
  },
  html:
    '<center><b style="color: red;">Lorsque vous aurez besoin d\'aide, donnez ce code à un staff. Pour une intervention niveau code, il vous enverra une requête d\'autorisation d\'accès pour avoir accès à votre serveur pendant une durée maximale de 30 minutes.</b></center>',
  showCancelButton: false,
  confirmButtonText: 'Retour',
  showLoaderOnConfirm: true,
  }
)}
function ChangeVersionBot() {
	Swal.fire({
  title: 'Reinstaller <?php echo $this->Security($server['attributes']['name'])?>',
  type: 'warning',
  html:
    '<form id="rh_reinstall" action="/ajax/server/<?php echo $Service['uuid'];?>/reinstall/" method="post"> <div class="position-relative form-group"><label for="nodejs">Version Node.js</label><select id="nodejsSelect" class="form-control" name="nodejs"> <option value="08">0.8.x</option> <option selected="selected" value="010">0.10.x (Recommandé)</option> <option value="012">0.12.x</option><option value="013">0.13.x</option> </select></div>  <input type="hidden" id="uuid" name="uuid" value="<?php echo $Service['uuid']?>"></form>' +
	'<center><b style="color: red;">Une réinstallation implique une perte de données MySQL et fichiers.</b></center>',
  showCancelButton: true,
  focusConfirm: false,
  cancelButtonText:
    'Annuler',
  cancelButtonAriaLabel: 'Thumbs down',
  confirmButtonText:
    'Réinstaller mon serveur',
}).then((result) => {
  if (result.value) {
	setTimeout(function () {
     // after 2 seconds
     window.location = "/services";
  }, 2000),
  document.getElementById("rh_reinstall").submit();

    Swal.fire(
      'Réinstallation en cours',
      'Votre bot est en cours de réinstallation',
      'success'
    )
  }
})
}
function GoPanel(event) {
	setTimeout(function () {
		window.open('https://panel.ryzeheberg.fr', '_blank');
    }, 1500);
Swal.fire({
  type: 'success',
  title: 'Redirection en cours',
  showConfirmButton: false,
  timer: 1500,
})
}
function Update() {
	Swal.fire({
  title: 'Mettre à jour <?php echo $this->Security($server['attributes']['name'])?>',
  type: 'warning',
  html:
    '<form id="rh_update" action="/ajax/server/<?php echo $Service['uuid'];?>/update/" method="POST"><input type="hidden" id="uuid" name="uuid" value="<?php echo $Service['uuid'];?>"></form>' +
	'<center><b style="color: red;">Cela n\'affecte en aucun cas les fichiers.</b></center>',
  showCancelButton: true,
  focusConfirm: false,
  cancelButtonText:
    'Annuler',
  cancelButtonAriaLabel: 'Thumbs down',
  confirmButtonText:
    'Mettre à jour',
}).then((result) => {
  if (result.value) {
  document.getElementById("rh_update").submit();

    Swal.fire(
      'Mise à jour',
      'Votre bot sera mis à jour au prochain démarrage',
      'success'
    )
  }
})
}
</script>
<?php } else if ($Service['solution'] == "Site Web") {?>
	<script>
function SFTP() {
    Swal.fire({
  title: 'Accès FTP pour <?php echo $this->Security($Service['name'])?>',
  html:
     '<div class="form-group"> <label for="ip">Hôte du serveur FTP</label> <input type="text" class="form-control" id="ip" value="ftp.ryzeheberg.fr" readonly=""> </div>' +
    '<div class="form-group"> <label for="ip">Identifiant</label> <input type="text" class="form-control" id="ip" value="<?php echo strtolower($Service['uuid'])?>" readonly=""> </div>' +
    '<div class="form-group"> <label for="ip">Mot de passe</label> <input type="text" class="form-control" id="ip" value="<?php echo $Service['password']?> (Si vous ne l\'avez pas changé)" readonly=""> </div>' +
    '<div class="form-group"> <label for="ip">Port</label> <input type="text" class="form-control" id="ip" value="21" readonly=""> </div>' +
    '<br><br><br><center><b style="color: red;">Attention : Le protocole est FTP. Veuillez bien à ne pas mettre SFTP.</b></center>',

  showCancelButton: false,
  showConfirmButton: false,
  }
)}
function DeleteBot() {
	Swal.fire({
  title: 'Êtes-vous sûr de supprimer <?php echo $this->Security($Service['name'])?>?',
  text: "Vous ne pourrez pas revenir en arrière!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Supprimer'
}).then((result) => {
  if (result.value) {
	return fetch("/service/<?php echo$Service['uuid']?>/deleteee"),
	setTimeout(function () {
     // after 2 seconds
     window.location = "/services";
  }, 2000),
    Swal.fire(
      'Supprimé!',
      'Votre site a été supprimé avec succès',
      'success'
    )
  }
})
}
function CodeSupport() {
    Swal.fire({
  title: 'Code Support de <?php echo $this->Security($Service['name'])?>',
  input: 'text',
  inputValue: '<?php echo $Service['uuid']?>',
  inputAttributes: {
    autocapitalize: 'off',
    readonly: 'true'
  },
  html:
    '<center><b style="color: red;">Lorsque vous aurez besoin d\'aide, donnez ce code à un staff. Malgrès qu\'il ai le code support, il ne pourra pas toucher/voir vos fichiers.</b></center>',
  showCancelButton: false,
  confirmButtonText: 'Retour',
  showLoaderOnConfirm: true,
  }
)}
function GoPanel(event) {
	setTimeout(function () {
		window.open('https://web.ryzeheberg.fr:2083', '_blank');
    }, 1500);
Swal.fire({
  type: 'success',
  title: 'Redirection en cours',
  showConfirmButton: false,
  timer: 1500,
})
}
function Password() {
    Swal.fire({
  title: 'Identifiants de <?php echo $this->Security($Service['name'])?>',
  html:
     '<div class="form-group"> <label for="ip">Identifiant</label> <input type="text" class="form-control" id="ip" value="<?php echo strtolower($Service['uuid'])?>" readonly=""> </div>' +
    '<div class="form-group"> <label for="ip">Mot de passe</label> <input type="text" class="form-control" id="ip" value="<?php echo $Service['password']?>" readonly=""> </div>' +
	'<center><a href="https://web.ryzeheberg.fr" target="_blank">Se connecter au Panel</a></center>',
  showCancelButton: false,
  confirmButtonText: 'Retour',
  showLoaderOnConfirm: true,
  }
)}
function NameServers() {
    Swal.fire({
  title: 'Noms de serveurs de <?php echo $this->Security($Service['name'])?>',
  html:
     '<div class="form-group"> <label for="ip">Nom de serveur 1</label> <input type="text" class="form-control" id="ip" value="ns1.ryzeheberg.fr" readonly=""> </div>' +
    '<div class="form-group"> <label for="ip">Nom de serveur 2</label> <input type="text" class="form-control" id="ip" value="ns2.ryzeheberg.fr" readonly=""> </div>',
  showCancelButton: false,
  confirmButtonText: 'Retour',
  showLoaderOnConfirm: true,
  }
)}
</script>
<?php }?>