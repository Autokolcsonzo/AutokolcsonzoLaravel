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
    <script src="../js/ajax.js"></script>
    <script src="../js/admin/adminAuto.js"></script>
    <script src="../js/admin/adminAutok.js"></script>
    <meta name="csrf-token" content=<?php $token = csrf_token();
                                    echo $token; ?>>
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
                            <option value="adminFelhasznalok">Felhasználók</option>
                            <option value="adminFoglalasok">Foglalások</option>
                        </select>
                    </div>
                </div>

                <div class="ujAutoFelvetele">
                    <div>
                        <input type="button" name="ujAutoGomb" class="ujAutoGomb" value="Új autó felvétele">
                    </div>
                </div>

            </div>

            <h3 class="oldalNev">Autók</h3>
            <div>
      
            </div>


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

            <div class="tablazat">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Státusz</th>
                            <th scope="col">Rendszám</th>
                            <th scope="col">Megnevezés</th>
                            <th scope="col">Telephely</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="szuloElem">
                        <tr class="adminAuto">
                            <td class="tablazatStatusz" data-label="Státusz">
                                <input type="checkbox" id="statuszInput" name="statuszInput">
                            </td>
                            <td class="rendszam" data-label="Rendszám">
                                <p>ABC-123</p>
                            </td>
                            <td class="megnevezes" data-label="Megnevezés">
                                <p>Audi A4</p>
                            </td>
                            <td class="telephely" data-label="Telephely">
                                <p>Budapest</p>
                            </td>
                            <td class="reszletekGomb">
                                <input type="button" name="autoReszletek" class="autoReszletek" value="Részletek" />
                            </td>
                            <td class="modositas">
                              
                                <input type="button" name="autoMod" class="autoMod" value="Módosítás" />
                            </td>
                            <td class="torles">
                                <input type="button" name="autoTorles" class="autoTorles" value="Törlés" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Autó adatainak módosítása -->
            <div class="autoAdatokModositas">

                @if (session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif

                <form action="" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-header">
                        <h3>Adatok módosítása</h3>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="alvazSzam">Alvázszám:</label>
                            <br />
                            <input type="text" name="alvazSzam" class="alvazSzam" />

                        </div>

                        <div class="inputfield">
                            <label for="marka">Márka:</label><br>

                            <input type="text" name="marka" class="marka"/>
                        </div>

                    </div>

                    <div class="sor">

                        <div class="inputfield">
                            <label for="modell">Modell:</label><br>

                            <input type="text" name="modell" class="modell"/>
                        </div>

                        <div class="inputfield">
                            <label for="tipus">Típus:</label>
                            <br />
                            <input type="text" name="tipus" class="tipus" />

                        </div>

                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="evjarat">Évjárat:</label>

                            <br />
                            <input type="text" name="evjarat" class="evjarat"/><br />
                        </div>

                        <div class="inputfield">
                            <label for="kivitel">Kivitel:</label> <br />
                            <input type="text" class="kivitel" name="kivitel"/>
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="uzemanyag">Üzemanyag:</label>

                            <br />
                            <input type="text" name="uzemanyag" class="uzemanyag" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="teljesitmeny">Teljesítmény:</label> <br />
                            <input type="text" class="teljesitmeny" name="teljesitmeny" />
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="telephely">Telephely (1-Budapest, 2-Székesfehérvár):</label>

                            <br />
                            <input type="text" name="telephely" class="telephely"/><br />
                        </div>

                        <div class="inputfield">
                            <label for="napiAr">Napi ár:</label> <br />
                            <input type="text" class="napiAr" name="napiAr" />
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="extra_megnevezese">Autó extrái:</label>

                            <br />
                            <input type="text" name="extra_megnevezese" class="extra_megnevezese" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="kep">Kép:</label> <br />
                            <input type="file" name="kep" class="kep" >
                        </div>
                    </div>

                    <div class="sor">
                        <!--   <div class="inputfield">
            <label for="tulajdonsag">Modell tulajdonság:</label>

            <br />
            <input type="text" name="tulajdonsag" class="tulajdonsag" /><br />
        </div> -->

                        <!-- <div class="inputfield">
            <label for="forgalmiSzam">Forgalmi száma:</label> <br />
            <input type="text" class="forgalmiSzam" name="forgalmiSzam" />
        </div> -->
                    </div>





                    <div class="sor">
                        <div class="inputfield">
                            <label for="szin">Szín:</label>

                            <br />
                            <input type="text" name="szin" class="szin"/><br />
                        </div>

                        <div class="inputfield">
                            <label for="forgalmiSzam">Forgalmi száma:</label> <br />
                            <input type="text" class="forgalmiSzam" name="forgalmiSzam" />
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="statusz">Státusz:</label>

                            <br />
                            <input type="text" name="statusz" class="statusz" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="rendszam">Rendszám:</label> <br />
                            <input type="text" class="rendszam" name="rendszam" />
                        </div>
                    </div>

                    <input type="submit" value="Adatok mentése" id="adatotMent" />


                </form>
            </div>

            <!-- Új adatok feltöltése -->
            <div class="autoAdatokFeltoltes">
                <form action="">

                    <div class="form-header">
                        <h3>Adatok módosítása</h3>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="alvazSzam">Alvázszám:</label>
                            <br />
                            <input type="text" name="alvazSzam" class="alvazSzam" />

                        </div>

                        <div class="inputfield">
                            <label for="modell">Modell:</label><br>

                            <input type="text" name="modell" class="modell" />
                        </div>

                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="telephely">Telephely:</label>

                            <br />
                            <input type="text" name="telephely" class="telephely" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="napiAr">Napi ár:</label> <br />
                            <input type="text" class="napiAr" name="napiAr" />
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="szin">Szín:</label>

                            <br />
                            <input type="text" name="telszinephely" class="szin" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="forgalmiSzam">Forgalmi száma:</label> <br />
                            <input type="text" class="forgalmiSzam" name="forgalmiSzam" />
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="statusz">Státusz:</label>

                            <br />
                            <input type="text" name="statusz" class="statusz" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="rendszam">Rendszám:</label> <br />
                            <input type="text" class="rendszam" name="rendszam" />
                        </div>
                    </div>

                    <input type="submit" value="Adatok mentése" id="adatotMent" />


                </form>
            </div>


            <!-- <table width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Státusz</th>
                            <th scope="col">Rendszám</th>
                            <th scope="col">Megnevezés</th>
                            <th scope="col">Telephely</th>
                        </tr>
                    </thead>
                    <tbody class="szuloELem">
                        <tr class="adminAuto">
                            <td class="tablazatStatusz">
                                <input type="checkbox" id="statuszInput" name="statuszInput">
                            </td>
                            <td class="rendszam">
                                <p>ABC-123</p>
                            </td>
                            <td class="megnevezes">
                                <p>Audi A4</p>
                            </td>
                            <td class="telephely">
                                <p>Budapest</p>
                            </td>
                            <td class="reszletekGomb">
                                <a href="#">Részletek <i class="fas fa-long-arrow-right"></i></a>
                            </td>
                            <td class="modositas">
                                <a href="#">Módosítás</a>
                            </td>
                            <td class="torles">
                                <a href="#">Törlés</a>
                            </td>
                        </tr>
                    </tbody>
                </table> -->


        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>