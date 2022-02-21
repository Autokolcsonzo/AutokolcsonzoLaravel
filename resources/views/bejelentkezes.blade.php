<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <title>Dropmyride autókölcsönző</title>
    <link rel="icon" type="image/x-icon" href="kepek/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Scriptek -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/hambiMenu.js"></script>
    <script src="js/reszponzivDolgok.js"></script>
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
    <link rel="stylesheet" href="css/szerkezet.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <!--   <link rel="stylesheet" href="css/regisztracio.css" /> -->
    <link rel="stylesheet" href="css/felhasznalo/felhasznaloiProfil.css" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/nav')

        <!--   Fejléc -->
        @include('komponensek/header')

        <div class="fprofil">
            <div class="bejelentkezoFelulet">
                <form method="POST" action="{{ route('bejelentkezes') }}">
                    @csrf
                    <div class="form-header">
                        <h3>Bejelentkezés</h3>
                    </div>
                    <div class="sor">
                        <div class="inputfield">
                            <label for="felhasznalonev">Felhasználónév:</label>

                            <br />
                            <input type="text" name="felhasznalonev" id="fnev" placeholder="valaki97" /><br />
                            @error('felhasznalonev')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="sor">
                            <div class="inputfield">
                                <label for="jelszo">Jelszó:</label>
                                <br>
                                <input type="password" id="jelszo1" name="jelszo" class="jelszo" placeholder="******" />
                                @error('jelszo')
                                <span>{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <input type="submit" value="Bejelentkezés" id="adatotMent" />


                </form>
            </div>
        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>