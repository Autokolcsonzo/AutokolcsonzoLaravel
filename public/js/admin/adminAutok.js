$(function () {
    UjAutoFelvetele();
    UjModellFelvetele();
    UjKepFelvetele();
    ReszletMegjelenit();
});

function ReszletMegjelenit() {
    let zarva = true;
    $(".reszletek").css("display", "none");
    $(".fReszletek").click(function () {
        let gombId = this.id;
        $(".reszletek").each(function (index) {
            let elem = this.id;
            if ("r" + gombId == elem) {
                if (zarva) {
                    $("#" + elem).slideDown(500);
                    zarva = false;
                } else {
                    $("#" + elem).slideUp(500);
                    zarva = true;
                }
            }
            //console.log( index + ": " + $( this ).text() );
        });

        //console.log(gombId);

        /*if(zarva){
            $(".reszlet").slideDown(500);
            zarva = false;
        }else{
            $(".reszlet").slideUp(500);
            zarva = true;
        }*/
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

function UjModellFelvetele() {
    $(".ujModellGomb").click(function () {
        if ($(".ujModellGomb").hasClass("clicked-once")) {
            $(".modellAdatokFeltoltes").slideUp(500);
            $(".ujAutoGomb").removeClass("clicked-once");
        } else {
            $(".ujModellGomb").addClass("clicked-once");
            $(".modellAdatokFeltoltes").slideDown(500);
        }
    });
}

function UjKepFelvetele() {
    $(".ujKepGomb").click(function () {
        if ($(".ujKepGomb").hasClass("clicked-once")) {
            $(".kepAdatokFeltoltes").slideUp(500);
            $(".ujKepGomb").removeClass("clicked-once");
        } else {
            $(".ujKepGomb").addClass("clicked-once");
            $(".kepAdatokFeltoltes").slideDown(500);
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
