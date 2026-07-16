<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

header('Content-Type: application/json');
$do = $_GET['do'] ?? '';

if ($do == 'register') {
    (new Auth)->register();
} else if ($do == 'login') {
    (new Auth)->login();
} else if ($do == 'logout') {
    (new Auth)->logout();
} else if ($do == 'forgot') {
    (new Auth)->forgot();
} else if ($do == 'reset') {
    (new Auth)->reset();
} else if ($do == 'booking') {
    (new Form)->booking();
} else if ($do == 'contact') {
    (new Form)->contact();
} else if ($do == 'menu') {
    (new Content)->menu();
} else {
    echo json_encode(['ok' => 0, 'msg' => 'no action']);
}
