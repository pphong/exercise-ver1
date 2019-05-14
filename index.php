<?php
include 'Public/model/moto_sqli.php';
include 'Public/model/moto_pdo.php';

$object_sqli = new moto_sqli();
$data_sqli = $object_sqli->getDataMotos();

$object_pdo = new moto_pdo();
$data_pdo = $object_pdo->getDataMotos();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>  </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link href="css/" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <div class="container">
            <div class="row">

            </div>

            <div class="row">
            </div>
        </div>
    </body>

    <footer>

    </footer>
</html>