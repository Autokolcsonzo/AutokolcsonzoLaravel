$(function () {

    ReszletMegjelenit();

});

function ReszletMegjelenit() {
    let zarva = true;
    $(".reszlet").css("display", "none");
    $(".reszletGomb").click(function () {
        let gombId = this.id;
        $(".reszlet").each(function (index) {
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








