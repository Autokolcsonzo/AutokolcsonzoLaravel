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
    <script src="../js/Ajax.js"></script>
    <script src="../js/admin/jsFelhasznalok.js"></script>
    <script src="../js/admin/Felhasznalo.js"></script>
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

            <!-- ADMIN TÁBLÁZAT, KERESÉS -->
            <div class="adminKeresesFelhasznalo">
                <div class="n1">
                    <div class="kereses">
                        <i class="far fa-search"></i>
                        <input id="fkereses" type="text" placeholder="Felhasználónév" value="">
                    </div>
                </div>
                <div class="reszponzivnezet">

                <div class="adminFeladatValasztas">
                    <div id="adminKategoriak">
                        <a href="{{ 'adminAutok' }}">Autók</a>
                        <a href="#">Felhasználók</a>
                        <a href="{{ 'adminFoglalas' }}">Foglalások</a>
                    </div>
                </div>


                <!-- Szűrés jogkörönként -->




                <div class="jogkorValasztas">
                    <div>
                        <select name="jogkorKategoriak" id="jogkorKategoriak">

                            <option value="osszes">Összes</option>
                            <option value="felhasznaloJog">Felhasználók</option>

                            <option value="adminJog">Adminok</option>
                        </select>
                    </div>
                </div>
                </div >
                <!-- Új admin felvétele, lenyíló form -->
                <div class="ujAdatokFelvetele">
                    <div class="ujAdminFelvetele">

                        <div>
                             <input type="button" name="ujAdmin" class="ujAdmin" value="Új admin hozzáadása">
                        </div>
                    </div>
                </div>


                <div class="kijelentkezes">
                    <a href="logout">Kijelentkezés</a>
                </div>

            </div>

            <h3 class="oldalNev">Felhasználók</h3>

            <!-- 3 ablak adatokkal -->
            <div class="values">
                <div class="val-box">
                    <i class="fas fa-users"></i>
                    <div class="felhasznalokSzamaSablon">
                        <h3 class="felhasznalokSzama">{{$felhasznalok}}</h3>
                        <span>Összes felhasználó</span>
                    </div>
                </div>

                <div class="val-box">
                    <i class="fas fa-car"></i>
                    <div>
                        <h3>{{$foglalasok}}</h3>
                        <span>Összes foglalás</span>
                    </div>
                </div>

                <div class="val-box">
                    <i class="fas fa-money-check-alt"></i>
                    <div>
                        <h3>{{$bevetel}}</h3>
                        <span>Bejövő összeg</span>
                    </div>
                </div>
            </div>

            <!-- Fő adat -->
            @if(session()->has('status'))
            <p class="uzenet">{{session('status')}}</p>
            @endif

            <div class="felhasznalokAdmin">
                <div class="felhFejlec">
                 
                    
                </div>
                <div class="felhasznalo">
                    <div class="foadatok">

                        <p class="jogkor"></p>
                        <p class="felhnev"></p>
                        <p class="email"></p>
                        <p class="regDatum"></p>
                        
                       
                        <p><input type="button" name="fReszletek" class="fReszletek" value="Részletek" /></p>
                     
                        <p></p>

                      

                    
                           
                            @method('DELETE')
                            @csrf


                           <p> <button type="submit" class="torles">Törlés</button><p>
                              
                      
                    </div>
                    <!-- részletek -->

                    <div class="reszletek">
                        <div class="reszlet">
                            <div class="reszletFejlec">
                                <h2>Irányítószám</h2>
                                <h2>Megye</h2>
                                <h2>Város</h2>
                                <h2>Utca</h2>
                                <h2>Házszám</h2>
                                <h2>Telefonszám</h2>
                                <h2>Születési idő</h2>
                            </div>
                            <div class="reszletadatok">
                                <p class="iranyitoszam"></p>
                                <p class="megye"></p>
                                <p class="varos"></p>
                                <p class="utca"></p>
                                <p class="hazszam"></p>
                                <p class="telszam"></p>
                                <p class="szul_ido"></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        

            <div class="formcontainer">
                <div class="ujAdminForm" id="ujadminForm">


                 



                    <form action='{{route("uj.felhasznaloadmin")}}' id="ujadmin" method="POST" enctype="multipart/form-data">


                        <div class="form-header">
                            <h3>Új admin</h3>
                        </div>
                        <div class="sor">
                            <div class="inputfield">
                                <label for="vezeteknev">Vezetéknév:</label>
                                <br />
                                <input type="text" name="vezeteknev" id="avnev" value="" />

                            </div>

                            <div class="inputfield">
                                <label for="keresztnev">Keresztnév:</label><br>

                                <input type="text" name="keresztnev" id="aknev" value="" />
                            </div>

                        </div>
                        <div class="sor">

                            <div class="inputfield">
                                <label for="jelszo">Jelszo:</label>
                                <br />
                                <input type="text" name="jelszo" id="ajelszo" value="" />

                            </div>
                            <div class="inputfield">
                                <label for="telephely">Telephely:</label><br>
                                <select name="telephely" id="atelephely">


                                </select>
                            </div>
                        </div>







                        <div class="sor">
                            <div class="inputfield">
                                <label for="felhasznalonev">Felhasználónév:</label>

                                <br />
                                <input type="text" name="felhasznalonev" id="afnev" value="" /><br />
                            </div>

                            <div class="inputfield">
                                <label for="e_mail">E-mail cím:</label> <br />
                                <input type="email" id="aemail" name="e_mail" value="" />
                            </div>
                        </div>


                        <div class="sor">
                            <div class="inputfield">
                                <label for="szul_ido">Születési dátum:</label><br>
                                <input type="date" name="szul_ido" id="aszdatum" value="" /><br>
                            </div>

                            <div class="inputfield">
                                <label for="tel_szam">Telefonszám:</label><br>
                                <input type="text" name="tel_szam" id="atelszam" value="" />
                            </div>

                        </div>


                        <div class="sor">

                        
                            <div class="inputfield">
                            <label for="ir_szam">Irányító szám:</label>
                                <br />
                                <input type="text" name="ir_szam" id="airanyitoszam" value="" />

                            </div>

                        </div>

                        <div class="sor">
                         
                            <div class="inputfield">
                            <label for="megye">Megye:</label><br />
                                <input type="text" name="megye" id="amegye" value="" />
                            </div>
                            
                            <div class="inputfield">
                            <label for="varos">Város:</label><br />
                                <input type="text" name="varos" id="avaros" value="" />
                            </div>







                        </div>


                        <div class="sor">
                           
                            <div class="inputfield">
                            <label for="utca">Utca:</label><br />
                                <input type="text" name="utca" id="autca" value="" />

                            </div>
                            
                            <div class="inputfield">
                            <label for="hazszam">Házszám:</label><br />

                                <input type="text" name="hazszam" id="ahazszam" value="" />
                            </div>




                        </div>



                        <input type="submit" value="Új hozzáadása" class="ujAdminFelvetel" />


                    </form>
                </div>


            </div>


        </div>

    </main>
</body>

</html>