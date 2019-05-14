<?php
require_once('config.php');
Class pdo_db {
    public static $conn;
    public function __construct() {
        self::$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$conn->exec("set names utf8");
    }
    public function __destruct() {
        self::$conn = null;
    }
    
}
