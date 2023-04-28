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
    </style>
</head>

<body>
    <header>
        <!-- Hero section -->
        <section class="border-bottom border-3 border-primary ">
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
                            <li class="nav-item"><a class="nav-link" href="#">Nous rejoindre</a></li>
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
                        <h4 class="h2 text-primary fw-bold">LOGO</h4>
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-white fw-bold bg-primary p-2 rounded-3">
                                <i class="bi bi-telephone"></i> {{ $annonce->user->tele }}
                            </span>
                            <p class="mb-0 text-muted text-small ms-3">Applez lui directement par téléphone</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="text-white fw-bold bg-success p-2 rounded-3">
                                <i class="bi bi-whatsapp"></i> {{ $annonce->user->tele }}
                            </span>
                            <p class="mb-0 text-muted text-small ms-3">Messagez lui par whatsapp</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-8">
                    <p class="text-primary">
                       {{$annonce->des}}
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
                            <a href="#" class="nav-link">Aide</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">A propos de nous</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.register')}}" class="nav-link">Nous rejoindre</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Conditions générales d'utilisation</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="../assets/images/logo.png" alt="">
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
    <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>
