<?php
class StaticModel {
    function get($block) {
        $q = db()->prepare("SELECT * FROM static WHERE block = ?");
        $q->execute([$block]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }
}
