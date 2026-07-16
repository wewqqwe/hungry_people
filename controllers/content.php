<?php
class Content {
    function menu() {
        $cat = $_GET['cat'] ?? '';
        echo json_encode((new MenuModel)->byCategory($cat));
    }
}
