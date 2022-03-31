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
    <script src="js/Responzivitas.js"></script>
    <script src="../js/Feltetelek.js"></script>

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
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/fooldal.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/kereso.css" />
    <link rel="stylesheet" href="css/autoCard.css" />
    <link rel="stylesheet" href="css/jarmuTalalatiLista.css" />
    <link rel="stylesheet" href="css/feltetelek.css" />

</head>

<body>
    <main>

        <!-- TABLET, STB. NÉZET -->
        @if(empty($data->felhasznalo_id))
            @include('komponensek/nav')
        @else
            @include('komponensek/felhasznaloNav')
        @endif

        <!-- HEADER -->
        @include('komponensek/header')



        <div id="primary_content">

            <div class="feltetelek">


                <div class="foszoveg">
                    <h2>
                        Korhatár és vezetői engedély
                    </h2>
                    <input type="button" class="reszletekGomb" value="&#187" id='1'/>
                </div>
                <div id="r1" class="feltetelReszletek">
                    <p> A gépjármű bérlésének feltétele, hogy a bérlő már betöltötte a 20. életévét, illetve legalább 2 éve rendelkezik már jogosítvánnyal, amely az autó elvitelekor ellenőrzésre kerül az iratok felmutatásával.</p>

                </div>



            </div>
            <div class="feltetelek">


<div class="foszoveg">
    <h2>
       Dokumentumok
    </h2>
    <input type="button" class="reszletekGomb" value="&#187" id='2'/>
</div>
<div id="r2" class="feltetelReszletek">
    <p> A bérlőnek rendelkezni kell lakcímkártyával, illetve személyi igazolvánnyal vagy útlevéllel, amelyet a jármű elvitelekor köteles bemutatni munkatársainknak. </p>

</div>



</div>

<div class="feltetelek">


<div class="foszoveg">
    <h2>
    Bérleti időszak/bérleti díj
    </h2>
    <input type="button" class="reszletekGomb" value="&#187" id='3' />
</div>
<div id="r3" class="feltetelReszletek">
    <p> A minimális bérleti időtartam 1 nap, azaz 24 óra. </p>
    <p> Foglalást módosítani csak személyesen vagy telefonon lehetséges, maximum 24 órával a bérlés lejárta előtt. </p>
    <p>Amennyiben a bérlő nem hozza vissza a foglaláskor meghatározott időtartamra az autót, plusz egy nap kerül felszámításra.</p><br><br>
    <strong>A bérleti díj tartalmazza: </strong><br><br>

    <ul>
    <li>Az adókat.</li>
    <li>Biztosítási díjakat pl. lopás, töréskár.</li>
        <li>Az autó karbantartását.</li>
        <li>Alaptakarítást.</li>
        <li>Fertőtlenítést.</li>
        <li>Segélyszolgálatot.</li>
        <li>Egyszeri tele tankot.</li>
        <li>Határkilépő engedély.</li>
    </ul><br><br>

    <strong>A bérleti díj NEM tartalmazza: </strong><br><br>

    <ul>
    <li>Kár esetén az önrészt.</li>
        <li>Az autó további tankolását.</li>
        <li>Parkolási díjakat.</li>
        <li>Autópálya díjakat.</li>
        <li>A nem rendeltetésszerű használatból eredő javítási költségeket.</li>
        <li>Egyéb az autókölcsönzésbe nem tartozó használati díjakat pl. kompjegy.</li>
        <li>Büntetési díjakat.</li>
       
    </ul>


</div>




</div>

<div class="feltetelek">


<div class="foszoveg">
    <h2>
    Fizetési feltételek
    </h2>
    <input type="button" class="reszletekGomb" value="&#187" id='4'/>
</div>
<div id="r4" class="feltetelReszletek">
    <p> A fizetés átutalással, illetve a helyszínen készpénzzel és kártyával történhet. </p>
    <p> Bizonyos összeg letétként az autó elvitelekor fizetendő, majd az ezen kívül eső költségek a visszahozatalkor fizetendők. </p>

</div>



</div>
<div class="feltetelek">


<div class="foszoveg">
    <h2>
       Határátlépés
    </h2>
    <input type="button" class="reszletekGomb" value="&#187" id='5'/>
</div>
<div id="r5" class="feltetelReszletek">
    <p> A határátlépésre külön szabályok vonatkoznak, illetve határkilépő engedély szükséges, ezért ezen szándékát előre jelezze az autó felvételekor. </p>

</div>



</div>

<div class="feltetelek">


<div class="foszoveg">
    <h2>
       Szabályok
    </h2>
    <input type="button" class="reszletekGomb" value="&#187" id='6'/>
</div>
<div id="r6" class="feltetelReszletek">
<ul>
    <li>Tilos a dohányzás az autókban.</li>
        <li>Tilos építőipari tevékenységhez használni az autókat.</li>
        <li>Háziállatot csak szállító ketrecben vagy dobozban lehetséges szállítani.</li>

       
    </ul>


</div>



</div>





        </div>

        <!-- FOOTER -->
        @include('komponensek/footer')
    </main>
</body>

</html>