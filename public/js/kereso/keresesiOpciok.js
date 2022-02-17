$(function () {
    const myAjax = new MyAjax();
    let opciok = [];
    const keresoF = new KeresoFeltolo();
    let apiVegpont = "http://localhost:3000/keresoParameter";
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
});
