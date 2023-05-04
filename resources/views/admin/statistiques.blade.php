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
                        <a class="ps-3 nav-link" aria-current="page" href="{{ route('admin.annonce') }}">
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
                        <a class="ps-3 nav-link active" href="statistiques">
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
                                    <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf
                                    </form>
                                </li>
                                <li><a class="dropdown-item" href="">
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
                    <h1 class="text-center dashboard__title">Statistiques</h1>
                    <nav>
                        <div class="nav nav-tabs border-0 nav-pills mb-3 justify-content-center dashboard__navtabs"
                            id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#state-today" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Aujourd'hui</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#state-yesterday" type="button" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Hier</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#state-week" type="button" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Cette semaine</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#state-month" type="button" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Ce mois-ci</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#state-year" type="button" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Cette année</button>
                          
                        </div>
                    </nav>

                    <div class="tab-content" id="states">
                        <div class="tab-pane fade show active" id="state-today" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">Revenues</div>
                                            <div class="card-text h2">{{ $revenu_today }} MAD</div>
                                          
                                        </div>
                                    </div>

                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title fs-6">Top Pays</div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    @foreach ($country_today as $item)
                                                        <tr>
                                                            <td>{{ $item->country }}</td>
                                                            <td class="text-end">{{ $item->visits_count }} visiteurs
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">
                                                Total de demandes
                                            </div>
                                            <div class="card-text h2">
                                                {{ $today }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                Demandes par types
                                            </div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    <tr>
                                                        <td>Abonnement</td>
                                                        <td class="text-end">{{ $demandeA_today }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Classment</td>
                                                        <td class="text-end">{{ $demandeclassment_today }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Autre Demande</td>
                                                        <td class="text-end">{{ $demande_today }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">Trafic</div>
                                            <div class="card  border-0 bg-main rounded-4 mb-2">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs</div>
                                                    <div class="card-text"> {{ $total_today }}</div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-main rounded-4">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs par type d'appareil
                                                    </div>
                                                    <div class="card-text">
                                                        <table class="w-100">
                                                            @foreach ($device_today as $d)
                                                                <tr>
                                                                    <td>{{ $d->device_type }}</td>
                                                                    <td>{{ $d->device_count }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="tab-pane fade" id="state-yesterday" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">Revenues</div>
                                            <div class="card-text h2">{{ $revenu_yesterday }} MAD</div>
                                        </div>
                                    </div>

                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title fs-6">Top Pays</div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    @foreach ($country_yesterday as $item)
                                                        <tr>
                                                            <td>{{ $item->country }}</td>
                                                            <td class="text-end">{{ $item->visits_count }} visiteurs
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">
                                                Total de demandes
                                            </div>
                                            <div class="card-text h2">
                                                {{ $yesterday }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                Demandes par types
                                            </div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    <tr>
                                                        <td>Abonnement</td>
                                                        <td class="text-end">{{ $demandeA_yesterday }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Classment</td>
                                                        <td class="text-end">{{ $demandeclassment_yesterday }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Autre Demande</td>
                                                        <td class="text-end">{{ $demande_yesterday }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">Trafic</div>
                                            <div class="card  border-0 bg-main rounded-4 mb-2">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs</div>
                                                    <div class="card-text"> {{ $total_yesterday }}</div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-main rounded-4">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs par type d'appareil
                                                    </div>
                                                    <div class="card-text">
                                                        <table class="w-100">
                                                            @foreach ($device_yesterday as $d)
                                                                <tr>
                                                                    <td>{{ $d->device_type }}</td>
                                                                    <td>{{ $d->device_count }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="state-week" role="tabpanel" aria-labelledby="nav-contact-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">Revenues</div>
                                            <div class="card-text h2">{{ $revenu_thisweek }} MAD</div>
                                        </div>
                                    </div>

                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title fs-6">Top Pays</div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    @foreach ($country_thisweek as $item)
                                                        <tr>
                                                            <td>{{ $item->country }}</td>
                                                            <td class="text-end">{{ $item->visits_count }} visiteurs
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">
                                                Total de demandes
                                            </div>
                                            <div class="card-text h2">
                                                {{ $week }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                Demandes par types
                                            </div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    <tr>
                                                        <td>Abonnement</td>
                                                        <td class="text-end">{{ $demandeA_thisweek }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Classment</td>
                                                        <td class="text-end">{{ $demandeclassment_thisweek }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Autre Demande</td>
                                                        <td class="text-end">{{ $demande_thisweek }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">Trafic</div>
                                            <div class="card  border-0 bg-main rounded-4 mb-2">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs</div>
                                                    <div class="card-text"> {{ $total_thisweek }}</div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-main rounded-4">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs par type d'appareil
                                                    </div>
                                                    <div class="card-text">
                                                        <table class="w-100">
                                                            @foreach ($device_thisweek as $d)
                                                                <tr>
                                                                    <td>{{ $d->device_type }}</td>
                                                                    <td>{{ $d->device_count }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="state-month" role="tabpanel"
                            aria-labelledby="nav-disabled-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">Revenues</div>
                                            <div class="card-text h2">{{ $revenu_thismounth}} MAD</div>
                                        </div>
                                    </div>

                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title fs-6">Top Pays</div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    @foreach ($country_thismounth as $item)
                                                        <tr>
                                                            <td>{{ $item->country }}</td>
                                                            <td class="text-end">{{ $item->visits_count }} visiteurs
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">
                                                Total de demandes
                                            </div>
                                            <div class="card-text h2">
                                                {{ $mounth }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                Demandes par types
                                            </div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    <tr>
                                                        <td>Abonnement</td>
                                                        <td class="text-end">{{ $demandeA_thismounth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Classment</td>
                                                        <td class="text-end">{{ $demandeclassment_thismounth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Autre Demande</td>
                                                        <td class="text-end">{{ $demande_thismounth }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">Trafic</div>
                                            <div class="card  border-0 bg-main rounded-4 mb-2">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs</div>
                                                    <div class="card-text"> {{ $total_thismounth }}</div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-main rounded-4">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs par type d'appareil
                                                    </div>
                                                    <div class="card-text">
                                                        <table class="w-100">
                                                            @foreach ($device_thismounth as $d)
                                                                <tr>
                                                                    <td>{{ $d->device_type }}</td>
                                                                    <td>{{ $d->device_count }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="state-year" role="tabpanel"
                            aria-labelledby="nav-disabled-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">Revenues</div>
                                            <div class="card-text h2">{{ $revenu_thisyear}} MAD</div>
                                        </div>
                                    </div>

                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title fs-6">Top Pays</div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    @foreach ($country_thisyear as $item)
                                                        <tr>
                                                            <td>{{ $item->country }}</td>
                                                            <td class="text-end">{{ $item->visits_count }} visiteurs
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body text-center">
                                            <div class="card-title">
                                                Total de demandes
                                            </div>
                                            <div class="card-text h2">
                                                {{ $year }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                Demandes par types
                                            </div>
                                            <div class="card-text">
                                                <table class="w-100">
                                                    <tr>
                                                        <td>Abonnement</td>
                                                        <td class="text-end">{{ $demandeA_thisyear}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Classment</td>
                                                        <td class="text-end">{{ $demandeclassment_thisyear }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Autre Demande</td>
                                                        <td class="text-end">{{ $demande_thisyear }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card mb-3 dashboard__navtabs-card">
                                        <div class="card-body">
                                            <div class="card-title text-center">Trafic</div>
                                            <div class="card  border-0 bg-main rounded-4 mb-2">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs</div>
                                                    <div class="card-text"> {{ $total_thisyear }}</div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-main rounded-4">
                                                <div class="card-body">
                                                    <div class="card-title text-center">Visiteurs par type d'appareil
                                                    </div>
                                                    <div class="card-text">
                                                        <table class="w-100">
                                                            @foreach ($device_thisyear as $d)
                                                                <tr>
                                                                    <td>{{ $d->device_type }}</td>
                                                                    <td>{{ $d->device_year }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
