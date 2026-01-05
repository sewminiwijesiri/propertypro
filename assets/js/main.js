window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    if (window.scrollY > 50) {
      navbar.style.background = "#ffffff";
      navbar.style.boxShadow = "0 10px 30px rgba(0,0,0,0.05)";
      navbar.style.height = "70px";
    } else {
      navbar.style.background = "rgba(255, 255, 255, 0.8)";
      navbar.style.boxShadow = "none";
      navbar.style.height = "80px";
    }
  }
});
