<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <title>Dropmyride autókölcsönző</title>
    <link rel="icon" type="image/x-icon" href="kepek/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Scriptek -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/hambiMenu.js"></script>
    <script src="js/reszponzivDolgok.js"></script>
    <script src="js/kereso/dropDownKereso.js"></script>
    <script src="js/kereso/keresesiOpciokAjax.js"></script>
    <script src="js/kereso/keresesiOpciok.js"></script>
    <script src="js/reszponzivDolgok.js"></script>
    <script src="js/autoLista/autoAjax.js"></script>
    <script src="js/autoLista/auto.js"></script>
    <script src="js/kereso/keresoFeltoltes.js"></script>
    <script src="js/autoLista/autok.js"></script>
    <script src="js/cards/autoCard.js"></script>
    <style>
    /* Betűtípusok */
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans+Condensed:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Teko:wght@300&display=swap');
    </style>

    <!-- Stílusok -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/szerkezet.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/fooldal.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/kereso.css" />
    <link rel="stylesheet" href="css/autoCard.css" />
    <link rel="stylesheet" href="css/jarmuTalalatiLista.css" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/nav')

        <!-- HEADER -->
        @include('komponensek/header')

        <!-- KERESŐ -->
        @include('komponensek/kereso')

        <!-- felhasználóknak segítség/információ a foglaláshoz -->
        <div id="primary_content">
            <div id="jarmu-lista">
                <div class="jarmu-card" id="">
                    <div class="jarmu-card-img-box">
                        <img class="jarmu-card-kep" src="" alt="">
                    </div>

                    <div class="card-block-1">
                        <span class="jarmu-card-marka"></span>
                        <span class="jarmu-card-tipus"></span>
                        <span class="jarmu-card-kivitel"></span>
                    </div>
                    <div class="card-block-2">
                        <span class="jarmu-card-ar"></span>
                        <span class="jarmu-card-arHeti"></span>
                        <span class="jarmu-card-telephely"></span>
                    </div>
                    <div class="card-block-3">
                        <span class="jarmu-card-ajtok"></span>
                        <span class="jarmu-card-utasok"></span>
                        <span class="jarmu-card-szín"></span>
                    </div>
                    <div class="card-block-4">
                        <span class="jarmu-card-valto"></span>
                        <span class="jarmu-card-uzemanyag"></span>
                        <span class="jarmu-card-kategoria"></span>
                    </div>
                    <div class="card-block-5">
                        <ul class="jarmu-card-extra">
                        </ul>
                    </div>

                    <div class="jarmu-card-buttons">
                        <input class="jarmu-card-foglalas" type="button" value="Foglalás">
                        <input class="jarmu-card-reszletek" type="button" value="Részletek">
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>