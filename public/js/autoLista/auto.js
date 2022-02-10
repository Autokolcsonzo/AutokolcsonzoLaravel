class Auto {
  constructor(elem, adat) {
    this.elem = elem;
    this.adat = adat;
    this.autoId = this.elem.find(".jarmu-card-foglalas");
    this.kep = this.elem.find(".jarmu-card-kep");
    this.marka = this.elem.find(".jarmu-card-marka");
    this.modell = this.elem.find(".jarmu-card-tipus");
    this.kivitel = this.elem.find(".jarmu-card-kivitel");
    this.valto = this.elem.find(".jarmu-card-valto");
    this.uzemanyag = this.elem.find(".jarmu-card-uzemanyag");
    this.kategoria = this.elem.find(".jarmu-card-kategoria");
    this.ar = this.elem.find(".jarmu-card-ar");
    this.hetAr = this.elem.find(".jarmu-card-arHeti");
    this.helyszin = this.elem.find(".jarmu-card-telephely");
    this.foglalas = this.elem.find(".jarmu-card-foglalas");
    this.reszletek = this.elem.find(".jarmu-card-reszletek");
    this.hover = this.elem.find(".jarmu-card");
    this.ajtok = this.elem.find(".jarmu-card-ajtok");
    this.utasok = this.elem.find(".jarmu-card-utasok");
    this.szin = this.elem.find(".jarmu-card-szín");
    this.egyeb = this.elem.find(".jarmu-card-extra");

    this.setAdat(this.adat);

    this.reszletek.on("click", () => {
      this.reszletekTrigger();
    });
    this.foglalas.on("click", () => {
      this.foglalasTrigger();
    });
    $(this.elem).on({
      mouseenter: ()=> {
        $(this.elem.find(".jarmu-card-kep")).css("transform", "scale(1.2)");
      },
      mouseleave: ()=>  {
        $(this.elem.find(".jarmu-card-kep")).css("transform", "scale(1.0)");
      }
  }, this.elem);
  }

  setAdat(adat) {
    $(".card-block-3,.card-block-5").css("display", "none");
    this.adat = adat;
    this.autoId.attr("id", adat.autoId);
    this.kep.attr("src", adat.kep);
    this.marka.text(adat.marka);
    this.modell.text(adat.modell);
    this.kivitel.text(adat.kivitel);
    this.valto.text(adat.valto);
    this.uzemanyag.text(adat.uzemanyag);
    this.kategoria.text(adat.kategoria);
    this.ar.text(adat.ar);
    this.hetAr.text(adat.hetAr);
    this.helyszin.text(adat.helyszin);
    this.ajtok.text(adat.ajtok);
    this.utasok.text(adat.utasok);
    this.szin.text(adat.szin);
    this.egyeb.text(adat.egyeb);
    this.foglalas.text("Foglalás");
    this.reszletek.text("Részletek");
    this.zarva = true;
  }

  reszletekTrigger() {
    if (this.zarva) {
      $(this.elem.children(".card-block-3,.card-block-5")).slideDown(500);
      this.zarva = false;
    }else if(!this.zarva){
      $(this.elem.children(".card-block-3,.card-block-5")).slideUp(500);
      this.zarva = true;
    }
  }
  foglalasTrigger(){
    alert("foglalás oldal megnyitása.");
  }
}
