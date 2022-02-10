$(function () {
    let zarva = false;
    $("#dropdown_kereso").css("display", "none");
    $("#dropdown_arrow").on("click", function () {
      if (zarva) {
        $("#dropdown_arrow").css("transform", "rotate(90deg)");
        $("#dropdown_kereso").slideUp(500);
        zarva = false;
      } else if (!zarva) {
        $("#dropdown_arrow").css("transform", "rotate(270deg)");
        $("#dropdown_kereso").slideDown(500);
        zarva = true;
      }
    });
});