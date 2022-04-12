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
    <link rel="stylesheet" href="../css/admin/admin.css" />
</head>

<body>
    <main>

        <div id="primary_content">



            <!-- Foglalás módosításának a formja-->

            <div class="formcontainer">

                <div class="foglalasModositas">

                    <form action='{{route("adminfoglalas.update",$data->fogazon_foglalas)}}' method="POST">
                        @method('PUT')
                        @csrf




                        <div class="form-header">
                            <h3>Foglalás adatainak módosítása</h3>
                        </div>
                        <div class="sor">
                            <div class="inputfield">
                                <label for="elvitel">Elvitel:</label>
                                <br />
                                <input type="datetime" name="elvitel" id="elvitelf" value="{{ old('elvitel') ?? $data->elvitel }}" />

                            </div>

                            <div class="inputfield">
                                <label for="visszahozatal">Visszahozatal:</label><br>

                                <input type="datetime" name="visszahozatal" id="visszahozatalf" value="{{ old('visszahozatal') ?? $data->visszahozatal }}" />
                            </div>

                        </div>







                        <div class="sor">
                            <div class="inputfield">
                                <label for="kedvezmeny">Kedvezmény:</label>

                                <br />
                                <input type="text" name="kedvezmeny" id="kedvezmenyf" value="{{ old('kedvezmeny') ?? $data->kedvezmeny }}" /><br />
                            </div>

                            <div class="inputfield">
                                <label for="allapot">Állapot (Teljesítve, Lemondva, Aktív):</label> <br />

                                <input type="text" name="allapot" id="allapot" value="{{ old('allapot') ?? $data->allapot }}" /><br />

                            </div>
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="fizetes_alapja">Fizetés alapja:</label>
                                <br>
                                <input type="text" id="fizetes_alapjaf" name="fizetes_alapja" value="{{ old('fizetes_alapja') ?? $data->fizetes_alapja}}" />
                            </div>



                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="befizetett_osszeg">Befizetett összeg:</label><br>
                                <input type="text" name="befizetett_osszeg" id="befizetett_osszegf" value="{{ old('befizetett_osszeg') ?? $data->befizetett_osszeg}}" /><br>
                            </div>

                            <div class="inputfield">
                                <label for="kifizetendo_osszegeg">Kifizetendő összeg:</label><br>
                                <input type="text" name="kifizetendo_osszegeg" id="kifizetendo_osszegegf" value="{{ old('kifizetendo_osszegeg') ?? $data->kifizetendo_osszegeg }}" />
                            </div>

                        </div>








                        <input type="submit" value="Adatok mentése" class="adatotMent" />

                    </form>
                </div>


            </div>

        </div>

    </main>
</body>

</html>