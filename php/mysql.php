<?php

$json = file_get_contents("./php/creds.json");
$json_data = json_decode($json, true);

$host = $json_data["dbHost"];
$dbname = $json_data["dbName"];
$username = $json_data["dbUser"];
$password = $json_data["dbPass"];

$conn = new mysqli($host, $username, $password, $dbname);

// Überprüfe die Verbindung
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
