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
            <a class="ps-3 nav-link active" aria-current="page" href="#">
              <i class="icon ti-announcement"></i>
              Publicité
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
                  <a class="nav-link active" href="{{route('user.publicite')}}">
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
            <a class="ps-3 nav-link" href="facture.html">
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
          <h1 class="text-center dashboard__title">Publicité</h1>
          <div class="row">
            <div class="col-lg-6">
              <p class="text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus aspernatur quae perferendis quidem exercitationem corrupti esse nam vitae inventore quaerat ullam voluptatum facilis corporis, quia sint rerum dignissimos iure, debitis voluptates saepe, iste autem ipsam beatae sapiente.
              </p>
              <p class="text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus aspernatur quae perferendis quidem exercitationem corrupti esse nam vitae inventore quaerat ullam voluptatum.
              </p>
              <form class="d-flex flex-column" action="{{route('user.demandeclassment')}}" method="POST">
                @csrf
                <section class="dashboard__table-de-bord">
                  <article class="dashboard__table-de-bord-header">
                    Aperçu de votre tableau de bord
                  </article>
                  <article class="dashboard__table-de-bord-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="dashboard__table-de-bord-card border-0">
                          <div class="dashboard__table-de-bord-card-body p-0">
                            <table class="table table-bordered mb-0 dashboard__tdb-table">
                              <tr>
                                <td class="pt-3">Sélectionnez votre Rank</td>
                                <td>
                                  <select class="form-select custom-input" name="rank" id="">
                                    <option value="" disabled selected hidden>....</option>
                                    @foreach ($rank as $item)
                                    <option value="{{$item->classment}}">Rank {{$item->classment}}</option>
                                    @endforeach
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Prix total à payer</td>
                                <td id="price-total">
                                  0000 MAD
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                </section>
                <div class="btn-group fit-content ms-auto" role="group">
                  <button type="reset" class="btn btn-default dashboard__tdb-btn-default bg-white">Annuler</button>
                  <button type="submit" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Commander</button>
                </div>
              </form>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-6">
                  <style>
                    .pub-list{
                      display: flex;
                      border-bottom: 0;
                      color: #8f8f8f;
                      border-color: var(--border-color);
                    }
                    .pub-list:last-of-type{
                      border-bottom: solid 1px var(--border-color);
                    }
                  </style>
                  <h6 class="text-center text-muted mb-1">Trif par TANK/an</h6>
                  <ul class="list-group rounded-0">
                    <li class="list-group-item pub-list" data-price="5300.0" data-rank="1">
                      <span>RANK 1</span>
                      <span class="ms-auto">5300.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="4500.0" data-rank="2">
                      <span>RANK 2</span>
                      <span class="ms-auto">4500.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="3900.0" data-rank="3">
                      <span>RANK 3</span>
                      <span class="ms-auto">3900.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="3000.0" data-rank="4">
                      <span>RANK 4</span>
                      <span class="ms-auto">3000.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="2800.0" data-rank="5">
                      <span>RANK 5</span>
                      <span class="ms-auto">2800.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="2000.0" data-rank="6">
                      <span>RANK 6</span>
                      <span class="ms-auto">2000.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="2500.0" data-rank="7">
                      <span>RANK 7</span>
                      <span class="ms-auto">2500.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="1700.0" data-rank="8">
                      <span>RANK 8</span>
                      <span class="ms-auto">1700.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="1300.0" data-rank="9">
                      <span>RANK 9</span>
                      <span class="ms-auto">1300.0 MAD</span>
                    </li>
                    <li class="list-group-item pub-list" data-price="1000.0" data-rank="10">
                      <span>RANK 10</span>
                      <span class="ms-auto">1000.0 MAD</span>
                    </li>
                  </ul>
                </div>
                <div class="col-6">
                  <p>RANK c'est le classment</p>
                  <p>RANK 1 designe la position 1 dans le classment des préstataires.</p>
                  <p>Remarque: Si vous avez commandé le RANK 10 et vous êtes le seul des préstataires qui a commandé un service RANK, vous seriez affiché en première position.
                    <br>
                    votre <strong> Ville : {{auth()->user()->Ville->name}}</strong>
                    <br>
                    votre <strong> Service : {{auth()->user()->service->name}}</strong>

                   
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 37rem;">
            <div class="modal-content rounded-0 bg-main border-0">
              <div class="modal-header border-0">
                <h1 class="modal-title h2 text-primary mx-auto" id="exampleModalLabel">Félicitations</h1>
              </div>
              <div class="modal-body">
                <p class="text-success text-center">
                  Votre commande est bien envoyée avec succès <i class="ti-check"></i>
                </p>
                <p class="text-center"><strong>Pour activer le classment</strong> vous deviez payer le service par virement bancaire ou par CachPlus et contacter le service client pour valider votre nouveau classement</p>
                <div class="d-flex flex-wrap justify-content-center mb-5">
                  <span class="text-small"><strong>Tél</strong> +2126 00 00 00 00</span>
                  <span class="ms-4 text-small"><strong>RIB BANK CHAABI</strong> 000000000000000000</span>
                </div>

                <p class="text-center">Si vous avez rencontrer un problème ou si vous n'avez pas compris vous pouvez appler directement le support client par le numéro suivant:</p>
                <p class="text-center text-small"><strong>Tél</strong>+2126 00 00 00 00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>
  <script>
    const selectRank = document.querySelector('select[name="rank"]');
    const priceTotal = document.getElementById('price-total');
    selectRank.addEventListener('change', (e) => {
      const rank = e.target.value;
      const price = document.querySelector(`[data-rank="${rank}"]`)?.dataset.price;
      if (price)
        priceTotal.textContent = `${price} MAD`;
    });

    const openModalBtn = document.getElementById('btn-open-modal');
    const url = new URLSearchParams(window.location.search);
    if (url.get('success'))
      openModalBtn.click();


  </script>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>