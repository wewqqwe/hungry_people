<?php
class MenuModel {
    function onMain() {
        $q = db()->query("SELECT * FROM menu WHERE on_main = 1 ORDER BY id LIMIT 21");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    function byCategory($cat) {
        $q = db()->prepare("SELECT * FROM menu WHERE category = ? ORDER BY id");
        $q->execute([$cat]);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}
