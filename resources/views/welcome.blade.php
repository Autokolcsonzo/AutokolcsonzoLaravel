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
    <script src="js/kereso/keresesiOpciok.js"></script>
    <script src="js/kereso/keresoFeltoltes.js"></script>
    <script src="js/autoLista/autoAjax.js"></script>
    <script src="js/autoLista/auto.js"></script>
    <script src="js/autoLista/autok.js"></script>
    <style>
    /* Betűtípusok */
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans+Condensed:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Teko:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Cormorant+SC&display=swap');
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

        <!-- KERESŐFELÜLET -->
        @include('komponensek/kereso')

        <!-- felhasználóknak segítség/információ a foglaláshoz -->
        <div id="primary_content">
            <div class="fooldalInfo">
                <div class="infoHelyszin">
                    <img src="kepek/location.png" alt="" />
                    <h3>Válassz helyszínt!</h3>
                    <p>Több telephelyünk közül választhatod ki a számodra legmegfelelőbbet az országban!</p>


                </div>
                <div class="infoDatum">
                    <img src="kepek/date.png" alt="" />
                    <h3>Tűzd ki a dátumot!</h3>
                    <p>Neked elég csak kiválasztanod a kívánt dátumot és máris számos autónk közül válogathatsz!</p>

                </div>

                <div class="infoAuto">
                    <img src="kepek/perfectcar.png" alt="" />
                    <h3>Foglald le az autód!</h3>
                    <p>Ha már regisztáltál, pár kattintással lefoglalhatod a számodra legideálisabb autót!</p>

                </div>


            </div>


            <div class="cim">
                <h2>Miért válassz minket?</h2>
            </div>
            <div class="marketingContainer">


                <div class="marketingInfo">
                    <div class="marketingIcon">
                        <img src="kepek/priceicon.png" alt="" />
                    </div>



                    <p>Kedvező ár-érték arány</p>


                </div>
                <div class="marketingInfo">
                    <div class="marketingIcon">
                        <img src="kepek/karbantartIcon.png" alt="" />
                    </div>

                    <p>Rendszeresen karbantartott autók</p>


                </div>

                <div class="marketingInfo">
                    <div class="marketingIcon">
                        <img src="kepek/checkIcon.png" alt="" />
                    </div>

                    <p>Rugalmasság</p>


                </div>


            </div>

            <!-- Hírek a főoldalon -->

            <div class="cim">
                <h2>Hírek</h2>
            </div>

            <div class="hirekContainer">

                <div class="hirek">
                    <div class="hirKep">
                        <img src="kepek/hir2.png" alt="" />
                    </div>
                    <div class="hir">
                        <span class="tag">Autós cikkek</span>
                        <h4>
                            Hol érdemes tankolni?
                        </h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus, lorem semper
                            mattis
                            ullamcorper,
                            arcu orci tristique dui, ornare tincidunt enim enim sed mi.
                        </p>
                        <div class="tovabb">
                            <span>Tovább olvasok >></span>
                        </div>
                    </div>
                </div>

                <div class="hirek">
                    <div class="hirKep">
                        <img src="kepek/hir3.png" alt="" />
                    </div>
                    <div class="hir">
                        <span class="tag">Fejlődés</span>
                        <h4>
                            Új prémium modellek kínálatunkban
                        </h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus, lorem semper
                            mattis
                            ullamcorper,
                            arcu orci tristique dui, ornare tincidunt enim enim sed mi.
                        </p>
                        <div class="tovabb">
                            <span>Tovább olvasok >></span>
                        </div>
                    </div>
                </div>

                <div class="hirek">
                    <div class="hirKep">
                        <img src="kepek/hir1.png" alt="" />
                    </div>
                    <div class="hir">
                        <span class="tag">Autós cikkek</span>
                        <h4>
                            Minden, amit tudnod kell a Tesláról
                        </h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus, lorem semper
                            mattis
                            ullamcorper,
                            arcu orci tristique dui, ornare tincidunt enim enim sed mi.
                        </p>
                        <div class="tovabb">
                            <span>Tovább olvasok >></span>
                        </div>
                    </div>
                </div>


            </div>



            <!-- Kiemelt ajánlatok a főoldalon -->

            <div class="kiemelt ajánlatok">

            </div>
        </div>

        <!-- FOOTER -->
        @include('komponensek/footer')
    </main>
</body>

</html>