$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const autok = [];
    const szuloElem = $(".hirekContainer");
    const sablonElem = $(".hirek");

    let url = "http://localhost:8000/";

    let apiVegpont =
        url +
        "api/auto_fill/null/null/null/null/null/null/null/null/null/null/null/null/null";

    myAjax.getAdat(apiVegpont, autok, Megjelenit);

    szuloElem.empty();

    function Megjelenit() {
        szuloElem.empty();
        szuloElem.show();

        autok.forEach(function (elem) {
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Auto(ujElem, elem);
        });
        sablonElem.hide();
    }
});
