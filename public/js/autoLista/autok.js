$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const autok = [];

    let apiVegpont = "http://localhost:8000/api/auto_fill";
    myAjax.getAdat(apiVegpont, autok, autoFeltoltes);
    const kedvezmeny = new Auto();
    kedvezmeny.setKedvezmenyek();
    function autoFeltoltes(autok) {
        const szuloElem = $("#jarmu-lista");
        const sablonElem = $(".jarmu-card");
        szuloElem.empty();
        sablonElem.show();
        autok.forEach(function (elem) {
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Auto(ujElem, elem);
        });
        sablonElem.hide();
    }

    //Sortok
    let keresomezo = $("#keresoMezo");
    keresomezo.on("keyup", () => {
        autok.splice(0, autok.length);
        $("#jarmu-lista").empty();
        let apivegpont = "http://localhost:8000/api/auto_fill";
        apivegpont += "?q=" + keresomezo.val();
        console.log(autok);
        myAjax.getAdat(apivegpont, autok, autoFeltoltes);
    });

    $("#rendezes").on("change", () => {
        let apivegpont = "http://localhost:8000/api/auto_fill";
        $("#jarmu-lista").empty();
        if ($("#rendezes").val() == "alap") {
            myAjax.getAdat(apivegpont, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "novekvo") {
            apivegpont += "?_sort=ar&_order=asc";
            myAjax.getAdat(apivegpont, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "csokkeno") {
            apivegpont += "?_sort=ar&_order=desc";
            myAjax.getAdat(apivegpont, autok, autoFeltoltes);
        }
    });
});
