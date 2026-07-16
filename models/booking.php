<?php
class BookingModel {
    function save($p) {
        $q = db()->prepare("INSERT INTO bookings (name,email,phone,people,bdate,btime,created) VALUES (?,?,?,?,?,?,NOW())");
        return $q->execute([$p['name'], $p['email'], $p['phone'], $p['people'], $p['date'], $p['time']]);
    }
}
