


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
            this.telephely.val(keresOBJ.telephely);
            this.telephely.val(keresOBJ.telephely);
            this.elvitelDatuma.val(keresOBJ.elvitelDatuma);
            this.elvitelDatuma.attr("max", keresOBJ.visszavitelDatuma);
            this.visszavitelDatuma.val(keresOBJ.visszavitelDatuma);
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
