class Auto {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;
        this.statusz = this.elem.find(".statusz");
        this.rendszam = this.elem.find(".rendszam");
        this.megnevezes = this.elem.find(".megnevezes");
        this.telephely = this.elem.find(".varos");

        this.ir_szam = this.elem.find(".iranyitoszam");
        this.megye = this.elem.find(".megye");
        this.utca = this.elem.find(".utca");
        this.szul_ido = this.elem.find(".szul_ido");
        this.reszletekGomb = this.elem.find(".fReszletek");
        this.zarva = true;

        this.reszletekGomb.on("click", () => {
            this.reszletekTrigger();
        });

        this.setAdat(this.adat);
    }

    setAdat(adat) {
        $(".reszletek").css("display", "none");
        this.adat = adat;
        this.statusz.text(adat.statusz);
        this.rendszam.text(adat.rendszam);
        this.megnevezes.text(adat.marka);
        this.telephely.text(adat.varos);
        // this.felhasznalokSzamaSablon.text(adat.felhasznalokSzamaSablon);
        this.ir_szam.text(adat.ir_szam);
        this.megye.text(adat.megye);
        this.utca.text(adat.utca);
        this.szul_ido.text(adat.szul_ido);
    }

    reszletekTrigger() {
        if (this.zarva) {
            $(this.elem.children(".reszletek")).slideDown(500);
            this.zarva = false;
        } else if (!this.zarva) {
            $(this.elem.children(".reszletek")).slideUp(500);
            this.zarva = true;
        }
    }
}

