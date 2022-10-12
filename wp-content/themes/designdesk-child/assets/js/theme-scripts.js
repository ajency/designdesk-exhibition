//number counter animation
$(".stat-number mark").each(function () {
  $(this)
    .prop("Counter", 0)
    .animate(
      {
        Counter: $(this).text(),
      },
      {
        duration: 4000,
        easing: "swing",
        step: function (now) {
          // $(this).text(Math.ceil(now));
          $(this).text(
            Math.ceil(now)
              .toString()
              .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
          );
        },
      }
    );
});

//logo carousel
$(".logo-carousel .gb-container-content").slick({
  speed: 5000,
  autoplay: true,
  autoplaySpeed: 0,
  centerMode: true,
  cssEase: "linear",
  slidesToShow: 1,
  slidesToScroll: 1,
  variableWidth: true,
  infinite: true,
  initialSlide: 1,
  arrows: false,
  buttons: false,
  pauseOnHover: true,
  accesibility: false,
  draggable: false,
  swipe: false,
  touchMove: false,
  responsive: [
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 5000,
        autoplaySpeed: 0,
        autoplay: true,
      },
    },
  ],
});

//service cards
$(document).ready(function () {
  
    $(window).on("resize", function (e) {
    checkScreenSize();
  });

  checkScreenSize();

  function checkScreenSize() {
    var newWindowWidth = $(window).width();
    if (newWindowWidth < 992) {
      checkCardTitle(40);
      $(".service-card").click(function () {
        $(this).find(".service-card-details").toggleClass("show");
      });
    } else {
      checkCardTitle(60);
      $(".service-card").hover(function () {
        $(this).find(".service-card-details").toggleClass("show");
      });
    }
  }
  function checkCardTitle($addPadding){
    $cartTitleHeight = $('.service-card');

    $cartTitleHeight.each(function() {
        $titleHeight = $(this).find('.service-card-title').outerHeight();
        $finalTitleHeight = $titleHeight+$addPadding;
        $(this).find('.service-card-details').css('transform','translateY(calc(100% - '+$finalTitleHeight+'px))');
      });
  }
});


// popups
$('.dd-popup').closest('.gb-block-layout-column-inner').addClass('positionStatic');
$('.dd-popup').closest('.gb-layout-column-wrap').addClass('positionStatic');
function showPopup(targetPopup){
  $('.dd-overlay').fadeIn('fast');
  $(targetPopup).fadeIn('fast');
  $('body').addClass('stopScroll');
}
function hidePopup(targetPopup){
  $(targetPopup).fadeOut('fast');
  $('.dd-overlay').fadeOut('fast');
  $('body').removeClass('stopScroll');
}
$('.dd-popupToggler').click(function(e){
  e.stopPropagation();
  let targetPopup = $(this).attr('target-popup');
  showPopup(targetPopup);
});
$('.dd-close').click(function(){
  let targetPopup = $(this).parents('.dd-popup').attr('id');
  hidePopup('#'+targetPopup);
});
$(document).click(function(){
  hidePopup('.dd-popup');
});