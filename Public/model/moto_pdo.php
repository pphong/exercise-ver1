<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_DIR_ = dirname(dirname(__FILE__));
require_once ($_DIR_.'\db\pdo.php');

class moto_pdo extends pdo_db{
    
    public function getDataMotos()
    {
        $data = self::$conn->prepare('SELECT * FROM `motos`');
        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}