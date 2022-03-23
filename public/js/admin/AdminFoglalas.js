class AdminFoglalas {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;

        this.azonosito = this.elem.find(".azonosito");
        this.alvazszam = this.elem.find(".alvazszam");
        this.felhasznalo = this.elem.find(".felhasznalo");
        this.fogIdo = this.elem.find(".fogIdo");
        this.elvitel = this.elem.find(".elvitel");
        this.visszahozatal = this.elem.find(".visszahozatal");
        this.ervenyesseg = this.elem.find(".ervenyesseg");
        this.kedvezmeny = this.elem.find(".kedvezmeny");
        this.allapot = this.elem.find(".allapot");
        this.reszletekGomb = this.elem.find(".fReszletek");
        this.zarva = true;
       


        this.reszletekGomb.on("click", () => {
            $(".reszletek").css("display", "none");
            this.reszletekTrigger();
        });
        /*  this.telephely=this.elem.find(".telephely"); */

        this.setAdat(adat);
    }

    setAdat(adat) {
        $(".reszletek").css("display", "none");
        this.azonosito.text(adat.fogl_azonosito);
        this.alvazszam.text(adat.alvazSzam);
        this.felhasznalo.text(adat.felhasznalo.felhasznalonev);
        this.fogIdo.text(adat.fogl_kelt);
        
        this.elvitel.text(adat.elvitel);
        this.visszahozatal.text(adat.visszahozatal);
        this.ervenyesseg.text(adat.ervenyessegi_ido);
        this.kedvezmeny.text(adat.kedvezmeny);
        this.allapot.text(adat.allapot);
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
