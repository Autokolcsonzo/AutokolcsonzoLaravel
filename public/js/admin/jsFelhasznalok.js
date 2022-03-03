$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const felhasznalok = [];
    let url = "http://localhost:8000/";

    let apiVegpont = url +"api"+ "/" + "felhasznalo";

    const szuloElem = $(".felhasznalokKiiratasa");
    const sablonElem = $(".felhasznalok");
    szuloElem.empty();

    myAjax.getAdat(apiVegpont, felhasznalok, Megjelenit);

    function Megjelenit() {
        
        szuloElem.show();
       
        felhasznalok.forEach(function (elem) {
            console.log(sablonElem);
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Felhasznalo(ujElem, elem);
        });
        ModositMegjelenes();

    
        sablonElem.hide();
    }





    function ModositMegjelenes() {
      $(".fadatokMod").click(function () {
          if ($(".fadatokMod").hasClass("clicked-once")) {
              $(".felhasznaloiModositas").slideUp(1000);
              $(".fadatokMod").removeClass("clicked-once");
          } else {
              $(".fadatokMod").addClass("clicked-once");
              $(".felhasznaloiModositas").slideDown(1000);
          }
      });
  }
});
