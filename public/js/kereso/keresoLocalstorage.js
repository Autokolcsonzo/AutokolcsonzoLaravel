$(function(){
    const sablon = $('.kereses');
    const ks = new KeresoLocalStrogare(sablon);
    $('#keresesBtn').on('click', ()=>{
        ks.setAdatToLocalS();
    });
});

class KeresoLocalStrogare {
    constructor(elem) {
        this.elem = elem;
        this.kulcsszo = this.elem.find("#keresoMezo");
        this.telephely = this.elem.find("#Khelyszinek");
        this.elvitelDatuma = this.elem.find("#elvitel");
        this.visszavitelDatuma = this.elem.find("#visszavitel");
        this.elvitelIdo = this.elem.find("#idoEl");
        this.visszaIdo = this.elem.find("#idoVissza");
        this.keresoBtn = this.elem.find("#keresesBtn");
        this.marka = this.elem.find("#marka");
        this.modell = this.elem.find("#modell");
        this.kivitel = this.elem.find("#kivitel");
        this.uzemanyag = this.elem.find("#uzemanyag");
        this.evjaratTol = this.elem.find("#etol");
        this.evjaratIg = this.elem.find("#eig");
        this.arTol = this.elem.find("#min");
        this.arIg = this.elem.find("#max");
    }

    setAdatToLocalS() {
        let checkBoxok = [];
        $('.kersoCheckbox:checkbox:checked').each(function () {
            let sThisVal = (this.checked ? $(this).val() : "");
            checkBoxok.push(sThisVal)
        });
        const keresoLocalSOBJ = {
            checkBoxok:checkBoxok,
            kulcsszo:this.kulcsszo.val(),
            telephely: this.telephely.val(),
            elvitelDatuma:this.elvitelDatuma.val(),
            visszavitelDatuma:this.visszavitelDatuma.val(),
            elvitelIdo:this.elvitelIdo.val(),
            visszaIdo:this.visszaIdo.val(),
            marka: this.marka.val(),
            modell:this.modell.val(),
            kivitel:this.kivitel.val(),
            uzemanyag:this.uzemanyag.val(),
            evjaratTol:this.evjaratTol.val(),
            evjaratIg: this.evjaratIg.val(),
            arTol:this.arTol.val(),
            arIg:this.arIg.val()
        }
        localStorage.setItem('keresoLocalSOBJ', JSON.stringify(keresoLocalSOBJ));
    }
}
