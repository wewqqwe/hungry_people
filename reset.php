<?php
require __DIR__ . '/vendor/autoload.php';

$token = $_GET['token'] ?? '';
$user = (new User)->findByToken($token);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Смена пароля - Hungry People</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="reset">
  <div class="reset__box">
    <a href="index.php"><img class="reset__logo" src="img/logo.svg" alt="Hungry People"></a>

    <?php if (!$user) { ?>
      <h3 class="auth__title">Ссылка не работает</h3>
      <p class="text-center">Похоже, пароль уже меняли или ссылка неверная. Запросите её заново.</p>
      <div class="text-center"><a href="index.php" class="btn btn--yellow">На главную</a></div>
    <?php } else { ?>
      <h3 class="auth__title">Новый пароль</h3>
      <form id="resetForm">
        <input type="hidden" name="token" value="<?= $token ?>">
        <input type="password" name="password" class="form-control" placeholder="Новый пароль">
        <input type="password" name="password2" class="form-control" placeholder="Повторите пароль">
        <button type="submit" class="btn btn--yellow" style="width:100%">Сохранить</button>
      </form>
    <?php } ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script>
$('#resetForm').on('submit', function (e) {
  e.preventDefault();
  if ($(this).find('[name=password]').val() != $(this).find('[name=password2]').val()) {
    alert('Пароли не совпадают');
    return;
  }
  $.post('ajax.php?do=reset', $(this).serialize(), function (r) {
    alert(r.msg);
    if (r.ok) location.href = 'index.php';
  }, 'json');
});
</script>
</body>
</html>
