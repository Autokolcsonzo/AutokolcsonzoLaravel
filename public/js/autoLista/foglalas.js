class FoglalasMain {
    constructor() {}
    Main() {
        $(".modal-content").css("display", "grid");
        $("#myModal").css("display", "block");
        $("#Felhasznaloi-feltetelek").css("display", "none");
        let foglalasraObj = JSON.parse(localStorage.getItem("foglalasraObj"));
        const szuloElem = $("#myModal");
        const sablonElem = $(".modal-content");
        sablonElem.remove();
        const FoglalasEmbed = sablonElem.clone().appendTo(szuloElem);
        const foglalasHandeler = new FoglalasFeltoltes(FoglalasEmbed,foglalasraObj);
        sablonElem.hide();
    }
}

class FoglalasFeltoltes {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;
        this.autoId = this.elem.find("#autoId");
        this.napiAr = this.elem.find("#valasztott-jarmu-napiAr");
        this.helyszin = this.elem.find("#valasztott-jarmu-helyszin");
        this.igDatum = this.elem.find("#foglalas-igD");
        this.igIdo = this.elem.find("#foglalas-igI");
        this.kep = this.elem.find("#valasztott-jarmu-kep");
        this.kivitel = this.elem.find("#valasztott-jarmu-kivitel");
        this.marka = this.elem.find("#valasztott-jarmu-marka");
        this.modell = this.elem.find("#valasztott-jarmu-modell");
        this.tolDatum = this.elem.find("#foglalas-tolD");
        this.tolIdo = this.elem.find("#foglalas-tolI");
        this.vegosszeg = this.elem.find("#valasztott-jarmu-vegosszeg");
        this.kedvezmeny = this.elem.find("#valasztott-jarmu-kedvezmeny");
        this.foglalas = this.elem.find("#lefoglalas");
        this.bezaras = this.elem.find("#foglalas-bezaras");
        this.felhasznaloiF = this.elem.find("#Felhasznaloi-feltetelek-btn");
        this.zarva = true;
        //this.idopont = new DatumIdo();

        this.setFoglalas(this.adat);

        this.setMinMaxDatum();
        this.setMinMaxDatumValue();
        this.setMinMaxDatumOnClick();
        this.setMinFogIdo();
        this.VegosszegKalkulalasa(this.adat);

        this.bezaras.on("click", () => {
            this.bezarasTrigger();
        });
        this.felhasznaloiF.on("click", () => {
            this.felhasznaloiFTrigger();
        });
        this.foglalas.on("click", () => {
            this.foglalasElkuldese();
        });

        $("#foglalas-tolD,#foglalas-igD").on("change", () => {
            this.setMinMaxDatumOnClick();
            this.setMinFogIdo();
            this.setFoglalas(this.adat);
            this.VegosszegKalkulalasa(this.adat);
            //this.handelerMinIdoUtkozes();
        });
         $("#foglalas-tolI,#foglalas-igI").on("change", () => {
            //this.setMinMaxDatumOnClick();
            //this.setMinFogIdo();
            this.handelerMinIdoUtkozes();
        });

