<?php
$host = 'localhost'; 
$username = 'root'; 
$password = '';
$database = 'members_cawaling'; 


$dbc = mysqli_connect($host, $username, $password, $database);


if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
