<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'components/styles.php'?>
        <title>CR10 - Big Library - Create...</title>
        <style>
            .ownFieldset {
                margin: 100px auto auto;
                width: 60% ;
            }
        </style>
    </head>
    <body>
        <fieldset class="ownFieldset">
            <legend class='h2'>Adding Items</legend>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>ISBN-13 Number:</th>
                        <td><input class='form-control' type="text" name="ISBN-13"  placeholder="1234567890123" /></td>
                    </tr>    
                    <tr>
                        <th>Media-Type:</th>
                        <td><input class='form-control' type="text" name= "type" placeholder="e.g. book, CD, DVD" /></td>
                    </tr>
                    <tr>
                        <th>Title:</th>
                        <td><textarea  class="form-control"  name="title" rows="2" placeholder="title from the item"></textarea></td>
                    </tr>
                    <tr>
                        <th>Author`s firstname:</th>
                        <td><input class='form-control' type="text" name= "author_first_name" placeholder="John" /></td>
                    </tr>
                    <tr>
                        <th>Author`s lastname:</th>
                        <td><input class='form-control' type="text" name= "author_last_name" placeholder="Doe" /></td>
                    </tr>
                    <tr>
                        <th>Publisher:</th>
                        <td><input class='form-control' type="text" name= "publisher_name" placeholder="Pub Enterprise" /></td>
                    </tr>
                    <tr>
                        <th>Publishers Address:</th>
                        <td><input class='form-control' type="text" name= "publisher_address" placeholder="Wonderstreet 13: 12345 Paradise-City" /></td>
                    </tr>
                    <tr>
                        <th>Published Date:</th>
                        <td><input class='form-control' type="date" name= "publish_date"  /></td>
                    </tr>
                    <tr>
                        <th>Short Description:</th>
                        <td><textarea  class="form-control"  name="short_description" rows="5"  placeholder="some description"></textarea></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="image" /></td>
                    </tr>
                    <tr>
                        <th>Available:</th>
                        <td><input class="form-check-input" type="checkbox" name="available" /></td>
                    </tr>
                    <tr>
                        <td><button class='btn btn-success' type="submit">Insert this Item</button></td>
                        <td><a href="index.php"><button class='btn btn-secondary' type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <?php require_once 'components/scripts.php'?>
    </body>
</html>