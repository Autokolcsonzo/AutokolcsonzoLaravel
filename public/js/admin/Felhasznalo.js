class Felhasznalo {
  constructor(elem, adat) {


    this.adat = adat;
 this.elem=elem;
    this.jogkor = this.elem.find(".jogkor");
    this.felhasznalonev = this.elem.find(".felhnev");
    this.e_mail = this.elem.find(".email");
    this.reg_datum = this.elem.find(".regDatum");
    this.reszletek_gomb=this.elem.find(".fReszletek");
    this.reszletek = this.elem.find(".reszletek td p");
    $(this.reszletek_gomb).on('click',()=>{
      this.ReszletekMegjelenes();
      console.log($('.reszletek'))  
    });


    this.setAdat(adat);

    
  }
  setAdat(adat) {
    this.jogkor.text(adat.jogkor);
    this.felhasznalonev.text(adat.felhasznalonev);
    this.e_mail.text(adat.e_mail);
    this.reg_datum.text(adat.reg_datum);
    this.reszletek.text("Ez egy szar")
  }

 ReszletekMegjelenes(e) {
  e.preventDefault();
        
  var targetrow = $(this).closest('tr').next('.reszletek');
  targetrow.show().find('.div').slideToggle('slow', function(){
      console.log("kattint");
    if (!$(this).is(':visible')) {
      targetrow.hide();
    }
  });
       
     
    }
 
}
