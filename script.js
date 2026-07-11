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

let tabs = document.querySelectorAll('.tab');
let food = document.querySelectorAll('.food-item');
let limit = 21;

for (let i = 0; i < food.length; i++) {
  if (i >= limit) food[i].style.display = 'none';
}

tabs.forEach(function (t) {
  t.addEventListener('click', function () {
    for (let j = 0; j < tabs.length; j++) tabs[j].classList.remove('on');
    t.classList.add('on');
    var cat = t.getAttribute('data-cat');
    for (let i = 0; i < food.length; i++) {
      if (cat == 'all' || food[i].getAttribute('data-category') == cat) {
        food[i].style.display = '';
      } else {
        food[i].style.display = 'none';
      }
    }
  });
});

document.getElementById('bookingForm').onsubmit = function (e) {
  e.preventDefault();
  alert('Спасибо, заявку получили!');
  this.reset();
};
