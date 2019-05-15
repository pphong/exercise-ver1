<?php
include 'Public/model/moto_sqli.php';
include 'Public/model/moto_pdo.php';

$object_sqli = new moto_sqli();
$data_sqli = $object_sqli->getDataMotos();

$object_pdo = new moto_pdo();
$data_pdo = $object_pdo->getDataMotos();

$data = $data_sqli;

$_6col = false;
$_4col = false;
$_3col = false;
$_2col = false;

$col_count = count($data_sqli);

while (1) {
    if ($col_count % 6 == 0) {
        $_6col = true;
        break;
    } else
    if ($col_count % 4 == 0) {
        $_4col = true;
        break;
    } else
    if ($col_count % 3 == 0) {
        $_3col = true;
        break;
    } else
    if ($col_count % 2 == 0) {
        $_2col = true;
        break;
    } else
        $col_count--;
}

if ($_6col) {
    $cols = 6;
    $class = 'col-md-2 col-xs-2';
} else
if ($_4col) {
    $cols = 4;
    $class = 'col-md-3 col-xs-3';
} else
if ($_3col) {
    $cols = 3;
    $class = 'col-md-4 col-xs-4';
} else
if ($_2col) {
    $cols = 2;
    $class = 'col-md-6 col-xs-6';
}
?>

<?php
$t = time();
$_token = md5($t);
session_start();
$_SESSION['_token'] = $_token;
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
            <h4 class="">Get database with mysqli</h4>
            <div class="alert alert-primary" style="padding: auto 5px">
                <h5 class="" style="display: inline-block">Danh sách moto </h5>
                <a class="btn btn-outline-info" href="CU_moto.php" rel="" style="position: relative;left: 70%;" >Add more moto</a>
            </div>
            <?php do { ?>
                <div class="row">
                    <?php for ($i = 0; $i < $cols; $i++) : ?>
                        <?php $moto = current($data) ?>
                        <?php if (current($data) != NULL) : ?>
                            <div class="<?php echo $class ?>">
                                <div class="alert alert-info" style="display: inline-block">
                                    Biển số : <?php echo $moto['moto_id'] ?>
                                    Tên xe : <?php echo $moto['moto_name'] ?>
                                    Màu sắc : <?php echo $moto['moto_color'] ?>
                                    Cân nặng : <?php echo $moto['moto_weight'] ?>
                                    Kích thước : <?php echo $moto['moto_size'] ?>
                                    </br>
                                    <form action='CU_moto.php' method='get' style="display: inline-block">
                                        <input type='hidden' name='moto_id' value="<?php echo $moto['moto_id'] ?>">
                                        <input class="btn" type='submit' value='Edit'>
                                    </form>
                                    <form action='delete.php' method='post' style="display: inline-block">
                                        <input type="hidden" name="_token" value="<?php echo $_token ?>">
                                        <input type='hidden' name='moto_id' value="<?php echo $moto['moto_id'] ?>">
                                        <input class="btn" type='submit' name='delete' value='Delete'>
                                    </form>
                                </div>

                            </div>
                        <?php endif; ?>
                        <?php next($data) ?>
                    <?php endfor; ?>
                    <?php prev($data) ?>
                </div>
            <?php }while (next($data) != NULL) ?>


            <?php
// do{
//                var_dump(current($data));
//            }while(next($data) != NULL)
            ?>

        </div>
    </body>

    <footer>

    </footer>
</html>