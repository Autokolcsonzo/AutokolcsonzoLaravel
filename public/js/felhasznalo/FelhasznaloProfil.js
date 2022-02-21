class FelhasznaloProfil {
  constructor(elem, adat) {
    this.adat = adat;
    this.elem = elem;
    this.fnev = this.elem.find("#fnev");
    this.jelszo = this.elem.find("#jelszo");
    this.vnev = this.elem.find("#vnev");
    this.knev = this.elem.find("#knev");
    this.szido = this.elem.find("#szido");
    this.irszam = this.elem.find("#irszam");
    this.megye = this.elem.find("#megye");
    this.varos = this.elem.find("#varos");
    this.utca = this.elem.find("#utca");
    this.hszam = this.elem.find("#hszam");
    this.email = this.elem.find("#email");
    this.tszam = this.elem.find("#tszam");
    this.profkep=$("#profKep");
    
    
    this.setAdat(adat);

  }

  setAdat(adat) {
    //console.log(adat);
    this.fnev.text(adat.felhasznalonev);
    this.jelszo.text(adat.jelszo);
    this.vnev.text(adat.vezeteknev);
    this.knev.text(adat.keresztnev);
    this.szido.text(adat.szul_ido);
    this.irszam.text(adat.ir_szam);
    this.megye.text(adat.megye);
    this.varos.text(adat.varos);
    this.utca.text(adat.utca);
    this.hszam.text(adat.hazszam);
    this.email.text(adat.e_mail);
    this.tszam.text(adat.tel_szam);
    this.profkep.attr("src",adat.profilkep);
    
  
   
  
   

  }

 


  modositTrigger() {
    let esemeny = new CustomEvent("modosit", { detail: this.adat });

    window.dispatchEvent(esemeny);
  }
}
