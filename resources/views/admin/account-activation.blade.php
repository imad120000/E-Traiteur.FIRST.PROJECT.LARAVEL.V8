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
                                    <a class="nav-link active" href="#">Activation de compte</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ajout-service.html">Classment </a>
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
                    <h1 class="text-center dashboard__title">Activation de compte</h1>

                    <section class="dashboard__table-de-bord">
                        <article class="dashboard__table-de-bord-body">
                            <form class="d-flex mb-3" action="">
                                <input class="form-control rounded-0 me-3 search-field" type="text"
                                    placeholder="Rechercher une annonce">
                                <button class="btn btn-primary rounded-0">Chercher</button>
                            </form>
                            <table class="table table-bordered dashboard__tdb-table">
                                <thead>
                                    <tr class="text-center">
                                        <td>Nom Commercial</td>
                                        <td>Dossier</td>
                                        <td>Date de demande</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                @foreach ($compte as $c)
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="table__img-container me-2">
                                                        <img class="table__img"
                                                            src="{{ asset('profile/' . $c->profileDocument) }}"
                                                            width="80px" style="background-size: cover"
                                                            alt="">
                                                    </div>
                                                    <p class="table__description">
                                                        {{ $c->NomCommercial }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="pt-3">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn dashboard__tdb-btn" href="#" role="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $c->id }}">
                                                        <i class="ti-folder"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center pt-4">
                                                {{ $c->created_at }}
                                            </td>
                                            <td class="pt-3">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn dashboard__tdb-btn" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $c->id }}">
                                                        <i class="ti-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>

                            {{-- Delete le compte --}}
                            @foreach ($compte as $z)
                                <form method="post" action="{{route('admin.deletecompte',$z->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="delete{{ $z->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            style="min-width: 45rem;">
                                            <div class="modal-content rounded-0 bg-main border-0">
                                                <div class="modal-header border-0">
                                                    <h1 class="modal-title fs-5 text-primary text-center w-100"
                                                        id="confirmModalLabel">Confirmer votre action</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center">
                                                        <span id="confirmModalMessage">Vous êtes sure pour supprimé
                                                            {{ $z->name }} - {{ $z->prenom }} ?</span>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-default dashboard__tdb-btn-default"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                    <button type="submit"
                                                        class="btn btn-primary rounded-0">Confirmer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach


                            {{-- Info of all users --}}
                            @foreach ($compte as $a)
                                <form method="post" action="{{ route('admin.active', $a->id) }}">
                                    @csrf
                                    <div class="modal fade" id="exampleModal{{ $a->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            style="min-width: 45rem;">
                                            <div class="modal-content rounded-0 bg-main border-0">
                                                <div class="modal-header border-0">
                                                    <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">
                                                        {{ $a->NomCommercial }}</h1>
                                                    <div class="btn-group" role="group">
                                                        <button type="button"
                                                            class="btn btn-default dashboard__tdb-btn-default"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit"
                                                            class="btn btn-primary rounded-0">Activer</button>
                                                    </div>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <table class="table table-bordered border-main m-0">
                                                        <tr>
                                                            <th>Nom</th>
                                                            <td>{{ $a->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Prenom</th>
                                                            <td>{{ $a->prenom }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td>{{ $a->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Numéro de télephone </th>
                                                            <td>{{ $a->tele }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Services</th>
                                                            <td>{{ $a->service->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Ville</th>
                                                            <td>{{ $a->ville->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <td>{{ $a->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Profile</th>
                                                            <td>{{ $a->profile }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Justificatif CIN 1 :</th>
                                                            <td>
                                                                <img class="modal-thumb"
                                                                    src="{{ asset('cin1/' . $a->cinDocument1) }}"
                                                                    width="70" alt="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Justificatif CIN 2 :</th>
                                                            <td>
                                                                <img class="modal-thumb"
                                                                    src="{{ asset('cin2/' . $a->cinDocument2) }}"
                                                                    width="70" alt="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Justificatif Status</th>
                                                            <td>
                                                                <img class="modal-thumb"
                                                                    src="{{ asset('status/' . $a->statusDocument) }}"
                                                                    width="70" alt="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Justificatif Profile</th>
                                                            <td>
                                                                <img class="modal-thumb"
                                                                    src="{{ asset('profile/' . $a->profileDocument) }}"
                                                                    width="70" alt="">
                                                            </td>
                                                        </tr>
                                                    </table>
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
