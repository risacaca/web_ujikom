<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'chainventory');
$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if ($conn == false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}