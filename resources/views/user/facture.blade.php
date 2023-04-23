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
            <a class="ps-3 nav-link" aria-current="page" href="services.html">
              <i class="icon ti-money"></i>
              Services
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
                  <a class="nav-link" href="{{route('user.publicite')}}">
                    Classment
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('user.demande')}}">
                    Autre demande
                  </a>
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
          <li class="nav-item">
            <a class="ps-3 nav-link active" href="statistiques.html">
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
                  Monsieur <span class="user__name">LeNom</span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a href="{{ route('user.logout') }}" class="dropdown-item"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="ti-shift-right"></i>
                    Se Deconnecté</a>
                 <form action="{{ route('user.logout') }}" id="logout-form" method="post">@csrf</form> 
                </li>
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
          <h1 class="text-center dashboard__title">Factures</h1>

          <section class="dashboard__table-de-bord">
            <article class="dashboard__table-de-bord-body pb-5">
              <table class="table table-bordered dashboard__tdb-table">                  
                <thead>
                  <tr class="text-center">
                    <td>Description</td>
                    <td>Statut</td>
                    <td>Date de création</td>
                    <td>Montant</td>
                  </tr>
                </thead>
                @foreach($facture as $f)
                <tbody>
                  <tr class="text-center">
                    <td class="py-4">
                      {{$f->des}}
                    </td>
                    <td class="py-4">
                      <strong class="text-success"> {{$f->status}}</strong>
                    </td>
                    <td class="py-4">
                      {{$f->created_at}}
                    </td>
                    <td class="py-4">
                      {{$f->montant}} DH
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </article>
          </section>
        </div>
      </div>
    </main>
  </section>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>