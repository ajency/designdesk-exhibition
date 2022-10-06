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

  //dropdown button
  $("header .menu-item-has-children").append(
    '<button class="sub-menu-toggle dashicons-before dashicons-arrow-down-alt2"></button>'
  );

  $(".sub-menu-toggle").click(function () {
    $(this).toggleClass("activated");
    $(this).parent().find(".sub-menu").toggle("medium");
  });
});
