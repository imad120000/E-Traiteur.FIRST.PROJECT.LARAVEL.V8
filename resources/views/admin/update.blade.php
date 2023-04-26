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
                    <a class="ps-3 nav-link" href="#demandes" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="demandes">
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
                    <a class="ps-3 nav-link" href="#utilisateurs" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="utilisateurs">
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
                <button class="btn btn-primary rounded-0 d-flex align-items-center" role="button"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                            <li>
                                <hr class="dropdown-divider">
                            </li>
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
                <form action="{{ route('admin.updateannonce', $a->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5 text-primary" id="editModalLabel">Editer une annonce
                        </h1>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dashboard__tdb-btn-default"
                                data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary rounded-0">Maittre a
                                jours</button>
                        </div>
                    </div>
                    <div class="modal-body p-0">
                        <table class="table table-bordered border-main m-0">
                            <tr>
                                <td class="pt-3">Titre</td>
                                <td>
                                    <input type="text" class="form-control custom-input" name="titleU"
                                        value="{{ $a->title }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3">Service</td>
                                <td>
                                    <textarea class="form-control custom-input" name="centenuU">{{ $a->centenu }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3">Image</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="input-group fit-content">
                                            <input class="d-none" type="file" id="photosUpload" name="imageU">
                                            <label class="file-input" for="photosUpload">
                                                <i class="ti-image me-2"></i> Images à importer
                                            </label>
                                        </div>
                                        <span class="text-small" style="color:red">Taille max des photos
                                            est 3MB</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>