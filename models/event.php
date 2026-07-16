<?php
class EventModel {
    function all() {
        $q = db()->query("SELECT * FROM events ORDER BY id");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}
