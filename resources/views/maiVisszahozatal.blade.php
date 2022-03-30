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
        @include('komponensek/felhasznaloNav')

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
                        <a href="{{ 'adminFelhasznalok' }}">Felhasználók</a>
                        <a href="#">Foglalások</a>
                    </div>
                </div>

                <div class="szures">
                    <!-- szűrt adatok linkjei -->

                    <a href="/maiElvitel" class="elvitelSzures">Mai elvitel</a>
                    <a href="/maiVisszahozatal" class="visszahozatalSzures">Mai visszahozatal</a>

                    <a href="adminFoglalas" class="osszesSzures">Összes foglalás</a>




                </div>
            </div>


            <h3 class="oldalNev">Foglalások</h3>

            <!-- 3 ablak adatokkal -->
            <div class="values">
                <div class="val-box">
                    <i class="fas fa-users"></i>
                    <div class="felhasznalokSzamaSablon">
                        <h3 class="felhasznalokSzama">{{$felhasznalok}}</h3>
                        <span>Összes felhasználó</span>
                    </div>
                </div>
           
                <div class="val-box">
                    <i class="fas fa-car"></i>
                    <div>
                        <h3>{{$foglalasok}}</h3>
                        <span>Összes foglalás</span>
                    </div>
                </div>
             
                <div class="val-box">
                    <i class="fas fa-money-check-alt"></i>
                    <div>
                        <h3>{{$bevetel}}</h3>
                        <span>Bejövő összeg</span>
                    </div>
                </div>
            </div>



            <div class="foglalasAdmin">
                <div class="fogFejlec">
                    <h2>Azonosító</h2>
                    <h2>Telephely</h2>
                    <h2>Alvázszám</h2>
                    <h2>Felhasználó</h2>
                    <h2>Foglalás ideje</h2>
                    <h2></h2>
                    <h2></h2>

                </div>
                <div class="foglalas">

                    @foreach($maiVisszahozatal as $data)
                    @if($loop->iteration % 2 == 0)
                    <div class="foadatok even">
                        @else
                        <div class="foadatok odd">
                            @endif
                            <p class="fogazon_foglalas">{{$data->fogazon_foglalas}}</p>
                            <p class="telephely">{{$data->varos}} {{$data->utca}}</p>
                            <p class="alvazszam">{{$data->alvazSzam}}</p>
                            <p class="alvazSzam">{{$data->felhasznalo}}</p>
                            <p class="fogl_kelt">{{$data->fogl_kelt}}</p>
                            <p><input id="{{$loop->index}}" type="button" name="fReszletek" class="fReszletek" value="Részletek" /></p>
                            <p>
                                <a class="fadatokMod" href='{{route("adminfoglalas.edit",$data->fogazon_foglalas)}}'>Módosítás</a>

                            </p>

                        </div>

                        <div id="r{{$loop->index}}" class="reszletek">
                            <div class="reszlet">
                                <div class="reszletFejlec">
                                    <h2>Elvitel</h2>
                                    <h2>Visszahozatal</h2>
                                    <h2>Érvényesség</h2>
                                    <h2>Kedvezmény</h2>
                                    <h2>Állapot</h2>
                                    <h2>Fizetés alap</h2>
                                    <h2>Befizetett</h2>
                                    <h2>Kifizetendő</h2>
                                    <h2>Összesen</h2>
                                </div>
                                <div class="reszletadatok">
                                    <p class="elvitel">{{$data->elvitel}}</p>
                                    <p class="visszahozatal">{{$data->visszahozatal}}</p>
                                    <p class="ervenyessegi_ido">{{$data->ervenyessegi_ido}}</p>
                                    <p class="kedvezmeny">{{$data->kedvezmeny}}</p>
                                    <p class="allapot">{{$data->allapot}}</p>
                                    <p class="fizetes_alapja">{{$data->fizetes_alapja}}</p>
                                    <p class="befizetett_osszeg">{{$data->befizetett_osszeg}}</p>
                                    <p class="kifizetendo_osszegeg">{{$data->kifizetendo_osszegeg}}</p>
                                    <p class="foglalas_osszege">{{$data->foglalas_osszege}}</p>


                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>



            </div>
        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>