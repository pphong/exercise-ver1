<?php
include 'Public/model/moto_sqli.php';
$db = new moto_sqli();
$mysqli_data = $db->getDataMotos();
$db->postEdit(['moto_id' => 1,
               'moto_name' => 2,
               'moto_color' => 'red',
               'moto_weight' => 3,
               'moto_size' => 4]);
include 'Public/model/moto_pdo.php';
$db_dpo = new moto_pdo();
$dpo_data = $db_dpo->getDataMotos();

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .item-moto {
            border: 1px solid red;
        }
    </style>
</head>
<body>
<h3>Mysqli</h3>
<div class="container">
    <div class="row">
        <?php foreach ($mysqli_data as $key => $value): ?>

            <div class="col-md-3 item-moto">
                <p>Biển số: <span><?php echo $value['moto_id']; ?></span> </p>
                <p>Tên Xe: <span><?php echo $value['moto_name']; ?></span></p>
                <p>Màu: <span><?php echo $value['moto_color']; ?></span></p>
                <p>Cân nặng: <span><?php echo $value['moto_weight']; ?></span> kg</p>
                <p>Du tích: <span><?php echo $value['moto_size']; ?></span>ml</p>
            </div>
        <?php endforeach ?>
    </div>
</div>
<h3>PDO</h3>
<div class="container">
    <div class="row">
        <?php foreach ($dpo_data as $key => $value): ?>

            <div class="col-md-3 item-moto">
                <p>Biển số: <span><?php echo $value['moto_id']; ?></span> </p>
                <p>Tên Xe: <span><?php echo $value['moto_name']; ?></span></p>
                <p>Màu: <span><?php echo $value['moto_color']; ?></span></p>
                <p>Cân nặng: <span><?php echo $value['moto_weight']; ?></span> kg</p>
                <p>Du tích: <span><?php echo $value['moto_size']; ?></span>ml</p>
            </div>
        <?php endforeach ?>
    </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>