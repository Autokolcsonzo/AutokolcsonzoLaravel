$(function () {
    UjAutoFelvetele();
    ReszletMegjelenit();
});

/*function ReszletMegjelenit() {
    $(".fReszletek").addClass("clicked-once");
    $(".fReszletek").on("click", ()=> {
        if ($(".fReszletek").hasClass("clicked-once")) {
            $(".reszlet").slideDown(500);
            //$(".felhasznalokAdmin").append("<div class='felhFejlec2'></div>");
            //$(".felhFejlec2").append("<div class='tunjel'><h2>Jogkör</h2><h2>Felhasználónev</h2><h2>E-mail</h2><h2>Reg. dátum</h2><h2></h2><h2></h2><h2></h2></div>");
            //$(".fReszletek").removeClass("clicked-once");
            $(".fReszletek").removeClass("clicked-once");
        } else {
            $(".fReszletek").addClass("clicked-once");
            $(".reszlet").slideUp(500);
            //$(".felhasznalokAdmin").remove(".felhFejlec2");
            //$(".felhFejlec2").remove();
        }
    });
    
}*/

function ReszletMegjelenit() {
    let zarva = true
    $( ".reszletek" ).css("display","none");
    $(".fReszletek").click(function() {
        let gombId = this.id;
        $( ".reszletek" ).each(function( index ) {
            let elem = this.id;
            if("r"+gombId == elem){
                console.log(gombId +':'+ elem);
                if(zarva){
                    $("#"+elem).slideDown(500);
                    zarva = false;
                    console.log(elem+" kinyitva");
                }else{
                    $("#"+elem).slideUp(500);
                    zarva = true;
                    console.log(elem+" bezárva");
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
