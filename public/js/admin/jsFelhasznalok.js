$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const felhasznalok = [];
    const telephelyek = [];

    let felhasznaloKereses = "/keres?felhasznalonev_like=";

    let url = "http://localhost:8000/";

    let apiVegpont = url + "api/felhasznaloadmin";

    let telephelyVegp = url + "api/telephely";

    const szuloElem = $(".felhasznalokAdmin");
    const sablonElem = $(".felhasznalo");

    szuloElem.empty();
    myAjax.getAdat(apiVegpont, felhasznalok, Megjelenit1);

    myAjax.getAdat(telephelyVegp, telephelyek, telephelyFeltolt);

    Jogkorokszerint();

    $("#fkereses").on("keyup", function () {
        szuloElem.empty();
        let ertek = $(this).val();
        console.log(ertek);
        myAjax.getAdat(
            apiVegpont + felhasznaloKereses + ertek,
            felhasznalok,
            Megjelenit1
        );
    });

    let id = event.detail.felhasznalo_id;
    console.log(id);

    $(window).on("torol", (event) => {
        let id = event.detail.felhasznalo_id;

        myAjax.deleteAdat(apiVegpont, id);
    });

    $(window).on("adatmentes", (event) => {
        event.preventDefault();

        let felhasznalonev = $("#ifnev").val();
        console.log("kattint");
        let vezeteknev = $("#ivnev").val();
        let keresztnev = $("#iknev").val();
        let szul_ido = $("#iszdatum").val();
        let ir_szam = $("#iiranyitoszam").val();
        let megye = $("#imegye").val();
        let varos = $("#ivaros").val();
        let utca = $("#iutca").val();
        let hazszam = $("#ihazszam").val();
        let e_mail = $("#iemail").val();
        let tel_szam = $("#itelszam").val();
        let ujAdat = {
            felhasznalonev: felhasznalonev,
            vezeteknev: vezeteknev,
            keresztnev: keresztnev,
            szul_ido: szul_ido,
            ir_szam: ir_szam,
            megye: megye,
            varos: varos,
            utca: utca,
            hazszam: hazszam,
            e_mail: e_mail,
            tel_szam: tel_szam,
        };
        ajax.putAdat(apiVegpont, id, ujAdat);
        location.reload();
    });

    $(window).on("felvesz", (event) => {
        event.preventDefault();

        let felhasznalonev = $("#afnev").val();
        let vezeteknev = $("#avnev").val();
        let keresztnev = $("#aknev").val();
        let szul_ido = $("#aszdatum").val();
        let ir_szam = $("#airanyitoszam").val();
        let megye = $("#amegye").val();
        let varos = $("#avaros").val();
        let utca = $("#autca").val();
        let hazszam = $("aihazszam").val();
        let e_mail = $("#aemail").val();
        let tel_szam = $("#atelszam").val();
        let jelszo = $("#jelszo").val();
        let telephely = $("#atelephely").children("option:selected").val();

        let ujAdat = {
            felhasznalonev: felhasznalonev,
            vezeteknev: vezeteknev,
            keresztnev: keresztnev,
            szul_ido: szul_ido,
            ir_szam: ir_szam,
            megye: megye,
            varos: varos,
            utca: utca,
            hazszam: hazszam,
            e_mail: e_mail,
            tel_szam: tel_szam,
            jelszo: jelszo,
            telephely: telephely,
        };
        ajax.postAdat(apiVegpont, ujAdat);
    });

    function telephelyFeltolt(telepek) {
        let option = "";
        telepek.forEach(function (elem) {
            option =
                "<option value='" +
                elem.telephely_id +
                "'>" +
                elem.varos +
                "</option>";
            $("#atelephely").append(option);
        });
    }

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

        FormMegjelenes();
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
        FormMegjelenes();
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
        FormMegjelenes();
    }

    function FormMegjelenes() {
        $(".fadatokMod").click(function () {
            if ($(".fadatokMod").hasClass("clicked-once")) {
                $(".felhasznaloiModositas").slideUp(1000);
                $(".fadatokMod").removeClass("clicked-once");
            } else {
                $(".fadatokMod").addClass("clicked-once");
                $(".felhasznaloiModositas").slideDown(1000);
            }
        });

        $(".ujAdmin").click(function () {
            if ($(".ujAdmin").hasClass("clicked-once")) {
                $(".ujAdminForm").slideUp(1000);
                $(".ujAdmin").removeClass("clicked-once");
            } else {
                $(".ujAdmin").addClass("clicked-once");
                $(".ujAdminForm").slideDown(1000);
            }
        });
    }
});
