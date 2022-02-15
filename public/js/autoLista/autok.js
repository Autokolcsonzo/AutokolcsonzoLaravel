$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const autoAjax = new AutoAjax(token);
    let osszesAutoApi = "http://localhost:8000/api/auto";
    const autok = [];
    autoAjax.getAdat(osszesAutoApi, autok, autoFeltoltes);

    function autoFeltoltes() {
        const szuloElem = $("#jarmu-lista");
        const sablonElem = $(".jarmu-card");
        /* szuloElem.show(); */
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
        let osszesAutoApi = "http://localhost:8000/api/auto/";
        osszesAutoApi += "?q=" + keresomezo.val();
        console.log(autok);
        autoAjax.getAdat(osszesAutoApi, autok, autoFeltoltes);
    });

    $("#rendezes").on("change", () => {
        let osszesAutoApi = "http://localhost:8000/api/auto/";
        $("#jarmu-lista").empty();
        if ($("#rendezes").val() == "alap") {
            autoAjax.getAdat(osszesAutoApi, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "novekvo") {
            osszesAutoApi += "?_sort=ar&_order=asc";
            autoAjax.getAdat(osszesAutoApi, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "csokkeno") {
            osszesAutoApi += "?_sort=ar&_order=desc";
            autoAjax.getAdat(osszesAutoApi, autok, autoFeltoltes);
        }
    });
});
