<?php
include "./connection.php";
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $model = $_POST['model'];
    $distance = $_POST['distance'];
    $price = $_POST['price'];

$imagename =$_FILES['img']['name'];
$imagesize =$_FILES['img']['size'];
$imageloc =$_FILES['img']['tmp_name'];
$imagetype =$_FILES['img']['type'];

$r=rand();
$newimg="../img/$r$imagename";
move_uploaded_file($imageloc , $newimg);

    $query = "INSERT INTO `sales` (`name`,`phone`,`model`,`distance`,`price`,`img`) VALUES ( '$name' , '$phone' , '$model' , '$distance' , '$price' , '$newimg' )";
    $connection = $conn->query($query);
    if ($connection){
        header("Location: sell_cars.php");
}
    else{
        header("Location: sell_form.php");
}
?>