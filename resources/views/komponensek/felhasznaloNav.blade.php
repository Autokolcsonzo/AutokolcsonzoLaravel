<div class="wrapper">
    <div class="navbar">
        <div class="reszpGombok">

        </div>
        <div class="nav_right">
            <ul>
                <li class="nr_li dd_main">
                    <img src="kepek/profile.png" alt="profile_img">

                    <div class="dd_menu">
                        <div class="dd_left">
                            <ul>
                                <li><i class="fas fa-user-circle"></i></li>
                                <li><i class="fas fa-clipboard-list"></i></li>
                                <li><i class="fas fa-sign-out-alt"></i></li>
                            </ul>
                        </div>
                        <div class="dd_right">
                            <ul>
                                <li class="profilNavGomb"><a href="{{ asset('felhasznaloiProfil') }}">Profilom</a></li>
                                <li class="foglalasNavGomb"><a href="{{ asset('felhasznaloiFoglalasok') }}">Foglalásaim</a></li>
                                <li><a href="logout">Kijelentkezés</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- ELSŐDLEGES NAV -->
<div class="headerSzoveg">
    <h1 class="reszponzivCim">Keresd meg a számodra megfelelő autót!</h1>
</div>

<nav class="felhasznaloFelsoNav">
    <div class="container">
        <p class="reszponzivLogo">DropMyRide</p>
        <ul>
            <div class="logo">
                <img src="kepek/logo.png" alt="logo" />
            </div>
            <li class="elosProfilNavGomb"><a href="{{ asset('felhasznaloiProfil') }}">Profilom</a></li>
            <li class="elsoFoglalasNavGomb"><a href="{{ asset('felhasznaloiFoglalasok') }}">Foglalásaim</a></li>
            <!--{ route('welcome') } kicseréltem hogy ne az alapra vigyen vissza folyton. BTW nem találtam a routot-->
            <li><a href="http://127.0.0.1:8000/dashboard">Kezdőlap</a></li>
            <li><a href="{{ route('rolunk') }}">Rólunk</a></li>
            <li><a href="{{ route('feltetelek') }}">Feltételek</a></li>
            <li>
                <a href="{{ route('osszesAutoMenubol') }}">Járműveink
                    <!--  <i class="fa fa-arrow-right"></i> -->
                </a>
            <li class="kijelentkezesGomb"><a href="logout">Kijelentkezés</a></li>
            <!-- <div class="autokMenu">
                    <ul>
                        <li><a href="{{ route('osszesAutoMenubol') }}">Összes</a></li>
                        <li><a href="#">Autók</a></li>
                        <li><a href="#">Furgonok</a></li>
                        <li><a href="#">Pickupok</a></li>
                    </ul>
                </div>
            </li> -->
        </ul>
    </div>
    <!-- HAMBI MENÜ GOMB -->
    <button class="hamburger">
        <div class="bar"></div>
    </button>
</nav>

<!-- MOBIL NAV -->
<div class="mobilNav">
    <ul class="navLista2">
        <li><a href=" {{ route('welcome') }} ">Kezdőlap</a></li>
        <li class="profilNavGomb"><a href="{{ asset('felhasznaloiProfil') }}">Profilom</a></li>
        <li class="foglalasNavGomb"><a href="{{ asset('felhasznaloiFoglalasok') }}">Foglalásaim</a></li>
        <li><a href="{{ route('rolunk') }}">Rólunk</a></li>
        <li><a href="{{ route('feltetelek') }}">Feltételek</a></li>
        <li><a href="{{ route('osszesAutoMenubol') }}">Járműveink</a></li>
        <!-- <li>
            <img src="kepek/profile.png" alt="profil" />
        </li> -->
        <li class="kijelentkezesGomb"><a href="logout">Kijelentkezés</a></li>
    </ul>
</div>