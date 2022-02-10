<div class="kereses">

    <!--       <div class="reszponzivLogGombok">
                            <a href="bejelentkezes.html">Bejelentkezés</a>
                            <a href="regisztracio.html">Regisztráció</a>
                            </div> -->

    <form action="">
        <div class="input-box">
            <span>Válassz helyszíneink közül</span>
            <select id="Khelyszinek" name="Khelyszinek">
            </select>
            <!--  <br><br><br> -->

        </div>
        <div class="input-box">
            <span>Elvitel dátuma</span>
            <input type="date" id="elvitel" name="elvitel" />
        </div>
        <div class="input-box">
            <span>Visszahozatal dátuma</span>
            <input type="date" id="visszavitel" name="visszavitel" />
        </div>
        <div class="input-box2">
            <input style="margin-top: 10px" type="time" id="idoEl" name="idoEl" />
            <input style="margin-top: 10px" type="time" id="idoVissza" name="idoVissza" />
        </div>
    </form>
    <div id="dropdown_kereso">

        <div id="checkboxs">
            <div id="check_wrapper-1">
            </div>

        </div>

        <div id="modell_parameter_kereso">
            <section>
                <label for="marka">Márka</label>
                <select id="marka" name="marka">
                </select>
            </section>
            <section>
                <label for="modell">Modell</label>
                <select id="modell" name="modell">
                </select>
            </section>
            <section>
                <label for="kivitel">Kivitel</label>
                <select id="kivitel" name="kivitel">
                </select>
            </section>

            <section>
                <label for="uzemanyag">Üzemanyag</label>
                <select id="uzemanyag" name="uzemanyag">
                </select>
            </section>

            <section>
                <label for="valto">Váltó</label>
                <select id="valto" name="valto">
                </select>
            </section>


            <div id="modell_evjarat">
                <p>Évjárat</p>
                <div id="evjarat">
                    <select id="etol" name="etol">
                    </select>
                    <p>-tól</p>
                    <select id="eig" name="eig">
                    </select>
                    <p>-ig</p>
                </div>

            </div>
        </div>
        <section id="ulesek">
            <label for="ulesek">Ülések száma</label>
            <input type="number" name="ulesek">
        </section>
        <section id="minmax-wrapp">
            <div id="minmaxLable">
                <label for="min">tól-</label>
                <label for="max">ig-</label>
            </div>
            <section id="tolig">
                <section id="mint">
                    <input type="number" name="min" id="min">
                    <label for="min">Ft</label>
                </section>
                <section id="maxt">
                    <input type="number" id="max" name="max">
                    <label for="max">Ft</label>
                </section>
            </section>
        </section>
    </div>
    <div id="keresoBtn-Box">
        <input type="submit" name="kereses" id="keresesBtn" value="Keresés" />
    </div><br>
    <div id="reszletesKeresoBtn-Box">
        <a id="reszletesKeresoBtn">Részletes keresés <img id="dropdown_arrow" src="kepek/arrow-circle-outline.svg"></a>
    </div>
</div>