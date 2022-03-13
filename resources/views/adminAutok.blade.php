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
        <!--<div id="admin-auto-reszletek-embed">
        <div id="reszletek-header">
            <h1>Részletek</h1>
            <h1>X</h1>
        </div>
            <section id="admin-auto-reszletek-section">
                <img src="kepek/232311_source.jpg" alt="asd123"/>
                <section>
                    <p id="admin-auto-reszletek-modell"><br>Mustang</p>
                    <p id="admin-auto-reszletek-tipus"><br>Mustang123ASd</p>
                    <p id="admin-auto-reszletek-extra"><br>Banános illatosító</p>
                </section>
                <section>
                    <p id="admin-auto-reszletek-alvazszam"><br>0000000000000000</p>
                    <p id="admin-auto-reszletek-napiAr"><br>4500</p>
                    <p id="admin-auto-reszletek-forgalmi"><br>00000000000000000000000000000</p>
                </section>
                <p id="admin-auto-reszletek-felvetel"><br>2022-01-10</p>
                
            </section>
        </div>-->
        
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
                        <a href="#">Autók</a>
                        <a href="{{ 'adminFelhasznalok' }}">Felhasználók</a>
                        <a href="{{ 'adminFoglalas' }}">Foglalások</a>
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

            <div class="felhasznalokAdmin">
                <div class="felhFejlec">
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
                                <button type="submit"class="torles" >Törlés</button>
                            </form>                 
                    </div>
                    <div id="r{{$loop->index}}" class="reszletek">
                        <div  class="reszlet">
                            <div class="reszletFejlec">
                                <h2>Jármű index:</h2>
                                <h2>Irányítószám</h2>
                                <h2>Megye</h2>
                                <h2>Város</h2>
                                <h2>Utca</h2>
                                <h2>Házszám</h2>
                                <h2>Telefonszám</h2>
                                <h2>Születési idő</h2>
                            </div>
                            <div class="reszletadatok">
                                <p class="jarmu-index">{{$loop->index}}</p>
                                <p class="iranyitoszam">2360</p>
                                <p class="megye">Pest</p>
                                <p class="varos">Gyál</p>
                                <p class="utca">Rákóczi Ferenc utca</p>
                                <p class="hazszam">79/1</p>
                                <p class="telszam">+36300000000</p>
                                <p class="szul_ido">1999-11-16</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    
                </div>
            </div>



            <!-- Új adatok feltöltése -->
            <div class="autoAdatokFeltoltes">
                <form action="adminAutok">

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