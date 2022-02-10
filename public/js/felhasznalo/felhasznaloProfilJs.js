$(function () {
  const myAjax = new MyAjax();
  const felhasznalok = [];

  let apiVegpont = "http://localhost:3000/felhasznalo";

  myAjax.getAdat(apiVegpont, felhasznalok, MegjelenitFelhasznalok);

  function MegjelenitFelhasznalok() {
    const szuloElem = $(".fadatok");
    const sablonElem = $(".fadatokTable");
    szuloElem.empty();
    console.log(felhasznalok);
    szuloElem.show();

    felhasznalok.forEach(function (elem) {
      console.log(elem);
      if (elem["felhasznalo_id"] === 1) {
        const ujElem = sablonElem.clone().appendTo(szuloElem);
        const ujTermek = new FelhasznaloProfil(ujElem, elem);
      }
      console.log(felhasznalok);
    });
    $(".fadatok").append(
      '<input type="button" name="fadatokMod" id="fadatokMod" value="Adatok módosítása" />'
    );
    ModositMegjelenes();

    sablonElem.hide();
  }

  function ModositMegjelenes() {
    $("#fadatokMod").on("click", () => {
      $(".felhasznaloiModositas").slideDown(500);
    });

    $("#fkepMod").on("click", () => {
      $("#profkepFel").slideDown(500);
    });
  }
});
