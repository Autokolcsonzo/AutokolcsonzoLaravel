$(function(){
    /*
    const kfs = new KeresoFeltolteseLocalStorage();
    kfs.setHozottParameterek();
    let keresoLocalSOBJ = localStorage.getItem('keresoLocalSOBJ');
    keresoLocalSOBJ = JSON.parse(keresoLocalSOBJ);
    $('#idoEl').val(keresoLocalSOBJ.elvitelIdo).change();
    $('#idoVissza').val(keresoLocalSOBJ.visszaIdo).change();
    //$('#Khelyszinek').val(keresoLocalSOBJ.telephely).change();
    console.log(kfs.getAdatToLocalS());
    */
    console.log(
        "elviteli dátum : " +
            $("#elvitel").val() +
            "\nvisszhozatali dátum : " +
            $("#visszavitel").val() +
            "\nelIdo : " +
            $("#idoEl").val() +
            "\nvisszaIdo : " +
            $("#idoVissza").val()
    );
    
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
        
        //const datumIdo = new DatumIdo();
        //datumIdo.handelerMinIdoUtkozes();
        //datumIdo.handelerMinDatumUtkozes();
        //datumIdo.setMinIdo();
        
        $(this.keresoBtn).on("click", () => {
            console.log("Jelenleg még nem tudsz keresni."); // ide egy új api végpontnak kell eljutnia vagy másik helyre kell tenni ezt a kód részt.
        });

    }
    
    getAdatToLocalS() {
        let keresoLocalSOBJ = localStorage.getItem('keresoLocalSOBJ');
        return (JSON.parse(keresoLocalSOBJ));
    }

    setHozottParameterek() {
        const keresOBJ = this.getAdatToLocalS();
        if (keresOBJ == null || 0) {
            return
        } else {
            this.kulcsszo.val(keresOBJ.kulcsszo);
            this.telephely.val(keresOBJ.telephely).change();
            this.telephely.val(keresOBJ.telephely);
            this.elvitelDatuma.val(keresOBJ.elvitelDatuma).change();
            this.elvitelDatuma.attr("max", keresOBJ.visszavitelDatuma).change();
            //this.elvitelIdo.val(keresOBJ.elvitelIdo).change();
            this.visszavitelDatuma.val(keresOBJ.visszavitelDatuma).change();
            //this.visszaIdo.val(keresOBJ.visszaIdo).change();
            this.marka.val(keresOBJ.marka).change();
            this.modell.val(keresOBJ.modell).change();
            this.kivitel.val(keresOBJ.kivitel).change();
            this.uzemanyag.val(keresOBJ.uzemanyag).change();
            this.evjaratTol.val(keresOBJ.evjaratTol);
            this.evjaratIg.val(keresOBJ.evjaratIg);
            this.arTol.val(keresOBJ.arTol).change();
            this.arIg.val(keresOBJ.arIg).change();

            let checkBoxokDOM = [];
            let checkboxLocalon = [];
            
            $('.kersoCheckbox:checkbox').each(function () {
                for (let index = 0; index < keresOBJ.checkBoxok.length; index++) {
                    //checkboxLocalon.push(keresOBJ.checkBoxok[index])
                    if($(this).val() == keresOBJ.checkBoxok[index]){
                        $(this).prop( "checked", true );
                    }
                }
            });
        }
    }
}
