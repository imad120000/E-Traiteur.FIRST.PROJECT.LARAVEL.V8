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
            <a class="ps-3 nav-link" aria-current="page" href="profile.html">
              <i class="icon ti-layout"></i>
              Tableau de bord
            </a>
          </li>
          <li class="nav-item">
            <a class="ps-3 nav-link active" aria-current="page" href="#">
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
      <nav class="navbar p-0 dashboard__navbar">
        <div class="container-fluid">
          <button class="btn btn-primary rounded-0 d-flex align-items-center" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="ti-plus me-2"></i>
            Ajouter une annonce
          </button>
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
          <h1 class="text-center dashboard__title">Vos annonce</h1>

          <section class="dashboard__table-de-bord">
            <article class="dashboard__table-de-bord-body">
              <form class="d-flex mb-3" action="">
                <input class="form-control rounded-0 me-3 search-field" type="text" placeholder="Rechercher une annonce">
                <button class="btn btn-primary rounded-0">Chercher</button>
              </form>
              <table class="table table-bordered dashboard__tdb-table">                  
                <thead>
                  <tr class="text-center">
                    <td>Titre</td>
                    <td>Date de création</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="table__img-container me-2">
                          <img class="table__img" src="https://picsum.photos/id/1/200/100" alt="">
                        </div>
                        <p class="table__description">
                          Le meilleur traiteur de l'année est Fathi Evine.
                        </p>
                      </div>
                    </td>
                    <td class="text-center pt-4">
                      08/10/2025 10:52
                    </td>
                    <td class="pt-3">
                      <div class="d-flex justify-content-center">
                        <a class="btn dashboard__tdb-btn" href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a class="btn dashboard__tdb-btn" href="#" data-bs-toggle="modal" data-bs-target="#editModal">
                          <i class="ti-pencil"></i>
                        </a>
                        <a class="btn dashboard__tdb-btn" href="#" data-bs-toggle="modal" data-bs-target="#confirmModal">
                          <i class="ti-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="table__img-container me-2">
                          <img class="table__img" src="https://picsum.photos/id/1/200/100" alt="">
                        </div>
                        <p class="table__description">
                          Le meilleur traiteur de l'année est Fathi Evine.
                        </p>
                      </div>
                    </td>
                    <td class="text-center pt-4">
                      08/10/2025 10:52
                    </td>
                    <td class="pt-3">
                      <div class="d-flex justify-content-center">
                        <a class="btn dashboard__tdb-btn" href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a class="btn dashboard__tdb-btn" href="#">
                          <i class="ti-pencil"></i>
                        </a>
                        <a class="btn dashboard__tdb-btn" href="#">
                          <i class="ti-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="table__img-container me-2">
                          <img class="table__img" src="https://picsum.photos/id/1/200/100" alt="">
                        </div>
                        <p class="table__description">
                          Le meilleur traiteur de l'année est Fathi Evine.
                        </p>
                      </div>
                    </td>
                    <td class="text-center pt-4">
                      08/10/2025 10:52
                    </td>
                    <td class="pt-3">
                      <div class="d-flex justify-content-center">
                        <a class="btn dashboard__tdb-btn" href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a class="btn dashboard__tdb-btn" href="#">
                          <i class="ti-pencil"></i>
                        </a>
                        <a class="btn dashboard__tdb-btn" href="#">
                          <i class="ti-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </article>
          </section>
        </div>
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
            <div class="modal-content rounded-0 bg-main border-0">
              <form action="">
                <div class="modal-header border-0">
                  <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">Ajouter un utilisateur</h1>
                  <div class="btn-group" role="group">
                    <button type="reset" class="btn btn-default dashboard__tdb-btn-default" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary rounded-0">Ajouter</button>
                  </div>
                </div>
                <div class="modal-body p-0">
                  <table class="table table-bordered border-main m-0">
                    <tr>
                      <td class="pt-3">Titre</td>
                      <td>
                        <input type="text" class="form-control custom-input">
                      </td>
                    </tr>
                    <tr>
                      <td class="pt-3">Service</td>
                      <td>
                        <textarea class="form-control custom-input" name=""></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td>Image</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="input-group fit-content">
                            <input class="d-none" type="file" id="photosUpload" multiple>
                            <label class="file-input" for="photosUpload">
                              <i class="ti-image me-2"></i> Images à importer
                            </label>
                          </div>
                          <span class="text-small text-muted ms-2">Taille max des photos est 3MB</span>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
            <div class="modal-content rounded-0 bg-main border-0">
              <div class="modal-header border-0">
                <h1 class="modal-title fs-5 text-primary" id="editModalLabel">Editer une annonce</h1>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-default dashboard__tdb-btn-default" data-bs-dismiss="modal">Annuler</button>
                  <button type="button" class="btn btn-primary rounded-0">Maitre a jours</button>
                </div>
              </div>
              <div class="modal-body p-0">
                <table class="table table-bordered border-main m-0">
                  <tr>
                    <td class="pt-3">Titre</td>
                    <td>
                      <input type="text" class="form-control custom-input">
                    </td>
                  </tr>
                  <tr>
                    <td class="pt-3">Service</td>
                    <td>
                      <textarea class="form-control custom-input" name=""></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td class="pt-3">Image</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="input-group fit-content">
                          <input class="d-none" type="file" id="photosUpload" multiple>
                          <label class="file-input" for="photosUpload">
                            <i class="ti-image me-2"></i> Images à importer
                          </label>
                        </div>
                        <span class="text-small text-muted ms-2">Taille max des photos est 3MB</span>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
            <div class="modal-content rounded-0 bg-main border-0">
              <div class="modal-header border-0">
                <h1 class="modal-title fs-5 text-primary text-center w-100" id="confirmModalLabel">Confirmer votre action</h1>
              </div>
              <div class="modal-body">
                <p class="text-center">
                  <span id="confirmModalMessage">Vous êtes sure ?</span>  
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default dashboard__tdb-btn-default" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary rounded-0">Confirmer</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>