class Felhasznalo {
  constructor(elem, adat) {
    this.adat = adat;
    this.elem = elem;
    this.jogkor = this.elem.children(".jogkor");
    this.felhasznalonev = this.elem.children(".felhnev");
    this.e_mail = this.elem.children(".email");
    this.reg_datum = this.elem.children(".regDatum");
   

    this.setAdat(adat);

    
  }
  setAdat(adat) {
    this.jogkor.text(adat.jogkor);
    this.felhasznalonev.text(adat.felhasznalonev);
    this.e_mail.text(adat.e_mail);
    this.reg_datum.text(adat.reg_datum);

  }
 
}
