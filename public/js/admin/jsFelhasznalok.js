$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const felhasznalok = [];
    let url = "http://localhost:8000/";

    let apiVegpont = url + "api/felhasznaloadmin";

    const szuloElem = $(".felhasznalokAdmin");
    const sablonElem = $(".felhasznalo");
    szuloElem.empty();
    myAjax.getAdat(apiVegpont, felhasznalok, Megjelenit1);

    Jogkorokszerint();

    $(window).on("torol", (event) => {
        const id = event.detail.id;

        myAjax.deleteAdat(apiVegpont, id);

     
    });

    function Jogkorokszerint() {
        $("#jogkorKategoriak").on("change", function () {
            if ($("#jogkorKategoriak").val() === "osszes") {
                szuloElem.empty();

                myAjax.getAdat(apiVegpont, felhasznalok, Megjelenit1);
            }

            if ($("#jogkorKategoriak").val() === "felhasznaloJog") {
                szuloElem.empty();
                myAjax.getAdat(apiVegpont, felhasznalok, Megjelenit2);
            }
            if ($("#jogkorKategoriak").val() === "adminJog") {
                szuloElem.empty();
                myAjax.getAdat(apiVegpont, felhasznalok, Megjelenit3);
            }
        });
    }

    function Megjelenit1() {
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
    }

    function Megjelenit2() {
        szuloElem.show();
        $(".felhasznalokAdmin").append("<div class='felhFejlec'></div>");
        $(".felhFejlec").append(
            "<h2>Jogkör</h2><h2>Felhasználónev</h2><h2>E-mail</h2><h2>Reg. dátum</h2><h2></h2><h2></h2><h2></h2>"
        );

        felhasznalok.forEach(function (elem) {
            if (elem["jogkor"] === 1) {
                const ujElem = sablonElem.clone().appendTo(szuloElem);
                const ujTermek = new Felhasznalo(ujElem, elem);
            }
        });
        ModositMegjelenes();
    }

    function Megjelenit3() {
        szuloElem.show();
        $(".felhasznalokAdmin").append("<div class='felhFejlec'></div>");
        $(".felhFejlec").append(
            "<h2>Jogkör</h2><h2>Felhasználónev</h2><h2>E-mail</h2><h2>Reg. dátum</h2><h2></h2><h2></h2><h2></h2>"
        );

        felhasznalok.forEach(function (elem) {
            if (elem["jogkor"] === 2) {
                const ujElem = sablonElem.clone().appendTo(szuloElem);
                const ujTermek = new Felhasznalo(ujElem, elem);
            }
        });
        ModositMegjelenes();
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
