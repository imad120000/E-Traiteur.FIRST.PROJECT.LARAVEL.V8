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
                  <a class="ps-3 nav-link" aria-current="page" href="{{route('admin.profile')}}">
                    <i class="icon ti-layout"></i>
                    Tableau de bord
                  </a>
                </li>
                <li class="nav-item">
                  <a class="ps-3 nav-link" aria-current="page" href="{{route('admin.annonce')}}">
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
                  <div class="collapse dashboard__sidebar-collapse " id="demandes">
                    <ul class="nav flex-column ps-3">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('admin.activecompte')}}">Activation de compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.classment')}}">Classment </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.message')}}">Message </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.autredemande')}}">Autre demandes</a>
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
                  <div class="collapse dashboard__sidebar-collapse show" id="utilisateurs">
                    <ul class="nav flex-column ps-3">
                      <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.document')}}">Documents</a>
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
            <nav class="dashboard__navbar">
              <div class="container-fluid">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown ms-auto">
                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img class="avatar" src="../assets/images/user.png" alt="">
                    </button>
                    <ul class="dropdown-menu dashboard__navbar-dropdown">
                      <li class="user">
                        Bonjour <span class="user__name">Admin</span>
                      </li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <a href="{{ route('admin.logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          <i class="ti-shift-right"></i>
                          Se Deconnecté</a>
                       <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form> 
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
                    <h1 class="text-center dashboard__title">Documents</h1>
                    <section class="dashboard__table-de-bord">
                        <article class="dashboard__table-de-bord-body">
                            {{-- form for search --}}
                            <form class="d-flex mb-3" action="{{ route('admin.recherche') }}" method="post">
                                @csrf
                                <div class="input-group me-3">
                                    <select name="ville" class="form-select">
                                        <option disabled selected>Ville : </option>
                                        @foreach ($ville as $v)
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    <select name="service" class="form-select">
                                        <option disabled selected>Service : </option>
                                        @foreach ($service as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-0">Cherché</button>
                            </form>

                            {{-- Info --}}
                            <table class="table table-bordered dashboard__tdb-table">
                                <thead>
                                    <tr class="text-center">
                                        <td>Titre</td>
                                        <td>Dossier</td>
                                        <td>Date de création</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                @if (!isset($result))
                                    @foreach ($user as $u)
                                        <tbody>
                                            <tr id="client-10">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="table__img-container me-2">
                                                            <img class="table__img"
                                                                src="{{ asset('profile/' . $u->profileDocument) }}"
                                                                width="80px" style="background-size: cover"
                                                                alt="">
                                                        </div>
                                                        <p class="table__description">{{ $u->name }}
                                                            {{ $u->prenom }}</p>
                                                    </div>
                                                </td>
                                                <td class="pt-3">
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn dashboard__tdb-btn view-client-infos"
                                                            href="#" role="button" data-bs-toggle="modal"
                                                            data-bs-target="#client-information-10{{ $u->id }}">
                                                            <i class="ti-folder"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{ $u->created_at }}</td>
                                                <td class="pt-3">
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn dashboard__tdb-btn" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#confirm-delete-message-4{{ $u->id }}">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                                @if (isset($result))
                                    @foreach ($result as $u)
                                        <tbody>
                                            <tr id="client-10">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="table__img-container me-2">
                                                            <img class="table__img"
                                                                src="{{ asset('profile/' . $u->profileDocument) }}"
                                                                width="80px" style="background-size: cover"
                                                                alt="">
                                                        </div>
                                                        <p class="table__description">{{ $u->name }}
                                                            {{ $u->prenom }}</p>
                                                    </div>
                                                </td>
                                                <td class="pt-3">
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn dashboard__tdb-btn view-client-infos"
                                                            href="#" role="button" data-bs-toggle="modal"
                                                            data-bs-target="#client-information-10{{ $u->id }}">
                                                            <i class="ti-folder"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{ $u->created_at }}</td>
                                                <td class="pt-3">
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn dashboard__tdb-btn" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#confirm-delete-message-4{{ $u->id }}">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>

                            {{-- Show info user --}}
                            {{-- if Not  result set for recherche i mean that i don't click button recherch than desplay this result : --}}
                            @if (!isset($result))

                                @foreach ($user as $a)
                                    <form method="post" action="{{ route('admin.active', $a->id) }}">
                                        @csrf
                                        <div class="modal fade" id="client-information-10{{ $a->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                style="min-width: 45rem;">
                                                <div class="modal-content rounded-0 bg-main border-0">
                                                    <div class="modal-header border-0">
                                                        <h1 class="modal-title fs-5 text-primary">
                                                            {{ $a->NomCommercial }}
                                                        </h1>
                                                        <div role="group">
                                                            <button type="button"
                                                                class="btn btn-default dashboard__tdb-btn-default"
                                                                data-bs-dismiss="modal">
                                                                Annuler
                                                            </button>
                                                            @if ($a->compte == 0)
                                                                <button type="submit"
                                                                    class="btn btn-primary rounded-0">Activé
                                                                </button>
                                                            @endif
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

                                {{-- delete user --}}
                                @foreach ($user as $r)
                                    <form method="post" action="{{ route('admin.deletecompte', $r->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="confirm-delete-message-4{{ $r->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <span>Vous êtes sure ?</span>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-default dashboard__tdb-btn-default"
                                                            data-bs-dismiss="modal">
                                                            Annuler
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary rounded-0 btn-delete-message">
                                                            Confirmer
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            @endif

                            {{-- if  result set for recherche i mean that i click button recherch than desplay this result : --}}
                            @if (isset($result))
                                @foreach ($result as $a)
                                    <form method="post" action="{{ route('admin.active', $a->id) }}">
                                        @csrf
                                        <div class="modal fade" id="client-information-10{{ $a->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                style="min-width: 45rem;">
                                                <div class="modal-content rounded-0 bg-main border-0">
                                                    <div class="modal-header border-0">
                                                        <h1 class="modal-title fs-5 text-primary">
                                                            {{ $a->NomCommercial }}
                                                        </h1>
                                                        <div role="group">
                                                            <button type="button"
                                                                class="btn btn-default dashboard__tdb-btn-default"
                                                                data-bs-dismiss="modal">
                                                                Annuler
                                                            </button>
                                                            @if ($a->compte == 0)
                                                                <button type="submit"
                                                                    class="btn btn-primary rounded-0">Activé
                                                                </button>
                                                            @endif
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

                                {{-- delete user --}}
                                @foreach ($result as $r)
                                    <form method="post" action="{{ route('admin.deletecompte', $r->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="confirm-delete-message-4{{ $r->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <span>Vous êtes sure ?</span>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-default dashboard__tdb-btn-default"
                                                            data-bs-dismiss="modal">
                                                            Annuler
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary rounded-0 btn-delete-message">
                                                            Confirmer
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            @endif

                        </article>
                    </section>
                </div>
            </div>
        </main>
    </section>
    <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>
