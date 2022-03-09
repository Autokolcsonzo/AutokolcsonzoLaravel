$(function () {
    const datumIdo = new DatumIdo();
    const myAjax = new MyAjax();
    let opciok = [];
    const keresoF = new KeresoFeltolo();
    let apiVegpont = "http://localhost:8000/api/keresoview";
    myAjax.getAdat(apiVegpont, opciok, keresoF.opcioFeltoltes);
    let optionDOM = `
              #Khelyszinek option,
              #marka option, 
              #modell option,
              #kivitel option, 
              #uzemanyag option, 
              #valto option,
              #etol option,
              #eig option`;

    $("#marka").change(function () {
        let valasztottMarka = $("#marka").val();
        if (valasztottMarka == "marka") {
            $(optionDOM).remove();
            $("#check_wrapper-1").empty();
            keresoF.opcioFeltoltes(opciok);
        } else {
            $("#modell").empty();
            keresoF.markaModellKapcsolat(valasztottMarka, opciok);
        }
    });
    $("#etol").on("change", (tol, ig) => {
        tol = $("#etol").val();
        ig = $("#eig").val();

        keresoF.evjarat(tol, ig);

        console.log("Valasztott értékek : " + tol, ig);
    });

    $("#min, #max").on("keyup", () => {
        setTimeout(function () {
            keresoF.arSav();
        }, 2000);
    });
});
