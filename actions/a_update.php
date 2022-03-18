<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {
    $isbn = $_POST['ISBN-13'];
    $type = $_POST['type'];
    $title = $_POST['title'];
    $author_fN = $_POST['author_first_name'];
    $author_lN = $_POST['author_last_name'];
    $publisher_name = $_POST['publisher_name'];
    $publisher_address = $_POST['publisher_address'];
    $publish_date = $_POST['publish_date'];
    $short_description = $_POST['short_description'];
    (@$_POST['available'])?$b_available=true:$b_available=false;
    //variable for upload pictures errors is initialised
    $uploadError = '';

    $picture = file_upload($_FILES['image']);//file_upload() called
    if($picture->error===0){
        $_POST["image"] == "product.png" || unlink("../pictures/$_POST[image]");
        $sql = "UPDATE data SET type = '$type', image = '$picture->fileName', title = '$title', author_first_name = '$author_fN', author_last_name = '$author_lN', publisher_name = '$publisher_name', publisher_address = '$publisher_address', publish_date = '$publish_date', short_description = '$short_description', available = '$b_available' WHERE `ISBN-13` = '$isbn'";
    }else{
        $sql = "UPDATE data SET type = '$type', title = '$title', author_first_name = '$author_fN', author_last_name = '$author_lN', publisher_name = '$publisher_name', publisher_address = '$publisher_address', publish_date = '$publish_date', short_description = '$short_description', available = '$b_available' WHERE `ISBN-13` = '$isbn'";

    }
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated <br/> You will be redirected in 5 seconds...";
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error()."<br/> You will be redirected in 5 seconds...";
    }
    $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
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
        <title>Update</title>
        <?php require_once '../components/styles.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class ?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
        <?php require_once '../components/scripts.php'?>
    </body>
</html>