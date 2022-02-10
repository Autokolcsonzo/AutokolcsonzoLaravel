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
    <script src="../js/Ajax.js"></script>
    <script src="../js/felhasznalo/FelhasznaloProfil.js"></script>
    <script src="../js/felhasznalo/felhasznaloProfilJs.js"></script>
    <script src="../js/felhasznalo/modosit.js"></script>
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
    <link rel="stylesheet" href="css/felhasznaloiProfil.css" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/nav')

        <!--   Fejléc -->
        @include('komponensek/header')

        <div id="primary_content">
            <div class="fprofil">
                <div class="profilkep">
                    <img src="../kepek/profilkep.png" id="profKep" alt="" /><br>
                    <input type="submit" name="fkepMod" id="fkepMod" value="Profilkép feltöltése" />
                    <input type="file" id="profkepFel" name="profilkep" accept="image/png, image/jpeg">

                </div>

                <div class="fadatok">
                    <table class="fadatokTable">

                        <tr>
                            <td>Felhasznalónév: </td>
                            <td id="fnev">valaki97</td>
                            <td>Jelszó: </td>
                            <td id="jelszo">********</td>


                        </tr>

                        <tr>
                            <td>Felhasznalónév: </td>
                            <td id="fnev">valaki97</td>
                            <td>Jelszó: </td>
                            <td id="jelszo">********</td>


                        </tr>

                        <tr>
                            <td>Vezetéknév: </td>
                            <td id="vnev">Kovács</td>
                            <td>Keresztnév: </td>
                            <td id="knev">Kati</td>

                        </tr>
                        <tr>
                            <td>Születési idő: </td>
                            <td id="szido">1997.03.22.</td>

                        </tr>
                        <tr>
                            <td>Irányító szám: </td>
                            <td id="irszam">2230</td>
                            <td>Megye: </td>
                            <td id="megye">Pest megye</td>


                        </tr>

                        <tr>
                            <td>Város: </td>
                            <td id="varos">Gyömrő</td>
                            <td>Utca: </td>
                            <td id="utca">Valamilyen utca</td>

                        </tr>

                        <tr>
                            <td>Házszám: </td>
                            <td id="hszam">22</td>

                        </tr>
                        <tr>
                            <td>E-mail cím: </td>
                            <td id="email">valami@valami.com</td>
                            <td>Telefonszám: </td>
                            <td id="tszam">06307777777</td>

                        </tr>
                    </table>


                    </tr>
                    </table>
                    <input type="button" name="fadatokMod" id="fadatokMod" value="Adatok módosítása" />

                </div>


                <div class="felhasznaloiModositas">
                    <form action="">
                        <div class="form-header">
                            <h3>Adatok módosítása</h3>
                        </div>
                        <div class="sor">
                            <div class="inputfield">
                                <label for="nev">Vezetéknév:</label>
                                <br />
                                <input type="text" name="vnev" id="vnev" placeholder="Kovács" />

                            </div>

                            <div class="inputfield">
                                <label for="nev">Keresztnév:</label><br>

                                <input type="text" name="knev" id="knev" placeholder="Kati" />
                            </div>

                        </div>





                        <div class="sor">
                            <div class="inputfield">
                                <label for="fnev">Felhasználónév:</label>

                                <br />
                                <input type="text" name="fnev" id="fnev" placeholder="valaki97" /><br />
                            </div>

                            <div class="inputfield">
                                <label for="email">E-mail cím:</label> <br />
                                <input type="email" id="email" name="email" placeholder="valami@gmail.com" />
                            </div>
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="jelszo1">Jelszó:</label>
                                <br>
                                <input type="password" id="jelszo1" name="jelszo1" class="jelszo"
                                    placeholder="******" />
                            </div>

                            <div class="inputfield">
                                <label for="jelszo2">Jelszó újra:</label>
                                <br>
                                <input type="password" name="jelszo2" id="jelszo2" class="jelszo"
                                    placeholder="******" />
                            </div>

                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="szdatum">Születési dátum:</label><br>
                                <input type="date" name="szdatum" id="szdatum" /><br>
                            </div>

                            <div class="inputfield">
                                <label for="telszam">Telefonszám:</label><br>
                                <input type="text" class="telszam" placeholder="+36-20-345-6789" />
                            </div>

                        </div>


                        <div class="sor">


                            <div class="inputfield">
                                <label>Cím:</label>
                                <br />
                                <input type="text" id="iranyitoszam" placeholder="Irányítószám" />

                            </div>

                        </div>

                        <div class="sor">

                            <div class="inputfield">
                                <input type="text" id="megye" placeholder="Megye" />
                            </div>

                            <div class="inputfield">
                                <input type="text" id="varos" placeholder="Város" />
                            </div>







                        </div>


                        <div class="sor">

                            <div class="inputfield">
                                <input type="text" id="utca" placeholder="Utca" />

                            </div>

                            <div class="inputfield">

                                <input type="text" id="hazszam" placeholder="Házszám" />
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