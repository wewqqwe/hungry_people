<?php
class Form {
    function booking() {
        $p = [
            'name' => trim($_POST['name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'people' => (int)($_POST['people'] ?? 0),
            'date' => $_POST['date'] ?? '',
            'time' => $_POST['time'] ?? ''
        ];
        if ($p['name'] == '' || !filter_var($p['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['ok' => 0, 'msg' => 'Заполните имя и email']);
            return;
        }
        (new BookingModel)->save($p);
        $txt = "Новая бронь: {$p['name']}, {$p['email']}, тел {$p['phone']}, гостей {$p['people']}, {$p['date']} {$p['time']}";
        @mail('veprikovegor7@gmail.com', 'Новая бронь', $txt, $this->headers());
        echo json_encode(['ok' => 1, 'msg' => 'Заявка отправлена']);
    }

    function contact() {
        $p = [
            'name' => trim($_POST['name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'message' => trim($_POST['message'] ?? '')
        ];
        if ($p['name'] == '' || !filter_var($p['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['ok' => 0, 'msg' => 'Заполните имя и email']);
            return;
        }
        (new MessageModel)->save($p);
        $txt = "Сообщение от {$p['name']} ({$p['email']}): {$p['message']}";
        @mail('veprikovegor7@gmail.com', 'Сообщение с сайта', $txt, $this->headers());
        echo json_encode(['ok' => 1, 'msg' => 'Сообщение отправлено']);
    }

    function headers() {
        return "From: Hungry People <no-reply@hungrypeople.com>\r\nContent-Type: text/plain; charset=utf-8";
    }
}
