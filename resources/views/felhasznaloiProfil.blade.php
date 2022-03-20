<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <title>Dropmyride autókölcsönző</title>

    <link rel="icon" type="image/x-icon" href="..kepek/logo.png">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content=<?php $token = csrf_token();
                                    echo $token; ?>>

    <!-- Scriptek -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="../js/reszponzivDolgok.js"></script>
    <!-- <script src="../js/Ajax.js"></script>
    <script src="../js/felhasznalo/FelhasznaloProfil.js"></script> -->
    <script src="../js/felhasznalo/felhasznaloProfilJs.js"></script>

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
    <link rel="stylesheet" href="{{ asset('css/felhasznalo/felhasznaloiProfil.css') }}">

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
              
                <form action="{{route('felhasznalok.profkepUpdate')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="{{$data->felhasznalo_id}}" name="felhasznalo_id">
                @method('PUT')
                        @csrf
                    <img src="{{$data->profilkep}}" name="profilkep" id="profKep" alt="" /><br>
                    
                    <input type="file" id="profkepFel" name="profilkep"><br>
                    <input type="submit" name="fkepMod" id="fkepMod" value="Profilkép feltöltése" />
                </form>
                </div>



                <div class="fadatok">

                    <table class="fadatokTable">

                        <tr>
                            <td>Felhasznalónév: </td>
                            <td id="fnev">{{$data->felhasznalonev}}</td>
                            <td>Jelszó: </td>
                            <td id="jelszo">*******</td>


                        </tr>


                        <tr>
                            <td>Vezetéknév: </td>
                            <td id="vnev">{{$data->vezeteknev}}</td>
                            <td>Keresztnév: </td>
                            <td id="knev">{{$data->keresztnev}}</td>

                        </tr>
                        <tr>
                            <td>Születési idő: </td>
                            <td id="szido">{{$data->szul_ido}}</td>

                        </tr>
                        <tr>
                            <td>Irányító szám: </td>
                            <td id="irszam">{{$data->ir_szam}}</td>
                            <td>Megye: </td>
                            <td id="megye">{{$data->megye}}</td>


                        </tr>

                        <tr>
                            <td>Város: </td>
                            <td id="varos">Gyömrő</td>
                            <td>{{$data->varos}}</td>
                            <td id="utca">{{$data->utca}}</td>

                        </tr>

                        <tr>
                            <td>Házszám: </td>
                            <td id="hszam">{{$data->hazszam}}</td>

                        </tr>
                        <tr>
                            <td>E-mail cím: </td>
                            <td id="email">{{$data->e_mail}}</td>
                            <td>Telefonszám: </td>
                            <td id="tszam">{{$data->tel_szam}}</td>


                        </tr>
                    </table>


                    </tr>
                    </table>

                </div>

                <input type="button" name="fadatokMod" id="fadatokMod" value="Adatok módosítása" style="display:block" />

                @if($errors->any())

                <ul>
                    @foreach($errors->all() as $error)
                    <li class="hiba">
                        {{$error}}
                    </li>
                    @endforeach
                </ul>

                @endif


                <div class="felhasznaloiModositas">





                    <form action="{{route('felhasznalok.update')}}" method="POST">
                        @method('PUT')
                        @csrf

                        <input type="hidden" value="{{$data->felhasznalo_id}}" name="felhasznalo_id">




                        <div class="form-header">
                            <h3>Adatok módosítása</h3>
                        </div>
                        <div class="sor">
                            <div class="inputfield">
                                <label for="vezeteknev">Vezetéknév:</label>
                                <br />
                                <input type="text" name="vezeteknev" id="ivnev" value="{{ old('vezeteknev') ?? $data->vezeteknev }}" />

                            </div>

                            <div class="inputfield">
                                <label for="keresztnev">Keresztnév:</label><br>

                                <input type="text" name="keresztnev" id="iknev" value="{{ old('keresztnev') ?? $data->keresztnev }}" />
                            </div>

                        </div>





                        <div class="sor">
                            <div class="inputfield">
                                <label for="felhasznalonev">Felhasználónév:</label>

                                <br />
                                <input type="text" name="felhasznalonev" id="ifnev" value="{{ old('felhasznalonev') ?? $data->felhasznalonev }}" /><br />
                            </div>

                            <div class="inputfield">
                                <label for="e_mail">E-mail cím:</label> <br />
                                <input type="email" id="iemail" name="e_mail" value="{{ old('e_mail') ?? $data->e_mail }}" />
                            </div>
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="jelszo">Jelszó:</label>
                                <br>
                                <input type="text" id="ijelszo" name="jelszo" value="" />
                            </div>



                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="szul_ido">Születési dátum:</label><br>
                                <input type="date" name="szul_ido" id="iszdatum" value="{{ old('szul_ido') ?? $data->szul_ido}}" /><br>
                            </div>

                            <div class="inputfield">
                                <label for="tel_szam">Telefonszám:</label><br>
                                <input type="text" name="tel_szam" id="itelszam" placeholder="+36-20-345-6789" value="{{ old('tel_szam') ?? $data->tel_szam }}" />
                            </div>

                        </div>


                        <div class="sor">

                            <label for="ir_szam"></label>
                            <div class="inputfield">
                                <label>Cím:</label>
                                <br />
                                <input type="text" name="ir_szam" id="iiranyitoszam" value="{{ old('ir_szam') ?? $data->ir_szam }}" />

                            </div>

                        </div>

                        <div class="sor">
                            <label for="megye"></label>
                            <div class="inputfield">
                                <input type="text" name="megye" id="imegye" value="{{ old('megye') ?? $data->megye}}" />
                            </div>
                            <label for="varos"></label>
                            <div class="inputfield">
                                <input type="text" name="varos" id="ivaros" value="{{ old('varos') ?? $data->varos}}" />
                            </div>







                        </div>


                        <div class="sor">
                            <label for="utca"></label>
                            <div class="inputfield">
                                <input type="text" name="utca" id="iutca" value="{{ old('utca') ?? $data->utca}}" />

                            </div>
                            <label for="hazszam"></label>
                            <div class="inputfield">

                                <input type="text" name="hazszam" id="ihazszam" value="{{ old('hazszam') ?? $data->hazszam}}" />
                            </div>




                        </div>



                        <input type="submit" value="Adatok mentése" id="adatotMent" />


                    </form>
                </div>


            </div>


        </div>

        <!-- Footer -->
        @yinclude('komponensek/footer')
    </main>
</body>

</html>