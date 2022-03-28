$(function(){
    let zarva = true;
    $(".feltetelReszletek").css("display", "none");
        $(".reszletekGomb").click(function () {
            let gombId = this.id;
            $(".reszletekGomb").each(function (index) {
                let elem = "r"+this.id;
                console.log(elem, gombId);
                if ("r"+gombId == elem) {
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
});
