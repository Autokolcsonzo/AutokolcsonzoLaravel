$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const foglalasok = [];
    const felhasznalok = [];
    let url = "http://localhost:8000/";
    let foglalasFelhasznaloApi=url+"api/foglalas/expand=felhasznalo";
    let userApiVegpont = url + "api" + "/" + "felhasznalo";
    let foglalasApiVegpont = url + "api" + "/" + "foglalas";
    const szuloElem = $(".foglalasAdmin");
    const sablonElem = $(".foglalas");
    szuloElem.empty();

    myAjax.getAdat(foglalasFelhasznaloApi, foglalasok, FoglalasMegjelenit);

    function FoglalasMegjelenit() {
        szuloElem.show();
        $(".foglalasAdmin").append("<div class='fogFejlec'></div>");
        $(".fogFejlec").append(
            "<h2>Azonosító</h2><h2>Alvázszám</h2><h2>Felhasználó</h2><h2>Foglalás ideje</h2><h2></h2><h2></h2><h2></h2>"
        );
        foglalasok.forEach(function (elem) {
            let adat = sablonElem.clone().appendTo(szuloElem);
            const obj = new AdminFoglalas(adat, elem);
        });

        ModositMegjelenes();
        sablonElem.hide();
    }

    function ModositMegjelenes() {
        $(".fadatokMod").click(function () {
            if ($(".fadatokMod").hasClass("clicked-once")) {
                $(".foglalasModositas").slideUp(1000);
                $(".fadatokMod").removeClass("clicked-once");
            } else {
                $(".fadatokMod").addClass("clicked-once");
                $(".foglalasModositas").slideDown(1000);
            }
        });
    }
});
