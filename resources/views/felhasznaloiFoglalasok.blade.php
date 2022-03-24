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
        <script src="../js/felhasznalo/Foglalas.js"></script>
        <script src="../js/felhasznalo/felhasznaloiFoglalas.js"></script>
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
    <link rel="stylesheet" href="{{ asset('css/felhasznalo/felhaszFoglalas.css') }}" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/felhasznaloNav')

        <!--   Fejléc -->
        @include('komponensek/header')

        <div id="primary_content">

            <!-- fő container -->
            <div class="fFoglalasok">
            @foreach($data as $d)
                    @if($loop->iteration % 2 == 0)

                <!-- foglalás kártyák -->
                <div class="fFoglalas even">
                @else
                    <!-- foglalás adatok -->
                    <div class="fFoglalas odd">
                    @endif
                        <!-- kép az autóról -->
                        <img src="../kepek/probaauto.jpg" alt="" id="foglalasKep" />
                        <!-- Autó megnevezése-->

                        <h3 class="termeknev">Ford Fiesta</h3>
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
                                <p class="visszahoz"> </p>

                            </div>
                        </div>
                        <!-- gombok -->

                     
                        <p><input id="{{$loop->index}}" type="button" name="reszletGomb" class="reszletGomb"
                                    value="Részletek" /></p>
                            <p>
                        <button type="submit" class="fogLemond">Foglalás lemondása</button></p>

                        <div id="r{{$loop->index}}" class="reszlet">
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
                                        <td id="uzemanyag">{{$d->uzemanyag}}</td>

                                    </tr>


                                </table>
                            </div>
                    </div>

                    <!-- lenyíló részletek -->
               

                        
          
                            @endforeach




                </div>

              


        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>