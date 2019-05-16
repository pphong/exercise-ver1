<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use PHPUnit\Framework\TestCase;

$_DIR_ = dirname(dirname(__FILE__));
require_once ($_DIR_ . '\Public\model\moto_sqli.php');

//require_once ($_DIR_ . '\Public\model\mototrait.php');
//var_dump($_DIR_ . '\Public\model\moto_sqli.php');
//die();

class motoSQLiTest extends TestCase {

    public function testGetDataMotosNoneInput(): void {
        $obj = new moto_sqli();
        $data = $obj->getDataMotos();
        $this->assertTrue(
            !empty($data)
        );
        
    }
    
    public function testGetDataMotoWithInput(): void {
        $obj = new moto_sqli();
        $data = $obj->getDataMotos('19');
        $this->assertTrue(
            !empty($data)
        );
    }
    
    public function testPostEdit(): void {
        $data = [
            'moto_id' => 19,
            'moto_name' => 'abc',
            'moto_color' => 'abcool',
            'moto_weight' => 120,
            'moto_size' => 125
        ];
        
        $obj = new moto_sqli();
        $data = $obj->postEdit($data);
        $this->assertTrue(
            !empty($data)
        );
    }
    
    public function testPostAdd(): void {
        $data = [
            'moto_name' => 'abc',
            'moto_color' => 'abcool',
            'moto_weight' => 120,
            'moto_size' => 125
        ];
        
        $obj = new moto_sqli();
        $data = $obj->postAdd($data);
        $this->assertTrue(
            !empty($data)
        );
    }

}
