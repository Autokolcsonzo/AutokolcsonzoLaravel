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
    <script src="../js/admin/jsAdminFoglalas.js"></script>

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
    <link rel="stylesheet" href="../css/admin/admin.css" />
</head>

<body>
    <main>

        <div id="primary_content">

            <!-- ADMIN TÁBLÁZAT, KERESÉS -->
            <div class="adminKeresesFoglalas">


                <div class="adminFeladatValasztas">
                    <div id="adminKategoriak">
                        <a href="{{ 'adminAutok' }}">Autók</a>
                        <a href="{{ 'adminFelhasznalok' }}">Felhasználók</a>
                        <a href="#">Foglalások</a>
                    </div>
                </div>

                <div class="foglalasSzuresGombok">
                    <!-- szűrt adatok linkjei -->

                    <div class="szures">

                        <a href="/maiElvitel" class="elvitelSzures">Mai elvitel</a>
                        <a href="/maiVisszahozatal" class="visszahozatalSzures">Mai visszahozatal</a>
                        <a href="adminFoglalas" class="osszesSzures">Összes foglalás</a>

                    </div>
                </div>

                <div class="ujAdatokFelvetele">
                    <a href="logout">Kijelentkezés</a>
                </div>
            </div>


            <h3 class="oldalNev">Foglalások</h3>

            <!-- 3 ablak adatokkal -->
            <div class="values">
                <div class="val-box">
                    <i class="fas fa-users"></i>
                    <div class="felhasznalokSzamaSablon">
                        <h3 class="felhasznalokSzama">{{ $felhasznalok }}</h3>
                        <span>Összes felhasználó</span>
                    </div>
                </div>

                <div class="val-box">
                    <i class="fas fa-car"></i>
                    <div>
                        <h3>{{ $foglalasok }}</h3>
                        <span>Összes foglalás</span>
                    </div>
                </div>

                <div class="val-box">
                    <i class="fas fa-money-check-alt"></i>
                    <div>
                        <h3>{{ $bevetel }}</h3>
                        <span>Bejövő összeg</span>
                    </div>
                </div>
            </div>

            <!-- fő adatrészek -->

            @if (session()->has('status'))
                <p class="uzenet">{{ session('status') }}</p>
            @endif

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

                    @foreach ($adat as $data)
                        @if ($loop->iteration % 2 == 0)
                            <div class="foadatok even">
                            @else
                                <div class="foadatok odd">
                        @endif
                        <p class="fogazon_foglalas">{{ $data->fogazon_foglalas }}</p>
                        <p class="telephely">{{ $data->varos }} {{ $data->utca }}</p>
                        <p class="alvazszam">{{ $data->alvazSzam }}</p>
                        <p class="alvazSzam">{{ $data->felhasznalo }}</p>
                        <p class="fogl_kelt">{{ $data->fogl_kelt }}</p>
                        <p><input id="{{ $loop->index }}" type="button" name="fReszletek" class="fReszletek"
                                value="Részletek" /></p>
                        <p><input id="{{ $loop->index }}" type="button" name="fFizetes" class="fFizetes"
                                value="Fizetés" /></p>
                        <p>
                            <a class="fadatokMod"
                                href="{{ route('adminfoglalas.edit', $data->fogazon_foglalas) }}">Módosítás</a>

                        </p>

                </div>

                <div id="a{{ $loop->index }}" class="fizetes">
                    <section class="befizBox">
                        <section class="vegosszegBox">
                            <h4>foglalás végösszege</h4>
                            <p>{{ $data->kifizetendo_osszeg }}</p>
                        </section>
                        <section class="befizzetettBox">
                            <h4>Befizetett összeg</h4>
                            <p>{{ $data->befizetett_osszeg }}</p>
                        </section>
                        <section class="hatralekBox">
                            <h4>Hátralék</h4>
                            <p>{{ $data->kifizetendo_osszeg - $data->befizetett_osszeg }}</p>
                        </section>
                        <section class="hatralekBox">
                            <h4>Fizetés alapja</h4>
                            <p class="fizetes_alapja">{{ $data->fizetes_alapja }}</p>
                        </section>
                        <form class="fizetes-form" method="POST" action='{{route("ujFizetes")}}' >
                            <input type="hidden" name="fogazon_foglalas" value="{{ $data->fogazon_foglalas }}" />
                            <section id="befizetes-form-box">
                                <h4>befizetes</h4>
                                <input class="befizInput" type="number" name="befizetes" placeholder="Fizetés" required />
                                <input class="befizInput" type="text" name="alapja" placeholder="Befizetés alapja" required />
                            </section>
                            <input id="veglegesites" type="submit" value="Véglegesítés" />
                        </form>
                    </section>


                </div>

                <!-- lenyíló részletek -->

                <div id="r{{ $loop->index }}" class="reszletek">
                    <div class="reszlet">
                        <div class="reszletFejlec">
                            <h2>Elvitel</h2>
                            <h2>Visszahozatal</h2>
                            <h2>Érvényesség</h2>
                            <h2>Kedvezmény</h2>
                            <h2>Állapot</h2>
                        </div>
                        <div class="reszletadatok">
                            <p class="elvitel">{{ $data->elvitel }}</p>
                            <p class="visszahozatal">{{ $data->visszahozatal }}</p>
                            <p class="ervenyessegi_ido">{{ $data->ervenyessegi_ido }}</p>
                            <p class="kedvezmeny">{{ $data->kedvezmeny }}</p>
                            <p class="allapot">{{ $data->allapot }}</p>


                        </div>
                    </div>

                </div>
                @endforeach

            </div>

        </div>



        </div>
        </div>

    </main>
</body>

</html>
