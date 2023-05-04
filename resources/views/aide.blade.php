<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etraiteur | Accueil</title>
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/utility.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="vendor/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-72BXP0G70W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-72BXP0G70W');
    </script>
</head>

<body>
    <header>
        <!-- Hero section -->
        <section class=" border-primary">
            <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
                <div class="container">
                    <a href="/" class="navbar-brand fs-3"><img src="../assets/images/Logo wight.png"
                            width="150"> </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navBarCollapsable">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navBarCollapsable">
                        <ul class="navbar-nav w-100 align-items-center">
                            <li class="nav-item ms-0 ms-lg-auto"><a class="nav-link" href="{{ route('aide') }}">Aide</a>
                            </li>

                            @if (auth('web')->check())
                                <li class="nav-item"><a class="nav-link btn btn-cta"
                                        href="{{ route('user.profile') }}">Dashboard</a>
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
                                        src="assets/images/fr.png" alt="fr-flag">
                                </a>
                                <ul class="dropdown-menu laguange__pref-dropdown" id="otherLang">
                                    <li>
                                        <a class="dropdown-item laguange__pref-choise" onclick="langChange(this)"
                                            href="#" data-lang="ar">
                                            <img class="border-white rounded-pill laguange_pref language_icon"
                                                src="assets/images/ar.png" alt="ar-flag">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item laguange__pref-choise" onclick="langChange(this)"
                                            href="#" data-lang="en">
                                            <img class="border-white rounded-pill laguange_pref language_icon"
                                                src="assets/images/en.png" alt="en-flag">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ms-5">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-5"
                                            href="https://www.facebook.com/profile.php?id=100091686102691">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-5"
                                            href="https://www.instagram.com/etraiteur.ma/">
                                            <i class="fa-brands fa-square-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-5" href="https://twitter.com/etraiteur_ma">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fs-5"
                                            href="https://www.tiktok.com/@etraiteur.ma">
                                            <i class="fa-brands fa-tiktok"></i>
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
                    <h1 class="text-center fw-bold mb-3 text-primary display-4" data-translate='HelpMainTitle'>Aide
                    </h1>
                </div>
            </div>
        </section>
    </header>
    <main>
        <div class="container">
            <p class='text-center' data-translate='HelpMainText'>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. In, laudantium nostrum itaque aspernatur velit
                accusamus unde id! Nihil minus ratione dolore aperiam praesentium exercitationem nisi.
            </p>
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
                            <a href="/register" class="nav-link" data-translate='NavNousRejoindre'>Nous rejoindre</a>
                        </li>
                        <li class="nav-item">
                            <a href="/conditions-utilisateurs" class="nav-link"
                                data-translate='NavConditionUtilization'>Conditions générales
                                d'utilisation</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <a href="/">
                        <img src="/assets/images/Logo wight.png" alt="etraiteur" class="img-fluid"
                            style="max-width: 300px; margin: 25px 0">
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="d-flex">
                        <p class="text-light text-small" data-translate='FooterReseauxSociaux'>Contactez-nous sur nos
                            résaux sociaux ou par messagerie ci-dessous</p>
                        <ul class="nav flex-columns m-0 p-0" style="flex-wrap: nowrap;">
                            <li class="nav-item">
                                <a class="nav-link text-white fs-5"
                                    href="https://www.facebook.com/profile.php?id=100091686102691">
                                    <i class="ti-facebook"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fs-5" href="https://www.instagram.com/etraiteur.ma/">
                                    <i class="fa-brands fa-square-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fs-5" href="https://twitter.com/etraiteur_ma">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fs-5" href="https://www.tiktok.com/@etraiteur.ma">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form id="create-emessage">
                        <div class="input-group mb-2">
                            <input type="email" class="form-control custom-input bg-white"
                                placeholder="Votre email.." data-translate='EmailAddressPlaceHolder'>
                            <button type="submit" class="btn btn-primary rounded-0 ms-2"
                                data-translate='EmailSendBtn'>Envoyer</button>
                        </div>
                        <textarea class="form-control custom-input bg-white" name="" id="" cols="30" rows="5"
                            placeholder="Votre message.." data-translate='EmailBodyPlaceholder'></textarea>
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
    <script src="/assets/js/alerts.js"></script>
    <script src="/assets/js/translation.js"></script>
    <script src="vendor/js/bootstrap.bundle.min.js"></script>
    <script>
        var currentLang = document.getElementById('currentLang');
        var otherLang = document.getElementById('otherLang');
        var translate = new Translator('/assets/data/pagesTraduction.json', currentLang.getAttribute('data-lang'),
            'publicSiteLang');
        translate.init();
        if (translate.langKey) {
            currentLang.setAttribute('data-lang', translate.langKey);
            currentLang.firstElementChild.src = `assets/images/${translate.langKey}.png`;
            var langs = ['ar', 'fr', 'en'];
            otherLang.innerHTML = "";
            for (var lan of langs) {
                if (lan != translate.langKey) {
                    otherLang.innerHTML += `
          <a class="dropdown-item laguange__pref-choise" onclick="langChange(this)" href="#" data-lang="${lan}">
            <img class="border-white rounded-pill laguange_pref language_icon" src="assets/images/${lan}.png" alt="${lan}-flag" >
          </a>
          `;
                }
            }
        }

        function langChange(e) {
            var langPref = e.getAttribute('data-lang');
            translate.setLang(langPref);
            currentLang.setAttribute('data-lang', langPref);
            currentLang.firstElementChild.src = `assets/images/${langPref}.png`;
            var langs = ['ar', 'fr', 'en'];
            otherLang.innerHTML = "";
            for (var lan of langs) {
                if (lan != langPref) {
                    otherLang.innerHTML += `
          <a class="dropdown-item laguange__pref-choise" onclick="langChange(this)" href="#" data-lang="${lan}">
            <img class="border-white rounded-pill laguange_pref language_icon" src="assets/images/${lan}.png" alt="${lan}-flag" >
          </a>
          `;
                }
            }
        }
        const form = document.getElementById("create-emessage");
        const email = form.querySelector('input[type="email"]');
        const content = form.querySelector('textarea');
        form.addEventListener("submit", (e) => {
            e.preventDefault();

            if (!email?.value || !content?.value)
                return;

            fetch('/api/emessages', {
                method: 'POST',
                body: JSON.stringify({
                    content: content.value,
                    email: email.value
                }),
                headers: {
                    "Content-Type": "application/json"
                }
            }).then(response => {
                if (!response.ok) throw response;

                email.value = "";
                content.value = "";

                const toast = createAlert('Message Envoyé avec succées', 'primary');
                document.body.prepend(toast);
                setTimeout(() => toast.remove(), 5000);
            }).catch(_ => {
                const toast = createAlert('Envoi de message a échoué', 'danger');
                document.body.prepend(toast);
                setTimeout(() => toast.remove(), 5000);
            });
        });
    </script>
</body>

</html>
