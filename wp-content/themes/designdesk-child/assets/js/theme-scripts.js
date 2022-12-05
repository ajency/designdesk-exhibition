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

// share requirements popup
//add id
$(".shareRequirement a").attr("class", "shareRequirementToggler dd-popupToggler");
//add target popup
$(".shareRequirement a").attr("target-popup", "#shareRequirementPopup");

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
$('.dd-popupToggler').each(function(){
  $(this).click(function(e){
    e.stopPropagation();
    let targetPopup = $(this).attr('target-popup');
    showPopup(targetPopup);
  });
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
  let thumbnailSlider = '.carousel-'+$(this).data('class');
  $(uniqueClass).slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots:true,
    fade: true,
    speed: 600,
    appendDots: $(uniqueDotsClass),
    asNavFor: thumbnailSlider,
    infinite: false,
    prevArrow: "<button class='dd-slider-arrow dd-prev'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M10 17.7773L2.22222 9.99957L10 2.22179'stroke=white stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
    nextArrow: "<button class='dd-slider-arrow dd-next'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M2 17.7773L9.77778 9.99957L2 2.22179'stroke=#2471B5 stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
    responsive: [
      {
        breakpoint: 767.98,
        settings: {
          arrows: false,
          dots: false
        }
      }
    ]
  });
});

// porfolio thumbnail carousel
$('.portfolio-thumbnail-carousel').each(function(){
  let uniqueCarousel = '.carousel-'+$(this).data('class');
  let mainSlider = '.slider-'+$(this).data('class');
  $(uniqueCarousel).slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    infinite: false,
    dots:false,
    speed: 600,
    asNavFor: mainSlider,
    centerMode: false,
    focusOnSelect: true,
    variableWidth: false,
  });
});

// Youtube video player
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var playerInfoList = [];

let loopCount = 1;
$('.video-card').each(function(){
  let videoId = $(this).attr('video-id');
  let playerId = "player"+(loopCount++);
  playerInfoList.push({"id": playerId, "videoId": videoId});
});

function onYouTubeIframeAPIReady() {
  if (typeof playerInfoList === 'undefined') return;

  for (var i = 0; i < playerInfoList.length; i++) {
    var curplayer = createPlayer(playerInfoList[i]);
    players[i] = curplayer;
  }
}

var players = new Array();

function createPlayer(playerInfo) {
  return new YT.Player(playerInfo.id, {
    videoId: playerInfo.videoId,
    playerVars: {
      showinfo: 0,
    }
  });
}

function stopYtPlayer(element){
  let iframeId = $(element).parents('.video-popup').find('iframe').attr('id');
  players.forEach(function (el) {
    if( $(el.h).attr('id') == iframeId ){
      el.stopVideo();
    }
  });
}

// testimonial slider
$('.testimonial-slider .wp-block-group__inner-container').slick({
  dots: true,
  prevArrow: "<button class='dd-slider-arrow dd-prev'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M10 17.7773L2.22222 9.99957L10 2.22179'stroke=white stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  nextArrow: "<button class='dd-slider-arrow dd-next'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M2 17.7773L9.77778 9.99957L2 2.22179'stroke=#2471B5 stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  responsive: [
    {
      breakpoint: 767.98,
      settings: {
        arrows: false,
      }
    }
  ]
});

$(window).on("resize, load", function () {
  if ($(window).width() > 768) {
    //only for larger screen
  }else{
    //only foe smaller screen
    // awards carousel
    $('.awards-carousel').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      centerMode: true,
      arrows: false,
      dots: true,
      speed: 300,
      centerPadding: '5px',
      infinite: true,
    });

    // On before slide change
    $('.awards-carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      let slide = $(this).find('.slick-slide:not(.slick-current)');
      $(slide).find('.award-title').hide("slow");
    });
  }
});

//our work sliders
let ourWorkImageSlider = $('.our-work-image-slider > .wp-block-group__inner-container');
let ourWorkDetailsSlider = $('.our-work-details-slider > .wp-block-group__inner-container');
let ourWorkNavigation = $('.our-work-slider-navigation');

$(ourWorkDetailsSlider).slick({
  arrows: false,
  asNavFor: ourWorkImageSlider,
});

$(ourWorkImageSlider).slick({
  dots:true,
  prevArrow: "<button class='dd-slider-arrow dd-prev'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M10 17.7773L2.22222 9.99957L10 2.22179'stroke=white stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  nextArrow: "<button class='dd-slider-arrow dd-next'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M2 17.7773L9.77778 9.99957L2 2.22179'stroke=#2471B5 stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  appendDots: $(ourWorkNavigation),
  asNavFor: ourWorkDetailsSlider,
  responsive: [
    {
      breakpoint: 767.98,
      settings: {
        arrows: false,
      }
    }
  ]
});