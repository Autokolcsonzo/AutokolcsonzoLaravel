$(function () {

ModositMegjelenes();

});

 


    //Módosítás gombra kattintva megjelenjen, majd eltűnjön a módosítás felület
    function ModositMegjelenes() {
        $("#fadatokMod").click(function () {
            if ($("#fadatokMod").hasClass("clicked-once")) {
                $(".felhasznaloiModositas").slideUp(1000);
                $("#fadatokMod").removeClass("clicked-once");
            } else {
                $("#fadatokMod").addClass("clicked-once");
                $(".felhasznaloiModositas").slideDown(1000);
            }
        });
    }

