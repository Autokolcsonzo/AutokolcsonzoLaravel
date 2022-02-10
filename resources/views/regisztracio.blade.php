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
    <link rel="stylesheet" href="Felhasználó/css/felhasznaloiProfil.css" />

</head>

<body>
    <main>
        <!-- TABLET, STB. NÉZET -->
        @include('komponensek/nav')

        <!--   Fejléc -->
        @include('komponensek/header')

        <div class="fprofil">
            <div class="regisztracioFelulet">
                <form action="">
                    <div class="form-header">
                        <h3>Regisztráció</h3>
                    </div>
                    <div class="sor">
                        <div class="inputfield">
                            <label for="nev">Vezetéknév:</label>
                            <br />
                            @csrf
                            <input type="text" name="vnev" id="vnev" placeholder="Kovács" />

                        </div>

                        <div class="inputfield">
                            <label for="nev">Keresztnév:</label><br>

                            <input type="text" name="knev" id="knev" placeholder="Kati" />
                        </div>

                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="fnev">Felhasználónév:</label>

                            <br />
                            <input type="text" name="fnev" id="fnev" placeholder="valaki97" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="email">E-mail cím:</label> <br />
                            <input type="email" id="email" name="email" placeholder="valami@gmail.com" />
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="jelszo1">Jelszó:</label>
                            <br>
                            <input type="password" id="jelszo1" name="jelszo1" class="jelszo" placeholder="******" />
                        </div>

                        <div class="inputfield">
                            <label for="jelszo2">Jelszó újra:</label>
                            <br>
                            <input type="password" name="jelszo2" id="jelszo2" class="jelszo" placeholder="******" />
                        </div>

                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="szdatum">Születési dátum:</label><br>
                            <input type="date" name="szdatum" id="szdatum" /><br>
                        </div>

                        <div class="inputfield">
                            <label for="telszam">Telefonszám:</label><br>
                            <input type="text" class="telszam" placeholder="+36-20-345-6789" />
                        </div>

                    </div>


                    <div class="sor">


                        <div class="inputfield">
                            <label>Cím:</label>
                            <br />
                            <input type="text" id="iranyitoszam" placeholder="Irányítószám" />

                        </div>

                    </div>

                    <div class="sor">

                        <div class="inputfield">
                            <input type="text" id="megye" placeholder="Megye" />
                        </div>

                        <div class="inputfield">
                            <input type="text" id="varos" placeholder="Város" />
                        </div>

                    </div>


                    <div class="sor">

                        <div class="inputfield">
                            <input type="text" id="utca" placeholder="Utca" />

                        </div>

                        <div class="inputfield">

                            <input type="text" id="hazszam" placeholder="Házszám" />
                        </div>

                    </div>
                    <input type="submit" value="Regisztráció" id="adatotMent" />


                </form>
            </div>
        </div>

        <!--           <div class="form">
                        <h3>Regisztráció</h3>
                        <form action="">
                    <div class="inputfield">
                      <label>Név:</label>
                      <br />
                      <input type="text" class="firstNameInput" placeholder="First" />
                      <input type="text" class="lastNameInput" placeholder="Last" />
                    </div>
                    
                    <div class="inputfield">
                      <label>Felhasználónév:</label>
                      <label>E-mail cím:</label>
                      <br />
                      <input type="text" class="felhNevInput" placeholder="Piroska66" />
                      <input
                        type="email"
                        class="emailInput"
                        placeholder="pirike66@gmail.com"
                      />
                    </div>
            
                    <div class="inputfield">
                      <label>Jelszó:</label>
                      <label>Jelszó újra:</label> -->
        <!--       </div>
                  <div class="inputfield"> -->
        <!--           <br>
                      <input
                        type="password"
                        class="jelszo1Input"
                        placeholder="******"
                      />
                      <input
                        type="password"
                        class="jelszo2Input"
                        placeholder="******"
                      />
                    </div>
                    <div class="inputfield">
                      <label>Születési dátum:</label>
                      <label>Telefonszám:</label> -->
        <!--      </div>
                 <div class="inputfield"> -->
        <!--         <br>
                    <input type="date" name="datum" class="datumInput" />
                    <input
                      type="text"
                      class="telInput"
                      placeholder="pl.: +36-20-345-6789"
                    />
                  </div>
                  <div class="inputfield">
                    <label>Cím:</label>
                    <br />
                    <input type="text" class="varosInput" placeholder="Város" />
                  </div>
                  <br />
                  <div class="inputfield">
                    <input type="text" class="megyeInput" placeholder="Megye" />
                    <input
                      type="text"
                      class="iranyitoszamInput"
                      placeholder="Irányítószám"
                    />
                  </div>
                  <br />
                  <div class="inputfield">
                    <input type="text" class="utcaInput" placeholder="Utca" />
                    <input type="text" class="hazszamInput" placeholder="Házszám" />
                  </div>
                  <br />
                  <div class="inputfield">
                    <input type="submit" value="Regisztráció" class="regButton" />
                  </div>
                </form>
              </div> -->
        <!-- Footer -->
        @include('komponensek/footer')
    </main>
</body>

</html>