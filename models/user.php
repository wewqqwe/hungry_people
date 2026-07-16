<?php
class User {
    function find($email) {
        $q = db()->prepare("SELECT * FROM users WHERE email = ?");
        $q->execute([$email]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }
    function add($email, $pass) {
        $q = db()->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        return $q->execute([$email, password_hash($pass, PASSWORD_DEFAULT)]);
    }

    function setToken($email, $token) {
        $q = db()->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
        return $q->execute([$token, $email]);
    }

    function findByToken($token) {
        $q = db()->prepare("SELECT * FROM users WHERE reset_token = ?");
        $q->execute([$token]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    function newPassword($id, $pass) {
        $q = db()->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE id = ?");
        return $q->execute([password_hash($pass, PASSWORD_DEFAULT), $id]);
    }
}
