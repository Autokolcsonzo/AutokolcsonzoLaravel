<!DOCTYPE html>
<html lang="hu-HU">

    <head>
        <title>Dropmyride autókölcsönző</title>
        <link rel="icon" type="image/x-icon" href="..kepek/logo.png">
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Scriptek -->
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/reszponzivDolgok.js"></script>
        <script src="../js/kereso/dropDownKereso.js"></script>
        <script src="../js/kereso/keresesiOpciokAjax.js"></script>
        <script src="../js/kereso/keresesiOpciok.js"></script>
        <script src="../js/kereso/keresoFeltoltes.js"></script>
        <script src="../js/autoLista/autoBetoltes.js"></script>
        <script src="../js/autoLista/autoAjax.js"></script>
        <script src="../js/autoLista/auto.js"></script>
        <script src="../js/autoLista/autok.js"></script>
        <script src="../js/cards/autoCard.js"></script>
        <script src="../js/hambiMenu.js"></script>
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
        <link rel="stylesheet" href="../css/szerkezet.css" />
        <link rel="stylesheet" href="../css/nav.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <link rel="stylesheet" href="../css/fooldal.css" />
        <link rel="stylesheet" href="../css/kereso.css" />
        <link rel="stylesheet" href="css/autoCard.css" />
        <link rel="stylesheet" href="css/jarmuTalalatiLista.css" />
    </head>

    <body>
        <main>
            <!-- TABLET, STB. NÉZET -->
            <div class="wrapper">
                <div class="navbar">
                    <div class="reszpGombok">
                        <a class="reszpBejelentkezes" href="../bejelentkezes.html">Bejelentkezés</a>
                        <a class="reszpRegisztracio" href="../regisztracio.html">Regisztráció</a>
                    </div>
                    <div class="nav_right">
                        <ul>
                            <li class="nr_li dd_main">
                                <img src="../kepek/profile.png" alt="profile_img">

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
                            <img src="..kepek/logo.png" alt="logo" />
                        </div>
                        <li><a href="../index.html">Kezdőlap</a></li>
                        <li><a href="#">Rólunk</a></li>
                        <li><a href="#">Feltételek</a></li>              
                        <li>
                            <a href="../osszesAutoMenubol.html">Járműveink <i class="fa fa-arrow-right"></i></a>
                            <div class="autokMenu">
                                <ul>
                                    <li><a href="../osszesAutoMenubol.html">Összes</a></li>
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
                    <li><a href="../index.html">Kezdőlap</a></li>
                    <li><a href="../bejelentkezes.html">Bejelentkezés</a></li>
                    <li><a href="../regisztracio.html">Regisztráció</a></li>
                    <li><a href="#">Rólunk</a></li>
                    <li><a href="#">Feltételek</a></li>
                    <li><a href="#">Járműveink</a></li>
                    <li>
                        <img src="../kepek/profile.png" alt="profil" />
                    </li>
                </ul>
            </div>

            <ul>
                <li class="navElem2"><a href="../osszesAutoMenubol.html">Összes</a></li>
                <li class="navElem2"><a href="#">Autók</a></li>
                <li class="navElem2"><a href="#">Furgonok</a></li>
                <li class="navElem2"><a href="#">Pickupok</a></li>
            </ul>
        </div>
    </li>
</ul>
</nav> -->


<!--   Fejléc -->


<div class="header">


    <!-- headerben a bejelentkezés és regisztráció gombok -->
    <div class="hsor1">
        <div class="gombok">
            <button class="bejelentkezes" a>
                <i class="fa fa-user"></i></a>
                <a href="../bejelentkezes.html">Bejelentkezés
            </button>
            <button class="regisztracio">
                <a href="../regisztracio.html">Regisztráció</a>
            </button>
        </div>
    </div>

    <!-- főszöveg és kis kép div-je -->
    <div class="hsor2">
        <!-- header-ben a főszöveg -->
        <div class="headerSzoveg">
            <h1 id="foglalasszoveg1">Foglalások</h1>

        </div>
        <div class="headerkep">
            <img src="../kepek/headerimgSmaller.png" id="fokep" alt="" />
        </div>
    </div>

