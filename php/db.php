<?php
$host = "db";
$user = "museumuser";
$password = "museumpass";
$database = "museum";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
?>