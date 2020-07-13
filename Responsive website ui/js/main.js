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
});
