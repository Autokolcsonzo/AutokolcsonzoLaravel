$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const felhasznalok = [];
    let url = "http://localhost:8000/";

    let apiVegpont = url + "api" + "/" + "felhasznalo";

    const szuloElem = $(".felhasznalokAdmin");
    const sablonElem = $(".felhasznalo");
    szuloElem.empty();

    myAjax.getAdat(apiVegpont, felhasznalok, Megjelenit);

    function Megjelenit() {
        szuloElem.show();
        $(".felhasznalokAdmin").append("<div class='felhFejlec'></div>");
        $(".felhFejlec").append(
            "<h2>Jogkör</h2><h2>Felhasználónev</h2><h2>E-mail</h2><h2>Reg. dátum</h2><h2></h2><h2></h2><h2></h2>"
        );

        felhasznalok.forEach(function (elem) {
            

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
