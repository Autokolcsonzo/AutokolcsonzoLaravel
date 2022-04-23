class Felhasznalo {
    constructor(elem, adat) {
        this.adat = adat;
        this.elem = elem;

        this.jogkor = this.elem.find(".jogkor");
        this.felhasznalonev = this.elem.find(".felhnev");
        this.e_mail = this.elem.find(".email");
        this.reg_datum = this.elem.find(".regDatum");
        this.tel_szam = this.elem.find(".telszam");
        this.hazszam = this.elem.find(".hazszam");
        this.ir_szam = this.elem.find(".iranyitoszam");
        this.megye = this.elem.find(".megye");
        this.varos = this.elem.find(".varos");
        this.utca = this.elem.find(".utca");
        this.szul_ido = this.elem.find(".szul_ido");
        this.reszletekGomb = this.elem.find(".fReszletek");
        this.torolGomb = this.elem.find(".torles");
        this.felhasznaloModosit = this.elem.find(".fadatokMod");
        this.adatotMentGomb = this.elem.find(".adatotMent");
        this.ujAdminGomb = this.elem.find(".ujAdminFelvetel");
        this.opcio = this.elem.find(".telep");
        this.zarva = true;

        this.reszletekGomb.on("click", () => {
            this.reszletekTrigger();
        });

        this.felhasznaloModosit.on("click", () => {
            this.modositFormtrigger(this.adat);
        });

        this.adatotMentGomb.on("click", () => {
            this.kattintasTrigger("adatmentes");
        });

        this.torolGomb.on("click", () => {
            this.kattintasTrigger("torol");
        });

        this.ujAdminGomb.on("click", () => {
            this.kattintasTrigger("felvesz");
        });

        this.setAdat(adat);
    }
    setAdat(adat) {
        $(".reszletek").css("display", "none");
        this.adat = adat;
        this.jogkor.text(adat.jogkor);
        this.felhasznalonev.text(adat.felhasznalonev);
        this.e_mail.text(adat.e_mail);
        this.reg_datum.text(adat.reg_datum);
        this.tel_szam.text(adat.tel_szam);
        this.hazszam.text(adat.hazszam);
        this.ir_szam.text(adat.ir_szam);
        this.megye.text(adat.megye);
        this.varos.text(adat.varos);
        this.utca.text(adat.utca);
        this.szul_ido.text(adat.szul_ido);
        this.torolGomb.attr("data", adat.felhasznalo_id);
        this.id = this.adat.felhasznalo_id;
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

    kattintasTrigger(gomb) {
        let esemeny = new CustomEvent(gomb, {
            detail: this.adat,
        });
        window.dispatchEvent(esemeny);
    }

    modositFormtrigger(adat) {
        $("#ifnev").val(adat.felhasznalonev);
        $("#ivnev").val(adat.vezeteknev);
        $("#iknev").val(adat.keresztnev);
        $("#iszdatum").val(adat.szul_ido);
        $("#iiranyitoszam").val(adat.ir_szam);
        $("#imegye").val(adat.megye);
        $("#ivaros").val(adat.varos);
        $("#iutca").val(adat.utca);
        $("#ihazszam").val(adat.hazszam);
        $("#iemail").val(adat.e_mail);
        $("#itelszam").val(adat.tel_szam);
    }
}
