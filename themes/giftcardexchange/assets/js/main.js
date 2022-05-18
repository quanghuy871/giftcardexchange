jQuery(document).ready(function($) {
  let body = $('body');
  let screen_admin_min = 783;
  let adminBarHeight = 0;

  // Calculate admin bar
  if (body.hasClass('admin-bar')) {
    if ($(window).width() > screen_admin_min) {
      adminBarHeight = 32;
    } else {
      adminBarHeight = 46;
    }
  }

  // Window events
  let onWindowEvents = function(foo, isReady, isLoad, isResize, isScroll) {
    if (isReady) {
      $(document).ready(foo);
    }

    if (isLoad) {
      $(window).bind('load', foo);
    }

    if (isResize) {
      let throttleResizing = _.throttle(foo, 100);
      $(window).bind('resize', throttleResizing);
    }

    if (isScroll) {
      let throttleScroll = _.throttle(foo, 10);
      $(window).bind('scroll', throttleScroll);
    }
  };

  // Balance elements
  let balanceElements = function(container, clr, gapDelta) {
    clr = (typeof clr !== 'undefined' ? clr : false);
    gapDelta = (typeof gapDelta !== 'undefined' ? gapDelta : 10);
    let currentTallest = 0,
      currentRowStart = 0,
      rowDivs = [],
      el,
      currentDiv,
      topPosition = 0;
    let c = $(container).filter(':visible');
    if (!c.length) {
      return false;
    }
    if (!clr) {
      c.css('height', 'auto');
    } else {
      c.removeAttr('style');
    }
    c.each(function() {
      el = $(this);
      topPosition = el.offset().top;
      if ((currentRowStart < (topPosition + gapDelta)) && (currentRowStart > (topPosition - gapDelta))) {
        rowDivs.push(el);
        currentTallest = (currentTallest < el.outerHeight()) ? (el.outerHeight()) : (currentTallest);
      } else {
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
          rowDivs[currentDiv].css('height', currentTallest + 'px');
        }
        rowDivs.length = 0; // empty the array
        currentRowStart = topPosition;
        currentTallest = el.outerHeight();
        rowDivs.push(el);
      }
      for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
        rowDivs[currentDiv].css('height', currentTallest + 'px');
      }
    });
    return true;
  };

  onWindowEvents(function() {
    balanceElements($('.balance-elements'));
  }, 1, 0, 1, 0);

  // Go to element
  $.fn.goToElement = function(offset) {
    offset = 70;
    if ($(this).length) {
      let offsetTop = $(this).offset().top,
        args = {
          scrollTop: (offsetTop - adminBarHeight - offset),
        };
      $('html, body').animate(args, 'fast');
    }
    return this;
  };
  body.on('click', '.anchor-link', function(e) {
    let _this = $(this);
    if (0 === _this.attr('href').indexOf('#')) {
      e.preventDefault();
      $(_this.attr('href')).goToElement();
    }
  });

  // Selects
  $('.select2').select2({
    minimumResultsForSearch: 20,
  });

  // Form and Button
  $('.form--demo').hide();
  $('.btn-offer').addClass('active');

  $(document).on('click', '.btn-redeem', function(e) {
    e.preventDefault();
    $('.btn-offer').addClass('active');
    $('.btn-demo').removeClass('active');
    $('.section-form__wrapper').find('.form--offer').show();
    $('.section-form__wrapper').find('.form--demo').hide();
    const _this = $(this);
    $('html, body').animate({scrollTop: eval($('#' + _this.attr('target')).offset().top - 70)}, 100);
  });

  $(document).on('click', '.btn-demo-top', function(e) {
    e.preventDefault();
    $('.btn-offer').removeClass('active');
    $('.btn-demo').addClass('active');
    $('.section-form__wrapper').find('.form--offer').hide();
    $('.section-form__wrapper').find('.form--demo').show();
    const _this = $(this);
    $('html, body').animate({scrollTop: eval($('#' + _this.attr('target')).offset().top - 70)}, 100);
  });

  $(document).on('click', '.btn-offer', function(e) {
    e.preventDefault();
    $('.btn-demo').removeClass('active');

    const _this = $(this);
    _this.addClass('active');
    _this.closest('.section-form__wrapper').find('.form--offer').show();
    _this.closest('.section-form__wrapper').find('.form--demo').hide();
  });

  $(document).on('click', '.btn-demo', function(e) {
    e.preventDefault();
    $('.btn-offer').removeClass('active');

    const _this = $(this);
    _this.addClass('active');
    _this.closest('.section-form__wrapper').find('.form--offer').hide();
    _this.closest('.section-form__wrapper').find('.form--demo').show();
  });


  // Swiper
  let swiper2 = new Swiper('.mySwiper-2', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 8,
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,

      },
    },
  });

  let swiper3 = new Swiper('.mySwiper-3', {
    loop: true,
    navigation: {
      prevEl: '.swiper-button-prev-compare',
      nextEl: '.swiper-button-next-compare',
    },
  });

  let swiper4 = new Swiper('.mySwiper-4', {
    loop: true,
    navigation: {
      prevEl: '.swiper-button-prev-deals',
      nextEl: '.swiper-button-next-deals',
    },
  });
});
