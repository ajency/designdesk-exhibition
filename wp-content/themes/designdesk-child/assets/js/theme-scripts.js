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
// show popup
function showPopup(targetPopup){
  $('.dd-overlay').fadeIn('fast');
  $(targetPopup).fadeIn('fast');
  $(targetPopup).addClass('opened');
  $('body').addClass('stopScroll');
  repositionSlider(targetPopup);
}
// reposition slick slider
function repositionSlider(targetPopupID){
  $(targetPopupID).find('.popup-slider').slick('setPosition');
}
// hide popup
function hidePopup(targetPopup){
  $(targetPopup).fadeOut('fast');
  $(targetPopup).removeClass('opened');
  $('.dd-overlay').fadeOut('fast');
  $('body').removeClass('stopScroll');
}
// popup trigger
$('.dd-popupToggler').click(function(e){
  e.stopPropagation();
  let targetPopup = $(this).attr('target-popup');
  showPopup(targetPopup);
});
// close popup
$('.dd-close').click(function(){
  let targetPopup = $(this).parents('.dd-popup').attr('id');
  hidePopup('#'+targetPopup);
});
// close popup on outside click
$(document).click(function(){
  hidePopup('.dd-popup');
});
$('.main-content').click(function(event){
  event.stopPropagation();
});

// portfolio gallery slider
$('.portfolio-gallery-slider').each(function(){
  let uniqueClass = '.slider-'+$(this).data('class');
  let uniqueDotsClass = '.dd-slider-dots-'+$(this).data('class');
  console.log(uniqueClass);
  $(uniqueClass).slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots:true,
    fade: true,
    speed: 600,
    appendDots: $(uniqueDotsClass),
    prevArrow: "<button class='dd-slider-arrow dd-prev'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M10 17.7773L2.22222 9.99957L10 2.22179'stroke=white stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
    nextArrow: "<button class='dd-slider-arrow dd-next'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M2 17.7773L9.77778 9.99957L2 2.22179'stroke=#2471B5 stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  });
});