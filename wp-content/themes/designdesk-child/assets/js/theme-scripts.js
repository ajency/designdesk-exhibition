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
  players.forEach(function (el) {
      el.stopVideo();
  });
}

var players = new Array();

function onYouTubeIframeAPIReady() {
  if (typeof playerInfoList === 'undefined') return;

  for (var i = 0; i < playerInfoList.length; i++) {
    var curplayer = createPlayer(playerInfoList[i]);
    players[i] = curplayer;
  }
}
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

    console.log(playerInfoList);
  });
function loadScripts(){
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

  
}
loadScripts();

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

function destroySlickSlider(){
  $('.portfolio-gallery-slider').each(function(){
    let uniqueClass = '.slider-'+$(this).data('class');
    let uniqueDotsClass = '.dd-slider-dots-'+$(this).data('class');
    let thumbnailSlider = '.carousel-'+$(this).data('class');

    if($(uniqueClass).hasClass('slick-initialized')){
      $(uniqueClass).slick('unslick');
      //console.log(uniqueClass + " slider destroyed!");
    }

    if($(thumbnailSlider).hasClass('slick-initialized')){
      $(thumbnailSlider).slick('unslick');
      //console.log(thumbnailSlider + " thumbnail slider destroyed!");
    }
  });
}

function applySlider(){
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

    //console.log("applied slider!");
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
    //console.log("applied carousel!");
  });
}

// testimonial slider
$('.testimonial-slider .wp-block-group__inner-container').slick({
  dots: true,
  infinite: false,
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

    // Related posts sldier
    $('.related-posts .dd-card-list').slick({
      arrows:false,
      dots:true,
    });
}
});

//our work sliders
let ourWorkImageSlider = $('.our-work-image-slider > .wp-block-group__inner-container');
let ourWorkDetailsSlider = $('.our-work-details-slider > .wp-block-group__inner-container');
let ourWorkNavigation = $('.our-work-slider-navigation');

$(ourWorkDetailsSlider).slick({
  infinite:false,
  arrows: false,
  asNavFor: ourWorkImageSlider,
});

$(ourWorkImageSlider).slick({
  infinite:false,
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

// locations slider

if($('.location-details').is(":visible")){
  let locationsSlider = $('.locations-slider > .wp-block-group__inner-container');
  $(locationsSlider).slick({
    arrows: false,
    fade: true,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 767.98,
        settings: {
          arrows: true,
          fade: false,
          prevArrow: "<button class='dd-slider-arrow dd-prev'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M10 17.7773L2.22222 9.99957L10 2.22179'stroke=white stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
          nextArrow: "<button class='dd-slider-arrow dd-next'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M2 17.7773L9.77778 9.99957L2 2.22179'stroke=#2471B5 stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
        }
      }
    ]
  });
  
  function mapping(locationOnSlide){
    locationOnSlide = locationOnSlide.split('_');
    let mapState = locationOnSlide[1];
    let mapLocation = locationOnSlide[0];
  
    let ddMap = $('.map-section .map');
    $(ddMap).find('path').removeClass('active-state');
    $(ddMap).find('path[data-state='+ mapState +']').addClass('active-state');
    $(ddMap).find('g').removeClass('active-location');
    $(ddMap).find('g[data-locationMarker='+ mapLocation +']').addClass('active-location');
  }
  
  let currectLocation = $(locationsSlider).find('.slick-current').attr('id');
  mapping(currectLocation);
  
  $(locationsSlider).on('beforeChange', function(event, slick, currentSlide, nextSlide){
    let location_index = nextSlide;
    let locationOnSlide = $(this).find('.location[data-slick-index='+ location_index +']').attr('id');
  
    mapping(locationOnSlide);
  
  });
  
  $('.map-marker').click(function(){
    let markerState = $(this).data('statemarker');
    let markerLocation = $(this).data('locationmarker');
  
    let targetSlide = $(locationsSlider).find('.location[id='+ markerLocation + '_' + markerState +']').data('slick-index');
    //console.log(targetSlide);
    $(locationsSlider).slick('slickGoTo', targetSlide);
  });
}

