$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const felhasznalok = [];
    let url = "http://localhost:8000/";

    let apiVegpont = url +"api"+ "/" + "felhasznalo";

    const szuloElem = $(".felhasznalokKiiratasa");
    const sablonElem = $(".felhasznalok");
    szuloElem.empty();

    myAjax.getAdat(apiVegpont, felhasznalok, Megjelenit);

    function Megjelenit() {
        
        szuloElem.show();
       
        felhasznalok.forEach(function (elem) {
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujTermek = new Felhasznalo(ujElem, elem);
        });

    
        sablonElem.hide();
    }
});
