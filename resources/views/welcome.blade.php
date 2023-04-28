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
    <header class="header__bg">
        <!-- Hero section -->

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top header__navbar" id="navbar">
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
                        <li class="nav-item ms-0 ms-lg-auto"><a class="nav-link" href="#">Aide</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.register') }}">Nous rejoindre</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Apropo de nous</a></li>
                        <li class="nav-item me-0 me-lg-auto"><a class="nav-link" href="#">Eng</a></li>
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
        <section class="d-flex h-100 justify-content-center align-items-center">
            <div class="pt-5">
                <div class="container d-flex flex-column align-items-center py-5">
                    <h1 class="text-center display-3 mb-3 text-white">Réservéz à tête reposée!</h1>
                    <form method="post" class="d-flex w-100" action="{{ route('search') }}">
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
                        <button type="submit" class="btn btn-primary rounded-0 px-5">Rechercher</button>
                    </form>
                </div>
            </div>
        </section>
    </header>


    <main>
        <section class="page__section">
            <div class="container py-5">
                <div class="row mb-3">
                    <div class="col-md-8 col-lg-6 mx-auto text-center text-primary">
                        <h2 class="fw-bold">Slogan!</h2>
                        <p>etraiteur.ma vous permet de chercher, comparer et resérver votre traiteur à distance sans
                            déplacement</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="card text-center rounded-0 border-0 text-light bg-primary">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>1.Chercher</h3>
                                </div>
                                <p class="card-text">
                                    Chercher votre traiteur convenable selon votre ville et le service que vous voulez
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="card text-center rounded-0 border-0 text-light bg-primary">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>2.Comparer</h3>
                                </div>
                                <p class="card-text">
                                    Chercher votre traiteur convenable selon votre ville et le service que vous voulez
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="card text-center rounded-0 border-0 text-light bg-primary">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>3.Resérver</h3>
                                </div>
                                <p class="card-text">
                                    Chercher votre traiteur convenable selon votre ville et le service que vous voulez
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="card text-center rounded-0 border-0 text-light bg-primary">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>4.Evaluer</h3>
                                </div>
                                <p class="card-text">
                                    Chercher votre traiteur convenable selon votre ville et le service que vous voulez
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page__section">
            <div id="annonceCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/carousel.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="slide__title">First slide label</h5>
                            <p class="slide__text">Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/carousel.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="slide__title">First slide label</h5>
                            <p class="slide__text">Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/carousel.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="slide__title">First slide label</h5>
                            <p class="slide__text">Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#annonceCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#annonceCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section class="page__section">
            <div class="container py-5">
                <h3 class="text-primary h1 text-center pb-0 mb-4">No<span
                        class="border-bottom border-2 border-primary">s partenair</span>es</h3>
                <div class="d-flex justify-content-center flex-wrap mb-5 pt-3">
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-rahal.png" alt="logo partenaires">
                    </div>
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-rahal.png" alt="logo partenaires">
                    </div>
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-rahal.png" alt="logo partenaires">
                    </div>
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-rahal.png" alt="logo partenaires">
                    </div>
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-rahal.png" alt="logo partenaires">
                    </div>
                </div>
                <h3 class="text-primary h1 text-center pb-0 mb-4"><span
                        class="border-bottom border-2 border-primary px-4">La press</span></h3>
                <div class="d-flex justify-content-center flex-wrap pt-3">
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-hit-radio.png" alt="logo partenaires">
                    </div>
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-hit-radio.png" alt="logo partenaires">
                    </div>
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-hit-radio.png" alt="logo partenaires">
                    </div>
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-hit-radio.png" alt="logo partenaires">
                    </div>
                    <div class="brand__container">
                        <img class="brand" src="assets/images/logo-hit-radio.png" alt="logo partenaires">
                    </div>
                </div>
            </div>
        </section>
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
    <script src="vendor/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            'use strict';
            var navBar = document.getElementById('navbar')
            if (window.scrollY > 150) {
                navBar.classList.add("bg-primary");
            }
            document.addEventListener("scroll", (e) => {
                if (window.scrollY > 150) {
                    navBar.classList.add("bg-primary");
                } else {
                    navBar.classList.remove("bg-primary");
                }
            });
        })()
    </script>
</body>

</html>
