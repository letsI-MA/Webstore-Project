<?php 

header("Content-Type: application/json");

// Get the raw POST data
$json = file_get_contents('php://input');

// Decode the JSON data into a PHP associative array
$data = json_decode($json, true);

// Check if the data was received correctly
if ($data === null) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Invalid JSON data."]);
    exit;
}

// Validate the data structure
foreach ($data as $item) {
    if (!isset($item['id'], $item['name'], $item['price'], $item['quantity'])) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Invalid item structure."]);
        exit;
    }
}

// Simulate storing data or processing it
// For example, save to a database here
// ...

// Respond to the client
http_response_code(200);
echo json_encode(["message" => "Order received successfully!", "data" => $data]);



?>