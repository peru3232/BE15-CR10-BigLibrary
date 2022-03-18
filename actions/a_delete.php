<?php 
require_once 'db_connect.php';

if ($_POST) {
    $isbn = $_POST['ISBN-13'];
    $image = $_POST['image'];
    $image == "product.png" || unlink("../pictures/$image");

    $sql = "DELETE FROM data WHERE `ISBN-13` = $isbn";
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted! <br/> You will be redirected in 5 seconds...";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error . "<br/> You will be redirected in 5 seconds...";
    }
    mysqli_close($connect);
    header("refresh:5 ; url=../index.php");
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete</title>
        <?php require_once '../components/styles.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Delete request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?=$message;?></p>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
        <?php require_once '../components/scripts.php'?>
    </body>
</html>