$(function () {
  const reszponzivMenuIkon = $(".hamburgerMenu");
  const navbar = $(".navbar");
  reszponzivMenuIkon.on("click", () => {
    navbar.classList.toggle("gombValtozas");
  });

  $(window).resize(function () {
    if (($(window).height() < 610) || ($(window).width() < 940)) {
      $("nav ul").css('position', 'unset');
    }else{
      $("nav ul").css('position', 'fixed');
    }
  }
  );


});
