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
                        <a class="ps-3 nav-link" aria-current="page" href="anonce.html">
                            <i class="icon ti-announcement"></i>
                            Anonces
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ps-3 nav-link active" href="#demandes" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="demandes">
                            <i class="icon ti-email"></i>
                            Demandes
                            <i class="ti-angle-down ms-auto"></i>
                        </a>
                        <div class="collapse dashboard__sidebar-collapse show" id="demandes">
                            <ul class="nav flex-column ps-3">
                                <li class="nav-item">
                                    <a class="nav-link " href="#">Activation de compte</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="ajout-service.html">Classment </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ajout-service.html">Message </a>
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
                    <h1 class="text-center dashboard__title">Demandes de Ranking</h1>

                    <section class="dashboard__table-de-bord">
                        <article class="dashboard__table-de-bord-body">
                            <table class="table table-bordered dashboard__tdb-table">
                                <thead>
                                    <tr class="text-center">
                                        <td>Utilisateur</td>
                                        <td>Status</td>
                                        <td>Rank</td>
                                        <td>Date de création</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                @foreach ($classment as $c)
                                    <tbody>
                                        <tr id="demand-3">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="table__img-container me-2">

                                                    </div>
                                                    <p class="table__description">{{ $c->user->name }}
                                                        {{ $c->user->prenom }}</p>
                                                    <a class="btn dashboard__tdb-btn view-client-infos" href="#"
                                                        role="button" data-bs-toggle="modal"
                                                        data-bs-target="#client-information-10{{ $c->id }}">
                                                        <i class="ti-folder"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $c->status }}</td>
                                            <td class="text-center">{{ $c->classment }}</td>
                                            <td class="text-center">{{ $c->created_at }}</td>
                                            <td class="pt-3">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn dashboard__tdb-btn" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirm-demand-3{{ $c->id }}">
                                                        <i class="ti-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            @foreach ($classment as $a)
                                <div class="modal fade" id="client-information-10{{ $a->id }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        style="min-width: 45rem;">
                                        <div class="modal-content rounded-0 bg-main border-0">
                                            <div class="modal-header border-0 d-flex align-items-center">
                                                <h1 class="modal-title fs-5 text-primary">{{ $a->user->NomCommercial }}
                                                </h1>
                                                <button type="button"
                                                    class="btn btn-default dashboard__tdb-btn-default"
                                                    data-bs-dismiss="modal">Annuler
                                                </button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <table class="table table-bordered border-main m-0">

                                                    <tr>
                                                        <th>Nom</th>
                                                        <td>{{ $a->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Prénom</th>
                                                        <td>{{ $a->user->prenom }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>
                                                            <a
                                                                href="mailto:{{ $a->user->email }}">{{ $a->user->email }}</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Numéro de télephone</th>
                                                        <td>{{ $a->user->tele }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Services</th>
                                                        <td>{{ $a->service->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ville</th>
                                                        <td>{{ $a->user->ville->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Profile</th>
                                                        <td>{{ $a->user->profile }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Statut</th>
                                                        <td>{{ $a->user->status }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Justificatif CIN 1 :</th>
                                                        <td>
                                                            <img class="modal-thumb"
                                                                src="{{ asset('cin1/' . $a->user->cinDocument1) }}"
                                                                width="70" alt="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Justificatif CIN 2 :</th>
                                                        <td>
                                                            <img class="modal-thumb"
                                                                src="{{ asset('cin2/' . $a->user->cinDocument2) }}"
                                                                width="70" alt="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Justificatif Status</th>
                                                        <td>
                                                            <img class="modal-thumb"
                                                                src="{{ asset('status/' . $a->user->statusDocument) }}"
                                                                width="70" alt="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Justificatif Profile</th>
                                                        <td>
                                                            <img class="modal-thumb"
                                                                src="{{ asset('profile/' . $a->user->profileDocument) }}"
                                                                width="70" alt="">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($classment as $f)
                                <form method="post" action="{{ route('admin.activeclassment', $f->id) }}">
                                    @csrf
                                    <div class="modal fade" id="modal-confirm-demand-3{{ $f->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            style="min-width: 45rem;">
                                            <div class="modal-content rounded-0 bg-main border-0">
                                                <div class="modal-header border-0">
                                                    <h1 class="modal-title fs-5 text-primary text-center w-100"
                                                        id="confirmModalLabel">Confirmer votre action</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center">
                                                        <span id="confirmModalMessage">Vous êtes sure ?</span>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-default dashboard__tdb-btn-default"
                                                        data-bs-dismiss="modal">Annuler
                                                    </button>
                                                    
                                                    <button type="submit"
                                                        class="btn btn-primary rounded-0 confirm-demand-btn"
                                                        data-bs-toggle="modal" data-demand-id="3">
                                                        Confirmer
                                                    </button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </article>
                    </section>
                </div>
            </div>
        </main>
    </section>
    <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>
