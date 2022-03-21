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

    $(window).on("modosit", (event) => {
        event.preventDefault();
        id = event.detail.id;
        let felhasznaloiAdatok = localStorage.getItem("felhasznaloiAdatok");
        let felhasznaloiAdatokobj = JSON.parse(felhasznaloiAdatok);

        $("#ifnev").val(felhasznaloiAdatokobj.felhasznalonev);
        $("#ivnev").val(felhasznaloiAdatokobj.vezeteknev);
        $("#iknev").val(felhasznaloiAdatokobj.keresztnev);
        $("#iszdatum").val(felhasznaloiAdatokobj.szul_ido);
        $("#iiranyitoszam").val(felhasznaloiAdatokobj.ir_szam);
        $("#imegye").val(felhasznaloiAdatokobj.megye);
        $("#ivaros").val(felhasznaloiAdatokobj.varos);
        $("#iutca").val(felhasznaloiAdatokobj.utca);
        $("#ihazszam").val(felhasznaloiAdatokobj.hazszam);
        $("#iemail").val(felhasznaloiAdatokobj.e_mail);
        $("#itelszam").val(felhasznaloiAdatokobj.tel_szam);
    });


    $(window).on("adatmentes", (event) => {

        event.preventDefault();

        let felhasznalonev=$("#ifnev").val();
        console.log("kattint");
        let vezeteknev=$("#ivnev").val();
        let keresztnev=$("#iknev").val();
        let szul_ido=$("#iszdatum").val();
        let ir_szam=$("#iiranyitoszam").val();
        let megye=$("#imegye").val();
        let varos=$("#ivaros").val();
        let utca=$("#iutca").val();
        let hazszam=$("#ihazszam").val();
        let e_mail=$("#iemail").val();
        let tel_szam=$("#itelszam").val();
        let ujAdat={
            "felhasznalonev":felhasznalonev,
            "vezeteknev":vezeteknev,
            "keresztnev":keresztnev,
            "szul_ido":szul_ido,
            "ir_szam":ir_szam,
            "megye":megye,
            "varos":varos,
            "utca":utca,
            "hazszam":hazszam,
            "e_mail":e_mail,
            "tel_szam":tel_szam
        };
        ajax.putAdat(apiVegpont, id, ujAdat);
        location.reload();

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
