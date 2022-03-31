<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <title>Dropmyride autókölcsönző</title>
    <link rel="icon" type="image/x-icon" href="kepek/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <!-- Scriptek -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/hambiMenu.js"></script>
    <script src="js/reszponzivDolgok.js"></script>


    <meta name="csrf-token" content=<?php $token = csrf_token();
                                    echo $token; ?>>
    <style>
    /* Betűtípusok */
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans+Condensed:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Teko:wght@300&display=swap');
        
    </style>

    <!-- Stílusok -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/szerkezet.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/fooldal.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/error.css" />

</head>

<body>

    <main>
        <!-- TABLET, STB. NÉZET -->
        @if(Auth('felhasznalo'))
            @include('komponensek/felhasznaloNav')
        @else
            @include('komponensek/nav')
        @endif

        <!-- HEADER -->
        @include('komponensek/header')

        <!-- KERESŐ -->



        <!-- felhasználóknak segítség/információ a foglaláshoz -->
        <div id="primary_content">
        <div id="foglalas-box">
            <div id="foglalas-box-content">
                <h1 id="cimE">A foglalás Sikertelen</h1>
                <h3 id="erroro">Erre az időszakra a jármű már foglalt.</h3>
                <img src="staticKepek/x-png-icon-png-image-327259.png" alt="error">
                <a id="visszaG" href="http://127.0.0.1:8000/jarmuTalalatiLista">Vissza a járművek oldalra</a>
            </div>
        </div>
        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>