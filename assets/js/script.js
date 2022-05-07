// ローディング判定
; (function ($) {
  jQuery(window).on('load', function () {
    jQuery('body').attr('data-loading', 'true')
  })

  jQuery(function () {
    // スクロール判定
    jQuery(window).on('scroll', function () {
      if (100 < jQuery(this).scrollTop()) {
        jQuery('body').attr('data-scroll', 'true')
      } else {
        jQuery('body').attr('data-scroll', 'false')
      }
    })

    /* スムーススクロール */
    jQuery('a[href^="#"]').click(function () {
      let header = jQuery('.js-header').height()
      let speed = 300
      let id = jQuery(this).attr('href')
      let target = jQuery('#' == id ? 'html' : id)
      let position = jQuery(target).offset().top - header
      if ('fixed' !== jQuery('#header').css('position')) {
        position = jQuery(target).offset().top
      }
      if (0 > position) {
        position = 0
      }
      jQuery('html, body').animate(
        {
          scrollTop: position,
        },
        speed
      )
      return false
    })

    /* 電話リンク */
    let ua = navigator.userAgent
    if (ua.indexOf('iPhone') < 0 && ua.indexOf('Android') < 0) {
      jQuery('a[href^="tel:"]')
        .css('cursor', 'default')
        .on('click', function (e) {
          e.preventDefault()
        })
    }
    //ヘッダー分の高さコンテンツを下げる
    jQuery(function ($) {
      var height = jQuery('.l-header').height()
      jQuery('body').css('margin-top', height)
    })

    // ヘッダーの透過設定
    $(window).scroll(function () {
      let header = $('#js-header');
      let mv = $('.main-visual').innerHeight();
      if ($(this).scrollTop() > mv) {
        // 指定px以上のスクロールでヘッダーを非透過
        header.addClass('header--opacity-offset');
      } else {
        // 画面が指定pxより上ならヘッダーを透過
        header.removeClass('header--opacity-offset');
      }
    });

    // スライダー
    let mvSwipeOption = {
      loop: true,
      effect: 'fade',
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
      speed: 2000,
    }

    let cardSwipeOption = {
      loop: true,
      effect: 'slide',
      slidesPerView: 1,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
      speed: 2000,
    }

    new Swiper('.p-mv-swiper', mvSwipeOption);
    new Swiper('.p-media-swiper', cardSwipeOption);

    // トップボタン
    var topBtn = $('#js-pagetop');
    topBtn.hide();

    // ボタンの表示設定
    $(window).scroll(function () {
      if ($(this).scrollTop() > 1) {
        // 指定px以上のスクロールでボタンを表示
        topBtn.fadeIn();
      } else {
        // 画面が指定pxより上ならボタンを非表示
        topBtn.fadeOut();
      }
    });

    // ボタンをクリックしたらスクロールして上に戻る
    topBtn.click(function () {

      $('body,html').animate({
        scrollTop: 0
      }, 300, 'swing');
      return false;
    });

    //モーダルメニュー
    $("#js-modal-open").click(function () {
      $(this).toggleClass("is-open");
      $(".p-modal__bg").fadeToggle();
      $(".p-modal__list").fadeToggle();
      $("html").toggleClass("is-fixed");
      return false;
    });

    // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)
    $(document).on('click', 'a[href*="#"]', function () {
      let time = 400;
      let header = $('header').innerHeight();
      let target = $(this.hash);
      if (!target.length) return;
      let targetY = target.offset().top - header;
      $('html,body').animate({ scrollTop: targetY }, time, 'swing');
      return false;
    });

    // タブの切り替え（idでもclassでも可能）
    $(function () {
      $(".js-tab-content.is-active").show();
      $(".js-tab").on("click", function () {
        $(".js-tab.is-active").removeClass("is-active");
        $(this).addClass("is-active");
        $(".js-tab-content.is-active").hide();
        $(".js-tab-content.is-active").removeClass('is-active');
        let target = $(this).attr("data-target");
        console.log(target);
        $(target).addClass('is-active');
        $(target).fadeIn();
        return false;
      });
    });

    $(document).on('wpcf7invalid', function() {
      $.ajax().always(function () {
        $('.wpcf7-form-control-wrap').each(function (index, el) {
          if ($(el).find('.wpcf7-not-valid-tip').length) {
            $(el).find('.wpcf7-not-valid-tip').insertBefore($('.js-error'))
          }
        });
      });
    });

  })
})(jQuery)

// スライダー（ギャラリー）

let count = document.querySelector('.js-count').childElementCount;
//メイン
var slider = new Swiper ('.p-gallery__slider', {
  slidesPerView: 1,
  centeredSlides: true,
  loop: true,
  loopedSlides: count,
  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
  },
});

//サムネイル
var thumbs = new Swiper ('.p-gallery__thumbs', {
  slidesPerView: 'auto',
  spaceBetween: 24,
  centeredSlides: true,
  loop: true,
  loopedSlides: count,
  slideToClickedSlide: true,
  breakpoints: {
    768: {
      slidesPerView: 1,
      spaceBetween: 8,
      centeredSlides: false,
    },
  },
});

//4系～
//メインとサムネイルを紐づける
slider.controller.control = thumbs;
thumbs.controller.control = slider;
