$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const adminAutok = [];
    const felhasznalok = [];

    let apiVegpont = "http://localhost:8000/api/adminAutok";
    
    myAjax.getAdat(apiVegpont, adminAutok, autoFeltoltes);

    function autoFeltoltes(adminAutok) {
        const szuloElem = $(".tablazat .szuloElem");
        const sablonElem = $(".adminAuto");
        szuloElem.empty();
        sablonElem.show();
        
        adminAutok.forEach(function (elem) {
            /* console.log(elem); */
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Auto(ujElem, elem);
        });

        UjAutoFelvetele();
        ModositMegjelenes();
        ReszletekMegjelenes();

        sablonElem.hide();
    }

    $(window).on("torles", (event) => {
        console.log("törlés");
        myAjax.deleteAdat(apiVegpont, event.detail.id);
        /*   location.reload(); */
    });

        function ModositMegjelenes() {
            $(".autoMod").click(function () {
                if ($(".autoMod").hasClass("clicked-once")) {
                    $(".autoAdatokModositas").slideUp(500);
                    $(".autoMod").removeClass("clicked-once");
                } else {
                    $(".autoMod").addClass("clicked-once");
                    $(".autoAdatokModositas").slideDown(500);
                }
            });
        }

    function ReszletekMegjelenes() {
        $(".autoReszletek").click(function () {
            if ($(".autoReszletek").hasClass("clicked-once")) {
                $(".autoAdatokFeltoltes").slideUp(500);
                $(".autoReszletek").removeClass("clicked-once");
            } else {
                $(".autoReszletek").addClass("clicked-once");
                $(".autoAdatokFeltoltes").slideDown(500);
            }
        });
    }

    function UjAutoFelvetele() {
        $(".ujAutoGomb").click(function () {
            if ($(".ujAutoGomb").hasClass("clicked-once")) {
                $(".autoAdatokFeltoltes").slideUp(500);
                $(".ujAutoGomb").removeClass("clicked-once");
            } else {
                $(".ujAutoGomb").addClass("clicked-once");
                $(".autoAdatokFeltoltes").slideDown(500);
            }
        });
    }

    //Sortok
    /*     let keresomezo = $("#keresoMezo");
    keresomezo.on("keyup", () => {
        autok.splice(0, autok.length);
        $("#jarmu-lista").empty();
        let apivegpont = "http://localhost:3000/autok";
        apivegpont += "?q=" + keresomezo.val();
        console.log(autok);
        autoAjax.getAdat(apivegpont, autok, autoFeltoltes);
    });

    $("#rendezes").on("change", () => {
        let apivegpont = "http://localhost:3000/autok";
        $("#jarmu-lista").empty();
        if ($("#rendezes").val() == "alap") {
            autoAjax.getAdat(apivegpont, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "novekvo") {
            apivegpont += "?_sort=ar&_order=asc";
            autoAjax.getAdat(apivegpont, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "csokkeno") {
            apivegpont += "?_sort=ar&_order=desc";
            autoAjax.getAdat(apivegpont, autok, autoFeltoltes);
        }
    }); */
});
