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
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/fooldal.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/kereso.css" />
    <link rel="stylesheet" href="css/jarmuveinkKartya.css" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/nav')

        <!--   Fejléc -->
        @include('komponensek/header')

        <!-- felhasználóknak segítség/információ a foglaláshoz -->
        <div id="primary_content">
            <div class="fooldalInfo">
                <form class="autokRendezes">
                    <div>
                        <label class="kategoriaLabel" for="autoKategoria">Kategória:</label>
                        <select name="autoKategoria" id="autoKategoria">
                            <option value>Összes kategória</option>
                            <option value="compact">Compact</option>
                            <option value="economy">Economy</option>
                            <option value="luxus">Luxus</option>
                            <option value="mini">Mini</option>
                            <option value="premium">Premium</option>
                            <option value="standard">Standard</option>
                        </select>
                    </div>

                    <div>
                        <label class="karosszeriaLabel" for="autoKarosszeria">Karosszéria:</label>
                        <select name="autoKarosszeria" id="autoKarosszeria">
                            <option value>Összes karosszéria</option>
                            <option value="2-3ajto">2-3 ajtós</option>
                            <option value="4-5ajto">4-5 ajtós</option>
                            <option value="kabrio">Kabrió</option>
                            <option value="kombi">Kombi</option>
                            <option value="teherauto">Teherautó</option>
                            <option value="egyteru">Egyterű</option>
                        </select>
                    </div>

                    <div>
                        <label class="valtoLabel" for="autoValto">Váltó:</label>
                        <select name="autoValto" id="autoValto">
                            <option value>Összes váltó</option>
                            <option value="automata">Autómata</option>
                            <option value="manualis">Manuális</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="szuresGomb">Szűrés</button>
                    </div>
                </form>

            </div>

            <!-- Összes autó -->

            <div class="cim">
                <h2>Összes jármű</h2>
            </div>

            <div class="hirekContainer">
                <div class="hirek">

                    <div class="placeholder_item2">
                        <div class="tartalom">
                            <img src="kepek/probaauto.jpg" alt="" class="kep" />
                            <h3 class="termeknev">Ford Fiesta</h3>
                            <p class="leiras">
                                Akár havi 123.000 Ft-tól.
                            </p>
                        </div>
                        <div class="adatok">
                            <div>
                                <span>Karosszéria</span>
                                <span>4-5 ajtós</span>
                            </div>
                            <div>
                                <span>Váltó</span>
                                <span>Manuális</span>
                            </div>
                            <div>
                                <span>Utasok</span>
                                <span>4 utas</span>
                            </div>
                            <div>
                                <span>Csomagok</span>
                                <span>2 csomag</span>
                            </div>
                        </div>
                        <div class="autoListaGombok">
                            <button type="submit" class="lefoglalas">Lefoglalás</button>
                            <button type="submit" class="reszletek">Részletek</button>
                        </div>
                    </div>
                </div>

                <div class="hirek">
                    <div class="placeholder_item2">
                        <div class="tartalom">
                            <img src="kepek/probaauto.jpg" alt="" class="kep" />
                            <h3 class="termeknev">Ford Fiesta</h3>
                            <p class="leiras">
                                Akár havi 123.000 Ft-tól.
                            </p>
                        </div>
                        <div class="adatok">
                            <div>
                                <span>Karosszéria</span>
                                <span>4-5 ajtós</span>
                            </div>
                            <div>
                                <span>Váltó</span>
                                <span>Manuális</span>
                            </div>
                            <div>
                                <span>Utasok</span>
                                <span>4 utas</span>
                            </div>
                            <div>
                                <span>Csomagok</span>
                                <span>2 csomag</span>
                            </div>
                        </div>
                        <div class="autoListaGombok">
                            <button type="submit" class="lefoglalas">Lefoglalás</button>
                            <button type="submit" class="reszletek">Részletek</button>
                        </div>
                    </div>
                </div>

                <div class="hirek">
                    <div class="placeholder_item2">
                        <div class="tartalom">
                            <img src="kepek/probaauto.jpg" alt="" class="kep" />
                            <h3 class="termeknev">Ford Fiesta</h3>
                            <p class="leiras">
                                Akár havi 123.000 Ft-tól.
                            </p>
                        </div>
                        <div class="adatok">
                            <div>
                                <span>Karosszéria</span>
                                <span>4-5 ajtós</span>
                            </div>
                            <div>
                                <span>Váltó</span>
                                <span>Manuális</span>
                            </div>
                            <div>
                                <span>Utasok</span>
                                <span>4 utas</span>
                            </div>
                            <div>
                                <span>Csomagok</span>
                                <span>2 csomag</span>
                            </div>
                        </div>
                        <div class="autoListaGombok">
                            <button type="submit" class="lefoglalas">Lefoglalás</button>
                            <button type="submit" class="reszletek">Részletek</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>