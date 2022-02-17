$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const autoAjax = new AutoAjax(token);
    const autok = [];
    let apiVegpont = "http://localhost:8000/api/auto";
    autoAjax.getAdat(apiVegpont, autok, autoFeltoltes);

    function autoFeltoltes() {
        const szuloElem = $("#jarmu-lista");
        const sablonElem = $(".jarmu-card");
        szuloElem.empty();
        sablonElem.show();
        autok.forEach(function (elem) {
            /*  console.log(elem); */
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Auto(ujElem, elem);
            console.log(autok);
        });
        sablonElem.hide();
    }

    //Sortok
    let keresomezo = $("#keresoMezo");
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
    });
});
