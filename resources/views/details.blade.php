<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etraiteur | Accueil</title>
    <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/utility.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../vendor/css/themify-icons.css">
    <link rel="stylesheet" href="../vendor/css/bootstrap-icons.css">

    <style>
        .carousel-btn {
            background-color: #333;
            top: 50%;
            transform: translate(0, -50%);
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }

        .carousel-btn.carousel-control-prev {
            left: 5px;
        }

        .carousel-btn.carousel-control-next {
            right: 5px;
        }

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
</head>

<body>
    <header>
        <!-- Hero section -->
        <section class="border-bottom border-3 border-primary ">
            <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
                <div class="container">
                    <a href="#" class="navbar-brand fs-3">
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
        </section>
    </header>

    <main>
        <div class="container py-5">
            <div class="my-5">
                <h2 class="text-center text-dark fw-bold"> {{ $annonce->user->NomCommercial }}</h2>
                <h4 class="text-center text-muted pb-3" style="font-weight: 600;"> {{ $annonce->ville->name }}</h4>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php
                    $photos = json_decode($annonce->photo);
                    ?>
                    <div id="imagesShowcaseCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                          foreach ($photos as $key => $photo) {
                              $image_url = asset('postimage/' . $photo);
                              ?>
                            <div class="carousel-item <?php echo $key == 0 ? 'active' : ''; ?>">
                                <img style="height: 300px;width: 100%" class="img-fluid carousel-image"
                                    src="<?php echo $image_url; ?>" alt="...">


                            </div>

                            <?php
                          }
                          ?>
                           {{--  <iframe class="carousel-item" width="560" height="300px"
                                src="https://www.youtube.com/embed/6bTbN5JBssg" frameborder="0"></iframe> --}}
                        </div>
                        <button class="carousel-control-prev carousel-btn" type="button"
                            data-bs-target="#imagesShowcaseCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next carousel-btn" type="button"
                            data-bs-target="#imagesShowcaseCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-lg-6 pt-3">
                    <div class="mb-3">
                        <p class="text-muted mb-0">SERVICES</p>
                        <div>
                            <strong>{{ $annonce->service->name }}</strong>
                        </div>
                    </div>

                    <div>
                        <h4 class="h2 text-primary fw-bold"><img src="../assets/images/Original logo.png"
                                width="120"></h4>
                        <br>
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-white fw-bold bg-primary p-2 rounded-3">
                                <i class="bi bi-telephone"></i> {{ $annonce->user->tele }}
                            </span>
                            <p class="mb-0 text-muted text-small ms-3">Applez lui directement par téléphone</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="text-white fw-bold bg-success p-2 rounded-3">
                                <i class="bi bi-whatsapp"></i>
                                <a href="https://wa.me/{{ $annonce->user->tele }}" target="blank_"
                                    style="color: white;text-decoration: none">
                                    {{ $annonce->user->tele }}
                                </a>
                            </span>
                            <p class="mb-0 text-muted text-small ms-3">Messagez lui par whatsapp</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-8">
                    <p class="text-primary">
                        {{ $annonce->des }}
                    </p>
                </div>
            </div>
        </div>
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
                    <img src="../assets/images/Logo wight.png" alt="" width="300">
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
                    <form id="create-emessage" method="post" action="{{ route('envoye') }}">
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
    <script src="../vendor/js/bootstrap.bundle.min.js"></script>

</body>

</html>
