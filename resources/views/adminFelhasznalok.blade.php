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
                    <div id="adminKategoriak">
                        <a href="{{ 'adminAutok' }}">Autók</a>
                        <a href="#">Felhasználók</a>
                        <a href="{{ 'adminFoglalas' }}">Foglalások</a>
                    </div>
                </div>


                <div class="jogkorValasztas">
                    <div>
                        <select name="jogkorKategoriak" id="jogkorKategoriak">
                            <option value="felhasznaloJog">Felhasználók</option>

                            <option value="adminJog">Adminok</option>
                        </select>
                    </div>
                </div>

            </div>

            <h3 class="oldalNev">Felhasználók</h3>
            
             <!-- 3 ablak adatokkal -->
             <div class="values">
                <div class="val-box">
                    <i class="fas fa-users"></i>
                    <div class="felhasznalokSzamaSablon">
                        <h3 class="felhasznalokSzama">{{$felhasznalok}}</h3>
                        <span>Összes felhasználó</span>
                    </div>
                </div>
                <!--         </div> -->

                <!--    <div class="values"> -->
                <div class="val-box">
                    <i class="fas fa-car"></i>
                    <div>
                        <h3>{{$foglalasok}}</h3>
                        <span>Összes foglalás</span>
                    </div>
                </div>
                <!--   </div> -->
                <!-- 
                                    <div class="values"> -->
                <div class="val-box">
                    <i class="fas fa-money-check-alt"></i>
                    <div>
                        <h3>{{$bevetel}}</h3>
                        <span>Bejövő összeg</span>
                    </div>
                </div>
            </div>


            <div class="felhasznalokAdmin">
                <div class="felhFejlec">
                    <h2>Jogkör</h2>
                    <h2>Felhasználónev</h2>
                    <h2>E-mail</h2>
                    <h2>Reg. dátum</h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                </div>
                <div class="felhasznalo">

                    <div class="foadatok">
                        <p class="jogkor">Jogkör</p>
                        <p class="felhnev">Felhasználó név</p>
                        <p class="email">Email</p>
                        <p class="regDatum">regDatum</p>
                        <p><input type="button" name="fReszletek" class="fReszletek" value="Részletek" /></p>
                        <p><input type="button" name="fadatokMod" class="fadatokMod" value="Adatok módosítása" /></p>
                        <p><input type="button" name="torles" class="torles" value="Törlés" /></p>
                    </div>

                    <div class="reszletek">
                    <div class="reszlet">
                        <div class="reszletFejlec">
                            <h2>Irányítószám</h2>
                            <h2>Megye</h2>
                            <h2>Város</h2>
                            <h2>Utca</h2>
                            <h2>Házszám</h2>
                            <h2>Telefonszám</h2>
                            <h2>Születési idő</h2>
                        </div>
                        <div class="reszletadatok">
                            <p class="iranyitoszam">Irányítószám</p>
                            <p class="megye">Megye</p>
                            <p class="varos">Város</p>
                            <p class="utca">Utca</p>
                            <p class="hazszam">Házszám</p>
                            <p class="telszam">Telefonszám</p>
                            <p class="szul_ido">Születési idő</p>



                        </div>
                    </div>
                    </div>
                </div>

            </div>






            <div class="formcontainer">
                <div class="felhasznaloiModositas">
                    <form method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-header">
                            <h3>Adatok módosítása</h3>
                        </div>
                        <div class="sor">
                            <div class="inputfield">
                                <label for="nev">Vezetéknév:</label>
                                <br />
                                <input type="text" name="vnev" id="ivnev" placeholder="Kovács" />

                            </div>

                            <div class="inputfield">
                                <label for="nev">Keresztnév:</label><br>

                                <input type="text" name="knev" id="iknev" placeholder="Kati" />
                            </div>

                        </div>





                        <div class="sor">
                            <div class="inputfield">
                                <label for="fnev">Felhasználónév:</label>

                                <br />
                                <input type="text" name="fnev" id="ifnev" placeholder="valaki97" /><br />
                            </div>

                            <div class="inputfield">
                                <label for="email">E-mail cím:</label> <br />
                                <input type="email" id="iemail" name="email" placeholder="valami@gmail.com" />
                            </div>
                        </div>



                        <div class="sor">
                            <div class="inputfield">
                                <label for="szdatum">Születési dátum:</label><br>
                                <input type="date" name="szdatum" id="iszdatum" /><br>
                            </div>

                            <div class="inputfield">
                                <label for="telszam">Telefonszám:</label><br>
                                <input type="text" id="itelszam" placeholder="+36-20-345-6789" />
                            </div>

                        </div>


                        <div class="sor">


                            <div class="inputfield">
                                <label>Cím:</label>
                                <br />
                                <input type="text" id="iiranyitoszam" placeholder="Irányítószám" />

                            </div>

                        </div>

                        <div class="sor">

                            <div class="inputfield">
                                <input type="text" id="imegye" placeholder="Megye" />
                            </div>

                            <div class="inputfield">
                                <input type="text" id="ivaros" placeholder="Város" />
                            </div>







                        </div>


                        <div class="sor">

                            <div class="inputfield">
                                <input type="text" id="iutca" placeholder="Utca" />

                            </div>

                            <div class="inputfield">

                                <input type="text" id="ihazszam" placeholder="Házszám" />
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