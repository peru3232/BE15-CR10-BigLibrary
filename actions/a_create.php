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
    $image = file_upload($_FILES['image']);

    $uploadError = '';

    $sql = "INSERT INTO `data` (`ISBN-13`, `type`, `title`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `short_description`, `image`, `available`) VALUES
    ('$isbn', '$type', '$title', '$author_fN', '$author_lN', '$publisher_name', '$publisher_address', '$publish_date', '$short_description', '$image->fileName', '$b_available')";


//        "INSERT INTO restaurant.dishes (name, price, description, ingredienties, image) VALUES ('$name', $price, '$description',
//            '$ingredienties' ,'$image->fileName')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $title </td>
            <td> $type </td>
            </tr></table><hr>
             <br/> You will be redirected in 5 seconds...";
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error." <br/> You will be redirected in 5 seconds...";
    }
    $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
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
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
        <?php require_once '../components/scripts.php'?>
    </body>
</html>