<?php


$json = file_get_contents('php://input');
if($json !== false)
{
    $data = json_decode($json);
    echo json_encode($data);
}