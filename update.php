<?php
require_once 'actions/db_connect.php';

if ($_GET['isbn']) {
    $isbn = $_GET['isbn'];
    $sql = "SELECT * FROM data WHERE `ISBN-13` = $isbn";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        $type = $data['type'];
        $title = $data['title'];
        $author_fN = $data['author_first_name'];
        $author_lN = $data['author_last_name'];
        $publisher_name = $data['publisher_name'];
        $publisher_address = $data['publisher_address'];
        $publish_date = $data['publish_date'];
        $short_description = $data['short_description'];
        $image = $data['image'];
        (bool)$b_available = $data['available'];

    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <title>Edit Product</title>
        <?php require_once 'components/styles.php'?>
        <style type= "text/css">
            fieldset {
                margin: 100px auto auto;
                width: 60% ;
            }
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $image ?>' alt="<?php echo $title ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Media-Type:</th>
                        <td><input class='form-control' type="text" name= "type" value="<?php echo $type ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Title:</th>
                        <td><textarea  class="form-control"  name="title" rows="2" ><?php echo $title; ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Author`s firstname:</th>
                        <td><input class='form-control' type="text" name= "author_first_name" value="<?php echo $author_fN ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Author`s lastname:</th>
                        <td><input class='form-control' type="text" name= "author_last_name" value="<?php echo $author_lN ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Publisher:</th>
                        <td><input class='form-control' type="text" name= "publisher_name" value="<?php echo $publisher_name ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Publishers Address:</th>
                        <td><input class='form-control' type="text" name= "publisher_address" value="<?php echo $publisher_address ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Published Date:</th>
                        <td><input class='form-control' type="date" name= "publish_date" value="<?php echo $publish_date ?>" /></td>
                    </tr>
                    <tr>
                        <th>Short Description:</th>
                        <td><textarea  class="form-control"  name="short_description" rows="5"><?php echo $short_description; ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Available:</th>
                        <td><input class="form-check-input" type="checkbox" name="available" <?php if ($b_available){echo "checked";}?> /></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class="form-control" type="file" name= "image" /></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="ISBN-13"  value="<?php echo $isbn ?>" /></td>
                        <td><input type= "hidden" name= "image" value= "<?php echo $image ?>" /></td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <?php require_once 'components/scripts.php'?>
    </body>
</html>