        /*
    this.igDatum.on("change", () => {
      adat.igDatum = this.igDatum.val();
      this.setFoglalas(this.adat);
    });
    this.tolDatum.on("change", () => {
      adat.tolDatum = this.tolDatum.val();
      this.setFoglalas(this.adat);
    });
    $(` #foglalas-tolD,
        #foglalas-igD`).on("change", () => {
          console.log("datum setterek a keresőben")
                this.idopont.setMinDate();
                $("#foglalas-igD").attr("min", $("#foglalas-tolD").val());
                $("#foglalas-tolD").attr("max", $("#foglalas-igD").val());
                $("#foglalas-igD").attr("value", "");
                this.setFoglalas(this.adat)
        });*/
    }

    //Figyelem! Nem klien oldalon számoljuk a végösszeget csupán megjelenítjük a felhasználó számára
    //Foglalás végösszegének validálása és véglegesítese szerver oldalon történik

    setFoglalas(adat) {
        /*const apiVegpont = "http://localhost:3000/kedvezmenyek";
    const kedvezmenyek = new KedvezmenyAjax();
    kedvezmenyek.getAdat(apiVegpont);*/

        this.adat = adat;
        this.autoId.val(adat.autoId);
        this.napiAr.text(adat.napiAr);
        this.helyszin.text(adat.helyszin);
        //this.igDatum.val(adat.igDatum);
        //this.igIdo.val(adat.igIdo);
        this.kep.attr("src", adat.kep);
        this.kivitel.text(adat.kivitel);
        this.marka.text(adat.marka);
        this.modell.text(adat.modell);
        //this.tolDatum.val(adat.tolDatum);
        //this.tolIdo.val(adat.tolIdo);
        this.VegosszegKalkulalasa(adat);
        //this.idopont.setMinDate();
        //$("#foglalas-igD").attr("min", $("#foglalas-tolD").val());
        //$("#foglalas-tolD").attr("max", $("#foglalas-igD").val());
        //$("#foglalas-igD").attr("value", "");
    }

    felhasznaloiFTrigger() {
        if (this.zarva) {
            $(this.elem.children("#Felhasznaloi-feltetelek")).slideDown(300);
            this.zarva = false;
        } else if (!this.zarva) {
            $(this.elem.children("#Felhasznaloi-feltetelek")).slideUp(300);
            this.zarva = true;
        }
    }

    VegosszegKalkulalasa(adat) {
        let tol = this.tolDatum.val();
        let ig = this.igDatum.val();
        console.log(tol);
        console.log($("#foglalas-tolD").val());
        const kedvezmenyek = JSON.parse(localStorage.getItem("kedvezmenyek"));
        const kulonbsegInMs = new Date(ig) - new Date(tol);
        const kulonbsegNapokban = kulonbsegInMs / (1000 * 60 * 60 * 24) + 1;

        let kapottKedvezmeny;
        for (const key in kedvezmenyek) {
            if (kulonbsegNapokban >= key) {
                kapottKedvezmeny = kedvezmenyek[key];
            }
        }
        const kedvFloat = (100 - kapottKedvezmeny) / 100;
        console.log(kedvFloat);
        let vegosszeg = adat.napiAr * kulonbsegNapokban * kedvFloat;

        console.log(
            "ennyi napra kapott : " +
                kulonbsegNapokban +
                " | kedvezmeny : " +
                kapottKedvezmeny +
                " | Fizetendő : " +
                vegosszeg +
                " -" +
                kapottKedvezmeny +
                "% al"
        );
        if (isNaN(vegosszeg)) {
            vegosszeg = 0;
        }
        this.vegosszeg.text(vegosszeg);
        this.kedvezmeny.text(kapottKedvezmeny);
    }

    bezarasTrigger() {
        $(".modal-content").css("display", "none");
        $("#myModal").css("display", "none");
    }

    setMinMaxDatum() {
        $("#foglalas-tolD").attr(
            "min",
            this.getMinFogElvitelDatum().MinDatumString
        );
        $("#foglalas-igD").attr(
            "min",
            this.getMinFogElvitelDatum().MinDatumString
        );
        $("#foglalas-tolD").attr("max", $("#foglalas-igD").val());
    }
    setMinMaxDatumOnClick() {
        $("#foglalas-igD").attr("min", $("#foglalas-tolD").val());
        $("#foglalas-tolD").attr("max", $("#foglalas-igD").val());
    }
    setMinMaxDatumValue() {
        $("#foglalas-tolD").val($("#elvitel").val());
        $("#foglalas-igD").val($("#visszavitel").val());
    }
    setMinFogIdo() {
        this.foglalasClear();

        let today = new Date();
        let ora = today.getHours();
        let perc = today.getMinutes();
        if (perc < 10) {
            perc = "0" + perc;
        } else if (perc == 0) {
            perc = "00";
        }
        $("#foglalas-tolI,#foglalas-igI").append(
            '<option value="" class="placeholder">óra. perc</option>'
        );
        if (
            $("#foglalas-tolD").val() ==
            this.getMinFogElvitelDatum().MinDatumString
        ) {
            for (let index = ora + 1; index <= 24; index++) {
                if (ora + 1 == index) {
                    $("#foglalas-tolI").append(
                        `<option value="${index + ":" + perc + ":00"}">${
                            index + ":" + perc
                        }</option>`
                    );
                } else if (index == 24) {
                    $("#foglalas-tolI").append(
                        `<option value="00:00:00">${"00:00"}</option>`
                    );
                } else {
                    $("#foglalas-tolI").append(
                        `<option value="${index + ":00:00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        } else {
            for (let index = 1; index <= 24; index++) {
                if (index == 24) {
                    $("#foglalas-tolI").append(
                        `<option value="00:00:00">${"00:00"}</option>`
                    );
                } else {
                    $("#foglalas-tolI").append(
                        `<option value="${index + ":00:00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        }
        if (
            $("#foglalas-igD").val() ==
            this.getMinFogElvitelDatum().MinDatumString
        ) {
            for (let index = ora + 2; index <= 24; index++) {
                if (ora + 2 == index) {
                    $("#foglalas-igI").append(
                        `<option value="${index + ":" + perc + ":00"}">${
                            index + ":" + perc
                        }</option>`
                    );
                } else if (index == 24) {
                    $("#foglalas-igI").append(
                        `<option value="00:00:00">${"00:00"}</option>`
                    );
                } else {
                    $("#foglalas-igI").append(
                        `<option value="${index + ":00:00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        } else {
            for (let index = 1; index <= 24; index++) {
                if (index == 24) {
                    $("#foglalas-igI").append(
                        `<option value="00:00:00">${"00:00"}</option>`
                    );
                } else {
                    $("#foglalas-igI").append(
                        `<option value="${index + ":00:00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        }
    }

    handelerMinIdoUtkozes() {
        if (
            $("#foglalas-tolD").val() == $("#foglalas-igD").val() &&
            $("#foglalas-tolD").val() != this.getMinFogElvitelDatum().MinDatumString
        ) {
            let elvitelOra = parseInt($("#foglalas-tolI").val().split(":"));
            if (isNaN(elvitelOra)) {
                elvitelOra = 0;
            }
            $("#foglalas-igI").empty();
            for (let index = elvitelOra + 1; index <= 24; index++) {
                if (index == 24) {
                    $("#foglalas-igI").append(
                        `<option value="00:00:00"}">${"00:00"}</option>`
                    );
                } else {
                    $("#foglalas-igI").append(
                        `<option value="${index + ":00:00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        }
    }

    getMinFogElvitelDatum() {
        this.honapSkip = 1;
        this.aktDatum = new Date();
        this.aktNap = this.aktDatum.getDate();
        this.aktHo = this.aktDatum.getMonth() + this.honapSkip;
        this.aktEv = this.aktDatum.getFullYear();
        this.aktDatumInt = 0;
        let ev = this.aktEv;
        let ho = this.aktHo;
        let nap = this.aktNap;
        if (ho < 10) {
            ho = "0" + ho;
        }
        if (nap < 10) {
            nap = "0" + nap;
        }
        return {
            MinDatumString: ev + "-" + ho + "-" + nap,
            MinDatumIntager: parseInt(ev + ho + nap),
        };
    }
    foglalasClear() {
        $("#foglalas-tolI,#foglalas-igI").empty();
    }
    foglalasElkuldese() {
        const token = $('meta[name="csrf-token"]').attr("content");
        let apiVegpont = "http://127.0.0.1:8000/api/foglalas";

        /*let foglalas = {
            tolD:$("#foglalas-tolD").val(),
            tolI:$("#foglalas-tolI").val(),
            igD:$("#foglalas-igD").val(),
            igI:$("#foglalas-igI").val(),
            alvazSzam:this.foglalas.data("id"),
            felhasznaloID:$("#custId").val()
        };*/
        //console.log(foglalas);
        //apiVegpont = apiVegpont;
        //const autoA = new AutoAjax(token);
        //autoA.postAdat(apiVegpont ,foglalas);

        
    }
}

class KedvezmenyAjax {
    constructor(apiVegpont) {
        this.apiVegpont = apiVegpont;
    }
    getAdat(apiVegpont) {
        console.log("kedvezmeny mentve");
        console.log(apiVegpont);
        let kedvezmenyek = {};
        $.ajax({
            url: apiVegpont,
            type: "GET",
            success: function (result) {
                let txt = "{"
                result.forEach((value, index) => {
                   index++;
                    if(index == result.length){
                        txt += '"'+value.naptol+'"'+":"+value.szazalek+"";
                    }else{
                        txt += '"'+value.naptol+'"'+":"+value.szazalek+",";
                    }
                   
                });
                txt+="}";
                kedvezmenyek = JSON.parse(txt);
                console.log(txt)
                localStorage.setItem(
                    "kedvezmenyek",
                    JSON.stringify(kedvezmenyek)
                );
            },
            
        });
        console.log(kedvezmenyek)
    }
}