</div>
<div class="kereses">
    <form action="">
        <div class="input-box">
            <span>Válassz helyszíneink közül</span>
            <select id="helyszinek" name="helyszinek">
                <option value="helyszin">-- Helyszín --</option>
                <option value="ors">Budapest Örs Vezér Tér</option>
                <option value="pecs">Pécs</option>
                <option value="szeged">Szeged</option>
            </select>
            <!--  <br><br><br> -->

        </div>
        <div class="input-box">
            <span>Elvitel dátuma</span>
            <input type="date" id="elvitel" name="elvitel" />
        </div>
        <div class="input-box">
            <span>Visszahozatal dátuma</span>
            <input type="date" id="visszavitel" name="visszavitel" />
        </div>
        <div class="input-box2">
            <input style="margin-top: 10px" type="time" id="idoEl" name="idoEl" />
            <input style="margin-top: 10px" type="time" id="idoVissza" name="idoVissza" />
        </div>
        <input type="submit" name="kereses" id="kereses" value="Keresés" class="btn" />
    </form>
</div>


<!-- felhasználóknak segítség/információ a foglaláshoz -->
<div id="primary_content">
    <div class="fooldalInfo">
        <div class="infoHelyszin">
            <img src="../kepek/location.png" alt="" />
            <h3>Válassz helyszínt!</h3>
            <p>Több telephelyünk közül választhatod ki a számodra legmegfelelőbbet az országban!</p>


        </div>
        <div class="infoDatum">
            <img src="../kepek/date.png" alt="" />
            <h3>Tűzd ki a dátumot!</h3>
            <p>Neked elég csak kiválasztanod a kívánt dátumot és máris számos autónk közül válogathatsz!</p>

        </div>

        <div class="infoAuto">
            <img src="../kepek/perfectcar.png" alt="" />
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
                <img src="../kepek/priceicon.png" alt="" />
            </div>



            <p>Kedvező ár-érték arány</p>


        </div>
        <div class="marketingInfo">
            <div class="marketingIcon">
                <img src="../kepek/karbantartIcon.png" alt="" />
            </div>

            <p>Rendszeresen karbantartott autók</p>


        </div>

        <div class="marketingInfo">
            <div class="marketingIcon">
                <img src="../kepek/checkIcon.png" alt="" />
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
                <img src="../kepek/hir2.png" alt="" />
            </div>
            <div class="hir">
                <span class="tag">Autós cikkek</span>
                <h4>
                    Hol érdemes tankolni?
                </h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus, lorem semper mattis
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
                <img src="../kepek/hir3.png" alt="" />
            </div>
            <div class="hir">
                <span class="tag">Fejlődés</span>
                <h4>
                    Új prémium modellek kínálatunkban
                </h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus, lorem semper mattis
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
                <img src="../kepek/hir1.png" alt="" />
            </div>
            <div class="hir">
                <span class="tag">Autós cikkek</span>
                <h4>
                    Minden, amit tudnod kell a Tesláról
                </h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus, lorem semper mattis
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
<!-- Footer -->
<footer>
    <div id="footer_links">
        <div id="footer_lists">
            <div id="footer_logo">
                <img src="../kepek/logo.png" alt="logo" /><br><br>
                <h6 id="payment_icon_txt">fizetési lehetőségek:</h6>
                <div id="payment_icons">
                    <img src="../kepek/credit-card-svgrepo-com.svg" alt="cardicon" />
                    <img src="../kepek/cash1.svg" alt="cashicon" />
                    <img src="../kepek/bitcoin-btc-logo.svg" alt="bitcoinIcon" />
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
                    <p>Válalatunk 2022-es fennállása óta biztosít minőségi és gyors autó kölcsönzést vásárlóinknak és ezt a jó
                        szokásunkat nem szeretnénk megváltoztatni. Vásárlóink mindíg elégedettek voltak mint árainkkal mint
                        szolgáltatásiankkal.</p>
                </dd>
            </dl>
            <div id="footer_connections">
                <div id="footer_icons">
                    <ul>
                        <li><a href=""><img src="../kepek\3377042_gmail_logo_media_social_icon.svg" alt="gmail_icon"></a></li>
                        <li><a href=""><img src="../kepek\5296520_bubble_chat_mobile_whatsapp_whatsapp logo_icon.svg" alt="whatsapp_icon"></a></li>
                        <li><a href=""><img src="../kepek\5365678_fb_facebook_facebook logo_icon.svg" alt="facebook_icon"></a></li>
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
