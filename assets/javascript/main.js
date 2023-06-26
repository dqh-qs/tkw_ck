var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    centeredSlides: true,
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    centerSlide: true,
    fade: true,
    pagination: {
      el: ".swiper-pagination",
    },
    // breakpoint for mobile devices
    breakpoints: {
      480: {
        slidesPerView: 1,
      },
      // breakpoint for tablets
      768: {
        slidesPerView: 2,
      },
      // breakpoint for laptops and desktops
      1024: {
        slidesPerView: 3,
      },
    },
  });
function slide(){
    let slideValue = document.getElementById("slider").value;
    document.getElementById("my-img").style.clipPath="polygon(0 0 ," +slideValue + "% 0," +slideValue + "% 100%, 0 100%)";
    console.console.log("polygon(0 0 ," +slideValue + "% 0," +slideValue + "% 100%, 0 100%)");
}
