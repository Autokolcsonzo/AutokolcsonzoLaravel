class Felhasznalo {
  constructor(elem, adat) {
    this.adat = adat;
    this.elem = elem;
    this.jogkor = this.elem.find(".jogkor");
    this.felhasznalonev = this.elem.find(".felhnev");
    this.e_mail = this.elem.find(".email");
    this.reg_datum = this.elem.find(".regDatum");
   

    this.setAdat(adat);

    
  }
  setAdat(adat) {
    this.jogkor.text(adat.jogkor);
    this.felhasznalonev.text(adat.felhasznalonev);
    this.e_mail.text(adat.e_mail);
    this.reg_datum.text(adat.reg_datum);

  }
 
}
