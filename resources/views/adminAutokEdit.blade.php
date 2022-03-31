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
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/admin/admin.css" />
    <link rel="stylesheet" href="../css/admin/modal.css" />
</head>

<body>
    <main>

        <div id="primary_contentEdit">

            <!-- Autó adatainak módosítása -->
            <div class="autoAdatokModositas">
                @if (session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif

                <form action="{{url('/adminAutokEdit/'.$autok->alvazSzam)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-header">
                        <h3>Adatok módosítása</h3>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="alvazSzam">Alvázszám:</label>
                            <br />
                            <input type="text" name="alvazSzam" class="alvazSzam" value="{{ old('alvazSzam') ?? $autok->alvazSzam }}" />

                        </div>

                        <div class="inputfield">
                            <label for="statusz">Státusz:</label> <br />
                            <input type="text" name="statusz" class="statusz" value="{{ old('statusz') ?? $autok->statusz }}">
                        </div>

                        <!--  <div class="inputfield">
                 <label for="marka">Márka:</label><br>

                 <input type="text" name="marka" class="marka" value="{{ old('marka') ?? $autok->marka }}" />
             </div> -->

                    </div>

                    <!-- <div class="sor">

             <div class="inputfield">
                 <label for="modell">Modell:</label><br>

                 <input type="text" name="modell" class="modell" value="{{ old('modell') ?? $autok->modell }}" />
             </div>

             <div class="inputfield">
                 <label for="tipus">Típus:</label>
                 <br />
                 <input type="text" name="tipus" class="tipus" value="{{ old('tipus') ?? $autok->tipus }}" />

             </div>

         </div>

         <div class="sor">
             <div class="inputfield">
                 <label for="evjarat">Évjárat:</label>

                 <br />
                 <input type="text" name="evjarat" class="evjarat"
                     value="{{ old('evjarat') ?? $autok->evjarat }}" /><br />
             </div>

             <div class="inputfield">
                 <label for="kivitel">Kivitel:</label> <br />
                 <input type="text" class="kivitel" name="kivitel" value="{{ old('kivitel') ?? $autok->kivitel }}" />
             </div>
         </div>

         <div class="sor">
             <div class="inputfield">
                 <label for="uzemanyag">Üzemanyag:</label>

                 <br />
                 <input type="text" name="uzemanyag" class="uzemanyag"
                     value="{{ old('uzemanyag') ?? $autok->uzemanyag }}" /><br />
             </div>

             <div class="inputfield">
                 <label for="teljesitmeny">Teljesítmény:</label> <br />
                 <input type="text" class="teljesitmeny" name="teljesitmeny"
                     value="{{ old('teljesitmeny') ?? $autok->teljesitmeny }}" />
             </div>
         </div>
 -->
                    <div class="sor">
                        <div class="inputfield">
                            <label for="telephely">Telephely (1-Budapest, 2-Székesfehérvár):</label>

                            <br />
                            <input type="text" name="telephely" class="telephely" value="{{ old('telephely') ?? $autok->telephely }}" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="napiAr">Napi ár:</label> <br />
                            <input type="text" class="napiAr" name="napiAr" value="{{ old('napiAr') ?? $autok->napiAr }}" />
                        </div>
                    </div>


                    <!--    <div class="sor">
               <div class="inputfield">
            <label for="tulajdonsag">Modell tulajdonság:</label>
            <br />
            <input type="text" name="tulajdonsag" class="tulajdonsag" /><br />
        </div> -->



                    <div class="sor">
                        <div class="inputfield">
                            <label for="szin">Szín:</label>

                            <br />
                            <input type="text" name="szin" class="szin" value="{{ old('szin') ?? $autok->szin }}" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="forgalmiSzam">Forgalmi száma:</label> <br />
                            <input type="text" class="forgalmiSzam" name="forgalmiSzam" value="{{ old('forgalmiSzam') ?? $autok->forgalmiSzam }}" />
                        </div>
                    </div>

                    <div class="sor">

                        <div class="inputfield">
                            <label for="rendszam">Rendszám:</label> <br />
                            <input type="text" class="rendszam" name="rendszam" value="{{ old('rendszam') ?? $autok->rendszam }}" />
                        </div>
                    </div>

                    <input type="submit" value="Adatok mentése" id="adatotMent" />


                </form>

            </div>
        </div>


    </main>
</body>

</html>