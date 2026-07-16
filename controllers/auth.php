<?php
class Auth {
    function register() {
        $email = trim($_POST['email'] ?? '');
        $pass = $_POST['password'] ?? '';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($pass) < 4) {
            echo json_encode(['ok' => 0, 'msg' => 'Неверный email или короткий пароль']);
            return;
        }
        $u = new User();
        if ($u->find($email)) {
            echo json_encode(['ok' => 0, 'msg' => 'Такой email уже есть']);
            return;
        }
        $u->add($email, $pass);
        echo json_encode(['ok' => 1, 'msg' => 'Готово, теперь войдите']);
    }

    function login() {
        $email = trim($_POST['email'] ?? '');
        $pass = $_POST['password'] ?? '';
        $row = (new User)->find($email);
        if ($row && password_verify($pass, $row['password'])) {
            $_SESSION['uid'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            echo json_encode(['ok' => 1]);
        } else {
            echo json_encode(['ok' => 0, 'msg' => 'Неверный email или пароль']);
        }
    }

    function logout() {
        session_destroy();
        echo json_encode(['ok' => 1]);
    }

    function forgot() {
        $email = trim($_POST['email'] ?? '');
        $u = new User();
        if (!$u->find($email)) {
            echo json_encode(['ok' => 0, 'msg' => 'Такой email не найден']);
            return;
        }
        $token = md5(uniqid('', true));
        $u->setToken($email, $token);
        $dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
        $link = 'http://' . $_SERVER['HTTP_HOST'] . $dir . '/reset.php?token=' . $token;
        $headers = "From: Hungry People <no-reply@hungrypeople.com>\r\nContent-Type: text/plain; charset=utf-8";
        @mail($email, 'Смена пароля', 'Чтобы сменить пароль, перейдите по ссылке: ' . $link, $headers);
        echo json_encode(['ok' => 1, 'msg' => 'Письмо со ссылкой отправлено на почту']);
    }

    function reset() {
        $token = $_POST['token'] ?? '';
        $pass = $_POST['password'] ?? '';
        if (strlen($pass) < 4) {
            echo json_encode(['ok' => 0, 'msg' => 'Пароль слишком короткий']);
            return;
        }
        $u = new User();
        $row = $u->findByToken($token);
        if (!$row) {
            echo json_encode(['ok' => 0, 'msg' => 'Ссылка недействительна']);
            return;
        }
        $u->newPassword($row['id'], $pass);
        echo json_encode(['ok' => 1, 'msg' => 'Пароль изменён']);
    }
}