// DD Select dropdown
$('.dd-select').each(function(){
  var $this = $(this), numberOfOptions = $(this).children('option').length;

  $this.addClass('select-hidden'); 
  $this.wrap('<div class="select"></div>');
  $this.after('<div class="select-styled"></div>');

  var $styledSelect = $this.next('div.select-styled');
  $styledSelect.text($this.children('option').eq(0).text());

  var $list = $('<ul />', {
      'class': 'dd-select'
  }).insertAfter($styledSelect);

  for (var i = 0; i < numberOfOptions; i++) {
      $('<li />', {
          text: $this.children('option').eq(i).text(),
          class: $this.children('option').eq(i).attr('class'),
          'data-value': $this.children('option').eq(i).val(),
          'data-slug': $this.children('option').eq(i).data('slug'),
      }).appendTo($list);
      if ($this.children('option').eq(i).is(':selected')){
        $('li[data-value="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
      }
  }

  var $listItems = $list.children('li');

  $styledSelect.click(function(e) {
      e.stopPropagation();
      $('div.select-styled.active').not(this).each(function(){
          $(this).removeClass('active').next('ul.dd-select').slideUp('fast');
      });
      $(this).toggleClass('active').next('ul.dd-select').slideToggle('fast');
  });

  $listItems.click(function(e) {
      e.stopPropagation();
      $styledSelect.text($(this).text()).removeClass('active');
      $this.val($(this).attr('data-value'));
      $(this).parent().find('li').removeClass('is-selected');
      $(this).addClass('is-selected');
      $(this).parents('.field-group').find('#reset-button').show();
      $list.slideUp('fast');
  });

  $(document).click(function() {
      $styledSelect.removeClass('active');
      $list.hide();
  });

});

// services cards
$( ".service-card" ).each(function(){
  let cardLink = $(this).find('.gb-button').attr('href');
  $(this).wrap( "<a href='"+cardLink+"' class='service-card-outer-wrap'></a>" );
});

let currentPage = 1;
let filtredStallSize, filtredIndustry, filtredLocation;

function dd_load_more_data(currentPage, maxPages, stallSize, industry, location){
  filtredStallSize = stallSize;
  filtredIndustry = industry;
  filtredLocation = location;
}

/* console.log("current page : "+ currentPage);
console.log("next page : "+ (currentPage + 1)); */

$('#load-more').click(function(){
  currentPage++;

  //console.log("currentPage : " + currentPage, filtredStallSize, filtredIndustry, filtredLocation);

  $.ajax({
    type: 'POST',
    url: "../wp-admin/admin-ajax.php",
    dataType: "json",
    data: {
      action: "dd_load_more",
      paged: currentPage,
      filtredStallSize,
      filtredIndustry,
      filtredLocation,
    },
    success: function (res) {
      console.log("Result : "+res.max);
      destroySlickSlider();
      //console.log("current page : "+ currentPage);
      //console.log("next page : "+ res.max);
      $(".dd-card-list").append(res.html);
      if(currentPage >= res.max ){
        $('#load-more').hide();
      }
      // Load Scripts
      loadScripts();
      applySlider();
    }
  });

});

// single post sliders
$('.dd-blog-slider > .wp-block-group__inner-container').slick({
  dots: true,
  infinite: false,
  prevArrow: "<button class='dd-slider-arrow dd-prev'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M10 17.7773L2.22222 9.99957L10 2.22179'stroke=white stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  nextArrow: "<button class='dd-slider-arrow dd-next'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M2 17.7773L9.77778 9.99957L2 2.22179'stroke=#2471B5 stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  responsive: [
    {
      breakpoint: 767.98,
      settings: {
        arrows: false
      }
    }
  ]
});

//post slider
$('.dd-post-slider').slick({
  dots: true,
  infinite: false,
  prevArrow: "<button class='dd-slider-arrow dd-prev'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M10 17.7773L2.22222 9.99957L10 2.22179'stroke=white stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  nextArrow: "<button class='dd-slider-arrow dd-next'><svg fill=none height=20 viewBox='0 0 12 20'width=12 xmlns=http://www.w3.org/2000/svg><path d='M2 17.7773L9.77778 9.99957L2 2.22179'stroke=#2471B5 stroke-linecap=round stroke-linejoin=round stroke-width=4 /></svg></button>",
  responsive: [
    {
      breakpoint: 767.98,
      settings: {
        arrows: false
      }
    }
  ]
});

$('#dd-load-more').click(function(){
  currentPage++;
  let postType = $(this).data('type');
  let cardTemplate = $(this).data('card');
  let postsPerPage = $(this).data('postsPerPage');
  
  $.ajax({
    type: 'POST',
    url: "../wp-admin/admin-ajax.php",
    dataType: 'json',
    data: {
      action: "dd_load_more_default",
      paged: currentPage,
      postType: postType,
      cardTemplate: cardTemplate,
      postsPerPage:postsPerPage,
    },
    success: function(res){
      $('.dd-card-list').append(res.html);
      if(currentPage >= res.max ){
        $('#dd-load-more').hide();
      }
      // Load Scripts
      loadScripts();
    }
  })
});