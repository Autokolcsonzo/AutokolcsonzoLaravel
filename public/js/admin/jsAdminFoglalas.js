$(function () {



        $(".fadatokMod").click(function () {
            if ($(".fadatokMod").hasClass("clicked-once")) {
                $(".foglalasModositas").slideUp(1000);
                $(".fadatokMod").removeClass("clicked-once");
            } else {
                $(".fadatokMod").addClass("clicked-once");
                $(".foglalasModositas").slideDown(1000);
            }
        });
    
});
