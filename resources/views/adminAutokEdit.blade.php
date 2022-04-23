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
            
            <div class="formcontainer">
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
                        </div>

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
        </div>

    </main>
</body>

</html>