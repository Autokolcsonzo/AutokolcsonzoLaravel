class Auto {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;
        this.kep = this.elem.find(".kep");
        this.marka = this.elem.find(".marka");
        this.modell = this.elem.find(".modell");
        this.napiAr = this.elem.find(".napiAr");
        this.kivitel = this.elem.find(".kivitel");
        this.uzemanyag = this.elem.find(".uzemanyag");
        this.evjarat = this.elem.find(".evjarat");
        this.teljesitmeny = this.elem.find(".teljesitmeny");
        this.zarva = true;

        this.setAdat(this.adat);
    }

    setAdat(adat) {
        $(".reszletek").css("display", "none");
        this.adat = adat;
        this.kep.text(adat.kep);
        this.marka.text(adat.marka);
        this.modell.text(adat.modell);
        this.napiAr.text(adat.napiAr);
        // this.felhasznalokSzamaSablon.text(adat.felhasznalokSzamaSablon);
        this.kivitel.text(adat.kivitel);
        this.uzemanyag.text(adat.uzemanyag);
        this.evjarat.text(adat.evjarat);
        this.teljesitmeny.text(adat.teljesitmeny);
    }
}
