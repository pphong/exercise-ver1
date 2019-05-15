<?php

include 'Public/model/moto_sqli.php';
include 'Public/model/moto_pdo.php';
$actual_link = (isset($_SERVER['HTTPS']) 
        && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
session_start();

if ((@$_POST['delete'] && @$_SESSION['_token']) && $_POST['_token'] == $_SESSION['_token']) {
    $data = $_POST;
    $object_sqli = new moto_sqli();
    $object_sqli->postDelete($data);
}

$link = dirname($actual_link);
$string = 'Location: '.$link;
header($string);
