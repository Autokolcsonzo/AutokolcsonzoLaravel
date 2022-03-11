$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const adminAutok = [];
    const felhasznalok = [];

    // let apiVegpont = "http://localhost:8000/api/adminAutok";
    /* let osszesFelhasznaloApi = "http://localhost:8000/api/osszesFelhasznalo"; */

    myAjax.getAdat(apiVegpont, adminAutok, autoFeltoltes);
    /* myAjax.getAdat(osszesFelhasznaloApi, felhasznalok, felhasznalokFeltoltes); */

    function autoFeltoltes(adminAutok) {
        $(".felhasznalokAdmin").append("<div class='felhFejlec'></div>");
        $(".felhFejlec").append(
            "<h2>Státusz</h2><h2>Rendszám</h2><h2>Megnevezés</h2><h2>Telephely</h2><h2></h2><h2></h2><h2></h2>"
        );
        const szuloElem = $(".felhasznalokAdmin");
        const sablonElem = $(".felhasznalo");
        szuloElem.empty();
        sablonElem.show();

        adminAutok.forEach(function (elem) {
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Auto(ujElem, elem);
        });

        UjAutoFelvetele();
        ModositMegjelenes();

        sablonElem.hide();
    }

    function felhasznalokFeltoltes(felhasznalok) {
        console.log("felhasznalok feltoltes");
        const szuloElem = $(".values");
        const sablonElem = $(".val-box");
        szuloElem.empty();
        sablonElem.show();
        felhasznalok.forEach(function (elem) {
            console.log(elem);
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Auto(ujElem, elem);
        });

        sablonElem.hide();
    }

    /* $(window).on("modositas", (event) => {
            id = event.detail.id;
            $("#nev").val(event.detail.title);
            $("#leiras").val(event.detail.description);
            $("#befdate").val(event.detail.end_date);
            $("#felh").val(event.detail.userId);
            $("#status").val(event.detail.status);
            $("#submit").prop("disabled", true);
            $("#form").show();
        }); */

    function ModositMegjelenes() {
        $(".fadatokMod").click(function () {
            if ($(".fadatokMod").hasClass("clicked-once")) {
                $(".autoAdatokModositas").slideUp(1000);
                $(".fadatokMod").removeClass("clicked-once");
            } else {
                $(".fadatokMod").addClass("clicked-once");
                $(".autoAdatokModositas").slideDown(1000);
            }
        });
    }

    function UjAutoFelvetele() {
        $(".ujAutoGomb").click(function () {
            if ($(".ujAutoGomb").hasClass("clicked-once")) {
                $(".autoAdatokFeltoltes").slideUp(1000);
                $(".ujAutoGomb").removeClass("clicked-once");
            } else {
                $(".ujAutoGomb").addClass("clicked-once");
                $(".autoAdatokFeltoltes").slideDown(1000);
            }
        });
    }

    //Sortok
    /*     let keresomezo = $("#keresoMezo");
    keresomezo.on("keyup", () => {
        autok.splice(0, autok.length);
        $("#jarmu-lista").empty();
        let apivegpont = "http://localhost:3000/autok";
        apivegpont += "?q=" + keresomezo.val();
        console.log(autok);
        autoAjax.getAdat(apivegpont, autok, autoFeltoltes);
    });

    $("#rendezes").on("change", () => {
        let apivegpont = "http://localhost:3000/autok";
        $("#jarmu-lista").empty();
        if ($("#rendezes").val() == "alap") {
            autoAjax.getAdat(apivegpont, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "novekvo") {
            apivegpont += "?_sort=ar&_order=asc";
            autoAjax.getAdat(apivegpont, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "csokkeno") {
            apivegpont += "?_sort=ar&_order=desc";
            autoAjax.getAdat(apivegpont, autok, autoFeltoltes);
        }
    }); */
});
