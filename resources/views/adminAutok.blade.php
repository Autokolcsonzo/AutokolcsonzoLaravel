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
    <script src="../js/reszponzivDolgok.js"></script>
    <script src="../js/hambiMenu.js"></script>
    <script src="../js/admin/adminAutok.js"></script>

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
                <!--  <div class="n1">
                    <div class="kereses">
                        <i class="far fa-search"></i>
                        <input type="text" placeholder="Search" name="autokKereses">
                    </div>
                </div> -->

                <div class="adminFeladatValasztas">
                    <div id="adminKategoriak">
                        <a href="#">Autók</a>
                        <a href="{{ 'adminFelhasznalok' }}">Felhasználók</a>
                        <a href="{{ 'adminFoglalas' }}">Foglalások</a>
                    </div>
                </div>

                <div class="ujAutoFelvetele">
                    <div>
                        <a href="#autoAdatokFeltoltes"><input type="button" name="ujAutoGomb" class="ujAutoGomb" value="Új autó felvétele"></a>
                    </div>

                    <div>
                        <a href="#modellAdatokFeltoltes"><input type="button" name="ujModellGomb" class="ujModellGomb" value="Új modell felvétele"></a>
                    </div>

                    <div>
                        <a href="#kepAdatokFeltoltes"><input type="button" name="ujKepGomb" class="ujKepGomb" value="Új kép felvétele"></a>
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

            <div class="felhasznalokAdmin">
                <div class="felhFejlec">
                    <h2>Alvázszám</h2>
                    <h2>Státusz</h2>
                    <h2>Rendszám</h2>
                    <h2>Megnevezés</h2>
                    <h2>Telephely</h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                </div>
                <div class="felhasznalo">

                    @foreach($adat as $data)
                    @if($loop->iteration % 2 == 0)
                    <div class="foadatok even">
                        @else
                        <div class="foadatok odd">
                            @endif
                            <p class="statusz">{{$data->alvazSzam}}</p>
                            <p class="statusz">{{$data->statusz}}</p>
                            <p class="rendszam">{{$data->rendszam}}</p>
                            <p class="megnevezes">{{$data->marka}}</p>
                            <p class="varos">{{$data->varos}}</p>
                            <p><input id="{{$loop->index}}" type="button" name="fReszletek" class="fReszletek" value="Részletek" /></p>
                            <p>
                                <a class="fadatokMod" href="{{url('/adminAutokEdit/'.$data->alvazSzam)}}">Módosítás</a>
                            </p>
                            <form action="{{url('/delete/'.$data->alvazSzam)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="torles">Törlés</button>
                            </form>
                        </div>
                        <div id="r{{$loop->index}}" class="reszletek">
                            <div class="reszlet">
                                <div class="reszletFejlec">
                                    <h2>Forgalmi száma</h2>
                                    <h2>Szín</h2>
                                    <h2>Napi ár</h2>
                                    <h2>Évjárat</h2>
                                    <h2>Típus</h2>
                                    <h2>Üzemanyag</h2>
                                    <h2>Teljesítmény</h2>
                                </div>
                                <div class="reszletadatok">
                                    <p class="iranyitoszam">{{$data->forgalmiSzam}}</p>
                                    <p class="megye">{{$data->szin}}</p>
                                    <p class="varos">{{$data->napiAr}}</p>
                                    <p class="utca">{{$data->evjarat}}</p>
                                    <p class="hazszam">{{$data->tipus}}</p>
                                    <p class="telszam">{{$data->uzemanyag}}</p>
                                    <p class="szul_ido">{{$data->teljesitmeny}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <!-- Új autó adatok feltöltése -->
                <div id="autoAdatokFeltoltes" class="autoAdatokFeltoltes">
                    <form action="adminAutok" method="post" enctype="multipart/form-data">
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
                                <label for="modell">Modell:</label><br>

                                <select class="modell" name="modell">
                                    @foreach($adat as $adatok)
                                    <option value="">{{$adatok->marka}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="telephely">Telephely:</label><br />

                                <select class="telephely" name="telephely">
                                    @foreach($adat as $adatok)
                                    <option value="">{{$adatok->varos}}</option>
                                    @endforeach
                                </select>
                                <br />
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
                                <input type="text" name="szin" class="szin" /><br />
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



                <!-- Új modell adatok feltöltése -->
                <div id="modellAdatokFeltoltes" class="modellAdatokFeltoltes">
                    <form action="adminAutok" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-header">
                            <h3>Adatok módosítása</h3>
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="modell">Modell név:</label>
                                <br />
                                <input type="text" name="modell" class="modell" />
                            </div>

                            <div class="inputfield">
                                <label for="marka">Márka:</label> <br />
                                <input type="text" class="marka" name="marka" />
                            </div>

                        </div>


                        <div class="sor">
                            <div class="inputfield">
                                <label for="tipus">Típus:</label>

                                <br />
                                <input type="text" name="tipus" class="tipus" /><br />
                            </div>

                            <div class="inputfield">
                                <label for="evjarat">Évjárat:</label> <br />
                                <input type="text" class="evjarat" name="evjarat" />
                            </div>
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="kivitel">Kivitel:</label>

                                <br />
                                <input type="text" name="kivitel" class="kivitel" /><br />
                            </div>

                            <div class="inputfield">
                                <label for="uzemanyag">Üzemanyag:</label> <br />
                                <input type="text" class="uzemanyag" name="uzemanyag" />
                            </div>
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="teljesitmeny">Teljesítmény:</label>

                                <br />
                                <input type="text" name="teljesitmeny" class="teljesitmeny" /><br />
                            </div>
                        </div>

                        <input type="submit" value="Adatok mentése" id="adatotMent" />

                    </form>
                </div>

                <!-- Új kép adatok feltöltése -->
                <div id="kepAdatokFeltoltes" class="kepAdatokFeltoltes">
                    <form action="adminAutok" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-header">
                            <h3>Adatok módosítása</h3>
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="kep">Kép:</label>

                                <br />
                                <input type="file" name="kep" class="kep" /><br />
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                @include('komponensek/footer')
    </main>
</body>

</html>