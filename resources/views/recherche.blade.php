<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etraiteur | Accueil</title>
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/utility.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="vendor/css/themify-icons.css">

</head>

<body>
    <style>
        .nav-item.dropdown-center .dropdown-menu {
            padding: 0;
            min-width: auto;
        }

        .nav-item.dropdown-center .dropdown-menu li {
            padding: .2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-item.dropdown-center .dropdown-menu li a {
            padding: .2rem;
        }

        .nav-item.dropdown-center .dropdown-toggle::after {
            content: none;
        }

        .laguange__pref {
            width: 2.5rem;
            height: 2.5rem;
        }

        .language_icon {
            width: 2rem;
            height: 2rem;
        }

        .btn-cta {
            border: solid #fff 1px;
            border-radius: 25px;
            padding-left: 25px !important;
            padding-right: 25px !important;
            animation: shadow-pulse 600ms linear infinite;
            margin: 0 15px;
        }

        .btn-cta:hover {
            animation: none;
            border: solid #fff 1px;
            background-color: #fff;
            color: var(--bs-dark);
        }

        @keyframes shadow-pulse {
            0% {
                box-shadow: 0 0 0 0px rgba(255, 255, 255, 0.9);
            }

            20% {
                transform: rotate(3deg);
            }

            40% {
                transform: rotate(-3deg);
            }

            60% {
                transform: rotate(3deg);
            }

            80% {
                transform: rotate(-3deg);
            }

            100% {
                transform: rotate(0deg);
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
        }
    </style>
    <header>
        <!-- Hero section -->
        <section class="border-bottom border-3 border-primary">
            <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
                <div class="container">
                    <a href="{{ route('home') }}" class="navbar-brand fs-3">
                        <img src="../assets/images/Logo wight.png" width="150">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navBarCollapsable">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navBarCollapsable">
                        <ul class="navbar-nav w-100 align-items-center">
                            <li class="nav-item ms-0 ms-lg-auto"><a class="nav-link" href="{{route('aide')}}">Aide</a></li>

                            @if (auth('web')->check())
                                <li class="nav-item"><a class="nav-link btn btn-cta"
                                        href="{{ route('user.tableu') }}">Dashboard</a>
                                </li>
                            @elseif (auth('admin')->check())
                                <li class="nav-item"><a class="nav-link btn btn-cta"
                                        href="{{ route('admin.profile') }}">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item"><a class="nav-link btn btn-cta"
                                        href="{{ route('user.register') }}">Nos
                                        rejoindre</a>
                                </li>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="{{ route('apropos') }}">A propo de nous</a>
                            </li>
                            @if (auth('web')->check() || auth('admin')->check())
                                <p hidden>lola</p>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.login') }}" data-translate='NavLogin'>Se
                                        connecter</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown-center me-0 me-lg-auto">
                                <a class="nav-link dropdown-toggle laguange__pref-choise" role="button" href="#"
                                    data-bs-toggle="dropdown" aria-expanded="false" id="currentLang" data-lang="fr">
                                    <img class="border-white rounded-pill laguange_pref language_icon"
                                        src="../assets/images/fr.png" alt="fr-flag">
                                </a>
                                <ul class="dropdown-menu laguange__pref-dropdown" id="otherLang">
                                    <li>
                                        <a class="dropdown-item laguange__pref-choise" onclick="langChange(this)"
                                            href="#" data-lang="ar">
                                            <img class="border-white rounded-pill laguange_pref language_icon"
                                                src="../assets/images/ar.png" alt="ar-flag">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item laguange__pref-choise" onclick="langChange(this)"
                                            href="#" data-lang="en">
                                            <img class="border-white rounded-pill laguange_pref language_icon"
                                                src="../assets/images/en.png" alt="en-flag">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ms-5">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-5" href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-5" href="#">
                                            <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-5" href="#">
                                            <i class="ti-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-5" href="#">
                                            <i class="ti-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pt-5">
                <div class="container d-flex flex-column align-items-center py-5">
                    <h2 class="text-center fw-bold mb-3">Chercher un autre service ou une autre ville!</h2>
                    <form class="d-flex w-75" action="{{ route('search') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <select name="ville" class="form-select custom-input bg-white text-primary">
                                <option disabled selected>Ville : </option>
                                @foreach ($ville as $v)
                                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                                @endforeach
                            </select>
                            <select name="service" class="form-select custom-input bg-white text-primary">
                                <option disabled selected>Service : </option>
                                @foreach ($service as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-0 px-5">Recherché</button>
                    </form>
                </div>
            </div>

        </section>
    </header>
    <main>
        <!-- Hero section -->
        <article class="text-center bg-main py-3">
            <h6>LES MEILLEURS PRESTATAIRES DE MARIAGE TOUT PROCHE DE VOUS</h6>
            <p class="text-small">
                TROUVEZ LES MEILLEURS POUR VOTRE MARIAGE ET DEMANDEZ-LEUR DES INFORMATIONS SUR LEUR DISPONIBILITÉ ET
                LEURS PRIX.
            </p>
        </article>
        <div class="container pt-5">
            <h3 class="text-center mt-5 h1 mb-4 fw-bold">Resultat de la recherche</h3>
            @if ($result !== null)
                @if ($result->isEmpty())
                    <p class="text-center">--------------------------------------------------------------</p>
                    <br><br><br>
                    <h1 class="text-danger text-center"
                        style="font-family: 'Courier New', Courier, monospace;font-size:50px;font-weight: bolder">
                        Not Found
                    </h1>
                @else
                    <div class="row">
                        @foreach ($result as $r)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                                <a class="text-dark" style="text-decoration: none;"
                                    href="{{ route('details', $r->id) }}">
                                    <div class="card p-2 custom-card ">
                                        <div class="mb-2 d-flex justify-content-center">
                                            <img class="modal-thumb"
                                                src="{{ asset('profile/' . $r->user->profileDocument) }}"
                                                width="250">
                                        </div>
                                        <div class="card-body p-0">
                                            <h5 class="mb-0">{{ $r->user->NomCommercial }}</h5>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-small">{{ $r->service->name }}</span>
                                                <span class="text-small">{{ $r->ville->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                @endif
            @else
                <p class="text-center">--------------------------------------------------------------</p>
                <br><br><br>
                <h1 class="text-danger text-center"
                    style="font-family: 'Courier New', Courier, monospace;font-size:50px;font-weight: bolder">
                    Not Found
                </h1>
            @endif

        </div>
        <br><br>
    </main>

    <footer class="bg-primary mt-5">
        <!-- Hero section -->
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <ul class="nav flex-column text-center text-md-start">
                        <li class="nav-item">
                            <a href="/aide" class="nav-link" data-translate='NavAideLink'>Aide</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apropos" class="nav-link" data-translate='NavApropoDeNous'>A propos de nous</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link" data-translate='NavNousRejoindre'>Nous rejoindre</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" data-translate='NavConditionUtilization'>Conditions
                                générales d'utilisation</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="assets/images/Logo wight.png" alt="" width="300">
                </div>
                <div class="col-md-4">
                    <div class="d-flex">
                        <p class="text-light text-small" data-translate='FooterReseauxSociaux'>Contactez-nous sur nos
                            résaux sociaux ou par messagerie ci-dessous</p>
                        <ul class="nav flex-columns m-0 p-0" style="flex-wrap: nowrap;">
                            <li class="nav-item m-0">
                                <a class="nav-link text-white p-1" href="#">
                                    <i class="ti-facebook"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white p-1" href="#">
                                    <i class="fa-brands fa-square-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white p-1" href="#">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <li class="nav-item m-0">
                                <a class="nav-link text-white p-1" href="#">
                                    <i class="ti-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form id="create-emessage" method="post" action="">
                        @csrf
                        <div class="input-group mb-2">
                            <input type="email" class="form-control custom-input bg-white" name="email"
                                placeholder="Votre email.." data-translate='EmailAddressPlaceHolder'>
                            <button type="submit" class="btn btn-primary rounded-0 ms-2"
                                data-translate='EmailSendBtn'>Envoyer</button>
                        </div>
                        <textarea class="form-control custom-input bg-white" name="objet" id="" cols="30" rows="5"
                            placeholder="Votre message.." data-translate='EmailBodyPlaceholder'></textarea>
                    </form>
                </div>
            </div>
        </div>
        <div class="py-2" style="background-color: #653d1e;">
            <div class="container">
                <p class="text-center text-light m-0">&copy; <span data-translate='FooterCopyright'>etraiteur.ma, tous
                        droits réservés - 2023.</span></p>
            </div>
        </div>
    </footer>
    <script src="vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>
