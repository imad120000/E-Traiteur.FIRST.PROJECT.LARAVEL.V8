<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/css/utility.css">
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <title>Etraiteur | Dashboard</title>
</head>

<body>
  <section class="dashboard">
    <aside class="dashboard__sidebar">
      <header class="border-bottom px-3 d-flex align-items-center justify-content-between">
        <span class="dashboard__logo">
          etraiteur 
        </span>
        <i class="ti-align-right h4 mb-0"></i>
      </header>
      <section class="dashboard__sidebar-nav">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="ps-3 nav-link active" aria-current="page" href="profile.html">
              <i class="icon ti-layout"></i>
              Tableau de bord
            </a>
          </li>
          <li class="nav-item">
            <a class="ps-3 nav-link" aria-current="page" href="anonce.html">
              <i class="icon ti-announcement"></i>
              Anonces
            </a>
          </li>
          <li class="nav-item">
            <a class="ps-3 nav-link" href="#demandes" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="demandes">
              <i class="icon ti-email"></i>
              Demandes
              <i class="ti-angle-down ms-auto"></i>
            </a>
            <div class="collapse dashboard__sidebar-collapse" id="demandes">
              <ul class="nav flex-column ps-3">
                <li class="nav-item">
                  <a class="nav-link" href="account-activation.html">Activation de compte</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ajout-service.html">Ajout de service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="autre-demande.html">Autre demandes</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="ps-3 nav-link" href="#utilisateurs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="utilisateurs">
              <i class="icon ti-user"></i>
              Utilisateurs
              <i class="ti-angle-down ms-auto"></i>
            </a>
            <div class="collapse dashboard__sidebar-collapse" id="utilisateurs">
              <ul class="nav flex-column ps-3">
                <li class="nav-item">
                  <a class="nav-link" href="utilisateur-classment.html">Classment</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="utilisateur-document.html">Documents</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="ps-3 nav-link" href="statistiques.html">
              <i class="icon ti-bar-chart"></i>
              Statistiques
            </a>
          </li>
        </ul>
      </section>
    </aside>
    <main class="dashboard__main">
      <nav class="dashboard__navbar">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item dropdown ms-auto">
              <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="avatar" src="../assets/images/user.png" alt="">
              </button>
              <ul class="dropdown-menu dashboard__navbar-dropdown">
                <li class="user">
                  Monsieur <span class="user__name">LeNom</span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">
                  <i class="ti-shift-right"></i>
                  Se déconnecter
                </a></li>
                <li><a class="dropdown-item" href="change-password.html">
                  <i class="ti-key"></i>
                  Changer le mot de pass
                </a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- main content -->
      <div class="main__content">
        <div class="container">
          <h1 class="text-center dashboard__title">Autres demandes</h1>
          <section class="dashboard__table-de-bord">
            <article class="dashboard__table-de-bord-body">
              <form class="d-flex flex-column" action="">
                <article class="dashboard__table-de-bord-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="dashboard__table-de-bord-card">
                        <div class="dashboard__table-de-bord-card-body">
                          <label class="form-label" for="">Mot de passe actuel</label>
                          <input class="form-control custom-input mb-3" type="password" placeholder="Votre ancien mot de passe" required>
                          <label class="form-label" for="">Nouveau mot de passe</label>
                          <input class="form-control custom-input mb-3" type="password" placeholder="Votre nouveau mot de passe" required>
                          <label class="form-label" for="">Confirmer le nouveau mot de passe</label>
                          <input class="form-control custom-input mb-3" type="password" placeholder="Confirmer votre nouveau mot de passe" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto ms-auto mt-3">
                      <div class="btn-group fit-content" role="group">
                        <button type="reset" class="btn btn-default dashboard__tdb-btn-default bg-white">Annuler</button>
                        <button type="submit" class="btn btn-primary rounded-0">Changer mot de passe</button>
                      </div>
                    </div>
                  </div>
                </article>

              </form>
            </article>
          </section>
        </div>
      </div>
    </main>
  </section>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>