$(function () {
    const autoAjax = new AutoAjax();
    const autok = [];
    const szuloElem = $("#jarmu-lista");
    const sablonElem = $(".jarmu-card");
    let apiVegpont = "http://localhost:3000/autok";
    autoAjax.getAdat(apiVegpont, autok, autoValasztas);
    
    function autoValasztas() {
      szuloElem.show();
      sablonElem.show();
      autok.forEach(function (elem) {
        const ujElem = sablonElem.clone().appendTo(szuloElem);
        const ujTermek = new Auto(ujElem, elem);
      });
      sablonElem.hide();
    }
  });