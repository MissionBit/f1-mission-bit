import Bowser from "bowser";
import Headroom from "headroom.js";
import MicroModal from "micromodal";
import $ from "jquery";
import "waypoints/lib/noframework.waypoints.min";
import { CountUp } from "countup.js/dist/countUp.min.js";
import "slick-carousel/slick/slick";

// Headroom
let siteHeader = document.querySelector(".site-header"),
  headroom = new Headroom(siteHeader);

headroom.init();

// MicroModal
MicroModal.init();

$(document).ready(function() {
  // Inside of this function, $() will work as an alias for jQuery()
  // and other libraries also using $ will not be accessible under this shortcut
  // https://codex.wordpress.org/Function_Reference/wp_enqueue_script#jQuery_noConflict_Wrappers

  // Touch Device Detection
  var isTouchDevice = "ontouchstart" in document.documentElement;
  if (isTouchDevice) {
    $("body").removeClass("no-touch");
  }

  // Browser detection via Bowser (https://github.com/lancedikson/bowser) - add detection as needed
  const userBrowser = Bowser.getParser(window.navigator.userAgent);
  const browser = userBrowser.getBrowser();

  if (browser.name === "Internet Explorer" && browser.version == "11.0") {
    $("body").addClass("ie-11");
  } else if (browser.name === "Safari") {
    $("body").addClass("safari");
  }

  // Menu functions
  function toggleMenu(icon, menu) {
    $("html").toggleClass("locked");
    $("body").toggleClass("locked masked");

    icon.toggleClass("active");
    menu.slideToggle();
  }

  function closeMenu(icon, menu) {
    if( menu.css("display") == "block" ) {
      $("html").removeClass("locked");
      $("body").removeClass("locked masked");
    }

    icon.removeClass("active");
    menu.slideUp();
  }

  // Main menu function
  $(".menu-icon").on("click", function() {
    toggleMenu($(this), $(".nav--mobile"));
  });

  // Close menu on desktop
  $(window).on("resize", function() {
    if( $(window).width() > 1024 ) {
      closeMenu($(".menu-icon"), $(".nav--mobile"));
    }
  });

  // Close menu on outside click
  $(document).on("click", function(e) {
    if( !$(e.target).closest(".site-header").length ) {
      closeMenu($(".menu-icon"), $(".nav--mobile"));
    }
  });

  // Close menu on ESC key
  $(document).on("keyup", function(e) {
    if( e.which == 27) {
      closeMenu($(".menu-icon"), $(".nav--mobile"));
    }
  });

  // Mobile menu sub-menu toggle
  $(".nav--mobile .menu-item-has-children > a").on("click", function(e) {
    e.preventDefault();

    $(this).siblings(".sub-menu").slideToggle();
    $(this).toggleClass("active");
  });

  // Hero anchor scroll
  $(".hero__button").on("click", function() {
    $("html, body").animate({
      scrollTop: $("#hero-anchor").offset().top,
    }, 800);
  });

  // Stats row animation
  if( $(".stats-row").length ) {
    $(".stats-row__stat").each(function() {
      var stat = $(this).find(".number span")[0],
        number = $(this).find(".number").attr("data-number");

      var countUp = new CountUp(stat, number);

      /* global Waypoint:false */
      new Waypoint({
        element: $(this).parents(".stats-row")[0],
        handler: function() {
          if (!countUp.error) {
            countUp.start();
          } else {
            // eslint-disable-next-line
            console.error(countUp.error);
          }
        },
        offset: 500
      });
    });
  }

  // Logo Slider
  if( $(".logo-slider").length ) {
    $(".logo-slider__slider").slick({
      autoplay: true,
      autoplaySpeed: 5000,
      slidesToShow: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  }

  // Accordions
  $(".accordion__header").on("click", function() {
    $(this).toggleClass("open");
    $(this).siblings(".accordion__content").slideToggle();
  });

  $(".accordion__header").on("keyup", function(e) {
    if( e.which == 13) {
      $(this).toggleClass("open");
      $(this).siblings(".accordion__content").slideToggle();
    }
  });
});
