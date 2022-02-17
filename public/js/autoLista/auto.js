class Auto {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;
        this.autoId = this.elem.find(".jarmu-card-foglalas");
        this.kep = this.elem.find(".jarmu-card-kep");
        this.marka = this.elem.find(".jarmu-card-marka");
        this.modell = this.elem.find(".jarmu-card-modell");
        this.kivitel = this.elem.find(".jarmu-card-kivitel");
        /*         this.valto = this.elem.find(".jarmu-card-valto"); */
        this.uzemanyag = this.elem.find(".jarmu-card-uzemanyag");
        this.ar = this.elem.find(".jarmu-card-ar");
        this.hetAr = this.elem.find(".jarmu-card-arHeti");
        this.helyszin = this.elem.find(".jarmu-card-telephely");
        this.foglalas = this.elem.find(".jarmu-card-foglalas");
        this.reszletek = this.elem.find(".jarmu-card-reszletek");
        this.hover = this.elem.find(".jarmu-card");
        /*       this.ajtok = this.elem.find(".jarmu-card-ajtok");
        this.utasok = this.elem.find(".jarmu-card-utasok"); */
        this.szin = this.elem.find(".jarmu-card-szín");
        this.egyeb = this.elem.find(".jarmu-card-extra");

        this.setAdat(this.adat);

        this.reszletek.on("click", () => {
            this.reszletekTrigger();
        });
        this.foglalas.on("click", () => {
            this.foglalasTrigger(this.adat);
        });
        $(this.elem).on(
            {
                mouseenter: () => {
                    $(this.elem.find(".jarmu-card-kep")).css(
                        "transform",
                        "scale(1.2)"
                    );
                },
                mouseleave: () => {
                    $(this.elem.find(".jarmu-card-kep")).css(
                        "transform",
                        "scale(1.0)"
                    );
                },
            },
            this.elem
        );
    }

    setAdat(adat) {
        $(".card-block-3,.card-block-5").css("display", "none");
        this.adat = adat;
        this.autoId.attr("id", adat.autoId);
        this.kep.attr("src", adat.kep);
        this.marka.text(adat.marka);
        this.modell.text(adat.modell);
        this.kivitel.text(adat.kivitel);
        /*      this.valto.text(adat.valto); */
        this.uzemanyag.text(adat.uzemanyag);
        this.ar.text(adat.napiAr);
        this.hetAr.text(adat.napiAr * this.hetiAr());

        this.helyszin.text(adat.helyszin);
        /*         this.ajtok.text(adat.ajtok);
        this.utasok.text(adat.utasok); */
        this.szin.text(adat.szin);
        this.egyeb.text(adat.egyeb);
        this.foglalas.text("Foglalás");
        this.reszletek.text("Részletek");
        this.zarva = true;
        this.nyitva = false;
    }

    reszletekTrigger() {
        if (this.zarva) {
            $(this.elem.children(".card-block-3,.card-block-5")).slideDown(500);
            this.zarva = false;
        } else if (!this.zarva) {
            $(this.elem.children(".card-block-3,.card-block-5")).slideUp(500);
            this.zarva = true;
        }
    }
    foglalasTrigger(adat) {
        this.adat = adat;
        let localFoglalasObj = {
            autoId: adat.autoId,
            kep: adat.kep,
            marka: adat.marka,
            modell: adat.modell,
            kivitel: adat.kivitel,
            ar: adat.ar,
            helyszin: adat.helyszin,
            tolDatum: $("#elvitel").val(),
            tolIdo: $("#idoEl").val(),
            igDatum: $("#visszavitel").val(),
            igIdo: $("#idoVissza").val(),
            vegosszeg: "Null",
        };
        localStorage.setItem("foglalasraObj", JSON.stringify(localFoglalasObj));
        const foglalasAblak = new FoglalasMain();
        foglalasAblak.Main();
    }

    hetiAr() {
        let kedvezmenyek = JSON.parse(localStorage.getItem("kedvezmenyek"));
        let kapottKedvezmeny;
        for (const key in kedvezmenyek) {
            if (key == 7) {
                kapottKedvezmeny = kedvezmenyek[key];
            }
        }
        console.log((100 - kapottKedvezmeny) / 100);
        return ((100 - kapottKedvezmeny) / 100) * 7;
    }
}
