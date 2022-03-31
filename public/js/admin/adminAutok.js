$(function () {
    UjAutoFelvetele();
    UjModellFelvetele();
    UjKepFelvetele();
    ReszletMegjelenit();
    autoModal();
    modellModal();
    kepModal();
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

function autoModal() {
    const open = document.getElementById("buttonAuto");
    const modal_container = document.getElementById("ujAutoModal");
    const close = document.getElementById("autoBezaras");

    open.addEventListener("click", () => {
        modal_container.classList.add("show");
    });

    close.addEventListener("click", () => {
        modal_container.classList.remove("show");
    });
}

function modellModal() {
    const open = document.getElementById("buttonModell");
    const modal_container = document.getElementById("ujModellModal");
    const close = document.getElementById("modellBezaras");

    open.addEventListener("click", () => {
        modal_container.classList.add("show");
    });

    close.addEventListener("click", () => {
        modal_container.classList.remove("show");
    });
}

function kepModal() {
    const open = document.getElementById("buttonKep");
    const modal_container = document.getElementById("ujKepModal");
    const close = document.getElementById("kepBezaras");

    open.addEventListener("click", () => {
        modal_container.classList.add("show");
    });

    close.addEventListener("click", () => {
        modal_container.classList.remove("show");
    });
}

function ujAutoFelvitele() {
    $("#addform").on("submit", function (e) {
        e.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "admin_autok",
            data: $("#addform").serialize(),
            success: function (result) {
                //   console.log(result);
                //    $('#ujAutoModal').remove();
                alert("Adatok elmentve.");
            },
            error: function (error) {
                //  console.log(error);
                alert("Adatok nem lettek elmentve.");
            },
        });
    });
}

function ujModellFelvitele() {
    $("#addform").on("submit", function (e) {
        e.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "admin_modellek",
            data: $("#addform").serialize(),
            success: function (result) {
                //   console.log(result);
                //    $('#ujAutoModal').remove();
                alert("Adatok elmentve.");
            },
            error: function (error) {
                //  console.log(error);
                alert("Adatok nem lettek elmentve.");
            },
        });
    });
}

function ujKepFelvitele() {
    $("#addform").on("submit", function (e) {
        e.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "admin_kepek",
            data: $("#addform").serialize(),
            success: function (result) {
                //   console.log(result);
                //    $('#ujAutoModal').remove();
                alert("Adatok elmentve.");
            },
            error: function (error) {
                //  console.log(error);
                alert("Adatok nem lettek elmentve.");
            },
        });
    });
}
