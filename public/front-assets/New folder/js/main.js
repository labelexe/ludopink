(function ($) {
  "use strict"
  jQuery(document).ready(function () {

    // sticky menu
    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop();
      if (scroll < 500) {
        $('#main-header').removeClass('stickyMenu');

      }
      else {
        $('#main-header').addClass('stickyMenu');
      }
    });

    // smooth-scroll
    $('.main-menu ul li a').on('click', function (event) {
      var linkHref = $(this).attr('href');
      var headerHeight = $('.header-area').outerHeight();
      $('html, body').animate({
        scrollTop: $(linkHref).offset().top - headerHeight
      }, 2000, 'easeInOutExpo');
      event.preventDefault();
    });

    // mobile-menu
    $('#mobile-menu').meanmenu({
      meanMenuContainer: '.mobile-menu',
      meanScreenWidth: "991"
    });

    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });

    // ToTop [Hand-Code].
    $('.scrollup').on('click', function () {
      $("html").animate({
        "scrollTop": '0'
      }, 100);
    });
    $(window).on('scroll', function () {
      var toTopVisible = $('html').scrollTop();
      if (toTopVisible > 500) {
        $('.scrollup').fadeIn();
      } else {
        $('.scrollup').fadeOut();
      }
    });

    // MouseHover Animation home 2
    var hoverLayer = $(".hero-section2");
    var heroImgOne = $(".htr2");
    var heroImgTwo = $(".htr4");
    var heroImgThree = $(".htr6");
    var heroImgFour = $(".htr3");
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 100;
      var valueY = (e.pageY * -1) / 120;
      heroImgOne.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 60;
      var valueY = (e.pageY * -1) / 80;
      heroImgTwo.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 40;
      var valueY = (e.pageY * -1) / 60;
      heroImgThree.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 80;
      var valueY = (e.pageY * -1) / 100;
      heroImgFour.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });

    // MouseHover Animation home 3
    var hoverLayer = $(".hero-section3");
    var heroImgOne3 = $(".htr1");
    var heroImgTwo3 = $(".htr2");
    var heroImgThree3 = $(".htr3");
    var heroImgFour3 = $(".htr6");
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 100;
      var valueY = (e.pageY * -1) / 120;
      heroImgOne3.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 60;
      var valueY = (e.pageY * -1) / 80;
      heroImgTwo3.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 40;
      var valueY = (e.pageY * -1) / 60;
      heroImgThree3.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 80;
      var valueY = (e.pageY * -1) / 100;
      heroImgFour3.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });

    // MouseHover Animation home 3 about
    var hoverLayer = $(".about-area3");
    var heroImgOne4 = $(".al1");
    var heroImgTwo4 = $(".al2");
    var heroImgThree4 = $(".al3");
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 100;
      var valueY = (e.pageY * -1) / 120;
      heroImgOne4.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 60;
      var valueY = (e.pageY * -1) / 80;
      heroImgTwo4.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });
    hoverLayer.mousemove(function (e) {
      var valueX = (e.pageX * -1) / 40;
      var valueY = (e.pageY * -1) / 60;
      heroImgThree4.css({
        transform: "translate3d(" + valueX + "px," + valueY + "px, 0)"
      });
    });



    // hero-slider
    $('.hero-slider-active').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      infinite: true,
      fade: true,
      speed: 1000,
      centerMode: false,
      variableWidth: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,

          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,
            autoplay: true,
            dots: false

          }
        }
      ]
    });

    // hero2-slider
    $('.hero2-slider-active').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      fade: true,
      arrows: false,
      infinite: true,
      speed: 1000,
      centerMode: false,
      variableWidth: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,

          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,
            autoplay: true,
            dots: false

          }
        }
      ]
    });

    // hero3-slider
    $('.hero3-slider-active').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      fade: true,
      infinite: true,
      speed: 1000,
      centerMode: false,
      variableWidth: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,

          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,
            autoplay: true,
            dots: false

          }
        }
      ]
    });

    // testi-slider
    $('.testi-slider-active').slick({
      dots: true,
      infinite: false,
      speed: 1000,
      slidesToShow: 2,
      slidesToScroll: 2,
      arrows: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    // home3-blog-slider
    $('.home3-blog-slider').slick({
      dots: true,
      infinite: false,
      speed: 1000,
      slidesToShow: 3,
      slidesToScroll: 2,
      arrows: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    // screenshot slider
    $('.ss-active').slick({
      dots: false,
      infinite: true,
      touchThreshold: 100,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 3,
      centerMode: true,
      nextArrow: '<button class="slick-next"><i class="fas fa-arrow-right"></i></button>',
      prevArrow: '<button class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
      responsive: [{
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      ]
    });
  });

  // blog-slider-active
  $('.blog-thumbnail-slider').slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<i class="fas fa-arrow-left prev-arrow"></i>',
    nextArrow: '<i class="fas fa-arrow-right next-arrow"></i>',
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  // home2 testi2 slider
  $('.testislider2-active').slick({
    slidesToShow: 1,
    dots: true,
    arrows: false,
    infinite: true,
    speed: 1000,
    // variableWidth: false,
    prevArrow: '<span class="slick-btn1"><i class="fas fa-arrow-left"></i></span>',
    nextArrow: '<span class="slick-btn2"><i class="fas fa-arrow-right"></i></span>',
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          centerMode: false,
          variableWidth: false,

        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          centerMode: false,
          variableWidth: false,

        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          centerMode: false,
          variableWidth: false,

        }
      }
    ]
  });

  // home3 testi3 slider
  $('.testi2-slider-active').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    centerMode: false,
    variableWidth: false,
    prevArrow: '<span class="slick-btn1"><i class="fas fa-arrow-left"></i></span>',
    nextArrow: '<span class="slick-btn2"><i class="fas fa-arrow-right"></i></span>'
  });

  // contact popup
  $('.test-popup-link').magnificPopup({
    type: 'iframe',
    // other options
    iframe: {
      markup: '<div class="mfp-iframe-scaler">' +
        '<div class="mfp-close"></div>' +
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
        '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button

      patterns: {
        youtube: {
          index: 'youtube.com/',

          id: 'v=',

          src: 'https://www.youtube.com/embed/%id%?autoplay=1'
        },
        vimeo: {
          index: 'vimeo.com/',
          id: '/',
          src: '//player.vimeo.com/video/%id%?autoplay=1'
        },
        gmaps: {
          index: '//maps.google.',
          src: '%id%&output=embed'
        }

      },

      srcAction: 'iframe_src',
    }
  });

  jQuery(window).on('load', function () {

    // WOW JS
    new WOW().init();

    // Preloader
    var preLoder = $("#preloader");
    preLoder.fadeOut(0);

  });

  $('.center').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });

})(jQuery);
