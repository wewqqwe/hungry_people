<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

$about = (new StaticModel)->get('about');
$team = (new StaticModel)->get('team');
$specs = (new SpecialityModel)->all();
$dishes = (new MenuModel)->onMain();
$events = (new EventModel)->all();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hungry People</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header" id="home">
  <nav class="navbar navbar-expand-lg menu">
    <div class="container">
      <a class="navbar-brand menu__logo menu__logo--mobile d-lg-none" href="#home">
        <img class="menu__logo-img" src="img/logo.svg" alt="Hungry People">
      </a>

      <button class="navbar-toggler menu__toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav menu__nav menu__nav--left">
          <li class="nav-item menu__item"><a class="nav-link menu__link menu__link--active" href="#home">Home</a></li>
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#about">About</a></li>
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#team">Team</a></li>
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#booking">Booking</a></li>
        </ul>

        <a class="navbar-brand menu__logo menu__logo--center d-none d-lg-block" href="#home">
          <img class="menu__logo-img" src="img/logo.svg" alt="Hungry People">
        </a>

        <ul class="navbar-nav menu__nav menu__nav--right">
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#menu">Menu</a></li>
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#gallery">Galerie</a></li>
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#events">Events</a></li>
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#contact">Contact</a></li>
          <?php if (isset($_SESSION['uid'])) { ?>
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#" id="logoutLink">Logout</a></li>
          <?php } else { ?>
          <li class="nav-item menu__item"><a class="nav-link menu__link" href="#" data-toggle="modal" data-target="#auth">Login</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="banner">
    <div class="banner__hours"><span class="banner__hours-text">Mon - Fri: 8PM - 10PM, Sat - Sun: 8PM - 3AM</span></div>

    <p class="banner__subtitle">Restaurant</p>
    <h1 class="banner__title">Hungry People</h1>
    <div class="banner__line"></div>

    <div class="banner__buttons">
      <a href="#booking" class="btn btn--yellow">Book Table</a>
      <a href="#about" class="btn btn--outline">Explore</a>
    </div>

    <div class="socials banner__socials">
      <a class="socials__link" href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a class="socials__link" href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
      <a class="socials__link" href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>

    <a href="#about" class="banner__arrow"><i class="fas fa-chevron-down"></i></a>
  </div>
</header>

<section class="about" id="about">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="about__content">
          <h2 class="about__title"><?= $about['title'] ?></h2>
          <div class="about__line"></div>
          <p class="about__text"><?= $about['subtitle'] ?></p>
          <p class="about__text"><?= $about['text'] ?></p>
        </div>
      </div>
      <div class="col-lg-5 text-center">
        <div class="about__photo">
          <img class="about__photo-img" src="img/<?= $about['image'] ?>" alt="About Hungry People">
          <span class="about__frame"></span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="team" id="team">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 text-center">
        <div class="about__photo">
          <img class="about__photo-img" src="img/<?= $team['image'] ?>" alt="">
          <span class="about__frame"></span>
        </div>
      </div>
      <div class="col-lg-7 text-center">
        <h2><?= $team['title'] ?></h2>
        <div class="line"></div>
        <p><?= $team['subtitle'] ?></p>
        <p><?= $team['text'] ?></p>
      </div>
    </div>
  </div>
</section>

<section class="booking" id="booking">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h2 class="text-center">Book a Table</h2>
        <div class="line"></div>
        <form id="bookingForm">
          <div class="row">
            <div class="col-6"><input type="text" name="name" class="form-control myinput" placeholder="Name"></div>
            <div class="col-6"><input type="email" name="email" class="form-control myinput" placeholder="Email"></div>
            <div class="col-6"><input type="tel" name="phone" class="form-control myinput" placeholder="Phone"></div>
            <div class="col-6"><input type="number" name="people" class="form-control myinput" placeholder="People"></div>
            <div class="col-6"><input type="date" name="date" class="form-control myinput"></div>
            <div class="col-6"><input type="time" name="time" class="form-control myinput"></div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn--yellow" style="margin-top:15px">Book Now</button>
          </div>
        </form>
      </div>
      <div class="col-lg-6 text-center">
        <div class="about__photo">
          <img class="about__photo-img" src="img/booking.jpg" alt="">
          <span class="about__frame"></span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="spec" id="specialities">
  <div class="container">
    <p class="spec__label">Specialities</p>
    <div class="spec__slider">
      <?php foreach ($specs as $s) { ?>
      <div class="spec__slide">
        <div class="spec__left">
          <div class="spec__photo"><img src="img/<?= $s['image'] ?>" alt=""><span class="spec__frame"></span></div>
        </div>
        <div class="spec__right">
          <h2 class="spec__name"><?= $s['title'] ?></h2>
          <div class="spec__line"></div>
          <p class="spec__lead"><?= $s['subtitle'] ?></p>
          <p class="spec__desc"><?= $s['text'] ?></p>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<section class="food" id="menu">
  <div class="container">
    <h2 class="text-center">Delicious Menu</h2>
    <div class="line"></div>
    <p class="text-center food__sub">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae culpa eum nemo eius, dicta soluta.</p>

    <div class="food__tabs text-center">
      <button class="food__tab" data-cat="pizza">Pizza</button>
      <button class="food__tab" data-cat="beer">Beer</button>
      <button class="food__tab" data-cat="wine">Wine</button>
      <button class="food__tab" data-cat="desert">Desert</button>
      <button class="food__tab" data-cat="soupe">Soupe</button>
      <button class="food__tab" data-cat="drinks">Drinks</button>
      <button class="food__tab" data-cat="pasta">Pasta</button>
    </div>

    <div class="row" id="foodList">
      <?php foreach ($dishes as $d) { ?>
      <div class="col-md-4 food__item" data-category="<?= $d['category'] ?>">
        <p class="food__dish"><span><?= $d['title'] ?></span> <b><?= $d['price'] ?> USD</b></p>
        <small><?= $d['subtitle'] ?></small>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<section class="events" id="events">
  <div class="container">
    <h2 class="events__title">Private Events</h2>
    <div class="line"></div>
    <div class="events__grid">
      <?php $n = 0; foreach ($events as $ev) { $n++; ?>
      <div class="events__card<?php if ($n == 2) echo ' events__card--left'; ?>">
        <div class="events__photo" style="background-image: url('img/<?= $ev['image'] ?>')"></div>
        <div class="events__bar events__bar--<?php echo $n == 2 ? 'bottom' : 'top'; ?>"><span><?= $ev['title'] ?></span></div>
        <span class="events__frame"></span>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<section class="gallery" id="gallery">
  <div class="row no-gutters">
    <div class="col-md-3 col-6"><div class="gallery__item"><img src="img/gallery-1.png" alt=""></div></div>
    <div class="col-md-3 col-6"><div class="gallery__item"><img src="img/gallery-2.png" alt=""></div></div>
    <div class="col-md-3 col-6"><div class="gallery__item"><img src="img/gallery-3.png" alt=""></div></div>
    <div class="col-md-3 col-6"><div class="gallery__item"><img src="img/gallery-4.png" alt=""></div></div>
  </div>
</section>

<section class="contact" id="contact">
  <div class="container">
    <h2 class="text-center">Contact</h2>
    <div class="line"></div>
    <form id="contactForm">
      <div class="row">
        <div class="col-md-4"><input type="text" name="name" class="form-control myinput" placeholder="Name"></div>
        <div class="col-md-4"><input type="email" name="email" class="form-control myinput" placeholder="Email"></div>
        <div class="col-md-4"><input type="tel" name="phone" class="form-control myinput" placeholder="Phone"></div>
        <div class="col-12"><textarea name="message" class="form-control myinput" rows="4" placeholder="Message"></textarea></div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn--yellow" style="margin-top:15px">Send</button>
      </div>
    </form>
    <div class="contact__info text-center">
      <span><i class="fas fa-map-marker-alt"></i> 5th London Boulevard, U.K.</span>
      <span><i class="fas fa-phone"></i> +40 729 131 637</span>
      <span><i class="fas fa-envelope"></i> office@hungrypeople.com</span>
    </div>
  </div>
</section>

<footer class="foot" id="map">
  <iframe class="foot__map" src="https://yandex.ru/map-widget/v1/?ll=37.617635%2C55.755814&z=15&pt=37.617635,55.755814,pm2rdm" frameborder="0"></iframe>
  <div class="foot__bar">© Hungry People 2019</div>
</footer>

<div class="modal fade" id="auth" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="auth__head">
        <ul class="nav nav-tabs" id="authTabs">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#signin">Sign in</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#signup">Sign up</a></li>
        </ul>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h3 class="auth__title">Login</h3>
        <div class="tab-content">
          <div class="tab-pane active" id="signin">
            <form id="loginForm">
              <input type="email" name="email" class="form-control" placeholder="Email">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="auth__row">
                <a href="#" class="auth__forgot">Forgot Password</a>
                <button type="submit" class="btn btn--yellow">Sign in</button>
              </div>
            </form>
            <form id="forgotForm" style="display:none">
              <p class="auth__hint">Введите email, пришлём ссылку для смены пароля</p>
              <input type="email" name="email" class="form-control" placeholder="Email">
              <div class="auth__row">
                <a href="#" class="auth__forgot" id="backToLogin">Назад</a>
                <button type="submit" class="btn btn--yellow">Send</button>
              </div>
            </form>
          </div>
          <div class="tab-pane" id="signup">
            <form id="regForm">
              <label>Full Name</label>
              <input type="text" name="name" class="form-control">
              <label>Email address</label>
              <input type="email" name="email" class="form-control">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
              <label>Confirm Password</label>
              <input type="password" name="password2" class="form-control">
              <label>Mobile Number</label>
              <input type="tel" name="phone" class="form-control">
              <div class="text-right">
                <button type="submit" class="btn btn--yellow">Sign up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>
