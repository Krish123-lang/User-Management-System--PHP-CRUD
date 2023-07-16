<?php
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crudops';

$conn = new mysqli($server, $user, $password, $dbname);

if (!$conn) {
    die(mysqli_error($conn));
}
