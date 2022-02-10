window.onload = function () {
  window.addEventListener("scroll", function (e) {
    if (window.pageYOffset > 100) {
      document.querySelector("main").classList.add("is-scrolling");
    } else {
      document.querySelector("main").classList.remove("is-scrolling");
    }
  });

  const menu_btn = document.querySelector(".hamburger");
  const mobile_menu = document.querySelector(".mobilNav");

  menu_btn.addEventListener("click", function () {
    menu_btn.classList.toggle("is-active");
    mobile_menu.classList.toggle("is-active");
  });
  var dd_main = document.querySelector(".dd_main");

  dd_main.addEventListener("click", function () {
    this.classList.toggle("active");
  });
};
