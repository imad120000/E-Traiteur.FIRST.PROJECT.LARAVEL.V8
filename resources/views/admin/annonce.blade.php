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
                    <img src="../assets/images/Logo wight.png" width="150">
                </span>
                <i class="ti-align-right h4 mb-0"></i>
            </header>
            <section class="dashboard__sidebar-nav">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="ps-3 nav-link" aria-current="page" href="{{ route('admin.profile') }}">
                            <i class="icon ti-layout"></i>
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link active" aria-current="page" href="{{ route('admin.annonce') }}">
                            <i class="icon ti-announcement"></i>
                            Anonces
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link " aria-current="page" href="{{ route('admin.addservice') }}">
                            <i class="icon ti-announcement"></i>
                            Service
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link " aria-current="page" href="{{ route('admin.ville') }}">
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
                        <div class="collapse dashboard__sidebar-collapse " id="demandes">
                            <ul class="nav flex-column ps-3">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.activecompte') }}">Activation de
                                        compte</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.classment') }}">Classment </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.message') }}">Message </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.autredemande') }}">Autre demandes</a>
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
                                    <a class="nav-link" href="{{ route('admin.document') }}">Documents</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link" href="statistiques">
                            <i class="icon ti-bar-chart"></i>
                            Statistiques
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <main class="dashboard__main">
            <nav class="navbar py-0 dashboard__navbar">
                <div class="container-fluid">
                    <button class="btn btn-primary rounded-0 d-flex align-items-center" role="button"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti-plus"></i>
                        Ajouter un Annonce
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown ms-auto">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="avatar" src="../assets/images/user.png" alt="">
                            </button>
                            <ul class="dropdown-menu dashboard__navbar-dropdown">
                                <li class="user">
                                    Bonjour <span class="user__name">Admin</span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="ti-shift-right"></i>
                                        Se Deconnecté</a>
                                    <form action="{{ route('admin.logout') }}" id="logout-form" method="post">
                                        @csrf
                                    </form>
                                </li>
                                <li><a class="dropdown-item" href="">
                                        <i class="ti-key"></i>
                                        Changer le mot de pass
                                    </a></li>
                            </ul>
                        </li>
                    </ul>

            </nav>
            <!-- main content -->
            <div class="main__content">
                <h1 class="text-center dashboard__title">Vos annonce</h1>
                <section class="dashboard__table-de-bord">
                    <article class="dashboard__table-de-bord-body">
                        <table class="table table-bordered dashboard__tdb-table">
                            <thead>
                                <tr class="text-center">
                                    <td>Titre</td>
                                    <td>Date de création</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($annonce as $a)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="table__img-container me-2">
                                                    <img class="table__img"
                                                        src="{{ asset('annonceadmin/' . $a->image) }}" width="80px"
                                                        style="background-size: cover" alt="">
                                                </div>
                                                <p class="table__description">
                                                    {{ $a->title }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-center pt-4">
                                            {{ $a->created_at }}
                                        </td>
                                        <td class="pt-3">
                                            <div class="d-flex justify-content-center">
                                                <a class="btn dashboard__tdb-btn" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $a->id }}">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a class="btn dashboard__tdb-btn" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#confirmModal{{ $a->id }}">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </article>
                </section>
            </div>
            </div>


            {{-- Add Annonce --}}
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
                    <div class="modal-content rounded-0 bg-main border-0">
                        <form action="{{ route('admin.addannonce') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">Ajouter un
                                    utilisateur</h1>
                                <div class="btn-group" role="group">
                                    <button type="reset" class="btn btn-default dashboard__tdb-btn-default"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary rounded-0">Ajouter</button>
                                </div>
                            </div>
                            <div class="modal-body p-0">
                                <table class="table table-bordered border-main m-0">
                                    <tr>
                                        <td class="pt-3">Titre</td>
                                        <td>
                                            <input type="text" class="form-control custom-input" name="title">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-3">Description</td>
                                        <td>
                                            <textarea class="form-control custom-input" name="centenu"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="input-group fit-content">
                                                    <input class="d-none" type="file" id="photosUpload"
                                                        name="image">
                                                    <label class="file-input" for="photosUpload">
                                                        <i class="ti-image me-2"></i> Images à importer
                                                    </label>
                                                </div>
                                                <span class="text-small" style="color:red">Taille max des photos est
                                                    3MB</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Update Annonce --}}
            @foreach ($annonce as $p)
                <div class="modal fade" id="editModal{{ $p->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
                        <div class="modal-content rounded-0 bg-main border-0">
                            <form action="{{ route('admin.updateannonce', $p->id) }}" method="post"
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
                                                <input type="text" class="form-control custom-input"
                                                    name="titleU" value="{{ $p->title }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-3">Service</td>
                                            <td>
                                                <textarea class="form-control custom-input" name="centenuU">{{ $p->centenu }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-3">Image</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="input-group fit-content">
                                                        <input type="file" id="photosUpload" name="imageU"
                                                            required>

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
                </div>
            @endforeach



            {{-- Delete Annonce --}}
            @foreach ($annonce as $d)
                <div class="modal fade" id="confirmModal{{ $d->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
                        <form method="post" action="{{ route('admin.deleteannonce', $d->id) }}"
                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                            style="min-width: 45rem;">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content rounded-0 bg-main border-0">
                                <div class="modal-header border-0">
                                    <h1 class="modal-title fs-5 text-primary text-center w-100"
                                        id="confirmModalLabel">
                                        Confirmer votre action</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">
                                        <span id="confirmModalMessage">Vous êtes sure ?</span>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default dashboard__tdb-btn-default"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary rounded-0">Confirmer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach


            </div>
        </main>
    </section>
    <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>
