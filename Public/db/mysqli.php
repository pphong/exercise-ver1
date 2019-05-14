<?php

require_once('config.php');

Class mysqli_db {

    public static $connection = NULL;

    public function __construct() {
        if (!self::$connection) {
            self::$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            mysqli_set_charset(self::$connection, 'UTF8');
        }
    }

    public function query($sql) {
        $data = mysqli_query(self::$connection, $sql);
        return $data;
    }

    public function getData($sql) {
        $data = $this->query($sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($data)) {
            $rows[] = $row;
        }
        return $rows;
    }

}
