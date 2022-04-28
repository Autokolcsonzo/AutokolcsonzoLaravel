$(function () {
    const apiVegpont = "/api/kedvezmeny";
    const kedvezmenyek = new KedvezmenyAjax();
    kedvezmenyek.getAdat(apiVegpont);
});

class KeresoFeltolteseLocalStorage {
    constructor() {
        this.kulcsszo = $("#keresoMezo");
        this.telephely = $("#Khelyszinek");
        this.elvitelDatuma = $("#elvitel");
        this.visszavitelDatuma = $("#visszavitel");
        this.elvitelIdo = $("#idoEl");
        this.visszaIdo = $("#idoVissza");
        this.keresoBtn = $("#keresesBtn");
        this.marka = $("#marka");
        this.modell = $("#modell");
        this.kivitel = $("#kivitel");
        this.uzemanyag = $("#uzemanyag");
        this.evjaratTol = $("#etol");
        this.evjaratIg = $("#eig");
        this.arTol = $("#min");
        this.arIg = $("#max");
    }

    getAdatToLocalS() {
        let keresoLocalSOBJ = localStorage.getItem("keresoLocalSOBJ");
        return JSON.parse(keresoLocalSOBJ);
    }

    setHozottParameterek() {
        const keresOBJ = this.getAdatToLocalS();
        let localElInteger = keresOBJ.elvitelDatuma;
        console.log(keresOBJ.elvitelDatuma);
        let localElInteger2 = localElInteger.replace("-", "");
        localElInteger2 = localElInteger2.replace("-", "");
        localElInteger2 = parseInt(localElInteger2);
        let aktDatum = new Date();
        let aktNap = aktDatum.getDate();
        let aktHo = aktDatum.getMonth() + 1;
        let aktEv = aktDatum.getFullYear();
        if (aktHo < 10) {
            aktHo = "0" + aktHo;
        }
        if (aktNap < 10) {
            aktNap = "0" + aktNap;
        }
        let minDatumString = aktEv + "-" + aktHo + "-" + aktNap;
        let minDatumIntager = parseInt(aktEv + aktHo + aktNap);

        setTimeout(function () {}, 1500);
        console.log(localElInteger2, minDatumIntager);
        if (keresOBJ == null || 0) {
            return;
        } else {
            this.kulcsszo.val(keresOBJ.kulcsszo);
            this.telephely.val(keresOBJ.telephely);

            if (localElInteger2 < minDatumIntager) {
                console.log("hibás elvitel");
                this.elvitelDatuma.val(minDatumString).change();
                this.visszavitelDatuma.val(minDatumString).change();
                console.log(localElInteger, minDatumIntager);
            } else {
                this.elvitelDatuma.val(keresOBJ.elvitelDatuma).change();
                this.visszavitelDatuma.val(keresOBJ.visszavitelDatuma).change();
            }
            //this.elvitelDatuma.val(keresOBJ.elvitelDatuma).change();
            this.elvitelDatuma.attr("max", keresOBJ.visszavitelDatuma).change();
            this.marka.val(keresOBJ.marka);
            this.modell.val(keresOBJ.modell);
            this.kivitel.val(keresOBJ.kivitel);
            this.uzemanyag.val(keresOBJ.uzemanyag);
            this.evjaratTol.val(keresOBJ.evjaratTol);
            this.evjaratIg.val(keresOBJ.evjaratIg);
            this.arTol.val(keresOBJ.arTol);
            this.arIg.val(keresOBJ.arIg);

            let checkBoxokDOM = [];
            let checkboxLocalon = [];

            $(".kersoCheckbox:checkbox").each(function () {
                for (
                    let index = 0;
                    index < keresOBJ.checkBoxok.length;
                    index++
                ) {
                    if ($(this).val() == keresOBJ.checkBoxok[index]) {
                        $(this).prop("checked", true);
                    }
                }
            });
        }
    }
}
