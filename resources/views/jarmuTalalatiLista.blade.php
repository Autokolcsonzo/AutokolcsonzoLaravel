<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <title>Dropmyride autókölcsönző</title>
    <link rel="icon" type="image/x-icon" href="kepek/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <!-- Scriptek -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/hambiMenu.js"></script>
    <script src="js/reszponzivDolgok.js"></script>
    <script src="js/kereso/dropDownKereso.js"></script>
    <script src="js/kereso/keresesiOpciokAjax.js"></script>
    <script src="js/kereso/keresoFeltoltes.js"></script>
    <script src="js/kereso/keresesiOpciok.js"></script>
    <script src="js/kereso/idopont.js"></script>
    <script src="js/autoLista/autoAjax.js"></script>
    <script src="js/autoLista/auto.js"></script>
    <script src="js/autoLista/autok.js"></script>
    <script src="js/autoLista/foglalas.js"></script>
    <script src="js/kereso/keresoFeltolteseLocalS.js"></script>


    <meta name="csrf-token" content=<?php $token = csrf_token();
                                    echo $token; ?>>
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
    <link rel="stylesheet" href="css/toltes.css" />

</head>

<body>
    @include('komponensek/toltes')

    <main>
        <!-- TABLET, STB. NÉZET -->
        @if(Auth('felhasznalo'))
            @include('komponensek/felhasznaloNav')
        @else
            @include('komponensek/nav')
        @endif

        <!-- HEADER -->
        @include('komponensek/header')

        <!-- KERESŐ -->
        @include('komponensek/kereso')

        <!-- felhasználóknak segítség/információ a foglaláshoz -->
        <div id="primary_content">
            <link rel="stylesheet" href="css/foglalasAblak.css" />
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <h1 id="Foglalas-cim">Foglalás leadása</h1>
                    <h1 id="foglalas-bezaras">X</h1>
                    <form method="POST" action='{{route("ujFoglalas")}}' >
                        <section id="valasztott-jarmu-adatok">
                            <img id="valasztott-jarmu-kep" src="kepek\232311_source.jpg" alt="kocsi">
                            <div id="valasztott-jarmu-adatok-wrapp">
                                <section id="valasztott-jarmu-parameterek">
                                    <span id="valasztott-jarmu-marka"></span>
                                    <span id="valasztott-jarmu-modell"></span>
                                    <span id="valasztott-jarmu-kivitel"></span>
                                </section>
                                <span id="valasztott-jarmu-helyszin">Budapest</span>
                            </div>

                        </section>
                        <section id="valasztott-jarmu-ar">
                            <span id="valasztott-jarmu-napiAr">0</span>
                            <span id="valasztott-jarmu-vegosszeg">0</span>
                            <span id="valasztott-jarmu-kedvezmeny">0</span>
                        </section>
                        <section id="foglalas-tol-box">
                            <label for="foglalas-tol">Felvétel:</label><br>
                            <input id="foglalas-tolD" name="foglalas_tol" type="date" required>
                            <select id="foglalas-tolI" name="foglalas_tolIdo" required></select>
                        </section>
                        <section id="foglalas-ig-box">
                            <label for="foglalas-ig">Letétel:</label><br>
                            <input id="foglalas-igD" name="foglalas_ig" type="date" required>
                            <select id="foglalas-igI" name="foglalas_igIdo" required></select>
                        </section>
                        <section id="foglalas-felhasznaloi-adatok">
                            <p id="ellenőrizze">Kérjük ellenőrizze adatait a foglalás elött</p><br>
                            <div id="személyes-adatok">
                                <p id="teljesNev"><br>{{$data->vezeteknev}} {{$data->keresztnev}}</p>
                                <p id="felhasznaloNev"><br>{{$data->felhasznalonev}}</p>
                                <p id="email"><br>{{$data->e_mail}}</p>
                                <p id="telefon"><br>{{$data->tel_szam}}</p>
                                <input type="hidden" id="custId" name="custId" value="{{$data->felhasznalo_id}}">
                                <input type="hidden" id="autoId" name="autoId" value="">
                            </div>
                        </section>
                        <input id="lefoglalas" class="" type="submit" value="Lefoglalás"/>
                        
                        <a id="módosítása" href="http://127.0.0.1:8000/felhasznaloiProfil" class="">Adataim módosítása</a>
                    </form>
                    <div id="Felhasznaloi-feltetelek">
                        <p>Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's
                            not Latin, though it looks like it, and it actually says nothing,” Before & After magazine
                            answered a curious reader, “Its ‘words’ loosely approximate the frequency with which letters
                            occur in English, which is why at a glance it looks pretty real.”
                            “Nor is there anyone who loves or pursues or desires to obtain pain of itself, because it is
                            pain, but occasionally circumstances occur in which toil and pain can procure him some great
                            pleasure.”
                            McClintock's eye for detail certainly helped narrow the whereabouts of lorem ipsum's origin,
                            however, the “how and when” still remain something of a mystery, with competing theories and
                            timelines.</p>
                    </div>
                    <input type="button" id="Felhasznaloi-feltetelek-btn" value="Felhasználói feltételek">
                </div>

            </div>





            <div id="jarmu-lista">

                <div class="jarmu-card" id="">
                    <div class="jarmu-card-img-box">
                        <img class="jarmu-card-kep" src="" alt="">
                    </div>

                    <div class="card-block-1">
                        <span class="jarmu-card-marka"></span>
                        <span class="jarmu-card-modell"></span>
                        <span class="jarmu-card-kivitel"></span>
                    </div>
                    <div class="card-block-2">
                        <span class="jarmu-card-ar"></span>
                        <span class="jarmu-card-arHeti"></span>
                        <span class="jarmu-card-telephely"></span>
                    </div>
                    <div class="card-block-3">
                        <!--                         <span class="jarmu-card-ajtok"></span>
                        <span class="jarmu-card-utasok"></span> -->
                        <span class="jarmu-card-szín"></span>
                    </div>
                    <div class="card-block-4">
                        <span class="jarmu-card-evjarat"></span>
                        <span class="jarmu-card-uzemanyag"></span>
                        <span class="jarmu-card-teljesitmeny"></span>
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