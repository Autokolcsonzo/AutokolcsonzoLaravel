$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const felhasznalok = [];
    let url = "http://localhost:8000/api";

    let apiVegpont = url+"/"+"felhasznalo";

    myAjax.getAdat(apiVegpont, felhasznalok, MegjelenitFelhasznalok);

    function MegjelenitFelhasznalok(felhasznalok) {
        const szuloElem = $(".fadatok");
        const sablonElem = $(".fadatokTable");
        szuloElem.empty();
        //console.log(felhasznalok);
        szuloElem.show();
        //console.log(felhasznalok[0].felhasznalo_id);

        felhasznalok.forEach(function (elem) {
            if (elem["felhasznalo_id"] == 1) {
                const ujElem = sablonElem.clone().appendTo(szuloElem);
                const ujTermek = new FelhasznaloProfil(ujElem, elem);
                //console.log(felhasznalok);
            }
        });
        $(".fadatok").append(
            '<input type="button" name="fadatokMod" id="fadatokMod" value="Adatok módosítása" />'
        );
        ModositMegjelenes();

        sablonElem.hide();
    }


    //Módosítás gombra kattintva megjelenjen, majd eltűnjön a módosítás felület
    function ModositMegjelenes() {
        $("#fadatokMod").click(function() {
            if ($('#fadatokMod').hasClass("clicked-once")) {
             
                    $('.felhasznaloiModositas').slideUp(1000);
                    $('#fadatokMod').removeClass("clicked-once");
            }
            else {
                    $('#fadatokMod').addClass("clicked-once");
                    $('.felhasznaloiModositas').slideDown(1000);
            }
        });
        $("#fkepMod").click(function() {
            if ($('#fkepMod').hasClass("clicked-once")) {
                
                    $('#profkepFel').slideUp(1000);
                    $('#fkepMod').removeClass("clicked-once");
            }
            else {
                    $('#fkepMod').addClass("clicked-once");
                    $('#profkepFel').slideDown(1000);
            }
        });
      
     
     
    }
});
