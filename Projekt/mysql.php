<?php

$json = file_get_contents('creds.json');
$json_data = json_decode($json, true);


$conn = new mysqli($host, $username, $password, $dbname);

// Überprüfe die Verbindung
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Funktion, um Kategorien zu bekommen
function getCategories($conn) {
    $categories = [];
    $sql = "SELECT CategoryName FROM Categories";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row['CategoryName'];
        }
    }
    return $categories;
}
// Kategorien erhalten
$categories = getCategories($conn);
