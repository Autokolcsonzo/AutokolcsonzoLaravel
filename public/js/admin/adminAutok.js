$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const adminAutok = [];
    const felhasznalok = [];

    let apiVegpont = "http://localhost:8000/api/adminAutok";
    /* let osszesFelhasznaloApi = "http://localhost:8000/api/osszesFelhasznalo"; */

    myAjax.getAdat(apiVegpont, adminAutok, autoFeltoltes);
    /* myAjax.getAdat(osszesFelhasznaloApi, felhasznalok, felhasznalokFeltoltes); */

    function autoFeltoltes(adminAutok) {
        const szuloElem = $(".tablazat .szuloElem");
        const sablonElem = $(".adminAuto");
        szuloElem.empty();
        sablonElem.show();
        adminAutok.forEach(function (elem) {
            /* console.log(elem); */
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Auto(ujElem, elem);
        });

        UjAutoFelvetele();
        ModositMegjelenes();
        ReszletekMegjelenes();

        sablonElem.hide();
    }

    $(window).on("torles", (event) => {
        console.log("törlés");
        myAjax.deleteAdat(apiVegpont, event.detail.id);
        /*   location.reload(); */
    });

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
        $(".autoMod").on("click", () => {
            $(".autoAdatokModositas").slideDown(500);
        });
    }

    function ReszletekMegjelenes() {
        $(".autoMod").on("click", () => {
            $(".autoAdatokModositas").slideDown(500);
        });
    }

    function UjAutoFelvetele() {
        $(".ujAutoGomb").on("click", () => {
            $(".autoAdatokModositas").slideDown(500);
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
