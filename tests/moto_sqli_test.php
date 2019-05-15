<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPUnit\Framework\TestCase;

class moto_sqli_test extends TestCase{
    
    public function testRead():void{
        $this->assertInstanceOf(
            moto_sqli::getDataMotos
        );
    }
}