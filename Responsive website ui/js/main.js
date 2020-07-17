$(document).ready(function () {
  /* navigation bar and hunberger menu functionamity started here*/
  $(".nav-icon").click(function () {
    $(".full-nav").addClass("open");
  });
  $(".nav-close").click(function () {
    $(".full-nav").removeClass("open");
  });

  $(window).scroll(function () {
    var sc = $(window).scrollTop();
    if (sc > 100) {
      $(".nav").addClass("sticky");
    } else {
      $(".nav").removeClass("sticky");
    }
  });
  /* navigation bar and hunberger menu functionamity finished here*/
  $(".bxslider").bxSlider({
    mode: "horizontal",
    moveSlides: 1,
    slideMargin: 40,
    infiniteLoop: true,
    minSlides: 1,
    maxSlides: 1,
    speed: 1200,
  });

  if ($(".swiper-container").hasClass("team-member-slider")) {
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 3,
      allowTouchMove: true,
      loop: true,
      centeredSlides: true,
      slideToclickedslide: true,
      effect: "coverflow",
      grabcursor: true,
      autoplay: false,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      coverflow: {
        rotate: 0,
        stretch: 100,
        depth: 200,
        modifier: 1,
        slideShadows: false,
      },
      breakpoints: {
        767: { slidesPerView: 3, centredSlides: true, effect: "slide" },
      },
    });
  }

  $("#work").magnificPopup({
    delegate: "a",
    type: "image",
    gallery: { enabled: true },
  });

  $("#news-slider").owlCarousel({
    items: 3,
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [100, 2],
    itemsMobile: [599, 1],
    pagination: false,
    navigationText: false,
    autoPlay: true,
  });
  $(".count").counterUp({
    delay: 10,
    time: 500,
  });
});
$(function () {
  $("#clients-list").owlCarousel({
    items: 6,
    autoPlay: false,
    smartSpeed: 700,
    loop: true,
    autoPlayHoverPause: true,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 2,
      },
      400: { items: 3 },
      768: { items: 3 },
    },
  });
});
