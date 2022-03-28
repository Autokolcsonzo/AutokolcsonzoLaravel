$(function(){
    const apiVegpont = "http://127.0.0.1:8000/api/kedvezmeny";
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
        let keresoLocalSOBJ = localStorage.getItem('keresoLocalSOBJ');
        return (JSON.parse(keresoLocalSOBJ));
    }

    setHozottParameterek() {
        const keresOBJ = this.getAdatToLocalS();
        /*let aktDatum = new Date();
        let aktNap = aktDatum.getDate();
        let aktHo = aktDatum.getMonth() + this.honapSkip;
        let aktEv = aktDatum.getFullYear();
        let minDatumString = aktEv+'-'+aktHo+'-'+aktNap;*/

        if (keresOBJ == null || 0) {
            return
        } else {
            this.kulcsszo.val(keresOBJ.kulcsszo);
            this.telephely.val(keresOBJ.telephely);
            /*if(keresOBJ.elvitelDatuma <= minDatumString){
                this.elvitelDatuma.val(minDatumString).change();
            }else{
                this.elvitelDatuma.val(keresOBJ.elvitelDatuma).change();
            }*/
            this.elvitelDatuma.val(keresOBJ.elvitelDatuma).change();
            this.elvitelDatuma.attr("max", keresOBJ.visszavitelDatuma).change();
            this.visszavitelDatuma.val(keresOBJ.visszavitelDatuma).change();
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
            
            $('.kersoCheckbox:checkbox').each(function () {
                for (let index = 0; index < keresOBJ.checkBoxok.length; index++) {
                    
                    if($(this).val() == keresOBJ.checkBoxok[index]){
                        $(this).prop( "checked", true );
                    }
                }
            });
        }
    }
}
