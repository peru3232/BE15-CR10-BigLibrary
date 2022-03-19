<?php
//connect to database
require_once 'actions/db_connect.php';

//first make a publishers list
$sql = 'SELECT DISTINCT publisher_name FROM data';
$result = mysqli_query($connect ,$sql);
$output ='';

//check if any data available...
if (!(mysqli_num_rows($result)))  {
    $output =  "<h1 class='text-center'>No Data Available </h1>";
    return;
}

//add different publishers to list
$insert = $insertF = '';
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $insert.= "
        <li><a class='dropdown-item' href='index.php?publisher_name=".$row['publisher_name']."'>".$row['publisher_name']."</a></li>
    ";
    $insertF.= "
        <option>".$row['publisher_name']."</option>
    ";
}

//generate dropdown list for publishers
//$output = "
//<div class='dropdown'>
//  <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
//    Publisher
//  </button>
//  <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
//      <li><a class='dropdown-item' href='index.php'>Select all</a></li>
//  ".$insert."
//  </ul>";
$output .= "
<form method='GET'>
    <select style='width: 170px' name='publisher_name' onchange='this.form.submit();'>
      <option>-- Select Publisher --</option>
      <option value=''>(all)</option>
     ".$insertF."
    </select>
</form>
</div>
";
//select list of items (general and in case of we get info from publisher selection...
if (@$_GET['publisher_name']) {
    $header = $_GET['publisher_name'];
    $sql = "SELECT * FROM data WHERE publisher_name = '".$header."'";
} else {
    $header = 'Our Collection:';
    $sql = 'SELECT * FROM data';
}
$result = mysqli_query($connect ,$sql);

//generate whole list
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
//close connection
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
        <!-- header with generated text from php-->
        <h1 class='py-3 text-center bg-warning bg-opacity-50  display-2'><?= $header ?></h1>
        <!-- Card Container -->
        <div class='row justify-content-center pt-5 content-container'>
            <!-- items list from php-->
            <?= $output ?>
        </div>
    </div>
    <div class="p-5"> </div>
</main>
<!--footer-->
<?php require_once 'components/footer.html'?>
<!--scripts-->
<?php require_once 'components/scripts.php'?>
</body>
</html>