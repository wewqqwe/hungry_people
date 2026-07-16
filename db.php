<?php
function db() {
    static $pdo;
    if (!$pdo) {
        foreach (array('localhost', 'MySQL-8.4') as $host) {
            try {
                $pdo = new PDO('mysql:host=' . $host . ';dbname=hungrypeople;charset=utf8', 'root', '');
                break;
            } catch (PDOException $e) {
                $pdo = null;
            }
        }
        if (!$pdo) {
            die('Нет связи с базой. Запусти MySQL и импортируй install.sql');
        }
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}
