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
    <script src="../js/admin/Felhasznalo.js"></script>
    <script src="../js/Ajax.js"></script>
    <script src="../js/admin/jsFelhasznalok.js"></script>
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
    <!--   <link rel="stylesheet" href="css/fooldal.css" /> -->
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/admin/admin.css" />
</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/nav')

        <!--   Fejléc -->
        @include('komponensek/header')

        <div id="primary_content">

            <!-- ADMIN TÁBLÁZAT, KERESÉS -->
            <div class="adminKereses">
                <div class="n1">
                    <div class="kereses">
                        <i class="far fa-search"></i>
                        <input type="text" placeholder="Search">
                    </div>
                </div>

                <div class="adminFeladatValasztas">
                    <div>
                        <select name="adminKategoriak" id="adminKategoriak">
                            <option value="adminAutok">Autók</option>
                            <option value="adminFelhasznalok">Felhasználók</option>
                            <option value="adminFoglalasok">Foglalások</option>
                        </select>
                    </div>
                </div>

            </div>
            <h3 class="oldalNev">Felhasználók</h3>
            <div class="values">
                <div class="val-box">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>16</h3>
                        <span>Összes felhasználó</span>
                    </div>
                </div>
                <!--         </div> -->

                <!--    <div class="values"> -->
                <div class="val-box">
                    <i class="fas fa-car"></i>
                    <div>
                        <h3>194</h3>
                        <span>Összes foglalás</span>
                    </div>
                </div>
                <!--   </div> -->
                <!-- 
                                    <div class="values"> -->
                <div class="val-box">
                    <i class="fas fa-money-check-alt"></i>
                    <div>
                        <h3>1.320.456Ft</h3>
                        <span>Bejövő összeg</span>
                    </div>
                </div>
            </div>

            <!-- TÁBLÁZAT -->
            <div class="tablazat">
                <table>
                    <thead>
                        <tr>
                            <th>Jogkör</th>
                            <th>Felhasználónév</th>
                            <th>E-mail</th>
                            <th>Regisztráció dátuma</th>
                        </tr>
                    </thead>
                    <tbody class="felhasznalokKiiratasa">
                        <tr class="felhasznalok">
                            <td class="jogkor">
                                <p>3 (felhasználó)</p>
                            </td>
                            <td class="felhnev">
                                <p>pirike66</p>
                            </td>
                            <td class="email">
                                <p>pirike66pirike66gmail.com</p>
                            </td>
                            <td class="regDatum">
                                <p>2021.04.05.</p>
                            </td>
                            <td class="reszletekGomb">
                                <a href="#">Részletek
                                    <!--  <i class="fas fa-long-arrow-right"></i> -->
                                </a>
                            </td>
                            <td class="modositas">
                                <a href="#">Módosítás</a>
                            </td>
                            <td class="torles">
                                <a href="#">Törlés</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>

        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>