<?php
class MessageModel {
    function save($p) {
        $q = db()->prepare("INSERT INTO contacts (name,email,phone,msg,created) VALUES (?,?,?,?,NOW())");
        return $q->execute([$p['name'], $p['email'], $p['phone'], $p['message']]);
    }
}
