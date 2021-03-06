<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Trait motoTrait {

    private $table = 'motos';
    private $filter = ['moto_name', 'moto_color', 'moto_weight', 'moto_size'];
    private $primeryKey = 'moto_id';

    public function getDataMotos($id = NULL) {
        if ($id == NULL) {
            $sql = 'SELECT * FROM `motos`';
        } else {
            $sql = 'SELECT * FROM `motos` WHERE `' . $this->primeryKey . '` = ' . $id;
        }

        $data = $this->getData($sql);
        return $data;
    }

    public function postEdit($data) {
        $set = '';
        foreach ($this->filter as $title) {
            if (gettype($data[$title]) == 'integer')
                $set = $set . '`' . $title . '` = ' . $data[$title] . ',';
            else
                $set = $set . '`' . $title . '` = "' . $data[$title] . '",';
        }
        $set = substr($set, 0, strlen($set) - 1);
        $set = $set . ' ';

        $where = '`' . $this->primeryKey . '` = ' . $data['moto_id'];

        $sql = "UPDATE "
                . '`' . $this->table . '` '
                . "SET "
                . $set
                . "WHERE "
                . $where;


        if ($this->query($sql))
            return true;
        else
            return false;
    }

    public function postAdd($data) {
        $value = '';

        foreach ($this->filter as $title) {
            if (gettype($data[$title]) == 'integer')
                $value = $value . $data[$title] . ',';
            else
                $value = $value . '"' . $data[$title] . '",';
        }

        $value = substr($value, 0, strlen($value) - 1);

        $col = '';
        foreach ($this->filter as $title)
            $col = $col . '`' . $title . '`,';
        $col = substr($col, 0, strlen($col) - 1);

        $sql = "INSERT INTO "
                . "`"
                . $this->table
                . "`("
                . $col
                . ") "
                . "VALUES ("
                . $value
                . ")";

        if ($this->query($sql))
            return true;
        else
            return false;
    }

    public function postDelete($data) {
        $id = $data[$this->primeryKey];
        $sql = "DELETE FROM "
                . "`"
                . $this->table
                . "` "
                . "WHERE `"
                . $this->primeryKey
                . "` = "
                . $id;

        if ($this->query($sql))
            return true;
        else
            return false;
    }

}
