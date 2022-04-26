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
    <script src="../js/felhasznalo/felhasznaloiFoglalas.js"></script>
    <script src="../js/Responzivitas.js"></script>
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
    <link rel="stylesheet" href="{{ asset('css/felhasznalo/felhaszFoglalas.css') }}" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/felhasznaloNav')

        <!--   Fejléc -->
        @include('komponensek/header2')

        <div id="primary_content">
        <div class="cim">Foglalásaim</div>

        @if(count($data) == 0)
            <div class="foglalas_container">
                <div class="foglalas-boxi">
                    <h1 id="nincsF">Jelenleg még nincs foglalásod.</h1>
                    <a href=" {{'jarmuTalalatiLista'}} " id="nincsFp">Foglalj még most!</a>
                </div>
            </div>
        @endif
        

        @if(session()->has('status'))
                <p class="uzenet">{{session('status')}}</p>
                @endif

            <!-- fő container -->
            <div class="fFoglalasok">
                @foreach($data as $d)
                @if($d->allapot=="Aktív")

                <!-- foglalás kártyák -->
                <div class="fFoglalas even">
                    @else
                    <!-- foglalás adatok -->
                    <div class="fFoglalas odd">
                        @endif
                        <!-- kép az autóról -->
                        <img src="{{$d->kep}}" alt="" id="foglalasKep" />
                        <!-- Autó megnevezése-->

                        <h3 class="termeknev">{{$d->marka}} {{$d->modell}}</h3>
                        <!-- dátumok div-je -->
                        <div class="datum">

                            <div class="elvitel">
                                <h4>
                                    Elvitel:
                                </h4>
                                <p class="elvit"> {{$d->elvitel}}</p>
                            </div>



                            <div class="visszahozatal">
                                <h4>Visszahozatal:</h4>
                                <p class="visszahoz">{{$d->visszahozatal}} </p>

                            </div>
                        </div>

                        <!-- gombok -->


                        <p><input id="{{$loop->index}}" type="button" name="reszletGomb" class="reszletGomb" value="Részletek" /></p>

                        <!-- Foglalás lemondása, ha Aktív a foglalás állapota -->


                        @if($d->allapot=="Aktív")
                        <form action="{{route('foglalas.update')}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="{{$d->fogazon_foglalas}}" name="fogl_azonosito">
                            @method('PUT')
                            @csrf
                            <p>
                                <button type="submit" class="fogLemond">Foglalás lemondása</button>
                            </p>

                        </form>
                        @else
                        <p>
                            <button type="submit" class="fogLemondInaktiv">Foglalás lemondása</button>
                        </p>

                        @endif
                        <!-- lenyíló részletek -->
                        <div id="r{{$loop->index}}" class="reszlet">
                            <table class="reszAdatokTable">

                                <tr>
                                    <td>Foglalás összege: </td>
                                    <td id="osszeg">{{$d->kifizetendo_osszeg}}</td>


                                </tr>

                                <tr>
                                    <td>Befizettet összeg: </td>
                                    <td id="befizetett">{{$d->befizetett_osszeg}}</td>


                                </tr>

                                <tr>
                                    <td>Fizetendő összeg: </td>
                                    <td id="hatralek">{{$d->kifizetendo_osszeg - $d->befizetett_osszeg}}</td>


                                </tr>

                                <tr>
                                    <td>Átvevő pont: </td>
                                    <td id="telephely">{{$d->ir_szam}} {{$d->megye}} {{$d->varos}} {{$d->utca}} {{$d->hazszam}}</td>

                                </tr>
                                <tr>
                                    <td>Kivitel: </td>
                                    <td id="modell">{{$d->kivitel}}</td>

                                </tr>
                                <tr>
                                    <td>Napi ár: </td>
                                    <td id="kivitel">{{$d->napiAr}}</td>



                                </tr>

                                <tr>
                                    <td>Üzemanyag típusa: </td>
                                    <td id="uzemanyag">{{$d->uzemanyag}}</td>

                                </tr>

                                <tr>
                                    <td>Foglalás ideje: </td>
                                    <td id="foglido">{{$d->fogl_kelt}}</td>

                                </tr>

                                <tr>
                                    <td>Állapot: </td>
                                    <td id="allapot">{{$d->allapot}}</td>

                                </tr>


                            </table>
                        </div>
                    </div>






                    @endforeach




                </div>




            </div>
        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>