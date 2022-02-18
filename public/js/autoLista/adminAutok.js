$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const adminAutok = [];

    let apiVegpont = "http://localhost:8000/api/adminAuto";

    myAjax.getAdat(apiVegpont, adminAutok, autoFeltoltes);

    function autoFeltoltes(adminAutok) {
        const szuloElem = $(".szuloElem");
        const sablonElem = $(".adminAuto");
        szuloElem.empty();
        sablonElem.show();
        adminAutok.forEach(function (elem) {
            /* console.log(elem); */
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Auto(ujElem, elem);
            console.log(adminAutok);
        });
        sablonElem.hide();
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
