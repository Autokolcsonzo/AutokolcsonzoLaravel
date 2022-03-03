$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const felhasznalok = [];
    let url = "http://localhost:8000/";

    let apiVegpont = url + "api" + "/" + "felhasznalo";
    let apiVegpont2 = url + "api" + "/" + "felhasznalo/felhasznalo_id";

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
        /*$(".fadatok").append(
            '<input type="button" name="fadatokMod" id="fadatokMod" value="Adatok módosítása" />'
        );*/
        ModositMegjelenes();

        sablonElem.hide();
    }

    $(window).on("modosit", (event) => {
        event.preventDefault();
        id = event.detail.id;
        let felhasznaloiAdatok = localStorage.getItem("felhasznaloiAdatok");
        let felhasznaloiAdatokobj = JSON.parse(felhasznaloiAdatok);

        console.log("fnev : " + $("#ifnev").val());
        console.log(felhasznaloiAdatokobj.felhasznalonev);
        $("#ifnev").val(felhasznaloiAdatokobj.felhasznalonev);
        $("#ivnev").val(felhasznaloiAdatokobj.vezeteknev);
        $("#iknev").val(felhasznaloiAdatokobj.keresztnev);
        $("#ijelszo").val(felhasznaloiAdatokobj.jelszo);
        $("#iszdatum").val(felhasznaloiAdatokobj.szul_ido);
        $("#iiranyitoszam").val(felhasznaloiAdatokobj.ir_szam);
        $("#imegye").val(felhasznaloiAdatokobj.megye);
        $("#ivaros").val(felhasznaloiAdatokobj.varos);
        $("#iutca").val(felhasznaloiAdatokobj.utca);
        $("#ihazszam").val(felhasznaloiAdatokobj.hazszam);
        $("#iemail").val(felhasznaloiAdatokobj.e_mail);
        $("#itelszam").val(felhasznaloiAdatokobj.tel_szam);
    });

    $("#adatotMent").on("click", () => {
        let felhasznalonev = $("#ifnev").val();
        console.log("kattint");
        let vezeteknev = $("#ivnev").val();
        let keresztnev = $("#iknev").val();
        let jelszo = $("#ijelszo").val();
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
            jelszo: jelszo,
            szul_ido: szul_ido,
            ir_szam: ir_szam,
            megye: megye,
            varos: varos,
            utca: utca,
            hazszam: hazszam,
            e_mail: e_mail,
            tel_szam: tel_szam,
        };
        myAjax.putAdat(apiVegpont, id, ujAdat);
        location.reload();
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
        $("#fkepMod").click(function () {
            if ($("#fkepMod").hasClass("clicked-once")) {
                $("#profkepFel").slideUp(1000);
                $("#fkepMod").removeClass("clicked-once");
            } else {
                $("#fkepMod").addClass("clicked-once");
                $("#profkepFel").slideDown(1000);
            }
        });
    }
});
