$(function () {
  $(window).on('scroll', function () {
    if ($(window).scrollTop() > 50) {
      $('.menu').addClass('menu--fixed');
    } else {
      $('.menu').removeClass('menu--fixed');
    }
  });
});

$('a[href^="#"]').click(function (e) {
  var id = $(this).attr('href');
  if (id == '#') return;
  var block = $(id);
  if (block.length) {
    e.preventDefault();
    $('html,body').animate({ scrollTop: block.offset().top - 70 }, 500);
    $('#navbarNav').collapse('hide');
  }
});

let tabs = document.querySelectorAll('.food__tab');

tabs.forEach(function (t) {
  t.addEventListener('click', function () {
    for (let j = 0; j < tabs.length; j++) tabs[j].classList.remove('food__tab--on');
    t.classList.add('food__tab--on');
    var cat = t.getAttribute('data-cat');
    $.get('ajax.php?do=menu&cat=' + cat, function (r) {
      var html = '';
      for (var i = 0; i < r.length; i++) {
        html += '<div class="col-md-4 food__item">';
        html += '<p class="food__dish"><span>' + r[i].title + '</span> <b>' + r[i].price + ' USD</b></p>';
        html += '<small>' + r[i].subtitle + '</small>';
        html += '</div>';
      }
      $('#foodList').html(html);
    }, 'json');
  });
});

$('#logoutLink').on('click', function (e) {
  e.preventDefault();
  $.get('ajax.php?do=logout', function () { location.reload(); });
});

$('#bookingForm').on('submit', function (e) {
  e.preventDefault();
  $.post('ajax.php?do=booking', $(this).serialize(), function (r) {
    alert(r.msg);
    if (r.ok) document.getElementById('bookingForm').reset();
  }, 'json');
});

$('#contactForm').on('submit', function (e) {
  e.preventDefault();
  $.post('ajax.php?do=contact', $(this).serialize(), function (r) {
    alert(r.msg);
    if (r.ok) document.getElementById('contactForm').reset();
  }, 'json');
});

$('#regForm').on('submit', function (e) {
  e.preventDefault();
  if ($(this).find('[name=password]').val() != $(this).find('[name=password2]').val()) {
    alert('Passwords do not match');
    return;
  }
  $.post('ajax.php?do=register', $(this).serialize(), function (r) {
    alert(r.msg);
    if (r.ok) $('#authTabs a[href="#signin"]').tab('show');
  }, 'json');
});

$('#loginForm').on('submit', function (e) {
  e.preventDefault();
  $.post('ajax.php?do=login', $(this).serialize(), function (r) {
    if (r.ok) { location.reload(); } else { alert(r.msg); }
  }, 'json');
});

$('#loginForm .auth__forgot').on('click', function (e) {
  e.preventDefault();
  $('#loginForm').hide();
  $('#forgotForm').show();
});

$('#backToLogin').on('click', function (e) {
  e.preventDefault();
  $('#forgotForm').hide();
  $('#loginForm').show();
});

$('#forgotForm').on('submit', function (e) {
  e.preventDefault();
  $.post('ajax.php?do=forgot', $(this).serialize(), function (r) {
    alert(r.msg);
    if (r.ok) {
      $('#forgotForm').hide();
      $('#loginForm').show();
    }
  }, 'json');
});

$('.spec__slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  rows: 0,
  arrows: false,
  dots: true,
  fade: true,
  autoplay: true,
  autoplaySpeed: 4000
});
