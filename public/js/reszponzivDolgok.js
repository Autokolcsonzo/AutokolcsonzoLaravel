$(function () {
  const reszponzivMenuIkon = $(".hamburgerMenu");
  const navbar = $(".navbar");
  reszponzivMenuIkon.on("click", () => {
    navbar.classList.toggle("gombValtozas");
  });
});
