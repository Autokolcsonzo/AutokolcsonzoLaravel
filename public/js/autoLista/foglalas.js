

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
    const ujElem = sablonElem.clone().appendTo(szuloElem);
    const ujTermek = new FoglalasFeltoltes(ujElem, foglalasraObj);
    sablonElem.hide();
  }
}

class FoglalasFeltoltes {
  constructor(elem, adat) {
    this.elem = elem;
    this.adat = adat;
    this.autoId = this.elem.find("#lefoglalas");
    this.ar = this.elem.find("#valasztott-jarmu-napiAr");
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
    this.setFoglalas(this.adat);

    this.felhasznaloiF.on("click", () => {
      this.felhasznaloiFTrigger();
    });
    this.bezaras.on("click", () => {
      this.bezarasTrigger();
    });
    this.igDatum.on("change", () => {
      adat.igDatum = this.igDatum.val();
      this.setFoglalas(this.adat);
    });
    this.tolDatum.on("change", () => {
      adat.tolDatum = this.tolDatum.val();
      this.setFoglalas(this.adat);
    });
  }

  //Figyelem! Nem klien oldalon számoljuk a végösszeget csupán megjelenítjük a felhasználó számára
  //Foglalás végösszegének validálása és véglegesítese szerver oldalon történik

  setFoglalas(adat) {
    const apiVegpont = "http://localhost:3000/kedvezmenyek";
    const kedvezmenyek = new KedvezmenyAjax();
    kedvezmenyek.getAdat(apiVegpont);

    this.adat = adat;
    this.autoId.attr("data", adat.autoId);
    this.ar.text(adat.ar);
    this.helyszin.text(adat.helyszin);
    this.igDatum.val(adat.igDatum);
    this.igIdo.val(adat.igIdo);
    this.kep.attr("src", adat.kep);
    this.kivitel.text(adat.kivitel);
    this.marka.text(adat.marka);
    this.modell.text(adat.modell);
    this.tolDatum.val(adat.tolDatum);
    this.tolIdo.val(adat.tolIdo);
    this.VegosszegKalkulalasa(adat);
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
    const vegosszeg = adat.ar * kulonbsegNapokban * kedvFloat;

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
    this.vegosszeg.text(vegosszeg);
    this.kedvezmeny.text(kapottKedvezmeny);
  }
  bezarasTrigger() {
    $(".modal-content").css("display", "none");
    $("#myModal").css("display", "none");
  }
}

class KedvezmenyAjax {
  constructor(apiVegpont) {
    this.apiVegpont = apiVegpont;
  }
  getAdat(apiVegpont) {
    console.log("kedvezmeny mentve");
    let kedvezmenyek = {};
    $.ajax({
      url: apiVegpont,
      type: "GET",
      success: function (result) {
        result.forEach((value) => {
          kedvezmenyek = value;
        });
        localStorage.setItem("kedvezmenyek", JSON.stringify(kedvezmenyek));
      },
    });
  }
}
