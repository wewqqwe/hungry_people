<?php
class SpecialityModel {
    function all() {
        $q = db()->query("SELECT * FROM specialities ORDER BY id");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}
