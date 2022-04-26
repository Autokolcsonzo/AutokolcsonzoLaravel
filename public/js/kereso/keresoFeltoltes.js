class KeresoFeltolo {
    constructor() {}
    markaModellKapcsolat(valasztottMarka, opciok) {
        opciok.forEach(function (obj) {
            for (let marka in obj.marka) {
                if (
                    valasztottMarka == marka &&
                    valasztottMarka != "--Márka--"
                ) {
                    $("#modell").empty();
                    $("#modell").append(`<option value=''>--Modell--</option>`);
                    for (
                        let index = 0;
                        index < obj.marka[marka].length;
                        index++
                    ) {
                        let option = `<option value='${obj.marka[marka][index]}'>${obj.marka[marka][index]}</option>`;
                        $("#modell").append(option);
                    }
                }
            }
        });
    }

    opcioFeltoltes(opciok) {
        $("#Khelyszinek").append(`<option value=''>--Helyszín--</option>`);
        $("#marka").append(`<option value=''>--Márka--</option>`);
        $("#modell").append(`<option value=''>--Modell--</option>`);
        $("#kivitel").append(`<option value=''>--Kivitel--</option>`);
        $("#uzemanyag").append(`<option value=''>--Üzemanyag--</option>`);
        $("#etol, #eig").append(`<option value='0'>--Évjátat--</option>`);
        opciok.forEach(function (obj) {
            for (let marka in obj.marka) {
                let option = `<option value='${marka}'>${marka}</option>`;
                $("#marka").append(option);
            }
            for (let modell in obj.marka) {
                for (let index = 0; index < obj.marka[modell].length; index++) {
                    let option = `<option value='${obj.marka[modell][index]}'>${obj.marka[modell][index]}</option>`;
                    $("#modell").append(option);
                }
            }
            for (let index = 0; index < obj.helyszin.length; index++) {
                let option = `<option value='${obj.helyszin[index]}'>${obj.helyszin[index]}</option>`;
                $("#Khelyszinek").append(option);
            }
            for (let index = 0; index < obj.kivitel.length; index++) {
                let option = `<option value='${obj.kivitel[index]}'>${obj.kivitel[index]}</option>`;
                $("#kivitel").append(option);
            }
            for (let index = 0; index < obj.uzemanyag.length; index++) {
                let option = `<option value='${obj.uzemanyag[index]}'>${obj.uzemanyag[index]}</option>`;
                $("#uzemanyag").append(option);
            }
            let checkboxsArray = [];
            for (let index = 0; index < obj.checkboxs.length; index++) {
                //split obj.checkboxs by "," and add to array checkboxs array
                obj.checkboxs[index].trim();
                let checkboxsSeged = obj.checkboxs[index].split(",");
                //console.log(checkboxsSeged);
                for (let index2 = 0; index2 < checkboxsSeged.length; index2++) {
                    let trimed = checkboxsSeged[index2].trim();
                    if (
                        !checkboxsArray.includes(trimed) &&
                        !checkboxsSeged[index2] == ""
                    ) {
                        checkboxsArray.push(trimed);
                    }
                }
            }
            for (let index = 0; index < checkboxsArray.length; index++) {
                $("#check_wrapper-1").append(`<section>
                                            <label for="${checkboxsArray[index]}">${checkboxsArray[index]}</label>
                                            <input class="kersoCheckbox" type="checkbox" name="${checkboxsArray[index]}" value="${checkboxsArray[index]}">
                                          </section>`);
            }

            //console.log(checkboxsArray);
            evjarat(obj.evjarat[0], obj.evjarat[1]);
            //console.log("évjárat  : " + obj.evjarat[0], obj.evjarat[1]);
            //console.log(evjaratReturn);
            function evjarat(tol, ig) {
                let koztesEv = ig - tol;
                for (let index = 0; index <= koztesEv; index++) {
                    $("#etol, #eig").append(
                        `<option value='${tol + index}'>${tol + index}</option>`
                    );
                }
            }
        });
        let keresoLocalSOBJ = localStorage.getItem("keresoLocalSOBJ");
        keresoLocalSOBJ = JSON.parse(keresoLocalSOBJ);
        if (keresoLocalSOBJ != null || 0) {
            const kfs = new KeresoFeltolteseLocalStorage();
            kfs.setHozottParameterek();
            $("#idoEl").val(keresoLocalSOBJ.elvitelIdo);
            $("#idoVissza").val(keresoLocalSOBJ.visszaIdo);
        }
    }

    evjarat(tol, ig) {
        tol = parseInt(tol);
        ig = parseInt(ig);
        let igMax = 0;
        let tolMin = 0;
        $("#etol option").each(function (index) {
            if (index == 1) {
                tolMin = parseInt($(this).val());
            }
            igMax = parseInt($(this).val());
        });
        if (tol == 0 || tol == null) {
            tol = tolMin;
        }
        //console.log(igMax);

        //if (isNaN(ig) || ig == null || ig == 0 || tol > ig) {
        //ig = 2022;
        $("#eig").empty();
        $("#eig").append(`<option value='0'>--Évjátat--</option>`);
        for (let index = tol; index <= igMax; index++) {
            $("#eig").append(`<option value='${index}'>${index}</option>`);
            console.log("ciklus lefut.", index);
        }
        //}
    }

    arSav() {
        let minAr = parseInt($("#min").val());
        let maxAr = parseInt($("#max").val());
        //console.log(minAr, maxAr);
        if (minAr > maxAr) {
            $("#max").val(minAr);
            console.log("min > max");
        }
        if (minAr == maxAr || minAr < maxAr) {
            return;
        }
    }
    markaRegen(opciok) {
        $("#modell").append(`<option value=''>--Modell--</option>`);
        opciok.forEach(function (obj) {
            for (let modell in obj.marka) {
                for (let index = 0; index < obj.marka[modell].length; index++) {
                    let option = `<option value='${obj.marka[modell][index]}'>${obj.marka[modell][index]}</option>`;
                    $("#modell").append(option);
                }
            }
        });
    }
}
