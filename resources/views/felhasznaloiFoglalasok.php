<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <title>Dropmyride autókölcsönző</title>
    <link rel="icon" type="image/x-icon" href="..kepek/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Scriptek -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="../js/reszponzivDolgok.js"></script>
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
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="css/felhaszFoglalas.css" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/nav')

        <!--   Fejléc -->
        @include('komponensek/header')

        <div id="primary_content">

            <!-- fő container -->
            <div class="fFoglalasok">


                <!-- foglalás kártyák -->
                <div class="fFoglalas">
                    <!-- foglalás adatok -->
                    <div class="fogAdatok">
                        <!-- kép az autóról -->
                        <img src="../kepek/probaauto.jpg" alt="" id="foglalasKep" />
                        <!-- Autó megnevezése-->

                        <h3 class="termeknev">Ford Fiesta</h3>
                        <!-- dátumok div-je -->
                        <div class="datum">

                            <div id="elvitel">
                                <h4>
                                    Elvitel:
                                </h4>
                                <p id="elvit">2022.01.02. </p>
                            </div>



                            <div id="visszahozatal">
                                <h4>Visszahozatal:</h4>
                                <p id="visszahoz">2022.01.13. </p>

                            </div>
                        </div>
                        <!-- gombok -->

                        <button type="submit" id="fogMod">Foglalás módosítása</button>
                        <button type="submit" id="fogLemond">Foglalás lemondása</button>
                    </div>

                    <!-- lenyíló részletek -->
                    <details>
                        <summary>
                            <div class="reszletTrigger">
                                <ul>
                                    <li>Részletek <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </summary>

                        <div class="reszlet">
                            <div class="reszletAdatok">
                                <table class="reszAdatokTable">

                                    <tr>
                                        <td>Foglalás összege: </td>
                                        <td id="osszeg">125 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Befizettet összeg: </td>
                                        <td id="befizetett">50 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Fizetendő összeg: </td>
                                        <td id="hatralek">75 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Átvevő pont: </td>
                                        <td id="telephely">Pécs</td>

                                    </tr>
                                    <tr>
                                        <td>Modell: </td>
                                        <td id="modell">Modell megnevezése</td>

                                    </tr>
                                    <tr>
                                        <td>Kivitel: </td>
                                        <td id="kivitel">Kivitel megnevezése</td>



                                    </tr>

                                    <tr>
                                        <td>Üzemanyag típusa: </td>
                                        <td id="uzemanyag">Benzin</td>

                                    </tr>


                                </table>
                            </div>
                    </details>





                </div>

                <div class="fFoglalas">
                    <div class="fogAdatok">

                        <img src="../kepek/probaauto.jpg" alt="" id="foglalasKep" />


                        <h3 class="termeknev">Opel Astra</h3>

                        <div class="datum">

                            <div id="elvitel">
                                <h4>
                                    Elvitel:
                                </h4>
                                2022.01.02.
                            </div>



                            <div id="visszahozatal">
                                <h4>Visszahozatal:</h4>
                                2022.01.13.
                            </div>
                        </div>

                        <button type="submit" id="fogMod">Foglalás módosítása</button>
                        <button type="submit" id="fogLemond">Foglalás lemondása</button>
                    </div>

                    <details>
                        <summary>
                            <div class="reszletTrigger">
                                <ul>
                                    <li>Részletek <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </summary>

                        <div class="reszlet">
                            <div class="reszletAdatok">
                                <table class="reszAdatokTable">

                                    <tr>
                                        <td>Foglalás összege: </td>
                                        <td id="osszeg">125 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Befizettet összeg: </td>
                                        <td id="befizetett">50 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Fizetendő összeg: </td>
                                        <td id="hatralek">75 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Átvevő pont: </td>
                                        <td id="telephely">Pécs</td>

                                    </tr>
                                    <tr>
                                        <td>Modell: </td>
                                        <td id="modell">Modell megnevezése</td>

                                    </tr>
                                    <tr>
                                        <td>Kivitel: </td>
                                        <td id="kivitel">Kivitel megnevezése</td>



                                    </tr>

                                    <tr>
                                        <td>Üzemanyag típusa: </td>
                                        <td id="uzemanyag">Benzin</td>

                                    </tr>


                                </table>
                            </div>
                    </details>





                </div>
                <div class="fFoglalas">
                    <div class="fogAdatok">

                        <img src="../kepek/probaauto.jpg" alt="" id="foglalasKep" />


                        <h3 class="termeknev">Opel Astra</h3>

                        <div class="datum">

                            <div id="elvitel">
                                <h4>
                                    Elvitel:
                                </h4>
                                2022.01.02.
                            </div>



                            <div id="visszahozatal">
                                <h4>Visszahozatal:</h4>
                                2022.01.13.
                            </div>
                        </div>

                        <button type="submit" id="fogMod">Foglalás módosítása</button>
                        <button type="submit" id="fogLemond">Foglalás lemondása</button>
                    </div>

                    <details>
                        <summary>
                            <div class="reszletTrigger">
                                <ul>
                                    <li>Részletek <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </summary>

                        <div class="reszlet">
                            <div class="reszletAdatok">
                                <table class="reszAdatokTable">

                                    <tr>
                                        <td>Foglalás összege: </td>
                                        <td id="osszeg">125 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Befizettet összeg: </td>
                                        <td id="befizetett">50 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Fizetendő összeg: </td>
                                        <td id="hatralek">75 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Átvevő pont: </td>
                                        <td id="telephely">Pécs</td>

                                    </tr>
                                    <tr>
                                        <td>Modell: </td>
                                        <td id="modell">Modell megnevezése</td>

                                    </tr>
                                    <tr>
                                        <td>Kivitel: </td>
                                        <td id="kivitel">Kivitel megnevezése</td>



                                    </tr>

                                    <tr>
                                        <td>Üzemanyag típusa: </td>
                                        <td id="uzemanyag">Benzin</td>

                                    </tr>


                                </table>
                            </div>
                    </details>





                </div>
                <div class="fFoglalas">
                    <div class="fogAdatok">

                        <img src="../kepek/probaauto.jpg" alt="" id="foglalasKep" />


                        <h3 class="termeknev">Opel Astra</h3>

                        <div class="datum">

                            <div id="elvitel">
                                <h4>
                                    Elvitel:
                                </h4>
                                2022.01.02.
                            </div>



                            <div id="visszahozatal">
                                <h4>Visszahozatal:</h4>
                                2022.01.13.
                            </div>
                        </div>

                        <button type="submit" id="fogMod">Foglalás módosítása</button>
                        <button type="submit" id="fogLemond">Foglalás lemondása</button>
                    </div>

                    <details>
                        <summary>
                            <div class="reszletTrigger">
                                <ul>
                                    <li>Részletek <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </summary>

                        <div class="reszlet">
                            <div class="reszletAdatok">
                                <table class="reszAdatokTable">

                                    <tr>
                                        <td>Foglalás összege: </td>
                                        <td id="osszeg">125 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Befizettet összeg: </td>
                                        <td id="befizetett">50 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Fizetendő összeg: </td>
                                        <td id="hatralek">75 000 Ft</td>


                                    </tr>

                                    <tr>
                                        <td>Átvevő pont: </td>
                                        <td id="telephely">Pécs</td>

                                    </tr>
                                    <tr>
                                        <td>Modell: </td>
                                        <td id="modell">Modell megnevezése</td>

                                    </tr>
                                    <tr>
                                        <td>Kivitel: </td>
                                        <td id="kivitel">Kivitel megnevezése</td>



                                    </tr>

                                    <tr>
                                        <td>Üzemanyag típusa: </td>
                                        <td id="uzemanyag">Benzin</td>

                                    </tr>


                                </table>
                            </div>
                    </details>





                </div>



            </div>



        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>