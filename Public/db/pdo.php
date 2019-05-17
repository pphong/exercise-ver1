<?php
require_once('config.php');
Class pdo_db {
    public static $connection;
    public function __construct() {
        self::$connection = new PDO(DSN, DB_USER, DB_PASS);
        self::$connection->pdo_connect();
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$connection->exec("set names utf8");
    }
    public function __destruct() {
        self::$connection = null;
    }
    
    public function query($sql) {
        $data = self::$connection->query($sql);
        return $data;
    }
    
    public function getData($sql) {
        $data = $this->query($sql);
        
        $rows = [];
        while ($row = $data->fetchAll(PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }
        
        if (@$rows)
            return $rows[0];
        else
            return NULL;
    }
}
