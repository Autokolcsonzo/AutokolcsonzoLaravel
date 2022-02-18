class Auto {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;
        this.rendszam = this.elem.find(".rendszam");
        this.megnevezes = this.elem.find(".megnevezes");
        this.telephely = this.elem.find(".telephely");

        this.setAdat(this.adat);

        /*   this.reszletek.on("click", () => {
            this.reszletekTrigger();
        });

        this.foglalas.on("click", () => {
            this.foglalasTrigger(this.adat);
        }); */
    }

    setAdat(adat) {
        this.adat = adat;
        this.adat;
        this.rendszam.text(adat.rendszam);
        this.megnevezes.text(adat.marka);
        this.telephely.text(adat.telephely);
    }
}
