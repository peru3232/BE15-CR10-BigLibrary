<?php
//connect to database
require_once 'actions/db_connect.php';

$sql = 'SELECT * FROM data';
$result = mysqli_query($connect ,$sql);
$output ='';

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $row['available']?$avColor="success":$avColor="danger";
    $output .= "
        <a class='card col-lg-3 col-md-5 col-sm-10 col-11 p-0 m-2 bg-".$avColor." bg-opacity-10 border-".$avColor." border-3' href='details.php?isbn=" .$row['ISBN-13']."'>
            <img src='pictures/".$row['image']."' class='img-fluid rounded-start m-3' alt='".$row['title']."'>
            <div class='card-body pb-2'>
                <h5 class='card-title'>".$row['title']."</h5>
                <p class='card-text'>Author: ".$row['author_first_name']." ".$row['author_last_name']."</p>
            </div>
        </a> 
    ";
}

mysqli_close($connect);

?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CR10 - Big Library - INDEX</title>
    <?php require_once 'components/styles.php'?>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main>
    <div class='row justify-content-center '>
        <div class="hero text-center p-5" style="background-image: url(https://cdn.pixabay.com/photo/2020/07/23/01/29/books-5430104_960_720.jpg)"><a href='create.php'><button class='btn btn-success fs-4 p-3'>Add items</button></a> </div>
        <h1 class='py-3 text-center bg-danger bg-opacity-50  display-2'>Our Collection:</h1>
        <!-- Card Container -->
        <div class='row justify-content-center pt-5 content-container'>
            <?= $output ?>
        </div>
    </div>

</main>
<?php require_once 'components/scripts.php'?>
</body>
</html>