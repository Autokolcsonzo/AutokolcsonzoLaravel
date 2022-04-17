$(function () {
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

/* function ujAutoFelvitele() {
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
} */
