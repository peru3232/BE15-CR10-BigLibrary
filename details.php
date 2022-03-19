<?php

require_once 'actions/db_connect.php';


$sql = "SELECT * FROM data where `ISBN-13` = $_GET[isbn]";
$result = mysqli_query($connect ,$sql);
$output='';

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row['available']?$avColor="success":$avColor="danger";
$row['available']?:$avText="Sorry, not available at the moment!";

$output =  "
<h1 class='pb-3 text-center bg-warning bg-opacity-50 display-2'>Details</h1>
<div class='row justify-content-center pt-5'>
<!-- Content Container -->
  <div class='row justify-content-center content-container'>
    <a href='update.php?isbn=" .$row['ISBN-13']."' class='card mb-3 col-11 bg-".$avColor." bg-opacity-10'>
      <div class='row justify-content-around g-0'>
        <div class='col-sm-4'>
          <img src='pictures/".$row['image']."' class='img-fluid rounded-start my-3' alt='".$row['title']."'>
        </div>
        <div class='col-sm-7'>
          <div class='card-body'>
            <h2 class='card-title'>".$row['title']."</h2>
            <h5 class='card-title'>From ".$row['author_first_name']." ".$row['author_last_name']." - by ".$row['publisher_name']."</h5><hr>
            <h6> Category: ".$row['type']."</h6>
            <p class='card-text'>".$row['short_description']."</p>
            <p class='card-text'><small class='text-muted'>ISBN Nr.: ".$row['ISBN-13']." <i>from: ".$row['publish_date']."</i> </small></p>
            <h6 class='text-".$avColor."'>".@$avText."</h6>
        </div>
      </div>
    </div>
  </a>
</div>

        <div class='py-2 text-center'>
            <a href='index.php'><button class='btn btn-primary mx-3'>Back</button></a>
            <a href='update.php?isbn=" .$row['ISBN-13']."'><button class='btn btn-secondary me-3'>Edit</button></a> 
            <a href='delete.php?isbn=" .$row['ISBN-13']."'><button class='btn btn-danger me-3'>Delete</button></a> 
        </div>

";

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR10 - Big Library - Details to: <?= $row['title'] ?></title>
    <?php require_once 'components/styles.php'?>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?= $output ?>
    <div class="p-5"> </div>
    <?php require_once 'components/footer.html'?>
    <?php require_once 'components/scripts.php'?>
</body>
</html>