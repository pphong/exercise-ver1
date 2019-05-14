<?php
require_once('config.php');
require_once ('mysql.php');
// phpinfo();
Class mysql_db {
    public static $conn;
    public function __construct() {
        self::$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
        mysql_select_db(DB_NAME, self::$conn);
        mysql_set_charset('UTF-8', self::$conn);
    }
    public function __destruct() {
        self::$conn->mysql_close();
    }
    public function getDataMotos()
    {
        return mysql_query("SELECT * FROM motos", self::$conn) or die(mysql_error(self::$conn));
    }
}