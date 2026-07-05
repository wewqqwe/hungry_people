// Hungry People — скрипты первого экрана

$(function () {
  var $menu = $('.menu');

  $(window).on('scroll', function () {
    if ($(window).scrollTop() > 50) {
      $menu.addClass('menu--fixed');
    } else {
      $menu.removeClass('menu--fixed');
    }
  });

  $('a[href^="#"]').not('[href="#"]').on('click', function (e) {
    var target = $($(this).attr('href'));
    if (target.length) {
      e.preventDefault();
      var offset = 70; 
      $('html, body').animate({
        scrollTop: target.offset().top - offset
      }, 600);

      $('#navbarNav').collapse('hide');
    }
  });
});
