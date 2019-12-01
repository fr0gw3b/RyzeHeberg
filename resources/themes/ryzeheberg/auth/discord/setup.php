<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php
												$_SESSION['setup_discord'] = array(
													'username' => $user->username,
													'avatar' => $user->avatar,
													'id' => $user->id
												);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?php echo $title?>
  </title>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link href="/themes/<?php echo $_ENV['APP_THEME'];?>/css/animate.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/3364714dc1.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/bootstrap-notify.js"></script>
  <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/bootstrap-notify.min.js"></script>
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="/">
          <img src="/themes/<?php echo $_ENV['APP_THEME'];?>/logo.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="/">
                  <img src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="/">
                <i class="fas fa-arrow-left"></i>
                <span class="nav-link-inner--text">Retour sur le site</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Bienvenue <?php echo $this->Security($user->username)?> !</h1>
              <p class="text-lead text-light">Configuration du compte Discord (1/1)</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Veuillez choisir un nom d'utilisateur</small>
              </div>
              <form class="form-full-width" id="rh_setup">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nom d'utilisateur" name="username" type="text">
                  </div>
                </div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" name="agree" type="checkbox" id="agree" value="yes">
                      <label class="custom-control-label" for="agree">
                        <span class="text-muted">J'accepte les <a href="#!">Conditions d'utilisations</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <br>
                <center><div class="g-recaptcha" data-sitekey="<?php echo $_ENV['RECAPTCHA_PUBLIC_KEY'];?>"></div><center>
                <div class="text-center">
                  <button class="btn btn-primary mt-4">Créer mon compte</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="error"></div>
  <!-- Footer -->
  <footer class="py-5">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            © 2019 <a href="https://ryzeheberg.fr" class="font-weight-bold ml-1" target="_blank">RyzeHeberg</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
  </div>
  <!--   Core   -->
  <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="/themes/<?php echo $_ENV['APP_THEME'];?>/ajax/register_discord.js"></script>
</body>

</html>