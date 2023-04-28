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
                    <a href="#" class="navbar-brand fs-3">etraiteur</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navBarCollapsable">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navBarCollapsable">
                        <ul class="navbar-nav w-100 align-items-center">
                            <li class="nav-item ms-0 ms-lg-auto"><a class="nav-link" href="#">Aide</a></li>
                            <li class="nav-item"><a class="nav-link btn btn-cta" href="#">Nous rejoindre</a></li>
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
            <div class="pt-5">
                <div class="container d-flex flex-column align-items-center py-5">
                    <h2 class="text-center fw-bold mb-3">Chercher un autre service ou une autre ville!</h2>
                    <form class="d-flex w-75" action="{{route('search')}}" method="post">
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
                    @foreach ($result as $r)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                                <a class="text-dark" style="text-decoration: none;" href="{{route('details',$r->id)}}">
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
                        </div>
                    @endforeach
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
                            <a href="#" class="nav-link">Aide</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">A propos de nous</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Nous rejoindre</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Conditions générales d'utilisation</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="assets/images/logo.png" alt="">
                </div>
                <div class="col-md-4">
                    <div class="d-flex">
                        <p class="text-light text-small">Contactez-nous sur nos résaux sociaux ou par messagerie
                            ci-dessous</p>
                        <ul class="nav flex-columns m-0 p-0" style="flex-wrap: nowrap;">
                            <li class="nav-item m-0">
                                <a class="nav-link text-white p-1" href="#">
                                    <i class="ti-facebook"></i>
                                </a>
                            </li>
                            <li class="nav-item m-0">
                                <a class="nav-link text-white p-1" href="#">
                                    <i class="ti-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item m-0">
                                <a class="nav-link text-white p-1" href="#">
                                    <i class="ti-twitter"></i>
                                </a>
                            </li>
                            <li class="nav-item m-0">
                                <a class="nav-link text-white p-1" href="#">
                                    <i class="ti-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form action="">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control custom-input bg-white"
                                placeholder="Votre email..">
                            <button type="submit" class="btn btn-primary rounded-0 ms-2">Envoyer</button>
                        </div>
                        <textarea class="form-control custom-input bg-white" name="" id="" cols="30" rows="5"
                            placeholder="Votre message.."></textarea>
                    </form>
                </div>
            </div>
        </div>
        <div class="py-2" style="background-color: #653d1e;">
            <div class="container">
                <p class="text-center text-light m-0">&copy; etraiteur.ma, tous droits réservés - 2023.</p>
            </div>
        </div>
    </footer>
    <script src="vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>
