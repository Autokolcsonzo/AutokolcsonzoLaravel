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
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <!--   <link rel="stylesheet" href="css/regisztracio.css" /> -->
    <link rel="stylesheet" href="Felhasználó/css/felhasznaloiProfil.css" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        <div class="wrapper">
            <div class="navbar">
                <div class="reszpGombok">
                    <a class="reszpBejelentkezes" href="bejelentkezes.html">Bejelentkezés</a>
                    <a class="reszpRegisztracio" href="regisztracio.html">Regisztráció</a>
                </div>
                <div class="nav_right">
                    <ul>
                        <li class="nr_li dd_main">
                            <img src="kepek/profile.png" alt="profile_img">

                            <div class="dd_menu">
                                <div class="dd_left">
                                    <ul>
                                        <li><i class="fas fa-user-circle"></i></li>
                                        <li><i class="fas fa-clipboard-list"></i></li>
                                        <li><i class="fas fa-sign-out-alt"></i></li>
                                    </ul>
                                </div>
                                <div class="dd_right">
                                    <ul>
                                        <li>Profilom</li>
                                        <li>Foglalásaim</li>
                                        <li>Logout</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ELSŐDLEGES NAV -->
        <div class="headerSzoveg">
            <h1 class="reszponzivCim">Keresd meg a számodra megfelelő autót!</h1>
        </div>

        <nav>
            <div class="container">
                <p class="reszponzivLogo">DropMyRide</p>
                <ul>
                    <div class="logo">
                        <img src="kepek/logo.png" alt="logo" />
                    </div>
                    <li><a href="index.html">Kezdőlap</a></li>
                    <li><a href="#">Rólunk</a></li>
                    <li><a href="#">Feltételek</a></li>
                    <li>
                        <a href="osszesAutoMenubol.html">Járműveink <i class="fa fa-arrow-right"></i></a>
                        <div class="autokMenu">
                            <ul>
                                <li><a href="osszesAutoMenubol.html">Összes</a></li>
                                <li><a href="#">Autók</a></li>
                                <li><a href="#">Furgonok</a></li>
                                <li><a href="#">Pickupok</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- HAMBI MENÜ GOMB -->
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>

        <!-- MOBIL NAV -->
        <div class="mobilNav">
            <ul class="navLista2">
                <li><a href="index.html">Kezdőlap</a></li>
                <li><a href="bejelentkezes.html">Bejelentkezés</a></li>
                <li><a href="regisztracio.html">Regisztráció</a></li>
                <li><a href="#">Rólunk</a></li>
                <li><a href="#">Feltételek</a></li>
                <li><a href="#">Járműveink</a></li>
                <li>
                    <img src="kepek/profile.png" alt="profil" />
                </li>
            </ul>
        </div>

        <!--   Fejléc -->


        <div class="header">


            <!-- headerben a bejelentkezés és regisztráció gombok -->
            <div class="hsor1">
                <div class="gombok">
                    <button class="bejelentkezes" a>
                        <i class="fa fa-user"></i></a>
                        <a href="bejelentkezes.html">Bejelentkezés
                    </button>
                    <button class="regisztracio">
                        <a href="regisztracio.html">Regisztráció</a>
                    </button>
                </div>
            </div>

            <!-- főszöveg és kis kép div-je -->
            <div class="hsor2">
                <!-- header-ben a főszöveg -->
                <div class="headerSzoveg">
                    <h1 id="foglalasszoveg1">Keresd meg a számodra megfelelő autót!</h1>
                    <h1 id="foglalasszoveg2">Kezdj bele a foglalásba!</h1>
                </div>
                <div class="headerkep">
                    <img src="kepek/headerimgSmaller.png" id="fokep" alt="" />
                </div>
            </div>

            <!-- autókeresés részletes keresés nélkül -->
            <!--    <div class="hsor3">
              <div class="autoKereso"> -->

            <!-- főoldali autókereső form -->

            <!--     </div>
              </div> -->
        </div>
        <div class="fprofil">
            <div class="bejelentkezoFelulet">
                <form method="post">
                    @csrf
                    <!--  {{$errors}}
                    {{ csrf_field() }} -->
                    <div class="form-header">
                        <h3>Bejelentkezés</h3>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="fnev">Felhasználónév:</label>

                            <br />
                            <input type="text" name="fnev" id="fnev" placeholder="valaki97" /><br />
                            @error('fnev')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="jelszo1">Jelszó:</label>
                                <br>
                                <input type="password" id="jelszo1" name="jelszo1" class="jelszo" placeholder="******" />
                                @error('jelszo1')
                                <span>{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <input type="submit" value="Bejelentkezés" id="adatotMent" />


                </form>
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div id="footer_links">
                <div id="footer_lists">
                    <div id="footer_logo">
                        <img src="kepek/logo.png" alt="logo" /><br><br>
                        <h6 id="payment_icon_txt">fizetési lehetőségek:</h6>
                        <div id="payment_icons">
                            <img src="kepek/credit-card-svgrepo-com.svg" alt="cardicon" />
                            <img src="kepek/cash1.svg" alt="cashicon" />
                            <img src="kepek/bitcoin-btc-logo.svg" alt="bitcoinIcon" />
                        </div>
                    </div>
                    <dl id="footer_list_1">
                        <dt>
                            <h3>Segítség</h3>
                        </dt><br>
                        <dd><a href="">Kapcsolat felvétel</a></dd>
                        <dd><a href="">Oldaltérkép</a></dd>
                        <dd><a href="">Helpdesk</a></dd>
                        <dd><a href="">FAQ</a></dd>
                    </dl>
                    <dl id="footer_list_2">
                        <dt>
                            <h3>Navigáció</h3>
                        </dt><br>
                        <dd><a href="">Kezdőlap</a></dd>
                        <dd><a href="">Autó keresés</a></dd>
                        <dd><a href="">foglalásaim</a></dd>
                        <dd><a href="">profilom</a></dd>
                    </dl>
                    <dl id="tortenetunk">
                        <dt>
                            <h3>Történetünk</h3>
                        </dt><br>
                        <dd>
                            <p>Válalatunk 2022-es fennállása óta biztosít minőségi és gyors autó kölcsönzést
                                vásárlóinknak és ezt a jó
                                szokásunkat nem szeretnénk megváltoztatni. Vásárlóink mindíg elégedettek voltak mint
                                árainkkal mint
                                szolgáltatásiankkal.</p>
                        </dd>
                    </dl>
                    <div id="footer_connections">
                        <div id="footer_icons">
                            <ul>
                                <li><a href=""><img src="kepek\3377042_gmail_logo_media_social_icon.svg" alt="gmail_icon"></a></li>
                                <li><a href=""><img src="kepek\5296520_bubble_chat_mobile_whatsapp_whatsapp logo_icon.svg" alt="whatsapp_icon"></a></li>
                                <li><a href=""><img src="kepek\5365678_fb_facebook_facebook logo_icon.svg" alt="facebook_icon"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="vonal1"></div>
                <div id="helyszinek">
                    <ul>
                        <li>
                            <address>
                                <h4>Szeged</h4>4521 Kerge Jenő utca 83
                            </address>
                        </li>
                        <li><a class="telefon_Szam" href="tel:+36301088482">Hívás: +3630-108-84-82</a></li>
                    </ul>
                    <ul>
                        <li>
                            <address>
                                <h4>Budapest</h4>Mérnökutca 39
                            </address>
                        </li>
                        <li><a class="telefon_Szam" href="tel:+36304512356">Hívás: +3630-451-33-56</a></li>
                    </ul>
                    <ul>
                        <li>
                            <address>
                                <h4>Győr</h4>5731 Kelemen út 12
                            </address>
                        </li>
                        <li><a class="telefon_Szam" href="tel:06209623456">Hívás: 0620-962-34-56</a></li>
                    </ul>
                </div>
                <div class="vonal1"></div>
                <h5 id="copyRight">@2022 Minden jog fenntartva</h5>
        </footer>
    </main>
</body>

</html>