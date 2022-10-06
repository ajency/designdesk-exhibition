$(function () {
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 50) {
      $("header").addClass("active");
    } else {
      $("header").removeClass("active");
    }
  });
  //toggle
  $(".menu-toggler").click(function () {
    $(".mobile-dropdown-menu").toggle("medium");
    $(this).toggleClass("close-icon");
  });

  $(document).ready(function () {
    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();
    
    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        if (newWindowWidth > 992) {
            // desktop
            //dropdown menu
            $("header .menu .menu-item.menu-item-has-children").hover( function(){
              $(this).find(".sub-menu").slideDown();
            });
        }
        else
        {
           // mobile
        }
    }
  });

  //dropdown button
  $("header .menu-item-has-children").append(
    '<button class="sub-menu-toggle dashicons-before dashicons-arrow-down-alt2"></button>'
  );
  $(".sub-menu-toggle").click(function () {
    $(".sub-menu-toggle").not(this).removeClass("activated");
    $(".sub-menu-toggle").not(this).parent(".menu-item-has-children").removeClass("activated");
    $(".sub-menu-toggle").not(this).parent().find(".sub-menu").hide("medium");

    $(this).toggleClass("activated");
    $(this).parent(".menu-item-has-children").toggleClass("activated");
    $(this).parent().find(".sub-menu").toggle("medium");
  });
});
