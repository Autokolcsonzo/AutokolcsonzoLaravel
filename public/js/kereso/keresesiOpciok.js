$(function () {
    const datumIdo = new DatumIdo();
    const myAjax = new MyAjax();
    let opciok = [];
    const keresoF = new KeresoFeltolo();
    let apiVegpont = "/api/keresoview";
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

    $("#marka").on('change', ()=> {
        let valasztottMarka = $("#marka").val();
        //console.log(typeof valasztottMarka);
        if (valasztottMarka == '') {
            $('#modell').empty();
            //$("#check_wrapper-1").empty();
            keresoF.markaRegen(opciok);
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
