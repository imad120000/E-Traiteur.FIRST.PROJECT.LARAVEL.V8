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
    <style>
        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100px;
        }
    </style>
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
                  <div class="collapse dashboard__sidebar-collapse show" id="demandes">
                    <ul class="nav flex-column ps-3">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('admin.activecompte')}}">Activation de compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.classment')}}">Classment </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('admin.message')}}">Message </a>
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
                  <div class="collapse dashboard__sidebar-collapse" id="utilisateurs">
                    <ul class="nav flex-column ps-3">
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.document')}}">Documents</a>
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
                    <h1 class="text-center dashboard__title">Message</h1>
                    <section class="dashboard__table-de-bord">
                        <article class="dashboard__table-de-bord-body">
                            <table class="table table-bordered dashboard__tdb-table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Email</th>
                                        <th>Centenu</th>
                                        <th>Date Demande</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($message as $m)
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{ $m->email }}</td>
                                            <td class="truncate">{{ $m->objet }}</td>
                                            <td>{{ $m->created_at }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn dashboard__tdb-btn show-message mx-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-show-message-4{{ $m->id }}">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                    <button class="btn dashboard__tdb-btn" data-bs-toggle="modal"
                                                        data-bs-target="#confirm-delete-message-4{{ $m->id }}">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </article>
                        {{-- Delete Message --}}
                        @foreach ($message as $t)
                        <form method="post" action="{{route('admin.deletemessage',$t->id)}}">
                            @csrf
                            @method('DELETE')
                            <div class="modal fade" id="confirm-delete-message-4{{$t->id}}" data-bs-backdrop="static"
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
                                                <span>Vous êtes sure ?</span>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default dashboard__tdb-btn-default"
                                                data-bs-dismiss="modal">
                                                Annuler
                                            </button>
                                            <button type="submit" class="btn btn-primary rounded-0 btn-delete-message">
                                                Confirmer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach

                        {{--  show message --}}
                        @foreach ($message as $d)
                            <div class="modal fade" id="modal-show-message-4{{ $d->id }}" tabindex="-1"
                                data-bs-backdrop="static" aria-labelledby="showModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    style="min-width: 45rem;">
                                    <div class="modal-content rounded-0 bg-main border-0">
                                        <div class="modal-header border-0">
                                            <div class="modal-header border-0">
                                                <h1 class="modal-title  text-primary">Message</h1>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered border-main m-0">
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $d->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Message</th>
                                                    <td>{{ $d->objet }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default dashboard__tdb-btn-default"
                                                data-bs-dismiss="modal">
                                                Fermer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </main>
    </section>
    <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>
