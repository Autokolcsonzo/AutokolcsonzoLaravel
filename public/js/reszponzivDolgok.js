$(function () {
  const reszponzivMenuIkon = $(".hamburgerMenu");
  const navbar = $(".navbar");
  reszponzivMenuIkon.on("click", () => {
    navbar.classList.toggle("gombValtozas");
  });

  $(window).resize(function () {
    if ($(window).height() < 610) {
      $("nav ul").css('position', 'unset');
    }else{
      $("nav ul").css('position', 'fixed');
    }
  }
  );


});
