<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_DIR_ = dirname(dirname(__FILE__));
require_once ($_DIR_.'\db\mysqli.php');

class moto_sqli extends mysqli_db{
    
    private $table = 'motos';
    private $filter = [ 'moto_name', 'moto_color', 'moto_weight', 'moto_size'];
    private $primeryKey = 'moto_id';
    
    public function getDataMotos()
    {
        $sql = 'SELECT * FROM `motos`';
        $data = $this->getData($sql);
        return $data;
    }
    
    public function postEdit($data){
        $set = '';
        foreach ($this->filter as $title){
            if (gettype($data[$title]) == 'integer')
                $set =  $set.'`'.$title.'` = '.$data[$title].',';
            else
                $set =  $set.'`'.$title.'` = "'.$data[$title].'",';
        }
        $set = substr($set, 0, strlen($set)-1);
        $set = $set.' ';
        
        $where = '`'.$this->primeryKey.'` = '.$id;
        
        $sql = "UPDATE "
                . '`'.$this->table.'` '
                . "SET "
                . $set
                . "WHERE 1";
        
        $this->query($sql);
    }
    
    public function postAdd($data){
        $value = '';
        
        foreach ($this->filter as $title){
            if (gettype($data[$title]) == 'integer')
                $value = $value.$data[$title].',';
            else
                $value = $value.'"'.$data[$title].'",';
        }
        
        $value = substr($value, 0, strlen($value)-1);
        
        $col = '';
        foreach ($this->filter as $title)
            $col = $col.'`'.$title.'`,';
        $col = substr($col, 0, strlen($col)-1);
        
        $sql = "INSERT INTO "
                . "`"
                . $this->table
                . "`("
                . $col
                . ") "
                . "VALUES ("
                . $value
                . ")";
        
        $this->query($sql);
    }
    
    public function postDelete($data){
        $id = $data[$this->filter[0]];
        $sql = "DELETE FROM "
                . "`"
                . $this->table
                . "` "
                . "WHERE `"
                . $this->primeryKey
                . "` = "
                . $id;
        
        $this->query($sql);
    }
}

