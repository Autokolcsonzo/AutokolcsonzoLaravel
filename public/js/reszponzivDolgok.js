$(function () {
  const reszponzivMenuIkon = $(".hamburgerMenu");
  const navbar = $(".navbar");
  reszponzivMenuIkon.on("click", () => {
    navbar.classList.toggle("gombValtozas");
  });


  //watch the window height change in real time and change the height of the navbar accordingly

  //modify css of the navbar when the window height is lower than 610px
  /*$(window).on("resize", () => {
    if ($(window).height() < 610) {
      navbar.css("height", "60px");
    } else {
      navbar.css("height", "100px");
    }
  });*/
  


  $(window).resize(function () {
    if ($(window).height() < 610) {
      $("nav ul").css('position', 'unset');
    }
  }
  );


});
