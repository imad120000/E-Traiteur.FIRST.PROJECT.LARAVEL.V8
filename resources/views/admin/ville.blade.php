
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../vendor/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/utility.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/base.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
    <title>Etraiteur | Dashboard</title>
</head>

<body>




    <section class="dashboard">
        <aside class="dashboard__sidebar">
            <header class="border-bottom px-3 d-flex align-items-center justify-content-between">
                <br>
                <a href="/admin" class="navbar-brand fs-3"><img src="../assets/images/Logo wight.png" width="150">
                </a>
                <br><br><br>
                <i class="ti-align-right h4 mb-0"></i>
            </header>
            <section class="dashboard__sidebar-nav">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="ps-3 nav-link" aria-current="page" href="/admin">
                            <i class="icon ti-layout"></i>
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link" aria-current="page" href="/admin/annonces">
                            <i class="icon ti-announcement"></i>
                            Annonces
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link" aria-current="page" href="/admin/services">
                            <i class="icon ti-announcement"></i>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link active" aria-current="page" href="/admin/services">
                            <i class="icon ti-announcement"></i>
                            Villes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link" href="#demandes" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="demandes">
                            <i class="icon ti-email"></i>
                            Demandes
                            <i class="ti-angle-down ms-auto"></i>
                        </a>
                        <div class="collapse dashboard__sidebar-collapse" id="demandes">
                            <ul class="nav flex-column ps-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/users/non-active">Utilisateurs non activés</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/demandes">Demandes de Ranking</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/emessages">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/messages">Autre demandes</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link" href="#utilisateurs" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="utilisateurs">
                            <i class="icon ti-user"></i>
                            Utilisateurs
                            <i class="ti-angle-down ms-auto"></i>
                        </a>
                        <div class="collapse dashboard__sidebar-collapse" id="utilisateurs">
                            <ul class="nav flex-column ps-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/users">Tous les utilisateurs</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link" href="/statistiques">
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
                    <button class="btn btn-primary rounded-0 d-flex align-items-center" role="button"
                        data-bs-toggle="modal" data-bs-target="#add-service">
                        <i class="ti-plus me-2"></i>
                        Ajouté une Villes
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown ms-auto">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="avatar" src="/assets/images/user.png" alt="">

                            </button>
                            <ul class="dropdown-menu dashboard__navbar-dropdown">
                                <li class="user">
                                    Monsieur
                                    <span class="user__name">Admin E-Traiteur</span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/admin/change-password">
                                        <i class="ti-key"></i>
                                        Changer le mot de passe
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/admin/logout">
                                        <i class="ti-shift-right"></i>
                                        Se déconnecter
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- main content -->
            <div class="main__content">
                <div class="container">
                    <h1 class="text-center dashboard__title">Ajout de ville</h1>

                    <section class="dashboard__table-de-bord">
                        <article class="dashboard__table-de-bord-body">
                            <form class="d-flex mb-3" method="get">
                                <input class="form-control rounded-0 me-3 search-field" type="text" name="search"
                                    value="" placeholder="Rechercher une annonce">
                                <button type="submit" class="btn btn-primary rounded-0">Chercher</button>
                            </form>
                            <table class="table table-bordered dashboard__tdb-table">
                                <thead>
                                    <tr class="text-center">
                                        <td>villes</td>
                                        <td>Date de Creation</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                     <tbody>
                                        <tr id="service-1">
                                            <td class="text-center pt-4">
                                                Oujda
                                                
                                            </td>
                                            <td class="text-center pt-4"> 2023-05-01 08:16:01</td>
                                            <td class="pt-3">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit"
                                                        class="delete-service-btn btn dashboard__tdb-btn"
                                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                        data-id="1">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                                                    <tbody>
                                        <tr id="service-1">
                                            <td class="text-center pt-4">
                                                Taza
                                                
                                            </td>
                                            <td class="text-center pt-4"> 2023-05-01 08:17:37</td>
                                            <td class="pt-3">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit"
                                                        class="delete-service-btn btn dashboard__tdb-btn"
                                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                        data-id="1">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                                            </table>
                        </article>
                        <div class="modal fade" id="confirmDeleteModal" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                style="min-width: 45rem;">
                                <div class="modal-content rounded-0 bg-main border-0">
                                    <div class="modal-header border-0">
                                        <h1 class="modal-title fs-5 text-primary text-center w-100"
                                            id="confirmModalLabel">
                                            Confirmer votre action
                                        </h1>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">
                                            <span id="confirmModalMessage">Vous êtes sure ?</span>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-default dashboard__tdb-btn-default"
                                            data-bs-dismiss="modal">
                                            Annuler
                                        </button>
                                        <form id="delete-service-form">
                                            <button data-bs-dismiss="modal" type="submit"
                                                class="btn btn-primary rounded-0">
                                                Confirmer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="modal fade" id="add-service" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="open modal to add service" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
                    <div class="modal-content rounded-0 bg-main border-0">
                        <form method="POST" action="http://127.0.0.1:8000/admin/ajout-service" id="add-service-form">
                          <input type="hidden" name="_token" value="fGpBfQuMxufmrWkPA4WY95Q22kLDA7jKhXvlLg86">                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">
                                    Ajouter un ville
                                </h1>
                                <div class="btn-group" role="group">
                                    <button type="reset" class="btn btn-default dashboard__tdb-btn-default"
                                        data-bs-dismiss="modal">
                                        Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary rounded-0">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body p-0">
                                <table class="table table-bordered border-main m-0">
                                    <tr>
                                        <td class="pt-3">Service</td>
                                        <td>
                                            <input name="service" type="text"  class="form-control" />
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src="../assets/js/alerts.js"></script>
    <script src="../vendor/js/bootstrap.bundle.min.js"></script>


</body>

</html>
