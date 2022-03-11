class Auto {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;
        this.rendszam = this.elem.find(".rendszam");
        this.megnevezes = this.elem.find(".megnevezes");
        this.telephely = this.elem.find(".telephely");

        this.modositGomb = this.elem.children(".autoMod");
        this.torolGomb = this.elem.children(".autoTorles");

        /*  this.modositGomb.on("click", () => {
            this.kattintasTrigger();
        }); */

        this.torolGomb.on("click", () => {
            console.log("törlés");
            this.kattintasTrigger();
        });

        this.setAdat(this.adat);
    }

    setAdat(adat) {
        this.adat = adat;
        /*         this.adat; */
        this.rendszam.text(adat.rendszam);
        this.megnevezes.text(adat.marka);
        this.telephely.text(adat.telephely);
       // this.felhasznalokSzamaSablon.text(adat.felhasznalokSzamaSablon);
    }

    kattintasTrigger() {
        let esemeny = new CustomEvent("torles", { detail: this.adat });
        console.log("kattintás trigger");
        window.dispatchEvent(esemeny);
    }
}

