<?php


session_start();
require_once 'db/db.php';

$products = $connect->query("SELECT * FROM ajax_task.products")
->fetchAll(PDO::FETCH_ASSOC);

$cats = $connect->query("SELECT cat FROM ajax_task.cats  ")
    ->fetchAll(PDO::FETCH_ASSOC);

$colors = $connect->query("SELECT color FROM ajax_task.colors ")
    ->fetchAll(PDO::FETCH_ASSOC);

$weights = $connect->query("SELECT weight FROM ajax_task.weights")
    ->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="select">
<select name="cat" id="cat">
    <option value="all">Все категории</option>
    <?foreach ($cats as $cat){?>
        <option value="<?=$cat['cat']?>" <? if ($_SESSION['cat'] == $cat['cat']){
            echo 'selected';
        }?>><?=$cat['cat']?></option>

    <?}?>
</select>
        <select name="color" id="color">
            <option value="all">Все цвета</option>
            <?foreach ($colors as $color){?>
                <option value="<?=$color['color']?>"<? if ($_SESSION['color'] == $color['color']){
                    echo 'selected';
                }?>><?=$color['color']?></option>

            <?}?>
        </select>
        <select name="weight" id="weight">
            <option value="all">Любой вес</option>
            <?foreach ($weights as $weight){?>
                <option value="<?=$weight['weight']?>"<? if ($_SESSION['weight'] == $weight['weight']){
                    echo 'selected';
                }?>><?=$weight['weight']?></option>
            <?}?>
        </select>

    </div>
<div class="row cards-block ">

<?
require_once 'actions/query.php';
?>

</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/ajax.js"></script>




</body>
</html>


