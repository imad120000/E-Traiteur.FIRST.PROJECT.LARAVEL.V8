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
  <link rel="stylesheet" href="../assets/css/dashboard-user.css">
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
            <a class="ps-3 nav-link active" aria-current="page" href="#">
              <i class="icon ti-money"></i>
              Annonce            </a>
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
            <a class="ps-3 nav-link" href="facture.html">
              <i class="icon ti-receipt"></i>
              Factures
            </a>
          </li>
        </ul>
      </section>
    </aside>
    <main class="dashboard__main">
      <nav class="navbar py-0 dashboard__navbar">
        <div class="container-fluid">
          @if($annonce->count() <= 0)
            <button class="btn btn-primary rounded-0 d-flex align-items-center" role="button" data-bs-toggle="modal" 
            data-bs-target="#exampleModal">
              <i class="ti-plus me-2"></i>
                Ajouter un Annonce
            </button>
          @endif
          <h1 style="font-size:1px ">.</h1>
          
        
          
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
          <h1 class="text-center dashboard__title">Vos Annonces</h1>
          <section class="dashboard__table-de-bord">
            <article class="dashboard__table-de-bord-body">
              <table class="table table-bordered dashboard__tdb-table">                  
                <thead>
                  <tr class="text-center">
                    <td>Service</td>
                    <td>Date de création</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  @if($annonce->count() > 0)
                  @foreach($annonce as $i)
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="table__img-container me-2">
                          <img class="table__img" src="{{ asset('profile/' . $i->user->profileDocument) }}" width="80px" style="background-size: cover" alt="">
                        </div>
                        <p class="table__description">      
                           {{$i->service->name}}
                        </p>
                      </div>
                    </td>
                    <td class="text-center pt-4">
                      {{$i->created_at}}
                    </td>
                    
                    <td class="pt-3">
                      <div class="d-flex justify-content-center">
                        <a class="btn dashboard__tdb-btn" href="#" role="button" data-bs-toggle="modal" data-bs-target="#serviceModal">
                          <i class="ti-eye"></i>
                        </a>
                        <a class="btn dashboard__tdb-btn" href="#" role="button" data-bs-toggle="modal" data-bs-target="#editModal">
                          <i class="ti-pencil"></i>
                        </a>
                        <a class="btn dashboard__tdb-btn" href="#" role="button" data-bs-toggle="modal" data-bs-target="#confirmModal">
                          <i class="ti-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>   
                  @endforeach
                  @endif
                </tbody>
              </table>
            </article>
          </section>
        </div>
        @foreach($annonce as $i)
        <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
            <div class="modal-content rounded-0 bg-main border-0">
              <div class="modal-header border-0">
                <h1 class="modal-title fs-5 text-primary text-center w-100" id="confirmModalLabel">Confirmer votre action</h1>
              </div>
              <form method="post" action="{{route('user.deletepost',$i->id)}}">
                @csrf
                @method('DELETE')
              <div class="modal-body">
                <p class="text-center">
                  <span id="confirmModalMessage">Vous êtes sure por supprime ?</span>  
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default dashboard__tdb-btn-default" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary rounded-0">Confirmer</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        @endforeach

        

  @if($annonce->count() <= 0)

        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
            <div class="modal-content rounded-0 bg-main border-0">
              <form action="{{route('user.addpost')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header border-0">
                  <h1 class="modal-title fs-5 text-primary">Ajout d'un service</h1>
                  <div class="btn-group ms-auto" role="group">
                    <button type="button" class="btn btn-default dashboard__tdb-btn-default" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary rounded-0" data-bs-dismiss="modal">Ajouter</button>
                  </div>
                </div>
                <div class="modal-body p-0">
                  <table class="table table-bordered border-main m-0"> 
                    <tr>
                      <td class="pt-3"><strong>Description</strong></td>
                      <td colspan="3">
                        <textarea class="form-control custom-input" placeholder="Description de votre service..." name="des"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td class="pt-3"><strong>Lien de video</strong></td>
                      <td colspan="3">
                        <input type="text" placeholder="Ajouter le lien de votre vidéo" class="form-control custom-input" name="video">
                      </td>
                    </tr>
                    <tr>
                      <td class="pt-3"><strong>Photos</strong></td>
                      <td colspan="3">
                        <div class="d-flex align-items-center">
                          <div class="input-group fit-content">
                            <input class="d-none" type="file" id="photosUpload" name="photo[]" multiple>
                            <label class="file-input" for="photosUpload">
                              <i class="ti-image me-2"></i> Images à importer
                            </label>
                          </div>
                          <span class="text-small text-muted ms-2">Taille max des photos est 50MB</span>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </form>
            </div>
          </div>
        </div>
 @endif

  @if($annonce->count() > 0)
    {{-- Desplay info  --}}       
     <div class="modal fade" id="serviceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
            <div class="modal-content rounded-0 bg-main border-0">
              <form action="">
                <div class="modal-header border-0">
                  <h1 class="modal-title fs-5 text-primary">Details du service</h1>
                  <div class="btn-group ms-auto" role="group">
                    <button type="button" class="btn btn-default dashboard__tdb-btn-default" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
                <div class="modal-body p-0">
                  <table class="table table-bordered border-main m-0">
                    @foreach($annonce as $i)
                        <tr>
                          <td><strong>Titre</strong></td>
                          <td colspan="3">
                            {{$i->title}}
                          </td>
                        </tr>
                      
                        <tr>
                          <td><strong>Description</strong></td>
                          <td colspan="3">
                            {{$i->des}}                           
                           </td>
                        </tr>
                        <tr>
                          <td><strong>Lien de video</strong></td>
                          <td colspan="3">
                            {{$i->video}}      
                          </td>
                        </tr>
                        <tr>
                          <td class="pt-3"><strong>Photos</strong></td>
                          <td colspan="3">
                            
                            <?php 
                            $photos = json_decode($i->photo); 
                          ?>
                            @foreach(array_chunk($photos, 2) as $photo_row)
                                    @foreach($photo_row as $photo)
                                          <img class="modal-thumb" width="40px" src="{{ asset('postimage/' . $photo) }}">
                                      @endforeach
                          @endforeach
                          </td>
                        </tr>
                      
                        <tr>
                          <td><strong>Téléphone</strong></td>
                          <td>
                            {{$i->user->tele}}      
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Email</strong></td>
                          <td colspan="3">
                            {{$i->user->email}}      
                          </td>
                        </tr>
                    @endforeach
                  </table>
                </div>
              </form>
            </div>
          </div>
      </div>
      @endif

      @if($annonce->count() > 0)
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 45rem;">
            <div class="modal-content rounded-0 bg-main border-0">
              @foreach($annonce as $i)
              <form action="{{route('user.updatePost',$i->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header border-0">
                  <h1 class="modal-title fs-5 text-primary">Editer le service</h1>
                  <div class="btn-group ms-auto" role="group">
                    <button type="reset" class="btn btn-default dashboard__tdb-btn-default" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary rounded-0" data-bs-dismiss="modal">Confirmer</button>
                  </div>
                </div>
                <div class="modal-body p-0">
                  <table class="table table-bordered border-main m-0">
                    <tr>
                      <td class="pt-3"><strong>Titre</strong></td>
                      <td colspan="3">
                        <input type="text" value="{{$i->title}}" class="form-control custom-input" name="title" >
                      </td>
                    </tr>
                   
                    <tr>
                      <td class="pt-3"><strong>Description</strong></td>
                      <td colspan="3">
                        <textarea class="form-control custom-input"  name="des">{{$i->des}}</textarea>
                      </td>
                    </tr>
                    <tr>
                      <td class="pt-3"><strong>Lien de video</strong></td>
                      <td colspan="3">
                        <input type="text"  value="{{$i->video}}" name="video" class="form-control custom-input">
                      </td>
                    </tr>
                    <tr>
                      <td class="pt-3"><strong>Photos</strong></td>
                      
                      <td colspan="3">
                        <?php 
                        $photos = json_decode($i->photo); 
                      ?>
                        @foreach(array_chunk($photos, 2) as $photo_row)
                                @foreach($photo_row as $photo)
                                      <img class="modal-thumb" width="40px" src="{{ asset('postimage/' . $photo) }}">
                                  @endforeach
                      @endforeach
                      <br><br>
                        <div class="d-flex align-items-center">
                          <div class="input-group fit-content">
                            <input class="d-none" type="file" id="photosUpload" name="photo[]" multiple>
                            <label class="file-input" for="photosUpload">
                              <i class="ti-image me-2"></i> Images à importer
                            </label>
                          </div>
                          <span class="text-small text-muted ms-2">Taille max des photos est 2MB</span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="pt-3"><strong>Téléphone</strong></td>
                      <td>
                        <input type="text" name="tele" value="{{$i->user->tele}}" placeholder="0600000000" class="form-control custom-input" >
                      </td>
                    </tr>
                    
                  </table>
                </div>
              </form>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      @endif 
    </main>
  </section>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>



