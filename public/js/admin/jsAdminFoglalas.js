$(function () {
  
    ReszletMegjelenit();
    fizetesMegjelenit();
 
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
        });
    });
}

function fizetesMegjelenit() {
    
    let zarva = true;
    $(".fizetes").css("display", "none");
    $(".fFizetes").click(function () {
        let gombId = "a"+this.id;
        $(".fizetes").each(function (index) {
            let elem = this.id;
            if (gombId == elem) {
                if (zarva) {
                    $("#"+elem).slideDown(500);
                    zarva = false;
                } else {
                    $("#"+elem).slideUp(500);
                    zarva = true;
                }
            }
            console.log("fizetesMegjelenit",gombId,elem);
        });
    });
}