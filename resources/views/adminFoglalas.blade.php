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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="../js/admin/Felhasznalo.js"></script>
    <script src="../js/Ajax.js"></script>
    <script src="../js/admin/jsFelhasznalok.js"></script>
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
    <!--   <link rel="stylesheet" href="css/fooldal.css" /> -->
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/admin/admin.css" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/nav')

        <!--   Fejléc -->
        @include('komponensek/header')

        <div id="primary_content">

            <!-- ADMIN TÁBLÁZAT, KERESÉS -->
            <div class="adminKereses">
                <div class="n1">
                    <div class="kereses">
                        <i class="far fa-search"></i>
                        <input type="text" placeholder="Search">
                    </div>
                </div>

                <div class="adminFeladatValasztas">
                    <div>
                        <select name="adminKategoriak" id="adminKategoriak">
                            <option value="adminAutok">Autók</option>

                            <option value="adminFoglalasok">Foglalások</option>
                        </select>
                    </div>
                </div>




            </div>
            <h3 class="oldalNev">Felhasználók</h3>
            <div class="values">
                <div class="val-box">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>16</h3>
                        <span>Összes felhasználó</span>
                    </div>
                </div>
                <!--         </div> -->

                <!--    <div class="values"> -->
                <div class="val-box">
                    <i class="fas fa-car"></i>
                    <div>
                        <h3>194</h3>
                        <span>Összes foglalás</span>
                    </div>
                </div>
                <!--   </div> -->
                <!-- 
                                    <div class="values"> -->
                <div class="val-box">
                    <i class="fas fa-money-check-alt"></i>
                    <div>
                        <h3>1.320.456Ft</h3>
                        <span>Bejövő összeg</span>
                    </div>
                </div>
            </div>


            <div class="foglalasAdmin">
                <div class="fogFejlec">
                    <h2>Azonosító</h2>
                    <h2>Alvázszám</h2>
                    <h2>Felhasználó</h2>
                    <h2>Foglalás ideje</h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                </div>
                <div class="foglalas">

                    <div class="foadatok">
                        <p class="azonosito">Azonosító</p>
                        <p class="alvazszam">Alvázszám</p>
                        <p class="felhasznalo">Felhasználó</p>
                        <p class="fogIdo">Foglalás ideje</p>
                        <p><input type="button" name="fReszletek" class="fReszletek" value="Részletek" /></p>
                        <p><input type="button" name="fadatokMod" class="fadatokMod" value="Adatok módosítása" /></p>
                        <p><input type="button" name="torles" class="torles" value="Törlés" /></p>
                    </div>

                    <div class="reszletek">
                        <div class="reszlet">
                            <div class="reszletFejlec">
                                <h2>Elvitel</h2>
                                <h2>Visszahozatal</h2>
                                <h2>Érvényesség</h2>
                                <h2>Kedvezmény</h2>
                                <h2>Állapot</h2>
                                <h2></h2>
                                <h2></h2>
                            </div>
                            <div class="reszletadatok">
                                <p class="elvitel">Elvitel</p>
                                <p class="visszahozatal">Visszahozatal</p>
                                <p class="ervenyesseg">Érvényesség</p>
                                <p class="kedvezmeny">Kedvezmény</p>
                                <p class="allapot">Állapot</p>


                            </div>
                        </div>

                    </div>


                </div>

            </div>






            <div class="formcontainer">
                <div class="foglalasModositas">
                    <form method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-header">
                            <h3>Adatok módosítása</h3>
                        </div>
                        <div class="sor">
                            <div class="inputfield">
                                <label for="elvitelDate">Elvitel dátuma:</label>
                                <br />
                                <input type="date" name="elvitelDate" id="elvitelDate" />

                            </div>

                            <div class="inputfield">
                                <label for="visszahozDate">Visszahozatal dátuma:</label>
                                <br />
                                <input type="date" name="visszahozDate" id="visszahozDate" />
                            </div>

                        </div>
                        <div class="sor">
                            <div class="inputfield">
                                <label for="elvitelTime">Elvitel ideje:</label>
                                <br />
                                <select type="time" id="elvitelTime" name="elvitelTime">

                                </select>
                            </div>

                            <div class="inputfield">
                                <label for="visszahozTime">Visszahozatal ideje:</label>
                                <br />
                                <select type="time" id="visszahozTime" name="visszahozTime">

                                </select>
                            </div>

                        </div>










                        <input type="submit" value="Adatok mentése" id="adatotMent" />


                    </form>
                </div>
            </div>

        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>