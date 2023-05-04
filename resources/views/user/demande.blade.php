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
              <a class="ps-3 nav-link" aria-current="page" href="{{ route('user.tableu') }}">
                  <i class="icon ti-layout"></i>
                  Tableau de bord
              </a>
          </li>
          <li class="nav-item">
              <a class="ps-3 nav-link" aria-current="page" href="{{ route('user.services') }}">
                  <i class="icon ti-money"></i>
                  Annonce
              </a>
          </li>

          <li class="nav-item">
              <a class="ps-3 nav-link" href="#demandes" data-bs-toggle="collapse" role="button"
                  aria-expanded="false" aria-controls="demandes">
                  <i class="icon ti-email"></i>
                  Demandes
                  <i class="ti-angle-down ms-auto"></i>
              </a>
              <div class="collapse dashboard__sidebar-collapse show" id="demandes">
                  <ul class="nav flex-column ps-3">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('user.publicite') }}">
                              Classment
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" href="{{ route('user.demande') }}">
                              Autre demande
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <li class="nav-item">
              <a class="ps-3 nav-link" href="{{ route('user.facture') }}">
                  <i class="icon ti-receipt"></i>
                  Factures
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
                  Bonjour <span class="user__name">{{auth()->user()->name}}</span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a href="{{ route('user.logout') }}" class="dropdown-item"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="ti-shift-right"></i>
                    Se Deconnecté</a>
                 <form action="{{ route('user.logout') }}" id="logout-form" method="post">@csrf</form> 
                </li>
                <li><a class="dropdown-item" href="{{route('user.changepassword')}}">
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
              <form class="d-flex flex-column" action="{{route('user.autredemande')}}" method="post">
                @csrf
                <div class="btn-group fit-content ms-auto me-3" role="group">
                  <button type="reset" class="btn btn-default dashboard__tdb-btn-default bg-white">Annuler</button>
                  <button type="submit" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Envoyer</button>
                </div>

                <article class="dashboard__table-de-bord-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="dashboard__table-de-bord-card">
                        <div class="dashboard__table-de-bord-card-body">
                          <label class="form-label" for="">Objet</label>
                          <input class="form-control custom-input mb-3" type="text" name="objet" placeholder="Objet de la demande...">
                          <label class="form-label" for="">Votre message</label>
                          <textarea class="form-control custom-input" name="message" id="" rows="10" placeholder="Ecrire..."></textarea>
                        </div>
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