<?php

$hostname = "127.0.0.1"; // this is the hostname that you can find in the PhpMyAdmin and you can write "localhost" too
$username = "root"; // be default the userName for the databases is root
$password = ""; // by default there is no password in the databases
$dbname = "be15_cr10_peter_biglibrary"; // here we need to write the Database name

// create connection, you need to be aware of the order of the parameters
$connect = new mysqli($hostname, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
    die("<p style='color: crimson'>Connection failed: </p>" . $connect->connect_error);
}
//else {
//    echo "<p style='color: forestgreen'>Successfully Connected</p>";
//}

