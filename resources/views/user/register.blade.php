<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etraiteur | S'enregistrer</title>
    <link rel="stylesheet" type="text/css" href="../vendor/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/utility.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/base.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

    <style>
        .nav-link.btn {
            background-color: var(--primary-color);
            color: white;
            border-radius: 3px;
            border-color: var(--primary-color) !important;
        }

        .nav-item {
            margin-left: auto;
            margin-right: 1.5rem;
        }

        .nav-link.btn.active {
            display: none !important;
        }
    </style>
</head>

<body>

    <main class="login">

        @if (Session::get('success'))
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 37rem;">
                    <div class="modal-content rounded-0 bg-main border-0">
                        <div class="modal-header border-0">
                            <h1 class="modal-title h2 text-primary mx-auto" id="exampleModalLabel">Félicitations</h1>
                        </div>
                        <div class="modal-body">
                            <p class="text-success text-center">
                                Votre Compte a été crée avec succès <i class="ti-check"></i>
                            </p>
                            <p class="text-center"><strong>Pour activer le classment</strong> vous deviez payer le
                                service par virement bancaire ou par CachPlus et contacter le service client pour
                                valider votre nouveau classement</p>
                            <div class="d-flex flex-wrap justify-content-center mb-5">
                                <span class="text-small"><strong>Tél</strong> +2126 00 00 00 00</span>
                                <span class="ms-4 text-small"><strong>RIB BANK CHAABI</strong> 000000000000000000</span>
                            </div>
                            <p class="text-center">Si vous avez rencontrer un problème ou si vous n'avez pas compris
                                vous pouvez appler directement le support client par le numéro suivant:</p>
                            <p class="text-center text-small"><strong>Tél</strong>+2126 00 00 00 00</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="card login__card register">
            <form action="{{ route('user.create') }}" enctype="multipart/form-data" method="POST">
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <div class="tab-content" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="tab-pane active" id="wizard1">
                        <div class="row py-3">
                            <div class="col-lg-6">
                                <div class="px-4">
                                    <label class="login__card-label" for="username">
                                        Nom Commercaile
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-user"></i>
                                        </span>
                                        <input class="form-control" id="username" name="NomCommercial" type="text"
                                            placeholder="Nom d'utilisateur" />
                                        <span class="text-danger">
                                            @error('NomCommercial')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                    <label class="login__card-label" for="firstname">
                                        Prénom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-user"></i>
                                        </span>
                                        <input class="form-control" id="firstname" name="prenom" type="text"
                                            placeholder="Prénom" />
                                        <span class="text-danger">
                                            @error('prenom')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                    <label class="login__card-label" for="lastname">
                                        Nom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-user"></i>
                                        </span>
                                        <input class="form-control" id="lastname" name="name" type="text"
                                            placeholder="Tapez votre prenom..." />
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <label class="login__card-label" for="cityId">
                                        Ville
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-lock"></i>
                                        </span>
                                        <select class="form-control" id="cityId" name="ville_id">
                                          @foreach ($ville as $v)
                                          <option value="{{$v->id}}">{{$v->name}}</option>
                                          @endforeach
                                         
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('ville_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <label class="login__card-label" for="cin">
                                        CIN Recto :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group fit-content border-0">
                                        <input class="d-none" type="file" name="cinDocument1" id="cin">
                                        <span class="text-danger">
                                            @error('cinDocument1')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <label class="file-input" for="cin">
                                            <i class="ti-image me-2"></i> Image de CIN à importer
                                        </label>
                                    </div>
                                    <label class="login__card-label" for="statusTypeId">
                                        Status
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-list"></i>
                                        </span>
                                        <select class="form-control" id="statusTypeId" name="status">
                                            <span class="text-danger">
                                                @error('status')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <option value="SARL">SARL</option>
                                            <option value="Auto-entrepreneur">Auto-entrepreneur</option>
                                        </select>
                                    </div>
                                    <label class="login__card-label" for="status-justification">
                                        Justification du Status
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group fit-content border-0">
                                        <input class="d-none" type="file" name="statusDocument"
                                            id="status-justification">
                                        <span class="text-danger">
                                            @error('statusDocument')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <label class="file-input" for="status-justification">
                                            <i class="ti-image me-2"></i> Image de justification de status
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="px-4">
                                    <label class="login__card-label" for="telephone">
                                        Telephone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-mobile"></i>
                                        </span>
                                        <input class="form-control" id="telephone" name="tele" type="text"
                                            placeholder="0600000000" />
                                        <span class="text-danger">
                                            @error('tele')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <label class="login__card-label" for="email">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-email"></i>
                                        </span>
                                        <input class="form-control" id="email" type="email" name="email"
                                            placeholder="example@email.com" />
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <label class="login__card-label" for="password">
                                        Mot de passe
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-lock"></i>
                                        </span>
                                        <input class="form-control" id="password" type="password" name="password"
                                            placeholder="password" />
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <label class="login__card-label" for="profilTypeId">
                                        Service
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-list"></i>
                                        </span>
                                        <select class="form-control" id="serviceId" name="service_id">
                                          @foreach ($service as $v)
                                          <option value="{{$v->id}}">{{$v->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('service_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <label class="login__card-label" for="profil-image">
                                        CIN Verso : 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group fit-content border-0">
                                        <input class="d-none" type="file" name="cinDocument2" id="profil-image">
                                        <span class="text-danger">
                                            @error('cinDocument2')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <label class="file-input" for="profil-image">
                                            <i class="ti-image me-2"></i> Image de CIN à importer
                                        </label>
                                    </div>
                                    <label class="login__card-label" for="profilTypeId">
                                        Profil
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            <i class="ti-list"></i>
                                        </span>
                                        <select class="form-control" id="profilTypeId" name="profile">
                                            <option value="gérant">gérant</option>
                                            <option value="2">salarié</option>
                                            <option value="3">Freelancer</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('profile')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                    <label class="login__card-label" for="profil-justification">
                                        Jusitifcation du Profil
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group fit-content border-0">
                                        <input class="d-none" type="file" name="profileDocument"
                                            id="profil-justification">
                                        <span class="text-danger">
                                            @error('profileDocument')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <label class="file-input" for="profil-justification">
                                            <i class="ti-image me-2"></i> Image de justification de Profil
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs border-0">
                    <li class="nav-item">
                        <button type="submit" class="nav-link btn btn-primary fit-content d-block mx-auto px-5 mb-2">
                            Enregistré
                        </button>

                    </li>

                </ul>
                <p class="text-center text-muted"><strong>Note: </strong>les données avec * sont nècessaires pour
                    s'inscrire à e-traiteur</p>
                <p class="text-center">
                    <a class="text-primary" href="{{ route('user.login') }}">J'en ai déjà un</a>
                </p>
            </form>
        </div>
    </main>
    <script src="../vendor/js/bootstrap.bundle.min.js"></script>
    <script>
        console.log('JavaScript code is running');

        window.addEventListener('DOMContentLoaded', () => {
            const success = '{{ Session::get('success') }}';
            if (success) {
                const modal = document.getElementById('exampleModal');
                const bootstrapModal = new bootstrap.Modal(modal, {
                    keyboard: false
                });
                bootstrapModal.show();
            }
        });
    </script>


</body>

</html>
